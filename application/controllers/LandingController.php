<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');
ini_set('display_errors', 1);
class LandingController extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->helper('share');
		___construct(1);
		$this->load->library('user_agent');
	}
	public function landingPage(){
	    
	    $this->load->model('category_model', 'category');
		$this->load->model('product_model', 'product');
		$this->load->model('blog_model', 'blog');
		list($data['categories'],$total) = $this->category->getCategories();
		$filter = [
			'page'=>1,
			'limit'=>3
		];
		list($data['featureCategories'],$total) = $this->category->getCategories($filter);
		$filter['limit'] = 8;
		list($data['products'],$total) = $this->product->getProducts($filter);
		$filter['limit'] = 3;
		$filter['status'] = 'publish';
		list($data['blogs'],$total) = $this->blog->getBlogs($filter);
		
		$this->load->view('includes/header');
		$this->load->view('landing/landing_page',$data);
		$this->load->view('includes/footer');
	    
	}
	
}