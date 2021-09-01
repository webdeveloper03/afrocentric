<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'controllers/admin/Controller.php');

class Category extends Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('category_model', 'category');
		$this->load->model('product_model', 'product');
		$this->load->library('pagination');
	}

    public function index($page=0) {
		$userdetails = $this->userdetails();
		if(!$userdetails){ redirect('admin', 'refresh'); }
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$page = max((int)$page,1);
			$filter = array(
				'limit' => $this->config->item('perPage'),
				'page' => $page,
				'searchKey' => $this->input->post('searchKey'),
				'order' => $this->input->post('order'),
			);
			list($data['records'],$total) = $this->category->getCategories($filter);
			$data['start_from'] = (($page-1) * $filter['limit'])+1;
			$json['html'] = $this->load->view("admincontrol/category/list.php",$data,true);

			$this->load->library('pagination');
			$config['base_url'] = base_url('admin/category/index/');
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
		$this->load->view('admincontrol/category/index', $data);
		$this->load->view('admincontrol/includes/footer', $data);
	}

	public function create($category_id = 0){
		$userdetails = $this->userdetails();
		if(!$userdetails){ redirect('admin', 'refresh'); }

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Category Name', 'required');
			// $this->form_validation->set_rules('description', 'Category Description', 'required' );

			if($this->form_validation->run()){
				$details = array(
					'name'        =>  $this->input->post('name',true),
					// 'description' =>  $this->input->post('description',false),
					// 'parent_id'   =>  $this->input->post('parent_id',true),
					// 'color'   	  =>  $this->input->post('color',true),
					// 'tag'   	  =>  $this->input->post('tag',true),
				);
				$ext = pathinfo($_FILES['category_image']['name'], PATHINFO_EXTENSION);
				if($_FILES['category_image']['error'] != 0 && $category_id == 0 ){
					$errors['category_image'] = 'Select Featured Image File!';
				} else if( !in_array($ext, ['jpg','png','jpeg']) && $category_id == 0){
					$errors['category_image'] = 'Only image file are allowed';
				} else if(!empty($_FILES['category_image']['name'])){
					$upload_response = $this->upload_photo('category_image','assets/uploads/category');
					if($upload_response['success']){
						$details['image'] = $upload_response['upload_data']['file_name'];
					}else{
						$errors['category_image'] = $upload_response['msg'];
					}

				}

				if($_FILES['category_background_image']){
					$ext = pathinfo($_FILES['category_background_image']['name'], PATHINFO_EXTENSION);
					if($_FILES['category_background_image']['error'] != 0 && $category_id == 0 ){
						$errors['category_background_image'] = 'Select Featured Image File!';
					} else if( !in_array($ext, ['jpg','png','jpeg']) && $category_id == 0){
						$errors['category_background_image'] = 'Only image file are allowed';
					} else if(!empty($_FILES['category_background_image']['name'])){
						$upload_response = $this->upload_photo('category_background_image','assets/uploads/category');
						if($upload_response['success']){
							$details['background_image'] = $upload_response['upload_data']['file_name'];
						}else{
							$errors['category_background_image'] = $upload_response['msg'];
						}
					}
				}

				if(empty($errors)){
					if($category_id){
						$this->Product_model->update_data('categories', $details, array('id' => $category_id));
					}else{
						$details['created_at'] = date('Y-m-d H:i:s');
						$category_id = $this->Product_model->create_data('categories', $details);
					}

					$slug = $this->friendly_seo_string($this->input->post('name',true).'-'.$category_id);
					$this->db->query("UPDATE categories SET slug = ". $this->db->escape($slug) ." WHERE id =". $category_id);
					$this->session->set_flashdata('success', 'Category Saved Successfully');
					$json['location'] = base_url('admin/category');
				} else {
					$json['errors'] = $errors;
				}
			} else {
				$json['errors'] = $this->form_validation->error_array();
			}
			echo json_encode($json);die;
		}

		$record = $this->category->getCategoryById($category_id);
		
		$data['record'] = $record;
		$data['categories'] = $this->db->query("SELECT id,name FROM categories")->result_array();

		$this->load->view('admincontrol/includes/header', $data);
		$this->load->view('admincontrol/includes/sidebar', $data);
		$this->load->view('admincontrol/includes/topnav', $data);
		$this->load->view('admincontrol/category/create', $data);
		$this->load->view('admincontrol/includes/footer', $data);
	}

	public function details($category_id = 0) {
		$userdetails = $this->userdetails();
		if(!$userdetails){ redirect('admin', 'refresh'); }
		if(!$category_id) redirect('admin/category', 'refresh');
		$record = $this->category->getCategoryById($category_id);
		$totalProduct = $this->category->getCategoryTotalProduct($category_id);
		$data['record'] = $record;
		$data['totalProduct'] = $totalProduct;
		$this->view($data,'category/details');
	}

	public function delete($category_id = 0){
		$userdetails = $this->userdetails();
		if(!$userdetails){ redirect('admin', 'refresh'); }

		if($category_id > 0){
			$data['category'] = $this->db->query("DELETE FROM categories WHERE id = ". (int)$category_id);
		}

		$this->session->set_flashdata('success', 'Category Deleted Successfully');

		redirect(base_url('admin/category'));
	}

	public function products() {
		$page = max((int)$page,1);
		$filter = array(
			'limit' => $this->config->item('perPage'),
			'page' => $page,
			'categoryId' => $this->input->post('categoryId'),
			'searchKey' => $this->input->post('searchKey'),
			'order' => $this->input->post('order'),
		);
		list($data['records'],$total) = $this->product->getProducts($filter);
		// echo '<pre>';print_r($data);exit;
		$data['start_from'] = (($page-1) * $filter['limit'])+1;
		$json['html'] = $this->load->view("admincontrol/category/product_list.php",$data,true);

		$this->load->library('pagination');
		$config['base_url'] = base_url('admincontrol/category/products/');
		$config['per_page'] = $filter['limit'];
		$config['total_rows'] = $total;
		$config['use_page_numbers'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$this->pagination->initialize($config);
		$json['pagination'] = $this->pagination->create_links();
		echo json_encode($json);die;
	}

}