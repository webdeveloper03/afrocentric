<?php	
class Version_changes_model extends MY_Model{

	public function update_changes() {
		$this->update_mail_templates();
		$this->clear_image_cache_folders();
		$this->delete_language_folder_1();
		$this->update_version_details();
	}

	public function update_version_details(){
	    if(!defined('SCRIPT_VERSION') || SCRIPT_VERSION != "4.0.0.1") {
     		$version = "<?php \n";
     		$version .= "define('SCRIPT_VERSION', '4.0.0.1'); \n";
    		file_put_contents(FCPATH."/install/version.php", $version);
	    }
	}

    public function delete_language_folder_1() {
    	$dirPath = FCPATH."application/language/1";
        if (is_dir($dirPath)) {
	        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
	            $dirPath .= '/';
	        }
	        $files = glob($dirPath . '*', GLOB_MARK);
	        foreach ($files as $file) {
	            if (is_dir($file)) {
	                self::deleteDir($file);
	            } else {
	                unlink($file);
	            }
	        }
	        rmdir($dirPath);
        }
    }

	public function clear_image_cache_folders() {
		$folder_path = [];
		$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/form/favi/";
		$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/payments/";
		$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/product/upload/thumb/";
		$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/site/";
		$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/themes/";
		$folder_path[] =  FCPATH."assets/image_cache/cache/assets/images/wallet-icon/";
		$folder_path[] =  FCPATH."assets/image_cache/cache/assets/vertical/assets/images/users/";
		foreach ($folder_path as $key => $value) {
			$files = glob($value.'/*');
			foreach($files as $file) { 
				if(is_file($file))  unlink($file);  
			}
		}
	}

    private function update_mail_templates() {
    	$newMailTemplates = [['subscription_status_change', 'Subscription Status Changed', 'Subscription Status Changed', '<p>Dear [[firstname]],</p>\r\n                <p>Your subscription status has been changed to [[status_text]]</p>\r\n                <p>Comment: [[comment]] </p>\r\n                [[website_name]]<br />\r\n                Support Team</p>', '', NULL, NULL, '', 'comment,planname,price,expire_at,started_at,status_text,firstname,lastname,email,username,website_url,website_name,website_logo,name'], ['subscription_buy', 'Subscription Buy', 'Subscription Buy', '<h2>Thanks for your order</h2>\r\n\r\n<p>Welcome to Prime. As a Prime member, enjoy these great benefits. If you have any questions, call us any time at or simply reply to this email.</p>\r\n', 'New Subscription Buy From [[firstname]] [[lastname]]', NULL, NULL, '<h2>Thanks for your order</h2>\r\n\r\n<p>Welcome to Prime. As a Prime member, enjoy these great benefits. If you have any questions, call us any time at or simply reply to this email.</p>\r\n', 'planname,price,expire_at,started_at,firstname,lastname,email,username,website_url,website_name,website_logo,name'], ['subscription_expire_notification', 'Subscription Expire Notification', 'Your Subscription Will Be Expired Soon.', '<p>customText</p>\r\n', NULL, NULL, NULL, NULL, 'planname,price,expire_at,started_at,firstname,lastname,email,username,website_url,website_name,website_logo,name'], ['wallet_noti_on_hold_wallet', 'Wallet Status Change To On Hold', '[[amount]] is put on hold in your wallet', '<p>Dear [[name]],</p>\n        <p>Transactions #[[id]] status changed to [[new_status]]. amount is [[amount]]</p>\n        <p><br />\n        [[website_name]]<br />\n        Support Team</p>\n', '', NULL, NULL, NULL, 'amount,id,name,new_status,user_email,website_name,website_logo,name'], ['new_user_request', 'New User Request', 'User Registration Successfull', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>User account has been registered successfully on [[website_name]], please wait while system admin apporve&nbsp;your request.<br />\r\nWe will inform you once account has been approved, Thank You.</p>\r\n\r\n<p>Support Team<br />\r\n[[website_name]]</p>\r\n', 'New User Registration - Approval Pending', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>New user has been registered on [[website_name]], apporval is pending yet!</p>\r\n\r\n<p>User Details</p>\r\n\r\n<p>Name : [[firstname]][[lastname]]<br />\r\nEmail :&nbsp;[[email]]<br />\r\nUsername : [[username]]<br />\r\nSupport Team<br />\r\n[[website_name]]</p>', 'firstname,lastname,email,username,website_name,website_logo'], ['new_user_approved', 'New User Request Approved', 'User Account Approved', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>Your new user account registration request is accepted by admin, you can login and use services.</p>\r\n\r\n<p>[[website_name]]<br />\r\nSupport Team</p>\r\n', 'User Account Approved', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>You have approced registration request of user having</p>\r\n\r\n<p>Name : [[firstname]]&nbsp;[[lastname]]</p>\r\n\r\n<p>Email : [[email]]</p>\r\n\r\n<p>Username : [[username]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Support Team</p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo'], ['new_user_declined', 'New User Request Declined', 'User Account Declined', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>Your new user account registration request is declined by admin, for more information please contact supprt team</p>\r\n\r\n<p>[[website_name]]<br />\r\nSupport Team</p>\r\n', 'User Account Declined', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>You have declined registration request of user having</p>\r\n\r\n<p>Name : [[firstname]]&nbsp;[[lastname]]</p>\r\n\r\n<p>Email : [[email]]</p>\r\n\r\n<p>Username : [[username]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Support Team</p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo']];

    	for ($i=0; $i < sizeof($newMailTemplates); $i++) { 
    		$this->db->query("INSERT INTO `mail_templates` (`unique_id`, `name`, `subject`, `text`, `admin_subject`, `client_subject`, `client_text`, `admin_text`, `shortcode`) SELECT * FROM (SELECT '".$newMailTemplates[$i][0]."' AS `unique_id`, '".$newMailTemplates[$i][1]."' AS `name`, '".$newMailTemplates[$i][2]."' AS `subject`, '".$newMailTemplates[$i][3]."' AS `text`, '".$newMailTemplates[$i][4]."' AS `admin_subject`, '".$newMailTemplates[$i][5]."' AS `client_subject`, '".$newMailTemplates[$i][6]."' AS `client_text`, '".$newMailTemplates[$i][7]."' AS `admin_text`,'".$newMailTemplates[$i][8]."' AS `shortcode`) AS tmp WHERE NOT EXISTS ( SELECT `unique_id` FROM `mail_templates` WHERE `unique_id` = '".$newMailTemplates[$i][0]."' ) LIMIT 1;");
    	}
    }
}