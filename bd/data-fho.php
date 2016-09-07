<?php
	/* Interhistorias 2015 Conexión a base de datos - Formulario hombro */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	include( "bd.php" );
	/*-----------------------------------------------------------------------------------------------------------------------*/
	include( "data-forms.php" );
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function registrarHistoria( $sql, $link ){
		$result = mysql_query( $sql, $link );
		return mysql_insert_id();
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	if( isset( $_POST["form"] ) ){
		ini_set( 'display_errors', 1 );
		parse_str( $_POST["form"], $hist );
		//FB::log($hist,"array");
		$pairs = explode('&', $_POST["form"]);
		$dataform = obtenerDataForm( $pairs );
		$n = count( $dataform );
		$sql = hacerQuery( "frm_hombro", $dataform, $n );
		$idh = registrarHistoria( $sql, $dbh );
		echo $idh;
		//echo $sql;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
?>