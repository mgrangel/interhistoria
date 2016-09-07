<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post">
	<label>A</label>
    <input name="a" type="text" />
    <label>B</label>
    <input name="b" type="text" />
    
    <input name="" type="submit" value="Submit" />
</form>
</body>
</html>
<?php 
	ini_set( 'display_errors', 1 );
	if( isset( $_POST["a"] ) && isset( $_POST["b"] ) ){
	
		ini_set("soap.wsdl_cache_enabled", "0");
		$client = new SoapClient( "http://interhistoria.net/services/scramble.wsdl" );
		//$resultado = $client->sumar($_POST["a"],$_POST["b"]);
		//echo $resultado;
	}
?>