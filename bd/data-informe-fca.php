<?php
	/* Interhistorias 2015 - Funciones obtención información para informes autogenerados */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function mlesion( $form, $k, $frm_hist ){
		$mlesion = elemForms( "ml", $form, $k, $frm_hist );
		return $mlesion["linea"];	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function efisico( $form, $k, $frm_hist ){
		// Bloque examen físico
		/* Compuesto por: Inspección, Rangos, Maniobras, Palpación y elementos no agrupados de prefijo 'ef'
		 */
		$inspeccion = elemForms( "ins", $form, $k, $frm_hist );
		$efisico = "<div style='text-decoration:underline;'>Inspección:</div>";
		$efisico .= $inspeccion["linea"];
		$efisico .= "<br>"; $efisico .= $inspeccion["vertical"];
		$ra = elemFormsLista( 'ra', $form, $k, $frm_hist );
		$rp = elemFormsLista( 'rp', $form, $k, $frm_hist );
		
		if( $ra != "" ){ $efisico .= "<div style='text-decoration:underline;'>Rangos Activos:</div>"; $efisico .= $ra; }
		if( $rp != "" ){ $efisico .= "<div style='text-decoration:underline;'>Rangos Pasivos:</div>"; $efisico .= $rp; }
		
		$efisico .= "<br>"; 	
		$efisico .= "<div style='text-decoration:underline;'>Maniobras:</div>";	
		$efisico .= elemSecForms( "maniobras", $form, $k, $frm_hist );$efisico .= "<br>";
		$efisico .= "<div style='text-decoration:underline;'>Palpación:</div>";
		$efisico .= elemSecForms( "palpacion", $form, $k, $frm_hist );
		$txefisico = elemForms( "ef", $form, $k, $frm_hist );
		$efisico .= $txefisico["linea"];
		$efisico .= "<br>"; $efisico .= $txefisico["vertical"];
		
		return $efisico;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function estudios( $form, $k, $frm_hist ){
		$testudios = elemForms( "es", $form, $k, $frm_hist );
		return $testudios["vertical"];	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function impDiag( $form, $k, $frm_hist ){
		$tidx = elemForms( "id", $form, $k, $frm_hist );
		$idx = $tidx["linea"]; 
		$idx .= "<br><br>"; $idx .= $tidx["vertical"];
		return $idx;	
	}
	/* =======================================================================================================================*/
	// Bloques no incluidos en el informe
	function motivoHistoria( $nombre, $form, $k, $frm_hist ){
		//Sección motivos para historia médica
		$chmotivos = elemForms( 'mc', $form, $k, $frm_hist );
		$tmotivo = $chmotivos["linea"];
		$tmotivo .= $chmotivos["vertical"];
		$tmotivo .= "Dolor:";
		$tmotivo .= elemsRangos( $form, $k, $frm_hist, 'dol' );
		return $tmotivo;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemsRangos( $form, $k, $frm_hist, $pre ){
		$delems = elemForms( $pre, $form, $k, $frm_hist );
		$telems = $delems["linea"]."<br>"; $telems .= $delems["vertical"];
		return $telems;		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemSecForms( $block, $form, $keys, $dfile ){
		//Obtiene los elementos pertenecientes a una sección del informe
		if( $block == "exfuncional" ) 
			return elemsRangos( $form, $keys, $dfile, 'efn' );	
		if( $block == "exfisico" ) 
			return efisico( $form, $keys, $dfile );
		if( $block == "idx" ) 
			return elemFormsLista( 'id', $form, $keys, $dfile );
		if( $block == "maniobras" ) 
			return elemFormsLista( 'man', $form, $keys, $dfile );
		if( $block == "palpacion" ) 
			return elemsRangos( $form, $keys, $dfile, 'pal' );
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
?>