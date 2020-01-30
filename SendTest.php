<?php

include_once "Service.php";
include_once "Order/Entity/Library.php";
include_once "Utils/Config.php";

$paymentIndex = 0;
$date = date('c', strtotime("2015-01-31"));	

$clearsaleOrder = new Clearsale_Total_Model_Order_Entity_Order();
$clearsaleOrder->ID = "ORDER_ID_1";
$clearsaleOrder->IP = "192.168.0.1";
$clearsaleOrder->Currency = Config::CONFIG_CURRENCY_USA;
$clearsaleOrder->Date = $date;
$clearsaleOrder->Reanalysis = false;
$clearsaleOrder->Email = "integration@clearsale.com.br";
$clearsaleOrder->Origin = "web";
		
$clearsaleOrder->Payments[$paymentIndex] = new Clearsale_Total_Model_Order_Entity_Payment();
$clearsaleOrder->Payments[$paymentIndex]->Amount = number_format(floatval("100.50") , 2, ".", "");
$clearsaleOrder->Payments[$paymentIndex]->CardType = 3;
$clearsaleOrder->Payments[$paymentIndex]->Date = $date;	 
$clearsaleOrder->Payments[$paymentIndex]->CardBin =  "411111";
$clearsaleOrder->Payments[$paymentIndex]->CardEndNumber = "1111";
$clearsaleOrder->Payments[$paymentIndex]->CardHolderName = "John Smith";								
$clearsaleOrder->Payments[$paymentIndex]->PaymentTypeID = 1;	

$clearsaleOrder->BillingData = new Clearsale_Total_Model_Order_Entity_Person();
$clearsaleOrder->BillingData->ID = "1";
$clearsaleOrder->BillingData->Email = "integration@clearsale.com.br";
$clearsaleOrder->BillingData->Name = "John Smith";
$clearsaleOrder->BillingData->Type = 1;  
$clearsaleOrder->BillingData->Address->City = "MIAMI";
$clearsaleOrder->BillingData->Address->AddressLine1 = "201 S Biscayne"; 
$clearsaleOrder->BillingData->Address->AddressLine2 = "Suite 1200";
$clearsaleOrder->BillingData->Address->State = "FL";
$clearsaleOrder->BillingData->Address->ZipCode = "33131";
$clearsaleOrder->BillingData->Address->Country = "United States";
$clearsaleOrder->BillingData->Phones[0] = new Clearsale_Total_Model_Order_Entity_Phone();
$clearsaleOrder->BillingData->Phones[0]->AreaCode = "855";
$clearsaleOrder->BillingData->Phones[0]->Number = " 8553794611";
$clearsaleOrder->BillingData->Phones[0]->CountryCode = "1";            
$clearsaleOrder->BillingData->Phones[0]->Type = 1;

$clearsaleOrder->ShippingData = new Clearsale_Total_Model_Order_Entity_Person();
$clearsaleOrder->ShippingData->ID = "1";
$clearsaleOrder->ShippingData->Email = "integration@clearsale.com.br";
$clearsaleOrder->ShippingData->Name = "John Smith";
$clearsaleOrder->ShippingData->Type = 1;

$clearsaleOrder->ShippingData->Address->City = "MIAMI";
$clearsaleOrder->ShippingData->Address->AddressLine1 = "201 S Biscayne"; //Address Line1
$clearsaleOrder->ShippingData->Address->AddressLine2 = "Suite 1200";//Address Line2
$clearsaleOrder->ShippingData->Address->State = "FL";
$clearsaleOrder->ShippingData->Address->ZipCode = "33131";
$clearsaleOrder->ShippingData->Address->Country = "United States";
$clearsaleOrder->ShippingData->Phones[0] = new Clearsale_Total_Model_Order_Entity_Phone();
$clearsaleOrder->ShippingData->Phones[0]->AreaCode = "855";
$clearsaleOrder->ShippingData->Phones[0]->Number = " 8553794611";
$clearsaleOrder->ShippingData->Phones[0]->CountryCode = "1";            
$clearsaleOrder->ShippingData->Phones[0]->Type = 1;

$itemIndex = 0;
$TotalItems = 0;

//You can use a foreach when necessary
$clearsaleOrder->Items[$itemIndex] = new Clearsale_Total_Model_Order_Entity_Item();
$clearsaleOrder->Items[$itemIndex]->Price = "79.00";
$clearsaleOrder->Items[$itemIndex]->ProductId = "ICL1057";
$clearsaleOrder->Items[$itemIndex]->ProductTitle ="Dell Latitude D630 (Core 2 Duo 1.80GHz, 2GB RAM, 160GB Hard Drive)";
$clearsaleOrder->Items[$itemIndex]->Quantity = "3";
$clearsaleOrder->Items[$itemIndex]->Category = "Laptops";
$TotalItems = $clearsaleOrder->Items[$itemIndex]->Price;


$clearsaleOrder->TotalOrder  = number_format(floatval("100.50") , 2, ".", "");
$clearsaleOrder->TotalItems = $TotalItems;
$clearsaleOrder->TotalShipping =  number_format(floatval("21.50") , 2, ".", "");


$clearsaleOrder->CustomFields[0] = new Clearsale_Total_Model_Order_Entity_CustomField();
$clearsaleOrder->CustomFields[0]->Type = 1;
$clearsaleOrder->CustomFields[0]->Name = 'AVS_RESPONSE'; 
$clearsaleOrder->CustomFields[0]->Value =  'Y';

$clearsaleOrder->CustomFields[1] = new Clearsale_Total_Model_Order_Entity_CustomField();
$clearsaleOrder->CustomFields[1]->Type = 1;
$clearsaleOrder->CustomFields[1]->Name = 'CVV_RESULT_CODE';
$clearsaleOrder->CustomFields[1]->Value =  'Y';

$a = session_id();
if(empty($a)) session_start();

$clearsaleOrder->SessionID = session_id();

$service = new Clearsale_Total_Model_Service();
$service->sendOrder($clearsaleOrder);

