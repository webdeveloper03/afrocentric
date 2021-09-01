<?php

require_once(APPPATH.'models/Model.php');

class User_model extends Model{
	protected $_table = 'users';
	public $register_rules = array(
		'firstname' => array (
			'field' => 'firstname',
			'label' => 'first name',
			'rules' => 'trim|required|xss_clean'
		),
		'lastname' => array (
			'field' => 'lastname',
			'label' => 'last name',
			'rules' => 'trim|required|xss_clean'
		),
		'email' => array (
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email|callback_unique_email|xss_clean'
		),
		'username' => array (
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required|callback_unique_username|xss_clean'
		),
		'password' => array (
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required|matches[cpassword]|xss_clean'
		),
        'cpassword' => array (
            'field' => 'cpassword',
            'label' => 'confirm password',
            'rules' => 'trim|required|matches[password]|xss_clean'
        ),
        'address' => array (
            'field' => 'address',
            'label' => 'address',
            'rules' => 'trim|required|xss_clean'
        ),
        'state' => array (
            'field' => 'state',
            'label' => 'state',
            'rules' => 'trim|required'
        ),
        'country' => array (
            'field' => 'country',
            'label' => 'country',
            'rules' => 'trim|required'
        ),
        'paypal_email' => array (
            'field' => 'paypal_email',
            'label' => 'paypal email',
            'rules' => 'trim|required|valid_email|callback_unique_email|xss_clean'
        ),
        'phone_number' => array (
            'field' => 'phone_number',
            'label' => 'phone number',
            'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
        ),
		'alternate_phone_number' => array (
			'field' => 'alternate_phone_number',
			'label' => 'alternate phone number',
			'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
		)
	);
	public $login_rules = array(
		'username' => array (
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required'
		),
		'password' => array (
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required'
		)
	);	
	public $profile_rules = array(
		'firstname' => array (
			'field' => 'firstname',
			'label' => 'firstname',
			'rules' => 'trim|required'
		),
		'lastname' => array (
			'field' => 'lastname',
			'label' => 'lastname',
			'rules' => 'trim|required'
		),
		'email' => array (
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email'
		)
	);	
	public $password_rules = array(
		'current_password' => array (
			'field' => 'current_password',
			'label' => 'current password',
			'rules' => 'trim|required|callback_password_check'
		),
		'new_password' => array (
			'field' => 'new_password',
			'label' => 'new password',
			'rules' => 'trim|required'
		),
		'confirm_newpassword' => array (
			'field' => 'confirm_newpassword',
			'label' => 'confirm password',
			'rules' => 'trim|required|matches[new_password]'
		)
	);	

	function login($username) {
		return $this->db->where('username',$username)
		->get('users')->row_array();
		/*->where('status',1)*/
	}
	
    function getCountries(){
        return $this->db->select('id,name')->from('countries')->get()->result_array();
    }
    function getState($country_id){
		return $this->db->select('id,name')->from('states')->where('country_id', $country_id)->get()->result_array();
    }
    function update_user_login($user_id) {
        return $this->db->where('id', $user_id)->update('users', array('online' => '1'));
	}
	function update_user($user_id,$url) {
		return $this->db->where('id', $user_id)->update('users',$url);
	}

	function get_user_by_id($usr_id) {
		$record = $this->db->get_where('users',array('id'=>$usr_id))->row();

		$record->avatar_url =  base_url($record->avatar != '' ? 'assets/images/users/thumb/' . $record->avatar : 'assets/images/no-user.png');
		return $record;
	}
	function get_user_by_type($type) {
		return $this->db->get_where('users',array('type'=>$type))->row_array();
	}

	function checkmail($email, $user_id = null){
        if ($user_id) {
            $this->db->where('id !=', $user_id);
        }
        return $this->db->get_where('users', ['email' => $email])->row();
    }
    function checkuser($username, $user_id = null){
        if ($user_id) {
            $this->db->where('id !=', $user_id);
        }
        return $this->db->get_where('users', ['username' => $username])->row();
    }

	function getUserCountry(){
		$this->db->select('count(*) as num, countries.name');
		$this->db->from('users');
		$this->db->group_by('users.country');
		$this->db->join('countries','users.country=countries.id');
		$query = $this->db->get();
		return $query->result();
	}
	function custom_query() {
		//return $this->db->query("ALTER TABLE users ADD google_id VARCHAR(255) NOT NULL, ADD facebook_id VARCHAR(255) NOT NULL, ADD twitter_id VARCHAR(255) NOT NULL");
	}
	function getAllNotification($user_id = null){
		$this->db->from('notification');
		if(!empty($user_id)){
			$this->db->where('notification_view_user_id', $user_id);
		}
		$this->db->where('notification_is_read', 0);
		$this->db->order_by("notification_created_date", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	function getAllNotificationPaging($notification_viewfor = null,$user_id = null,$limit, $start){
		$this->db->from('notification');
		$this->db->limit($limit, $start);
		if(!empty($notification_viewfor)){
			$this->db->where('notification_viewfor', $notification_viewfor);
		}
		if(!empty($user_id)){
			$this->db->where(" (notification_view_user_id = {$user_id} OR notification_view_user_id = 'all')  ",NULL,false);
		}

		$this->db->order_by("notification_created_date", "desc");
		$data['notifications'] = $this->db->get()->result_array();

		$this->db->from('notification');
		if(!empty($user_id)){
			$this->db->where(" (notification_view_user_id = {$user_id} OR notification_view_user_id = 'all')  ",NULL,false);
		}
		if(!empty($notification_viewfor)){
			$this->db->where('notification_viewfor', $notification_viewfor);
		}
		$data['total'] = $this->db->count_all_results();
		return $data;
	}

	public function getAdmins($filter = array()){
        $where = "users.id != 1 AND users.type = 'admin'";

		if(isset($filter['access_level_id'])){
            $where .= " AND access_level_id = ". (int)$filter['access_level_id'];
        }
		if(isset($filter['status'])){
            $where .= " AND status = ". (int)$filter['status'];
        }
        if(isset($filter['searchKey']) && $filter['searchKey']){
            $searchKey = $filter['searchKey'];
            $where .= " AND ( firstname LIKE '%{$searchKey}%' OR lastname LIKE '%{$searchKey}%' OR CONCAT(`firstname`,' ',`lastname`) LIKE '%{$searchKey}%' )";
        }

		$order = 'firstname ASC, lastname ASC';
		if(isset($filter['order'])){
			if($filter['order']==1){
				$order = 'firstname DESC, lastname DESC';
			}
        }

		$query = "
				SELECT SQL_CALC_FOUND_ROWS
					users.*, users.*,countries.sortname, access_levels.name as access_level_name 
					FROM users 
					LEFT JOIN countries ON countries.id = users.Country
					LEFT JOIN access_levels ON access_levels.id = users.access_level_id
					WHERE {$where}
					ORDER BY {$order}";   

        if (isset($filter['page'],$filter['limit'])) {
            $offset = (($filter['page']-1) * $filter['limit']);
            $query.= " LIMIT {$offset},". $filter['limit'];
        }
		
        $records = $this->db->query($query)->result();
        $total = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;
		
		foreach ($records as $key => $value) {
            $image=$value->avatar;
            $records[$key]->avatar_url =  base_url($image != '' ? 'assets/images/users/thumb/' . $image : 'assets/images/no-user.png');
        }

        return array($records,$total);
    }

	public function getUsers($filter = array()){
        $where = '1';

		if(isset($filter['type'])){
            $where .= " AND type = '{$filter['type']}'";
        }
		if(isset($filter['status'])){
            $where .= " AND status = ". (int)$filter['status'];
        }
        if(isset($filter['searchKey']) && $filter['searchKey']){
            $searchKey = $filter['searchKey'];
            $where .= " AND ( firstname LIKE '%{$searchKey}%' OR lastname LIKE '%{$searchKey}%' OR CONCAT(`firstname`,' ',`lastname`) LIKE '%{$searchKey}%' )";
        }

		$order = 'firstname ASC, lastname ASC';
		if(isset($filter['order'])){
			if($filter['order']==1){
				$order = 'firstname DESC, lastname DESC';
			}
        }

		if($filter['type'] == 'customer'){
			$query = "
            SELECT SQL_CALC_FOUND_ROWS 
                users.*,
                (SELECT SUM(o.total) FROM `order` o WHERE  o.user_id = users.id AND o.status > 0) as amount ,
                (SELECT COUNT(o.id) FROM `order` o WHERE  o.user_id = users.id AND o.status > 0) as total_sale 
            FROM  users
            WHERE {$where}
            ORDER BY {$order}";
		} else {
			$query = "
				SELECT SQL_CALC_FOUND_ROWS
					users.*,
					(SELECT AVG(ur.rating_number) FROM `user_ratings` ur WHERE  ur.to_user_id = users.id) as total_rating
				FROM  users
				WHERE {$where}
				ORDER BY {$order}";   
		}     

        if (isset($filter['page'],$filter['limit'])) {
            $offset = (($filter['page']-1) * $filter['limit']);
            $query.= " LIMIT {$offset},". $filter['limit'];
        }
		
        $records = $this->db->query($query)->result();
        $total = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;
		// c_pr($total);
		// c_pr($records,1);
		foreach ($records as $key => $value) {
            $image=$value->avatar;
            $records[$key]->avatar_url =  base_url($image != '' ? 'assets/images/users/thumb/' . $image : 'assets/images/no-user.png');
        }

        return array($records,$total);
    }

	function getUser($filter=[]) {
		$this->db->select('users.*,
			(SELECT SUM(o.total) FROM `order` o WHERE  o.user_id = users.id AND o.status > 0) as amount ,
                (SELECT COUNT(o.id) FROM `order` o WHERE  o.user_id = users.id AND o.status > 0) as total_sale
		')->from('users');
		if(isset($filter['id'])){
            $this->db->where(['id'=>$filter['id']]);
        }

		$record = $this->db->get()->row();

		$record->avatar_url =  base_url($record->avatar != '' ? 'assets/images/users/thumb/' . $record->avatar : 'assets/images/no-user.png');
		
		return $record;
	}
}