<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'controllers/admin/Controller.php');

class Admin extends Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('user_model', 'user');
		$this->load->library('pagination');
	}

	public function index($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/admin/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'status' => 1,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
				'access_level_id' => $this->input->post('access_level_id'),
			);
			list($data['records'],$total) = $this->user->getAdmins($filter);
			
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/admins/list.php",$data,true);

			$this->load->library('pagination');
			$config['base_url'] =$url;
			$config['per_page'] = $filter['limit'];
			$config['total_rows'] = $total;
			$config['use_page_numbers'] = TRUE;
			$config['enable_query_strings'] = TRUE;
			$this->pagination->initialize($config);
			$json['pagination'] = $this->pagination->create_links();
			echo json_encode($json);die;
		}

		$this->view($data,'admins/index');
	}

	public function create($id = 0){
		$userdetails = $this->userdetails();
		if(!$userdetails){ redirect('admin', 'refresh'); }

		$record = $this->user->get_user_by_id($id);

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			
			$this->load->library('form_validation'); 
			$this->form_validation->set_rules('firstname', __('admin.firstname'), 'required');
			$this->form_validation->set_rules('lastname', __('admin.last_name'), 'required');
			$this->form_validation->set_rules('email', __('admin.email'), 'required|valid_email|xss_clean');
			// $this->form_validation->set_rules('type', __('admin.role'), 'required');
			$this->form_validation->set_rules('access_level_id', __('admin.access_level'), 'required');
			$this->form_validation->set_rules('username', __('admin.user_id'), 'required');
			if((int)$id == 0 || $post['password'] != ''){
				$this->form_validation->set_rules('password', __('admin.password'), 'required|trim', array('required' => '%s is required'));
				$this->form_validation->set_rules('cpassword', __('admin.confirm_password'), 'required|trim', array('required' => '%s is required'));
	            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]', array('required' => '%s is required'));

			}
			if($this->form_validation->run()){
				$json = array();

				$id = (int)$this->input->post("id",true);
				$post = $this->input->post(null,true);
				
				$errors= array();

				$checkmail = $this->user->checkmail($this->input->post('email',true),$id);
				$checkuser = $this->user->checkuser($this->input->post('username',true),$id);
				if(!empty($checkmail)){ $json['errors']['email'] = "Email Already Exist"; }
				if(!empty($checkuser)){ $json['errors']['username'] = "Username Already Exist"; }

				$avatar = $record->avatar;

				if(!empty($_FILES['avatar']['name'])){
					$upload_response = $this->upload_photo('avatar','assets/images/users');
					if($upload_response['success']){
						$avatar = $upload_response['upload_data']['file_name'];
					} else{
						$json['errors']['avatar'] = $upload_response['msg'];
					}
				}

				if(!isset($json['errors'])){
					$updated = array(
						'firstname' =>$post['firstname'],
						'lastname' =>$post['lastname'],
						'email' =>$post['email'],
						'type' =>'admin',
						'access_level_id' =>$post['access_level_id'],
						'username' =>$post['username'],
						'avatar' =>$avatar,
						'username' =>$post['username']
					);

					if($post['password'] != ''){
                    	$updated['password'] = sha1($post['password']);
					}

					if($id){
						$this->user->update('users', $updated, array('id' => $id));
						$this->session->set_flashdata('success', 'Record updated Successfully');
					}else{
						$updated['created_at'] = $updated['updated_at'] = date("Y-m-d H:i:s");
						$id = $this->user->create('users', $updated);
						$this->session->set_flashdata('success', 'Record created Successfully');
					}
					$json['location'] = base_url('admin/admin');
				}
			} else {
				$json['errors'] = $this->form_validation->error_array();
			}
			echo json_encode($json);die;
		}

		$data['record'] = $record;

		$data['accessLevels'] = $this->db->query("SELECT id,name FROM access_levels")->result();

		$this->view($data,'admins/create');
	}

	public function details($id) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$record = $this->user->get_user_by_id($id);
		$access_level = $this->user->getById('access_levels',(int)$record->access_level_id);
		$record->access_level_name = $access_level->name;
		$data['record'] = $record;
		$this->view($data,'admins/details');
	}

	public function delete($id) {
		$userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }

		if($userdetails['id'] == 1){
			$id = (int)$id;
		    if($id == 1){
		    	$this->session->set_flashdata('error', __('admin.error_delete_primary_admin'));
		    } else {
		    	$this->db->query("DELETE FROM users WHERE id = {$id}");
		    	$this->session->set_flashdata('success', __('admin.admin_deleted_successfully'));
		    }
		} else{
			$this->session->set_flashdata('error', __('admin.can_not_allow_to_delete_admin'));
		}
	    redirect('/admin/admin');
	}
}