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
		
		$efisico .= "<br>"; $efisico .= "<div style='text-decoration:underline;'>Maniobras:</div>";
		$efisico .= elemSecForms( "maniobras", $form, $k, $frm_hist );
		$efisico .= "<br>"; $efisico .= "<div style='text-decoration:underline;'>Palpación:</div>";
		$efisico .= elemSecForms( "palpacion", $form, $k, $frm_hist );
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
/*	function plan( $form, $k, $frm_hist ){
		$info_plan = array();
		//Plan - RX
		$info_plan["rx"] = "";
		$rxelems = elemForms( 'rx', $form, $k, $frm_hist );
		$rxplan = "<b>Rayos X: </b>".$rxelems["linea"];
		if( $form["pl_rx"] == 1 ) $info_plan["rx"] = $rxplan;
		//Plan - EST
		$dplan = elemForms( 'pl', $form, $k, $frm_hist );
		$tplan = $dplan["linea"]."<br>"; $tplan .= $dplan["vertical"];
		$info_plan["est"] = $tplan;
		//Plan - LAB
		$labelems = elemForms( 'lab', $form, $k, $frm_hist );
		$labplan = "<b>Laboratorios: </b>"; $labplan .= $labelems["linea"];
		$info_plan["lab"] = $labplan;
		//Referencias
		$dref = elemForms( 'ref', $form, $k, $frm_hist );
		$tref = $dref["linea"]."<br>"; $tref .= $dref["vertical"];
		$info_plan["ref"] = $tref;
		//Amerita
		$dreq = elemForms( 'pro', $form, $k, $frm_hist );
		$treq = $dreq["linea"]."<br>"; $treq .= $dreq["vertical"];
		$dreq2 = elemForms( 'cir', $form, $k, $frm_hist );
		$treq2 = $dreq2["linea"]."<br>"; $treq2 .= $dreq2["vertical"];
		
		$info_plan["req"] = $treq.$treq2;
		
		return $info_plan;	
	}
*/	/* =======================================================================================================================*/
	// Bloques no incluidos en el informe
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
	function motivoHistoria( $nombre, $form, $k, $frm_hist ){
		
		$chmotivos = elemForms( 'mc', $form, $k, $frm_hist );
		$tmotivo = $chmotivos["linea"];
		$tmotivo .= $chmotivos["vertical"]."<br>";
		$tmotivo .= "Dolor:";
		$tmotivo .= elemsRangos( $form, $k, $frm_hist, 'dol' );
		
		return $tmotivo;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemSecForms( $block, $form, $keys, $dfile ){
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