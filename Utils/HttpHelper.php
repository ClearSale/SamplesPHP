<?php

include_once "HttpMessage.php";


class Clearsale_Total_Model_Utils_HttpHelper
{

	public function PostData($data, $url) {
		
		$return = new Clearsale_Total_Model_Utils_HttpMessage();
		
		$dataString = json_encode($data);
				
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($dataString))
		);

		$return->Body = curl_exec($ch);
		
		if(!$return) {
			die(curl_error($ch));
		}else
		{
			$return->HttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		}
		
		curl_close($ch);
		
		
		if($return->HttpCode == 200)
		{
			return json_decode($return->Body);
		}else
		{
		    #TODO: ErrorHandle	
            return json_decode($return->Body);
		}
	}


}