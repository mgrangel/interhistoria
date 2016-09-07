<?php
	/* Interhistorias 2015 - Funciones obtención información para informes autogenerados */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function mlesion( $form, $k, $frm_hist ){
		$mlesion = elemForms( "ml", $form, $k, $frm_hist );
		return $mlesion["linea"];	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function efisico( $form, $k, $frm_hist ){
		$efisico = "";
		$inspeccion = elemForms( "ins", $form, $k, $frm_hist );
		
		if( $inspeccion["linea"] != "" ){
			$efisico = "<div style='text-decoration:underline;'>Inspección:</div>";
			$efisico .= $inspeccion["linea"];
			$efisico .= "<br>"; $efisico .= $inspeccion["vertical"];
		}
		$ra = elemFormsLista( 'ra', $form, $k, $frm_hist );
		$rp = elemFormsLista( 'rp', $form, $k, $frm_hist );
		
		if( $ra != "" ){ $efisico .= "<div style='text-decoration:underline;'>Rangos Activos:</div>"; $efisico .= $ra;}
		if( $rp != "" ){ $efisico .= "<div style='text-decoration:underline;'>Rangos Pasivos:</div>"; $efisico .= $rp;}
		
		$efisico .= "<br>"; $efisico .= exMiembros( $form, $k, $frm_hist );	
		
		$data_man = elemSecForms( "maniobras", $form, $k, $frm_hist );
		if( $data_man != "" ){
			$efisico .= "<div style='text-decoration:underline;'>Maniobras:</div>";
			$efisico .= $data_man;
		}
		$efisico .= "<br>"; $efisico .= "<div style='text-decoration:underline;'>Palpación:</div>";
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
		$chmotivos = elemForms( 'mc', $form, $k, $frm_hist );
		$tmotivo = $chmotivos["linea"];
		$tmotivo .= $chmotivos["vertical"];
		$tmotivo .= "Dolor:";
		$tmotivo .= elemsRangos( $form, $k, $frm_hist, 'dol' );
		return $tmotivo;	
	}
	// Examen miembros
	function exMiembros( $form, $keys, $frm_hist ){
		
		$tni = elemsRangos( $form, $keys, $frm_hist, 'mii' );
		$tnd = elemsRangos( $form, $keys, $frm_hist, 'mid' );
		$dti = elemsRangos( $form, $keys, $frm_hist, 'dtil' );
		$dtd = elemsRangos( $form, $keys, $frm_hist, 'dtdl' );
		$rfi = elemFormsLista( 'rfi', $form, $keys, $frm_hist );
		$rfd = elemFormsLista( 'rfd', $form, $keys, $frm_hist );
		$exmiembros = "<div style='text-decoration:underline'>Miembro inferior izquierdo</div>";
		$exmiembros .= $rfi;
		if( $tni != "" ) { $exmiembros .= "<br><div>Territorios nerviosos afectados</div>"; $exmiembros .= $tni; }
		if( $dti != "" ) { $exmiembros .= "<br><div>Dermatomas afectados</div>"; $exmiembros .= $dti; }
		
		$exmiembros .= "<br><div style='text-decoration:underline'>Miembro inferior derecho</div>";
		$exmiembros .= $rfd;
		if( $tnd != "" ) { $exmiembros .= "<br><div>Territorios nerviosos afectados</div>"; $exmiembros .= $tnd; }
		if( $dtd != "" ) { $exmiembros .= "<br><div>Dermatomas afectados</div>"; $exmiembros .= $dtd."<br>"; }
		return $exmiembros;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemsRangos( $form, $k, $frm_hist, $pre ){
		//TN, DT, Palpación, Dolor
		$telems = "";
		$delems = elemForms( $pre, $form, $k, $frm_hist );
		if( ( $delems["linea"] != "" ) || ( $delems["vertical"] != "" )){
			$telems = $delems["linea"]."<br>"; $telems .= $delems["vertical"];
		}
		return $telems;		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemSecForms( $block, $form, $keys, $dfile ){
		if( $block == "exfuncional" ) 
			return elemsRangos( $form, $keys, $dfile, 'efn' );	
		if( $block == "exmiembros" ) 
			return exMiembros( $form, $keys, $dfile );	
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