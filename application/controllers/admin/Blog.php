<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'controllers/admin/Controller.php');

class Blog extends Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('blog_model', 'blog');
		$this->load->library('pagination');
	}

	public function index($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/blog/';

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'status' => 1,
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order')
			);
			list($data['records'],$total) = $this->blog->getBlogs($filter);
			
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/blogs/list.php",$data,true);

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

		$this->view($data,'blogs/index');
	}

	public function create($id = 0){
		$userdetails = $this->userdetails();
		if(!$userdetails){ redirect('admin', 'refresh'); }

		$record = $this->blog->getBlog($id);

		if ($this->input->server('REQUEST_METHOD') == 'POST'){			
			$this->load->library('form_validation'); 
			$this->form_validation->set_rules('name', __('admin.title'), 'required');
			$this->form_validation->set_rules('blog_category_id', __('admin.blog_category'), 'required');
			$this->form_validation->set_rules('description', 'Category Description', 'required' );
			
			if($this->form_validation->run()){
				$json = array();

				$id = (int)$this->input->post("id",true);
				$post = $this->input->post(null,true);
				
				$image = $record->avatar;

				$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				if($_FILES['image']['error'] != 0 && $id == 0 ){
					$json['errors']['image'] = 'Select Image File!';
				} else if( !in_array($ext, ['jpg','png','jpeg']) && $id == 0){
					$json['errors']['image'] = 'Only image file are allowed';
				} else if(!empty($_FILES['image']['name'])){
					$upload_response = $this->upload_photo('image','assets/uploads/blogs');
					if($upload_response['success']){
						$image = $upload_response['upload_data']['file_name'];
					}else{
						$json['errors']['image'] = $upload_response['msg'];
					}

				}

				if(!isset($json['errors'])){
					$updated = array(
						'name' =>$post['name'],
						'description' =>$post['description'],
						'blog_category_id' =>$post['blog_category_id'],
						'status' =>$post['status'],
						'image' =>$image
					);

					if($id){
						$this->blog->update('blogs', $updated, array('id' => $id));
						$this->session->set_flashdata('success', 'Record updated Successfully');
					}else{
						$id = $this->blog->create('blogs', $updated);
						$this->session->set_flashdata('success', 'Record created Successfully');
					}
					$slug = $this->friendly_seo_string($post['name'].'-'.$id);
					$this->db->query("UPDATE blogs SET slug = ". $this->db->escape($slug) ." WHERE id =". $id);
					$json['location'] = base_url('admin/blog');
				}
			} else {
				$json['errors'] = $this->form_validation->error_array();
			}
			echo json_encode($json);die;
		}

		$data['record'] = $record;

		$data['categories'] = $this->db->query("SELECT id,name FROM blog_categories")->result();
		$data['blogStatus'] = $this->config->item('blogStatus');

		$this->view($data,'blogs/create');
	}

	public function details($id) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$record = $this->blog->getBlog($id);
		$data['record'] = $record;
		$this->view($data,'blogs/details');
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

	public function category($page=0) {
        $userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin','refresh'); }

		$url = base_url().'admin/blog/category/';

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
			list($data['records'],$total) = $this->blog->getBlogCategories($filter);
			
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/blog/category/list.php",$data,true);

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

		$this->view($data,'blogs/category/index');
	}

	public function create_category($id = 0){
		$userdetails = $this->userdetails();
		if(!$userdetails){ redirect('admin', 'refresh'); }

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			
			$this->load->library('form_validation'); 
			$this->form_validation->set_rules('name', __('admin.name'), 'required');
			if($this->form_validation->run()){
				$json = array();

				$id = (int)$this->input->post("id",true);
				$post = $this->input->post(null,true);
				
				$updated = array(
					'name' =>$post['name']
				);
				if($id){
					$this->blog->update('blog_categories', $updated, array('id' => $id));
					$this->session->set_flashdata('success', 'Record updated Successfully');
				}else{
					$id = $this->blog->create('blog_categories', $updated);
					$this->session->set_flashdata('success', 'Record created Successfully');
				}
				$slug = $this->friendly_seo_string($post['name'].'-'.$id);
				$this->db->query("UPDATE blog_categories SET slug = ". $this->db->escape($slug) ." WHERE id =". $id);
				$json['location'] = base_url('admin/blog/category');
			} else {
				$json['errors'] = $this->form_validation->error_array();
			}
			echo json_encode($json);die;
		}

		$data['record'] = $this->blog->getById('blog_categories',$id);

		$this->view($data,'blogs/category/create');
	}

	public function delete_category($id) {
		$userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }

		if($userdetails['id'] == 1){
			$id = (int)$id;
			$this->db->query("DELETE FROM blog_categories WHERE id = {$id}");
			$this->session->set_flashdata('success', __('admin.admin_deleted_successfully'));
		} else{
			$this->session->set_flashdata('error', __('admin.can_not_allow_to_delete_admin'));
		}
	    redirect('/admin/blog/category');
	}
}