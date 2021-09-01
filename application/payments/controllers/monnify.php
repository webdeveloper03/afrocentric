<?php

class monnify {
	public $title = 'Monnify';
	public $icon = 'assets/images/payments/monnify.png';
	public $website = 'https://www.monnify.com/';

	function __construct($api){ 
		$this->api = $api; 
	}

	public function getConfirm($data) {
		//$data['paymentsetting_mn'] = $this->api->Product_model->getSettings('storepayment_monnify');
		$view = APPPATH.'payments/views/monnify.php';
		require $view;
	}

	public function getMethod($data){
		return array(
			'html' => '<h3>Monnify</h3>',
			'image' => '',
		);
	}

	public function confirm($data) {
		$order_id = $data['order_info']['id'];
		$payment_status = $data['monnify_response']['status'];
		$transaction_id = $data['monnify_response']['transactionReference'];
		$setting = $this->api->Product_model->getSettings('storepayment_monnify');
		$this->api->confirm_order_api($order_id,$setting['order_success_status'],$transaction_id);
		return array('redirect'=>$this->api->cart->getStoreUrl('thankyou/'. $order_id ));
		die;

	}







	

}