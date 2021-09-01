<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'controllers/admin/Controller.php');

class User extends Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('user_model', 'user');
		$this->load->library('pagination');
	}

    public function index() {
		if($this->userdetails()){ redirect('admin', 'refresh'); }
		else { redirect('usercontrol', 'refresh'); }
	}

	public function customers($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/customers/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'customer',
				'status' => 1,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/customers/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/customers/index');
	}

	public function blocked_customers($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/blocked_customers/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'customer',
				'status' => 2,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/customers/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/customers/index');
	}

	public function designers($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/designers/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'designer',
				'status' => 1,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/designers/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/designers/index');
	}

	public function designer_applications($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/designer_applications/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'designer',
				'status' => 0,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/designers/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/designers/index');
	}

	public function blocked_designers($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/blocked_designers/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'designer',
				'status' => 2,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/designers/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/designers/index');
	}

	public function models($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/models/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'model',
				'status' => 1,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/models/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/models/index');
	}

	public function model_applications($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/model_applications/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'model',
				'status' => 0,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/models/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/models/index');
	}

	public function blocked_models($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/blocked_models/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'model',
				'status' => 2,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/models/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/models/index');
	}

	public function tailors($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/tailors/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'tailor',
				'status' => 1,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/tailors/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/tailors/index');
	}

	public function tailor_applications($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/tailor_applications/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'tailor',
				'status' => 0,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/tailors/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/tailors/index');
	}

	public function blocked_tailors($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/user/tailor_applications/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'type' => 'tailor',
				'status' => 2,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->user->getUsers($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/user/tailors/list.php",$data,true);

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

		$data['currentListUrl'] = $url;		
		$this->view($data,'user/tailors/index');
	}

	public function details($id) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$con['id']=$id;
		$data['record'] = $this->user->getUser($con);
		$data['user'] = $userdetails;
		$this->view($data,'user/customers/details');
	}

	public function user_details($id) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$con['id']=$id;
		$record = $this->user->getUser($con);
		$data['record'] = $record;
		if($record->type=='designer'){
			$this->view($data,'user/designers/details');
		} else if($record->type=='model'){
			$this->view($data,'user/models/details');
		} else if($record->type=='tailor'){
			$this->view($data,'user/tailors/details');
		}
	}

    public function addclients($id = null){

		$userdetails = $this->userdetails();

		if(empty($userdetails)){

			redirect('admin');

		}

		$data=array();

		if ($this->input->post()) {

			$this->load->library('form_validation');

			$checkmail = $this->Product_model->checkmail($this->input->post('email',true),$id);

			$checkuser = $this->Product_model->checkuser($this->input->post('username',true),$id);

			if(!empty($checkmail))

			{

				$this->session->set_flashdata('error', __('admin.this_email_already_register'));

				$this->session->set_flashdata('postdata', $this->input->post());

				redirect('admincontrol/addclients');

			}

			elseif(!empty($checkuser))

			{

				$this->session->set_flashdata('error',__('admin.this_username_already_register'));

				$this->session->set_flashdata('postdata', $this->input->post());

				redirect('admincontrol/addclients');

			}

			else

			{

				if(empty($id)){

					$data=$this->user->insert(array(

						'firstname' => $this->input->post('firstname',true),

						'lastname'  => $this->input->post('lastname',true),

						'email'     => $this->input->post('email',true),

						'username'  => $this->input->post('username',true),

						'status'  => $this->input->post('status',true),

						'password'  => sha1($this->input->post('password',true)),

						'refid'     => 0,

						'type'      => 'client',

					));

				} else {

					$data = $id;

				}

				if(!empty($data))

				{

					$arrayName = array(

						'firstname' => $this->input->post('firstname',true),

						'lastname'  => $this->input->post('lastname',true),

						'username'  => $this->input->post('username',true),

						'status'  => $this->input->post('status',true),

					);

					if($this->input->post('password',true) != ''){

						$arrayName['password'] = sha1($this->input->post('password',true));

					}

					$this->user->update_user($data,$arrayName);

					$this->session->set_flashdata('success', __('admin.youve_successfully_registered'));

					redirect('admincontrol/listclients/');

				}

			}

		}

		$data['client'] 	= $this->Product_model->getUserDetailsObject($id);

		$this->load->view('admincontrol/includes/header', $data);

		$this->load->view('admincontrol/includes/sidebar', $data);$this->load->view('admincontrol/includes/topnav', $data);

		$this->load->view('admincontrol/clients/add_clients', $data);

		$this->load->view('admincontrol/includes/footer', $data);

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

		} else {

			$this->session->set_flashdata('success', __('admin.client_has_been_deleted_successfully'));

			redirect('admincontrol/listclients');

		}

	}

	public function sendWarning(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('warning_type', __('admin.warning_type'), 'required');
		$this->form_validation->set_rules('fine_amount', __('admin.fine_amount'), 'required');
		$this->form_validation->set_rules('warning_title', __('admin.warning_title'), 'required');
		$this->form_validation->set_rules('warning_message', __('admin.warning_message'), 'required');
		
		if($this->form_validation->run()){
			$user_id = $this->input->post('user_id',true);
			$postData = array(
				'warning_type' =>  $this->input->post('warning_type',true),
				'fine_amount' =>  $this->input->post('fine_amount',true),
				'warning_title' =>  $this->input->post('warning_title',true),
				'warning_message' =>  $this->input->post('warning_message',false)
			);
			
			// if(isset($id) && $id){
			// 	$this->user->update('categories', $postData, array('id' => $id));
			// }else{
			// 	$postData['created_at'] = date('Y-m-d H:i:s');
			// 	$id = $this->user->create('categories', $postData);

			// 	$slug = $this->friendly_seo_string($this->input->post('warning_title',true).'-'.$category_id);
			// 	$this->db->query("UPDATE categories SET slug = ". $this->db->escape($slug) ." WHERE id =". $category_id);
			// }
			$this->session->set_flashdata('success', 'Category Saved Successfully');
			$json['location'] = base_url('admin/user/details/'.$user_id);
		} else {
			$json['errors'] = $this->form_validation->error_array();
		}
		echo json_encode($json);die;
	}

	public function changeStatus(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_id', 'user_id', 'required');
		
		if(array_key_exists('status_reason',$this->input->post())){
			$this->form_validation->set_rules('status_reason', __('admin.reason'), 'required');
			$postData['status_reason'] = $this->input->post('status_reason',true);
		}
		
		if($this->form_validation->run()){
			$user_id = $this->input->post('user_id',true);
			$type = $this->input->post('type')?$this->input->post('type',true):'';
			$postData['status'] = $this->input->post('status',true);
			
			$this->user->update('users', $postData, array('id' => $user_id));
			$location = base_url('admin/user/details/'.$user_id);
			if(in_array($type,['designer','model','tailor'])){
				$location = base_url('admin/user/user_details/'.$user_id);
			}
			$json['location'] = $location;
			$json['message'] = 'Record updated Successfully';
		} else {
			$json['errors'] = $this->form_validation->error_array();
		}
		echo json_encode($json);die;
	}

}