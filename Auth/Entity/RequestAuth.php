<?php

include_once "Credentials.php";


class Clearsale_Total_Model_Auth_Entity_RequestAuth
{
	public $Login;
	function __construct() {
		$this->Login = new Clearsale_Total_Model_Auth_Entity_Credentials();
	}
}

?>