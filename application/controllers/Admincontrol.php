<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Admincontrol extends MY_Controller {

	

	function __construct() {

		parent::__construct();

		$this->load->model('user_model', 'user');

		$this->load->model('Product_model');

		$this->load->helper('share');

		$this->load->library('user_agent');

		$this->front_assets = APPPATH . 'views/auth/user/assets/';

		$this->front_assets_url = base_url('application/views/auth/user/assets/');

		___construct(1);

		$this->Product_model->ping($this->session->administrator['id']);

		$site_setting_timeout = $this->Product_model->getSettings('site', 'session_timeout');

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

	public function script_details(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		list($code,$res) = api('codecanyon/get-details',['licence'=>CODECANYON_LICENCE]);

		$data = $res;

		$this->view($data,'script_details/index');

	}

	public function update_langueges_data() {
		$this->update_user_langauges();
		redirect('/admincontrol/dashboard');
	}

	public function system_status(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$this->load->model("Coupon_model");

	



		$data['mysql_version'] = $this->db->conn_id->server_info;

		$data['serverReq'] = checkReq();



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/system_status', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function date_compare($element1, $element2) { 

	    $datetime1 = strtotime($element1['created_at']); 

	    $datetime2 = strtotime($element2['created_at']); 

	    return ($datetime1 == $datetime2) ? 0 : (($datetime1 < $datetime2) ? 1 : -1);

	}





	public function clear_commission_tables() {

	   	$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); }



	   	$password = $this->input->post('admin_password',true);

	   	$password_confirm = $this->input->post('password_confirm',true);



		$user = $this->db->query("SELECT * FROM users WHERE id=". (int)$userdetails['id'])->row();

		if(sha1($password) == $user->password){

			if($password_confirm == 'true'){

				$this->session->set_userdata('clear_database_password',1);

				$json['success'] = true;

			} else if($this->session->userdata('clear_database_password') == 1){


				$this->db->truncate('form_action');

				$this->db->query("ALTER TABLE form_action AUTO_INCREMENT=1;");


				$this->db->truncate('integration_clicks_action');

				$this->db->query("ALTER TABLE integration_clicks_action AUTO_INCREMENT=1;");


				$this->db->truncate('integration_admin_clicks_action');

				$this->db->query("ALTER TABLE integration_admin_clicks_action AUTO_INCREMENT=1;");

			

				$this->db->truncate('integration_clicks_logs');

				$this->db->query("ALTER TABLE integration_clicks_logs AUTO_INCREMENT=1;");



				$this->db->truncate('integration_orders');

				$this->db->query("ALTER TABLE integration_orders AUTO_INCREMENT=1;");





				$this->db->truncate('notification');

				$this->db->query("ALTER TABLE notification AUTO_INCREMENT=1;");



				$this->db->truncate('product_action');

				$this->db->query("ALTER TABLE product_action AUTO_INCREMENT=1;");



				$this->db->truncate('product_action_admin');

				$this->db->query("ALTER TABLE product_action_admin AUTO_INCREMENT=1;");


				$this->db->truncate('wallet');

				$this->db->query("ALTER TABLE wallet AUTO_INCREMENT=1;");



				$this->db->truncate('wallet_recursion');

				$this->db->query("ALTER TABLE wallet_recursion AUTO_INCREMENT=1;");


				$this->db->truncate('wallet_request');

				$this->db->query("ALTER TABLE wallet_request AUTO_INCREMENT=1;");

				$this->db->query("ALTER TABLE language AUTO_INCREMENT=2;");


				$this->db->truncate('order');


				$this->db->truncate('orders_history');

				$this->db->query("ALTER TABLE orders_history AUTO_INCREMENT=1;");


				$this->db->truncate('order_products');

				$this->db->query("ALTER TABLE order_products AUTO_INCREMENT=1;");


				$this->db->truncate('order_proof');

				$this->db->query("ALTER TABLE order_proof AUTO_INCREMENT=1;");


				$this->db->truncate('integration_clicks_logs');

				$this->db->query("ALTER TABLE integration_clicks_logs AUTO_INCREMENT=1;");


				$this->db->truncate('wallet_requests_history');

				$this->db->query("ALTER TABLE wallet_requests_history AUTO_INCREMENT=1;");


				$this->db->truncate('wallet_requests');

				$this->db->query("ALTER TABLE wallet_requests AUTO_INCREMENT=1;");



				$this->session->set_flashdata('success', __('admin.data_was_deleted_successfully'));

				$json['success'] = true;

			}

       

		} else {

			$json['errors']['admin_password'] = "Wrong Password..!";

		}



       	echo json_encode($json);

   }

   

	public function clear_tables() {

	   	$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); }



	   	$password = $this->input->post('admin_password',true);

	   	$password_confirm = $this->input->post('password_confirm',true);



		$user = $this->db->query("SELECT * FROM users WHERE id=". (int)$userdetails['id'])->row();

		if(sha1($password) == $user->password){

			if($password_confirm == 'true'){

				$this->session->set_userdata('clear_database_password',1);

				$json['success'] = true;

			} else if($this->session->userdata('clear_database_password') == 1){



				$tablesForTruncates = ['setting', 'affiliateads', 'affiliate_action', 'cart', 'categories', 'clicks_views', 'coupon', 'form', 'form_action', 'form_coupon','integration_clicks_action','integration_admin_clicks_action','integration_category','integration_clicks_logs','integration_orders','integration_programs','integration_refer_product_action','integration_tools','integration_tools_ads', 'last_seen', 'notification', 'order', 'orders_history', 'order_products', 'order_proof', 'pagebuilder_theme', 'pagebuilder_theme_page', 'password_resets', 'payment_detail', 'paypal_accounts', 'product', 'productslog', 'product_action', 'product_action_admin', 'product_affiliate', 'product_categories', 'product_media_upload', 'rating', 'refer_market_action', 'refer_product_action', 'shipping_address', 'user_payment_request', 'vendor_setting', 'version_update', 'wallet', 'wallet_recursion', 'wallet_request', 'theme_faq', 'theme_homecontent', 'theme_home_sections_setting', 'theme_pages', 'theme_recommendation', 'theme_sections', 'theme_settings', 'theme_sliders', 'theme_videos', 'slugs', 'membership_buy_history', 'membership_user','mail_templates', 'membership_plans', 'setting', 'theme_links'];



				foreach ($tablesForTruncates as $tablename) {

					$this->db->truncate($tablename);

					$this->db->query("ALTER TABLE `".$tablename."` AUTO_INCREMENT=1;");

				}

				

				$this->db->query("DELETE FROM language WHERE id != '1'");

				$this->db->query("ALTER TABLE language AUTO_INCREMENT=2;");

				

				$this->db->query("DELETE FROM currency WHERE currency_id !='1' ");

				$this->db->query("ALTER TABLE currency AUTO_INCREMENT=2;");



				$this->db->query("DELETE FROM users WHERE id !='1' ");

				$this->db->query("ALTER TABLE users AUTO_INCREMENT=2;");

				

				$this->db->query("UPDATE users SET avatar=null, City=null, Country=null, Zip=null, PhoneNumber=null where type='admin'");

			

				/*The default setting fuction start here*/

				
				$this->db->query
				
				("
				INSERT INTO `membership_plans` (`id`, `name`, `type`, `billing_period`, `price`, `special`, `custom_period`, `have_trail`, `free_trail`, `total_day`, `bonus`, `status`, `description`, `label_text`, `label_background`, `label_color`, `sort_order`, `updated_at`, `created_at`) VALUES
                (1, 'Trail Package', 'free', 'custom', 0, 0, 10, 0, 0, 10, 0, 0, '<p>Trail Package - 10 Days</p><p>Trail Package - 10 Days</p><p>Trail Package - 10 Days</p><p>Trail Package - 10 Days</p><p>Trail Package - 10 Days</p><p>Trail Package - 10 Days<br></p>', 'Trail Package', '#FF0000', '#FFFFFF', 0, '2021-01-22 11:34:23', '2021-01-22 11:34:23');

				");
				
				$this->db->query
				("
				INSERT INTO `setting` (`setting_id`, `setting_key`, `setting_value`, `setting_type`, `setting_status`, `setting_ipaddress`) VALUES
                (1, 'front_template', 'multiple_pages', 'login', 1, ''),
                (2, 'shipping_in_limited', '0', 'shipping_setting', 1, ''),
                (3, 'shipping_error_message', '', 'shipping_setting', 1, ''),
                (4, 'cost', '[]', 'shipping_setting', 1, ''),
                (5, 'name', 'My Store', 'store', 1, ''),
                (6, 'status', '1', 'store', 1, ''),
                (7, 'menu_on_front', '1', 'store', 1, ''),
                (8, 'menu_on_front_blank', '1', 'store', 1, ''),
                (9, 'theme', '0', 'store', 1, ''),
                (10, 'google_analytics', '', 'store', 1, ''),
                (11, 'footer', '', 'store', 1, ''),
                (12, 'contact_us_map', '', 'store', 1, ''),
                (13, 'address', '', 'store', 1, ''),
                (14, 'email', '', 'store', 1, ''),
                (15, 'contact_number', '', 'store', 1, ''),
                (16, 'is_variation_filter', '1', 'store', 1, ''),
                (17, 'homepage_banner', '{\"title\":\"\",\"content\":\"\",\"button_text\":\"\",\"button_link\":\"\"}', 'store', 1, ''),
                (18, 'homepage_bottom_section', '{\"content\":\"\"}', 'store', 1, ''),
                (19, 'about_content', '', 'store', 1, ''),
                (20, 'contact_content', '', 'store', 1, ''),
                (21, 'policy_content', '', 'store', 1, ''),
                (22, 'homepage_slider', '[]', 'store', 1, ''),
                (23, 'homepage_features', '[]', 'store', 1, ''),
                (24, 'bs_cards', '[]', 'store', 1, ''),
                (25, 'social_links', '[]', 'store', 1, ''),
                (26, 'custom_page', '[]', 'store', 1, ''),
                (27, 'footer_menu', '[]', 'store', 1, ''),
                (28, 'recaptcha', '', 'formsetting', 1, ''),
                (29, 'product_commission_type', '', 'formsetting', 1, ''),
                (30, 'product_commission', '', 'formsetting', 1, ''),
                (31, 'product_ppc', '', 'formsetting', 1, ''),
                (32, 'product_noofpercommission', '', 'formsetting', 1, ''),
                (33, 'form_recursion', '', 'formsetting', 1, ''),
                (34, 'recursion_custom_time', '0', 'formsetting', 1, ''),
                (35, 'recursion_endtime', NULL, 'formsetting', 1, ''),
                (36, 'storestatus', '1', 'vendor', 1, ''),
                (37, 'admin_click_count', '', 'vendor', 1, ''),
                (38, 'admin_click_amount', '', 'vendor', 1, ''),
                (39, 'admin_sale_commission_type', 'percentage', 'vendor', 1, ''),
                (40, 'admin_commission_value', '', 'vendor', 1, ''),
                (41, 'click_allow', 'single', 'productsetting', 1, ''),
                (42, 'product_commission_type', '', 'productsetting', 1, ''),
                (43, 'product_commission', '', 'productsetting', 1, ''),
                (44, 'product_ppc', '', 'productsetting', 1, ''),
                (45, 'product_noofpercommission', '', 'productsetting', 1, ''),
                (46, 'product_recursion', '', 'productsetting', 1, ''),
                (47, 'recursion_custom_time', '0', 'productsetting', 1, ''),
                (48, 'recursion_endtime', NULL, 'productsetting', 1, ''),
                (49, 'status', '1', 'order_comment', 1, ''),
                (50, 'title', '[]', 'order_comment', 1, ''),
                (51, 'status', '1', 'storepayment_bank_transfer', 1, ''),
                (52, 'status', '1', 'storepayment_cod', 1, ''),
                (53, 'status', '1', 'storepayment_flutterwave', 1, ''),
                (54, 'status', '1', 'storepayment_opay', 1, ''),
                (55, 'status', '1', 'storepayment_paypal', 1, ''),
                (56, 'status', '1', 'storepayment_paypalstandard', 1, ''),
                (57, 'status', '1', 'storepayment_paystack', 1, ''),
                (58, 'status', '1', 'storepayment_paytm', 1, ''),
                (59, 'status', '1', 'storepayment_razorpay', 1, ''),
                (60, 'status', '1', 'storepayment_skrill', 1, ''),
                (61, 'status', '1', 'storepayment_stripes', 1, ''),
                (62, 'status', '1', 'storepayment_xendit', 1, ''),
                (63, 'status', '1', 'storepayment_yandex', 1, ''),
                (64, 'registration_status', '1', 'store', 1, ''),
                (65, 'affiliate_cookie', '365', 'store', 1, ''),
                (66, 'time_zone', 'Africa/Abidjan', 'site', 1, ''),
                (67, 'wallet_min_amount', '100', 'site', 1, ''),
                (68, 'default_action_status', '0', 'referlevel', 1, ''),
                (69, 'status', '1', 'referlevel', 1, ''),
                (70, 'from_email', 'admin@example.com', 'email', 1, ''),
                (71, 'from_name', 'SUPPORT', 'email', 1, ''),
                (72, 'smtp_hostname', '', 'email', 1, ''),
                (73, 'smtp_username', '', 'email', 1, ''),
                (74, 'smtp_password', '', 'email', 1, ''),
                (75, 'smtp_port', '', 'email', 1, ''),
                (76, 'notify_email', 'admin@example.com', 'site', 1, ''),
                (77, 'admin_sound_status', '1', 'live_dashboard', 1, ''),
                (78, 'admin_action_status', '1', 'live_dashboard', 1, ''),
                (79, 'admin_integration_order_status', '1', 'live_dashboard', 1, ''),
                (80, 'admin_affiliate_register_status', '1', 'live_dashboard', 1, ''),
                (81, 'admin_local_store_order_status', '1', 'live_dashboard', 1, ''),
                (82, 'admin_data_load_interval', '10', 'live_dashboard', 1, ''),
                (83, 'admin_integration_logs', '1', 'live_log', 1, ''),
                (84, 'admin_integration_orders', '1', 'live_log', 1, ''),
                (85, 'admin_newuser', '1', 'live_log', 1, ''),
                (86, 'status', '0', 'membership', 1, ''),
                (87, 'notificationbefore', '5', 'membership', 1, ''),
                (88, 'default_plan_id', '1', 'membership', 1, ''),
                (89, 'is_install', '1', 'membershippayment_bank_transfer', 1, ''),
                (90, 'is_install', '1', 'membershippayment_paypal', 1, ''),
                (91, 'is_install', '1', 'membershippayment_stripe_payment', 1, ''),
                (92, 'status', '1', 'membershippayment_bank_transfer', 1, ''),
                (93, 'bank_details', '', 'membershippayment_bank_transfer', 1, ''),
                (94, 'status', '1', 'membershippayment_paypal', 1, ''),
                (95, 'api_username', '', 'membershippayment_paypal', 1, ''),
                (96, 'api_password', '', 'membershippayment_paypal', 1, ''),
                (97, 'api_signature', '', 'membershippayment_paypal', 1, ''),
                (98, 'payment_currency', 'USD', 'membershippayment_paypal', 1, ''),
                (99, 'denied_status_id', '0', 'membershippayment_paypal', 1, ''),
                (100, 'pending_status_id', '0', 'membershippayment_paypal', 1, ''),
                (101, 'processing_status_id', '0', 'membershippayment_paypal', 1, ''),
                (102, 'success_status_id', '0', 'membershippayment_paypal', 1, ''),
                (103, 'canceled_status_id', '0', 'membershippayment_paypal', 1, ''),
                (104, 'status', '1', 'membershippayment_stripe_payment', 1, ''),
                (105, 'environment', '0', 'membershippayment_stripe_payment', 1, ''),
                (106, 'test_public_key', '', 'membershippayment_stripe_payment', 1, ''),
                (107, 'test_secret_key', '', 'membershippayment_stripe_payment', 1, ''),
                (108, 'live_public_key', '', 'membershippayment_stripe_payment', 1, ''),
                (109, 'live_secret_key', '', 'membershippayment_stripe_payment', 1, ''),
                (110, 'order_success_status', '0', 'membershippayment_stripe_payment', 1, ''),
                (111, 'order_failed_status', '0', 'membershippayment_stripe_payment', 1, ''),
                (112, 'wallet_min_message', '<p>Minimum Withdraw Is: 100</p>', 'site', 1, ''),
                (113, 'name', 'My Affiliate System', 'site', 1, ''),
                (114, 'maintenance_mode', '0', 'site', 1, ''),
                (115, 'store_maintenance_mode', '0', 'site', 1, ''),
                (116, 'session_timeout', '', 'site', 1, ''),
                (117, 'footer', '', 'site', 1, ''),
                (118, 'meta_description', '', 'site', 1, ''),
                (119, 'meta_keywords', '', 'site', 1, ''),
                (120, 'meta_author', '', 'site', 1, ''),
                (121, 'google_analytics', '', 'site', 1, ''),
                (122, 'faceboook_pixel', '', 'site', 1, ''),
                (123, 'fbmessager_script', '', 'site', 1, ''),
                (124, 'global_script', '', 'site', 1, ''),
                (125, 'global_script_status', '[]', 'site', 1, ''),
                (126, 'registration_approval', '1', 'store', 1, ''),
                (127, 'language_status', '1', 'store', 1, ''),
                (128, 'smtp_crypto', '', 'email', 1, ''),
                (129, 'heading', 'Terms Page', 'tnc', 1, ''),
                (130, 'content', '<p>Terms Content</p><p>Terms Content</p><p>Terms Content</p><p>Terms Content</p><p>Terms Content</p><p>Terms Content<br></p>', 'tnc', 1, ''),
                (131, 'sitekey', '', 'googlerecaptcha', 1, ''),
                (132, 'secretkey', '', 'googlerecaptcha', 1, ''),
                (133, 'admin_login', '0', 'googlerecaptcha', 1, ''),
                (134, 'affiliate_login', '0', 'googlerecaptcha', 1, ''),
                (135, 'affiliate_register', '0', 'googlerecaptcha', 1, ''),
                (136, 'client_login', '0', 'googlerecaptcha', 1, ''),
                (137, 'client_register', '0', 'googlerecaptcha', 1, ''),
                (138, 'registration_builder', '[{\"type\":\"header\",\"label\":\"Firstname\"},{\"type\":\"header\",\"label\":\"Lastname\"},{\"type\":\"header\",\"label\":\"Email\"},{\"type\":\"text\",\"required\":\"true\",\"label\":\"Mobile Number\",\"placeholder\":\"Mobile Number\",\"className\":\"form-control\",\"name\":\"text-1611314653157\",\"mobile_validation\":\"true\"},{\"type\":\"header\",\"label\":\"Username\"},{\"type\":\"header\",\"label\":\"Password\"},{\"type\":\"header\",\"label\":\"Confirm_password\"}]', 'registration_builder', 1, ''),
                (139, 'is_install', '1', 'withdrawalpayment_bank_transfer', 1, ''),
                (140, 'is_install', '1', 'withdrawalpayment_paypal', 1, ''),
                (141, 'status', '1', 'withdrawalpayment_bank_transfer', 1, ''),
                (142, 'status', '1', 'withdrawalpayment_paypal', 1, ''),
                (143, 'ClientID', '', 'withdrawalpayment_paypal', 1, ''),
                (144, 'ClientSecret', '', 'withdrawalpayment_paypal', 1, ''),
                (145, 'denied_status_id', '0', 'withdrawalpayment_paypal', 1, ''),
                (146, 'pending_status_id', '0', 'withdrawalpayment_paypal', 1, ''),
                (147, 'processing_status_id', '0', 'withdrawalpayment_paypal', 1, ''),
                (148, 'success_status_id', '0', 'withdrawalpayment_paypal', 1, ''),
                (149, 'canceled_status_id', '0', 'withdrawalpayment_paypal', 1, ''),
                (150, 'autoacceptlocalstore', '0', 'referlevel', 1, ''),
                (151, 'autoacceptexternalstore', '0', 'referlevel', 1, ''),
                (152, 'autoacceptaction', '0', 'referlevel', 1, ''),
                (153, 'show_sponser', '', 'referlevel', 1, ''),
                (154, 'sponser_name', 'System Admin', 'referlevel', 1, ''),
                (155, 'disabled_for', '[]', 'referlevel', 1, ''),
                (156, 'levels', '10', 'referlevel', 1, ''),
                (157, 'sale_type', 'percentage', 'referlevel', 1, ''),
                (158, 'commition', '', 'referlevel_1', 1, ''),
                (159, 'sale_commition', '', 'referlevel_1', 1, ''),
                (160, 'ex_commition', '', 'referlevel_1', 1, ''),
                (161, 'ex_action_commition', '', 'referlevel_1', 1, ''),
                (162, 'commition', '', 'referlevel_2', 1, ''),
                (163, 'sale_commition', '', 'referlevel_2', 1, ''),
                (164, 'ex_commition', '', 'referlevel_2', 1, ''),
                (165, 'ex_action_commition', '', 'referlevel_2', 1, ''),
                (166, 'commition', '', 'referlevel_3', 1, ''),
                (167, 'sale_commition', '', 'referlevel_3', 1, ''),
                (168, 'ex_commition', '', 'referlevel_3', 1, ''),
                (169, 'ex_action_commition', '', 'referlevel_3', 1, ''),
                (170, 'commition', '', 'referlevel_4', 1, ''),
                (171, 'sale_commition', '', 'referlevel_4', 1, ''),
                (172, 'ex_commition', '', 'referlevel_4', 1, ''),
                (173, 'ex_action_commition', '', 'referlevel_4', 1, ''),
                (174, 'commition', '', 'referlevel_5', 1, ''),
                (175, 'sale_commition', '', 'referlevel_5', 1, ''),
                (176, 'ex_commition', '', 'referlevel_5', 1, ''),
                (177, 'ex_action_commition', '', 'referlevel_5', 1, ''),
                (178, 'commition', '', 'referlevel_6', 1, ''),
                (179, 'sale_commition', '', 'referlevel_6', 1, ''),
                (180, 'ex_commition', '', 'referlevel_6', 1, ''),
                (181, 'ex_action_commition', '', 'referlevel_6', 1, ''),
                (182, 'commition', '', 'referlevel_7', 1, ''),
                (183, 'sale_commition', '', 'referlevel_7', 1, ''),
                (184, 'ex_commition', '', 'referlevel_7', 1, ''),
                (185, 'ex_action_commition', '', 'referlevel_7', 1, ''),
                (186, 'commition', '', 'referlevel_8', 1, ''),
                (187, 'sale_commition', '', 'referlevel_8', 1, ''),
                (188, 'ex_commition', '', 'referlevel_8', 1, ''),
                (189, 'ex_action_commition', '', 'referlevel_8', 1, ''),
                (190, 'commition', '', 'referlevel_9', 1, ''),
                (191, 'sale_commition', '', 'referlevel_9', 1, ''),
                (192, 'ex_commition', '', 'referlevel_9', 1, ''),
                (193, 'ex_action_commition', '', 'referlevel_9', 1, ''),
                (194, 'commition', '', 'referlevel_10', 1, ''),
                (195, 'sale_commition', '', 'referlevel_10', 1, ''),
                (196, 'ex_commition', '', 'referlevel_10', 1, ''),
                (197, 'ex_action_commition', '', 'referlevel_10', 1, ''),
                (198, 'status', '0', 'marketpostback', 1, ''),
                (199, 'url', '', 'marketpostback', 1, ''),
                (200, 'static', '[]', 'marketpostback', 1, ''),
                (201, 'marketvendorstatus', '1', 'market_vendor', 1, ''),
                (202, 'commission_type', '', 'market_vendor', 1, ''),
                (203, 'commission_sale', '', 'market_vendor', 1, ''),
                (204, 'sale_status', '0', 'market_vendor', 1, ''),
                (205, 'click_allow', 'single', 'market_vendor', 1, ''),
                (206, 'commission_number_of_click', '', 'market_vendor', 1, ''),
                (207, 'commission_click_commission', '', 'market_vendor', 1, ''),
                (208, 'click_status', '0', 'market_vendor', 1, '');
                            
                ");

                

				

				

				$this->db->query("INSERT INTO `mail_templates` (`id`, `unique_id`, `name`, `subject`, `text`, `admin_subject`, `client_subject`, `client_text`, `admin_text`, `shortcode`) VALUES

                    (1, '', 'User Registration', 'User Registration Successfully', '<p>Dear [[firstname]],</p>\r\n\r\n<p>Your new affiliate user account has been created welcome to the [[website_name]]</p>\r\n\r\n<p>your account details:</p>\r\n\r\n<p>================</p>\r\n\r\n<p>[[firstname]]</p>\r\n\r\n<p>[[username]]</p>\r\n\r\n<p>[[email]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'Admin : New affiliate user Register', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>&nbsp;New affiliate user Register on your site&nbsp;[[website_name]]</p>\r\n\r\n<p>Affiliate details:</p>\r\n\r\n<p>============</p>\r\n\r\n<p>[[firstname]]</p>\r\n\r\n<p>[[username]]</p>\r\n\r\n<p>[[email]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo'),

                    (2, '', 'Client Registration', 'New Client Register Under you', '<p>Dear [[firstname]],</p>\r\n\r\n<p>New client account has been created under you</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'Admin : New Client Register', 'Dear [[firstname]], Welcome To Our Store', '<p>Dear [[firstname]],</p>\r\n\r\n<p>welcome to the [[website_name]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', '<p>Dear Admin,</p>\r\n\r\n<p>New client has been registered on your store</p>\r\n\r\n<p>[[firstname]] ,&nbsp;[[lastname]]&nbsp;</p>\r\n\r\n<p>[[email]] | [[username]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo'),

                    (3, '', 'Forget Password', 'User Forget Password', '<p>Dear [[firstname]],</p>\r\n\r\n<p>You recently request to reset your password from your [[website_name]] account click the below link to reset password</p>\r\n\r\n<p>[[reset_link]]</p>\r\n\r\n<p>If you did not request a password rest, please ignore this email or reply us know.</p>\r\n\r\n<p>[[website_name]]</p>\r\n\r\n<p>If you did not request a password rest, please ignore this email or reply us know.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks<br />\r\n[[website_name]]</p>\r\n', 'Admin : Forget Password', 'Client : Forget Password', '<p>Dear [[firstname]],</p>\r\n\r\n<p>You recently request to reset your password from your [[website_name]] account click the below link to reset password</p>\r\n\r\n<p>[[reset_link]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If you did not request a password rest, please ignore this email or reply us know.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks<br />\r\n[[website_name]]</p>\r\n', '<p>Dear [[firstname]],</p>\r\n\r\n<p>You recently request to reset your password from your [[website_name]] account click the below link to reset password</p>\r\n\r\n<p>[[reset_link]]</p>\r\n\r\n<p>If you did not request a password rest, please ignore this email or reply us know.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks<br />\r\n[[website_name]]</p>\r\n', 'reset_link,firstname,lastname,email,username,website_name,website_logo'),

                    (4, '', 'Send Wallet withdrawal Request', 'Send Wallet Withdrawal Request', '<p>Dear [[name]],</p>\r\n\r\n<p>Your withdrawal request is accept successfully and procced shortly</p>\r\n\r\n<p>Amount : [[amount]]</p>\r\n\r\n<p>Thanks<br />\r\n[[website_name]]</p>\r\n', 'Admin : Send Wallet Withdrawal Request', '', '', '<p>Dear [[name]],</p>\r\n\r\n<p>Your withdrawal request is accept successfully and procced shortly</p>\r\n\r\n<p>Amount : [[amount]]</p>\r\n\r\n<p>Thanks<br />\r\n[[website_name]]</p>\r\n', 'amount,comment,name,user_email,commission_type,website_name,website_logo'),

                    (5, '', 'withdrawal request status change', 'Your withdrawal request status change', '<p>Dear [[name]],</p>\r\n\r\n<p>Your withdrawal request status has been change to : <strong>[[new_status]]</strong></p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'Admin side', '', '', '<p>Dear [[name]],</p>\r\n\r\n<p>Withdrawal request status has been change to : <strong>[[new_status]]</strong></p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'amount,comment,name,user_email,commission_type,website_name,website_logo,new_status'),

                    (6, '', 'Store Contact Us', '', '', 'Admin : Store Contact Us', 'We will contact to you shortly ..!', '<p>&nbsp;</p>\r\n\r\n<p><strong>Name </strong>: [[name]]</p>\r\n\r\n<p><strong>Email </strong>: [[email]]</p>\r\n\r\n<p><strong>Phone </strong>: [[phone]]</p>\r\n\r\n<p><strong>Message</strong> :</p>\r\n\r\n<p>[[message]]</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Hey Admin <strong>[[name]] </strong>trying to contact you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Name </strong>: [[name]]</p>\r\n\r\n<p><strong>Email </strong>: [[email]]</p>\r\n\r\n<p><strong>Phone </strong>: [[phone]]</p>\r\n\r\n<p><strong>Message</strong> :</p>\r\n\r\n<p>[[message]]</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'name,email,phone,message,website_name,website_logo'),

                    (7, '', 'Order Status Has Been Change', 'Your Order Status Has Been Change', '<p>Hello<strong>&nbsp;[[firstname]] [[lastname]]</strong></p>\r\n\r\n<p>Your Order Status Has Been Change to <strong>[[status]]</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[comment]]</p>\r\n\r\n<p><br />\r\norder Id :<strong> [[order_id]]</strong></p>\r\n', 'Admin : Your Order Status Has Been Change', 'Client: Your Order Status Has Been Change', '<p>Hello<strong>&nbsp;[[firstname]] [[lastname]]</strong></p>\r\n\r\n<p>Your Order Status Has Been Change to <strong>[[status]]</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[comment]]</p>\r\n\r\n<p><br />\r\norder Id :<strong> [[order_id]]</strong></p>\r\n', '<p>Hello<strong>&nbsp;[[firstname]] [[lastname]]</strong></p>\r\n\r\n<p>Your Order Status Has Been Change to <strong>[[status]]</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[comment]]</p>\r\n\r\n<p><br />\r\norder Id :<strong> [[order_id]]</strong></p>\r\n', 'order_id,status,order_link,product_name,product_description,commission_type,PhoneNumber,firstname,lastname,commission,total,currency_code,txn_id,website_name,website_logo,comment'),

                    (8, '', 'New Order', 'Affiliate: New Order Commission From [[firstname]] [[lastname]]', '<p>Hello Affiliate,</p>\r\n\r\n<p>you got new order Commission from sale thats done under [[firstname]] [[lastname]]</p>\r\n\r\n<p>Commission: [[commission]] -&nbsp;[[commission_type]]</p>\r\n\r\n<p><strong>Commission for product_name :&nbsp;</strong>[[product_name]]&nbsp;[[variation_details]]</p>\r\n\r\n<p><strong>product_description</strong> : [[product_description]]</p>\r\n', 'Admin : New Order [[order_id]] has been successfully placed.', 'Client : New Order [[order_id]] has been successfully placed.', '<p>Dear Client,</p>\r\n\r\n<p>New Order <strong>[[order_id]] </strong>has been successfully placed on your site [[website_name]] .</p>\r\n\r\n<p><strong>Order Status</strong> : [[status]]<br />\r\n<strong>Total Amount</strong> : [[total]]<br />\r\n<strong>Transaction ID</strong> : [[txn_id]]</p>\r\n\r\n<p>[[order_link]]</p>\r\n', '<p>Dear Admin,</p>\r\n\r\n<p>New Order <strong>[[order_id]] </strong>has been successfully placed on your site [[website_name]] .</p>\r\n\r\n<p><strong>Order Status</strong> : [[status]]<br />\r\n<strong>Total Amount</strong> : [[total]]<br />\r\n<strong>Transaction ID</strong> : [[txn_id]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[order_link]]</p>\r\n', 'order_id,status,order_link,product_name,variation_details,product_description,commission_type,PhoneNumber,firstname,lastname,commission,total,currency_code,txn_id,website_name,website_logo,order_id'),

                    (10, '', 'get market click notification', 'Get market click notification', '<p>Dear [[name]],</p>\r\n\r\n<p>[[firstname]] [[lastname]] got commition from market [[affiliateads_type]] click</p>\r\n\r\n<p>Commition : [[affiliate_commission]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'Admin : Get market click notification', '', '', '<p>Dear [[name]],</p>\r\n\r\n<p>[[firstname]] [[lastname]] got commition from market [[affiliateads_type]] click</p>\r\n\r\n<p>Commition : [[affiliate_commission]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'affiliateads_type,affiliate_commission,firstname,lastname,email,username,website_name,website_logo'),

                    (11, '', 'External Website New Order', 'External Website New Order [[external_website_name]]', '<p>Hey&nbsp;[[username]]</p>\r\n\r\n<p>You have got&nbsp;[[commission]] from [[external_website_name]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Thanks&nbsp;</strong></p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'External Website New Order [[external_website_name]]', '', '', '<p>Hey New Order Placed at&nbsp;[[external_website_name]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>User </strong>:&nbsp;[[username]]</p>\r\n\r\n<p><strong>Website </strong>:&nbsp;[[external_website_name]]</p>\r\n\r\n<p><strong>commission </strong>: [[commission]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Thanks&nbsp;</strong></p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'external_website_name,commission,username,website_name,website_logo,product_ids,total,currency,commission_type,script_name'),

                    (12, '', 'wallet status change to in wallet', '[[amount]] credited in your wallet', '<p>Dear [[name]],</p>\r\n\r\n<p>[[comment]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', '', '', '', '', 'amount,comment,name,user_email,website_name,website_logo,new_status'),

                    (13, '', 'User Registration From Integration', 'User Registration Successfully', '<p>Dear [[firstname]],</p>\r\n\r\n<p>Your new affiliate user account has been created welcome to the [[website_name]]</p>\r\n\r\n<p>your account details:</p>\r\n\r\n<p>================</p>\r\n\r\n<p>[[firstname]]</p>\r\n\r\n<p>[[username]]</p>\r\n\r\n<p>[[email]]</p>\r\n\r\n<h2>password is :&nbsp;<strong>[[password]]</strong></h2>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'Admin : New affiliate user Register From Integration', '', '', '<p>Dear Admin,</p>\r\n\r\n<p>&nbsp;New affiliate user Register on your site&nbsp;[[website_name]]</p>\r\n\r\n<p>Affiliate details:</p>\r\n\r\n<p>============</p>\r\n\r\n<p>[[firstname]]</p>\r\n\r\n<p>[[username]]</p>\r\n\r\n<p>[[email]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'firstname,lastname,email,username,password,website_name,website_logo'),

                    (36, 'new_order_for_vendor', 'Vendor Got New Order', 'Vendor: You have new order from [[firstname]] [[lastname]]', '<p>Hello Vendor,</p>\r\n                    <p>you got new order from [[firstname]] [[lastname]]</p>\r\n                    <p>Commission: [[vendor_commission]] </p>\r\n                    <p>Order Status: [[status]] </p>\r\n                    <p><strong>Commission for product_name :&nbsp;</strong>[[product_name]]</p>\r\n                    [[website_name]]<br />\r\n                            Support Team</p>\r\n                ', '', '', '', '', 'vendor_firstname,vendor_lastname,vendor_commission,order_id,status,order_link,product_name,PhoneNumber,firstname,lastname,commission,total,currency_code,txn_id,website_name,website_logo,order_id'),

                    (37, 'vendor_form_status_1', 'Vendor Form Status Change To Approved', 'Form Status Change To Approved', '<p>Dear, [[username]]</p>\r\n                                <p>Form Status Change to Approved</p>\r\n                                <p>Name [[title]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', '', '', '', '', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,title'),

                    (38, 'vendor_create_product', 'Vendor Create new product', '', '', 'New Product Created By Vendor', '', '', '<p>Dear Admin,</p>\r\n                                <p>New Product has been created</p>\r\n                                <p>Name [[product_name]]</p>\r\n                                <p>Username [[username]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,product_name,product_short_description,product_price,product_sku,product_id'),

                    (39, 'vendor_product_status_1', 'Vendor Product Status Change To Approved', 'Product Status Change To Approved', '<p>Dear, [[username]]</p>\r\n                                <p>Product Status Change to Approved</p>\r\n                                <p>Name [[product_name]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', '', '', '', '', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,product_name,product_short_description,product_price,product_sku,product_id'),

                    (40, 'vendor_create_form', 'Vendor Create new product', '', '', 'New Form Created By Vendor', '', '', '<p>Dear Admin,</p>\r\n                                <p>New Form has been created</p>\r\n                                <p>Name [[title]]</p>\r\n                                <p>Username [[username]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,title'),

                    (41, 'vendor_form_status_0', 'Vendor Form Status Change To In Review', 'Form Status Change To In Review', '<p>Dear,</p>\r\n                                <p>Form Status Change to In Review</p>\r\n                                <p>Name [[title]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', 'Form Status Change To In Review', '', '', '<p>Dear,</p>\r\n                                <p>Form Status Change to In Review</p>\r\n                                <p>Name [[title]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,title'),

                    (42, 'vendor_form_status_2', 'Vendor Form Status Change To Denied', 'Form Status Change To Denied', '<p>Dear, [[username]]</p>\r\n                                <p>Form Status Change to Denied</p>\r\n                                <p>Name [[title]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', '', '', '', '', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,title'),

                    (43, 'vendor_order_status_complete', 'Vendor Order Status Has Been Change', 'Vendor: New Order Commission From [[firstname]] [[lastname]]', '<p>Hello Vendor,</p>\r\n                    <p>you got new order Sale Commission from sale thats done under [[firstname]] [[lastname]]</p>\r\n                    <p>Commission: [[vendor_commission]] </p>\r\n                    <p><strong>Commission for product_name :&nbsp;</strong>[[product_name]]</p>\r\n                    [[website_name]]<br />\r\n                            Support Team</p>\r\n                ', '', '', '', '', 'vendor_firstname,vendor_lastname,vendor_commission,order_id,status,order_link,product_name,commission_type,PhoneNumber,firstname,lastname,commission,total,currency_code,txn_id,website_name,website_logo,order_id'),

                    (45, 'vendor_create_program', 'Vendor Create new product', '', '', 'New Program Created By Vendor : [[name]]', '', '', '<p>Dear Admin,</p>\r\n                    <p>New Program has been created</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name'),

                    (46, 'vendor_program_status_2', 'Vendor Program Status Change To Denied', 'Program Status Change To Denied', '<p>Dear,</p>\r\n                    <p>Program Status Change to Denied</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Program Status Change To Denied', '', '', '<p>Dear,</p>\r\n                    <p>Program Status Change to Denied</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name'),

                    (47, 'vendor_program_status_3', 'Vendor Program Status Change To Ask To Edit', 'Program Status Change To Ask To Edit', '<p>Dear,</p>\r\n                    <p>Program Status Change to Ask To Edit</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Program Status Change To Ask To Edit', '', '', '<p>Dear,</p>\r\n                    <p>Program Status Change to Ask To Edit</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name'),

                    (48, 'vendor_program_status_0', 'Vendor Program Status Change To In Review', 'Program Status Change To In Review', '<p>Dear,</p>\r\n                    <p>Program Status Change to In Review</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Program Status Change To In Review', '', '', '<p>Dear,</p>\r\n                    <p>Program Status Change to In Review</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name'),

                    (49, 'vendor_program_status_1', 'Vendor Program Status Change To Approved', 'Program Status Change To Approved', '<p>Dear,</p>\r\n                    <p>Program Status Change to Approved</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Program Status Change To Approved', '', '', '<p>Dear,</p>\r\n                    <p>Program Status Change to Approved</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name'),

                    (51, 'vendor_create_ads', 'Vendor Create Ads (Banner, Text, Link, Video)', '', '', 'New Ads ([[type]]) Created By Vendor', '', '', '<p>Dear Admin,</p>\r\n                    <p>New Ads - [[type]] has been created</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name,type,tool_type'),

                    (52, 'vendor_ads_status_1', 'Vendor Ads (Banner, Text, Link, Video) Status Change To Approved', 'Ads ([[type]]) Status Change To Approved', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to Approved </p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Ads ([[type]]) Status Change To Approved', '', '', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to Approved </p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name,type,tool_type'),

                    (53, 'vendor_ads_status_0', 'Vendor Ads (Banner, Text, Link, Video) Status Change To In Review', 'Ads ([[type]]) Status Change To In Review', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to In Review </p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Ads ([[type]]) Status Change To In Review', '', '', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to In Review </p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name,type,tool_type'),

                    (54, 'vendor_ads_status_3', 'Vendor Ads (Banner, Text, Link, Video) Status Change To Ask To Edit', 'Ads ([[type]]) Status Change To Ask To Edit', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to Ask To Edit</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Ads ([[type]]) Status Change To Ask To Edit', '', '', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to Ask To Edit</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name,type,tool_type'),

                    (55, 'order_on_vendor_program', 'New Order in Vendor Program', 'New Order Create In Your Program', '<p>Dear Vendor,</p>\r\n                    <p>New Order Created under your Program</p>\r\n                    <p><b>Website</b> : [[external_website_name]]</p>\r\n                    <p><b>Total</b> : [[total]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', '', '', '', '', 'external_website_name,commission,username,website_name,website_logo,product_ids,total,currency,commission_type,script_name'),

                    (57, 'withdrwal_status_change', 'Withdrawal Request Status Changed', 'Withdrawal Request Status Changed', '<p>Dear,</p>\r\n                <p>Your Withdrawal Request #([[request_id]]) Status has been change to <b><i>[[status]]</i></b></p>\r\n\r\n                    <p>Comment: [[comment]] </p>\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', '', NULL, NULL, '', 'comment,status,request_id,firstname,lastname,email,username,website_name,website_logo,name'),

                    (59, 'send_register_mail_api', 'User Registration (API)', 'Your Account Created Successfully On [[website_name]]', '<p>Welcome to [[website_name]]</p>\r\n\r\n<p>Dear [[firstname]],</p>\r\n\r\n<p>Thanks for signing up [[website_name]].</p>\r\n\r\n<p>Your&nbsp;Login&nbsp;credentials:</p>\r\n\r\n<p>Username:&nbsp;<strong>[[username]]</strong><br />\r\nPassword:&nbsp;<strong>*******</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"[[website_url]]\">Login To [[website_name]]</a></p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'User Registration Successfully', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>New affiliate user Register on your site&nbsp;[[website_name]]</p>\r\n\r\n<p>Affiliate details:</p>\r\n\r\n<p>============</p>\r\n\r\n<p>[[firstname]]</p>\r\n\r\n<p>[[username]]</p>\r\n\r\n<p>[[email]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'firstname,lastname,email,username,website_url,website_name,website_logo,name'),

                    (63, 'subscription_status_change', 'Subscription Status Changed', 'Subscription Status Changed', '<p>Dear [[firstname]],</p>\r\n                <p>Your subscription status has been changed to [[status_text]]</p>\r\n                <p>Comment: [[comment]] </p>\r\n                [[website_name]]<br />\r\n                Support Team</p>', '', NULL, NULL, '', 'comment,planname,price,expire_at,started_at,status_text,firstname,lastname,email,username,website_url,website_name,website_logo,name'),

                    (64, 'subscription_buy', 'Subscription Buy', 'Subscription Buy', '<h2>Thanks for your order</h2>\r\n\r\n<p>Welcome to Prime. As a Prime member, enjoy these great benefits. If you have any questions, call us any time at or simply reply to this email.</p>\r\n', 'New Subscription Buy From [[firstname]] [[lastname]]', NULL, NULL, '<h2>Thanks for your order</h2>\r\n\r\n<p>Welcome to Prime. As a Prime member, enjoy these great benefits. If you have any questions, call us any time at or simply reply to this email.</p>\r\n', 'planname,price,expire_at,started_at,firstname,lastname,email,username,website_url,website_name,website_logo,name'),

                    (65, 'subscription_expire_notification', 'Subscription Expire Notification', 'Your Subscription Will Be Expired Soon.', '<p>customText</p>\r\n', NULL, NULL, NULL, NULL, 'planname,price,expire_at,started_at,firstname,lastname,email,username,website_url,website_name,website_logo,name'),

                    (66, 'wallet_noti_on_hold_wallet', 'Wallet Status Change To On Hold', '[[amount]] is put on hold in your wallet', '<p>Dear [[name]],</p>\n        <p>Transactions #[[id]] status changed to [[new_status]]. amount is [[amount]]</p>\n        <p><br />\n        [[website_name]]<br />\n        Support Team</p>\n', '', NULL, NULL, NULL, 'amount,id,name,new_status,user_email,website_name,website_logo,name'),

                    (67, 'new_user_request', 'New User Request', 'User Registration Successfull', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>User account has been registered successfully on [[website_name]], please wait while system admin apporve&nbsp;your request.<br />\r\nWe will inform you once account has been approved, Thank You.</p>\r\n\r\n<p>Support Team<br />\r\n[[website_name]]</p>\r\n', 'New User Registration - Approval Pending', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>New user has been registered on [[website_name]], apporval is pending yet!</p>\r\n\r\n<p>User Details</p>\r\n\r\n<p>Name : [[firstname]][[lastname]]<br />\r\nEmail :&nbsp;[[email]]<br />\r\nUsername : [[username]]<br />\r\nSupport Team<br />\r\n[[website_name]]</p>', 'firstname,lastname,email,username,website_name,website_logo'),

                    (68, 'new_user_approved', 'New User Request Approved', 'User Account Approved', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>Your new user account registration request is accepted by admin, you can login and use services.</p>\r\n\r\n<p>[[website_name]]<br />\r\nSupport Team</p>\r\n', 'User Account Approved', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>You have approced registration request of user having</p>\r\n\r\n<p>Name : [[firstname]]&nbsp;[[lastname]]</p>\r\n\r\n<p>Email : [[email]]</p>\r\n\r\n<p>Username : [[username]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Support Team</p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo'),

                    (69, 'new_user_declined', 'New User Request Declined', 'User Account Declined', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>Your new user account registration request is declined by admin, for more information please contact supprt team</p>\r\n\r\n<p>[[website_name]]<br />\r\nSupport Team</p>\r\n', 'User Account Declined', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>You have declined registration request of user having</p>\r\n\r\n<p>Name : [[firstname]]&nbsp;[[lastname]]</p>\r\n\r\n<p>Email : [[email]]</p>\r\n\r\n<p>Username : [[username]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Support Team</p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo')



                    ");



				

				/*The default setting fuction end here*/

				$folder_path = [];

				$folder_path[] =  FCPATH."assets/images/product/upload/thumb/";

				$folder_path[] =  FCPATH."application/logs/";

				$folder_path[] =  FCPATH."application/backup/mysql/";

				$folder_path[] =  FCPATH."application/core/excel/output/";

				$folder_path[] =  FCPATH."application/downloads/";

				$folder_path[] =  FCPATH."application/downloads_order/";

				$folder_path[] =  FCPATH."application/market_cache/";

				$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/form/favi/";

				$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/payments/";

				$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/product/upload/thumb/";

				$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/site/";

				$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/themes/";

				$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/wallet-icon/";

				$folder_path[] =  FCPATH."assets/image_cache/cache/assets/vertical/assets/images/users/";

				$folder_path[] =  FCPATH."assets/images/form/favi/";

				$folder_path[] =  FCPATH."assets/images/site/";

				$folder_path[] =  FCPATH."assets/images/theme_images/";

				$folder_path[] =  FCPATH."assets/images/users/";

				$folder_path[] =  FCPATH."assets/images/users/thumb/";

				$folder_path[] =  FCPATH."assets/integration/uploads/";

				$folder_path[] =  FCPATH."assets/user_upload/";

				



				foreach ($folder_path as $key => $value) {

					$files = glob($value.'/*');

					foreach($files as $file) { 

						if(is_file($file))  unlink($file);  

					}

				}



				$u = $this->session->administrator;

				$user_details_array = $this->db->query("SELECT * FROM users WHERE id=". $u['id'])->row_array();

				$this->session->set_userdata(array('administrator'=>$user_details_array));



				$this->session->set_flashdata('success', __('admin.data_was_deleted_successfully'));

				$json['success'] = true;

			}

       

		} else {

			$json['errors']['admin_password'] = "Wrong Password..!";

		}



       	echo json_encode($json);

   }



	public function logs(){

		$data = array();

		$input = $this->input->post(null,true);

	



		$filter = array();



		$data['status'] = $this->Wallet_model->status;

		$data['status_icon'] = $this->Wallet_model->status_icon;

		if($input['type'] == 'sale'){

			$data['title'] = "Sales Logs";

			/*$filter['type_in'] = "'sale_commission','vendor_sale_commission'";

			$data['data'] = $this->Wallet_model->getTransaction($filter);*/

			$record = $this->db->query('SELECT o.* FROM `order_products` op LEFT JOIN `order` as o ON o.id = op.order_id WHERE o.status = 1')->result_array();



			$order_status = $this->Order_model->status;

			$_record = array();

			foreach ($record as $_key => $value) {

				$_record[] = array(

					'created_at'   => $value['created_at'],

					'comment'      => 'Order from ip_message ',

					'status'       => $order_status[$value['status']],

					'country_code' => $value['country_code'],

					'user_ip'      => $value['ip'],

					'amount'       => $value['total'],

				);

			}



			$data['data'] = $_record;

		}

		else if($input['type'] == 'hold_orders'){

			$data['title'] = "Hold Orders Logs";

			/*$filter['type'] = "sale_commission";

			$filter['status'] = 0;

			$data['data'] = $this->Wallet_model->getTransaction($filter);*/

			

			$order_status = $this->Order_model->status;

			$record = $this->db->query('SELECT o.* FROM `order_products` op LEFT JOIN `order` as o ON o.id = op.order_id WHERE o.status = 7')->result_array();



			$_record = array();

			foreach ($record as $_key => $value) {

				$_record[] = array(

					'created_at'   => $value['created_at'],

					'comment'      => 'Order from ip_message ',

					'status'       => $order_status[$value['status']],

					'country_code' => $value['country_code'],

					'user_ip'      => $value['ip'],

					'amount'       => $value['total'],

				);

			}



			$data['data'] = $_record;

		}

		else if($input['type'] == 'orders'){

			$order_status = $this->Order_model->status;

			$data['title'] = "Digital Orders";

			$record = $this->db->query('SELECT o.* FROM `order_products` op LEFT JOIN `order` as o ON o.id = op.order_id WHERE o.status > 0')->result_array();



			$_record = array();

			foreach ($record as $_key => $value) {

				$_record[] = array(

					'created_at'   => $value['created_at'],

					'comment'      => 'Order from ip_message ',

					'status'       => $order_status[$value['status']],

					'country_code' => $value['country_code'],

					'user_ip'      => $value['ip'],

					'amount'       => $value['total'],

				);

			}





			$data['data'] = $_record;

		}

		else if($input['type'] == 'ex_orders'){

			$data['title'] = "External Orders";

			$record = $this->db->query('SELECT * FROM `integration_orders`')->result_array();

 

			$_record = array();

			foreach ($record as $_key => $value) {

				$_record[] = array(

					'created_at'   => $value['created_at'],

					'comment'      => 'Order from ip_message ',

					'status'       => 'Complete',

					'country_code' => $value['country_code'],

					'user_ip'      => $value['ip'],

					'amount'       => $value['total'],

				);

			}



			$data['data'] = $_record;

		}

		else if($input['type'] == 'click'){

			$data['title'] = "Wallet Logs";

			$data['title2'] = "Clicks Logs";

			/*$filter['click_log'] = 1;

			$data['data'] = $this->Wallet_model->getTransaction($filter);*/



			$record = $this->db->query('SELECT * FROM wallet WHERE type IN ("click_commission","form_click_commission","affiliate_click_commission") AND comm_from = "store" AND status > 0')->result_array();



			$_record = array();

			foreach ($record as $_key => $value) {

				$_record[] = array(

					'created_at'   => $value['created_at'],

					'comment'      => $value['comment'],

					'status'       => $data['status'][$value['status']],

					'country_code' => $value['country_code'],

					'user_ip'      => json_decode($value['ip_details'], true)['ip'],

					'amount'       => $value['amount'],

				);

			}

			$data['data'] = $_record;





			$record = array();

			// $record[] = $this->db->query('SELECT country_code,created_at,ip  as user_ip,commission as pay_commition,"Integration Click" as type FROM integration_clicks_action WHERE is_action=0')->result_array();

			$record[] = $this->db->query('SELECT country_code,created_at,user_ip,pay_commition,"Product Click" as type  FROM product_action WHERE  1')->result_array();

			$record[] = $this->db->query('SELECT country_code,created_at,user_ip,pay_commition,"Form Click" as type  FROM form_action WHERE 1')->result_array();

			$record[] = $this->db->query('SELECT country_code,created_at,user_ip,commission as pay_commition,"Affiliate Click" as type FROM affiliate_action WHERE 1')->result_array();



			$_record = array();

			foreach ($record as $key => $re) {

				foreach ($re as $_key => $value) {

					$_record[] = array(

						'created_at' => $value['created_at'],

						'comment' => 'Click from ip_message ',

						'status' => $value['type'],

						'country_code' => $value['country_code'],

						'user_ip' => $value['user_ip'],

					);

				}

			}



			usort($_record, array('Admincontrol', 'date_compare') ); 

			$data['data2'] = $_record;

		}

		else if($input['type'] == 'action'){

			$data['title'] = "Action Logs";

			$filter['type'] = "external_click_commission";

			$filter['is_action'] = 1;

			$data['data'] = $this->Wallet_model->getTransaction($filter);

		}

		else if($input['type'] == 'hold_actions'){

			$data['title'] = "Hold Action Logs";

			$filter['type'] = "external_click_commission";

			$filter['is_action'] = 1;

			$filter['status'] = 0;

			$data['data'] = $this->Wallet_model->getTransaction($filter);

		}

		else if($input['type'] == 'member'){

			$data['title'] = "Member";

			$data['type'] = "members";

		

			$record = $this->db->query("SELECT u.created_at,c.name,c.sortname,u.firstname,u.lastname,u.email,u.username

            FROM users as u 

                LEFT JOIN countries c ON c.id = u.Country

            WHERE type='client' ORDER BY created_at DESC")->result_array();



           	$data['data'] = array();

           	foreach ($record as $key => $value) {

           		if ($value['sortname'] != '') {

	       			$flag = base_url('assets/vertical/assets/images/flags/' . strtolower($value['sortname']) . '.png');

	         	} else {

	        		$flag = base_url('assets/vertical/assets/images/users/avatar-1.png');

	  			}

           		$data['data'][] = array(

					'name'     => $value['firstname'] ." " .$value['lastname'],

					'username' => $value['username'],

					'sortname' => $value['sortname'],

					'email'    => $value['email'],

					'created_at'    => $value['created_at'],

					'flag'     => $flag,

           		);

           	}

		}

	

		$data['html'] = $this->load->view("common/log_model",$data,true);



		echo json_encode($data);die;

	}



	public function page_404(){

		$this->load->view("404");

	}





	public function install_new_version(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/setting/install_new_version', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function language_import(){

		$files = ['admin','client','store','user','front','template_simple'];

		include APPPATH . '/core/excel/Classes/PHPExcel.php';

		$json = array();

		$translation_id = (int)$this->input->post('id',true);



		$language = $this->db->query("SELECT * FROM language WHERE id=".$translation_id)->row_array();

		if(!$language){

			$json['warning'] = "Something Wrong.!";

		}



		if(!isset($_FILES['file']['error']) || $_FILES['file']['error'] != 0){

			$json['warning'] = "Please Select Excel File..!";

		} else {

			$extension = pathinfo($_FILES['file']["name"], PATHINFO_EXTENSION);

			if($extension != 'xlsx'){

				$json['warning'] = "Only xlsx files are allowed.!";

			}

		}



		if(!isset($json['warning'])){

			$inputFileName = $_FILES['file']['tmp_name'];

			$objReader = PHPExcel_IOFactory::createReader('Excel2007'); 

			$worksheetList = $objReader->listWorksheetNames($inputFileName);

			$sheetname = $worksheetList[0]; 



			foreach ($files as $key => $file) {

				if(!in_array($file, $worksheetList)){

					$json['warning'] = "Sheet <b>{$file}</b> is missing check your excel file..!";

					break;

				}

			}

			$lang_data = array();



			if(!isset($json['warning'])){

				foreach ($files as $key => $file) {

					$objReader->setLoadSheetsOnly($file); 

					$objPHPExcel = $objReader->load($inputFileName);

					$worksheet = $objPHPExcel->getActiveSheet();

					$l = $worksheet->toArray(null,true,true,true);

					unset($l[1]);

					foreach ($l as $key => $value) {

						$lang_data[$file][$value['A']] = $value['B'];

					}

				}



				$translation_id = (int)$this->input->post('id',true);

				foreach ($lang_data as $file => $data) {

					$path = APPPATH.'language/'. $translation_id."/".$file.".php";

					$file_content = '<?php '.PHP_EOL;

					foreach ($data as $key => $value) {

						$file_content .= '$lang[\''. $key .'\'] = '. $this->db->escape($value) .';' .PHP_EOL;

					}

				



					file_put_contents($path, $file_content);

				}



				$json['success'] = "Languages file imported successfully..!";

			}

		}



		echo json_encode($json);die;

	}



	public function language_export($id = 'default'){

		$files = ['admin','client','store','user','front','template_simple'];

		include APPPATH . '/core/excel/Classes/PHPExcel.php';

		if($id == "1") $id = 'default';



		$objPHPExcel = new PHPExcel();

		$sheet = $objPHPExcel->getActiveSheet();

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');



		foreach ($files as $i => $file) {

			if(is_file(APPPATH.'/language/'. $id .'/'. $file .'.php')){

				$lang = array();

	            require  APPPATH.'/language/default/'. $file .'.php';

	            $defaultLang = $lang;



				$lang = array();

	            require  APPPATH.'/language/'. $id .'/'. $file .'.php';



	            $objWorkSheet = $objPHPExcel->createSheet($i);

	            $data = array();

	            $data[] = array('KEY','TRANSLATION');

	            $lang = array_merge($defaultLang, $lang);

	            

	            foreach ($lang as $key => $value) {

	            	$data[] = array($key,$value);

	            }

	            $objWorkSheet->fromArray($data, NULL, 'A1');

			    $objWorkSheet->setTitle($file);

	        }

		}



		header('Content-type: application/vnd.ms-excel');

		header('Content-Disposition: attachment; filename="'. $id .'.xlsx"');

		$objWriter->save('php://output');

	}



	public function language(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$language = $this->db->query("SELECT * FROM language ")->result_array();

		$data['language_count'] = langCount('default');

		foreach ($language as $key => $value) {

			$data['language'][$key] = $value;

			$data['language'][$key]['count'] = langCount($value['id']);

		}



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/language/index', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function coupon_manage($coupon_id = 0){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$this->load->model("Coupon_model");

		$data['coupon'] = $this->Coupon_model->getCoupon($coupon_id);

		$data['product'] = $this->db->query("SELECT product_id,product_name FROM product")->result_array();

	



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/coupon/form', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function coupon_delete($coupon_id){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$this->load->model("Coupon_model");

		$this->Coupon_model->deleteCoupon($coupon_id);



		$this->session->set_flashdata('success', __('admin.coupon_deleted_successfully'));

	



		redirect(base_url("admincontrol/coupon"));

	}

	public function coupon(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$this->load->model("Coupon_model");

		$data['coupons'] = $this->Coupon_model->getCoupons();

		$ptotal = $this->db->query('SELECT product_id FROM product')->num_rows();

		 

		foreach ($data['coupons'] as $key => $value) {

			if(strtolower($value['allow_for']) == 's'){

				$data['coupons'][$key]['product_count'] = count(explode(',', $value['products']));

			}else{

				$data['coupons'][$key]['product_count'] = $ptotal;

			}

			$data['coupons'][$key]['count_coupon'] = $this->Coupon_model->getCouponCount($value['coupon_id']);

		}

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/coupon/index', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}

	public function save_coupon(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$this->load->library('form_validation');

		$json = array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		$this->form_validation->set_rules('code', 'Coupon Code', 'required|trim');

		$this->form_validation->set_rules('type', 'Type', 'required|trim');

		$this->form_validation->set_rules('allow_for', 'Allow For', 'required|trim');

		$this->form_validation->set_rules('discount', 'Discount', 'required|trim');

		$this->form_validation->set_rules('date_start', 'Start Date', 'required|trim');

		$this->form_validation->set_rules('date_end', 'End Date', 'required|trim');

		$this->form_validation->set_rules('status', 'Status', 'required|trim');

		if ($this->form_validation->run() == FALSE) {

			$json['errors'] = $this->form_validation->error_array();

		} else {

			$data = $this->input->post(null,true);

			$coupon = array(

				'name'       => $data['name'],

				'code'       => $data['code'],

				'type'       => $data['type'],

				'allow_for'  => $data['allow_for'],

				'discount'   => $data['discount'],

				'date_start' => date("Y-m-d", strtotime($data['date_start'])),

				'date_end'   => date("Y-m-d", strtotime($data['date_end'])),

				'uses_total' => $data['uses_total'],

				'status'     => $data['status'],

				'products'   => implode(",", $data['products']),

				'date_added' => date("Y-m-d H:i:s"),

			);



			if($data['id'] > 0){

				unset($coupon['date_added']);

				$this->db->update("coupon",$coupon,['coupon_id' => $data['id']]);

			} else {

				$this->db->insert("coupon",$coupon);

				$coupon_id = $this->db->insert_id();

			}

			$json['location'] = base_url("admincontrol/coupon");

		}

		echo json_encode($json);

	}

	public function change_language($language_id){

		$language = $this->db->query("SELECT * FROM language WHERE id=".$language_id)->row_array();

		if($language){

			$_SESSION['userLang'] = $language_id;

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}

		else { show_404(); }

	}

	public function change_currency($currency_code){

		$language = $this->db->query("SELECT * FROM currency WHERE code = '{$currency_code}' ")->row_array();

		if($language){

			$_SESSION['userCurrency'] = $currency_code;

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}

		else { show_404(); }

	}

	public function lang_status_toggle() {
		try {
			if(!$this->userdetails()){ redirect('admin', 'refresh'); }
			$json = array();
			$column = $this->input->post("column",true);
			$id = (int)$this->input->post("id",true);
			$status = (int)$this->input->post('status',true);
			if($column == 'is_default'){
				$this->db->query("UPDATE language SET is_default = 0");
				$this->db->query("UPDATE language SET is_default = 1 WHERE id =". $id);
			} else {
				$this->db->query("UPDATE language SET ".$column."='".$status."' WHERE id =".$id);
			}
			$json = array('status'=>$this->db->affected_rows(),'languages'=>$this->Product_model->getLanguageHtml());
		} catch (\Throwable $th) {
			$json = array('status'=>false,'message'=>$th->getMessage());
		}
		echo json_encode($json);
	}

	public function update_language(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }
		$json = array();
		$name = $this->input->post("name",true);
		$language_id = (int)$this->input->post("id",true);
		$status = (int)$this->input->post('status',true);
		$is_rtl = (int)$this->input->post('is_rtl',true);

		if($language_id == 1){ $name = 'English'; }
		if($name == ''){ $json['errors']['name'] = __('admin.name_is_required'); }

		if(!isset($json['errors'])){
			$post = $this->input->post(null,true);

			if($language_id == 0){
				$created = true;
				$this->db->query("INSERT INTO language SET status='". $status ."',is_rtl='". $is_rtl ."', name=". $this->db->escape($name) );
				$language_id = $this->db->insert_id();
			} else {
				$created = false;
				$this->db->query("UPDATE language SET status='". $status ."', is_rtl='". $is_rtl ."', name=". $this->db->escape($name) ." WHERE id =". $language_id );
			}

			$languages_json = file_get_contents(base_url('assets/data/languages.json'));
			$languages = json_decode($languages_json, true);

			$languages_code = array_search($name,$languages);

			$DefaultLangPath = null;

			if($languages_code != false) {
				$DefaultLangPath = APPPATH.'language/default/'.$languages_code;
			} 

			$path = APPPATH.'language/'. $language_id;

			$lang_files = ['admin','client','store','user','front','template_simple'];
			$language_translation_notavailable = 0;
			foreach ($lang_files as $file) {
				if($DefaultLangPath == null || !is_file($DefaultLangPath .'/'. $file .'.php')) {
					$language_translation_notavailable++;
				}
			}

			if((int)$this->input->post("id",true) == 0){
				$DefaultPath = APPPATH.'language/default';
				lang_copy($DefaultPath, $path, $DefaultLangPath);
			}
				
			if($this->input->post('flag',true) != ''){
				copy($this->input->post('flag',true),$path."/flag.png");
				$this->db->query("UPDATE language SET flag = '{$post[flag]}' WHERE id =". $language_id );
			}

			if(isset($post['is_default'])){
				$this->db->query("UPDATE language SET is_default = 0");
				$this->db->query("UPDATE language SET status =1 , is_default = 1 WHERE id =". $language_id );
			}

			$msg_prefix = $created ? "Language created" : "Language updated";
			if(!isset($json['errors'])){
				if($language_translation_notavailable > 0 && $language_translation_notavailable == sizeof($lang_files)) {
					$this->session->set_flashdata(array('error' => $msg_prefix.' but auto translations not available, please contact admin for auto translations!'));
					redirect('admincontrol/language/', 'refresh');
				} else if ($language_translation_notavailable > 0) {
					$this->session->set_flashdata(array('error' => $msg_prefix.' but some translations is missing, please contact admin for autotranslations!'));
					redirect('admincontrol/language/', 'refresh');
				} else {
					$this->session->set_flashdata(array('success' => $msg_prefix." successfully."));
					redirect('admincontrol/language/', 'refresh');
				}
			} else {
				$this->session->set_flashdata(array('error' => implode("<br>", $json['errors'])));
				redirect('admincontrol/translation_edit/'. $language_id, 'refresh');
			}
		} else {
			$this->session->set_flashdata(array('error' => implode("<br>", $json['errors'])));
			redirect('admincontrol/translation_edit/'. $language_id, 'refresh');
		}
		echo json_encode($json);
	}

	public function translation($language_id){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$data['language'] = $this->db->query("SELECT * FROM language WHERE id=".$language_id)->row_array();

		if($data['language']){
			$data['language']['count'] = langCount($data['language']['id']);
			$this->load->view('admincontrol/includes/header', $data);
			$this->load->view('admincontrol/includes/sidebar', $data);
			$this->load->view('admincontrol/includes/topnav', $data);
			$this->load->view('admincontrol/language/translation', $data);
			$this->load->view('admincontrol/includes/footer', $data);
		}
		else{
			show_404();
		}
	}

	// Upload and Extract zip file
	public function language_zip_upload(){
  
		if(!empty($_FILES['file']['name'])){ 

			$config['upload_path'] = APPPATH.'language/default/'; 
			$config['allowed_types'] = 'zip'; 
			$config['max_size'] = '1024'; 
			$config['file_name'] = $_FILES['file']['name'];
			$this->load->library('upload',$config); 

			unlink(APPPATH.'language/default/'.$_FILES['file']['name']);

			if($this->upload->do_upload('file')){ 
				$uploadData = $this->upload->data(); 
				$filename = $uploadData['file_name'];
				
				$zip = new ZipArchive;

				$res = $zip->open(APPPATH.'language/default/'.$filename);
				
				if ($res === TRUE) {
					
					$extractpath = APPPATH.'language/default/';
	
					// Extract file
					$zip->extractTo($extractpath);
					$zip->close();
   
					$extractedFolderPath = $extractpath.preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
					$lang_files = ['admin','client','store','user','front','template_simple'];

					$files = scandir($extractedFolderPath);

					for ($i=2; $i < sizeof($files); $i++) { 
						$extractedFileName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $files[$i]);
						if(!in_array($extractedFileName, $lang_files)) {
							$isInvalidFile = true;
							$this->deleteDir($extractedFolderPath);
						}
					}
					unlink(APPPATH.'language/default/'.$filename);
					if(isset($isInvalidFile)) {
						$this->session->set_flashdata(array('error' => 'Invalid language zip file!'));
					} else {
						redirect(base_url('/admincontrol/update_user_langauges/'.preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename)));
						die;
					}
				} else {
					$this->session->set_flashdata(array('error' => 'Invalid language zip file!'));
				}
			} else { 
				$this->session->set_flashdata(array('error' => 'Please select valid language zip file!'));
			} 
		} else { 
			$this->session->set_flashdata(array('error' => 'Please select valid language zip file!'));
		} 
		redirect(base_url('/admincontrol/language'));
	}

	private function deleteDir($dir) {
		$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
		$files = new RecursiveIteratorIterator($it,
					RecursiveIteratorIterator::CHILD_FIRST);
		foreach($files as $file) {
			if ($file->isDir()){
				rmdir($file->getRealPath());
			} else {
				unlink($file->getRealPath());
			}
		}
		rmdir($dir);
	}
	
	public function get_translation(){
		if(!$this->userdetails()){ redirect('admin', 'refresh'); }
		$default_language = $this->db->query("SELECT * FROM language WHERE is_default=1")->row_array();
		$file_name = $this->input->post('id',true);
		$translation_id = $this->input->post('translation_id',true);
		$path = APPPATH.'language/default/' .$file_name.".php";
		include_once $path;
		$defaultLanguageKeys = $lang;
		$path = APPPATH.'language/'. $translation_id."/".$file_name.".php";
		include_once $path;
		$targerLanguageKeys = $lang;
		$newArray = array();
		foreach ($defaultLanguageKeys as $key => $value) {
			$newArray[$key] = array(
				'text' => $value,
				'value' => $targerLanguageKeys[$key],
			);
		}
		echo json_encode($newArray);
	}

	public function save_translation(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$get = $this->input->get(null,true);



		$translation_id = (int)$get['translation_id'];

		$targerLanguageKeys = $get['id'];

		$path = APPPATH.'language/'. $translation_id."/".$targerLanguageKeys.".php";

	



		$file_content = '<?php '.PHP_EOL;

		foreach ($this->input->post('translation',true) as $key => $value) {

			$file_content .= '$lang[\''. $key .'\'] = '. $this->db->escape($value) .';' .PHP_EOL;

		}

		file_put_contents($path, $file_content);
		$json['success'] = "Language save successfully";
		echo json_encode($json);
	}

	public function get_update_language(){
		if(!$this->userdetails()){ redirect('admin', 'refresh'); }
		$json = $this->db->query("SELECT * FROM language WHERE id = ". (int)$this->input->post('id',true))->row_array();
		echo json_encode($json);
	}

	public function translation_edit($lang_id = 0){
		if(!$this->userdetails()){ redirect('admin', 'refresh'); }
		$data['flags_files'] = glob("./assets/vertical/assets/images/flags/*.*");
		$data['flags_code'] = [];

		foreach ($data['flags_files'] as $flagfile) {
			$path_parts = pathinfo($flagfile);
			$data['flags_code'][$path_parts['filename']] = $flagfile;
		}

		$data['lang'] = $this->db->query("SELECT * FROM language WHERE id = ". (int)$lang_id)->row_array();
		$languages_json = file_get_contents(base_url('assets/data/languages.json'));
		$data['languages'] = json_decode($languages_json, true);
		$this->load->view('admincontrol/includes/header', $data);
		$this->load->view('admincontrol/includes/sidebar', $data);
		$this->load->view('admincontrol/includes/topnav', $data);
		$this->load->view('admincontrol/language/edit', $data);
		$this->load->view('admincontrol/includes/footer', $data);
	}

	public function delete_update_language(){
		if(!$this->userdetails()){ redirect('admin', 'refresh'); }
		if((int)$this->input->post('id',true) != 1){
			$path = APPPATH.'language/'. (int)$this->input->post('id',true)."/";
			$this->cart->delete_directory($path);
			$this->db->query("DELETE FROM language WHERE id = ". (int)$this->input->post('id',true));
		}
		echo json_encode(array());
	}

	public function mails(){
		$data = array();
		$data['templates'] = $this->db->query("SELECT * FROM mail_templates")->result_array();
		$data['emailsetting'] 	= $this->Product_model->getSettings('emailsetting');
		$post = $this->input->post(null,true);

		if(!empty($post)){
			$hasError = false;
			if(count($_FILES) > 0){
				$commonSetting = array('emailsetting');
				$path = 'assets/images/site';
				$this->load->helper('string');
				$config['upload_path'] = $path;
				$config['allowed_types'] = '*';
				$config['file_name']  = random_string('alnum', 32);
				$this->load->library('upload', $config);
				foreach ($_FILES as $fieldname => $input) {
					$extension = pathinfo($_FILES[$fieldname]["name"], PATHINFO_EXTENSION);
					if($_FILES[$fieldname]["error"] == 0){
						if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif'){
							$this->upload->initialize($config);
							if($input['error'] == 0){
								if (!$this->upload->do_upload($fieldname)) { }
								else {
									$upload_details = $this->upload->data();
									list($key,$subkey) = explode("_", $fieldname);
									$post[$key][$subkey] = $upload_details['file_name'];
								}
							}
						} else{
							$hasError = true;
							$this->session->set_flashdata('error', 'Only Image file allowed');
						}
					}
				}
			}

			foreach ($post as $key => $value) {
				if (in_array($key, $commonSetting)) {
					$this->Setting_model->save($key, $value);
				}
			}

			if(!$hasError){
				$this->session->set_flashdata('success', __('admin.setting_saved_successfully'));
			}

			redirect('admincontrol/mails');
		}

	



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/mails/index', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function mails_edit($template_id){

		$data = array();

		$post = $this->input->post(null,true);



		if (isset($post['send_test'])) {

			$json = array();

			if (!filter_var($this->input->post('test_email'), FILTER_VALIDATE_EMAIL)) {

				$json['error'] = __('admin.invalid_email_format');

			}

			else{

				$json['success'] = __('admin.testing_mail_sent_successfully');

				$this->load->model('Mail_model');

				$this->Mail_model->test_new($post);

			}

			echo json_encode($json);die;

		}

		else if (isset($post['id'])) {

			$this->db->query("UPDATE mail_templates SET

				`subject` = ". $this->db->escape($this->input->post("subject",true)) .",

				`text` = ". $this->db->escape($this->input->post("text")) .",

				`admin_subject` = ". $this->db->escape($this->input->post("admin_subject",true)) .",

				`admin_text` = ". $this->db->escape($this->input->post("admin_text")) .",

				`client_subject` = ". $this->db->escape($this->input->post("client_subject",true)) .",

				`client_text` = ". $this->db->escape($this->input->post("client_text")) ."

			 WHERE id = ". $post['id']);

			redirect($this->uri->uri_string());

		}

		$data['templates'] = $this->db->query("SELECT * FROM mail_templates WHERE id = ". $template_id)->row_array();

		if($data['templates']){

			$this->load->view('admincontrol/includes/header', $data);

			$this->load->view('admincontrol/includes/sidebar', $data);

			$this->load->view('admincontrol/includes/topnav', $data);

			$this->load->view('admincontrol/mails/editor', $data);

			$this->load->view('admincontrol/includes/footer', $data);

		}

		else{

			show_404();

		}



	}





	public function backup($action = ''){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$this->load->library("Backup");

		$get = $this->input->get(null,true);



		$this->backup->setMysql(array(

			'host' => $this->db->hostname, 

			'user' => $this->db->username, 

			'pass' => $this->db->password, 

			'dbname' => $this->db->database

		));

		$data['zip_loaded'] = extension_loaded('zip');

		if(isset($_FILES['backup_file'])){

			$path = APPPATH . 'backup/mysql';

			$this->load->helper('string');

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'zip';

			$config['file_name']  = 'Upload - '. date("Y-m-d H:i:s");

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('backup_file')) {

				$this->session->set_flashdata('error', $this->upload->display_errors());

			}

			else {

				$upload_details = $this->upload->data();

				$this->session->set_flashdata('success', __('admin.backup_upload_successfully'));

			}

			redirect('admincontrol/backup');

		}

		if ($action == 'getbackup') {

			$tables = $this->backup->getTables();

			$status =  $this->backup->saveBkZip($tables, date("Y-m-d H:i:s"));

			if($status == 'ok_saved'){

				$this->session->set_flashdata('success', __('admin.backup_created_successfully'));

			} else {

				$this->session->set_flashdata('error', $status);

			}

			redirect('admincontrol/backup');

		}

		else if ($action == 'delete') {

			$status =  $this->backup->delFile( $get['file_name'] );

			if($status == 'ok_delete'){

				$this->session->set_flashdata('success', __('admin.backup_file_deleted_successfully'));

			} else {

				$this->session->set_flashdata('error', $status);

			}

			redirect('admincontrol/backup');

		}

		else if ($action == 'restore') {

			$status =  $this->backup->restore( $get['file_name'] );

			if($status == 'ok_res_backup'){

				$this->session->set_flashdata('success', __('admin.backup_file_restored_successfully'));

			} else {

				$this->session->set_flashdata('error', $status);

			}

			redirect('admincontrol/backup');

		}

		else if ($action == 'download') {

			$this->backup->getZipFile( $get['file_name'] );

		}

		 

		$data['backups'] = $this->backup->getListZip();

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/backup/index', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function userdetails(){

		return $this->session->administrator;

	}



	public function getSiteSetting(){

		return $this->Product_model->getSettings('site');

	}



	public function index($slug) {

		if($this->userdetails()){ redirect('admin', 'refresh'); }

		else { redirect('usercontrol', 'refresh'); }

	}



	public function notification(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$this->load->library('pagination');

    	$this->load->helper('url');

    	$config['base_url'] = base_url('admincontrol/notification');

		$config['per_page'] = 10;

		$post = $this->input->post(null,true);

		$get = $this->input->get(null,true);



		if (isset($get['clearall'])) {

			$this->db->query("DELETE FROM notification WHERE notification_viewfor = 'admin'");

			redirect('admincontrol/notification', 'refresh');die;

		}



		if (isset($post['delete_ids'])) {

			$delete_ids = implode(",", $post['delete_ids']);

			$this->db->query("DELETE FROM notification WHERE notification_id IN ({$delete_ids})");

			echo json_encode(array());

			die;

		}





		$data['title'] = 'Notification';

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$notification = $this->user->getAllNotificationPaging('admin',null,$config['per_page'],$page);

		$config['total_rows'] = $notification['total'];

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

		$data['notifications'] = $notification['notifications'];

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/dashboard/notification', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function register($refid = null) {

		if($this->userdetails()){ redirect('admin', 'refresh'); }

		if(!empty($refid)){

		} else {

			$refid = base64_decode($this->input->get('refid'));

		}

		$data=array();

		if ($this->input->post()) {

			$this->load->library('form_validation');

			$checkmail=$this->user->checkmail($this->input->post('email',true));

			$checkuser=$this->user->checkuser($this->input->post('username',true));

			if(!empty($checkmail))

			{

				$this->session->set_flashdata('error', __('admin.this_email_already_register'));

				$this->session->set_flashdata('postdata', $this->input->post());

				redirect('admin');

			} elseif(!empty($checkuser)) {

				$this->session->set_flashdata('error',__('admin.this_username_already_register'));

				$this->session->set_flashdata('postdata', $this->input->post());

				redirect('admin');

			} else {

				$data=$this->user->insert(array(

					'firstname' => $this->input->post('firstname',true),

					'lastname'  => $this->input->post('lastname',true),

					'email'     => $this->input->post('email',true),

					'username'  => $this->input->post('username',true),

					'password'  => sha1($this->input->post('password',true)),

					'refid'     => !empty($refid) ? base64_decode($refid) : 0,

					'type'      => 'admin',

				));

				if(!empty($data)){

					$this->session->set_flashdata('success', __('admin.you_ve_successfully_registered'));

					redirect('admin');

				}

			}

		}

		$this->load->view('admincontrol/login/register', $data);

	}



	public function changePassword(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		$post = $this->input->post(null,true);



		if(isset($post) && !empty($post)){

			$this->form_validation->set_rules('old_pass', 'Old Password', 'required|trim', array('required' => '%s is required'));

			$this->form_validation->set_rules('password', 'New Password', 'required|trim', array('required' => '%s is required'));

			$this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|trim|matches[password]', array('required' => '%s is required'));

			if ($this->form_validation->run() == FALSE) {

				$data['validate_err'] = validation_errors();

			} else {

				$admin = $this->db->from('users')->where('id',$userdetails['id'])->get()->row_array();

				if($admin['password'] == sha1($this->input->post('old_pass',true))){

					$res = array('password'=>sha1($this->input->post('password',true)));

					$this->db->where('id',$admin['id']);

					$this->db->update('users',$res);

					$this->session->set_flashdata(array('flash' => array('success' => __('admin.user_profile_updated_successfully!'))));

					redirect('/admin', 'refresh');

				}else{

					$this->session->set_flashdata(array('flash' => array('error' => __('admin.old_password_not_matched.'))));

					redirect('admincontrol/changePassword');

				}

			}

		}

		$data['title'] = 'Change Password';

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/dashboard/change-password', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}





	public function ask_again_withdrawal(){

		$this->db->query("UPDATE wallet SET status=1 WHERE (wv != 'V2' OR wv IS NULL) AND status = 2");



		$this->session->set_flashdata('success', 'All Transaction Set In Wallet. Now user need to send withdraw request.');

		$get = $this->input->get(null,true);



		if (isset($get['backto'])) {

			redirect('admincontrol/wallet_requests_list?tab=old');die;

		}

		redirect('admincontrol/wallet/withdraw');

	}



	public function wallet_withdraw(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); }

		$get = $this->input->get(null,true);



		$filter = array(

			'status' => 2,

			'old_with' => 'V2',

		);



		if (isset($get['user_id']) && $get['user_id'] > 0) {

			$filter['user_id'] = (int)$get['user_id'];

			$data['user_id'] = $filter['user_id'];

		}



		if (isset($get['date'])) {

			$filter['date'] = $get['date'];

			$data['date'] = $filter['date'];

		}



		//$data['totals'] = $this->Wallet_model->getTotals($filter, true);



		$query = $this->db->query('SELECT sum(amount) as amount,count(`status`) as counts,`status` FROM `wallet` WHERE (wallet.wv != "V2" OR wallet.wv IS NULL) GROUP BY `status`')->result_array();

		foreach ($query as $key => $value) {

			switch ($value['status']) {

				case '0':

					$data['totals']['wallet_on_hold_amount'] = (float)$value['amount'];

					$data['totals']['wallet_on_hold_count'] = (float)$value['counts'];

					break;

				case '1':

					$data['totals']['wallet_unpaid_amount'] = (float)$value['amount'];

					$data['totals']['wallet_unpaid_count'] = (float)$value['counts'];

					break;

				case '2':

					$data['totals']['wallet_request_sent_amount'] = (float)$value['amount'];

					$data['totals']['wallet_request_sent_count'] = (float)$value['counts'];

					break;

				case '3':

					$data['totals']['wallet_accept_amount'] = (float)$value['amount'];

					$data['totals']['wallet_accept_count'] = (float)$value['counts'];

					break;

				case '4':

					$data['totals']['wallet_cancel_amount'] = (float)$value['amount'];

					$data['totals']['wallet_cancel_count'] = (float)$value['counts'];

					break;

				default: break;

			}

		}





		$data['transaction'] = $this->Wallet_model->getTransaction($filter);

		$data['request_status'] = $this->Wallet_model->status;

		$post = $this->input->post(null,true);

	



		if (isset($post['request_payment_all'])) {

			$json = array();

			 

			if($data['transaction']){

				$this->load->model('Mail_model');

				$userwise = array();

				foreach ($data['transaction'] as $key => $value) { $userwise[$value['user_id']][] = $value; }



				foreach ($userwise as $user_id => $value) {

					$user_name = $user_email = '';

					foreach ($value as $__value) {

						$this->Wallet_model->changeStatus($__value['id'],$post['status']);



						$user_name = $__value['firstname']. ' ' . $__value['lastname'];

						$user_email = $__value['user_email'];

					}



					if($user_name){

						$_data = array(

				            'amount'          => c_format($data['wallet_unpaid_amount']),

				            'comment'         => $user_name .' your withdrawal request status has been changed..!',

				            'name'            => $user_name,

				            'user_email'      => $user_email,

				            'commission_type' => '',

				            'new_status'      => $data['request_status'][$post['status']],

				        );



				        $this->Mail_model->send_wallet_withdrawal_status($_data);

					}

				}



				$json['success'] = __('admin.request_send_successfully');

			}



			echo json_encode($json);die;

		}



		/*if (isset($post['request_payment'])) {

			$json = array();

			$wallet = $this->Wallet_model->getbyId($post['request_payment']);

			if($wallet){

				$this->load->model('Mail_model');



				$_data = array(

		            'amount'          => c_format($wallet->amount),

		            'comment'         => $wallet->comment,

		            'name'            => $wallet->name,

		            'user_email'      => $wallet->user_email,

		            'commission_type' => $wallet->type,

		            'new_status'      => $data['request_status'][$new_status],

		        );

			



				$this->Mail_model->send_wallet_withdrawal_status($_data);

				$this->Wallet_model->changeStatus($post['request_payment'],$post['status']);



				$json['success'] = __('admin.request_send_successfully');

			}

			echo json_encode($json);die;

		}



		if (isset($post['selected_option'])) {

			$json = array();

			 

			if($data['transaction']){

				$selected= explode(",", $post['selected_option']);

				$this->load->model('Mail_model');

				$userwise = array();

				foreach ($data['transaction'] as $key => $value) { 

					if(in_array($value['id'], $selected)){

						$userwise[$value['user_id']][] = $value; 

					}

				}

			



				foreach ($userwise as $user_id => $value) {

					$user_name = $user_email = '';

					foreach ($value as $__value) {

						$this->Wallet_model->changeStatus($__value['id'],$post['status']);

						$user_name = $__value['firstname']. ' ' . $__value['lastname'];

						$user_email = $__value['user_email'];

					}



					if($user_name){

						$_data = array(

				            'amount'          => c_format($data['wallet_unpaid_amount']),

				            'comment'         => $user_name .' your withdrawal request status has been changed..!',

				            'name'            => $user_name,

				            'user_email'      => $user_email,

				            'commission_type' => '',

				            'new_status'      => $data['request_status'][$post['status']],

				        );



				        $this->Mail_model->send_wallet_withdrawal_status($_data);

					}

				}



				$json['success'] = __('admin.request_send_successfully');

			}



			echo json_encode($json);die;

		}



		$data['users'] = $this->db->query("SELECT id,username FROM users WHERE type = 'user'")->result_array();*/

	



		 

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/payment/wallet_withdraw', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function wallet_requests_details($id){

		$userdetails = $this->userdetails();

		$get = $this->input->get(null,true);

		$post = $this->input->post(null,true);

		$id=(int)$id;



		if(empty($userdetails)){ redirect('/admin'); }



		if (isset($post['status'])) {

			$this->form_validation->set_rules('status', 'Status', 'required|trim');

			$this->form_validation->set_rules('comment', 'Comment', 'required|trim');



			if ($this->form_validation->run() == FALSE) {

				$data['errors'] = $this->form_validation->error_array();

			} else {

				$this->load->model('Withdrawal_payment_model');

				$this->Withdrawal_payment_model->apiAddWithdrwalRequestHistory($id,[

					'status_id' => (int)$post['status'],

					'comment' => $post['comment'],

					'transaction_id' => '',

				]);

				/*$date = date("Y-m-d H:i:s");

				$this->db->query("UPDATE wallet_requests SET status=". (int)$post['status'] ." WHERE id={$id}");

				$this->db->query("INSERT INTO wallet_requests_history SET 

					created_at='{$date}', 

					req_id={$id}, 

					status=". (int)$post['status'] .", 

					comment='". $post['comment'] ."'");*/

				$data['success'] = 1;

			}

		



			echo json_encode($data);die;

		}



		$data['request'] = $this->db->query("SELECT * FROM wallet_requests WHERE id={$id}")->row_array();

		if(!$data['request']){

			show_404();

		}



		$this->load->model('Withdrawal_payment_model');



		$filter = array(

			'id_in' => $data['request']['tran_ids'],

		);



	



		$data['transaction'] = $this->Wallet_model->getTransaction($filter);

		$data['status'] = $this->Wallet_model->status;

		$data['status_icon'] = $this->Wallet_model->status_icon;

		$data['status_list'] = $this->Withdrawal_payment_model->status_list;



		$data['confirm'] = $this->Withdrawal_payment_model->getConfirm($data['request']['prefer_method'],['request'=>$data['request']]);



		$this->view($data,'users/wallet_requests_details');

	}



	public function get_withdrwal_history($id)

	{

		$status_history = $this->db->query("SELECT * FROM wallet_requests_history WHERE req_id={$id} ORDER BY id DESC ")->result_array();

		$json['html'] = '';



		foreach ($status_history as $key => $value) {

			$badge = $value['transaction_id'] ?  ' <span class="badge badge-blue-grey d-inline-block">Tran ID: '. $value['transaction_id'] .'</span>' : '';

			$json['html'].= '<tr>

				<td>'. withdrwal_status($value['status'])  .'</td>

				<td>'. $value['comment'] . $badge.'</td>

			</tr>';

		}



		echo json_encode($json);die;

	}



	public function wallet_requests_list(){

		$userdetails = $this->userdetails();

		$get = $this->input->get(null,true);

		$post = $this->input->post(null,true);



		if(empty($userdetails)){ redirect('/admin'); }



		if (isset($post['delete_request'])) {

			$id= (int)$post['id'];



			$req = $this->db->query("SELECT * FROM wallet_requests WHERE id={$id}")->row();

			if($req){

				if($req->tran_ids){

					$this->db->query("UPDATE wallet SET status=1 WHERE id in (". $req->tran_ids .") ");

				}

				$this->db->query("DELETE FROM wallet_requests WHERE id= {$id}");

				$this->db->query("DELETE FROM wallet_requests_history WHERE id= {$id}");

			}



			$json['success'] = 1;

			echo json_encode($json);die;

		}





		if (isset($post['get_new'])) {

			$get = $this->input->post(null,true);

			$filter = array();

			if (isset($get['user_id']) && $get['user_id'] > 0) {

				$filter['user_id'] = (int)$get['user_id'];

				$data['user_id'] = $filter['user_id'];

			}



			if (isset($get['date'])) {

				$filter['date'] = $get['date'];

				$data['date'] = $filter['date'];

			}



			$this->load->model('Withdrawal_payment_model');

			$data['lists'] = $this->Withdrawal_payment_model->getRequests($filter);



			$json['html'] = $this->load->view("admincontrol/users/part/tr_w_request_new",$data,true);

			echo json_encode($json);die;

		}



		if (isset($post['get_old'])) {

			$get = $this->input->post(null,true);

			$filter = array(

				'status' => 2,

				'old_with' => 'V2',

			);



			if (isset($get['user_id']) && $get['user_id'] > 0) {

				$filter['user_id'] = (int)$get['user_id'];

				$data['user_id'] = $filter['user_id'];

			}



			if (isset($get['date'])) {

				$filter['date'] = $get['date'];

				$data['date'] = $filter['date'];

			}



			$data['transaction'] = $this->Wallet_model->getTransaction($filter);

			$data['request_status'] = $this->Wallet_model->status;

			$json['html'] = $this->load->view("admincontrol/users/part/tr_w_request_old",$data,true);



			echo json_encode($json);die;

		}



		$data['users'] = $this->db->query("SELECT id,username FROM users WHERE type = 'user'")->result_array();



		$query = $this->db->query('SELECT sum(amount) as amount,count(`status`) as counts,`status` FROM `wallet` WHERE (wallet.wv != "V2" OR wallet.wv IS NULL) GROUP BY `status`')->result_array();

		foreach ($query as $key => $value) {

			switch ($value['status']) {

				case '0':

					$data['totals']['wallet_on_hold_amount'] = (float)$value['amount'];

					$data['totals']['wallet_on_hold_count'] = (float)$value['counts'];

					break;

				case '1':

					$data['totals']['wallet_unpaid_amount'] = (float)$value['amount'];

					$data['totals']['wallet_unpaid_count'] = (float)$value['counts'];

					break;

				case '2':

					$data['totals']['wallet_request_sent_amount'] = (float)$value['amount'];

					$data['totals']['wallet_request_sent_count'] = (float)$value['counts'];

					break;

				case '3':

					$data['totals']['wallet_accept_amount'] = (float)$value['amount'];

					$data['totals']['wallet_accept_count'] = (float)$value['counts'];

					break;

				case '4':

					$data['totals']['wallet_cancel_amount'] = (float)$value['amount'];

					$data['totals']['wallet_cancel_count'] = (float)$value['counts'];

					break;

				default: break;

			}

		}





		$this->view($data,'users/wallet_requests_list');

	}



	public function mywallet(){

	    $get = $this->input->get(null,true);

		$userdetails = $this->userdetails();

		

		if(empty($userdetails)){ redirect('admin'); }



		$data['status'] = $this->Wallet_model->status;

		$data['status_icon'] = $this->Wallet_model->status_icon;

		$data['request_status'] = $this->Wallet_model->request_status;		

		$filter['sortBy'] = isset($get['sortby']) ? $get['sortby'] : '';

		$filter['orderBy'] = isset($get['order']) ? $get['order'] : '';



		if (isset($get['user_id']) && $get['user_id'] > 0) {

			$filter['user_id'] = (int)$get['user_id'];

			$data['user_id'] = $filter['user_id'];

		}



		if (isset($get['recurring']) && $get['recurring'] > 0) {

			$filter['recurring'] = (int)$get['recurring'];

			$data['recurring'] = $filter['recurring'];

		}



		if (isset($get['paid_status']) && $get['paid_status']) {

			$filter['paid_status'] = $get['paid_status'];

		}



		if (isset($get['status']) && $get['status'] != '') {

			$filter['status'] = (int)$get['status'];

		} else{

			$filter['status_gt'] = 0;

		}



		if (isset($get['date'])) {

			$filter['date'] = $get['date'];

		}

		$filter['parent_id'] = 0;



		if ( isset($get['type']) && $get['type'] ) {

			$filter['types'] = $get['type'];

		}

	

		$this->load->library('pagination');

		$config['base_url'] = base_url('admincontrol/mywallet/');

		$config['total_rows'] = $this->Wallet_model->getTransaction($filter, true);

		$config['per_page'] = 100;

		$config['attributes'] = array('class' => 'single_paginate_link');

		$filter['per_page'] = $config['per_page'];

		$config['reuse_query_string'] = TRUE;

		$config['query_string_segment'] = 'page';

		$config['use_page_numbers'] = TRUE;

		$this->pagination->initialize($config);



		$filter['page_num'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

		

		$filter['offset'] = ($filter['page_num'] - 1) * $config['per_page'];



		$data['transaction'] = $this->Wallet_model->getTransaction($filter);



		$data['pagination_link'] = $this->pagination->create_links();



		$data['users'] = $this->db->query("SELECT id,CONCAT(firstname,' ',lastname) as name FROM users ")->result_array();

		$data['totals'] = $this->Wallet_model->getTotals(array(),true);

		$data['table'] = $this->load->view("admincontrol/users/part/wallet_tr", $data, true);



 		if(isset($_GET['a'])){

			$this->view($data, 'users/mywallet');

			return false;

		}



		$_data = objectToArray($data);



		$this->load->model('Total_model');

		$data['admin_totals'] = $this->Total_model->adminTotals();

		$this->view($data, 'users/wallet');

	}



	public function getRecurringTransaction(){

		$id = (int)$this->input->post("id");

	



		$userdetails = $this->userdetails();

		if(empty($userdetails)){redirect('admin');}

	



		$data['status'] = $this->Wallet_model->status;

		$data['status_icon'] = $this->Wallet_model->status_icon;

		$data['request_status'] = $this->Wallet_model->request_status;



		$filter['parent_id'] = $id;

		$data['transaction'] = $this->Wallet_model->getTransaction($filter);

		$data['recurring'] = $id;



		if (!isset($_POST['newtr'])) {

			$json['table'] = $this->load->view("admincontrol/users/part/wallet_tr", $data, true);

		} else{

			$json['table'] = '';

			foreach ($data['transaction'] as $key => $value) {

				$data['class'] = 'child-recurring';

				$data['force_class'] = $_POST['ischild'] == 'true' ? 'child-arrow' : '';

				$data['recurring'] = $id;

				$data['value'] = $value;

     			$data['wallet_status'] = $data['status'];

				$json['table'] .= $this->load->view("admincontrol/users/part/new_wallet_tr", $data, true);

			}

		}



		echo json_encode($json);

	}



	public function ajax_dashboard(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');





		$post = $this->input->post(null,true);



		$data['online_count'] = $this->Product_model->onlineCount();

		$data['userworldmap'] = $this->Product_model->getUserWorldMap();

	



		$this->load->model('IntegrationModel');

		//$data['newuser'] = $this->Product_model->getAllUsers(array("limit" => 5));



		$data['newuser'] = $this->Product_model->getAllUsers(array("limit" => 5,'id_gt' => $post['last_id_newuser']));

		$data['integration_logs']   = $this->IntegrationModel->getLogs(array(

			'page'  => 1,

			'limit' => 5,

			'id_gt' => $post['last_id_integration_logs'] 

		))['records'];

		$data['integration_orders'] = $this->IntegrationModel->getOrders(array("limit" => 5, 'id_gt' => $post['last_id_integration_orders']));

		$data['notifications'] = $this->Product_model->getnotificationnew('admin',null,5,array('id_gt' => $post['last_id_notifications']));



		//$data['integration_orders'] = $this->IntegrationModel->getOrders(array("limit" => 5));

		//$data['integration_logs'] = $this->IntegrationModel->getLogs(array('page' => 1,'limit' => 5))['records'];

		$this->load->model('Report_model');

		$data['live_window'] = $this->Report_model->combine_window($data);



		//$data['populer_users'] = $this->Product_model->getPopulerUsers(array("limit" => 10));

		$data['live_dashboard'] = $this->Product_model->getSettings('live_dashboard');

	



		$this->load->model('Total_model');

		$data['chart'] = $this->Total_model->chart([

			'year' => $post['selectedyear'],

			'group' => $post['renderChart'],

		]);

		



		$data['admin_totals'] = $this->Total_model->adminTotals();

		$data['admin_totals_week'] = c_format($this->Total_model->adminBalance(['week' => 1]));

		$data['admin_totals_month'] = c_format($this->Total_model->adminBalance(['month' => 1]));

		$data['admin_totals_year'] = c_format($this->Total_model->adminBalance(['year' => 1]));



		$data['admin_totals']['admin_balance'] = c_format($data['admin_totals']['admin_balance']);

		$data['admin_totals']['sale_localstore_vendor_total'] = c_format($data['admin_totals']['sale_localstore_vendor_total']);

		$data['admin_totals']['sale_total_admin_store'] = c_format($data['admin_totals']['sale_localstore_total'] + $data['admin_totals']['order_external_total']);

		$data['admin_totals']['click_action_total'] = (int)($data['admin_totals']['click_action_total']);

		$data['admin_totals']['click_action_commission'] = c_format($data['admin_totals']['click_action_commission']);

		$data['admin_totals']['all_click_total'] = (int)(

													$data['admin_totals']['click_localstore_total'] +

													$data['admin_totals']['click_integration_total'] +

													$data['admin_totals']['click_form_total']

												);

		$data['admin_totals']['all_click_commission'] = c_format(

													$data['admin_totals']['click_localstore_commission'] +

													$data['admin_totals']['click_integration_commission'] +

													$data['admin_totals']['click_form_commission']

												);



		$data['admin_totals']['click_localstore_total'] = (int)($data['admin_totals']['click_localstore_total']);

		$data['admin_totals']['click_localstore_commission'] = c_format($data['admin_totals']['click_localstore_commission']);

		$data['admin_totals']['click_integration_total'] = (int)($data['admin_totals']['click_integration_total']);

		$data['admin_totals']['click_integration_commission'] = c_format($data['admin_totals']['click_integration_commission']);

		$data['admin_totals']['click_form_total'] = (int)($data['admin_totals']['click_form_total']);

		$data['admin_totals']['click_form_commission'] = c_format($data['admin_totals']['click_form_commission']);

		$data['admin_totals']['click_all_total'] = (int)(

										$data['admin_totals']['click_localstore_total'] +

										$data['admin_totals']['click_integration_total'] +

										$data['admin_totals']['click_form_total'] 

									);

		$data['admin_totals']['click_all_commission'] = c_format(

										$data['admin_totals']['click_localstore_commission'] +

										$data['admin_totals']['click_integration_commission'] +

										$data['admin_totals']['click_form_commission'] 

									);

	





		$data['admin_totals']['sale_localstore_count'] = (int)($data['admin_totals']['sale_localstore_count']);

		$data['admin_totals']['sale_localstore_commission'] = c_format($data['admin_totals']['sale_localstore_commission']);

		$data['admin_totals']['sale_localstore_vendor_count'] = (int)($data['admin_totals']['sale_localstore_vendor_count']);

		$data['admin_totals']['sale_localstore_vendor_commission'] = c_format($data['admin_totals']['sale_localstore_vendor_commission']);

		$data['admin_totals']['order_external_count'] = (int)($data['admin_totals']['order_external_count']);

		$data['admin_totals']['order_external_commission'] = c_format($data['admin_totals']['order_external_commission']);

		$data['admin_totals']['all_sale_count'] = (int)(

										$data['admin_totals']['sale_localstore_count'] +

										$data['admin_totals']['order_external_count'] +

										$data['admin_totals']['sale_localstore_vendor_count'] 

									);

		$data['admin_totals']['all_sale_commission'] = c_format(

										$data['admin_totals']['sale_localstore_commission'] +

										$data['admin_totals']['order_external_commission'] +

										$data['admin_totals']['sale_localstore_vendor_commission'] 

									);



		$data['admin_totals']['wallet_unpaid_amounton_hold_count'] = (int)($data['admin_totals']['wallet_unpaid_amounton_hold_count']);

		$data['admin_totals']['wallet_on_hold_amount'] = c_format($data['admin_totals']['wallet_on_hold_amount']);

		$data['admin_totals']['wallet_unpaid_count'] = (int)($data['admin_totals']['wallet_unpaid_count']);

		$data['admin_totals']['wallet_unpaid_amount'] = c_format($data['admin_totals']['wallet_unpaid_amount']);

		$data['admin_totals']['wallet_request_sent_count'] = (int)($data['admin_totals']['wallet_request_sent_count']);

		$data['admin_totals']['wallet_request_sent_amount'] = c_format($data['admin_totals']['wallet_request_sent_amount']);

		$data['admin_totals']['wallet_accept_count'] = (int)($data['admin_totals']['wallet_accept_count']);

		$data['admin_totals']['wallet_accept_amount'] = c_format($data['admin_totals']['wallet_accept_amount']);

		$data['admin_totals']['wallet_cancel_count'] = (int)($data['admin_totals']['wallet_cancel_count']);

		$data['admin_totals']['wallet_cancel_amount'] = c_format($data['admin_totals']['wallet_cancel_amount']);



		$data['admin_totals']['vendor_wallet_accept_count'] = (int)($data['admin_totals']['vendor_wallet_accept_count']);

		$data['admin_totals']['vendor_wallet_accept_amount'] = c_format($data['admin_totals']['vendor_wallet_accept_amount']);

		$data['admin_totals']['vendor_wallet_request_sent_count'] = (int)($data['admin_totals']['vendor_wallet_request_sent_count']);

		$data['admin_totals']['vendor_wallet_request_sent_amount'] = c_format($data['admin_totals']['vendor_wallet_request_sent_amount']);

		$data['admin_totals']['vendor_wallet_unpaid_count'] = (int)($data['admin_totals']['vendor_wallet_unpaid_count']);

		$data['admin_totals']['vendor_wallet_unpaid_amount'] = c_format($data['admin_totals']['vendor_wallet_unpaid_amount']);

		$data['admin_totals']['order_vendor_total'] = (int)($data['admin_totals']['order_vendor_total']);





		$data['integration_data'] = $this->Total_model->get_integartion_data(true);

		$data['time'] = date("h:i:s A");

	



		echo json_encode($data);die;

	}



	public function dashboard(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');



		$post = $this->input->post(null,true);



		$data['online_count'] = $this->Product_model->onlineCount();



		$data['userworldmap'] = $this->Product_model->getUserWorldMap();

		$data['notifications'] = $this->Product_model->getnotificationnew('admin',null,5);

	

		$this->load->model('IntegrationModel');

		$data['newuser'] = $this->Product_model->getAllUsers(array("limit" => 5));

		$data['integration_orders'] = $this->IntegrationModel->getOrders(array("limit" => 5));

		$data['integration_logs'] = $this->IntegrationModel->getLogs(array('page' => 1,'limit' => 5))['records'];

		





		$this->load->model('Report_model');

		$data['live_window'] = $this->Report_model->combine_window($data);



		$data['populer_users'] = $this->Product_model->getPopulerUsers(array("limit" => 10));



		$data['months'] = array('All','01','02','03','04','05','06','07','08','09','10','11','12');

		$data['years'] = array('All',date("Y",strtotime("-3 year")),date("Y",strtotime("-2 year")),date("Y",strtotime("-1 year")),date("Y",strtotime("0 year")));



		$data['live_dashboard'] = $this->Product_model->getSettings('live_dashboard');



		$this->load->model('Total_model');

		$data['Total_model'] = $this->Total_model;

		

		if (isset($_GET['getChartData'])) {

			$json['chart'] = $this->Total_model->chart($post);

			echo json_encode($json);die;

		}



		$data['admin_totals'] = $this->Total_model->adminTotals();

		$data['admin_totals_week'] = c_format($this->Total_model->adminBalance(['week' => 1]));

		$data['admin_totals_month'] = c_format($this->Total_model->adminBalance(['month' => 1]));

		$data['admin_totals_year'] = c_format($this->Total_model->adminBalance(['year' => 1]));



		$data['integration_data'] = $this->Total_model->get_integartion_data(true);



		$this->view($data,'dashboard/dashboard');

	}


	public function logout(){

		$this->session->unset_userdata('administrator');

		$this->session->sess_destroy();

		redirect('/admin');

	}





	public function deleteUser($id){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); }

		$data['users'] = $this->admin_model->deleteUser($id);

		$this->session->set_flashdata('success', __('admin.user_deleted_successfullly'));

		redirect('admincontrol/manageUsers');

	}





	public function addproduct(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		$data['setting'] 	= $this->Product_model->getSettings('productsetting');

		$data['country_list'] = $this->db->query("SELECT name,id FROM countries")->result();

		$data['product'] = $this->Product_model->getProductById($id);

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/product/add_product', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function updateproduct($id = null){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');

		$data['product'] = $this->Product_model->getProductById($id);

		$data['tags'] = $this->Product_model->getAllTags();

		if($data['product']){

			$data['seller'] = $this->db->query("SELECT * FROM product_affiliate WHERE product_id=". (int)$data['product']->product_id ." ")->row();

			$data['seller_setting'] = $this->db->query("SELECT * FROM vendor_setting WHERE user_id=". (int)$data['seller']->user_id ." ")->row();

			$data['categories'] =$this->Product_model->getProductCategory($data['product']->product_id);

			$data['product_state'] = $this->db->query("SELECT * FROM states WHERE id=". (int)$data['product']->state_id )->row();

			$data['states'] = $this->db->query("SELECT * FROM states WHERE country_id=". (int)$data['product_state']->country_id )->result();

		}

		$data['downloads'] = $this->Product_model->parseDownloads($data['product']->downloadable_files);

		$data['setting'] = $this->Product_model->getSettings('productsetting');

		$data['vendor_setting'] = $this->Product_model->getSettings('vendor');

		$data['country_list'] = $this->db->query("SELECT name,id FROM countries")->result();

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/product/add_product', $data);

		$this->load->view('admincontrol/includes/footer', $data);
	}



	public function duplicateProduct($product_id){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');



		$this->Product_model->duplicateProduct($product_id);



		$this->session->set_flashdata('success', 'Product Duplicate Successfully');

		redirect(base_url('admincontrol/listproduct'));

	}



	public function editProduct(){

		$userdetails = $this->userdetails();

		$post = $this->input->post(null,true);	





		if(!empty($post)){

			$product_id = (int)$this->input->post('product_id',true);

			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');

			$this->form_validation->set_rules('product_name', __('admin.product_name_'), 'required');

			$this->form_validation->set_rules('product_description', __('admin.product_description'), 'required' );

			$this->form_validation->set_rules(

		        'product_short_description', __('admin.short_description'),

		        'required|min_length[5]|max_length[150]',

		        array(

	                'required'      => 'Enter %s',

	                'is_unique'     => 'This %s already exists.',

	                'min_length' 	=> '%s: the minimum of characters is %s',

	                'max_length' 	=> '%s: the maximum of characters is %s',

		        )

			);

			$this->form_validation->set_rules('category[]',"Category", "required");

			$this->form_validation->set_rules('product_price', 'Product Price', 'required');

			$this->form_validation->set_rules('product_sku', 'Product SKU', 'required');

			$this->form_validation->set_rules('product_video', 'Product Video', 'trim');



			if($post['allow_country'] == "1"){

				$this->form_validation->set_rules('state_id', 'State', 'required' );

			}



			if( $post['product_recursion_type'] == 'custom' ){

				$this->form_validation->set_rules('product_recursion', 'Product Recursion', 'required');

				if( $post['product_recursion'] == 'custom_time' ){

					$this->form_validation->set_rules('recursion_custom_time', 'Custom Time', 'required|greater_than[0]');

				}

			}

		



			$product_recursion = ($post['product_recursion_type'] && $post['product_recursion_type'] != 'default') ? $post['product_recursion'] : "";

			$recursion_custom_time = ($product_recursion == 'custom_time' ) ? $post['recursion_custom_time'] : 0;



			if($this->form_validation->run()){

				$post = $this->input->post(null,true);			





				$errors = array();

				$downloadable_files = array();



				if($product_id){

					$product_details = $this->Product_model->getProductById($product_id);

					$_downloads = $this->Product_model->parseDownloads($product_details->downloadable_files);



					foreach ($post['keep_files'] as $_value) {

						if(isset($_downloads[$_value])){

							$downloadable_files[] = $_downloads[$_value];

						} else{

							@unlink(APPPATH.'/downloads/'.$_value);

						}

					}

				}

				$variations = [];
				if(isset($post['variations']) && !empty($post['variations'])) {
					foreach($post['variations'] as $key => $value) {
						if(!empty($value)) {
							$new_value = [];
							if($key == 'colors') {
								for ($i=0; $i < sizeof($post['variations'][$key]['code']); $i++) { 
									if(!empty($post['variations'][$key]['code'][$i]) && $post['variations'][$key]['name'][$i]) {
										array_push($new_value, [
											'code'=>$post['variations'][$key]['code'][$i], 
											'name'=> $post['variations'][$key]['name'][$i],
											'price'=> $post['variations'][$key]['price'][$i]
										]);
									}
								}
							} else {
								for ($i=0; $i < sizeof($post['variations'][$key]['name']); $i++) { 
									if(!empty($post['variations'][$key]['name'][$i])) {
										array_push($new_value, [
											'name'=> $post['variations'][$key]['name'][$i],
											'price'=> $post['variations'][$key]['price'][$i]
										]);
									}
								}
							}
							$variations[$key] = $new_value;
						}
					}
				}

				$details = array(

					'product_name'                 =>  $post['product_name'],

					'product_description'          =>  $post['product_description'],

					'product_short_description'    =>  $post['product_short_description'],

					'product_msrp'                =>  $post['product_msrp'],

					'product_price'                =>  $post['product_price'],

					'product_sku'                  =>  $post['product_sku'],

					'product_video'                =>  $post['product_video'],

					'product_price'                =>  $post['product_price'],

					'product_type'                 =>  $post['product_type'],

					'product_commision_type'       =>  $post['product_commision_type'],

					'state_id'                     =>  $post['allow_country'] == "1" ? (int)$post['state_id'] : 0,

					'product_commision_value'      =>  (float)$post['product_commision_value'],

					'product_click_commision_type' =>  $post['product_click_commision_type'],

					'product_click_commision_ppc'  =>  $post['product_click_commision_ppc'],

					'product_click_commision_per'  =>  (float)$post['product_click_commision_per'],

					'on_store'                     =>  (int)$post['on_store'],

					'allow_shipping'               =>  (int)$post['allow_shipping'],

					'allow_upload_file'            =>  (int)$post['allow_upload_file'],

					'allow_comment'                =>  (int)$post['allow_comment'],

					'product_status'               =>  isset($post['product_status']) ? (int)$post['product_status'] : 1,

					'product_ipaddress'            =>  $_SERVER['REMOTE_ADDR'],

					'product_recursion_type'       =>  $post['product_recursion_type'],

					'recursion_endtime'       =>  (isset($post['recursion_endtime_status']) && $post['recursion_endtime']) ? date("Y-m-d H:i:s",strtotime($post['recursion_endtime'])) : null,

					'product_recursion'            =>  $product_recursion,

					'recursion_custom_time'        =>  (int)$recursion_custom_time,

					'product_variations'        =>  json_encode($variations),

					'product_tags'        =>  json_encode($post['product_tags']),

				);				



				if($_FILES['product_featured_image']['error'] != 0 && $product_id == 0 ){

					$errors['product_featured_image'] = 'Select Featured Image File!';

				}else if(!empty($_FILES['product_featured_image']['name'])){

					$upload_response = $this->upload_photo('product_featured_image','assets/images/product/upload/thumb');

					if($upload_response['success']){

						$details['product_featured_image'] = $upload_response['upload_data']['file_name'];

					}else{

						$errors['product_featured_image'] = $upload_response['msg'];

					}

				}

				if(!empty($_FILES['downloadable_file'])){

					$files = $_FILES['downloadable_file'];

					$count_file = count($_FILES['downloadable_file']['name']);

				



					$this->load->helper('string');	



					for($i=0; $i<$count_file; $i++){

				        //$extension = substr($files['name'][$i], strpos($files['name'][$i], '.'));

						$extension = pathinfo($files['name'][$i], PATHINFO_EXTENSION);

				        if($extension=='zip'){

					        $FILES['downloadable_files']['name'] = md5(random_string('alnum', 10));

					        $FILES['downloadable_files']['type'] = $files['type'][$i];

					        $FILES['downloadable_files']['tmp_name'] = $files['tmp_name'][$i];

					        $FILES['downloadable_files']['error'] = $files['error'][$i];

					        $FILES['downloadable_files']['size'] = $files['size'][$i];    

					     



					     	if(empty($FILES['downloadable_files']['error'])){

					     		move_uploaded_file($FILES['downloadable_files']['tmp_name'], APPPATH.'/downloads/'. $FILES['downloadable_files']['name']);

							



								$downloadable_files[] = array(

									'type' => $FILES['downloadable_files']['type'],

									'name' => $FILES['downloadable_files']['name'],

									'mask' => $files['name'][$i],

								);

					     	}else{

					     		$errors['downloadable_files'] = $FILES['downloadable_files']['error'];

					     	}

					    } else {

				     		$errors['downloadable_files'] = 'Only zip file are allow..';

					    }

		    		}

				}



				if(empty($errors)){

					$details['downloadable_files'] = json_encode($downloadable_files);

					$this->session->set_flashdata('success', __('admin.product_added_successfully'));



					$details['product_created_by'] = $userdetails['id'];

					$details['product_created_date'] = date('Y-m-d H:i:s');				





					$old_product_data =[];

					if($product_id){

						$old_product_data = $this->db->query("SELECT * FROM product WHERE product_id = ". (int)$product_id)->row_array();

						$this->Product_model->update_data('product', $details, array('product_id' => $product_id));

					}else{

						$product_id = $this->Product_model->create_data('product', $details);

						$notificationData = array(

							'notification_url'          => '/listproduct/'.$product_id,

							'notification_type'         =>  'product',

							'notification_title'        =>  __('admin.new_product_added_in_affiliate_program'),

							'notification_view_user_id' =>  'all',

							'notification_viewfor'      =>  'user',

							'notification_actionID'     =>  $product_id,

							'notification_description'  =>  $post['product_name'].' product is addded by admin in affiliate Program on '.date('Y-m-d H:i:s'),

							'notification_is_read'      =>  '0',

							'notification_created_date' =>  date('Y-m-d H:i:s'),

							'notification_ipaddress'    =>  $_SERVER['REMOTE_ADDR']

						);

						$store_setting =$this->Product_model->getSettings('store');

						if($store_setting['status']) {

							$this->insertnotification($notificationData);

						}

					}



					$seofilename = $this->friendly_seo_string($post['product_name']);

					$seofilename = strtolower($seofilename);

					$product_slug = $seofilename.'-'.$product_id;



					$this->db->query("UPDATE product SET product_slug = ". $this->db->escape($product_slug) ." WHERE product_id =". $product_id);



					$seller = '';

					if($product_id){

						$this->db->query("DELETE FROM product_categories WHERE product_id = {$product_id}");



						if(isset($post['category']) && is_array($post['category'])){

							foreach ($post['category'] as $category_id) {

								$category = array(

									'product_id' => $product_id,

									'category_id' => $category_id,

								);



								$this->Product_model->create_data('product_categories', $category);

							}

						}



						$admin_comment = '';

						if(isset($post['admin_comment']) && $post['admin_comment']){

							$admin_comment = $post['admin_comment'];

						}



						if(isset($post['admin_sale_commission_type'])){

							$seller_comm = [

								'admin_sale_commission_type'      => $post['admin_sale_commission_type'],

								'admin_commission_value'          => $post['admin_commission_value'],

								'admin_click_commission_type'     => $post['admin_click_commission_type'],

								'admin_click_amount'              => $post['admin_click_amount'],

								'admin_click_count'               => $post['admin_click_count'],

								//'affiliate_sale_commission_type'  => $post['affiliate_sale_commission_type'],

								//'affiliate_commission_value'      => $post['affiliate_commission_value'],

								//'affiliate_click_commission_type' => $post['affiliate_click_commission_type'],

								//'affiliate_click_count'           => $post['affiliate_click_count'],

								//'affiliate_click_amount'          => $post['affiliate_click_amount'],

							];





							$seller = $this->db->query("SELECT * FROM product_affiliate WHERE product_id=". (int)$product_id ." ")->row();

							$this->Product_model->assignToSeller($product_id, $details, $userdetails['id'], $admin_comment,'admin', $seller_comm);

						}

					}





					if($seller){

						$product_data = $this->db->query("SELECT * FROM product WHERE product_id = ". (int)$product_id)->row_array();

					



						$this->load->model('Mail_model');

						if($old_product_data['product_status'] != $product_data['product_status']){

							$this->Mail_model->vendor_product_status_change($product_id, 'vendor', true);

						}

					}



					if ($post['action'] == 'save_close') {

						if(isset($post['product_status']) && (int)$post['product_status'] != 1){

							$json['location'] = base_url('admincontrol/listproduct/reviews');

						} else {

							$json['location'] = base_url('admincontrol/listproduct');

						}

					} else {

						$json['location'] = base_url('admincontrol/updateproduct/'.$product_id);

					}

				



				} else {

					$json['errors'] = $errors;

				}

			} else {

				$json['errors'] = $this->form_validation->error_array();



				if(isset($json['errors']['category[]'])){

					$json['errors']['category_auto'] = $json['errors']['category[]'];

				}

			}

			echo json_encode($json);

			die;

		}

	}





	public function storepayments_doc(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');

	





		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/storepayments/doc', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function storepayments(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');



		$store_setting = $this->Product_model->getSettings('store');

		// if(!$store_setting['status']){ show_404(); }



		if($this->input->method(TRUE) == 'POST'){

			$this->Setting_model->save('storepayment_'.$this->input->post('id',true), array('status' => (int)$this->input->post('val',true)));

			echo json_encode($json);die;

		}



		$files = array();

		foreach (glob(APPPATH."/payments/controllers/*.php") as $file) {

		  	$files[] = $file;

		}



		$methods = array_unique($files);

	



		$payment_methods = array();

		foreach ($methods as $key => $filename) {

			require $filename;



			$code = basename($filename, ".php");

			$obj = new $code($this);



			$pdata          = array();

			$pdata['title'] = $obj->title;

			$pdata['icon'] = $obj->icon;

			$pdata['website'] = $obj->website;

			$pdata['code']  = $code;



			$setting_data = $this->Product_model->getSettings('storepayment_'.$code);

			$pdata['status']  = 0;



			if (isset($setting_data['status']) && $setting_data['status']) {

				$pdata['status']  = 1;

			}

			$payment_methods[$code] = $pdata;

		}



		$data['payment_methods'] = $payment_methods;



		$data['user'] = $userdetails;

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/storepayments/index', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function storepayments_edit($edit_code){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');



		$store_setting = $this->Product_model->getSettings('store');

		// if(!$store_setting['status']){ show_404(); }



		$post = $this->input->post(null,true);



		if(isset($post['status'])){

			$data = $this->input->post(null,true);



			if($edit_code == 'bank_transfer'){

				if(!isset($data['additional_bank_details'])){

					$data['additional_bank_details'] = [];

				}

			}



			$this->Setting_model->save('storepayment_'.$edit_code, $data);

			$json['redirect'] = base_url('admincontrol/storepayments');



			$this->session->set_flashdata('success', 'Payment Data Saved Successfully');

			echo json_encode($json);die;

		}



		$files = array();

		foreach (glob(APPPATH."/payments/controllers/*.php") as $file) { $files[] = $file; }

		$methods = array_unique($files);



		$payment_methods = array();

		foreach ($methods as $key => $filename) {

			require $filename;

			$code = basename($filename, ".php");

			$obj = new $code($this);

			$pdata          = array();

			$pdata['title'] = $obj->title;

			$pdata['code']  = $code;



			if($edit_code == $code){

				$setting_file = APPPATH."/payments/settings/{$edit_code}.php";

				if(is_file($setting_file)){

					$data['setting_data'] = $this->Product_model->getSettings('storepayment_'.$edit_code);

					$data['order_status'] = $this->Order_model->status;

					$pdata['setting'] = $this->getSettings($setting_file, $data);

				}

			}

			$payment_methods[$code] = $pdata;

		}



		if(isset($payment_methods[$edit_code])){

			$data['payment_method'] = $payment_methods[$edit_code];

		



		



			$data['user'] = $userdetails;

			$this->load->view('admincontrol/includes/header', $data);

			$this->load->view('admincontrol/includes/sidebar', $data);

			$this->load->view('admincontrol/includes/topnav', $data);

			$this->load->view('admincontrol/storepayments/setting', $data);

			$this->load->view('admincontrol/includes/footer', $data);

		} else {

			redirect(base_url('admincontrol/storepayments_edit'));

		}

	}



	private function getSettings($file,$data){

		extract($data);

	    ob_start();

	    require($file);

	    return ob_get_clean();

	}



	public function store_dashboard(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');

		$this->load->model('Form_model');



		$post = $this->input->post(null,true);



		if (isset($post['renderChart'])){

			if (isset($post['selectedyear'])) {

				$data = $this->Order_model->getSaleChart(array('selectedyear' => $post['selectedyear']),$post['renderChart']);

			}else{

				$data = $this->Order_model->getSaleChart(array(),$post['renderChart']);

			}

			echo json_encode($data); die;

		}



		// $totals = $this->Wallet_model->getTotals(array(), true);



		/* Getting total order count */

		$data['total']['order_count'] = $this->db->query('SELECT COUNT(op.id) as total FROM `order_products` op LEFT JOIN `order` as o ON o.id = op.order_id WHERE o.status > 0 ')->row()->total;



		$data['form_count'] = $this->db->query('SELECT COUNT(*) as total FROM `form`')->row()->total;

		$data['coupon_count'] = $this->db->query('SELECT COUNT(*) as total FROM `coupon`')->row()->total;

		$data['form_coupon_count'] = $this->db->query('SELECT COUNT(*) as total FROM `form_coupon`')->row()->total;

		$data['product_count'] = $this->db->query('SELECT COUNT(*) as total FROM `product`')->row()->total;

		$data['category_count'] = $this->db->query('SELECT COUNT(*) as total FROM `categories`')->row()->total;

		$data['payment_gateway_count'] = count(glob(APPPATH."/payments/controllers/*.php"));

	



		/* Getting total clients count */

		$data['client_count'] = $this->db->query('SELECT count(*) as total FROM users WHERE type like "client"')->row()->total;



		//$data['product_count']   = $this->Product_model->getAllProductrecord();

		//$data['user_count']      = $this->Product_model->getAllUserrecord();

		$data['client_count'] = $this->Product_model->getAllClientrecord();

		//$data['a_commission']    = $this->Product_model->getAffiliateCommission();

		//$data['newuser']         = $this->Product_model->getAllUsers(array("limit" => 5));

		//$data['newclient']       = $this->Product_model->getAllClientNew();

		$data['ordercount']      = $this->Order_model->getCount();

		$data['salescount']      = $this->Order_model->getSale();

		$data['formcount']       = $this->Form_model->formcount();

	



		//$data['country_list']    = $this->user->getUserCountry();

		//$data['notifications'] = $this->user->getAllNotification();

		//$data['notifications']   =  $this->Product_model->getnotificationnew('admin',null,5);

		//$data['store']           = $this->Product_model->getSettings('store');

		$data['userworldmap']    = $this->Product_model->getUserWorldMap();

	



		$this->load->model('Wallet_model');

		$this->load->model('IntegrationModel');

	



		$data['integration_logs']   = $this->IntegrationModel->getLogs(array('page' => 1,'limit' => 5))['records'];

		$filter_date = date('Y-m-01') . ' - ' . date('Y-m-t');

		$data['totals'] = $this->Wallet_model->getTotals(array(

			'total_commision_filter_month' => 'all',

			'total_commision_filter_year' => date("Y"),

		), true);



		$data['refer_total']        = $this->Product_model->getReferalTotals();

		$data['online_count']        = $this->Product_model->onlineCount();

		$data['integration_orders'] = $this->IntegrationModel->getOrders(array("limit" => 5));



		$totals = $this->Wallet_model->getTotals(array(), true);

		/* Getting total balance */

		$data['totals']['full_total_balance'] = c_format($totals['total_balance']);

		$data['totals']['total_sale_balance'] = c_format($totals['total_sale_balance']);



		/* Getting total order count */

		$data['totals']['full_local_store_hold_orders'] = $totals['store']['hold_orders'];



		$data['totals']['full_all_clicks_comm']            = $totals['all_clicks']."/".c_format($totals['all_clicks_comm']);

		$data['totals']['full_action_count_action_amount'] = (int)$totals['integration']['action_count'] .'/'. c_format($totals['integration']['action_amount']);

		$data['totals']['full_hold_action_count']          = $totals['integration']['hold_action_count'];

		$data['totals']['full_hold_orders']                = $totals['integration']['hold_orders'];

		$data['totals']['full_weekly_balance']             = c_format($totals['weekly_balance']);

		$data['totals']['full_monthly_balance']            = c_format($totals['monthly_balance']);

		$data['totals']['full_yearly_balance']             = c_format($totals['yearly_balance']);



		$this->load->model('Report_model');

		$data['live_window'] = $this->Report_model->combine_window($data);



		require APPPATH.'/core/latlong.php';

		$data['_countryCode'] = $_countryCode;



		/*$data['server'] = array(

			'memory' => shapeSpace_server_memory_usage(),

			'disk'   => shapeSpace_disk_usage(),

			'load'   => shapeSpace_system_load(),

		);*/

		// echo "<pre>";print_r($data);echo "</pre>";die;

		$data['months'] = array('All','01','02','03','04','05','06','07','08','09','10','11','12');

		$data['years'] = array('All',date("Y",strtotime("-3 year")),date("Y",strtotime("-2 year")),date("Y",strtotime("-1 year")),date("Y",strtotime("0 year")));

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/store/dashboard', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}

	public function store_dashboard_order_list(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');

		$get = $this->input->get(null,true);

		$post = $this->input->post(null,true);

		$filter = array(

			'limit' => 50,

			'page' => isset($get['page']) ? (int)$get['page'] : 1,

		);

		$this->load->model('Order_model');

		$data['status'] = $this->Order_model->status;

		$getallorders = $this->Order_model->getOrders($filter);

		$data['orders'] = $getallorders['data'];

		$this->load->library('pagination');

		$this->pagination->cur_page = $filter['page'];

		$config['base_url'] = base_url('admincontrol/store_dashboard_order_list');

		$config['per_page'] = $filter['limit'];

		$config['total_rows'] = $getallorders['total'];

		$config['use_page_numbers'] = TRUE;

		$config['page_query_string'] = TRUE;

		$config['enable_query_strings'] = TRUE;

		$config['query_string_segment'] = 'page';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

	

		$json['view'] = $this->load->view("admincontrol/store/order_list_tr", $data, true);

		echo json_encode($json);

	}

	public function product_logs(){

		$category_id = (int)$this->input->post("category_id",true);



		$sql = "SELECT DISTINCT p.* FROM product p LEFT JOIN product_categories pc ON pc.product_id = p.product_id WHERE 1 ";

		$category = $this->db->query("SELECT * FROM categories WHERE id = ". (int)$category_id)->row_array();

		if($category){

			$sql .= " AND pc.category_id = ". $category['id'];

		}



		$data['category'] = $category;

		$data['products'] = $this->db->query($sql)->result_array();

		$json['html'] = $this->load->view("common/product_logs",$data,true);

		echo json_encode($json);die;

	}



	public function listproduct_ajax($page = 1){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');

		$get = $this->input->get(null,true);

		$post = $this->input->post(null,true);



		$filter = array(

			'page' => isset($get['page']) ? $get['page'] : $page,

			'limit' => 20,

		);



		if(isset($post['category_id']) && $post['category_id']){

			$filter['category_id'] = (int)$this->input->post('category_id');

		}



		if(isset($post['seller_id']) && $post['seller_id']){

			$filter['seller_id'] = (int)$this->input->post('seller_id');

		}



		$filter['product_status_in'] =	 '1';

		if($only_review == 'reviews'){

			$filter['product_status_in'] =	 '0,2,3';

		}



		$data['default_commition'] =$this->Product_model->getSettings('productsetting');

		$record = $this->Product_model->getAllProduct($userdetails['id'], $userdetails['type'],$filter);

		$data['productlist'] = $record['data'];



		$json['view'] = $this->load->view("admincontrol/product/product_list", $data, true);



		$this->load->library('pagination');

		$this->pagination->cur_page = $filter['page'];



		$config['base_url'] = base_url('admincontrol/listproduct_ajax');

		$config['per_page'] = $filter['limit'];

		$config['total_rows'] = $record['total'];

		$config['use_page_numbers'] = TRUE;

		$config['page_query_string'] = TRUE;

		$config['enable_query_strings'] = TRUE;

		$_GET['page'] = $filter['page'];

		$config['query_string_segment'] = 'page';

		$this->pagination->initialize($config);

		$json['pagination'] = $this->pagination->create_links();



		echo json_encode($json);

	}



	public function listproduct($only_review = false){

		$userdetails = $this->userdetails();

		if(empty($userdetails)) redirect('admin');

		$this->load->model('Form_model');



		$store_setting = $this->Product_model->getSettings('store');

		$data['totals'] = $this->Wallet_model->getTotals(array(), true);

		// if(!$store_setting['status']){ show_404(); }

	



		$filter = array();

		$get = $this->input->get(null,true);



		if(isset($get['category_id']) && $get['category_id']){

			$filter['category_id'] = (int)$this->input->get('category_id');

		}

		if(isset($get['seller_id']) && $get['seller_id']){

			$filter['seller_id'] = (int)$this->input->get('seller_id');

		}



		$filter['product_status_in'] =	 '1';

		if($only_review == 'reviews'){

			$filter['product_status_in'] =	 '0,2,3';

		}



		set_default_language();



		$data['productlist'] = $this->Product_model->getAllProduct($userdetails['id'], $userdetails['type'],$filter);

		$data['client_count'] =$this->db->query('SELECT count(*) as total FROM users WHERE  type like "client"')->row()->total;

		$data['ordercount'] =$this->db->query('SELECT COUNT(op.id) as total FROM `order_products` op LEFT JOIN `order` as o ON o.id = op.order_id WHERE o.status > 0 ')->row()->total;



		$data['categories'] = $this->db->query("SELECT id,name FROM categories")->result_array();

		$data['vendors'] = $this->db->query("SELECT users.id,CONCAT(users.firstname,' ',users.lastname) as name FROM `product_affiliate` LEFT JOIN users ON users.id= user_id GROUP by user_id")->result_array();





		$data['user'] = $userdetails;



		$this->load->library("socialshare");				

		$data['social_share_modal'] =  $this->socialshare->get_dynamic_social_share_btns();



		if($only_review == 'reviews'){

			$this->view($data,'product/reviews');

		} else {

			$this->view($data,'product/index');

		}

	}



	public function insertnotification($postData = null){

		if(!empty($postData)) $this->Product_model->create_data('notification', $postData);

	}



	public function listorders(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); }



		$store_setting = $this->Product_model->getSettings('store');

		// if(!$store_setting['status']){ show_404(); }



		$this->load->model('Order_model');

		$data['getallorders'] = $this->Order_model->getOrders();

		$data['status'] = $this->Order_model->status;



		$data['user'] = $userdetails;



		$this->view($data,'product/orders');

	}



	public function order_change_status(){

		$order_id = (int)$this->input->post("id",true);

		$status = (int)$this->input->post("val",true);

		$remarks = '';

		$this->load->model('Order_model');



		$this->Order_model->changeStatus($order_id, $status,$remarks);



		$json['status'] = $this->Order_model->status[$status];



		echo json_encode($json);

	}



	public function vieworder($order_id = null){
		$userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$this->load->model('Order_model');
		$this->load->model('Form_model');
		$post = $this->input->post(null,true);
		if($post){
			$this->Order_model->changeStatus($order_id, $post['payment_item_status'],$post['remarks']);
			$this->session->set_flashdata('success', __('admin.you_have_updated_order_status_successfully'));
			redirect('admincontrol/vieworder/'.$order_id);
		}
		$data['status'] = $this->Order_model->status;
		$data['order'] = $this->Order_model->getOrder($order_id);
		$data['products'] = $this->Order_model->getProducts($order_id);
		$data['totals'] = $this->Order_model->getTotals($data['products'],$data['order']);
		$data['payment_history'] = $this->Order_model->getHistory($order_id);
		$data['order_history'] = $this->Order_model->getHistory($order_id, 'order');
		$data['affiliate_user'] = $this->Order_model->getAffiliateUser($order_id);
		$data['venders'] = $this->Order_model->getVender($data['order'], $data['products']);
		$data['paymentsetting'] = $this->Product_model->getSettings('paymentsetting');
		$data['user'] = $userdetails;
		$data['orderProof'] = $this->Order_model->getPaymentProof($order_id);
		$data['shipping'] = $this->Order_model->getShippingDetails($data['order']['user_id']);
		unset($data['status']['0']);
		$this->load->view('admincontrol/includes/header', $data);
		$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);
		$this->load->view('admincontrol/product/vieworder', $data);
		$this->load->view('admincontrol/includes/footer', $data);
	}



	public function orderaction($order_id, $order_action, $transaction = false){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		if($order_action == 'delete'){

			$this->Order_model->orderdelete($order_id, $transaction);

			$this->session->set_flashdata('success', __('admin.order_has_been_deleted_successfully_'). orderId($order_id));

			redirect('admincontrol/listorders');

		}

		if($order_action == 'sendemail'){

			$this->load->model('Mail_model');

			$this->Mail_model->send_new_order_mail($order_id);

			$this->session->set_flashdata('success', __('admin.order_mail_send_successfully'));

			redirect('admincontrol/vieworder/'.$order_id);

		}

		if($order_action == 'print'){

			$data['order'] = $this->Order_model->getOrder($order_id);

			$data['affiliate_user'] = $this->Order_model->getAffiliateUser($order_id);

			$data['payment_history'] = $this->Order_model->getHistory($order_id);

			$data['products'] = $this->Order_model->getProducts($order_id);

			$data['totals'] = $this->Order_model->getTotals($data['products'],$data['order']);

			$data['status'] = $this->Order_model->status;

			$data['order_history'] = $this->Order_model->getHistory($order_id, 'order');

			$data['paymentsetting'] = $this->Product_model->getSettings('paymentsetting');

			$data['user'] = $userdetails;

			$this->load->view('admincontrol/product/printorder', $data);

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

		}

		else

		{

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



	public function deleteusers($id = null,$type = 'user'){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		$this->Product_model->userdelete($id,$type);

		if($type == 'user'){

			$this->session->set_flashdata('success', __('admin.user_has_been_deleted_successfully'));

			redirect('admincontrol/userslist');

		} 

	}



	public function addusers($id = null){

        $userdetails = $this->userdetails();

        if(empty($userdetails)){

            redirect('admin');

        }

        $data=array();

        $this->load->model('User_model');

        $this->load->model('PagebuilderModel');



        $data['countries'] = $this->User_model->getCountries();

		if ($this->input->post()) {

			$post = $this->input->post(null,true);



			$this->load->library('form_validation');

			$this->form_validation->set_rules('firstname', 'First Name', 'required|trim');

			$this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');

			$this->form_validation->set_rules('username', 'Username', 'required|trim');

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');

			$this->form_validation->set_rules('country_id', 'Country', 'required');



			if((int)$id == 0 || $post['password'] != ''){

				$this->form_validation->set_rules('password', 'Password', 'required|trim', array('required' => '%s is required'));

				$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim', array('required' => '%s is required'));

	            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]', array('required' => '%s is required'));

			}

		



			$json['errors'] = array();



			$register_form = $this->PagebuilderModel->getSettings('registration_builder');

			if($register_form){

				$customField = json_decode($register_form['registration_builder'],1);

			



				foreach ($customField as $_key => $_value) {

					$field_name = 'custom_'. $_value['name'];



					if($_value['required'] == 'true'){

						if(!isset($post[$field_name]) || $post[$field_name] == ''){

							$json['errors'][$field_name] = $_value['label'] ." is required.!";

						}

					}



					if(!isset($json['errors'][$field_name]) && (int)$_value['maxlength'] > 0){

						if(strlen( $post[$field_name] ) > (int)$_value['maxlength']){

							$json['errors'][$field_name] = $_value['label'] ." Maximum length is ". (int)$_value['maxlength'];

						}

					}



					if(!isset($json['errors'][$field_name]) && (int)$_value['minlength'] > 0){

						if(strlen( $post[$field_name] ) > (int)$_value['minlength']){

							$json['errors'][$field_name] = $_value['label'] ." Minimum length is ". (int)$_value['minlength'];

						}

					}



					if(!isset($json['errors'][$field_name]) && $_value['mobile_validation']  == 'true'){

						/*if(!preg_match('/^[0-9]{10}+$/', $post[$field_name])){

							$json['errors'][$field_name] = $_value['label'] ." Invalid mobile number ";

						}*/

					}

				}

			}



			if ($this->form_validation->run() == FALSE) {

				$json['errors'] = array_merge($this->form_validation->error_array(), $json['errors']);

			}

			if( count($json['errors']) == 0){

				$checkmail = $this->Product_model->checkmail($this->input->post('email',true),$id);

				$checkuser = $this->Product_model->checkuser($this->input->post('username',true),$id);

			



				if(!empty($checkmail)){ $json['errors']['email'] = "Email Already Exist"; }

				if(!empty($checkuser)){ $json['errors']['username'] = "Username Already Exist"; }





				if(count($json['errors']) == 0){



					$custom_fields = array();

                    foreach ($this->input->post() as $key => $value) {

                    	if(!in_array($key, array('affiliate_id','terms','cpassword','firstname','lastname','email','username','password'))){

                    		$custom_fields[$key] = $value;

                    	}

                    }



                    $userArray = array(

						'firstname'                 => $this->input->post('firstname',true),

						'lastname'                  => $this->input->post('lastname',true),

						'email'                     => $this->input->post('email',true),

						'username'                  => $this->input->post('username',true),

						'is_vendor'                 => (int)$this->input->post('is_vendor',true),

						//'password'                => sha1($this->input->post('password',true)),

						'twaddress'                 => '',

						'address1'                  => '',

						'address2'                  => '',

						'uzip'                      => '',

						'avatar'                    => '',

						'online'                    => '0',

						'unique_url'                => '',

						'bitly_unique_url'          => '',

						'google_id'                 => '',

						'facebook_id'               => '',

						'twitter_id'                => '',

						'umode'                     => '',

						'PhoneNumber'               => '',

						'Addressone'                => '',

						'Addresstwo'                => '',

						'StateProvince'             => '',

						'Zip'                       => '',

						'f_link'                    => '',

						't_link'                    => '',

						'l_link'                    => '',

						'product_commission'        => '0',

						'affiliate_commission'      => '0',

						'product_commission_paid'   => '0',

						'affiliate_commission_paid' => '0',

						'product_total_click'       => '0',

						'product_total_sale'        => '0',

						'affiliate_total_click'     => '0',

						'sale_commission'           => '0',

						'sale_commission_paid'      => '0',

						'status'                    => '1',

						'ucountry'                  => $this->input->post('country_id',true),

						'Country'                   => $this->input->post('country_id',true),

						'value'                     => json_encode($custom_fields),

					



						//'Country'                 => $geo['id'],

						//'City'                    => (string)$geo['city'],

						//'phone'                   => $geo['city'],

						//'ucity'                   => $geo['city'],

						//'ucountry'                => $geo['id'],

						//'state'                   => $geo['state'],

						//'created_at'              => date("Y-m-d H:i:s"),

						//'updated_at'              => date("Y-m-d H:i:s"),

					);



					if($post['password'] != ''){

                    	$userArray['password'] = sha1( $post['password'] );

					}



					if (isset($post['refid'])) {

						$userArray['refid'] = (int)$post['refid'];

					}



                    if((int)$id == 0){

						$userArray['City'] = '';

						$userArray['phone'] = '';

						$userArray['ucity'] = '';

						$userArray['state'] = '0';



                    	$userArray['created_at'] = $userArray['updated_at'] = date("Y-m-d H:i:s");

						$data = $this->user->insert($userArray);

						$id = $this->db->insert_id();

					} else {

						$data = $this->user->update_user($id, $userArray);

					}



					$this->session->set_flashdata('success', __('admin.youve_successfully_registered'));

					$json['location'] = base_url('admincontrol/userslist');

				}

			}





			echo json_encode($json);die;

		}



		$data['user'] 	= (array)$this->Product_model->getUserDetailsObject($id);



		$data['totals'] = $this->Wallet_model->getTotals(array("user_id" => $id), true);

	



		$this->load->model('PagebuilderModel');

		$register_form = $this->PagebuilderModel->getSettings('registration_builder');



		$data['data'] = json_decode($register_form['registration_builder'],1);

		$data['edit_view'] = true;

		$data['allow_vendor_option'] = true;

		$data['edit_view_refer'] = true;

		$data['refer_users'] = $this->db->query("SELECT id,username FROM users WHERE id != ". (int)$id ." AND type='user'")->result_array();

		



		$data['html_form'] = $this->load->view('auth/user/templates/register_form',$data, true);



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/users/add_users', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function add_transaction(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		$this->form_validation->set_rules('comment', 'Comment', 'required|trim');

		$this->form_validation->set_rules('user_id', 'user_id', 'required|trim');



		if ($this->form_validation->run() == FALSE) {

			$json['errors'] = $this->form_validation->error_array();

		} else{

			$this->Wallet_model->addTransaction(array(

				'status'         => 1,

				'user_id'        => $this->input->post("user_id",true),

				'amount'         => $this->input->post("amount",true),

				'comment'        => $this->input->post("comment",true) ,

				'type'           => 'admin_transaction',

				'dis_type'       => '',

				'comm_from'      => '',

				'reference_id'   => 0,

				'reference_id_2' => 0,

				'ip_details'     => '',

				'domain_name'    => '',

			));



			$this->session->set_flashdata('success', 'Transaction added successfully');

			$json['location'] = base_url("admincontrol/addusers/" . $this->input->post("user_id",true));

		}



		echo json_encode($json);

	}



	public function getpaymentdetail($user_id)	{

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		$data['paymentlist'] = $this->Product_model->getAllPayment($user_id);

        $data['paypalaccounts'] = $this->Product_model->getPaypalAccounts($user_id);

        $user = $this->Product_model->getUserDetailsObject($user_id);

		$data['user'] = array(

            'firstname' => $user->firstname,

            'lastname'  => $user->lastname,

            'username'  => $user->username,

            'email'     => $user->email,

            'phone'     => $user->phone,

            'address'   => $user->twaddress,

            'country'   => $this->getCountryName($user->Country),  

            'state'     => $this->getStateName($user->state),  

            'city'      => $user->City,

        );

        echo json_encode($data);

	}



    public function getCountryName($country_id){

        $query = $this->db->get_where('countries',array('id'=>$country_id))->row_array();

        if($query){

            return $query['name'];

        }else{

            return '';

        }

    }



    public function getStateName($state_id){

        $query = $this->db->get_where('states',array('id'=>$state_id))->row_array();

        if($query){

            return $query['name'];

        }else{

            return '';

        }

    }



	public function downline($user_id){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		$data['user'] 	= $this->Product_model->getUserDetailsObject($user_id);

		$mylevel = array();

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/users/downline', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}









	public function userslist(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); }



		$this->load->model('PagebuilderModel');

		$register_form = $this->PagebuilderModel->getSettings('registration_builder');



		$data['data'] = json_decode($register_form['registration_builder'],1);

		if ($this->input->post()) {



			$post = $this->input->post(null,true);



			if(isset($post['action']) && $post['action'] == "process_approval") {

				$approval_data = [];

				if(isset($post['approve_users']) && !empty($post['approve_users'])) {

					$approval_data['users_ids'] = $post['approve_users'];

					$approval_data['reg_approved'] = 1;

				}



				if(isset($post['decline_users']) && !empty($post['decline_users'])) {

					$approval_data['users_ids'] = $post['decline_users'];

					$approval_data['reg_approved'] = 2;

				}



				if(!empty($approval_data)) {

					$json['approvals_status'] = $this->Product_model->process_approval($approval_data);

					if($json['approvals_status']['status']) {

		            	$this->load->model('Mail_model');

						$user = App\User::find(array('id' => $approval_data['users_ids'][0]));

	

						if(isset($post['approve_users']) && !empty($post['approve_users'])) {

							$membership = $this->Product_model->getSettings('membership');

							$plan_id = ($membership['status']) ? 0 : -1;

			            	if($membership['status'] && $membership['default_plan_id'] > 0){

			            		$plan = App\MembershipPlan::find($membership['default_plan_id']);

			            		if($plan){

			                		$plan->buy($user[0], 1, 'Default plan started','Default');

			            		}

			            	}

			            	$this->Mail_model->send_registration_approved_mail(json_decode(json_encode($user[0])));

		            	}



		            	if(isset($post['decline_users']) && !empty($post['decline_users'])) {

							$this->Mail_model->send_registration_declined_mail(json_decode(json_encode($user[0])));

		            	}

					}



					$json['approvals_count'] = $this->Product_model->getApprovalCounts();

					echo json_encode($json);die;

				}

			} else {

				if (isset($post['action']) && $post['action'] == 'get_all_ids') {

					$data['ids'] = array_column($this->db->query("SELECT id FROM users WHERE type='user' ")->result_array(),'id');

					echo json_encode($data);die;

				}



				$filter = array(

					'limit' => 25,

					'page' => isset($post['page']) ? (int)$post['page'] : 1,

					'reg_approved' => null

				);





				if(isset($post['apr']) && !empty($post['apr'])) {

					switch ($post['apr']) {

						case 'pending':

							$filter['reg_approved'] = 0;

							break;

						case 'approved':

							$filter['reg_approved'] = 1;

							break;

						case 'declined':

							$filter['reg_approved'] = 2;

							break;

						default:

							$filter['reg_approved'] = null;

							break;

					}

				}





				if(isset($post['name']) && $post['name'] != ''){

					$filter['name'] = $post['name'];

				}



				if(isset($post['email']) && $post['email'] != ''){

					$filter['email'] = $post['email'];

				}



				$userslist = $this->Product_model->getAllUsers($filter);



				$data['userslist'] = $userslist['data'];



				$this->load->library('pagination');



	 			$this->pagination->cur_page = $filter['page'];



				$config['base_url'] = base_url('admincontrol/userslist');

				$config['per_page'] = $filter['limit'];

				$config['total_rows'] = $userslist['total'];

				$config['use_page_numbers'] = TRUE;

				$config['page_query_string'] = TRUE;

				$config['enable_query_strings'] = TRUE;

				$_GET['page'] = $post['page'];

				$config['query_string_segment'] = 'page';

				$this->pagination->initialize($config);



				$data['commission_type'] = $this->Product_model->getCommissionType();

				$data['user'] = $userdetails;

				$json['table'] = $this->load->view("admincontrol/users/part/user_tr", $data, true);

				$json['pagination'] = $this->pagination->create_links();

				$json['approvals_count'] = $this->Product_model->getApprovalCounts();

				set_tmp_cache('user_list_cache');

				echo json_encode($json);die;

			}

		}



		$data['approvals_count'] = $this->Product_model->getApprovalCounts();



		$this->view($data,'users/index');

	}



	public function get_user_data(){

		$filter = $this->input->post(null,true);;

		$json = array();

	 	$this->load->model('PagebuilderModel');

		$register_form = $this->PagebuilderModel->getSettings('registration_builder');

		$datab = json_decode($register_form['registration_builder'],1);

		$data = $this->Product_model->getAllUsersExport($filter);



		$header = array(

			'auto'            => "#",

			'email'           => "Email",

			'username'        => "UserName",

			'firstname'       => "First Name",

			'lastname'        => "Last Name",

			'under_affiliate' => "Under Affiliate",

			'sortname'        => "Country",

			'password'        => "Password",

		);



		foreach ($datab as $key => $value) {

			if($value['type'] != 'header'){

				$header[$value['name']] = $value['label'];

			}

		}



		$header['paypal_email'] = 'Paypal Email';

		$header['payment_bank_name'] = 'Bank Name';

		$header['payment_account_number'] = 'Bank Account Name';

		$header['payment_account_name'] = 'Bank Account Number';

		$header['payment_ifsc_code'] = 'Bank IFSC Code';



		$index = 0;

		$_exportData = array();

		$_exportData[$index] = array_values($header);

		include APPPATH . '/core/excel/Classes/PHPExcel.php';



		if($filter['action'] == 'export'){

			foreach ($data as $key => $value) {

				$value['password'] = '';



				$index++;

				$v= json_decode($value['value'],1); 

			



				foreach ($header as $name_key => $_value) {

					$val = '';

					if($name_key == 'auto'){

						$val = $index;

					}

					else if(isset($value[$name_key])){

						$val = $value[$name_key];

					} else if(isset($v['custom_'.$name_key])){

						$val = $v['custom_'.$name_key];

					}



					$_exportData[$index][$name_key] = $val;

				}

			}



			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getActiveSheet()->fromArray($_exportData, NULL, 'A1');

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		



			$alphas = range('A', 'Z');



			foreach(range('A',$alphas[count($header)]) as $columnID) {

			    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)

			        ->setAutoSize(true);

			}



			$objWriter->save(APPPATH.'/core/excel/output/export_users.xlsx');



			$json['download'] = base_url('application/core/excel/output/export_users.xlsx');

		} else {

			if($_FILES['import_control']['error'] == 0){

				$excelReader = PHPExcel_IOFactory::createReaderForFile($_FILES['import_control']['tmp_name']);

				$excelObj = $excelReader->load($_FILES['import_control']['tmp_name']);



				$rows = $excelObj->getActiveSheet()->toArray(null,true,false,false);



				$headers = array_shift($rows);



				$db_headers = array();

				foreach ($header as $name_key => $_value) {

					$key = array_search($_value, $header); 

					$db_headers[] = $key;

				}

			



			



				$this->load->model('Imoprt_user');



				array_walk($rows, function(&$values) use($db_headers){

					$values = array_slice($values, 0, count($db_headers));

					$values = array_combine($db_headers, $values);

				});



				$json['errors'] = '<ol>';

				foreach ($rows as $key => $user) {

					$json['errors'] .=  $this->Imoprt_user->import($user,$datab);

				}

				$json['errors'] .= '</ol>';

			} else {

				$json['errors'] = 'Wrong file';

			}

		}



		echo json_encode($json);

	}



	public function import_user_data(){

		$filter = $this->input->post(null,true);;

		$file = $_FILES;



		if (!isset($filter['is_admin'])) { 

			$filter['user_id'] = (int)$this->userlogins()['id'];

		}

		 echo "<pre>"; print_r($file); echo "</pre>";die; 

	}



	public function userslisttree(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}



		$data['userslist'] = $this->Product_model->getAllinOneQuery(array(),0,true,true);



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/users/tree', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function userslistmail(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); }



		$this->load->model('PagebuilderModel');

		$register_form = $this->PagebuilderModel->getSettings('registration_builder');



		$data['data'] = json_decode($register_form['registration_builder'],1);



		if ($this->input->server('REQUEST_METHOD') == 'POST'){

			$filter = $this->input->post(null,true);

			$get = $this->input->get(null,true);



			if (isset($filter['action']) && $filter['action'] == 'get_all_emails') {

				$data['emails'] = array_column($this->db->query("SELECT email FROM users WHERE type='user' ")->result_array(),'email');

				echo json_encode($data);die;

			}



			$filter['limit'] = 10;

			$filter['page'] = isset($get['per_page']) ? (int)$get['per_page'] : 1;



			$userslist = $this->Product_model->getAllUsersNormal($filter);

			$data['userslist'] = $userslist['data'];



			$this->load->library('pagination');

			$config['base_url'] = base_url('admincontrol/userslistmail');

			$config['per_page'] = $filter['limit'];

			$config['total_rows'] = $userslist['total'];

			$config['use_page_numbers'] = TRUE;

			$config['page_query_string'] = TRUE;

			$config['enable_query_strings'] = TRUE;

			$config['query_string_segment'] = 'per_page';

			$this->pagination->initialize($config);



			$data['html'] = $this->load->view('admincontrol/users/part/mail_list',$data,true);

			$data['pagination'] = $this->pagination->create_links();

			$data['total'] = $config['total_rows'];



			unset($data['userslist']);

			unset($data['data']);



			echo json_encode($data);die;

		}



		$data['country_list'] = $this->db->query("SELECT * FROM countries WHERE id IN (SELECT Country FROM users WHERE type='user' GROUP BY ucountry) ")->result();

		$data['user'] = $userdetails;



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/users/mail', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}


	public function setting(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){redirect('admin');}



		$post = $this->input->post(null,true);

		if(!empty($post)){

			$this->load->helper(array('form', 'url'));

			$errors= array();

			foreach($post as $key => $value) {

				if(!empty($key) && !empty($value)){

					$this->Product_model->deletesetting($key,$value,'setting');

				}

				$details = array(

					'setting_key'       =>  $key,

					'setting_value'     =>  $value,

					'setting_type'      =>  'setting',

					'setting_status'    =>  1,

					'setting_ipaddress' =>  $_SERVER['REMOTE_ADDR'],

				);

				if(!empty($key) && !empty($value)){

					$this->Product_model->create_data('setting', $details);

				}

			}

			$this->session->set_flashdata('success', __('admin.setting_updated_successfully'));

			redirect('admincontrol/setting');

		} else {

			$data['setting'] 	= $this->Product_model->getSettings('setting');

			$data['getAffiliate'] 	= $this->Product_model->getAffiliateById();

			$this->load->view('admincontrol/includes/header', $data);

			$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

			$this->load->view('admincontrol/setting/setting', $data);

			$this->load->view('admincontrol/includes/footer', $data);

		}

	}



	public function store_setting(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){redirect('admin');}

		$commonSetting = array('formsetting','productsetting','store','shipping_setting','vendor','order_comment');

		$post = $this->input->post(null,false);

		if(!empty($post)){

				$return = (isset($post['return'])) ? $post['return'] : false;

				$json = array();

				if (isset($post['recursion_endtime_status']) && isset($post['productsetting']['recursion_endtime']) && $post['productsetting']['recursion_endtime']) {

					$post['productsetting']['recursion_endtime'] = date("Y-m-d H:i:s",strtotime($post['productsetting']['recursion_endtime']));

				} else {

					$post['productsetting']['recursion_endtime'] = null;

				}

				unset($post['recursion_endtime_status']);



				if (isset($post['recursion_endtime_form_status']) && isset($post['formsetting']['recursion_endtime']) && $post['formsetting']['recursion_endtime']) {

					$post['formsetting']['recursion_endtime'] = date("Y-m-d H:i:s",strtotime($post['formsetting']['recursion_endtime']));

				} else {

					$post['formsetting']['recursion_endtime'] = null;

				}



				if(!isset($post['shipping_setting']['cost'])){

					$post['shipping_setting']['cost'] = [];

				}

				unset($post['recursion_endtime_form_status']);

				foreach ($post['shipping_setting']['cost'] as $key => $value) {

					if((int)$value['country'] <= 0){

						$json['errors']['ssc-'. $key] = 'Choose country';

					}

					if((int)$value['cost'] <= 0){

						$json['errors']['ssv-'. $key] = 'Enter Shipping cost';

					}

				}

				if(!isset($json['errors'])){

					if(count($_FILES) > 0){

						$path = 'assets/images/site';

						$this->load->helper('string');

						$config['upload_path'] = $path;

						$config['allowed_types'] = '*';

						$config['file_name']  = random_string('alnum', 32);

						$this->load->library('upload', $config);

						

						foreach ($_FILES as $fieldname => $input) {

							$this->upload->initialize($config);

							list($key,$subkey) = explode("_", $fieldname);

							$extension = pathinfo($_FILES[$fieldname]["name"], PATHINFO_EXTENSION);



							if($input['error'] == 0){

								$extension_allowed = array('jpg','jpeg','png','gif');

								if($fieldname == 'store_favicon'){

									$extension_allowed = array('jpg','jpeg','png','gif','ico');

								}

								if(in_array($extension, $extension_allowed)){

									if (!$this->upload->do_upload($fieldname)) {

									



									}

									else {

										$upload_details = $this->upload->data();

										$post[$key][$subkey] = $upload_details['file_name'];

									}

								} else{

									$json['errors']["{$key}_{$subkey}"] = 'Only Image File are allowed';

								}

							}

						}

					}



					if(isset($post['store']['notification'])) {

						$notis = [];

						foreach($post['store']['notification'] as $n) {

							array_push($notis, $n);

						}				

						$post['store']['notification'] = json_encode($notis);

					}

					

					if(isset($post['store']['homepage_slider'])) {

						$slider = [];

						for ($i=0; $i < sizeOf($post['store']['homepage_slider']['index']); $i++) { 

							$imagePath = null;

							if(isset($post['store']['hsbackgroundimage']) && $post['store']['homepage_slider']['edited'][$i] == 1) {

								$imagePath = $post['store']['hsbackgroundimage'];

							}



							array_push($slider, array(

								'index' => $post['store']['homepage_slider']['index'][$i],

								'title' => $post['store']['homepage_slider']['title'][$i],

								'sub_title' => $post['store']['homepage_slider']['sub_title'][$i],

								'content' => $post['store']['homepage_slider']['content'][$i],

								'slider_background_image' => ($imagePath != null) ? $imagePath : $post['store']['homepage_slider']['slider_background_image'][$i],

								'button_text' => $post['store']['homepage_slider']['button_text'][$i],

								'button_link' => $post['store']['homepage_slider']['button_link'][$i],

								'slider_text_color' => $post['store']['homepage_slider']['slider_text_color'][$i],

								'button_text_color' => $post['store']['homepage_slider']['button_text_color'][$i],

								'button_bg_color' => $post['store']['homepage_slider']['button_bg_color'][$i]

							));

						}				

						$post['store']['homepage_slider'] = json_encode($slider);

					} else {

						$post['store']['homepage_slider'] = json_encode([]);

					}



					if(isset($post['store']['homepage_features'])) {

						$features = [];

						for ($i=0; $i < sizeOf($post['store']['homepage_features']['index']); $i++) { 

							$imagePath = null;

							if(isset($post['store']['hfimage']) && $post['store']['homepage_features']['edited'][$i] == 1) {

								$imagePath = $post['store']['hfimage'];

							}



							array_push($features, array(

								'index' => $post['store']['homepage_features']['index'][$i],

								'title' => $post['store']['homepage_features']['title'][$i],

								'sub_title' => $post['store']['homepage_features']['sub_title'][$i],

								'feature_image' => ($imagePath != null) ? $imagePath : $post['store']['homepage_features']['feature_image'][$i],

							));

						}				

						$post['store']['homepage_features'] = json_encode($features);

					} else {

						$post['store']['homepage_features'] = json_encode([]);

					}



					if(isset($post['store']['bs_cards'])) {

						$bsCards = [];

						for ($i=0; $i < sizeOf($post['store']['bs_cards']['index']); $i++) { 

							$imagePath = null;

							if(isset($post['store']['bscimage']) && $post['store']['bs_cards']['edited'][$i] == 1) {

								$imagePath = $post['store']['bscimage'];

							}



							array_push($bsCards, array(

								'index' => $post['store']['bs_cards']['index'][$i],

								'title' => $post['store']['bs_cards']['title'][$i],

								'sub_title' => $post['store']['bs_cards']['sub_title'][$i],

								'bg_color' => $post['store']['bs_cards']['bg_color'][$i],

								'feature_image' => ($imagePath != null) ? $imagePath : $post['store']['bs_cards']['feature_image'][$i],

							));

						}				

						$post['store']['bs_cards'] = json_encode($bsCards);

					} else {

						$post['store']['bs_cards'] = json_encode([]);

					}



					if(isset($post['store']['social_links'])) {

						$bsCards = [];

						for ($i=0; $i < sizeOf($post['store']['social_links']['index']); $i++) { 

							$imagePath = null;

							if(isset($post['store']['slicon']) && $post['store']['social_links']['edited'][$i] == 1) {

								$imagePath = $post['store']['slicon'];

							}



							array_push($bsCards, array(

								'index' => $post['store']['social_links']['index'][$i],

								'title' => $post['store']['social_links']['title'][$i],

								'url' => $post['store']['social_links']['url'][$i],

								'image' => ($imagePath != null) ? $imagePath : $post['store']['social_links']['image'][$i],

							));

						}				

						$post['store']['social_links'] = json_encode($bsCards);

					} else {

						$post['store']['social_links'] = json_encode([]);

					}



					$custom_page_returns = [];

					if(isset($post['store']['custom_page'])) {

						$custom_page = [];

						for ($i=0; $i < sizeOf($post['store']['custom_page']['index']); $i++) { 

							$imagePath = null;



							if(isset($post['store']['cpimage']) && $post['store']['custom_page']['edited'][$i] == 1) {

								$imagePath = $post['store']['cpimage'];

							}



							$meta_where = null;



							if(isset($post['store']['custom_page']['meta_id'][$i]) && !empty($post['store']['custom_page']['meta_id'][$i])) {

								$meta_where = array('meta_id'=> $post['store']['custom_page']['meta_id'][$i]);

							}



							$meta_id = $this->Setting_model->save_meta(array('meta_key' => 'custom_page_content','meta_content'=>$post['store']['custom_page']['content'][$i]), $meta_where);



							array_push($custom_page, array(

								'index' => $post['store']['custom_page']['index'][$i],

								'title' => $post['store']['custom_page']['title'][$i],

								'slug' => $post['store']['custom_page']['slug'][$i],

								'meta_id' => $meta_id,

								'image' => ($imagePath != null) ? $imagePath : $post['store']['custom_page']['image'][$i],

							));



							array_push($custom_page_returns, array(

								'index' => $post['store']['custom_page']['index'][$i],

								'title' => $post['store']['custom_page']['title'][$i],

								'slug' => $post['store']['custom_page']['slug'][$i],

								'meta_id' => $meta_id,

								'content' => $post['store']['custom_page']['content'][$i],

								'image' => ($imagePath != null) ? $imagePath : $post['store']['custom_page']['image'][$i],

							));

						}				

						$post['store']['custom_page'] = json_encode($custom_page);

					} else {

						$post['store']['custom_page'] = json_encode([]);

					}





					if(isset($post['store']['footer_menu'])) {

						$available_custom_pages_slug = ['about', 'contact', 'policy', 'login', 'cart', 'profile', 'order', 'shipping', 'wishlist'];



						foreach($custom_page_returns as $page) {

							array_push($available_custom_pages_slug, $page['slug']);

						}



						$footer_menu = [];



						for ($i=0; $i < sizeOf($post['store']['footer_menu']['index']); $i++) { 

							$links = [];



							for ($j=0; $j < sizeOf($post['store']['footer_menu']['links'][$i]['title']); $j++) {



								$link_url = explode("/", $post['store']['footer_menu']['links'][$i]['url'][$j]);



								$link_slug = end($link_url);



								if($post['store']['footer_menu']['links'][$i]['type'][$j] == 'page' && !in_array($link_slug, $available_custom_pages_slug)) {

									continue;

								}



								array_push($links, [

									'title'=>$post['store']['footer_menu']['links'][$i]['title'][$j], 

									'url'=>$post['store']['footer_menu']['links'][$i]['url'][$j],

									'type'=>$post['store']['footer_menu']['links'][$i]['type'][$j]

								]);

							}



							array_push($footer_menu, array(

								'index' => $post['store']['footer_menu']['index'][$i],

								'title' => $post['store']['footer_menu']['title'][$i],

								'links' => $links

							));

						}

						$post['store']['footer_menu'] = json_encode($footer_menu);

					} else {

						$post['store']['footer_menu'] = json_encode([]);

					}



					$productsetting = $post['productsetting'];			



					$formsetting = $post['formsetting'];



					if( $productsetting['product_recursion'] == 'custom_time' ){

						if($productsetting['recursion_custom_time'] < 1){

							$json['errors']['productsetting_recursion_custom_time'] = "Recursion Time is required.";

						}else{

							unset($json['errors']['productsetting_recursion_custom_time']) ;

						}

					}else{

						$post['productsetting']['recursion_custom_time'] = 0;

					}			



					if( $formsetting['form_recursion'] == 'custom_time' ){

						if($formsetting['recursion_custom_time'] < 1){

							$json['errors']['formsetting_recursion_custom_time'] = "Time is required.";

						}else{

							unset($json['errors']['formsetting_recursion_custom_time']) ;

						}

					}else{

						$post['formsetting']['recursion_custom_time'] = 0;

					}



					foreach ($post as $key => $value) {

						if (in_array($key, $commonSetting)) {

							if($key == 'order_comment'){

								if(!isset($value['title'])){

									$value['title'] = array();

								}

							}

							$this->Setting_model->save($key, $value);

						}

					}



					if(!isset($json['errors'])){

						if($return == 'slider') {

							$json['homepage_slider'] = json_decode($post['store']['homepage_slider']);

						}

						if($return == 'features') {

							$json['homepage_features'] = json_decode($post['store']['homepage_features']);

						}

						if($return == 'bs_cards') {

							$json['bs_cards'] = json_decode($post['store']['bs_cards']);

						}



						if($return == 'footer_menu' || $return == 'custom_page') {

							$json['footer_menu'] = json_decode($post['store']['footer_menu']);

						}



						if($return == 'custom_page') {

							$json['custom_page'] = $custom_page_returns;

						}



						if($return == 'social_links') {

							$json['social_links'] = json_decode($post['store']['social_links']);

						}

						



						$json['custom_page_for_menu'] = array(

							['name'=> 'About', 'slug' => 'about'],

							['name'=> 'Contact', 'slug' => 'contact'],

							['name'=> 'Policy', 'slug' => 'policy'],

							['name'=> 'Login', 'slug' => 'login'],

							['name'=> 'cart', 'slug' => 'cart'],

							['name'=> 'User Profile', 'slug' => 'profile'],

							['name'=> 'User Order', 'slug' => 'order'],

							['name'=> 'User Shipping', 'slug' => 'shipping'],

							['name'=> 'User Wishlist', 'slug' => 'wishlist'],

						);

				

						foreach($custom_page_returns as $page){

							array_push($json['custom_page_for_menu'], ['name'=> $page['title'], 'slug' => 'page/'.$page['slug']]);

						}



						$json['success'] =  __('admin.setting_saved_successfully');

					}

				}



				echo json_encode($json);die;

		}



		$this->load->model('PagebuilderModel');

		$data['CurrencySymbol'] = $this->currency->getSymbol();

		foreach ($commonSetting as $key => $value) {

			$data[$value] 	= $this->Product_model->getSettings($value);

			if($value == 'order_comment'){

				$data['order_comment']['title'] = json_decode($data['order_comment']['title'], true);

			}

		}



		$data['country'] = $this->Product_model->getcountry('id,name');

		$data['categories'] = $this->db->query("SELECT name,slug FROM categories")->result_array();

		$data['pages'] = array(

			['name'=> 'About', 'slug' => 'about'],

			['name'=> 'Contact', 'slug' => 'contact'],

			['name'=> 'Policy', 'slug' => 'policy'],

			['name'=> 'Login', 'slug' => 'login'],

			['name'=> 'cart', 'slug' => 'cart'],

			['name'=> 'User Profile', 'slug' => 'profile'],

			['name'=> 'User Order', 'slug' => 'order'],

			['name'=> 'User Shipping', 'slug' => 'shipping'],

			['name'=> 'User Wishlist', 'slug' => 'wishlist'],

		);



		$data['store_setting'] = $this->Product_model->getSettings('store');



		$custom_pages = json_decode($data['store_setting']['custom_page']);



		foreach($custom_pages as &$page){

			$page->content = $this->Setting_model->get_meta_content(['meta_id'=>$page->meta_id])->meta_content;

			array_push($data['pages'], ['name'=> $page->title, 'slug' => 'page/'.$page->slug]);

		}



		$data['store_setting']['custom_page'] = json_encode($custom_pages);



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/setting/store_setting', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function market_tools_setting(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){redirect('admin');}



		$commonSetting = array('marketpostback','market_vendor');

		$post = $this->input->post(null,true);



		if(!empty($post)){

			$json = array();

			if(!isset($json['errors'])){

				if (!isset($post['marketpostback']['static'])) {

					$post['marketpostback']['static'] = [];

				}

				foreach ($post as $key => $value) {

					if (in_array($key, $commonSetting)) {

						$this->Setting_model->save($key, $value);

					}

				}



				if(!isset($json['errors'])){



					$json['success'] =  __('admin.setting_saved_successfully');

				}

			}

	



			echo json_encode($json);die;

		}



		$data['CurrencySymbol'] = $this->currency->getSymbol();

		foreach ($commonSetting as $key => $value) {

			$data[$value] 	= $this->Product_model->getSettings($value);

		}



		$this->view($data,'setting/market_tools_setting');

	}

	public function saas_setting(){
		$userdetails = $this->userdetails();
		if(empty($userdetails)){redirect('admin');}
		$commonSetting = array('market_vendor','vendor');
		$post = $this->input->post(null,true);
		if(!empty($post)){
			$json = array();
			if(!isset($json['errors'])){
				if (!isset($post['marketpostback']['static'])) {
					$post['marketpostback']['static'] = [];
				}
				foreach ($post as $key => $value) {
					if (in_array($key, $commonSetting)) {
						$this->Setting_model->save($key, $value);
					}
				}
				if(!isset($json['errors'])){
					$json['success'] =  __('admin.setting_saved_successfully');
				}
			}
			echo json_encode($json);die;
		}

		$data['CurrencySymbol'] = $this->currency->getSymbol();
		foreach ($commonSetting as $key => $value) {
			$data[$value] 	= $this->Product_model->getSettings($value);
		}
		$this->view($data,'setting/saas_setting');
	}


	public function paymentsetting(){

		$userdetails = $this->userdetails();

		$commonSetting = array('email','paymentsetting','integration','login', 'loginclient','productsetting','formsetting','tnc','site','affiliateprogramsetting','store','doc','googlerecaptcha');

		if(empty($userdetails)){ redirect('admin'); }

		$post = $this->input->post(null,true);



		if (isset($post['send_test_mail'])) {

			$this->load->model('Mail_model');

			echo $this->Mail_model->send_test_mail($post['send_test_mail']);

			die;

		}

		else if(!empty($post)){

			$json = array();

			if(isset($post['loginclient'])) {
				try {
					$this->Setting_model->save(
						'loginclient', 
						array(
							'heading' => $post['heading'],
							'content' => $post['content']
						)
					);
					$json['success'] = true;
				} catch (\Throwable $th) {
					$json['message'] = $th->getMessage();
				}
			}
			

			if (isset($post['action']) && $post['action'] == 'active_theme') {

				$login = array('front_template' => $post['id']);

				$this->Setting_model->save('login', $login);



				$json['success'] = 'Theme Activated Successfully';

				echo json_encode($json);die;

			}

		



			$post['site']['google_analytics'] = base64_decode($post['site']['google_analytics']);

			$post['site']['faceboook_pixel'] = base64_decode($post['site']['faceboook_pixel']);

			$post['site']['global_script'] = base64_decode($post['site']['global_script']);

			$post['site']['fbmessager_script'] = base64_decode($post['site']['fbmessager_script']);





			if($post['site']['google_analytics'] != ''){

				$content = $post['site']['google_analytics'];

				preg_match_all('#<script(.*?)</script>#is', $content, $matches);



				if(count($matches[0]) != 2){

					$json['errors']['site[google_analytics]'] = 'Wrong Google Analytics Code';

				} else if (strpos($content, 'https://www.googletagmanager.com/gtag/js') === false) {

					$json['errors']['site[google_analytics]'] = 'Wrong Google Analytics Code';

				}

			}



			if($post['site']['faceboook_pixel'] != ''){

				$content = $post['site']['faceboook_pixel'];

				preg_match_all('#<script(.*?)</script>#is', $content, $matches);

				preg_match_all('#<noscript(.*?)</noscript>#is', $content, $matches2);



				if(count($matches[0]) != 1){

					$json['errors']['site[faceboook_pixel]'] = 'Wrong Facebook Pixel Code';

				} else if (strpos($content, 'https://www.facebook.com') === false) {

					$json['errors']['site[faceboook_pixel]'] = 'Wrong Facebook Pixel Code';

				}

			}



			if(!isset($json['errors'])){

				if(count($_FILES) > 0){

					$path = 'assets/images/site';

					$this->load->helper('string');

					$config['upload_path'] = $path;

					$config['allowed_types'] = '*';

					$config['file_name']  = random_string('alnum', 32);

					$this->load->library('upload', $config);

					 

					foreach ($_FILES as $fieldname => $input) {

						$this->upload->initialize($config);

						list($key,$subkey) = explode("_", $fieldname);

						$extension = pathinfo($_FILES[$fieldname]["name"], PATHINFO_EXTENSION);



						if($input['error'] == 0){

							if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif'){

								if (!$this->upload->do_upload($fieldname)) {

								



								}

								else {

									$upload_details = $this->upload->data();

									$post[$key][$subkey] = $upload_details['file_name'];

								}

							} else{

								$json['errors']["{$key}_{$subkey}"] = 'Only Image File are allowed';

							}

						}

					}

				}

			



				// if(!isset($post['referlevel']['disabled_for'])){ $post['referlevel']['disabled_for'] = array(); }

				if(!isset($post['site']['global_script_status'])){ $post['site']['global_script_status'] = array(); }

				if(!isset($post['marketpostback']['dynamicparam'])){ $post['marketpostback']['dynamicparam'] = array(); }

				if(!isset($post['marketpostback']['static'])){ $post['marketpostback']['static'] = array(); }



				foreach ($post as $key => $value) {

					if (in_array($key, $commonSetting)) {

						$this->Setting_model->save($key, $value);

					}

				}



				if(!isset($json['errors'])){



					$json['success'] =  __('admin.setting_saved_successfully');

				}

			}

	



			echo json_encode($json);die;

		} else {

			$this->load->model('PagebuilderModel');

			$data['CurrencySymbol'] = $this->currency->getSymbol();

			foreach ($commonSetting as $key => $value) {

				$data[$value] 	= $this->Product_model->getSettings($value);

			}

			$data['getAffiliate'] 	= $this->Product_model->getAffiliateById();

			$data['users_list'] = $this->db->query("SELECT CONCAT(firstname,' ',lastname,' - (',email,')') as name ,id  FROM users WHERE type = 'user'")->result_array();

			//$themes = $this->PagebuilderModel->getAlltheme();

		



			$active_theme = [];

			$this->config->load('theme');

			$front_themes = $this->config->item('themes');

			$data['front_themes'] = [];

			foreach ($front_themes as $key => $theme) {

				if($data['login']['front_template'] != $theme['id']){

					$data['front_themes'][] = $theme;

				} else {

					$active_theme = $theme;

				}

			}



			if($active_theme){

				array_unshift($data['front_themes'], $active_theme);

			}

			$this->load->view('admincontrol/includes/header', $data);

			$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

			$this->load->view('admincontrol/setting/paymentsetting', $data);

			$this->load->view('admincontrol/includes/footer', $data);

		}

	}



	public function mlm_settings(){

		$userdetails = $this->userdetails();

		$commonSetting = array('referlevel_1','referlevel_2','referlevel_3','referlevel_4','referlevel_5','referlevel_6','referlevel_7','referlevel_8','referlevel_9','referlevel_10','referlevel');

		if(empty($userdetails)){ redirect('admin'); }

		$post = $this->input->post(null,true);



		if(!empty($post)){

			if(!isset($post['referlevel']['disabled_for'])){ $post['referlevel']['disabled_for'] = array(); }



			foreach ($post as $key => $value) {

				if (in_array($key, $commonSetting)) {

					$this->Setting_model->save($key, $value);

				}

			}



			if(!isset($json['errors'])){



				$json['success'] =  __('admin.setting_saved_successfully');

			}

	

			echo json_encode($json);die;

		} else {

			$this->load->model('PagebuilderModel');

			$data['CurrencySymbol'] = $this->currency->getSymbol();

			foreach ($commonSetting as $key => $value) {

				$data[$value] 	= $this->Product_model->getSettings($value);

			}

			$data['getAffiliate'] 	= $this->Product_model->getAffiliateById();

			$data['users_list'] = $this->db->query("SELECT CONCAT(firstname,' ',lastname,' - (',email,')') as name ,id  FROM users WHERE type = 'user'")->result_array();

			//$themes = $this->PagebuilderModel->getAlltheme();



			$this->load->view('admincontrol/includes/header', $data);

			$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

			$this->load->view('admincontrol/setting/mlm_settings', $data);

			$this->load->view('admincontrol/includes/footer', $data);

		}

	}



	public function mlm_levels(){

		$userdetails = $this->userdetails();

		$commonSetting = array('referlevel_1','referlevel_2','referlevel_3','referlevel_4','referlevel_5','referlevel_6','referlevel_7','referlevel_8','referlevel_9','referlevel_10','referlevel');

		if(empty($userdetails)){ redirect('admin'); }

		$post = $this->input->post(null,true);



		if(!empty($post)){

			if(!isset($post['referlevel']['disabled_for'])){ $post['referlevel']['disabled_for'] = array(); }



			foreach ($post as $key => $value) {

				if (in_array($key, $commonSetting)) {

					$this->Setting_model->save($key, $value);

				}

			}



			if(!isset($json['errors'])){



				$json['success'] =  __('admin.setting_saved_successfully');

			}

	

			echo json_encode($json);die;

		} else {

			$this->load->model('PagebuilderModel');

			$data['CurrencySymbol'] = $this->currency->getSymbol();

			foreach ($commonSetting as $key => $value) {

				$data[$value] 	= $this->Product_model->getSettings($value);

			}

			$data['getAffiliate'] 	= $this->Product_model->getAffiliateById();

			$data['users_list'] = $this->db->query("SELECT CONCAT(firstname,' ',lastname,' - (',email,')') as name ,id  FROM users WHERE type = 'user'")->result_array();

			//$themes = $this->PagebuilderModel->getAlltheme();



			$this->load->view('admincontrol/includes/header', $data);

			$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

			$this->load->view('admincontrol/setting/mlm_levels', $data);

			$this->load->view('admincontrol/includes/footer', $data);

		}

	}



	public function generateproductcode($affiliateads_id = null){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		else {

			if($affiliateads_id){

				$data['product_id'] = $affiliateads_id;

				$data['user_id'] = $userdetails['id'];

				$data['getProduct'] 	= $this->Product_model->getProductByIdArray($affiliateads_id);

				$this->load->view('admincontrol/product/generatecode', $data);



			}

		}

	}



	public function setAffiliateClick($aff_id = null, $user_id = null ){

	}



	public function addsaveads($adsId = null){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); }

		$post = $this->input->post(null,true);



		if(!empty($post)){

			$postdata['postdata'] =  $post;

			$InseredData['affiliateads_type'] =  $post['affiliateads_type'];

			if(!empty($_FILES['adsfile']['name'])){

				$upload_response = $this->upload_photo('adsfile','assets/images/ads');

				if($upload_response['success']) $postdata['adsfile'] = $upload_response['upload_data']['file_name'];

				else $errors = $upload_response['msg'];

			} else {

				if($post['adsfile']) $postdata['adsfile'] = $post['adsfile'];

				else $postdata['adsfile'] = '';

			}

		



			$InseredData['affiliateads_metadata'] =  json_encode($postdata);

			$InseredData['affiliateads_status'] =  $post['affiliateads_status'];

			if(empty($errors)){

				if(!empty($adsId)){

					$InseredData['affiliateads_updated_by'] =  $userdetails['id'];

					$InseredData['affiliateads_updated'] =  date('Y-m-d H:i:s');

					$this->Product_model->update_data('affiliateads', $InseredData,array('affiliateads_id' => $adsId));

					$this->session->set_flashdata('success', $post['affiliateads_type'].__('admin.updated_successfully'));

					redirect('admincontrol/affiliateadslist');

				} else {

					$InseredData['affiliateads_ipaddress'] =  $_SERVER['REMOTE_ADDR'];

					$InseredData['affiliateads_created_by'] =  $userdetails['id'];

					$InseredData['affiliateads_created'] =  date('Y-m-d H:i:s');

					$this->Product_model->create_data('affiliateads', $InseredData);

					$this->session->set_flashdata('success', $post['affiliateads_type'].__('admin.save_successfully'));

					redirect('admincontrol/affiliateadslist');

				}

			} else {

				$this->session->set_flashdata('error', $errors);

				redirect('admincontrol/'.$post['error']);

			}

		}

	}





	public function editProfile(){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); } 

		$post = $this->input->post(null,true);

		$id =  $userdetails['id'];

	



		if(!empty($post)){

			$rules = $this->user->profile_rules;

			$this->form_validation->set_rules($rules);

			if($this->form_validation->run())

			{

				$errors= array();

				$details = array(

					'firstname'     =>  $this->input->post('firstname',true),

					'lastname'      =>  $this->input->post('lastname',true),

					'email'         =>  $this->input->post('email',true),

					'PhoneNumber'   =>  $this->input->post('PhoneNumber',true),

					'Country'       =>  $this->input->post('Country',true),

					'StateProvince' =>  $this->input->post('StateProvince',true),

					'City'          =>  $this->input->post('City',true),

					'Zip'           =>  $this->input->post('Zip',true),

				);

				if(!empty($_FILES['avatar']['name'])){

					$upload_response = $this->upload_photo('avatar','assets/images/users');

					if($upload_response['success']){

						$details['avatar'] = $upload_response['upload_data']['file_name'];

					}

					else{

						$errors['avatar_error'] = $upload_response['msg'];

					}

				}

				if(empty($errors)){

					$this->session->set_flashdata('success', __('admin.profile_updated_successfully'));

					$this->user->update($id, $details);



					$user_details_array=$this->user->get_user_by_id($id);

					$this->session->set_userdata(array('administrator'=>$user_details_array));

				}

				redirect('admincontrol/editProfile');

			}

			else

			{

				$this->session->set_flashdata('error', validation_errors());

				redirect('admincontrol/editProfile');

			}

			redirect('admin');

		}else{

			$data['user']  = $this->user->get($id);

			$data['country'] = $this->Product_model->getcountry();

			$this->load->view('admincontrol/includes/header', $data);

			$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

			$this->load->view('admincontrol/users/edit_profile', $data);

			$this->load->view('admincontrol/includes/footer', $data);

		}

	}



	public function getstate($country_id = null) {

		$userdetails = $this->userdetails();

		$post = $this->input->post(null,true);



		if(empty($userdetails)){

			redirect('admin');

		}

		else {

			if(!empty($post['country_id'])){

				$states = $this->Product_model->getAllstate($post['country_id']);

			}

			echo '<option selected="selected">Select State</option>';

			if(!empty($states)){

				foreach($states as $state){

					echo '<option value="'.$state['name'].'">'.$state['name'].'</option>';

				}

			}

			die;

		}

	}



	public function delete_image($image_id = null){

		$userdetails = $this->userdetails();

		$post = $this->input->post(null,true);



		if(empty($userdetails)){

			redirect('usercontrol');

		}

		else {

			if(!empty($post['image_id'])){

				$this->Product_model->deleteImage($post['image_id']);

			}

		}

	}



	public function updatenotify($country_id = null) {

		$userdetails = $this->userdetails();

		$json = array();

		$post = $this->input->post(null,true);



		if(empty($userdetails)){ redirect('admin'); }

		else {

			if(!empty($post['id'])){

				$noti = $this->db->query("SELECT * FROM notification WHERE notification_id= ". $post['id'])->row();

				 

				if($noti->notification_type == 'membership_order'){

					if($noti->notification_viewfor == 'admin'){

						$json['location'] = base_url($noti->notification_url);

					} else{

						$json['location'] = base_url('usercontrol/'.$noti->notification_url);

					}

				}

				else if($noti->notification_type == 'integration_program'){

					if($noti->notification_viewfor == 'admin'){

						$json['location'] = base_url($noti->notification_url);

					} else{

						$json['location'] = base_url('usercontrol/'.$noti->notification_url);

					}

				}

				else if($noti->notification_type == 'integration_tools'){

					if($noti->notification_viewfor == 'admin'){

						$json['location'] = base_url('integration/'.$noti->notification_url);

					} else{

						$json['location'] = base_url('usercontrol/'.$noti->notification_url);

					}

				}

				else if($noti->notification_type == 'integration_orders'){

					$json['location'] = base_url($noti->notification_url);

				} else if($noti->notification_type == 'integration_click'){

					$json['location'] = base_url('integration/logs');

				}else{

					$json['location'] = base_url('admincontrol/'.$noti->notification_url);

				}

				$this->Product_model->update_data('notification', array('notification_is_read' => 1),array('notification_id' => $post['id']));

			}

		}



		echo json_encode($json);

	}



	public function getnotificationnew() {

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		else {

			$notifications = $this->Product_model->getnotificationnew('admin');

			echo trim(count($notifications));

		}

	}



	public function getnotificationall() {

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		else {

			$notifications = $this->Product_model->getnotificationall('admin');

			echo trim(count($notifications));

		}

	}



	public function getnotification() {

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		else {

			$notifications = $this->Product_model->getnotification('admin');

			if(!empty($notifications)){

				foreach($notifications as $notification){

					if($notification['notification_type'] == 'order'){

						echo '<a href="javascript:void(0)" onclick=shownofication('.$notification['notification_id'].',"'.base_url().'admincontrol'.$notification['notification_url'].'") class="dropdown-item notify-item">

						<div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>

						<p class="notify-details"><b>'.$notification['notification_title'].'</b><small class="text-muted">'.$notification['notification_description'].'</small></p>

						</a>';

					}

					if($notification['notification_type'] == 'client'){

						echo '<a href="javascript:void(0)" onclick=shownofication('.$notification['notification_id'].',"'.base_url().'admincontrol'.$notification['notification_url'].'") class="dropdown-item notify-item">

						<div class="notify-icon bg-primary"><i class="mdi mdi-account-circle"></i></div>

						<p class="notify-details"><b>'.$notification['notification_title'].'</b><small class="text-muted">'.$notification['notification_description'].'</small></p>

						</a>';

					}

					if($notification['notification_type'] == 'paymentrequest'){

						echo '<a href="javascript:void(0)" onclick=shownofication('.$notification['notification_id'].',"'.base_url().'admincontrol'.$notification['notification_url'].'") class="dropdown-item notify-item">

						<div class="notify-icon bg-primary"><i class="mdi mdi-account-circle"></i></div>

						<p class="notify-details"><b>'.$notification['notification_title'].'</b><small class="text-muted">'.$notification['notification_description'].'</small></p>

						</a>';

					}

					if($notification['notification_type'] == 'user'){

						echo '<a href="javascript:void(0)" onclick=shownofication('.$notification['notification_id'].',"'.base_url().'admincontrol'.$notification['notification_url'].'") class="dropdown-item notify-item">

						<div class="notify-icon bg-primary"><i class="mdi mdi-account"></i></div>

						<p class="notify-details"><b>'.$notification['notification_title'].'</b><small class="text-muted">'.$notification['notification_description'].'</small></p>

						</a>';

					}

					if($notification['notification_type'] == 'product'){

						echo '<a href="javascript:void(0)" onclick=shownofication('.$notification['notification_id'].',"'.base_url().'admincontrol'.$notification['notification_url'].'") class="dropdown-item notify-item">

						<div class="notify-icon bg-primary"><i class="mdi mdi-basket"></i></div>

						<p class="notify-details"><b>'.$notification['notification_title'].'</b><small class="text-muted">'.$notification['notification_description'].'</small></p>

						</a>';

					}

					if($notification['notification_type'] == 'commissionrequest'){

						echo '<a href="javascript:void(0)" onclick=shownofication('.$notification['notification_id'].',"'.base_url().'admincontrol'.$notification['notification_url'].'") class="dropdown-item notify-item">

						<div class="notify-icon bg-primary"><i class="mdi mdi-cash-usd"></i></div>

						<p class="notify-details"><b>'.$notification['notification_title'].'</b><small class="text-muted">'.$notification['notification_description'].'</small></p>

						</a>';

					}

				}

			}

			die;

		}

	}



	public function productupload($id = null){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		if(empty($id)){

			$this->session->set_flashdata('error', __('admin.photo_can_not_be_uploaded'));

			redirect('admincontrol/listproduct');

		}

		if(!empty($_FILES)){

			$errors= array();

			$details = array(

				'product_id'                        =>  $id,

				'product_media_upload_type'         =>  'image',

				'product_media_upload_status'       =>  1,

				'product_media_upload_os'           =>  $this->agent->platform(),

				'product_media_upload_browser'      =>  $this->agent->browser(),

				'product_media_upload_isp'          =>  gethostbyaddr($_SERVER['REMOTE_ADDR']),

				'product_media_upload_ipaddress'    =>  $_SERVER['REMOTE_ADDR'],

				'product_media_upload_created_by'   =>  $userdetails['id'],

				'product_media_upload_created_date' =>  date('Y-m-d H:i:s'),

			);

			$details['product_media_upload_created_by'] = $userdetails['id'];

			if(!empty($_FILES['product_multiple_image'])){

				$files = $_FILES;

				$cpt = count($_FILES['product_multiple_image']['name']);

			



				$this->load->helper('string');

				$config = array(

					'upload_path' => 'assets/images/product/upload/',

					'allowed_types' => 'png|gif|jpeg|jpg|PNG|GIF|JPEG|JPG',

					'max_size'      => 2048,

					'file_name'  => random_string('alnum', 32),

				);

				$this->load->library('upload', $config);

				$this->load->library('image_lib');

			    $this->upload->initialize($config);

				for($i=0; $i<$cpt; $i++){           

			        $_FILES['product_multiple_images']['name'] = $files['product_multiple_image']['name'][$i];

			        $_FILES['product_multiple_images']['type'] = $files['product_multiple_image']['type'][$i];

			        $_FILES['product_multiple_images']['tmp_name'] = $files['product_multiple_image']['tmp_name'][$i];

			        $_FILES['product_multiple_images']['error'] = $files['product_multiple_image']['error'][$i];

			        $_FILES['product_multiple_images']['size'] = $files['product_multiple_image']['size'][$i];    

			        

			        $this->upload->do_upload('product_multiple_images');

			        $upload_details = $this->upload->data();

				



					$config1 = array(

						'source_image' => $upload_details['full_path'],

						'new_image' => 'assets/images/product/upload/thumb',

						'maintain_ratio' => true,

						'width' => 300,

						'dynamic_output' => 1,

						'height' => 300

					);

					$this->image_lib->initialize($config1);

					$this->image_lib->resize();

					$this->image_lib->clear();

				



					if($upload_details){

						$details['product_media_upload_path'] = $upload_details['file_name'];

					}else{

						$errors['avatar_error'] = $upload_details['msg'];

					}

					$details['product_media_upload_created_date'] = date('Y-m-d H:i:s');

					$this->Product_model->create_data('product_media_upload', $details);				



	    		}

			}

			if(!empty($errors)){

				$this->session->set_flashdata('error', $errors['avatar_error']);

				redirect('admincontrol/productupload/'.$id);

				exit();

			}

			$this->session->set_flashdata('success', __('admin.product_images_added_successfully'));

			redirect('admincontrol/productupload/'.$id);

		}

		$data['imageslist'] = $this->Product_model->getAllImages($id);

		$data['user'] = $userdetails;

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/product/productupload', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function videoupload($id = null){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); }

		if(empty($id)){ redirect('admincontrol/listproduct'); }

		$post = $this->input->post(null,true);



		if(!empty($post)){

			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');

			$this->form_validation->set_rules('product_media_upload_video', __('admin.product_video'), 'trim');

			if($this->form_validation->run())

			{

				$errors= array();

				$details = array(

					'product_id'                        => $id,

					'product_media_upload_path'         =>  $this->input->post('product_media_upload_path',true),

					'product_media_upload_type'         =>  'video',

					'product_media_upload_status'       =>  1,

					'product_media_upload_os'           =>  $this->agent->platform(),

					'product_media_upload_browser'      =>  $this->agent->browser(),

					'product_media_upload_isp'          =>  gethostbyaddr($_SERVER['REMOTE_ADDR']),

					'product_media_upload_ipaddress'    =>  $_SERVER['REMOTE_ADDR'],

					'product_media_upload_created_by'   =>  $userdetails['id'],

					'product_media_upload_created_date' =>  date('Y-m-d H:i:s'),

				);

				if(!empty($_FILES['video_thumbnail_image']['name'])){

					$upload_response = $this->upload_photo('video_thumbnail_image','assets/images/product/upload/thumb');

					if($upload_response['success']){

						$details['product_media_upload_video_image'] = $upload_response['upload_data']['file_name'];

					}

					else{

						$errors['avatar_error'] = $upload_response['msg'];

					}

				}

				if(!empty($errors)){

					$this->session->set_flashdata('error', $errors['avatar_error']);

					redirect('admincontrol/videoupload/'.$id);

					exit();

				}

				$this->session->set_flashdata('success', __('admin.product_video_and_images_added_successfully'));

				$details['product_media_upload_created_by'] = $userdetails['id'];

				$details['product_media_upload_created_date'] = date('Y-m-d H:i:s');

				$this->Product_model->create_data('product_media_upload', $details);

				$data['productinfo'] = $this->Product_model->getProductByIdArray($id);

				$notificationData = array(

					'notification_url'          => '/videoupload/'.$id,

					'notification_type'         =>  'product',

					'notification_title'        =>  __('admin.new_product_added_in_affiliate_program'),

					'notification_view_user_id' =>  '',

					'notification_viewfor'      =>  'user',

					'notification_actionID'     =>  $id,

					'notification_description'  =>  'New Video uploaded on product '.$data['productinfo']['product_name'].' by admin in affiliate Program on '.date('Y-m-d H:i:s'),

					'notification_is_read'      =>  '0',

					'notification_created_date' =>  date('Y-m-d H:i:s'),

					'notification_ipaddress'    =>  $_SERVER['REMOTE_ADDR']

				);

				$this->insertnotification($notificationData);

				redirect('admincontrol/videoupload/'.$id);

			}

			else

			{

				$this->session->set_flashdata('error', __('admin.form_validation_error'));

				redirect('admincontrol/videoupload/'.$id);

			}

		} else {

			$data['videoimageslist'] = $this->Product_model->getAllVideoImages($id);

			$data['videoslist'] = $this->Product_model->getAllVideos($id);

			$data['user'] = $userdetails;

			$this->load->view('admincontrol/includes/header', $data);

			$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

			$this->load->view('admincontrol/product/videoupload', $data);

			$this->load->view('admincontrol/includes/footer', $data);

		}

	}



	public function deleteAllusersMultiple(){

		$json = array();

		$post = $this->input->post(null,true);

		$ids  = explode(",", $post['ids']);



		$html = '';

		$html .= "<h6>". __('admin.following_affiliate_are_remove_from_this_affiliate_are_you_sure') ."</h6> <div class='scroll-table'><table class='table table-sm table-striped'>";

		$html .= "<thead><tr><th>...</th><th>". __('admin.name') ."</th><th>". __('admin.total_unpaid_commission') ."</th></tr></thead><tbody>";



		foreach ($ids as $key => $id) {

			$user = $this->db->query("SELECT id,firstname,lastname,refid FROM users WHERE id = ". (int)$id)->row();

			if($user){

				$unpaid_commition = (float)$this->db->query('SELECT sum(amount) as total FROM wallet WHERE status IN (1,2) AND user_id = '. (int)$id )->row_array()['total'];

				$unpaid_commition += (float)$this->db->query('SELECT sum(commission) as total FROM integration_orders WHERE user_id = '. (int)$id )->row_array()['total'];



				$html .= "<tr><td>{$user->id}</td><td>{$user->firstname} {$user->lastname}</td><td>". c_format($unpaid_commition) ."</td></tr>";

			}

		}

		$html .= '</tbody></table></div>';



		$json['message'] = $html;

		echo json_encode($json);

	}



	public function deleteAllusers(){

		$json = array();

	



		$post = $this->input->post(null,true);

		$user = $this->db->query("SELECT id,firstname,lastname,refid FROM users WHERE id = ". (int)$post['id'])->row();

		if($user){

			$mylevels = $this->db->query("SELECT id,firstname,lastname,refid FROM users WHERE refid = ". (int)$post['id'])->result_array();

			if($mylevels){

				$level = $this->Product_model->getMyLevel($user->id);

				$firstLevel = (int)$level['level1'];

				$json['message'] = "<h6>". __('admin.following_affiliate_are_remove_from_this_affiliate_are_you_sure') ."</h6>";

			} else {

				$json['message'] = "<h2 class='text-center'>". __('admin.are_you_sure') ."</h2>";

			}



			$unpaid_commition = (float)$this->db->query('SELECT sum(amount) as total FROM wallet WHERE status IN (1,2) AND user_id = '. (int)$post['id'] )->row_array()['total'];

			$unpaid_commition += (float)$this->db->query('SELECT sum(commission) as total FROM integration_orders WHERE user_id = '. (int)$post['id'] )->row_array()['total'];



			$json['message'] .= "<br> ". __('admin.total_unpaid_commission') ." : ". c_format($unpaid_commition);

		}

		echo json_encode($json);

	}



	public function showTree(){

		$post = $this->input->post(null,true);

		$userdetails = $this->userdetails();

		if(empty($userdetails)){ redirect('admin'); }



		$user_id = (int)$post['id'];

		$data['user'] 	= $this->Product_model->getUserDetailsObject($user_id);

	





		/*$level1 = $this->Product_model->getMyUnder($user_id);

		foreach ($level1 as $key => $value) {

			$mylevel[$key] = $value;

			$level2 = $this->Product_model->getMyUnder($value['id']);

			foreach ($level2 as $key2 => $value2) {

				$mylevel[$key]['children'][$key2] = $value2;

				$level3 = $this->Product_model->getMyUnder($value2['id']);

				foreach ($level3 as $key3 => $value3) {

					$mylevel[$key]['children'][$key2]['children'][$key3] = $value3;

				}

			}

		}*/

		//$data['mylevel'] = $mylevel;

		$json['html'] = $this->load->view('admincontrol/users/downline_modal', $data, true);

		echo json_encode($json);

	}



	public function myreferal_ajax($user_id){

		$data = $this->Product_model->getMyUnder($user_id);

		echo json_encode($data);

	}



	public function deleteUsersConfirm(){

		$json = array();

		$ids = array();

		$post = $this->input->post(null,true);



		if(isset($post['id']) && (int)$post['id'] == 0){

			$ids[] = $post['id'];

		} else{

			$ids = explode(",", $post['id']);

		}



		foreach ($ids as $key => $id) {

			$user = $this->db->query("SELECT id,firstname,lastname,refid FROM users WHERE id = ". (int)$id)->row();

			if($user){

				if(isset($post['delete_transaction']) && $post['delete_transaction'] == 'true'){

					$this->db->query("DELETE FROM wallet WHERE status IN (1,2,4) AND user_id =". (int)$id);

					$this->db->query("UPDATE integration_orders SET user_id = 0, commission = 0 WHERE  user_id =". (int)$id);

				}



				$mylevels = $this->db->query("SELECT id,firstname,lastname,refid FROM users WHERE refid = ". (int)$id)->result_array();

				if($mylevels){

					$level = $this->Product_model->getMyLevel($user->id);

					$firstLevel = 0;

					foreach ($mylevels as $key => $value) {

						$this->db->query("UPDATE users SET refid = {$firstLevel} WHERE id = ". $value['id']);

					}		



				}



				$this->Product_model->deleteusers($user->id);

			}

		}



		$this->session->set_flashdata('success', __('admin.users_delete_successfully'));



		echo json_encode($json);

	}



	public function delete($id = null){

		if(!empty($id)){

			$res = $this->Product_model->deleteusers($id);

			$this->session->set_flashdata('success', __('admin.users_delete_successfully'));

			redirect(base_url() . 'admincontrol/userslist');

		}

		$this->session->set_flashdata('error', __('admin.users_delete_failed'));

		redirect(base_url() . 'admincontrol/userslist');

	}





	public function deleteAllproducts(){

		$post = $this->input->post(null,true);



		if(!empty($post['product']) || !empty($post['form'])){

			if(isset($post['product'])){

				foreach($post['product'] as $id){

					$this->Product_model->deleteproducts((int)$id);

				}

			}



			if(isset($post['form'])){

				$this->load->model("Form_model");

				foreach($post['form'] as $id){

					$this->Form_model->deleteforms((int)$id);

				}

			}



			$this->session->set_flashdata('success', __('admin.product_is_deleted_successfully'));

			redirect(base_url() . 'admincontrol/listproduct');

		}

		else{

			$id = (int)$this->input->get('delete_id');

			$res = $this->Product_model->deleteproducts($id);

			$this->session->set_flashdata('success', __('admin.product_is_deleted_successfully'));

			redirect(base_url() . 'admincontrol/listproduct');

		}



		$this->session->set_flashdata('error', __('admin.product_delete_failed'));

		redirect(base_url() . 'admincontrol/listproduct');

	}





	public function user_info(){

		$userdetails = $this->userdetails();

		return $this->Product_model->user_info($userdetails['id']);

	}



	public function docs(){

		$data['doc_config'] = $this->Product_model->getSettings('doc');

	



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/document/docs',$this);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function form_manage($form_id = 0){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

 

		$this->load->model("Form_model");

		$data['form'] = $this->Form_model->getForm($form_id);

		$data['form']['seo'] = str_replace('_', ' ', $data['form']['seo']);

		$data['product'] = $this->db->query("SELECT DISTINCT p.product_id,p.product_name,p.product_price,p.product_type,p.allow_shipping FROM product p 

			LEFT JOIN product_affiliate pa ON pa.product_id = p.product_id

			WHERE pa.user_id IS NULL")->result_array();



		if(!$data['product']){ redirect("admincontrol/form", 'refresh'); }



		//$data['downloads'] = $this->Product_model->parseDownloads($data['form']['downloadable_files']);

		$data['setting'] = $this->Product_model->getSettings('formsetting');

		$data['coupons'] = $this->db->query("SELECT * FROM `form_coupon`")->result_array();	



		$data['paymets'] = json_decode($data['form']['payment']);



		//$data['global_vendor_setting'] = $this->Product_model->getSettings('vendor');



		//$data['vendor_setting'] = $this->db->query("SELECT * FROM vendor_setting WHERE user_id=". (int)$data['form']['vendor_id'] ." ")->row();

 



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/form/form', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}





	public function form(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$store_setting = $this->Product_model->getSettings('store');

		// if(!$store_setting['status']){ show_404(); }

 

		$this->load->model("Form_model");

		$data['forms'] = $this->Form_model->getForms();	



 		foreach ($data['forms'] as $key => $value) {

 			$data['forms'][$key]['coupon_name'] = $this->Form_model->getFormCouponname(($value['coupon']) ? $value['coupon'] : 0);

 			$data['forms'][$key]['public_page'] = base_url('form/'.$value['seo'].'/'.base64_encode($this->userdetails()['id']));

 			$data['forms'][$key]['count_coupon'] = $this->Form_model->getFormCouponCount($value['form_id']);

 			if($value['coupon']){

 				$data['forms'][$key]['coupon_code'] = $this->Form_model->getFormCouponCode($value['coupon']);

 			}

 			$data['forms'][$key]['seo'] = str_replace('_', ' ', $value['seo']);

 		}



 		$data['product_count'] = $this->db->query("SELECT count(p.product_id) as total FROM product p 

			LEFT JOIN product_affiliate pa ON pa.product_id = p.product_id

			WHERE pa.user_id IS NULL ")->row()->total; 	



		$this->load->library("socialshare");				

		$data['social_share_modal'] =  $this->socialshare->get_dynamic_social_share_btns();



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/form/index', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function save_form(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$this->load->library('form_validation');

		$this->load->model("Form_model");



		$json = array();

		$json['errors'] = array();

		$data = $this->input->post(null,true);

 		 

		$this->form_validation->set_rules('title', 'Name', 'required|trim');

		$this->form_validation->set_rules('description', 'Description', 'required|trim');	



		$this->form_validation->set_rules('allow_for', 'Allow For', 'required|trim');

		$this->form_validation->set_rules('footer_title', 'Footer Content', 'required|trim');

		$this->form_validation->set_rules('seo', 'Seo', 'required|trim');

		$form_id = 0;



		if( $data['form_recursion_type'] == 'custom' ){

			$this->form_validation->set_rules('form_recursion', 'Form Recursion', 'required');

			if( $data['form_recursion'] == 'custom_time' ){

				$this->form_validation->set_rules('recursion_custom_time', 'Custom Time', 'required|greater_than[0]');

			}

		}		





		$form_recursion = ($data['form_recursion_type'] && $data['form_recursion_type'] != 'default') ? $data['form_recursion'] : "";

		$recursion_custom_time = ($form_recursion == 'custom_time' ) ? $data['recursion_custom_time'] : 0;

	



		/*$seo_duplicate = $this->db->query("SELECT o.form_id FROM `form` o  WHERE o.seo = '".$data['seo']."' AND NOT o.form_id = '".$form_id."' ")->row_array();

		if($seo_duplicate) $json['errors']['seo'] = 'Seo already exists';*/



		if($this->form_validation->run() == FALSE) {

			$json['errors'] = array_merge($this->form_validation->error_array(), $json['errors']);

		}else{

			$data['fevi_icon'] = '';



			if(!empty($_FILES['form_fevi_icon']['name'])){

				$upload_response = $this->upload_photo('form_fevi_icon','assets/images/form/favi/');

				if($upload_response['success']) $data['fevi_icon'] = $upload_response['upload_data']['file_name'];

				else $json['errors']['form_fevi_icon'] = $upload_response['msg'];

			} 



			if(empty($json['errors'])){

				$form = array(

					'allow_for'             => $data['allow_for'],

					'coupon'                => $data['coupon'],

					'description'           => $data['description'],

					'seo'                   => str_replace(' ', '_', trim($data['seo'])),

					'footer_title'          => $data['footer_title'],

					'product'               => implode(",", $data['product']),

					'title'                 => $data['title'],

					'google_analitics'      => $data['google_analitics'],

					'form_recursion_type'   => $data['form_recursion_type'],

					'status'                => isset($data['status']) ? (int)$data['status'] : 1,

					'form_recursion'        => $form_recursion,

					'recursion_custom_time' => (int)$recursion_custom_time,

					'recursion_endtime'     => (isset($data['recursion_endtime_status']) && $data['recursion_endtime']) ? date("Y-m-d H:i:s",strtotime($data['recursion_endtime'])) : null,

				);



				$form['sale_commision_type']  = $data['form_commision_type'];

				$form['sale_commision_value'] = $data['form_commision_value'];

				$form['click_commision_type'] = $data['form_click_commision_type'];

				$form['click_commision_ppc']  = $data['form_click_commision_ppc'];

				$form['click_commision_per']  = $data['form_click_commision_per'];

	            

				if($data['fevi_icon']){ $form['fevi_icon'] = $data['fevi_icon']; }

				if($data['id'] > 0){

					$this->db->update("form",$form,['form_id' => $data['id']]);

					$form_id = $data['id'];

				} else {

					$form['created_at'] = date("Y-m-d H:i:s");

					$this->db->insert("form",$form);

					$form_id = $this->db->insert_id();

				}



				if($data['redirect'] == 'save_stay'){

					if($data['id'] > 0){

						$json['location'] = base_url("admincontrol/form_manage/".$data['id']);

					} else {

						$json['location'] = base_url("admincontrol/form_manage/".$form_id );

					}

				} else {

					$json['location'] = base_url("admincontrol/form");

				}

			}

		}

 

		echo json_encode($json);

	}



	public function form_coupon_manage($form_coupon_id = 0){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$store_setting = $this->Product_model->getSettings('store');

		// if(!$store_setting['status']){ show_404(); }



		$this->load->model("Form_model");

		$data['form_coupon'] = $this->Form_model->getFormCoupon($form_coupon_id);	



	



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/form/form_coupon', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function form_coupon(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$store_setting = $this->Product_model->getSettings('store');

		// if(!$store_setting['status']){ show_404(); }



		$this->load->model("Form_model");

		$data['form_coupons'] = $this->Form_model->getFormCoupons();

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/form/form_coupon_index', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function save_form_coupon(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$store_setting = $this->Product_model->getSettings('store');

		// if(!$store_setting['status']){ show_404(); }



		$this->load->library('form_validation');

		$json = array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		$this->form_validation->set_rules('code', 'Coupon Code', 'required|trim');

		$this->form_validation->set_rules('type', 'Type', 'required|trim');	



		$this->form_validation->set_rules('discount', 'Discount', 'required|trim');

		$this->form_validation->set_rules('date_start', 'Start Date', 'required|trim');

		$this->form_validation->set_rules('date_end', 'End Date', 'required|trim');

		$this->form_validation->set_rules('status', 'Status', 'required|trim');

		if ($this->form_validation->run() == FALSE) {

			$json['errors'] = $this->form_validation->error_array();

		} else {

			$data = $this->input->post(null,true);

			$coupon = array(

				'name'       => $data['name'],

				'code'       => $data['code'],

				'type'       => $data['type'],			



				'discount'   => $data['discount'],

				'date_start' => date("Y-m-d", strtotime($data['date_start'])),

				'date_end'   => date("Y-m-d", strtotime($data['date_end'])),

				'uses_total' => $data['uses_total'],

				'status'     => $data['status'],			



				'date_added' => date("Y-m-d H:i:s"),

			);

			if($data['id'] > 0){

				unset($coupon['date_added']);

				$this->db->update("form_coupon",$coupon,['form_coupon_id' => $data['id']]);

			} else {

				$this->db->insert("form_coupon",$coupon);

				$coupon_id = $this->db->insert_id();

			}

			$json['location'] = base_url("admincontrol/form_coupon");

		}

		echo json_encode($json);

	}





	public function generateformcode($form = 0){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		else {

			if($form){

				$data['form_id'] = $form;

				$data['user_id'] = $userdetails['id'];

				$this->load->model("Form_model");

				$data['getForm'] 	= $this->Form_model->getForm($form);

				$this->load->view('admincontrol/form/generatecode', $data);

			}

		}

	}

	public function deleteAllforms($form = 0){

		$this->load->model("Form_model");

		$post = $this->input->post(null,true);



		if(!empty($post['checkbox'])){

			foreach($post['checkbox'] as $id){				 

				if(!empty($id)){

					$res = $this->Form_model->deleteforms($id);

				}

			}

			$this->session->set_flashdata('success', __('admin.form_is_deleted_successfully'));

			redirect(base_url() . 'admincontrol/form');

		}

		$this->session->set_flashdata('error', __('admin.form_delete_failed'));

		redirect(base_url() . 'admincontrol/form');

	}

	public function form_delete($form = 0){ 

		$this->load->model("Form_model");

		if(!empty($form)){		



			$res = $this->Form_model->deleteforms($form);			



			$this->session->set_flashdata('success', __('admin.form_is_deleted_successfully'));

			//redirect(base_url() . 'admincontrol/form');

			redirect(base_url() . 'admincontrol/form');

		}

		$this->session->set_flashdata('error', __('admin.form_delete_failed'));

		redirect(base_url() . 'admincontrol/form');

		//redirect(base_url() . 'admincontrol/form');

	}

	public function currency_list(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

	



		$data['currencys'] = $this->db->query("SELECT * FROM currency")->result_array();

		$this->load->model("Form_model");

		$data['form_coupons'] = $this->Form_model->getFormCoupons();

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/currency/index', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}

	public function currency_delete($currency_id){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$this->db->query("DELETE FROM currency WHERE is_default = 0 AND currency_id = ". (int)$currency_id);

		$this->session->set_flashdata('success', __('admin.currency_delete_success'));

		redirect(base_url() . 'admincontrol/currency_list');

	}

	public function currency_edit($currency_id = 0){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$post = $this->input->post(null,true);



		if (isset($post['currency_id'])) {

			$this->form_validation->set_rules('title', 'Name', 'required|trim');

			$this->form_validation->set_rules('code', 'Coupon Code', 'required|trim');

			$this->form_validation->set_rules('value', 'Type', 'required|trim');	



			$this->form_validation->set_rules('status', 'Status', 'required|trim');

			if ($this->form_validation->run() == FALSE) {

				$json['errors'] = $this->form_validation->error_array();

			} else {

				$data = $this->input->post(null,true);

				$coupon = array(

					'title'         => $data['title'],

					'code'          => $data['code'],

					'symbol_left'   => $data['symbol_left'],

					'symbol_right'  => $data['symbol_right'],

					'decimal_place' => $data['decimal_place'],

					'value'         => $data['value'],

					'status'        => $data['status'],

					'is_default'    => isset($data['is_default']) ? 1 : 0,

					'date_modified' => date("Y-m-d H:i:s"),

				);

				if($data['currency_id'] > 0){

					$this->db->update("currency",$coupon,['currency_id' => $data['currency_id']]);

				} else {

					$this->db->insert("currency",$coupon);

					$data['currency_id'] = $this->db->insert_id();

				}

				if(isset($data['is_default'])){

					$this->db->query("UPDATE currency SET is_default = 0");

					$this->db->query("UPDATE currency SET is_default = 1 WHERE currency_id = ". $data['currency_id']);

				}

				$json['location'] = base_url("admincontrol/currency_list");

			}

			echo json_encode($json);die;

		}

		if($currency_id > 0){

			$data['currencys'] = $this->db->query("SELECT * FROM currency WHERE currency_id = {$currency_id} ")->row_array();

		}

		$this->load->model("Form_model");

		$data['form_coupons'] = $this->Form_model->getFormCoupons();

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/currency/form', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}

	public function currency_refresh() {

		$currency_data = array();

		$selected = $this->db->query("SELECT * FROM currency WHERE is_default=1")->row_array();

		$query = $this->db->query("SELECT * FROM currency WHERE code != '" . $selected['code'] . "'")->result_array();

	



		foreach ($query as $result) {

			$currency_data[] = $selected['code'] . $result['code'] . '=X';

			$currency_data[] = $result['code'] . $selected['code'] . '=X';

		}

		echo 'http://download.finance.yahoo.com/d/quotes.csv?s=' . implode(',', $currency_data) . '&f=sl1&e=.json';

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, 'http://download.finance.yahoo.com/d/quotes.csv?s=' . implode(',', $currency_data) . '&f=sl1&e=.json');

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($curl, CURLOPT_HEADER, false);

		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);

		curl_setopt($curl, CURLOPT_TIMEOUT, 30);

		$content = curl_exec($curl);

	



		curl_close($curl);

		$line = explode("\n", trim($content));

		 echo "<pre>"; print_r($line); echo "</pre>";die; 

		for ($i = 0; $i < count($line); $i = $i + 2) {

			$currency = utf8_substr($line[$i], 4, 3);

			$value = utf8_substr($line[$i], 11, 6);

		



			if ((float)$value < 1 && isset($line[$i + 1])) {

				$value = (1 / utf8_substr($line[$i + 1], 11, 6));

			}



					



			if ((float)$value) {

				$this->db->query("UPDATE " . DB_PREFIX . "currency SET value = '" . (float)$value . "', date_modified = '" .  $this->db->escape(date('Y-m-d H:i:s')) . "' WHERE code = '" . $this->db->escape($currency) . "'");

			}

		}

		$this->db->query("UPDATE " . DB_PREFIX . "currency SET value = '1.00000', date_modified = '" .  $this->db->escape(date('Y-m-d H:i:s')) . "' WHERE code = '" . $this->db->escape($selected['code']) . "'");

		$this->cache->delete('currency');

	}



	public function order_attechment($filename,$mask){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$file = APPPATH .'/downloads_order/'. $filename;

		$mask = basename($mask);



		if (!headers_sent()) {

			if (file_exists($file)) {

				header('Content-Type: application/octet-stream');

				header('Content-Disposition: attachment; filename="' . ($mask ? $mask : basename($file)) . '"');

				header('Expires: 0');

				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

				header('Pragma: public');

				header('Content-Length: ' . filesize($file));



				if (ob_get_level()) { ob_end_clean(); }

				readfile($file, 'rb');

				exit();

			} else {

				exit('Error: Could not find file ' . $file . '!');

			}

		} else {

			exit('Error: Headers already sent out!');

		}

	}



	public function u_status_toggle($user_id){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$this->db->query("UPDATE users SET status = IF(status=1,0,1) WHERE id= ". (int)$user_id);



		$this->session->set_flashdata('success', __('admin.user_status_change_success'));

		redirect(base_url() . 'admincontrol/userslist');

	}



	public function info_remove_tran_multiple(){

		$post = $this->input->post(null,true);

		$ids = explode(",", $post['ids']);



		$html = '<h6 class="text-center"> Multiple Delete </h6><div style="height: 400px;overflow: auto;"><table class="table table-condensed table-bordered">';

		foreach ($ids as $key => $id) {

			$data = $this->Wallet_model->getDeleteData($id);



			$html .= "<tr>";

			$html .= '<td>'. $data['id'] .'</td>';

			$html .= '<td> Deleted Amount : '. c_format($data['amount']) .' </td>';

			$html .= '<td>';

			foreach ($data['removed'] as $key => $value) {

				$html .= "<p>". $value['message'] ."</p>";

			}

			$html .= '</td>';

			$html .= "</tr>";

		



		}

		$html .= "</table></div><br><div class='row'> <div class='col-sm-6'><button data-dismiss='modal' class='btn btn-primary btn-block'>Cancel</button></div> <div class='col-sm-6'><button class='btn btn-danger btn-block' delete-mmultiple-confirm='". $post['ids'] ."'>Yes Confirm</button></div> </div>";



		$json['html'] = $html;

		echo json_encode($json);

	}

	public function confirm_remove_tran_multi(){

		$post = $this->input->post(null,true);

		$ids = explode(",", $post['id']);

		foreach ($ids as $key => $id) {

			$data = $this->Wallet_model->getDeleteData($id);

		



			foreach ($data['removed'] as $key => $value) {

				if(isset($value['query']) && $value['query']) $this->db->query($value['query']);

			}



			$this->db->query("DELETE FROM wallet_recursion WHERE transaction_id = ". $data['id']);

			$this->db->query("DELETE FROM wallet WHERE parent_id = ". $data['id']);

			$this->db->query("DELETE FROM wallet WHERE id = ". $data['id']);

		}

		echo json_encode($json);

	}



	public function info_remove_tran(){

		$data = $this->Wallet_model->getDeleteData((int)$this->input->post("id",true));



		$html = '<h6 class="text-center"> Deleted Amount : '. c_format($data['amount']) .' </h6><hr>';

		$html .= '<p class="text-center"> Transaction ID : '. $data['id'] .' </p>';

		foreach ($data['removed'] as $key => $value) {

			$html .= "<p>". $value['message'] ."</p>";

		}

	



		$html .= "<br><div class='row'> <div class='col-sm-6'><button data-dismiss='modal' class='btn btn-primary btn-block'>Cancel</button></div> <div class='col-sm-6'><button class='btn btn-danger  btn-block' delete-tran-confirm='". $data['id'] ."'>Yes Confirm</button></div> </div>";



		$json['html'] = $html;

		echo json_encode($json);

	}





	public function confirm_remove_tran(){

		$data = $this->Wallet_model->getDeleteData((int)$this->input->post("id",true));

		foreach ($data['removed'] as $key => $value) {

			if(isset($value['query']) && $value['query']) $this->db->query($value['query']);

		}



		$this->db->query("DELETE FROM wallet_recursion WHERE transaction_id = ". $data['id']);

		$this->db->query("DELETE FROM wallet WHERE parent_id = ". $data['id']);

		$this->db->query("DELETE FROM wallet WHERE id = ". $data['id']);

		echo json_encode($json);

	}



	public function info_recursion_tran(){

		$wallet_data = $this->Wallet_model->getbyId((int)$this->input->post("id",true));

		$recursion = $this->Wallet_model->GetTransactionRecursion($wallet_data->id);		





		$recursion_type	= array(

			"every_day"   => __("admin.every_day"),

			"every_week"  => __("admin.every_week"),

			"every_month" => __("admin.every_month"),

			"every_year"  => __("admin.every_year"),

			"custom_time" => __("admin.custom_time")

		);



		$minutes = $recursion['custom_time'];

		$day = floor ($minutes / 1440);

		$hour = floor (($minutes - $day * 1440) / 60);

		$minute = $minutes - ($day * 1440) - ($hour * 60);



		$data['day'] = $day;

		$data['hour'] = $hour;

		$data['minute'] = $minute;

		$data['recursion_type'] = $recursion_type;

		$data['wallet_data'] = $wallet_data;

		$data['recursion'] = $recursion;



		$json['html'] = $this->load->view("admincontrol/users/part/recurring", $data,true);

		$json['recursion_type'] = $recursion['type'];

		echo json_encode($json);

	}



	public function confirm_recursion_tran(){



		$data = $this->input->post();

		$json = $this->Wallet_model->addTransactionRecursion($data);



		$data['status'] = $this->Wallet_model->status;

		$data['status_icon'] = $this->Wallet_model->status_icon;

		$data['request_status'] = $this->Wallet_model->request_status;

		$transaction = $this->Wallet_model->getTransaction(['id' => $data['transaction_id']]);



		$json['table'] = '';

		foreach ($transaction as $key => $value) {

			$data['class'] = 'child-recurring';

			$data['force_class'] = $_POST['ischild'] == 'true' ? 'child-arrow' : '';

			$data['recurring'] = $id;

			$data['value'] = $value;

 			$data['wallet_status'] = $data['status'];

			$json['table'] .= $this->load->view("admincontrol/users/part/new_wallet_tr", $data, true);

		}

	



		echo json_encode($json);

	}



	public function wallet_change_status(){

		$id = (int)$this->input->post("id",true);

		$val = (int)$this->input->post("val",true);

		$confirm = $this->input->post("confirm",true);



		$json = [];

		$tran = $this->db->query("

			SELECT 

				w.*,u.firstname,u.lastname,u.email,wallet_recursion.id as wallet_recursion_id,

				(SELECT SUM(amount) FROM `wallet` ww WHERE ww.parent_id=w.id) as total_recurring_amount

			FROM wallet w 

			LEFT JOIN users u ON u.id=w.user_id  

			LEFT JOIN  wallet_recursion ON wallet_recursion.transaction_id = w.id

			WHERE w.id= {$id}

		")->row();



		if($tran->wallet_recursion_id && !$confirm){

			$json['ask_confirm'] = $tran;

			$data['status'] = $val;

			$data['tran'] = $tran;

			$json['html'] = $this->load->view("admincontrol/users/part/confirmstatus",$data,true);

		} else {



			if($tran->type == 'sale_commission' && $tran->comm_from == 'ex'){

				$this->db->query("UPDATE integration_orders SET status = {$val} WHERE id=". $tran->reference_id_2 );

			}



			if($tran->type == 'external_click_commission' && $tran->is_action && $tran->comm_from == 'ex'){



			}

		

			if($val == 1){

				$tran->comment = str_replace('Clicked done from ip_message', '', $tran->comment);

				$notificationData = array(

					'notification_url'          => 'mywallet',

					'notification_type'         => 'wallet',

					'notification_title'        => c_format($tran->amount) ." Credited in your wallet",

					'notification_view_user_id' => $tran->user_id,

					'notification_viewfor'      => 'user',

					'notification_actionID'     => $tran->id,

					'notification_description'  => $tran->comment,

					'notification_is_read'      => '0',

					'notification_created_date' => date('Y-m-d H:i:s'),

					'notification_ipaddress'    => $_SERVER['REMOTE_ADDR']

				);



				$this->load->model('Mail_model');

				$this->Mail_model->wallet_noti_in_wallet($tran);



				$this->insertnotification($notificationData);

			} else {

				$notificationData = array(

					'notification_url'          => 'mywallet',

					'notification_type'         => 'wallet',

					'notification_title'        => "Transactions status changed",

					'notification_view_user_id' => $tran->user_id,

					'notification_viewfor'      => 'user',

					'notification_actionID'     => $tran->id,

					'notification_description'  => "Transactions #{$id} status changed to ". ($val == 1 ? 'In Wallet' : 'On Hold') .". Amount is " . c_format($tran->amount),

					'notification_is_read'      => '0',

					'notification_created_date' => date('Y-m-d H:i:s'),

					'notification_ipaddress'    => $_SERVER['REMOTE_ADDR']

				);

				$this->insertnotification($notificationData);



				$this->load->model('Mail_model');

				$this->Mail_model->wallet_noti_on_hold_wallet($tran);

			}



			if($confirm == 'changeall'){

				$this->db->query("UPDATE wallet SET status = {$val} WHERE parent_id ={$id} ");

			}



			//$this->db->query("UPDATE wallet SET status = {$val} WHERE id ={$id} ");

			$this->db->query("UPDATE wallet SET status = {$val} WHERE parent_id=0 AND group_id =". $tran->group_id);



			/*$this->load->model('Mail_model');

			$this->Mail_model->wallet_noti_in_wallet($tran);*/



			$json['success'] = true;

		}

		 



		echo json_encode($json);



	}







	function list_files($path) {

        $files = array();

        $folders = array();

        if (is_dir($path)) {

            if ($handle = opendir($path)) {

                while (($name = readdir($handle)) !== false) {

                    if (!preg_match("#^\.#", $name)){

                        if (!is_dir($path . "/" . $name)) {

                        	$ext = pathinfo($name, PATHINFO_EXTENSION);

                        	if (in_array($ext, array('js','php','css','svg'))) {

                            	$files[] = realpath($path ."/". $name);

                        	}

                        } else {

                            $t = $this->list_files($path . "/" . $name);

                            if($t) $folders[$name] = $t;

                        }

                    }

                }

                closedir($handle);

            }

        }

        $result = array_merge($folders, $files);

        return $result;

    }



	public function front_template(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$post = $this->input->post(null);

		unset($_FILES['files']);



		if(!empty($post) || !empty($_FILES)){

			$commonSetting = array('templates','loginclient');

			if(count($_FILES) > 0){



				$this->load->helper('string');

				$config['allowed_types'] = '*';

				$config['file_name']  = random_string('alnum', 32);

				$this->load->library('upload', $config);

				 

				foreach ($_FILES as $fieldname => $input) {

					list($key,$subkey) = explode("_", $fieldname);



					if($key == 'files' || $key == 'templates'){

						$path = $this->front_assets."img/";

					} else{

						$path = 'assets/images/site';

					}

					$config['upload_path'] = $path;



					$this->upload->initialize($config);

					if($input['error'] == 0){

						$extension = pathinfo($_FILES[$fieldname]["name"], PATHINFO_EXTENSION);

						if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif'){

							if (!$this->upload->do_upload($fieldname)) {

								 echo "<pre>"; print_r($this->upload); echo "</pre>";die; 

							}

							else {

								$upload_details = $this->upload->data();

								$post[$key][$subkey] = $upload_details['file_name'];

							}

						} else{

							$json['errors']["{$key}_{$subkey}"] = 'Only Image File are allowed';

						}

					}

				}

			}

			foreach ($post as $key => $value) {

				if (in_array($key, $commonSetting)) {

					$this->Setting_model->save($key, $value);

				}

			}

			$this->session->set_flashdata('success', __('admin.setting_saved_successfully'));

			redirect('admincontrol/front_template');

		}

		//$data['template_file']['templates'] = $this->list_files(APPPATH . 'views/auth/user/');



		$data['template_file'] = $this->list_files(APPPATH . 'views/auth/user/');

		$data['image_manager_url'] = base_url('/admincontrol/load_image_manager');

		$data['templates'] = $this->Product_model->getSettings('templates');

		$data['loginclient'] = $this->Product_model->getSettings('loginclient');

		$data['templates_url'] = $this->front_assets_url ."img/";



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/template_editor/editor', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function load_image_manager(){

		$filter_name = '';

		$rootDir = $this->front_assets ."img";

		$rootDirUrl = $this->front_assets_url ."img";

		$get = $this->input->get(null,true);



		if (isset($get['directory'])) {

			$directory = rtrim($rootDir . str_replace(array('../', '..\\', '..'), '', $get['directory']), '/');

		} else { $directory = $rootDir; }



		$data['images'] = array();

		$directories = glob($directory . '/' . $filter_name . '*', GLOB_ONLYDIR);



		if (!$directories) { $directories = array(); }



		if (isset($get['target'])) {

			$data['target'] = $get['target'];

		} else { $data['target'] = ''; }



		if (isset($get['thumb'])) {

			$data['thumb'] = $get['thumb'];

		} else { $data['thumb'] = ''; }



		if (isset($get['directory'])) {

			$data['directory'] = $get['directory'];

		} else { $data['directory'] = ''; }



		$files = glob($directory . '/' . $filter_name . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE);



		if (!$files) {

			$files = array();

		}



		$images = array_merge($directories, $files);

		$image_total = count($images);



		$fun_url = base_url('/admincontrol/front_template');

		$data['image_manager_url'] = $image_manager_url = base_url('/admincontrol/load_image_manager');



		foreach ($images as $image) {

			$name = str_split(basename($image), 14);



			if (is_dir($image)) {

				$url = '';

				if (isset($get['target'])) { $url .= '&target=' . $get['target']; }

				if (isset($get['thumb'])) { $url .= '&thumb=' . $get['thumb']; }



				$data['images'][] = array(

					'thumb' => '',

					'name'  => implode(' ', $name),

					'type'  => 'directory',

					'path'  => substr($image, strlen($rootDir)),

					'href'  => $image_manager_url.'?directory=' . urlencode(substr($image, strlen($directory))) . $url,

				);

			} elseif (is_file($image)) {

		



				$server = '';

 

				$data['images'][] = array(

					'thumb' => $rootDirUrl . str_replace($rootDir, '', $image),

					'name'  => implode(' ', $name),

					'type'  => 'image',

					'path'  => substr($image, strlen($rootDir)),

					'href'  => $rootDirUrl . $image

				);

			}

		}

	



		$config['base_url'] = $fun_url;

		$data['fun_url'] = $fun_url;

		$data['image_upload'] = base_url('/admincontrol/image_upload_filemanager');

		$data['folder_url'] = base_url('/admincontrol/folder_filemanager');

		$data['delete_image_url'] = base_url('/admincontrol/delete_image_filemanager');

		$data['entry_folder'] = 'Enter Folder';

		$data['button_folder'] = 'Folder';

		$data['text_confirm'] = 'Sure You want to delete?';



		$url = $image_manager_url;

		$eurl  = '' ;



		if (isset($get['directory'])) { $eurl .= '&directory=' . urlencode(html_entity_decode($get['directory'], ENT_QUOTES, 'UTF-8')); }

		if (isset($get['filter_name'])) { $eurl .= '&filter_name=' . urlencode(html_entity_decode($get['filter_name'], ENT_QUOTES, 'UTF-8')); }

		if (isset($get['target'])) { $eurl .= '&target=' . $get['target']; }

		if (isset($get['thumb'])) { $eurl .= '&thumb=' . $get['thumb']; }

		$data['url'] = $url .'?'. ltrim($eurl,'&'); 



		$url = '';

		if (isset($get['directory'])) {

			$pos = strrpos($get['directory'], '/');



			if ($pos) {

				$url .= '&directory=' . urlencode(substr($get['directory'], 0, $pos));

			}

		}



		if (isset($get['target'])) { $url .= '&target=' . $get['target']; }

		if (isset($get['thumb'])) { $url .= '&thumb=' . $get['thumb']; }

 

		$data['parent'] = $image_manager_url .'?'. ltrim($url,'&');

		echo $this->load->view('admincontrol/template_editor/editor_image', $data);

	}



	public function image_upload_filemanager(){

		$json = array();

		$DIR_IMAGE = $this->front_assets ."img";;

	



		if (isset($get['directory'])) {

			$directory = rtrim($DIR_IMAGE . str_replace(array('../', '..\\', '..'), '', $get['directory']), '/');

		} else {

			$directory = $DIR_IMAGE ;

		}



		if (!is_dir($directory)) {

			$json['error'] = "Directory Not Found" ;

		}



		if (!$json) {

			if (!empty($_FILES['file']['name']) && is_file($_FILES['file']['tmp_name'])) {

				$filename = basename(html_entity_decode($_FILES['file']['name'], ENT_QUOTES, 'UTF-8'));



				if ((strlen($filename) < 3) || (strlen($filename) > 255)) {

					$json['error'] = "File Name not valid";

				}



				$allowed = array('jpg','jpeg','gif','png');

				if (!in_array(strtolower(substr(strrchr($filename, '.'), 1)), $allowed)) {

					$json['error'] = "File type Invalid";

				}



				$allowed = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');



				if (!in_array($_FILES['file']['type'], $allowed)) {

					$json['error'] = "File type Invalid";

				}



				if ($_FILES['file']['error'] != UPLOAD_ERR_OK) {

					$json['error'] = 'Upload Error ' . $_FILE['file']['error'];

				}

			} else {

				$json['error'] = "Upload File Fail";

			}

		}



		if (!$json) {

			move_uploaded_file($_FILES['file']['tmp_name'], $directory . '/' . $filename);

			$json['success'] = 'Upload successfully';

		}



		echo json_encode($json);die;

	}



	public function folder_filemanager(){

		$json = array();

		$DIR_IMAGE = $this->front_assets ."img";

		$post = $this->input->post(null,true);

		$get = $this->input->get(null,true);





		if (isset($get['directory'])) {

			$directory = rtrim($DIR_IMAGE  . str_replace(array('../', '..\\', '..'), '', $get['directory']), '/');

		} else { $directory = $DIR_IMAGE ; }

 

		if (!is_dir($directory)) { $json['error'] = 'Invalid Directory'; }



		if (!$json) {

			$folder = str_replace(array('../', '..\\', '..'), '', basename(html_entity_decode($post['folder'], ENT_QUOTES, 'UTF-8')));

			if ((strlen($folder) < 3) || (strlen($folder) > 128)) { $json['error'] = "Folder Name must be 3 to 128 characters"; }

			if (is_dir($directory . '/' . $folder)) { $json['error'] = "Folder Already exists"; }

		}



		if (!$json) {

			mkdir($directory . '/' . $folder, 0777);

			chmod($directory . '/' . $folder, 0777);



			$json['success'] = "Directory Create successfully";

		}



		echo json_encode($json);die;

	}



	public function delete_image_filemanager(){

		$json = array();

		$DIR_IMAGE = $this->front_assets ."img";

		$post = $this->input->post(null,true);



		if (isset($post['path'])) {

			$paths = $post['path'];

		} else {

			$paths = array();

		}

	



		foreach ($paths as $path) {

			$path = rtrim($DIR_IMAGE . str_replace(array('../', '..\\', '..'), '', $path), '/');

			if ($path == $DIR_IMAGE ) {

				$json['error'] = "Some Thing want wrong";

				break;

			}

		}



		if (!$json) {

			foreach ($paths as $path) {

				$path = rtrim($DIR_IMAGE . str_replace(array('../', '..\\', '..'), '', $path), '/');



				if (is_file($path)) { 

					unlink($path);

				} elseif (is_dir($path)) {

					$files = array();

					$path = array($path . '*');



					while (count($path) != 0) {

						$next = array_shift($path);

						foreach (glob($next) as $file) {

							if (is_dir($file)) { $path[] = $file . '/*'; }

							$files[] = $file;

						}

					}



					rsort($files);



					foreach ($files as $file) {

						if (is_file($file)) { unlink($file); } 

						elseif (is_dir($file)) { rmdir($file); }

					}

				}

			}



			$json['success'] = "Successfully Delete";

		}



		echo json_encode($json);die;

	}



	public function editor_get_file(){

		$json = array();

		$path = $this->input->post("path",true);

		if($path && is_file($path)){

			$json['contents'] = file_get_contents($path);



			$json['ext'] = pathinfo($path, PATHINFO_EXTENSION);

		} else {

			$json['erorr'] = "File not found ..!";

		}



		echo json_encode($json);

	}



	public function editor_save_file(){

		$json = array();

		$path = $this->input->post("path",true);

		$post = $this->input->post(null,true);



		if($path && is_file($path)){

			file_put_contents($path,trim($post['text']));

			$json['success'] = "File save successfully";

		} else {

			$json['erorr'] = "File not found ..!";

		}





		echo json_encode($json);

	}



	public function registration_builder()	{

		if ($this->input->server('REQUEST_METHOD') == 'POST'){

			$post = $this->input->post(null,true);

			$json = array();

			$this->Setting_model->save('registration_builder', $post );

			echo json_encode($json);die;

		}



		$data['builder'] = $this->Product_model->getSettings('registration_builder');

		$fields  = json_decode($data['builder']['registration_builder'],1);

		$default_fields = array('firstname' => 0,'lastname' => 0 ,'email' => 0,'username' => 0,'password' => 0,'confirm_password' => 0);



		foreach ($fields as $key => $value) {

			if($value['type'] == 'header' && !isset($default_fields[strtolower($value['label'])]) ){

				unset($fields[$key]);

			}

		}



		$allfield = array();

		foreach ($fields as $key => $value) {

			$allfield[strtolower($value['label'])] = 1;

		}

	



		foreach ($default_fields as $value => $key) {

			if (!isset($allfield[$value])) {

				$fields[] = array(

					'type' => 'header',

		            'label' => ucfirst($value),

		            'placeholder' => ucfirst($value),

		            'className' => '',

		            'name' => $value,

		            'mobile_validation' => false,

				);

			}

		}

		 



		$data['builder']['registration_builder'] = json_encode(array_values($fields));

	



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/registration_builder/index', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}





	public function sendAffiliateEmail(){

		$this->load->library('form_validation');

		$json = array();

		$this->form_validation->set_rules('to', 'To', 'required|trim');

		$this->form_validation->set_rules('subject', 'Subject', 'required|trim');

		$this->form_validation->set_rules('message', 'Message', 'required|trim');



		if ($this->form_validation->run() == FALSE) {

			$json['errors'] = $this->form_validation->error_array();

		} else {

			$emails = explode(",", $this->input->post("to",true));

			$this->load->model('Mail_model');

			$post = $this->input->post(null,true);

			foreach ($emails as $key => $email) {

				$this->Mail_model->affiliate_mail($email, $post);

			}

			$json['success'] = count($emails). " mails sent successfully..!";

		}



		echo json_encode($json);

	}



	public function theme_setting(){

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$post = $this->input->post(null,true);



		if(!empty($post)){

			$commonSetting = array('adminside','affiliateside');



			foreach ($post as $key => $value) {

				if (in_array($key, $commonSetting)) {

					$this->Setting_model->save($key, $value);

				}

			}

			$this->session->set_flashdata('success', __('admin.setting_saved_successfully'));

			redirect('admincontrol/theme_setting');

		}



		$data['theme_setting']['adminside'] = $this->Product_model->getSettings('adminside');

		$data['theme_setting']['affiliateside'] = $this->Product_model->getSettings('affiliateside');

	



		$data['setting_tabs'] = array(

			'adminside'		=> 'Admin Side',

			'affiliateside'	=> 'Affiliate Side',

		);



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/setting/themesetting', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



	public function getDatesFromType(){

		$data = array();

		$type = $this->input->post('type',true);



		if($type == 'month'){

			$data = array('All','01','02','03','04','05','06','07','08','09','10','11','12');

		}else{

			$data = array('All',date("Y",strtotime("-3 year")),date("Y",strtotime("-2 year")),date("Y",strtotime("-1 year")),date("Y",strtotime("0 year")));

		}



		echo json_encode($data);die;

	}



	public function get_integartion_data($return  = false){

		$post = $this->input->post();

		$json = array();



		if($post['integration_data_year'] && $post['integration_data_month']){

			$integration_filters = array(

				'integration_data_year' => $post['integration_data_year'],

				'integration_data_month' => $post['integration_data_month'],

			);

		}else{

			$integration_filters = array();

		}



		$totals = $this->Wallet_model->getTotals($integration_filters, true);

		if($totals){

			$html = '';

			if ($totals['integration']['all'] ==null) {

			    $html .= '<div class="text-center">

			        <img class="img-responsive" src="'. base_url('assets/vertical/assets/images/no-data-2.png') .'" style="margin-top:100px;">

			        <h3 class="m-t-40 text-center text-muted">'. __('admin.no_integration_done_yet') .'</h3>

			    </div>';

			} else {

			    $html .= '<div role="tabpanel" class="tab-pane" id="site-all" style="display: block">

			        <ul class="list-group p-t-10" style="min-height:360px">

			            <li class="list-group-item">

			                '. __( 'admin.total_balance' ) .'

			                <span class="badge badge-primary badge-pill font-14 pull-right">

			                    '. c_format($totals['integration']['balance']) .'        

			                </span>

			            </li>

			            <li class="list-group-item">

			                '. __( 'admin.total_sales' ) .'

			                <span class="badge badge-primary badge-pill font-14 pull-right">

			                    '. c_format($totals['integration']['balance']) .' / '. c_format($totals['integration']['sale']) .'        

			                </span>

			            </li>

			            <li class="list-group-item">

			                '. __( 'admin.total_clicks' ) .'

			                <span class="badge badge-primary badge-pill font-14 pull-right">

			                    '. (int)$totals['integration']['click_count'] .' / '. c_format($totals['integration']['click_amount']) .'

			                </span>

			            </li>

			            <li class="list-group-item">

			                '. __('admin.total_actions') .'

			                <span class="badge badge-primary badge-pill font-14 pull-right">

			                    '. (int)$totals['integration']['action_count'] .' / '. c_format($totals['integration']['action_amount']) .'

			                </span>

			            </li>

			            <li class="list-group-item">

			                '. __( 'admin.total_commission' ) .'

			                <span class="badge badge-primary badge-pill font-14 pull-right">

			                    '. c_format($totals['integration']['total_commission']) .' 

			                </span>

			            </li>

			            <li class="list-group-item">

			                '. __( 'admin.total_orders' ) .'

			                <span class="badge badge-primary badge-pill font-14 pull-right">

			                    '. (int)$totals['integration']['total_orders'] .' 

			                </span>

			            </li>

			        </ul>

			    </div>';

			    $index = 0; 

			    foreach ($totals['integration']['all'] as $website => $value) {

			        $html .= '<div role="tabpanel" class="tab-pane" id="site-'. ++$index .'" style="height:360px;display: none;">

			            <ul class="list-group p-t-10" >

			                <li class="list-group-item">

			                    '. __( 'admin.total_balance' ) .'

			                    <span class="badge badge-primary badge-pill font-14 pull-right">

			                        '. c_format($value['balance']) .'

			                    </span>

			                </li>

			                <li class="list-group-item">

			                    '. __( 'admin.total_sales' ) .'

			                    <span class="badge badge-primary badge-pill font-14 pull-right">

			                        '. c_format($value['balance']) .' / '. c_format($value['sale']) .'        

			                    </span>

			                </li>

			                <li class="list-group-item">

			                    '. __( 'admin.total_clicks' ) .'

			                    <span class="badge badge-primary badge-pill font-14 pull-right">

			                        '. (int)$value['click_count'] .' / '. c_format($value['click_amount']) .'

			                    </span>

			                </li>

			                <li class="list-group-item">

			                    '. __('admin.total_actions') .'

			                    <span class="badge badge-primary badge-pill font-14 pull-right">

			                        '. (int)$value['action_count'] .' / '. c_format($value['action_amount']) .'

			                    </span>

			                </li>

			                <li class="list-group-item">

			                    '. __( 'admin.total_commission' ) .'

			                    <span class="badge badge-primary badge-pill font-14 pull-right">

			                        '. c_format($value['click_amount'] + $value['sale'] + $value['action_amount']) .' 

			                    </span>

			                </li>

			                <li class="list-group-item">

			                    '. __( 'admin.total_orders' ) .'

			                    <span class="badge badge-primary badge-pill font-14 pull-right">

			                        '. (int)$value['total_orders'] .' 

			                    </span>

			                </li>

			                <li class="list-group-item">

			                    <a class="btn btn-lg btn-default btn-primary" href="http://'. $website .'" target="_blank">'. __( 'admin.priview_store' ) .'</a>

			                </li>

			            </ul>

			        </div>';

			    }

			}



			$integration_data_selected = 'all';

			if(isset($post['integration_data_selected']) && $post['integration_data_selected'] != '') $integration_data_selected = $post['integration_data_selected'];



			$newHTML = "<div class='p-3'>

                    <select name='integration-chart-type' id='integration-chart-type' class='form-control show-tabs select2-input'>

                        <option value='all' data-id='all' data-website='all'>All</option>";

                        $index = 0;

                        foreach ($totals['integration']['all'] as $website => $value) {

                        	$k = base64_encode($website); 

                            $newHTML .= "<option ". ( $integration_data_selected == $k ? 'selected' : '' ) ." value='". $k ."' data-id='". ++$index ."' data-website='". $website ."' >". $website ."</option>";

                       	}

                    $newHTML .= "</select>

                </div>

                <div class='tab-content'>

                    {$html}

                </div>";





            $json['html'] = $newHTML;





            $type = isset($post['integration_data_website_selected']) && $post['integration_data_website_selected'] != '' ?  $post['integration_data_website_selected'] : 'all';



			if($type == 'all'){

				$data = array(

					'balance'				=>	(float)$totals['integration']['balance'],

					'total_orders_amount'	=>	(float)$totals['integration']['total_orders_amount'],

					'sale'					=>	(float)$totals['integration']['sale'],

					'click_count'			=>	(float)$totals['integration']['click_count'],

					'click_amount'			=>	(float)$totals['integration']['click_amount'],

					'action_count'			=>	(float)$totals['integration']['action_count'],

					'action_amount'			=>	(float)$totals['integration']['action_amount'],

					'total_commission'		=>	(float)$totals['integration']['total_commission'],

					'total_orders'			=>	(float)$totals['integration']['total_orders'],

				);

			}else{

				$integration = $totals['integration']['all'];

				if(isset($integration[$type])){

					$data = array(

						'balance'				=>	isset($integration[$type]['balance']) ? (float)$integration[$type]['balance'] : 0,

						'total_orders_amount'	=>	isset($integration[$type]['total_orders_amount']) ? (float)$integration[$type]['total_orders_amount'] : 0,

						'sale'					=>	isset($integration[$type]['sale']) ? (float)$integration[$type]['sale'] : 0,

						'click_count'			=>	isset($integration[$type]['click_count']) ? (float)$integration[$type]['click_count'] : 0,

						'click_amount'			=>	isset($integration[$type]['click_amount']) ? (float)$integration[$type]['click_amount'] : 0,

						'action_count'			=>	isset($integration[$type]['action_count']) ? (float)$integration[$type]['action_count'] : 0,

						'action_amount'			=>	isset($integration[$type]['action_amount']) ? (float)$integration[$type]['action_amount'] : 0,

						'total_commission'		=>	isset($integration[$type]['total_commission']) ? (float)$integration[$type]['total_commission'] : 0,

						'total_orders'			=>	isset($integration[$type]['total_orders']) ? (float)$integration[$type]['total_orders'] : 0,

					);

				}

			}



			$json['chart'][$post['integration_data_year']] = $data;

		}else{

			$json['html'] = false;

		}



		if($return) return $json;

		echo json_encode($json);die;

	}



	public function category_auto(){

		$userdetails = $this->userdetails();

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$keyword = $this->input->get('query');

	



		$data = $this->db->query("SELECT id as value,name as label FROM categories WHERE name  like ". $this->db->escape("%".$keyword."%") ." ")->result_array();

	



		echo json_encode($data);die;

	}

	public function store_orders($page = 1){

		$userdetails = $this->userdetails();

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }

		$data['status'] = $this->Order_model->status;

		$data['wallet_status'] = $this->Wallet_model->status;



		if ($this->input->server('REQUEST_METHOD') == 'POST'){

			$post = $this->input->post(null,true);

			$page = max((int)$page,1);

		



			$filter = array(

				'limit' => 100,

				'page' => $page,

			);



			if(isset($post['filter_status']) && $post['filter_status'] != ''){

				$filter['o_status'] = $this->input->post('filter_status',true);

			}



			list($data['orders'],$total) = $this->Order_model->getAllOrders($filter);



			$data['start_from'] = (($page-1) * $filter['limit'])+1;

			$json['html'] = $this->load->view("admincontrol/store/order_list.php",$data,true);



			$this->load->library('pagination');

			$config['base_url'] = base_url('admincontrol/store_orders/');

			$config['per_page'] = $filter['limit'];

			$config['total_rows'] = $total;

			$config['use_page_numbers'] = TRUE;

			$config['enable_query_strings'] = TRUE;

			$this->pagination->initialize($config);



			$json['pagination'] = $this->pagination->create_links();



			clear_tmp_cache('order_cache');

			echo json_encode($json);die;

		}

	



		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/store/orders', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



    public function store_logs($page = 0){

    	$userdetails = $this->userdetails();

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		if ($this->input->server('REQUEST_METHOD') == 'POST'){

			$page = max((int)$page,1);

		



			$filter = array(

				'limit'   => 100,

				'page'    => $page,

			);

			$data['userdetails'] = $userdetails;



			list($data['clicks'],$total) = $this->Order_model->getAllClickLogs($filter);

			

			

			$data['start_from'] = (($page-1) * $filter['limit'])+1;



			$json['html'] = $this->load->view("admincontrol/store/log_list.php",$data,true);



			$this->load->library('pagination');

			$config['base_url'] = base_url('admincontrol/store_logs/');

			$config['per_page'] = $filter['limit'];

			$config['total_rows'] = $total;

			$config['use_page_numbers'] = TRUE;

			$config['enable_query_strings'] = TRUE;

			$this->pagination->initialize($config);





			$json['pagination'] = $this->pagination->create_links();

			echo json_encode($json);die;

		}

    

        $this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);

		$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/store/logs', $data);

		$this->load->view('admincontrol/includes/footer', $data);

	}



    public function store_markettools($page = 0){

    	set_default_currency();

    



		$userdetails = $this->userdetails();

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$this->load->model('Form_model');

        $this->load->model('Report_model');

        $this->load->model('Wallet_model');

        $this->load->model('IntegrationModel');

        

	



		$data['form_default_commission'] = $this->Product_model->getSettings('formsetting');

		$data['default_commition']       = $this->Product_model->getSettings('productsetting');



        $data['tools'] = $this->IntegrationModel->getProgramTools([

			'status'           => 1,

			'redirectLocation' => 1,

			'restrict'         => $userdetails['id'],

		]);





       	$products = $this->Product_model->getAllProduct($userdetails['id'], $userdetails['type']);

		$forms = $this->Form_model->getForms($userdetails['id']);



 		foreach ($products as $key => $value) { $products[$key]['is_product'] = 1; }

 		foreach ($forms as $key => $value) {

			$forms[$key]['coupon_name']          = $this->Form_model->getFormCouponname(($value['coupon']) ? $value['coupon'] : 0);

			$forms[$key]['public_page']          = base_url('form/'.$value['seo'].'/'.base64_encode($this->userdetails()['id']));

			$forms[$key]['count_coupon']         = $this->Form_model->getFormCouponCount($value['form_id'],$this->userdetails()['id']);

			$forms[$key]['seo']                  = str_replace('_', ' ', $value['seo']);

			$forms[$key]['is_form']              = 1;

			$forms[$key]['product_created_date'] = $value['created_at'];

			$forms[$key]['fevi_icon'] = $value['fevi_icon'] ? 'assets/images/form/favi/'.$value['fevi_icon'] : 'assets/images/users/no-image.jpg';



			if($value['coupon']){

 				$forms[$key]['coupon_code'] = $this->Form_model->getFormCouponCode($value['coupon']);

 			}

 		}



 		$data_list = array_merge($products,$forms,$data['tools']);

 		usort($data_list,function($a,$b){

 			$ad = strtotime($a['product_created_date']);

		    $bd = strtotime($b['product_created_date']);

		    return ($ad-$bd);

 		});

 		$data_list = array_reverse($data_list);



		$total = count( $data_list );

		$limit = 15; 

		$totalPages = ceil( $total/ $limit );

		$offset = $page;

		if( $offset < 0 ) $offset = 0;



		$data['data_list'] = array_slice( $data_list, $offset, $limit );



		$this->load->library('pagination');

		$config['base_url'] = '/admincontrol/store_markettools/';

		$config['total_rows'] = $total;

		$config['per_page'] = $limit;

		$config['attributes'] = array('class' => 'single_paginate_link');

		$filter['per_page'] = $config['per_page'];

		$config['reuse_query_string'] = TRUE;

		$config['query_string_segment'] = 'page';



		$this->pagination->initialize($config);

		$data['pagination_link'] = $this->pagination->create_links();



		$this->load->library("socialshare");				

		$data['social_share_modal'] =  $this->socialshare->get_dynamic_social_share_btns();



		$this->view($data,'store/markettools');

	}



	public function info_remove_order(){

		$id = (int)$this->input->post("id",true);

		$type = $this->input->post("type",true);

	



		//$data = $this->Wallet_model->getDeleteData($id, $type);

		if($type == 'external'){

			$order_amount = $this->db->query("SELECT total FROM integration_orders WHERE id= ".(int)$id)->row();

			$total_comm = $this->db->query("SELECT SUM(amount) as total FROM  wallet WHERE comm_from='ex' AND type IN('sale_commission','admin_sale_commission','refer_sale_commission') AND reference_id_2 = {$id}")->row();

		}

		else{

			$order_amount = $this->db->query("SELECT total FROM `order` WHERE id= ".(int)$id)->row();

			$total_comm = $this->db->query("SELECT SUM(amount) as total FROM  wallet WHERE comm_from='store' AND type IN('sale_commission','vendor_sale_commission') AND reference_id = {$id}")->row();

		}





		$html = '<h6 class="text-center"> Amount : '. c_format($order_amount->total) .' </h6>';

		$html .= '<h6 class="text-center"> Commission Amount : '. c_format($total_comm->total) .' </h6><hr>';

		$html .= '<p class="text-center"> Order ID : '. $this->input->post("id",true) .' </p>';

		$html .= '<p class="text-center"> <input type="hidden" value="'. $type .'" name="order_type"> <label>

					<input type="checkbox" name="sale_commission" class="wallet-checkbox">

					 Sale Commission

				</label></p>';

		$html .= "<br><div class='row'> <div class='col-sm-6'><button data-dismiss='modal' class='btn btn-primary btn-block'>Cancel</button></div> <div class='col-sm-6'><button class='btn btn-danger  btn-block' delete-order-confirm='". $this->input->post("id",true) ."'>Yes Confirm</button></div> </div>";



		$json['html'] = $html;

		echo json_encode($json);

	}



	public function confirm_remove_order(){

		$id = $this->input->post('id',true);

		$order_type = $this->input->post('order_type',true);

		$sale_commission = $this->input->post('sale_commission',true);

		 

		if($order_type == 'external'){

        	$this->db->query("DELETE FROM `integration_orders` WHERE id = {$id}");

			if($sale_commission == 'true'){

		        $this->db->query("DELETE FROM wallet WHERE comm_from='ex' AND type IN('sale_commission','sale_commission_vendor_pay','admin_sale_commission','admin_sale_commission_v_pay','refer_sale_commission') AND reference_id_2 = {$id}");

			}

		} else{

        	$this->db->query("DELETE FROM `order` WHERE id = {$id}");

        	$this->db->query("DELETE FROM `order_products` WHERE order_id = {$id}");

        	$this->db->query("DELETE FROM `order_proof` WHERE order_id = {$id}");

        	$this->db->query("DELETE FROM `orders_history` WHERE order_id = {$id}");

        	if($sale_commission == 'true'){

		        $this->db->query("DELETE FROM wallet WHERE comm_from='store' AND type IN('sale_commission','vendor_sale_commission') AND reference_id = {$id}");

			}

		}





		$json['success'] = true;

		echo json_encode($json);

	}



	public function calc_commission(){

		$data = $this->input->post(null,true);



		$setting = array(

			'product_id'                      => $data['product_id'],

			'product_price'                   => $data['product_price'],

			'admin_click_commission_type'     => $data['admin_click_commission_type'],

			'admin_click_count'               => $data['admin_click_count'],

			'admin_click_amount'              => $data['admin_click_amount'],

			'admin_sale_commission_type'      => $data['admin_sale_commission_type'],

			'admin_commission_value'          => $data['admin_commission_value'],



			/*'affiliate_click_commission_type' => $data['affiliate_click_commission_type'],

			'affiliate_click_count'           => $data['affiliate_click_count'],

			'affiliate_click_amount'          => $data['affiliate_click_amount'],

			'affiliate_sale_commission_type'  => $data['affiliate_sale_commission_type'],

			'affiliate_commission_value'      => $data['affiliate_commission_value'],*/

		);



		if (isset($data['product_id']) && $data['product_id']) {

			$product = $this->db->query("SELECT * FROM product_affiliate WHERE product_id=". (int)$data['product_id'])->row();

		



			if($product){

				$setting['affiliate_sale_commission_type']  = $product->affiliate_sale_commission_type;

				$setting['affiliate_commission_value']      = $product->affiliate_commission_value;

				$setting['affiliate_click_commission_type'] = $product->affiliate_click_commission_type;

				$setting['affiliate_click_count']           = $product->affiliate_click_count;

				$setting['affiliate_click_amount']          = $product->affiliate_click_amount;

			}

		}



		$json['commission'] = $this->Product_model->calcVendorCommission($setting);

		$json['success'] = true;



		echo json_encode($json);

	}







	public function withdrawal_payment_gateways_doc(){

		set_default_currency();

		$data = [];



		$this->view($data,'withdrawal_payment/doc');

	}



	public function withdrawal_payment_gateways(){

    	set_default_currency();

    



		$userdetails = $this->userdetails();

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$this->load->model('Withdrawal_payment_model');

		$data['payment_methods'] = $this->Withdrawal_payment_model->getPaymentMethods();



	



		$this->view($data,'withdrawal_payment/index');

	}



	public function withdrawal_payment_gateways_status_change($code){

		set_default_currency();

    



		$userdetails = $this->userdetails();

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$this->load->model('Withdrawal_payment_model');

		$this->Withdrawal_payment_model->changeInstallUninstall($code);



		redirect(base_url('admincontrol/withdrawal_payment_gateways'));

	}



	public function withdrawal_payment_gateways_edit($code){

		set_default_currency();

    



		$userdetails = $this->userdetails();

		if(!$this->userdetails()){ redirect('admin', 'refresh'); }



		$this->load->model('Withdrawal_payment_model');

		$data['details'] = $this->Withdrawal_payment_model->getDetails($code);

		if(!$data['details']){ redirect('admincontrol/withdrawal_payment_gateways', 'refresh'); }



		list($html,$setting) = $this->Withdrawal_payment_model->getEditPage($code);

		$data['html'] = $html;

		$data = array_merge($data, $setting);



		$this->view($data,'withdrawal_payment/withdrawal_payment_settings');

	}



	public function withdrawal_payment_gateways_setting_save($code){

		$post = $this->input->post(null,true);

		$this->Setting_model->save('withdrawalpayment_'.$code, $post);



		$json['redirect'] = base_url('admincontrol/withdrawal_payment_gateways');

		$this->session->set_flashdata('success', 'Settings Saved Successfully');

		echo json_encode($json);

	}

}