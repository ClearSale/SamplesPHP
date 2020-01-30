<?php
include_once "Person.php";
include_once "Payment.php";
include_once "Item.php";
include_once "CustomField.php";



class Clearsale_Total_Model_Order_Entity_Order
{
	public $ID;
	public $Date;
	public $Email;       
	public $TotalItems;     
	public $TotalOrder; 
	public $TotalShipping;
	public $Currency;     
	public $Payments;        
	public $BillingData;      
	public $ShippingData;      
	public $Items;     
	public $CustomFields;     
	public $SessionID;
	public $IP;
	public $Reanalysis;
	public $Origin;
	
	function __construct() {
		$this->ShippingData = new Clearsale_Total_Model_Order_Entity_Person();
		$this->BillingData = new Clearsale_Total_Model_Order_Entity_Person();
		$this->Items = array();
		$this->Reanalysis = false;
	}
}

?>


