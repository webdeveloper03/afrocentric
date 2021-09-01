<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'controllers/admin/Controller.php');

class Order extends Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('user_model', 'user');
	}


	public function index() {
		$userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$store_setting = $this->user->getSettings('store');
		$this->load->model('Order_model');
		$data['getallorders'] = $this->Order_model->getOrders();
		$data['status'] = $this->Order_model->status;
		$data['user'] = $userdetails;
		$this->view($data,'order/index');
	}

	public function active(){
		$userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$store_setting = $this->user->getSettings('store');
		$this->load->model('Order_model');
		$con['status'] = 13;
		$data['getallorders'] = $this->Order_model->getOrders($con);
		$data['status'] = $this->Order_model->status;
		$data['user'] = $userdetails;
		$this->view($data,'order/active');
	}

	public function pending(){
		$userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$store_setting = $this->user->getSettings('store');
		$this->load->model('Order_model');
		$con['status'] = 6;
		$data['getallorders'] = $this->Order_model->getOrders($con);
		$data['status'] = $this->Order_model->status;
		$data['user'] = $userdetails;
		$this->view($data,'order/pending');
	}

	public function returned(){
		$userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$store_setting = $this->user->getSettings('store');
		$this->load->model('Order_model');
		$con['status'] = 6;
		$data['getallorders'] = $this->Order_model->getOrders($con);
		$data['status'] = $this->Order_model->status;
		$data['user'] = $userdetails;
		$this->view($data,'order/returned');
	}

	public function closed(){
		$userdetails = $this->userdetails();
		if(empty($userdetails)){ redirect('admin'); }
		$store_setting = $this->user->getSettings('store');
		$this->load->model('Order_model');
		$con['status'] = 6;
		$data['getallorders'] = $this->Order_model->getOrders($con);
		$data['status'] = $this->Order_model->status;
		$data['user'] = $userdetails;
		$this->view($data,'order/closed');
	}

}