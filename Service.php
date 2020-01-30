<?php

include_once 'Auth/Business/Object.php';
include_once 'Order/Business/Object.php';



class Clearsale_Total_Model_Service
{
	
	public function sendOrder($order)
	{
		try {
            
			$environment = Config::CONFIG_ENVIRONMENT_SANDBOX;	
            
			$authBO =  new  Clearsale_Total_Model_Auth_Business_Object();
			$authResponse = $authBO->login($environment);

            if($authResponse)
            {

			    $clearSaleOrder = $order;			 
			    $requestOrder = new Clearsale_Total_Model_Order_Entity_RequestOrder();
			    $requestOrder->ApiKey = Config::CONFIG_APIKEY;
			    $requestOrder->LoginToken = $authResponse->Token->Value;
			    $requestOrder->AnalysisLocation = Config::CONFIG_ANALYSIS_LOCATION_USA;
			    $requestOrder->Orders[0] = $clearSaleOrder;	  
           
			    $orderBO = new Clearsale_Total_Model_Order_Business_Object();
			    $orderResponse = $orderBO->send($requestOrder,$environment);			

                var_dump($orderResponse);
            }
            else
            {
                echo 'Verify your Credentials';
            }
		} 
		catch (Exception $e) {
            var_dump($e);
			// Log Exception
		}
	}
	
	public function getClearsaleOrderStatus($orderId)
	{
		$environment = Config::CONFIG_ENVIRONMENT_SANDBOX;
		$authBO = new Clearsale_Total_Model_Auth_Business_Object();
		$authResponse = $authBO->login($environment);
		$orderBO = new Clearsale_Total_Model_Order_Business_Object();
		
		if($authResponse)
		{		
		    $requestOrder = new Clearsale_Total_Model_Order_Entity_Order();
		    $requestOrder->ApiKey =   Config::CONFIG_APIKEY;
		    $requestOrder->LoginToken = $authResponse->Token->Value;;
		    $requestOrder->AnalysisLocation = Config::CONFIG_ANALYSIS_LOCATION_USA;
		    $requestOrder->Orders = array();
		    $requestOrder->Orders[0] = $orderId;			
		    $ResponseOrder = $orderBO->get($requestOrder,$environment);		
		}
	}
	

}

?>
