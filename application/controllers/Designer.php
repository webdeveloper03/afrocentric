<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');
ini_set('display_errors', 1);

use App\MembershipPlan;
use App\MembershipUser;
class Designer extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->helper('share');
		___construct(1);
		$this->load->library('user_agent');
	    $this->load->model('membership_model');

	}

	public function explore(){
		$data['title']="Explore";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/explore',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function measurement(){
		$data['title']="Explore";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/measurement',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function measurement_upload(){
		$data['title']="Explore";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/measurement_upload',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function checkout_pro(){
		$data['title']="Checkout Process";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/checkout_pro',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function billing(){
		$data['title']="Checkout Process";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/bill',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function payments(){
		$data['title']="payments Process";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/payments',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function OrderComplete(){
		$data['title']="Order Complete";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/OrderComplete',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function hiringProfile(){
		$data['title']="Order Complete";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/hiringProfile',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function cardPayments(){
		$data['title']="Payments Process";
		$this->load->view('includes/auth/header');
		$this->load->view('designer/cardPayments',$data);
		$this->load->view('includes/auth/footer');
	}
	
		public function plans(){
		$data['title']="Plans";
		$data['plans'] = MembershipPlan::where('status', 1)->get();
		$this->load->view('includes/auth/header');
		$this->load->view('designer/plans',$data);
		$this->load->view('includes/auth/footer');
	}
	
	public function businessReg(){
		$data['title']="Plans";
		$this->load->view('includes/auth/header');
		$this->load->view('designer/hire1',$data);
		$this->load->view('includes/auth/footer');
	}

	public function hires(){
		$data['title']="Hires";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/hires',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function hires1(){
		$data['title']="Hire Now";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/hire1',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function cart(){
		$data['title']="cart";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/cart',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function tracking(){
		$data['title']="tracking";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/tracking',$data);
		$this->load->view('admincontrol/includes/footer');
	}

	public function orders(){
		$data['title']="orders";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/orders',$data);
		$this->load->view('admincontrol/includes/footer');
	}

	public function products(){
		$data['title']="products";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/products',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	
		public function product_step1(){


		$data['title']="Create Product Step 1";
		
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/gallery.php',$data);
		$this->load->view('admincontrol/includes/footer');

	}
	
		public function product_step2(){


		$data['title']="Create Product Step 2";
		
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/create_product.php',$data);
		$this->load->view('admincontrol/includes/footer');

	}

	public function appoinments(){
		$data['title']="appoinments";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/appoinments',$data);
		$this->load->view('admincontrol/includes/footer');
	}

	public function community(){
		$data['title']="appoinments";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/community',$data);
		$this->load->view('admincontrol/includes/footer');
	}

	public function accounting(){
		$data['title']="accounting";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/accounting',$data);
		$this->load->view('admincontrol/includes/footer');
	}

	public function about(){
		$data['title']="about";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/about',$data);
		$this->load->view('admincontrol/includes/footer');
	}

	public function esrow(){
		$data['title']="esrow";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/esrow',$data);
		$this->load->view('admincontrol/includes/footer');
	}

	
	public function blogs(){
		$data['title']="blogs";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/blogs',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function profile(){
		$data['title']="profile";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/profile',$data);
		$this->load->view('admincontrol/includes/footer');
	}
	
	public function editProfile(){
		$data['title']="Edit Profile";
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/editprofile',$data);
		$this->load->view('admincontrol/includes/footer');
	}
}