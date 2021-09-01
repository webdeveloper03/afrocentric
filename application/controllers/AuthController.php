<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class AuthController extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Setting_model','setting');
		$this->load->helper('form');
		$this->load->model('User_model');
		    $this->load->library('email');
        $this->load->library('encryption');

		$this->load->library('session');
	}
	
	public function user_login(){
		$settings = $this->setting->getAllSettings(['googlerecaptcha','site']);
		$data['googlerecaptcha'] = $settings['googlerecaptcha'];
		$data['siteSetting'] = $settings['site'];
		$this->load->view('includes/auth/header');
		$this->load->view('auth/user/login',$data);
		$this->load->view('includes/auth/footer');
    }

    public function user_forget_password(){
		if($this->login_settings['front_template'] != 'landing'){ redirect("/"); }
		$data['SiteSetting'] = $this->Product_model->getSettings('site');
		$data['title'] = "Affiliate Login";
		$this->render_page('auth/user/templates/forget_password', $data);
	}

	public function privacy_policy(){
		if($this->login_settings['front_template'] != 'landing'){ redirect("/"); }
		$data['tnc'] = $this->Product_model->getSettings('tnc');
		$data['title'] = $data['tnc']['heading'];
		$this->render_page('auth/user/templates/privacy_policy', $data);
	}

	public function change_language($language_id){
		$language = $this->db->query("SELECT * FROM language WHERE id=".$language_id)->row_array();
		if($language){
			$_SESSION['userLang'] = $language_id;
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		else { show_404(); }
	}

	public function user_register(){

        $this->session->sess_destroy();
        session_destroy();
		$settings = $this->setting->getAllSettings(['googlerecaptcha','site']);
		$data['googlerecaptcha'] = $settings['googlerecaptcha'];
		$data['siteSetting'] = $settings['site'];
		$this->load->view('includes/auth/header');
		$this->load->view('auth/user/register',$data);
		$this->load->view('includes/auth/footer');

	}
	
	
	public function acttype($acttype=""){
	    
	    $this->session->set_userdata("userregID",'NA');
	    $this->session->set_userdata("accountType",$acttype);
	   redirect('user/reg1');
	}
	
	public function user_register_step1($act_type=""){
        
        
		$settings = $this->setting->getAllSettings(['googlerecaptcha','site']);
		$data['googlerecaptcha'] = $settings['googlerecaptcha'];
		$data['siteSetting'] = $settings['site'];
		$id = $this->session->userdata('userregID');
		if($id != ""){
		$this->load->view('includes/auth/header');
		$this->load->view('designer/reg_step_2',$data);
		$this->load->view('includes/auth/footer');
		}else{
		$this->load->view('includes/auth/header');
		$this->load->view('auth/user/register',$data);
		$this->load->view('includes/auth/footer');
		}
		   
	}
	
	public function step2_preocess_data(){

        $id = $this->session->userdata('userregID');
        $id = (int)$id;        
        
        
        $post = $this->input->post();
		if(isset($id) && $id != ""){
			$this->db->where("id",$id);
			$d = $this->db->update('users',$post);
			$json['success'] = true; 
		}else{
		    $json['errors'] = "Something Went Wrong";
		}
		echo json_encode($json);die;
	}
	
		public function step3_preocess_data(){

        $id = $this->session->userdata('userregID');
        $id = (int)$id;        
        
        
        $post = $this->input->post();
		if(isset($id) && $id != ""){
			$this->db->where("id",$id);
			$d = $this->db->update('users',$post);
			$json['success'] = true; 
		}else{
		    $json['errors'] = "Something Went Wrong";
		}
		echo json_encode($json);die;
	}
	
	//Public Function remove favourite
	public function removeInterest(){
	    $id = $this->session->userdata('userregID');
        $id = (int)$id; 
          
	    $post = $this->input->post("cat");
	    $this->db->where('int_id', $post);
        $this->db->delete('user_interests');
	}
	
	
	
		//Public Function add favourite
	public function addBusiness(){
	    
	    $id = $this->session->userdata('userregID');
        $id = (int)$id; 
    
        
        if($id != ""){
	    $post = $this->input->post();
	    
	    $data = array(
        'b_name' => $post['b_name'],
        'b_type' => $post['b_type'],
        'b_identification' => $post['b_identification'],
        'nic' => $post['nic'],
        'experience' => $post['experience'],
        'education' => $post['education'],
        'skills' => $post['skills'],
        'user_id' => $id
        );

        $this->db->insert('business', $data);
        $insert_id = $this->db->insert_id();
        $this->session->set_userdata('b_ID',$insert_id);
        redirect(base_url()."member/designer/plans");
        exit;
        
        }else{
        echo "failed"; 
        }

	}
	
	
	//Public Function add favourite
	public function addInterest(){
	    
	    $id = $this->session->userdata('userregID');
        $id = (int)$id; 
        
        if($id != ""){
	    $post = $this->input->post("cat");
	    
	    $data = array(
        'category' => $post,
        'user_id' => $id
        );

        $this->db->insert('user_interests', $data);
        $insert_id = $this->db->insert_id();
        echo $insert_id;
        }else{
        echo "failed"; 
        }

	}
	
		public function user_register_step2(){
        
        
        $accountType = $this->session->userdata("accountType");

        
		$id = $this->session->userdata('userregID');
        $id = (int)$id; 
        
        if(isset($accountType) && $accountType != ""){
        
        $this->db->set('type', $accountType);
        $this->db->where('id', $id);
        $this->db->update('users');
        
        }
        
        $data['userID'] = $id;
        $this->db->select("*");
        $this->db->from('user_interests');
        $this->db->join('categories','categories.name = user_interests.category','right');
        $this->db->order_by('categories.id','DESC');

        $data['categories'] = $this->db->get();  

		$settings = $this->setting->getAllSettings(['googlerecaptcha','site']);
		$data['googlerecaptcha'] = $settings['googlerecaptcha'];
		$data['siteSetting'] = $settings['site'];
		
		$this->load->view('includes/auth/header');
		
		if(isset($accountType) && $accountType != ""){
		    
		$this->load->view('designer/reg_bussiness',$data);    
		    
		    
		}else{
		
		
		$this->load->view('designer/reg_step_3',$data);
		
		}
		
		$this->load->view('includes/auth/footer');

	}

	public function team_register(){


		$settings = $this->setting->getAllSettings(['googlerecaptcha','site']);
		$data['googlerecaptcha'] = $settings['googlerecaptcha'];
		$data['siteSetting'] = $settings['site'];
		$this->load->view('includes/auth/header');
		$this->load->view('auth/user/team_register',$data);
		$this->load->view('includes/auth/footer');

	}

	public function render_page($file , $data = array()){
		$this->front_assets_url = base_url('application/views/auth/user/assets/');
		
		$data['assets_url'] = base_url('application/views/auth/user/assets/');
		$data['setting'] = $this->Product_model->getSettings('templates');
		$data['LanguageHtml'] = $this->Product_model->getLanguageHtml('AuthController');
		$data['templates_url'] = $this->front_assets_url ."img/";
		$data['content'] = $this->load->view($file,$data, true);
		$this->load->view('auth/user/templates/layout', $data);
	}

	public function memberLogin(){
		
		//underconstructions to complete fb & security codes
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array('username'=>$username,'password'=>$password);
        $this->session->set_flashdata('memberlogin',$data);
        redirect('auth/login');
        exit;

	}

	public function memberDesignDash(){

		$settings = $this->setting->getAllSettings(['googlerecaptcha','site']);
		$data['googlerecaptcha'] = $settings['googlerecaptcha'];
		$data['siteSetting'] = $settings['site'];
		$this->load->view('admincontrol/includes/header');
		$this->load->view('designer/dashboard',$data);
		$this->load->view('admincontrol/includes/footer');
	}

	public function multiple_pages($slug= ''){
		$data['setting'] = $this->Product_model->getSettings('loginclient');
		$this->load->model('PagebuilderModel');

		
	}

	public function user_index($childPage = false){
		$data['login'] = $this->login_settings;
		$siteSetting = $this->Product_model->getSettings('site');

		if (isset($_POST['send_contact_form'])) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('fname', 'First Name', 'required|min_length[2]');
			$this->form_validation->set_rules('lname', 'Last Name', 'required|min_length[2]');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required');
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('body', 'Mail Body', 'required' );
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');

			if($this->form_validation->run()){
				$data = $this->input->post(null);
				$this->load->model('Mail_model');
				$this->Mail_model->send_store_contact_vendor($data);
				$json['success'] = 'Mail sent Successfully';
			}else{
				$json['errors'] = $this->form_validation->error_array();
			}

			echo json_encode($json);die;
		}
		
		$this->load->model('PagebuilderModel');
		$login_data = $this->session->userdata("login_data");
		if(isset($login_data['refid'])){
			$data['refid'] = $login_data['refid'];
		}
		$data['design'] = '';
		$data['register_fomm'] = '';
		
		
		$data['setting'] = $this->Product_model->getSettings('loginclient');
        $data['SiteSetting'] = $this->Product_model->getSettings('site');
        $data['countries'] = $this->User_model->getCountries();
		$data['title'] = $data['SiteSetting']['name'];
		$data['meta_keywords'] = $data['SiteSetting']['meta_keywords'];
		$data['meta_author'] = $data['SiteSetting']['meta_author'];
		$data['meta_description'] = $data['SiteSetting']['meta_description'];
		$data['footer'] = $data['SiteSetting']['footer'];
		$data['store'] = $this->Product_model->getSettings('store');
		
		$front_template = $this->login_settings['front_template'];
		if(isset($_GET['tmp_theme'])){
			$front_template = $_GET['tmp_theme'];
		}

		$lang = $_SESSION['userLang'];
		$data['selected_language'] = $this->db->query("SELECT * FROM language WHERE status=1 AND id=". (int)$lang)->row_array();

		if($front_template == 'multiple_pages'){
		   require(APPPATH.'controllers/Themes.php');
		   $Themes = new Themes(false);
		   $Themes->multiPages($this, $childPage);
		} else if(substr($front_template,0,7) == 'custom_'){
			$registration_builder['template_index'] = substr($front_template, 7);
			$register_form = $this->PagebuilderModel->getSettings('registration_builder');
			$registration_builder['data'] = array();
			$registration_builder['allow_back_to_login'] = true;
	 		if(isset($register_form['registration_builder'])){
	 			$registration_builder['data'] = json_decode($register_form['registration_builder'],1);
	 		}
	 		if($data['store']['registration_status']){
	 			$data['register_fomm'] = $this->load->view('auth/user/templates/register_form',$registration_builder, true);
	 		}
	 		$data['LanguageHtml'] = $this->Product_model->getLanguageHtml('AuthController');
			$data['is_home'] = true;
			$this->load->view('usercontrol/login/index'. str_replace("custom_", "", $front_template) , $data);
		} else {
			$register_form = $this->PagebuilderModel->getSettings('registration_builder');
			$registration_builder['data'] = array();

			$registration_builder['allow_back_to_login'] = true;
	 		if(isset($register_form['registration_builder'])){
	 			$registration_builder['data'] = json_decode($register_form['registration_builder'],1);
	 		}
	 		if($data['store']['registration_status']){
	 			$data['register_fomm'] = $this->load->view('auth/user/templates/register_form',$registration_builder, true);
	 		}

	 		$this->load->view('usercontrol/login/login', $data);
		}
    }

	public function page($slug){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$this->load->model("PagebuilderModel");
		$data['design'] = '';
		$data['title'] = '';
		$siteSetting = $this->Product_model->getSettings('site');
		

		$theme_page = array();
		if($this->login_settings['front_template']){
			//$theme 	= $this->PagebuilderModel->getPage($this->login_settings['front_template']);
			$theme_page 	= $this->PagebuilderModel->getThemePageBySlug($this->login_settings['front_template'],urldecode($slug));
  
		 	if($theme_page){
				$temp_data['design'] = $theme_page['design'];
				$temp_data['title'] = $theme_page['meta_tag_title'];
				$temp_data['login'] = $this->login_settings;
				$temp_data['favicon'] = $siteSetting['favicon'];
				
				$data['design'] = $this->PagebuilderModel->parseTemplate($temp_data);
		 	}
		
	    	//$data['setting'] = $this->Product_model->getSettings('templates');
			//$data['assets_url'] = base_url('application/views/auth/user/assets/');
			//$data['footer'] = $this->login_settings['footer'];
	    	//$data['templates_url'] =  $data['assets_url'] ."img/";
		}
		
		if($theme_page){
			$this->load->view('usercontrol/login/login', $data);
		}else{
			show_404();
		}
	}
	
	
	public function regEmail(){
	    
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; 
    $config['validation'] = TRUE; 
    
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://mail.theapp3star.com';
    $config['smtp_port']  = 465;
    $config['smtp_user']  = 'register@theapp3star.com';
    $config['smtp_pass']  = 'm-S5@2qs}m#h';
    
    $this->email->initialize($config);
    
    
    $id = $this->session->userdata('userregID');
    $id = (int)$id; 
    
    $users = $this->db->query("SELECT * FROM users WHERE id = $id")->row_array();

    
    
    $content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html data-editor-version="2" class="sg-campaigns" xmlns="http://www.w3.org/1999/xhtml"><head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <!--[if !mso]><!-->
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <!--<![endif]-->
      <!--[if (gte mso 9)|(IE)]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
      <![endif]-->
      <!--[if (gte mso 9)|(IE)]>
  <style type="text/css">
    body {width: 600px;margin: 0 auto;}
    table {border-collapse: collapse;}
    table, td {mso-table-lspace: 0pt;mso-table-rspace: 0pt;}
    img {-ms-interpolation-mode: bicubic;}
  </style>
<![endif]-->
      <style type="text/css">
    body, p, div {
      font-family: inherit;
      font-size: 14px;
    }
    body {
      color: #000000;
    }
    body a {
      color: #1188E6;
      text-decoration: none;
    }
    p { margin: 0; padding: 0; }
    table.wrapper {
      width:100% !important;
      table-layout: fixed;
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: 100%;
      -moz-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    img.max-width {
      max-width: 100% !important;
    }
    .column.of-2 {
      width: 50%;
    }
    .column.of-3 {
      width: 33.333%;
    }
    .column.of-4 {
      width: 25%;
    }
    @media screen and (max-width:480px) {
      .preheader .rightColumnContent,
      .footer .rightColumnContent {
        text-align: left !important;
      }
      .preheader .rightColumnContent div,
      .preheader .rightColumnContent span,
      .footer .rightColumnContent div,
      .footer .rightColumnContent span {
        text-align: left !important;
      }
      .preheader .rightColumnContent,
      .preheader .leftColumnContent {
        font-size: 80% !important;
        padding: 5px 0;
      }
      table.wrapper-mobile {
        width: 100% !important;
        table-layout: fixed;
      }
      img.max-width {
        height: auto !important;
        max-width: 100% !important;
      }
      a.bulletproof-button {
        display: block !important;
        width: auto !important;
        font-size: 80%;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      .columns {
        width: 100% !important;
      }
      .column {
        display: block !important;
        width: 100% !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
      }
    }
  </style>
    </head>
    <body>
      <center class="wrapper" data-link-color="#1188E6" data-body-style="font-size:14px; font-family:inherit; color:#000000; background-color:#FFFFFF;">
        <div class="webkit">
          <table cellpadding="0" cellspacing="0" border="0" width="100%" class="wrapper" bgcolor="#FFFFFF">
            <tbody><tr>
              <td valign="top" bgcolor="#FFFFFF" width="100%">
                <table width="100%" role="content-container" class="outer" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tbody><tr>
                    <td width="100%">
                      <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tbody><tr>
                          <td>
                            <!--[if mso]>
    <center>
    <table><tr><td width="600">
  <![endif]-->
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:600px;" align="center">
                                      <tbody><tr>
                                        <td role="modules-container" style="padding:0px 0px 0px 0px; color:#000000; text-align:left;" bgcolor="#FFFFFF" width="100%" align="left"><table class="module preheader preheader-hide" role="module" data-type="preheader" border="0" cellpadding="0" cellspacing="0" width="100%" style="display: none !important; mso-hide: all; visibility: hidden; opacity: 0; color: transparent; height: 0; width: 0;">
    <tbody><tr>
      <td role="module-content">
        <p></p>
      </td>
    </tr>
  </tbody></table><table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" data-type="columns" style="padding:30px 20px 30px 20px;" bgcolor="#f6f6f6">
    <tbody>
      <tr role="module-content">
        <td height="100%" valign="top">
          <table class="column" width="540" style="width:540px; border-spacing:0; border-collapse:collapse; margin:0px 10px 0px 10px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
            <tbody>
              <tr>
                <td style="padding:0px;margin:0px;border-spacing:0;"><table class="wrapper" role="module" data-type="image" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="72aac1ba-9036-4a77-b9d5-9a60d9b05cba">
    <tbody>
      <tr>
        <td style="font-size:6px; line-height:10px; padding:0px 0px 0px 0px;" valign="top" align="center">
        </td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="331cde94-eb45-45dc-8852-b7dbeb9101d7">
    <tbody>
      <tr>
        <td style="padding:0px 0px 20px 0px;" role="module-content" bgcolor="">
        </td>
      </tr>
    </tbody>
  </table><table class="wrapper" role="module" data-type="image" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="d8508015-a2cb-488c-9877-d46adf313282">
    <tbody>
      <tr>
        <td style="font-size:28px; line-height:10px; padding:0px 0px 0px 0px;" valign="top" align="center">
          <h2>Afrocentric</h2>
        </td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="27716fe9-ee64-4a64-94f9-a4f28bc172a0">
    <tbody>
      <tr>
        <td style="padding:0px 0px 30px 0px;" role="module-content" bgcolor="">
        </td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="948e3f3f-5214-4721-a90e-625a47b1c957" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:50px 30px 18px 30px; line-height:36px; text-align:inherit; background-color:#ffffff;" height="100%" valign="top" bgcolor="#ffffff" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="font-size: 43px">Thanks for signing up, '.$users["firstname"].'! &nbsp;</span></div><div></div></div></td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="a10dcb57-ad22-4f4d-b765-1d427dfddb4e" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:18px 30px 18px 30px; line-height:22px; text-align:inherit; background-color:#ffffff;" height="100%" valign="top" bgcolor="#ffffff" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="font-size: 18px">Please verify your email address to</span><span style="color: #000000; font-size: 18px; font-family: arial,helvetica,sans-serif"> get access to Website.</span><span style="font-size: 18px">.</span></div>
<div style="font-family: inherit; text-align: center"><span style="color: #ffbe00; font-size: 18px"><strong>Thank you!&nbsp;</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="7770fdab-634a-4f62-a277-1c66b2646d8d">
    <tbody>
      <tr>
        <td style="padding:0px 0px 20px 0px;" role="module-content" bgcolor="#ffffff">
                         <center> <a href="'.base_url().'user/validate/'.$users["id"].'" style="background-color:#ffbe00; border:1px solid #ffbe00; border-color:#ffbe00; border-radius:0px; border-width:1px; color:#000000; display:inline-block; font-size:14px; font-weight:normal; letter-spacing:0px; line-height:normal; padding:12px 40px 12px 40px; text-align:center; text-decoration:none; border-style:solid; font-family:inherit;" target="_blank">Verify Email Now</a></center>
        </td>
      </tr>
    </tbody>
  </table></td>
        </tr>
      </tbody>
        </div>
      </center>
</body></html>';


    


    $this->email->from('register@theapp3star.com', 'Afrocentric Account Activation');
    $this->email->to($users['email']);
      
    $this->email->subject('Account Activation');
    $this->email->message($content);
    $this->email->send();
    
    redirect(base_url('user/validation'));
	
	}
	
	
	public function activation(){

        
		$settings = $this->setting->getAllSettings(['googlerecaptcha','site']);
		$data['googlerecaptcha'] = $settings['googlerecaptcha'];
		$data['siteSetting'] = $settings['site'];
		$id = $this->session->userdata('userregID');
		
		
		$this->load->view('includes/auth/header');
		$this->load->view('designer/regemail',$data);
		$this->load->view('includes/auth/footer');
		
		   
	}
	
		
	public function doActivateAccount($id){
		   $this->db->query("UPDATE users set reg_approved = 1 WHERE id = $id");
		   redirect(base_url('login'));
		   exit;
	}
	
	public function admin_login(){

		/************************** SOS LOGIN START *******************************/
			/*
			$username = 'admin';
			$password = 'admin2018$';
			if($this->authentication->login($username, $password)){
				$this->load->model('user_model', 'user');
				$user_details_array=$this->user->login($username);
				
				$this->user->update_user_login($user_details_array['id']);
				$this->session->set_userdata(array('administrator'=>$user_details_array));
				redirect(base_url('admincontrol/dashboard'));
			}*/
		/************************** SOS LOGIN END *******************************/

		$data['setting'] = $this->Product_model->getSettings('site');
		$this->load->view('auth/admin/index', $data);
	}
}