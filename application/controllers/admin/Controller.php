<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model', 'user');
		$this->user->ping($this->session->administrator['id']);
		$site_setting_timeout = $this->user->getSettings('site', 'session_timeout');
		$timeout = (isset($site_setting_timeout['session_timeout']) && is_numeric($site_setting_timeout['session_timeout']) && $site_setting_timeout['session_timeout'] > 60) ? $site_setting_timeout['session_timeout'] : 1800;
		if(isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp']) > $timeout) { 
			$this->session->sess_destroy();
			redirect('/admin');
		} else if($this->uri->segment(2) != "ajax_dashboard"){ 
			$_SESSION['timestamp'] = time();
		}

		if(file_exists(FCPATH."database_update_".$this->config->item('app_version').".sql")) {
			$this->load->model('Version_changes_model');
			$this->Version_changes_model->update_changes();
			$this->update_user_langauges();
		}
	}
	
	public function userdetails(){
		return $this->session->administrator;
	}

	public function update_user_langauges($is_admin_request = null) {
		$all_languages_json = file_get_contents(FCPATH.'assets/data/languages.json');
		$all_languages = json_decode($all_languages_json, true);

		$userLanguagesQuery = $this->db->get('language');
		$userLanguages = $userLanguagesQuery->result();
		
		if($is_admin_request != null) {
			$files_updated = 0;
		}

		foreach($userLanguages as $language) {
			if($language->name == "English") {
				$userLanguagesDataPath = FCPATH."application/language/default";
				$defaultLanguagesDataPath = FCPATH."application/language/default/default";
			} else {
				$userLanguagesDataPath = FCPATH."application/language/".$language->id;
				$languages_code = array_search($language->name, $all_languages);
				$defaultLanguagesDataPath = FCPATH."application/language/default/".$languages_code;
			}

			if(is_dir($userLanguagesDataPath) && is_dir($defaultLanguagesDataPath)) {
				$defaultLangData = [];
				$selected_folders = scandir($defaultLanguagesDataPath);
				for ($i = 2; $i < sizeof($selected_folders); $i++){
					if(is_file($defaultLanguagesDataPath."/".$selected_folders[$i]) && strpos($selected_folders[$i], '.php') !== false) {
						$defaultLangData[$selected_folders[$i]] = file($defaultLanguagesDataPath."/".$selected_folders[$i], FILE_SKIP_EMPTY_LINES);
					}
				}

				$userLangData = [];
				$selected_folders = scandir($userLanguagesDataPath);
				for ($i = 2; $i < sizeof($selected_folders); $i++){
					if(is_file($userLanguagesDataPath."/".$selected_folders[$i]) && strpos($selected_folders[$i], '.php') !== false) {
						$lines = file($userLanguagesDataPath."/".$selected_folders[$i], FILE_SKIP_EMPTY_LINES);   
						$lines = array_filter($lines, function($line) {
							return strpos($line, "'';") == false && (strpos($line, "\$lang") !== false || strpos($line, "?php") !== false);
						});
						file_put_contents($userLanguagesDataPath."/".$selected_folders[$i], implode("\n", $lines));
						$userLangData[$selected_folders[$i]] = file_get_contents($userLanguagesDataPath."/".$selected_folders[$i]);
					}
				}
		
				$newLineAdded = false;
				foreach($defaultLangData as $key => $default) {
					for ($i=0; $i < sizeof($default); $i++) {
						$lang_key = trim(explode("=",$default[$i])[0]); 
						$lang_key = str_replace("\$lang['", "", $lang_key);
						$lang_key = str_replace("']", "", $lang_key);
						if (!str_contains($userLangData[$key], $lang_key)) { 
							if(!$newLineAdded) {
								file_put_contents($userLanguagesDataPath.'/'.$key, "\n", FILE_APPEND);
								$newLineAdded = true;
							}
							file_put_contents($userLanguagesDataPath.'/'.$key, $default[$i], FILE_APPEND);
							if($is_admin_request != null) {
								$files_updated++;
							}
						}
					}
				}
			}
		}

		if($is_admin_request != null) {
			if($files_updated > 0) {
				$this->session->set_flashdata('success', 'Language files updated successfully!');
			} else {
				$this->session->set_flashdata('success', 'Language files are already up to date!');
			}
			redirect('/admincontrol/language');
		}
	}

	public function friendly_seo_string($vp_string){
		$vp_string = trim($vp_string);
		$vp_string = html_entity_decode($vp_string);
		$vp_string = strip_tags($vp_string);
		$vp_string = strtolower($vp_string);
		$vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);
		$vp_string = preg_replace('~ ~', '-', $vp_string);
		$vp_string = preg_replace('~-+~', '-', $vp_string);
		return strtolower($vp_string);
	}

	public function upload_photo($fieldname,$path) {
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'png|gif|jpeg|jpg|PNG|GIF|JPEG|JPG|ICO|ico';
		$config['max_size']      = 2048;
		$this->load->helper('string');
		$config['file_name']  = random_string('alnum', 32);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload($fieldname)) {
			$data = array('success' => false, 'msg' => $this->upload->display_errors());
		} else {
			$upload_details = $this->upload->data();
			$config1 = array(
				'source_image' => $upload_details['full_path'],
				'new_image' => $path.'/thumb',
				'maintain_ratio' => true,
				'width' => 300,
				'height' => 300
			);

			$this->load->library('image_lib', $config1);

			$this->image_lib->resize();

			$data = array('success' => true, 'upload_data' => $upload_details, 'msg' => "Upload success!");
		}
		return $data;
	}

}