<?php
	/* Interhistorias 2015 Conexión a base de datos - Formulario pie tobillo */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	include( "bd.php" );
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function registrarHistoria( $sql, $link ){
		$result = mysql_query( $sql, $link );
		return mysql_insert_id();
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function getQueryBD( $form ){
		
		include( "data-forms.php" );
		parse_str( $_POST["form"], $hist );
		//FB::log($hist,"array");
		$pairs = explode('&', $_POST["form"]);
		$dataform = obtenerDataForm( $pairs );
		$n = count( $dataform );
		$sql = hacerQuery( "frm_pie_tobillo", $dataform, $n );
		
		return $sql;
	}
	
	if( isset( $_POST["form"] ) ){
		ini_set( 'display_errors', 1 );
		$form = $_POST["form"];
		$sql = getQueryBD( $form );
		//echo $sql;
		$idh = registrarHistoria( $sql, $dbh );
		echo $idh;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
?>