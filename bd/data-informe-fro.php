<?php
	/* Interhistorias 2015 - Funciones obtención información para informes autogenerados */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	/*function elemForms( $pre, $form, $k, $frm_hist ){
		$comma = ",";
		$items_vertical = ""; $linea = ""; $comma = ", ";
		//echo $pre."<br>";
		for( $i = 0; $i < sizeof($form)/2; $i++ ){
			$sep = explode( '_', $k[$i] );
			if( $sep[0] == $pre ){
				//echo $pre." - ".$i."<br>";
				if( $form[$i] == 1 && $k[$i] != "dolor" ){ $linea .= $frm_hist[$k[$i]].$comma; }
				else{ 
					if(( $form[$i] != "" ) && ( $pre != "dtid" ) && ( $pre != "dtdd" ))
						$items_vertical .= $frm_hist[$k[$i]].": ".$form[$i]."<br>"; 
				}
			}
		}
		$info["linea"] = $linea;
		$info["vertical"] = $items_vertical;
		return $info;
	}*/
	/*-----------------------------------------------------------------------------------------------------------------------*/
	/*function motivo( $nombre, $form, $k, $frm_hist ){
		$chmotivos = elemForms( "mc", $form, $k, $frm_hist );
		$dolor = "";
		if( $form["dolor"] == 1 ){
			$vide = $form["dol_inidesencad"]; $virra = $form["dol_irrad"]; 
			$vaso = $form["dol_asoc"]; $vtha = $form["dol_tha"]; 
			$vexa = $form["dol_exa"]; $vate = $form["dol_aten"];
			
			if( !empty($form["dol_inidesencad"]) ){ $ide = " que inicia posterior a $vide";} else $ide = "";
			if( !empty($form["dol_irrad"]) ) { $irra = " irradiado a $virra, $vtha";} else $irra = "";
			if( !empty($form["dol_asoc"]) ) { $aso = " asociado a $vaso"; } else $aso = "";
			if( !empty($form["dol_exa"]) ) { $exa = " exacerbado con $vexa"; } else $exa = "";
			if( !empty($form["dol_aten"]) ) { $aten = ", que calma con $vate"; } else $aten = "";
			
			$dolor = "dolor en $form[dol_sitio] de $nombre $form[lado], $ide de caracter $form[dol_cartipo]$irra$aso$exa$aten, 
			descrito como de intensidad $form[dol_sever] en $nombre $form[lado]";
		}
		$tmotivo = $chmotivos["linea"].$dolor;
		return $tmotivo;
	}*/
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
	/* =======================================================================================================================*/
	// Bloques no incluidos en el informe
	function elemsRangos( $form, $k, $frm_hist, $pre ){
		$delems = elemForms( $pre, $form, $k, $frm_hist );
		if( $delems["linea"] != "" ) $br = "<br>"; else $br = "";
		$telems = $delems["linea"].$br; $telems .= $delems["vertical"]."<br>";
		return $telems;		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function motivoHistoria( $nombre, $form, $k, $frm_hist ){
		
		$chmotivos = elemForms( 'mc', $form, $k, $frm_hist );
		$tmotivo = $chmotivos["linea"];
		$tmotivo .= $chmotivos["vertical"]."<br>";
		$tmotivo .= "<div style='text-decoration:underline;'>Dolor:</div>";
		$tmotivo .= elemsRangos( $form, $k, $frm_hist, 'dol' );
		
		return $tmotivo;
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
	/*-----------------------------------------------------------------------------------------------------------------------*/
?>