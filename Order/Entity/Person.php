<?php

include_once "Address.php";
include_once "Phone.php";


class Clearsale_Total_Model_Order_Entity_Person
{
	public $ID;      
	public $Type;
	public $Name;
	public $Email;
	
	public $Address;
	public $Phones; 

	function __construct() {
		$this->Address = new Clearsale_Total_Model_Order_Entity_Address();
		$this->Phones = array();

	}
}

?>

