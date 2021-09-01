<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'controllers/admin/Controller.php');

class Accesslevel extends Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('accesslevel_model', 'accesslevel');
		$this->load->library('pagination');
	}

	public function index($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/access_level/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'status' => 1,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->accesslevel->getRecords($filter);
			
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/access_level/list.php",$data,true);

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

		$this->view($data,'access_level/index');
	}

	public function create($id = 0){
		$userdetails = $this->userdetails();
		if(!$userdetails){ redirect('admin', 'refresh'); }

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			
			$this->load->library('form_validation'); 
			$this->form_validation->set_rules('name', __('admin.access_level_name'), 'required');
			if($this->form_validation->run()){
				$json=[];
				$permission = $this->input->post('permission',false);
				$permissions = [];
				foreach($permission as $key => $value){
					$permissions[$key] = implode(",",$value);
				}
				$permissionJson = json_encode($permissions);
				$details = array(
					'name'        =>  $this->input->post('name',true),
					'permission' =>  $permissionJson,
				);
				if($id){
					$this->accesslevel->update('access_levels', $details, array('id' => $id));
					$this->session->set_flashdata('success', 'Record updated Successfully');
				}else{
					$details['created_at'] = date('Y-m-d H:i:s');
					$id = $this->accesslevel->create('access_levels', $details);
					$this->session->set_flashdata('success', 'Record created Successfully');
				}
				
				$json['location'] = base_url('admin/accesslevel');
			} else {
				$json['errors'] = $this->form_validation->error_array();
			}
			echo json_encode($json);die;
		}

		$data['record'] = array();
		if($id > 0){
			$data['record'] = $this->accesslevel->getById('access_levels',$id);
		}

		$this->view($data,'access_level/create');
	}

	public function details($id) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$data['record'] = $this->accesslevel->getById('access_levels',$id);
		$this->view($data,'access_level/details');
	}

	public function delete($id = 0){
		$userdetails = $this->userdetails();
		if(!$userdetails){ redirect('admin', 'refresh'); }

		if($id > 0){
			$this->db->query("DELETE FROM access_levels WHERE id = ". (int)$id);
		}

		$this->session->set_flashdata('success', 'Record Deleted Successfully');
		redirect(base_url('admin/accesslevel'));
	}
}