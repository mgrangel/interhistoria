<?php
	/* Interhistorias 2015 
	Conexión a base de datos */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	$sinfo = json_decode( file_get_contents( $_SERVER["DOCUMENT_ROOT"]."/bd/ihbd.json.dist" ), TRUE );
	/*-----------------------------------------------------------------------------------------------------------------------*/
	$servidor = $sinfo["host"];
	$usuariobd = $sinfo["user"];
	$passbd = $sinfo["password"];
	$basedatos = $sinfo["database"];
	//require_once($_SERVER['DOCUMENT_ROOT'].'/lib/FirePHPCore/fb.php');
	
	$dbh = mysql_connect ( $servidor, $usuariobd, $passbd ) or die('No se puede conectar a '.$servidor.": ". mysql_error());
	mysql_select_db ( $basedatos );
	mysql_query("SET NAMES 'utf8'");
	/*-----------------------------------------------------------------------------------------------------------------------*/
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function cambiaf_a_mysql( $fecha ){
		//Obtiene una fecha del formato dd/mm/YYYY al formato YYYY-mm-dd
		ereg("([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha ); 
		$lafecha = $mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
		return $lafecha; 
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerFechaConFormato($lnk, $fecha, $formato){
		$q = "Select DATE_FORMAT('$fecha','$formato') as fecha";
		$fdata = mysql_fetch_array( mysql_query ( $q, $lnk ) );
		return $fdata["fecha"];		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerFechaActual(){
		//Obtiene la fecha actual de acuerdo a la zona horaria especificada, retornándola en varios formatos
		date_default_timezone_set( "America/Caracas" ); 
		
		$hora_actual_f1 = date("g:i a");		// Formato mm:ss am/pm
		$fecha_actual_f1 = date("d/m/Y");		// formato d.m.a
		$hora_actual_f2 = date("G:i:s");		// Formato mm:ss ( 24 horas )
		$fecha_actual_f2 = date("Y-m-d");		// Formato aaaa-mm-dd
		
		$fecha_f1['fecha'] = $fecha_actual_f1;
		$fecha_f1['hora'] = $hora_actual_f1;
		$fecha_f2['fecha'] = $fecha_actual_f2;
		$fecha_f2['hora'] = $hora_actual_f2;
		$fecha["fecha_formato1"] = $fecha_f1;
		$fecha["fecha_formato2"] = $fecha_f2;
		
		return $fecha;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function formatDataRespuesta( $cod, $mensaje, $data ){
		$data_r["cod_resp"] = $cod;
		$data_r["mensaje"] = $mensaje;
		$data_r["data_resp"] = $data;
			
		return $data_r;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
?>