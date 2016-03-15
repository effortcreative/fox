<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
$apiKey = "AIzaSyCNg-Y92fYqTaL-RFzgwX8Hp7LTpTlEdbk";
$registrationIDs = array('$_POST["registrationId"]');
$message = "testing Process";
$url = 'https://android.googleapis.com/gcm/send';
$fields = array(
        'registration_ids'  => $registrationIDs,
        'data'              => array("message"=>$message),
        );
$headers = array( 
        'Authorization: key=' . $apiKey,
        'Content-Type: application/json'
        );
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt( $ch, CURLOPT_POST, true );
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($fields) );

$result = curl_exec($ch);
if(curl_errno($ch)){ echo 'Curl error: ' . curl_error($ch); }
curl_close($ch);
echo $result;

?>