<?php
	/* Interhistorias 2015 - Funciones obtención información para informes autogenerados */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function mlesion( $form, $k, $frm_hist ){
		$mlesion = elemForms( "ml", $form, $k, $frm_hist );
		return $mlesion["linea"];	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function efisico( $form, $k, $frm_hist ){
		$inspeccion = elemForms( "ins", $form, $k, $frm_hist );
		$efisico = "<div style='text-decoration:underline;'>Inspección:</div>";
		$efisico .= $inspeccion["linea"];
		$efisico .= "<br>"; $efisico .= $inspeccion["vertical"];
		$ra = elemFormsLista( 'ra', $form, $k, $frm_hist );
		$rp = elemFormsLista( 'rp', $form, $k, $frm_hist );
		
		if( $ra != "" ) { $efisico .= "<div style='text-decoration:underline;'>Rangos Activos:</div>"; $efisico .= $ra; }
		if( $rp != "" ) { $efisico .= "<div style='text-decoration:underline;'>Rangos Pasivos:</div>"; $efisico .= $rp; }
		
		$efisico .= "<br>"; $efisico .= exMiembros( $form, $k, $frm_hist );	
		$efisico .= "<div style='text-decoration:underline;'>Maniobras:</div>";	
		$efisico .= elemSecForms( "maniobras", $form, $k, $frm_hist );
		
		$data_pal = elemSecForms( "palpacion", $form, $k, $frm_hist );
		if( $data_pal != "" ){
			$efisico .= "<div style='text-decoration:underline;'>Palpación:</div>";
			$efisico .= $data_pal;
		}
		$txefisico = elemForms( "ef", $form, $k, $frm_hist );
		$efisico .= $txefisico["linea"];
		$efisico .= "<br>"; $efisico .= $txefisico["vertical"];
		
		return $efisico;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function estudios( $form, $keys, $frm_hist ){
		$testudios = elemFormsLista( 'es', $form, $keys, $frm_hist );
		return $testudios;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function impDiag( $form, $k, $frm_hist ){
		$tidx = elemForms( "id", $form, $k, $frm_hist );
		$idx = $tidx["linea"]; 
		$idx .= "<br>"; $idx .= $tidx["vertical"];
		return $idx;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	/* =======================================================================================================================*/
	// Bloques no incluidos en el informe
	function elemsRangos( $form, $k, $frm_hist, $pre ){
		$telems = "";
		$delems = elemForms( $pre, $form, $k, $frm_hist );
		if( $delems["linea"] != "" )
			$telems = $delems["linea"]."<br>"; 
		if( $delems["vertical"] != "" ) 
			$telems .= $delems["vertical"]."<br>";
		
		return $telems;		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function motivoHistoria( $nombre, $form, $k, $frm_hist ){
		
		$chmotivos = elemForms( 'mc', $form, $k, $frm_hist );
		$tmotivo = $chmotivos["linea"];
		$tmotivo .= $chmotivos["vertical"]."<br>";
		$tmotivo .= "Dolor:";
		$tmotivo .= elemsRangos( $form, $k, $frm_hist, 'dol' );
		
		return $tmotivo;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	// Examen miembros ( Dermatomas )
	function exMiembros( $form, $keys, $frm_hist ){
		
		$dti = elemsRangos( $form, $keys, $frm_hist, 'dtid' );
		$dtd = elemsRangos( $form, $keys, $frm_hist, 'dtdd' );
		
		$exmiembros = "";
		if( $dti != "" ) { $exmiembros .= "<br><div>Dermatomas lado izquierdo</div>"; $exmiembros .= $dti; }
		if( $dtd != "" ) { $exmiembros .= "<br><div>Dermatomas lado derecho</div>"; $exmiembros .= $dtd; }
		
		return $exmiembros;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemSecForms( $block, $form, $keys, $dfile ){
		if( $block == "exfuncional" ) 
			return elemsRangos( $form, $keys, $dfile, 'efn' );
		if( $block == "exfisico" ) 
			return efisico( $form, $keys, $dfile );
		if( $block == "maniobras" ) 
			return elemFormsLista( 'man', $form, $keys, $dfile );
		if( $block == "idx" ) 
			return elemFormsLista( 'id', $form, $keys, $dfile );
		if( $block == "exmiembros" ) 
			return exMiembros( $form, $keys, $dfile );
		if( $block == "palpacion" ) 
			return elemsRangos( $form, $keys, $dfile, 'pal' );
	}
?>