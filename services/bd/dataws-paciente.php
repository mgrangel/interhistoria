<?php
	/* Interhistorias 2015 Conexión a base de datos */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function getArrayData( $data ){
		$arreglo = array();
		while( $d = mysql_fetch_array( $data, MYSQL_ASSOC ) ){
			$arreglo[] = $d;	
		}
		return $arreglo;
	}
	/*--------------------------------------------------------------------------------------------------------*/
	function obtenerIdPacienteUsuario( $dbh, $idu, $ci ){
		$query = "select idPaciente from paciente where cedula = '$ci' and idUsuario = $idu";
		$data_paciente = mysql_fetch_array( mysql_query ( $query, $dbh ) );
		return $data_paciente["idPaciente"];			
	}
	/*--------------------------------------------------------------------------------------------------------*/
	function wsObtenerRegistrosPacientesUsuario( $token_api ){
		include( "bdws.php" );
		$idu = 0;
		$data_r = formatDataRespuesta( -1, "Error en respuesta", NULL );
		$idu = obtenerIdUsuarioToken( $dbh, $token_api );
		
		if( $idu > 0 ){
			$sql = "select * from paciente where idUsuario = $idu";
			$data = mysql_query ( $sql, $dbh );
			$arr = getArrayData( $data );
			if( count( $arr )  > 0 )
				$data_r = formatDataRespuesta( 1, "Datos encontrados", $arr );
			else
				$data_r = formatDataRespuesta( 0, "No se encontraron registros", $arr ); 
		}else{
			$data_r = formatDataRespuesta( -1, "Usuario no identificado", NULL );
		}
		
		return $data_r;
	}
	/*--------------------------------------------------------------------------------------------------------*/
	function wsObtenerRegistrosAntecedentesPaciente( $token_api, $ci ){
		include( "bdws.php" );
		$data_r = formatDataRespuesta( -1, "Error en respuesta", NULL );
		$idu = $idp = 0;
		$idu = obtenerIdUsuarioToken( $dbh, $token_api );
		if( $idu != 0 )
			$idp = obtenerIdPacienteUsuario( $dbh, $idu, $ci );
		
		if( ( $idp > 0 ) && ( $idu > 0 ) ){
			
			$sql = "select * from antecedente where idPaciente = $idp and idUsuario = $idu";
			$data = mysql_query ( $sql, $dbh );
			$arr = getArrayData( $data );
			if( count( $arr )  > 0 )
				$data_r = formatDataRespuesta( 1, "Datos encontrados", $arr );
			else
				$data_r = formatDataRespuesta( 0, "No se encontraron registros", $arr );
	
		}else{
			if( $idp == 0 )
			$data_r = formatDataRespuesta( -1, "Paciente no identificado", NULL );
			if( $idu == 0 )
			$data_r = formatDataRespuesta( -1, "Usuario no identificado", NULL );
		}
		
		return $data_r;	
	}
	/*--------------------------------------------------------------------------------------------------------*/
?>