<?php
class AffiliatePro{
	public $customFields   = array();
	public $orderId       = '';
	public $orderCurrency = '';
	public $orderTotal    = '';
	public $productIds    = array();
	public $websiteUrl    = '';

	public function setData($key, $value){
		$this->customFields[] = array('key' => $key, 'value' => $value);
	}

	public function placeOrder(){
		$ipaddress = "";
        if (getenv("HTTP_CLIENT_IP")) $ipaddress = getenv("HTTP_CLIENT_IP");
        else if(getenv("HTTP_X_FORWARDED_FOR")) $ipaddress = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("HTTP_X_FORWARDED")) $ipaddress = getenv("HTTP_X_FORWARDED");
        else if(getenv("HTTP_FORWARDED_FOR")) $ipaddress = getenv("HTTP_FORWARDED_FOR");
        else if(getenv("HTTP_FORWARDED")) $ipaddress = getenv("HTTP_FORWARDED");
        else if(getenv("REMOTE_ADDR")) $ipaddress = getenv("REMOTE_ADDR");
        else $ipaddress = "UNKNOWN";

        $affliate_cookie = (isset($_GET['af_id']) ? $_GET['af_id'] : (isset($_COOKIE["af_id"]) ? $_COOKIE["af_id"] : '') ); 

        $affiliateData = array(
            "order_id"       => $this->orderId,
            "order_currency" => $this->orderCurrency,
            "order_total"    => $this->orderTotal,
            "product_ids"    => implode(",", $this->productIds),
            "af_id"          => $affliate_cookie,
            "ip"             => $ipaddress,
            "base_url"       => base64_encode($this->websiteUrl),
            "customFields"   => json_encode($this->customFields),
            "script_name"    => "php_library",
        );
        
        $context_options = stream_context_create(array(
            'http'=>array(
                'method'=>"GET",
                'header'=> "User-Agent: ". (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '') ."\r\n"."Referer: ". $this->websiteUrl ."\r\n"
            )
        ));
       
        file_get_contents("__baseurl__integration/addOrder?".http_build_query($affiliateData), false, $context_options);
	}
}
