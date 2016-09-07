<?php
	/**
     * Interhistoria - Funciones para servicios de registros de historias médicas
     * 
     * 
     */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function getArrayDataField( $data, $frm ){
		$arreglo = array();
		while( $d = mysql_fetch_array( $data, MYSQL_ASSOC ) ){
			$d["nombre_frm"] = $frm; 
			$arreglo[] = $d;	
		}
		return $arreglo;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerRegistrosHistoriaFormulario( $dbh, $idu, $idp, $frm ){
		$sql = "select * from $frm where idPaciente = $idp";
		$data = mysql_query ( $sql, $dbh );
		$arr = getArrayDataField( $data, $frm );
		
		return $arr;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerRegistrosHistoriasMedicas( $dbh, $idu, $idp ){
		$reg_H = array();
		$lista_frm = array("frm_cadera_adulto", "frm_columna_cervical", "frm_columna_dorsal", "frm_columna_lumbar", "frm_rodilla");
		foreach( $lista_frm as $frm ){
			$reg_H[] = obtenerRegistrosHistoriaFormulario( $dbh, $idu, $idp, $frm, $reg_H );
		}
		return $reg_H;
	}
	/*--------------------------------------------------------------------------------------------------------*/
	function wsObtenerRegistrosHistoriasPacientes( $token_api, $ci ){
		include( "bdws.php" );
		$idu = $idp = 0;
		$data_r = formatDataRespuesta( -1, "Error en respuesta", NULL );
		
		$idu = obtenerIdUsuarioToken( $dbh, $token_api );
		if( $idu != 0 )
			$idp = obtenerIdPacienteUsuario( $dbh, $idu, $ci );
		
		if( ( $idp > 0 ) && ( $idu > 0 ) ){
			$data_r = formatDataRespuesta( 1, "Datos encontrados", obtenerRegistrosHistoriasMedicas( $dbh, $idu, $idp ) );
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