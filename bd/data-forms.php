<?php
	/* Interhistorias 2015 - Funciones con formularios */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	$tforms = array( 
		"frm_rodilla", "frm_hombro", "frm_columna_lumbar", "frm_columna_cervical", "frm_columna_dorsal", 
		"frm_cadera_adulto", "frm_pie_tobillo", "frm_codo" 
	);
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function tituloForm( $form, $subt ){
		//Devuelve el título de un formulario
		$st = "";
		if ( $subt == "izquierdo" ) $st = "izquierdo"; if ( $subt == "derecho" ) $st = "derecho";
		$nhist = array( 
			"frm_pie_tobillo" => "Pie-Tobillo $st",
			"frm_cadera_adulto" => "Cadera del adulto", 
			"frm_columna_cervical" => "Columna Cervical",
			"frm_columna_lumbar" => "Columna Lumbar",
			"frm_columna_dorsal" => "Columna Dorsal",
			"frm_codo" => "Codo",
			"frm_hombro" => "Hombro",
			"frm_rodilla" => "Rodilla"
		);
		return $nhist[$form];
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function archivoCargaFormulario( $form ){
		//Asocia el nombre de formulario con el archivo correspondiente
		$narchivo = array( 
			"frm_pie_tobillo" => "formulario-pies-tobillos.php",
			"frm_cadera_adulto" => "formulario-cadera-adulto.php", 
			"frm_columna_cervical" => "formulario-columna-cervical.php",
			"frm_columna_lumbar" => "formulario-columna-lumbar.php",
			"frm_columna_dorsal" => "formulario-columna-dorsal.php",
			"frm_codo" => "formulario-codo.php",
			"frm_hombro" => "formulario-hombro.php",
			"frm_rodilla" => "formulario-rodilla.php"
		);
		return $narchivo[$form];
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function esParamFormValido( $nf, $tforms ){
		//Verifica si el nombre de un formulario está nomenclado en el formato frm_nombre ( parámetro GET en historias e informes )
		if( in_array( $nf, $tforms ) )
			return true; else return false;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function fieldscoma( $campos, $n ){
		//Construcción de la cadena del query con los campos de la tabla a llenar
		$list = "";
		$cont = 0;
		foreach($campos as $par){
			$cont++;
			if( $cont == $n ) $comma = ""; else $comma = ", ";
			//if( $par["f"] != "rb_ds" )
				$list .= $par["f"].$comma;
		}
		return $list;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerEnlacesNuevoForm( $tforms ){
		$dlinktforms = array();
		foreach( $tforms as $tf ){
			$dlf["lnk"] = archivoCargaFormulario( $tf );
			$dlf["tit"] = tituloForm( $tf, "" );
			$dlinktforms[] = $dlf;
		}
		return $dlinktforms;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function ajustarValor( $val ){
		switch ( $val ) {
			case "on":
				$valor = 1;
				break;
			case "NOW()":
				$valor = $val;
				break;
			default:
       			$valor = "'".$val."'";
		}
		return $valor;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function valuescoma( $campos, $n ){
		//Construcción de la cadena del query con los valores de los campos a llenar
		$vlist = ""; $val = "";
		$cont = 0;
		foreach( $campos as $par ){
			$cont++;
			if( $cont == $n ) $comma = ""; else $comma = ", ";
			$val = ajustarValor( $par["v"] );
			$vlist .= $val.$comma;
		}
		return $vlist;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function ajustarCampoDurSin( $vector ){
		$pos = 0;
		foreach( $vector as $par ){
			if( $par["f"] == "rb_ds") $tmp = $par["v"];
			if( $par["f"] == "dur_sin") $par["v"] = $par["v"]." ".$tmp;
			$vector[$pos] = $par;
			$pos++; 
		}
		return $vector; 
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function filtrarCampo( $campo ){
		//Excluye los campos del formulario que no se guardan en la base de datos. Se identifican con un prefijo x_
		//También excluye los campos generados por los controles circulares deslizantes
		$prefijo = "x_";
		$filtrado = false;
		$campos_filt = array("rs_flex_ext", "rs_rot", "rs_lat", "rs_flex_ext_p", "rs_rot_p", "rs_lat_der", "rs_lat_p",
							"rs_lcuad", "rs_rotinex", "rs_rotinex_p", "rs_abdad", "rs_abdad_p", "rs_dorfp", "rs_supr", "rs_flexd", 
							"rs_abadp", "rs_abadd", "rs_dorfp_p", "rs_supr_p", "rs_flexd_p", "rs_abadp_p", "rs_abadd_p", 
							"drs_dorfp", "drs_supr", "drs_flexd", "drs_abadp", "drs_abadd", "drs_dorfp_p", "drs_supr_p", "drs_flexd_p", 
							"drs_abadp_p", "drs_abadd_p", "rs_supron", "rs_supron_p", "rs_ef_valgo", "rs_ef_varo");
		
		if( ( substr( $campo, 0, 2 ) == $prefijo ) || ( in_array( $campo, $campos_filt ) ) )
			$filtrado = true;
		
		return $filtrado;		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function insertarFecha( $dataform ){
		$par["f"] = "fecha_r";
		$par["v"] = "NOW()";
		$dataform[] = $par;
		return $dataform;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function numitems( $vector ){
		$porciones = explode(",", $vector);
		return count( $porciones );		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function hacerQuery( $tname, $dataform, $n ){
		//Construye el query para insertar un registro en una tabla ( INSERT )
		
		$sql = "insert into $tname (";
		$flist = fieldscoma( $dataform, $n );
		$sql .= $flist;
		
		$sql .= " ) values ( ";
		$vlist = valuescoma( $dataform, $n );
		 
		$sql .= $vlist;
		$sql .= ")";
		return $sql;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function fieldscomaUpdate( $campos, $n, $idIndexes ){
		//	Construcción de la cadena del query con los campos de la tabla a actualizar 
		//	campo = valor, campo = valor, ..., campo = valor
		$list = "";
		$cont = 0;
		foreach( $campos as $par ){
			$cont++;
		  if( !in_array( $par["f"], $idIndexes ) ){
				if( $cont == $n ) $comma = ""; else $comma = ", ";
				$valor = ajustarValor( $par['v'] );				
				$list .= $par["f"]."=".$valor.$comma;
			}
		}
		return $list;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function resetCampos( $campos, $n, $idIndexes ){
		//Construcción de la cadena del query con los campos de la tabla a llenar
		$list = "";
		$cont = 0;
		foreach( $campos as $par ){
			$cont++;
			if( !in_array( $par["f"], $idIndexes ) ){
				if( $cont == $n ) $comma = ""; else $comma = ", ";
				$list .= $par["f"]."=0".$comma;
			}
		}
		return $list;	
	}
	
	function obtenerIndexActualizacion( $campos, $index ){
		//	Obtiene el valor de un campo dado el nombre del campo. 
		//	Utilizado para ubicar el valor de clave foránea para realizar una consulta de actualización ( UPDATE )
		foreach( $campos as $par ){
			if( $par["f"] == $index ) $iact = $par["v"];
		}
		return $iact;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function hacerQueryActualizar( $tname, $dataform, $n, $idIndexes ){
		//Construye el query para actualizar un registro en una tabla ( UPDATE )
		
		$sql = "update $tname set ";
		$flist = fieldscomaUpdate( $dataform, $n, $idIndexes );
		$sql .= $flist;
		$sql .= " where ".$idIndexes[0]."=".obtenerIndexActualizacion( $dataform, $idIndexes[0] );
		
		return $sql;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerDataForm( $pairs ){
		$dataform = array();
		//	Obtiene los datos de un formulario en formato cadena de texto y los devuelve en arreglo por pares 
		/*	formato entrada: ( campo=valor ),( campo = valor ),...,( campo = valor )
		 *	formato salida: array( 'campo' => 'valor' ),( c'campo' => 'valor' ),...,( 'campo' => 'valor' )
		 *	Adicional se inserta fecha
		 */
		foreach ( $pairs as $i ) {
			list( $name, $value ) = explode( '=', $i, 2 );
			$par["f"] = urldecode( $name );
			$par["v"] = urldecode( $value );
			if( filtrarCampo( $par["f"] ) == false )
				$dataform[] = $par;
		}
		$dataform = insertarFecha( $dataform );
		return $dataform;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerDataFormAct( $pairs ){
		//	Obtiene los datos de un formulario en formato cadena de texto y los devuelve en arreglo por pares 
		/*	formato entrada: ( campo=valor ),( campo = valor ),...,( campo = valor )
		 *	formato salida: array( 'campo' => 'valor' ),( c'campo' => 'valor' ),...,( 'campo' => 'valor' )
		 */
		$dataform = array();
		
		foreach ( $pairs as $i ) {
			list( $name, $value ) = explode( '=', $i, 2 );
			$par["f"] = urldecode( $name );
			$par["v"] = urldecode( $value );
			if( filtrarCampo( $par["f"] ) == false )
				$dataform[] = $par;
		}
		return $dataform;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function prnt_frm_keys( $keys ){
		$u = 0;	
		foreach( $keys as $k ){
			echo "'$k' => '',<br>"; $u++;
		}
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerRegistroForm( $link, $idf, $nform ){
		//Obtiene el registro de la historia dado el nombre e id ( idf, frm_nombre )
		$q = "select * from $nform where idForm = $idf";
		if( $nform == NULL ) return NULL;
		$fdata = mysql_fetch_array( mysql_query ( $q, $link ) );	
		return $fdata;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerCamposTabla( $dbh, $tabla, $idtabla ){
		$q = "select * from $tabla where $idtabla = 1";
		$fdata = mysql_fetch_array( mysql_query ( $q, $dbh ) );
		$keys = array_keys( $fdata );
		
		return $keys;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
?>