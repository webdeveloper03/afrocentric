<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use App\MembershipPlan;
use App\Slug;

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		___construct(1);
	}

	public function index(){

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
		$this->load->view('home/index',$data);
		$this->load->view('includes/footer');
    }

}