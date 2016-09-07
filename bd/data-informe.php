<?php
	/* Interhistorias 2015 - Funciones con formularios */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function fecha(){
		//Bloque de fecha del informe
		$ciudad = "Caracas";
		$fecha = obtenerFechaActual();
		$f = $fecha["fecha_formato1"]["fecha"];
		$fecha = "$ciudad, ".$f;
		return $fecha;	
	}
	function obtenerArchivoInforme( $nform ){
		//Retorna 3 arreglos con datos asociados a un nombre de informe: 
		/* Arreglo $files: archivo que contiene las funciones para generar la historia e informe de un formulario
 		 * Arreglo $nhist: nombre de historia médica
		 * Arreglo $vector_campos: vector  de etiquetas de los campos de la historia médica
		 */
		include( "data-campos.php" );
		$files = array( 	// Asociación de formulario con el archivo que maneja los datos de la historia e informe que le corresponde
			"frm_pie_tobillo" => "data-informe-fpt.php",
			"frm_cadera_adulto" => "data-informe-fca.php",
			"frm_columna_cervical" => "data-informe-fcc.php",
			"frm_columna_dorsal" => "data-informe-fcd.php",
			"frm_columna_lumbar" => "data-informe-fcl.php",
			"frm_codo" => "data-informe-fco.php",
			"frm_hombro" => "data-informe-fho.php",
			"frm_rodilla" => "data-informe-fro.php"
		);
		$nhist = array( 	// Nombre de historia
			"frm_pie_tobillo" => "tobillo",
			"frm_cadera_adulto" => "cadera", 
			"frm_columna_cervical" => "columna cervical",
			"frm_columna_dorsal" => "columna dorsal",
			"frm_columna_lumbar" => "columna lumbar",
			"frm_codo" => "codo",
			"frm_hombro" => "hombro",
			"frm_rodilla" => "rodilla"
		);
		$vector_campos = array(	// Asociación del formulario con el vector de etiquetas de campos para escribir la historia e informe médico
			"frm_pie_tobillo" => $frm_fpt,
			"frm_cadera_adulto" => $frm_fca,
			"frm_columna_cervical" => $frm_fcc,
			"frm_columna_dorsal" => $frm_fcd,
			"frm_columna_lumbar" => $frm_fcl,
			"frm_codo" => $frm_fco,
			"frm_hombro" => $frm_fho,
			"frm_rodilla" => $frm_fro	
		);
		
		$dform["nombre"] = $nhist[$nform];
		$dform["file"] = $files[$nform];
		$dform["fld_arr"] = $vector_campos[$nform];
		return $dform;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerUnidadElemento( $key, $pre, $val ){
		$und = "";
		$und_cm = array( "pal_trofismo", "pal_trofismo_d", "rfi_medreal", "rfd_medreal", "ef_medapai", 
		"ef_medapad", "ef_medmii", "ef_medmid", "pal_medmcv_izq", "pal_medmcv_der", "pal_medmca_izq", "pal_medmca_der" );
		
		$und_mm = array( "pal_kt1000", "pal_kt1000_d");
		$und_ang = array( "ins_valgo", "ins_varo", "ins_afick", "ins_angq" );
		
		if(  in_array( $key, $und_cm ) ) $und = "cm";
		if(  in_array( $key, $und_mm ) ) $und = "mm";
		
		if( ( $pre == "ra" || $pre == "rp" || in_array( $key, $und_ang )) && ( is_numeric( $val )) ) $und = "°";
		
		return $und;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerDivisorE_V( $key ){
		$dev = ":";
		if (( $key == "pal_trofismo" ) || ( $key == "pal_trofismo_d" )) $dev = "cm";
		if (( $key == "pal_kt1000" ) || ( $key == "pal_kt1000_d" )) $dev = "mm";
		
		return $dev;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function reemplazarUltimaCadena( $buscar, $remplazar, $texto ){
		//Reemplaza la última aparición de 
		$pos = strrpos($texto, $buscar);
		if($pos !== false){
			$texto = substr_replace( $texto, $remplazar, $pos, strlen($buscar) );
		}
		return $texto;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemForms( $pre, $form, $k, $frm_hist ){
		//Obtiene elementos del formulario dado por un perfijo para ser mostrados de forma horizontal y vertical
		/*	Elementos mostrados en forma horizontal separados por coma (,)
		 *	Elementos mostrados en forma vertical de la forma campo : valor
		 *	Los elementos horizontales y verticales están guardados de manera separada
		 */
		$items_vertical = ""; $linea = ""; $comma = ", "; $detq = ": "; $und = "";
		for( $i = 0; $i < sizeof($form)/2; $i++ ){
			$sep = explode( '_', $k[$i] ); 
			if( $sep[0] == $pre ){
				if( strval( $form[$i] ) == 1 && $k[$i] != "dolor" ){ $linea .= $frm_hist[$k[$i]].$comma; }
				else{ 
					if( $form[$i] != "" ){
						if ( $k[$i] == "ref_dr" ) $detq = "";
						$und = obtenerUnidadElemento( $k[$i], NULL, $form[$i] );
						$items_vertical .= $frm_hist[$k[$i]].$detq.$form[$i].$und."<br>";
					}
				}
			}
		}
		
		$info["linea"] = reemplazarUltimaCadena(",", " y ", substr( $linea, 0, -2 ));	//Suprime la última coma
		
		if( $pre == "mc" )$info["linea"] = $linea;
			
		$info["vertical"] = $items_vertical;
		return $info;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemFormsVertical( $ini, $fin, $form, $k, $frm_hist ){
		// Obtiene elementos del formulario dado por un prefijo para ser mostrado en forma de lista (vertical) de la forma campo : valor
		// sin formato
		$elems = ""; $d0 = "<div>"; $d1 = "</div>"; $detq = ": ";
		for( $i = $ini; $i <= $fin; $i++ ){
			if( strval( $form[$i] ) == 1 && $k[$i] != "dolor" ){ $elems .= $d0.$frm_hist[$k[$i]].$d1; }
			else{ 
				if( $form[$i] != "" ) $elems .= $d0."".$frm_hist[$k[$i]]."".$detq.$form[$i].$d1; 
			}	
		}
		return $elems;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemFormRefId( $pre, $form, $k, $frm_hist, $nombre ){
		// Obtiene elementos del formulario dado por un prefijo para ser mostrado en forma de lista (vertical) de la forma campo : valor
		// con un formato de acuerdo al prefijo
		 /*	id : Enumeradas
		  */
		$elems = ""; $d0 = "<div>"; $d1 = "</div>"; $detq = ": "; $lado = "";
		$num = 0;
		if( isset( $form["lado"] ) ) $lado = $form["lado"];
		$nform = "en ".$nombre." ".$lado;
		for( $i = 0; $i < sizeof($form)/2; $i++ ){
			$unid = "";
			$sep = explode( '_', $k[$i] );
			if( $sep[0] == $pre ){
				if( strval( $form[$i] ) == '1' ){ 
					if( $pre == "id" ) { $num++; $enum = $num.". "; } else $enum = ""; 
					$elems .= $d0.$enum.$frm_hist[$k[$i]]." ".$nform.$d1; 
				}
			}
		}
		return $elems;		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemFormsLista( $pre, $form, $k, $frm_hist ){
		// Obtiene elementos del formulario dado por un prefijo para ser mostrado en forma de lista (vertical) de la forma campo : valor
		// con un formato de acuerdo al prefijo
		/*	ra,rp : expresadas en grados (°) 
		 *	id : Enumeradas
		 *	Usado en prefijos: ra,rp,rfi,rfd 
		 */
		$elems = ""; $d0 = "<div>"; $d1 = "</div>"; $detq = ": ";
		$num = 0;
		for( $i = 0; $i < sizeof($form)/2; $i++ ){
			$unid = "";
			$sep = explode( '_', $k[$i] );
			if( $sep[0] == $pre ){
				if( strval( $form[$i] ) == '1' ){ 
					if( $pre == "id" ) { $num++; $enum = $num.". "; } else $enum = ""; 
					$elems .= $d0.$enum.$frm_hist[$k[$i]].$d1; 
				}
				else{ 
					if( $form[$i] != "" ) { 
						$und = obtenerUnidadElemento( $k[$i], $pre, $form[$i] );
						if( $pre == "id" ) { $num++; $enum = $num.". "; } else $enum = ""; 
						$elems .= $d0.$enum.$frm_hist[$k[$i]].$detq.$form[$i].$und.$d1; 
					} 
				}
			}
		}
		return $elems;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemsCheck( $pre, $form, $k, $frm_hist, $filtro  ){
		//Obtiene elementos del formulario que fueron guardados mediante CHECKS
		$elems = array();
		for( $i = 0; $i < sizeof($form)/2; $i++ ){
			$sep = explode( '_', $k[$i] );
			if( ( $sep[0] == $pre ) && ( !in_array( $k[$i], $filtro )) ){
				if( strval( $form[$i] ) == 1 ){ $elems[] = $frm_hist[$k[$i]]; }
				else{ 
					if( $form[$i] != "" ) $elems[] = $form[$i]; 
				}
			}
		}
		return $elems;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function filtrarCamposNumericos( $keys ){
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
		// Sección de redacción del informa para expresar tiempo de síntomas para el informe de historia médica.
		$txtd = ""; $tmp = "";
		$cant = $dform["dur_sin"];
		switch ( $dform["rb_ds"] ) {
			case "dur_d": $txtd = "días de evolución"; break;
			case "dur_s": $txtd = "semanas de evolución"; break;
			case "dur_m": $txtd = "meses de evolución"; break;
			case "dur_ld": $txtd = "larga data"; $cant = ""; break;
		}
		if( $cant != "" && $txtd != "")
			$tmp = " de ".$cant." ".$txtd;
		return $tmp;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function motivo( $nombre, $form, $k, $frm_hist ){
		//Generación bloque Motivo de Consulta y descripción de 'Dolor'
		$chmotivos = elemForms( "mc", $form, $k, $frm_hist );
		$dolor = "";
		/*Redacción dolor: 'dolor en [dol_sitio] de [nombre-form][lado] que inicia posterior a [dol_inidesencad] de caracter [dol_cartipo] 
		  irradiado a [dol_irrad] asociado a [dol_asoc], con patrón de [dol_tha] exacerbado con [dol_exa] que calma con [dol_aten], 
		  descrito como de intensidad [dol_sever]'*/
		  
		if( $form["dolor"] == 1 ){
			$vsit = $form["dol_sitio"]; $vdct = $form["dol_cartipo"];
			$vide = $form["dol_inidesencad"]; $virra = $form["dol_irrad"]; 
			$vaso = $form["dol_asoc"]; $vtha = $form["dol_tha"]; 
			$vexa = $form["dol_exa"]; $vate = $form["dol_aten"];
			$vdsev = $form["dol_sever"]; 
			if( isset($form["lado"]) ) $lado = $form["lado"]; else $lado = "";
			
			if( !empty($form["dol_sitio"]) )		{ $dolsitio = "en $vsit,"; } else $dolsitio = "";
			if( !empty($form["dol_inidesencad"]) )	{ $ide = " que inicia posterior a $vide";} else $ide = "";
			if( !empty($form["dol_cartipo"]) )		{ $dct = " de caracter $vdct "; } else $dct = "";
			if( !empty($form["dol_irrad"]) ) 		{ $irra = " irradiado a $virra";} else $irra = "";
			if( !empty($form["dol_asoc"]) ) 		{ $aso = " asociado a $vaso"; } else $aso = "";
			if( !empty($form["dol_tha"]) )			{ $dtha = ",con patrón de $vtha"; } else $dtha = ""; 
			if( !empty($form["dol_exa"]) ) 			{ $exa = " exacerbado con $vexa"; } else $exa = "";
			if( !empty($form["dol_aten"]) ) 		{ $aten = ", que calma con $vate"; } else $aten = "";
			if( !empty($form["dol_sever"]) ) 		{ $dsev = ", descrito como de intensidad $vdsev"; } else $dsev = "";
			
			$dolor = "dolor $dolsitio$ide$dct$irra$aso$dtha$exa$aten$dsev "."en $nombre $lado";
		}
		$tmotivo = $chmotivos["linea"].$dolor;
		return $tmotivo;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function plan( $form, $k, $frm_hist ){
		// Bloque Plan del informe
		$info_plan = array();
		//Plan - RX
		$info_plan["rx"] = "";
		$rxelems = elemForms( 'rx', $form, $k, $frm_hist );
		
		$rxplan = "Rayos X: ".$rxelems["linea"];
		if( $rxelems["linea"] != "" ) { $info_plan["rx"] = $rxplan; }
		
		//Plan - EST-RX
		$dplan = elemForms( 'pl', $form, $k, $frm_hist );
		
		$tplan = "";
		if(( $dplan["linea"] != "" ) || ( $dplan["vertical"] != "" )){
			$tplan = $dplan["linea"]."<br>"; $tplan .= $dplan["vertical"];
		}
		$info_plan["est"] = $tplan.$info_plan["rx"];
		
		//Plan - LAB
		$labelems = elemForms( 'lab', $form, $k, $frm_hist );
		$labplan = "Laboratorios: "; $labplan .= $labelems["linea"];
		$info_plan["lab"] = $labplan;
		//Referencias
		$tref = "";
		$dref = elemForms( 'ref', $form, $k, $frm_hist );
		if(($dref["linea"] != "" ) || ( $dref["vertical"] != "" )){
			$tref = $dref["linea"]."<br>"; $tref .= $dref["vertical"];}
		$info_plan["ref"] = $tref;
		//Amerita 
		$treq = ""; $treq2 = "";
		$dreq = elemForms( 'pro', $form, $k, $frm_hist );
		if(( $dreq["linea"] != "" ) || ( $dreq["vertical"] != "" )){
			$treq = $dreq["linea"]."<br>"; $treq .= $dreq["vertical"];}
		
		$dreq2 = elemForms( 'cir', $form, $k, $frm_hist );
		if(($dreq2["linea"] != "" ) || ( $dreq2["vertical"] != "" )){
			$treq2 = $dreq2["linea"]."<br>"; $treq2 .= $dreq2["vertical"];}
		
		$info_plan["req"] = $treq.$treq2;
		
		return $info_plan;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function elemsRef( $form, $keys, $dfile ){
		//	Obtiene los elementos del formulario de la sección Referencias (ref)
		$filtro = array( /*"ref_dr", "ref_preoper"*/ );
		return elemsCheck( "ref", $form, $keys, $dfile, $filtro );
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function tieneElementosEnHistoria( $pre, $hist ){
		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function informeRegistrado( $dbh, $idf, $nform ){
		//Chequea si existe un informe registrado en la base de datos dado por un id y nombre de formulario
		$registrado = false;
		$q = "select idInforme, nombre_form, IdFormulario, IdPaciente, IdUsuario, contenido 
				from informe where nombre_form = '$nform' and IdFormulario = $idf";
		
		$data = mysql_query ( $q, $dbh );
		$valdata = mysql_fetch_array( $data );
		$nrows = mysql_num_rows( $data );
		if ( $nrows > 0 ) $registrado = true;
		
		$resultado["reg"] = $registrado;
		$resultado["data"] = $valdata;
		
		return $resultado; 
	} 
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function enviarEmail( $nform, $idf, $fecha, $paciente ){
		
		include( "data-forms.php" );
		session_start();
		ini_set( 'display_errors', 1 );
		$email = $_SESSION["user"]["email"];
		$nhist = tituloForm( $nform, '' );
		$url = "http://interhistoria.net/pages/informe.php?nf=$nform&f=$idf";
		$asunto = "Informe de historia médica";
		
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$cabeceras .= 'From: Interhistoria <admin@interhistoria.net>' . "\r\n";
		
		$cuerpo_mensaje = file_get_contents( "email_informe.html" );
		$cuerpo_mensaje = str_replace( "{paciente}", $paciente["nombre"]." ".$paciente["apellido"], $cuerpo_mensaje );
		$cuerpo_mensaje = str_replace( "{url}", $url, $cuerpo_mensaje );
		$cuerpo_mensaje = str_replace( "{formulario}", $nhist, $cuerpo_mensaje );
		$cuerpo_mensaje = str_replace( "{fecha}", $fecha, $cuerpo_mensaje );
		
		$res = mail( $email, $asunto, $cuerpo_mensaje, $cabeceras );
		return $res;			
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function actualizarInforme( $dbh, $idi, $contenido ){
		//Actualización de informe médico ya registrado
		$cont = utf8_decode( $contenido );
		$q = "update informe set contenido = '$cont' where idInforme = $idi";
		$Rs = mysql_query ( $q, $dbh );
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function registrarInforme( $dbh, $informe, $paciente, $idu, $enviomail ){
		//Registra informe médico en caso de no estar en base de datos.
		$ir = informeRegistrado( $dbh, $informe["idf"], $informe["nform"] );
		$icontenido = utf8_encode( $informe["contenido"] );
		if( $ir["reg"] == false ){
			$sql = "insert into informe ( nombre_form, IdFormulario, IdPaciente, IdUsuario, contenido ) 
						values ( '$informe[nform]', $informe[idf], $paciente[id], $idu, '$icontenido' )";
			$Rs = mysql_query ( $sql, $dbh );
		}
		else
			actualizarInforme( $dbh, $ir["data"]["idInforme"], $icontenido );		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerDireccionesEmail( $dir_email ){
		return explode( ",", $dir_email );			
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function enviarInformeEmail( $email, $informe, $archivo ){
		//Envío de mensaje por correo con el informe médico como archivo adjunto
		ini_set( 'display_errors', 1 );
		include( "data-forms.php" );
		include( "PHPMailer-master/PHPMailerAutoload.php" );
		
        $mail = new phpmailer();
		$mail->IsSMTP();
		$nhist = tituloForm( $informe["nform"], '' );
		//$mail->Host = "192.168.100.8";
		$mail->IsSendmail();
		$mail->From = "info@interhistoria.net";
		$mail->FromName = "Interhistorias";
		
		$list_addresses = obtenerDireccionesEmail( $_POST["dir_correo"] );
		foreach( $list_addresses as $email ){	//
			$mail->AddAddress( $email );
		}
		
		$mail->AddReplyTo( "info@interhistoria.net","Mensajero Interhistorias" );
		$mail->AddAttachment( $archivo );
		$mail->IsHTML( true );
		$cuerpo_mensaje = file_get_contents( "email_informe.html" );
		$cuerpo_mensaje = str_replace( "{paciente}", $informe["paciente"]["nombre"]." ".$informe["paciente"]["apellido"], $cuerpo_mensaje );
		$cuerpo_mensaje = str_replace( "{formulario}", $nhist, $cuerpo_mensaje );
		$cuerpo_mensaje = str_replace( "{fecha}", $informe["fecha"], $cuerpo_mensaje );
		$mail->Subject = utf8_encode( "Informe historia paciente" );
		$mail->Body = $cuerpo_mensaje;
		$mail->AltBody = '';
		if( !$mail->Send() ){
			echo "El mensaje no se pudo enviar. <p>";
			echo "Mailer Error: " . $mail->ErrorInfo;
			exit;
		}
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function moverArchivo( $archivo ){
		//Guarda un archivo en una ubicación determinada
		$dest = "../informes/".$archivo;
		copy( $archivo, $dest );
		unlink( $archivo );
		return $dest;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function generarPDF( $informe ){
		// Generación de archivo PDF con el informe médico
		ob_start();
		echo $informe["contenido"];     
        require_once("dompdf/dompdf_config.inc.php");
        $dompdf = new DOMPDF();
        $dompdf->load_html(ob_get_clean());
        $dompdf->render();
        $pdf = $dompdf->output();
        $npaciente = $informe["idf"]."_".$informe["paciente"]["nombre"]."_".$informe["paciente"]["apellido"];
		$nombre_archivo = $informe["nform"].$npaciente.".pdf";
        file_put_contents( $nombre_archivo, $pdf );
		$filetosend = moverArchivo( $nombre_archivo );
		return $filetosend;
        //$dompdf->stream($filename);
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	if( isset( $_POST["input1"] ) ){
		//Recepción y manejo de datos contenidos en el editor de texto del informe médico
		$enviomail = false;
		ini_set( 'display_errors', 1 );
		include( "data-paciente.php" );
		
		$paciente = obtenerPacienteId( $dbh, $_POST["idp"] );
		$informe["idf"] = $_POST["idf"];
		$informe["idp"] = $_POST["idp"];
		$email = $_POST["dir_correo"];
		$informe["nform"] = $_POST["nform"];
		$informe["fecha"] = $_POST["fecha"];
		$informe["paciente"] = $paciente;
		$informe["contenido"] = $_POST["input1"];
		$idf = $informe["idf"]; $nform = $informe["nform"];
		
		if( isset( $_POST["enviomail"] ) ) $enviomail = true;
		$arch = generarPDF( $informe );
		
		$lnk = "../pages/historia.php?f=$idf&nf=$nform";
		//registrarInforme( $dbh, $informe, $paciente, $_POST["idu"], $enviomail );
		$arch = generarPDF( $informe );
		
		if( $enviomail == true ) 
			enviarInformeEmail( $email, $informe, $arch );
		
		echo "<script>window.location.href='$lnk'</script>";
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
?>