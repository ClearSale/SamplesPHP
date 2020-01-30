<?php

include_once "Token.php";


class Clearsale_Total_Model_Auth_Entity_ResponseAuth
{
	public $Token;
	function __construct() {
		$this->Token = new Clearsale_Total_Model_Auth_Entity_Token();
	}
}

?>
