<?php

//API Url
//Servicio: inicio sesión
$url = 'http://api.interhistoria.net/usuario/inicio_sesion';
 
//The JSON data.
$jsonData = array(
	'data' => array(
		'username' => 'mikeven',
    	'password' => '1234'
	)
);
/* Servicio: inicio sesión*/ 

//Initiate cURL.
$ch = curl_init($url);
//Encode the array into JSON.
$jsonDataEncoded = json_encode( $jsonData );
 
//Tell cURL that we want to send a POST request.
curl_setopt( $ch, CURLOPT_POST, 1 );
 
//Attach our encoded JSON string to the POST fields.
curl_setopt( $ch, CURLOPT_POSTFIELDS, $jsonDataEncoded );
 
//Set the content type to application/json
curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ) ); 
 
//Execute the request
$result = curl_exec( $ch );
?>
