<?php
// pass an otp as parameter using following function...
// $otp= rand(10000,99999);
function sendOTP($otp){
	// Account details
	//extra api key - REkI1jzUxMs-J3NWbsqdsMLSAm0fI09YQjHNkt7NMh
	$apiKey = urlencode('XFGJGkqNm/I-LQt86vFagmnNi4AxNyNBZHbFZKzFLZ');
	
	// Message details
	$numbers = array(7007998537, 8736977760);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode('Your OTP for KNIT MAC Registration is '.$otp);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	$responseArray = json_decode($response, true);
	echo $response;
}
?>