<?php
	header('Content-type: application/json');
	
	echo "Esta es la respuesta del servidor:";
	echo file_get_contents('php://input');
?>
