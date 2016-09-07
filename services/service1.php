<?php

// Include confi.php
include_once('confi.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	$name = isset($_POST['name']) ? mysql_real_escape_string($_POST['name']) : "";
	$email = isset($_POST['email']) ? mysql_real_escape_string($_POST['email']) : "";
	$password = isset($_POST['pwd']) ? mysql_real_escape_string($_POST['pwd']) : "";
	$status = isset($_POST['status']) ? mysql_real_escape_string($_POST['status']) : "";
	
	$json = array( "status" => 1, "msg" => "Access Granted" );
	
	if( $_POST['name'] != "Miguel" )
		$json = array( "status" => 0, "msg" => "Not authorized" );
	if( $_POST['pwd'] != "5501" )
		$json = array( "status" => 0, "msg" => "Wrong password", "val" => $password );
}

/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);

?>