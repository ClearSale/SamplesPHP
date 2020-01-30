<?php

$rootPath = dirname(__FILE__)."/";

require_once $rootPath."../../Utils/HttpHelper.php";
require_once $rootPath."../../Utils/Config.php";
require_once $rootPath."../Entity/Library.php";


class Clearsale_Total_Model_Auth_Business_Object
{

public $Http;

function __construct() {
    $this->Http = new Clearsale_Total_Model_Utils_HttpHelper();
	}

public function login($enviroment) {

		$url = $enviroment."api/auth/login/";
		$authRequest = new Clearsale_Total_Model_Auth_Entity_RequestAuth();
		$authRequest->Login->ApiKey = Config::CONFIG_APIKEY;
		$authRequest->Login->ClientID = Config::CONFIG_CLIENTID;
		$authRequest->Login->ClientSecret = Config::CONFIG_CLIENTSECRET;	
		$response = $this->Http->postData($authRequest, $url);	
		return $response;
	}

public function logout($enviroment) {
		$authRequest = new Clearsale_Total_Model_Auth_Entity_RequestAuth();
		$authRequest->Login->ApiKey = Config::CONFIG_APIKEY;
		$authRequest->Login->ClientID = Config::CONFIG_CLIENTID;
		$authRequest->Login->ClientSecret = Config::CONFIG_CLIENTSECRET;
		$url = $enviroment."api/auth/logout/";
		$response = $this->Http->postData($authRequest, $url);
		return $response;
	}
}

?>
   