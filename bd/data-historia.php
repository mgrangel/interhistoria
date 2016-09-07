<?php
	/* Interhistorias 2015 - Funciones con formularios */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function fecha(){
		$fecha = obtenerFechaActual();
		//Construcción de la cadena del query con los campos de la tabla a llenar
		$f = $fecha["fecha_formato1"]["fecha"];
		$fecha = "Caracas, ".$f;
		return $fecha;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function motivoHistoria( $nombre, $form, $k, $frm_hist ){
		$chmotivos = elemForms( 'mc', $form, $k, $frm_hist );
		$tmotivo = $chmotivos["linea"];
		$tmotivo .= $chmotivos["vertical"];
		$tmotivo .= "Dolor:";
		$tmotivo .= elemsRangos( $form, $k, $frm_hist, 'dol' );
		return $tmotivo;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemFormsVertical( $ini, $fin, $form, $k, $frm_hist ){
		$elems = ""; $d0 = "<div>"; $d1 = "</div>";
		for( $i = $ini; $i <= $fin; $i++ ){
			if( $form[$i] == 1 && $k[$i] != "dolor" ){ $elems .= $d0.$frm_hist[$k[$i]].$d1; }
			else{ 
				if( $form[$i] != "" ) $elems .= $d0."".$frm_hist[$k[$i]]."".": ".$form[$i].$d1; 
			}	
		}
		return $elems;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemFormsLista( $pre, $form, $k, $frm_hist ){
		$elems = ""; $d0 = "<div>"; $d1 = "</div>";
		for( $i = 0; $i < sizeof($form)/2; $i++ ){
			$sep = explode( '_', $k[$i] );
			if( $sep[0] == $pre ){
				if( $form[$i] == 1 ){ $elems .= $d0.$frm_hist[$k[$i]].$d1; }
				else{ 
					if( $form[$i] != "" ) $elems .= $d0."".$frm_hist[$k[$i]]."".": ".$form[$i].$d1; 
				}
			}
		}
		return $elems;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemsCheck( $pre, $form, $k, $frm_hist, $filtro  ){
		//	Obtiene elementos del formualrio marcados con checks
		$elems = array();
		for( $i = 0; $i < sizeof($form)/2; $i++ ){
			$sep = explode( '_', $k[$i] );
			if( ( $sep[0] == $pre ) && ( !in_array( $k[$i], $filtro )) ){
				if( $form[$i] == 1 ){ $elems[] = $frm_hist[$k[$i]]; }
				else{ 
					if( $form[$i] != "" ) $elems[] = $form[$i]; 
				}
			}
		}
		return $elems;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function filtrarCamposNumericos( $keys ){
		//	Devuelve el arreglo con los campos sin incluir los numéricos
		$claves = array();
		for( $i = 0; $i < count( $keys ); $i++ ) if( !is_numeric( $keys[$i] )  ) $claves[] = $keys[$i];
		return $claves;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerValoresPositivos( $dmotivo ){
		$dpositivos = array();
		for( $x = 0; $x < count( $dmotivo ); $x++ ){
			$d = $dmotivo[$x];
			if( $d["v"] == 1 )
				$dpositivos[] = $d["f"];	
		}
		return $dpositivos;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function seccionMotivo( $duplas, $clave_valor, $nform ){
		$tmotivo = escribirMotivo( $dfile["nombre"], $clave_valor, obtenerValoresPositivos( $duplas ) );	
		return $tmotivo;		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	/* Informe autogenerado */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function tiempo( $dform ){
		$txtd = "";
		$cant = $dform["dur_sin"];
		switch ( $dform["rb_ds"] ) {
			case "dur_d": $txtd = "días de evolución"; break;
			case "dur_s": $txtd = "semanas de evolución"; break;
			case "dur_m": $txtd = "meses de evolución"; break;
			case "dur_ld": $txtd = "larga data"; $cant = ""; break;
		}
		$tmp = $cant." ".$txtd;
		return $tmp;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
?>