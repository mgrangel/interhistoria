<?php
	/**
     * Interhistoria - Recepción de solicitudes de servicio
     * 
     * 
     */
	ini_set( 'display_errors', 1 );
	header('Content-type: application/json');
	/*--------------------------------------------------------------------------------------------------------*/
	include( "bd/dataws-usuario.php" );	
	include( "bd/dataws-paciente.php" );
	include( "bd/dataws-historia.php" );
	/*--------------------------------------------------------------------------------------------------------*/
	$metodo = strtolower( $_SERVER['REQUEST_METHOD'] );
	/*--------------------------------------------------------------------------------------------------------*/
	if ( isset($_GET['PATH_INFO']) )
    	$peticion = explode( '/', $_GET['PATH_INFO'] );
	/*--------------------------------------------------------------------------------------------------------*/
	if( $metodo == "post" ){
		
		$archivo_entrada = file_get_contents('php://input');
		$data_entrada = json_decode( $archivo_entrada, true );
		$data_s = $data_entrada["data"];
		
		$recurso = $peticion["0"];
		$servicio = $peticion["1"];
		
		if( $servicio == "inicio_sesion" ){
			$data_server = wsLogin( $data_s["username"], $data_s["password"] );
			$data_salida = json_encode( $data_server, JSON_UNESCAPED_UNICODE );
			
			echo $data_salida;	
		}
		
	}
	/*--------------------------------------------------------------------------------------------------------*/
	/*--------------------------------------------------------------------------------------------------------*/
	if( $metodo == "get" ){
		$recurso = $peticion["0"];
		$servicio = $peticion["1"];
		if( $recurso == "pacientes" ){
			if( $servicio == "registros"){
				$token_api = $_GET["token_api"];
				$data_server = wsObtenerRegistrosPacientesUsuario( $token_api );
				$data_salida = json_encode( $data_server, JSON_UNESCAPED_UNICODE );
				echo $data_salida;
			}
			/*...................................................................*/
			if( $servicio == "antecedentes"){
				$token_api = $_GET["token_api"];
				$ci = $_GET["cedula"];
				$data_server = wsObtenerRegistrosAntecedentesPaciente( $token_api, $ci );
				//print_r($data_server);
				$data_salida = json_encode( $data_server, JSON_UNESCAPED_UNICODE );
				echo $data_salida;
			}
			/*...................................................................*/
		}
		if( $recurso == "historias" ){
			if( $servicio == "registros"){
				$token_api = $_GET["token_api"];
				$ci = $_GET["cedula"];
				$data_server = wsObtenerRegistrosHistoriasPacientes( $token_api, $ci );
				$data_salida = json_encode( $data_server, JSON_UNESCAPED_UNICODE );
				echo $data_salida;
			}
			
		}
	}
	/*--------------------------------------------------------------------------------------------------------*/
?>