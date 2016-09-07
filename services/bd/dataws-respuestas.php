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
	function formatDataRespuesta( $cod, $mensaje, $data ){
		$data_r["cod_resp"] = $cod;
		$data_r["mensaje"] = $mensaje;
		$data_r["data_resp"] = $data;
			
		return $data_r;
	}
	/*--------------------------------------------------------------------------------------------------------*/
?>