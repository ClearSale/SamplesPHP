<?php

include_once "Order.php";

class Clearsale_Total_Model_Order_Entity_RequestOrder
{
	public  $ApiKey ;
	public  $LoginToken;
	public  $Orders;
	public $AnalysisLocation;
	function __construct() {
		$this->Orders = array();
	}
}

?>