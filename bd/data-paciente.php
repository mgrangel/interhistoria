<?php
	/* Interhistorias 2015 Conexión a base de datos */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	include( "bd.php" );
	/*-----------------------------------------------------------------------------------------------------------------------*/
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerListaPacientes( $link ){
		$q = "Select * from Paciente order by Nombre asc";
		$result = mysql_query( $q, $link );
		return $result;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerRegistroTablaPacientes( $link, $idu ){
		$q = "Select idPaciente as id, nombre, apellido, cedula, 
				YEAR(CURDATE())-YEAR(fecha_nacimiento) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(fecha_nacimiento,'%m-%d'), 0, -1) as edad, telefono, email from paciente where idUsuario = $idu order by nombre asc";
		$result = mysql_query( $q, $link );
		return $result;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function urlpaciente( $lnk, $idp ){
		$paciente = obtenerPacienteId( $lnk, $idp );
		$dpaciente["idp"] = ""; $dpaciente["nombre"] = "";
		if( $paciente ){
			$dpaciente["idp"] = $paciente["id"];
			$dpaciente["nombre"] = $paciente["nombre"]." ".$paciente["apellido"];
		}
		return $dpaciente;
	} 
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerPacienteId( $link, $idp ){
		$q = "Select idPaciente as id, titulo, nombre, apellido, cedula, DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y') as fnac, 
		YEAR(CURDATE())-YEAR(fecha_nacimiento) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(fecha_nacimiento,'%m-%d'), 0, -1) as edad, sexo, ocupacion, lugar_trabajo as lt, edo_civil as cv, religion, representante, idioma, actividad_fisica as af, peso, estatura, imc, dominancia, seguro, dr_remitido,   
				YEAR(CURDATE())-YEAR(fecha_nacimiento) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(fecha_nacimiento,'%m-%d'), 0, -1) as edad, telefono, email, direccion as dir from paciente where idPaciente = $idp";
		$data = mysql_fetch_array( mysql_query ( $q, $link ) );	
		return $data;	
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerHistorialAntecedentes( $link, $idp, $idu ){
		$hist_a = array();
		$q = "select idAntecedente as id, date_format(fecha_r,'%d/%m/%Y') as fecha from antecedente 
		where idPaciente = $idp and idUsuario = $idu order by fecha_r desc";
		$data = mysql_query ( $q, $link );
		while( $a = mysql_fetch_array( $data ) ){
			$hist_a[] = $a;	
		}
		return $hist_a;			
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function filtrarCamposNumericosAP( $keys ){
		$claves = array();
		for( $i = 0; $i < count( $keys ); $i++ ) if( !is_numeric( $keys[$i] )  ) $claves[] = $keys[$i];
		return $claves;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerRegistrosAntecedentes( $link, $idp, $idu ){
		$hist_ra = array();
		$q = "select * from antecedente where idPaciente = $idp and idUsuario = $idu";
		$data = mysql_query ( $q, $link );
		while( $a = mysql_fetch_array( $data ) ){
			$hist_ra[] = $a;	
		}
		
		return $hist_ra;			
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerConsultaHistorialGlobal( $idp ){
		//include( "data-forms.php" );
		$tforms = array( 
			"frm_rodilla", "frm_hombro", "frm_columna_lumbar", "frm_columna_cervical", "frm_columna_dorsal", 
			"frm_cadera_adulto", "frm_pie_tobillo", "frm_codo" 
		);$q = "";
		//Declarado en data-forms.php
		foreach( $tforms as $form ){
			if( $form == "frm_pie_tobillo" ) $subq = "f.lado as izd, "; else $subq = "";
			$q .= "select f.idForm as id, date_format(f.fecha_r,'%d/%m/%Y') as fecha, concat (u.nombre,' ',u.apellido) as tuser 
				from $form f, usuario u where f.idPaciente = $idp and f.idUsuario = u.idUsuario";
				
			$q .= " UNION ";	
		}
		$q .= " order by f.fecha_r desc";
		
		return $q; 	
	}
	
	function obtenerHistorialPacienteGlobal( $idp ){
		$query = obtenerConsultaHistorialGlobal( $idp );
		//echo $query;
		//$data = mysql_query ( $q, $link );
		//return $data;		
	}
	
	function obtenerHistorialPacienteForm( $link, $idp, $tform, $param ){
		if( $param == "fpt" ) $subq = "f.lado as izd, "; else $subq = "";
		$q = "select f.idForm as id, $subq date_format(f.fecha_r,'%d/%m/%Y') as fecha,f.fecha_r as fecha_db, concat (u.nombre,' ',u.apellido) as tuser 
				from $tform f, usuario u where f.idPaciente = $idp and f.idUsuario = u.idUsuario order by f.fecha_r desc";
		$data = mysql_query ( $q, $link );
		return $data;		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function sorting( $hist ){
		function date_compare($a, $b){
			$t1 = strtotime($a['fecha_db']); $t2 = strtotime($b['fecha_db']);
			return $t2 - $t1;
		}    
		usort( $hist, 'date_compare');
		return $hist;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerHistorialPacienteId( $link, $idp ){
		include( "data-forms.php" );
		$hist = array();
		//tforms : array( "frm_rodilla", "frm_hombro", "frm_columna_lumbar", "frm_columna_cervical", "frm_cadera_adulto", "frm_pie_tobillo" ) 
		//Declarado en data-forms.php
		foreach( $tforms as $form ){
			if( $form == "frm_pie_tobillo" ) $param = "fpt"; else $param = ""; 
			$reg = obtenerHistorialPacienteForm( $link, $idp, $form, $param );
			while( $h = mysql_fetch_array( $reg ) ){
				$h["tbdform"] = $form;
				if( $form == "frm_pie_tobillo" ) $subt = $h["izd"]; else $subt = "";
				$h["tform"] = tituloForm( $form, $subt );
				$hist[] = $h;	
			}	
		}
		
		$data_hist["hist"] = $hist;
		$data_hist["lforms"] = obtenerEnlacesNuevoForm( $tforms );
		$data_hist["ord"] = sorting( $hist );
		return $data_hist;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function pacienteUsuario( $dbh, $idp, $idu ){
		//Indica si un paciente está asociado al usuario logueado, dado su id por parámetro.
		$asociado = false;
		$q = "select idUsuario as idu from paciente where idPaciente = $idp";
		$data = mysql_fetch_array( mysql_query ( $q, $dbh ) );
		if( $data["idu"] == $idu ) $asociado = true;
		
		return $asociado;			
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerConsultaSeguimiento( $link, $nform, $idp ){
		$q = "select idForm as id, date_format(fecha_r,'%d/%m/%Y') as fecha from $nform where idPaciente = $idp";
		return mysql_query ( $q, $link );		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerTablaPacientes( $link, $ver, $idu ){
		$registros = obtenerRegistroTablaPacientes( $link, $idu );
		$lpacientes = array();
		while( $p = mysql_fetch_array( $registros ) ){
			$param = "p=".$p["id"];
			if( $ver == "full" ) $p["link"] = "paciente.php?".$param;
			if( $ver == "mini" ) $p["link"] = "#!";
			$lpacientes[] = $p;
		}
		return $lpacientes;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function registrarNuevoPaciente( $p, $dbh ){
		//FB::log( $dp,"data_paciente");
		$fecha = cambiaf_a_mysql( $p["pfnacimiento"] );
		$query = "insert into paciente values ('','$p[titulo]','$p[nombres]','$p[apellidos]','$p[cedula]','$fecha','$p[direccion]',
		'$p[sexo]','$p[ocupacion]','$p[ltrabajo]','$p[telefono1]','$p[email]','$p[edocivil]','$p[religion]','$p[representante]',
		'$p[idioma]','$p[actividades]','$p[peso]','$p[estatura]','$p[imc]','$p[dominancia]','$p[seguro]','$p[doctor]', $p[idu])";
		
		$Rs = mysql_query ( $query, $dbh );
		return mysql_insert_id();				
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function actualizarDatosPaciente( $p, $dbh ){
		$fecha = cambiaf_a_mysql( $p["pfnacimiento"] );
		$q = "update paciente set titulo='$p[titulo]', nombre='$p[nombres]', apellido='$p[apellidos]', cedula='$p[cedula]',
			fecha_nacimiento='$fecha',direccion='$p[direccion]',sexo='$p[sexo]',ocupacion='$p[ocupacion]',lugar_trabajo='$p[ltrabajo]',
		telefono='$p[telefono1]',email='$p[email]',edo_civil='$p[edocivil]',religion='$p[religion]',representante='$p[representante]',
		idioma='$p[idioma]',actividad_fisica='$p[actividades]',peso='$p[peso]',estatura='$p[estatura]',imc='$p[imc]',dominancia='$p[dominancia]',	        seguro='$p[seguro]',dr_remitido='$p[doctor]',idUsuario=$p[idu] where idPaciente = $p[idp]";
		$Rs = mysql_query ( $q, $dbh );
		return $p["idp"];
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	if( isset( $_POST["frm_ap"] ) ){
		parse_str( $_POST["frm_ap"], $paciente );
		$result = actualizarDatosPaciente( $paciente, $dbh );
		echo $result;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	if( isset( $_POST["form_p"] ) ){
		//$paciente = explode("&", $_POST["form"] );
		parse_str( $_POST["form_p"], $paciente );
		$result = registrarNuevoPaciente( $paciente, $dbh );
		echo $result;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function tselop( $texto, $val, $t ){
		if( $t == "sel" ) $ts = "selected"; if( $t == "chk" ) $ts = "checked";
		$tx = "";
		if( $texto == $val ) $tx = $ts;
		return $tx;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function itemsForm( $pre, $form, $k, $frm_hist ){
		$comma = ",";
		$items_vertical = ""; $linea = ""; $comma = ", ";
		for( $i = 0; $i < sizeof($form)/2; $i++ ){
			$sep = explode( '_', $k[$i] );
			if( $sep[0] == $pre ){
				
				if( $form[$i] == 1 ){ $linea .= $frm_hist[$k[$i]].$comma; }
				else{ 
					if( $form[$i] != "" )
					$items_vertical .= "<b>".$frm_hist[$k[$i]]."</b>".": ".$form[$i]."<br>"; 
				}
			}
		}
		$info["linea"] = $linea;
		$info["vertical"] = $items_vertical;
		return $info;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerAntecedentesPersonales( $pre, $form, $k, $frm_hist ){
		$data_ap = itemsForm( $pre, $form, $k, $frm_hist );
		$info_ap = $data_ap["linea"];
		$info_ap .= "<br>".$data_ap["vertical"];
		
		return $info_ap;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function obtenerRegistroAP( $link, $id_ap ){
		$q = "select * from antecedente where idAntecedente = $id_ap";
		$data = mysql_fetch_array( mysql_query ( $q, $link ) );	
		return $data;
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function registrarAntecentePersonal( $sql, $link ){
		$result = mysql_query( $sql, $link );
		return mysql_insert_id();
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function reiniciarRegistroAP( $tname, $idIndexes, $idap ){
		include( "data-campos.php" );
		$list = "";
		$cont = 0;
		foreach( array_keys( $frm_aefn ) as $campo ){
			$cont++;
			if( !in_array( $campo, $idIndexes ) ){
				if( $cont == count( $frm_aefn ) ) $comma = ""; else $comma = ", ";
				$list .= $campo."=NULL".$comma;
			}
		}
		$sql_r = "update $tname set ".$list;
		$sql_r .= " where ".$idIndexes[0]."=".$idap;
		
		return $sql_r;		
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	if( isset( $_POST["form_apefn"] ) ){
		ini_set( 'display_errors', 1 );
		include( "data-forms.php" );
		//parse_str( $_POST["form_apefn"], $hist );
		//FB::log($hist,"array");
		$pairs = explode('&', $_POST["form_apefn"]);
		$dataform = obtenerDataForm( $pairs );
		$n = count( $dataform );
		$sql = hacerQuery( "antecedente", $dataform, $n );
		//echo $sql;
		$idh = registrarAntecentePersonal( $sql, $dbh );
		echo $idh;
	}
	
	if( isset( $_POST["form_map"] ) ){
		//Actualización de registro de antecedente personal
		$idIndexes = array( "idAntecedente", "idPaciente" );
		ini_set( 'display_errors', 1 );
		include( "data-forms.php" );
		parse_str( $_POST["form_map"], $hist );
		//FB::log($hist,"array");
		$pairs = explode( '&', $_POST["form_map"] );
		$dataform = obtenerDataFormAct( $pairs );
		$n = count( $dataform );
		$sql = hacerQueryActualizar( "antecedente", $dataform, $n, $idIndexes );
		$sqlr = reiniciarRegistroAP( "antecedente", $idIndexes, $_POST["id_ap"] );
		registrarAntecentePersonal( $sqlr, $dbh );
		$idh = registrarAntecentePersonal( $sql, $dbh );
	}
	/*-----------------------------------------------------------------------------------------------------------------------*/
	$dpaciente["idp"] = ""; $dpaciente["nombre"] = "";
	if( isset( $_GET["id_p"] ) ){
		$dpaciente = urlpaciente( $dbh, $_GET["id_p"] );
		$lnkidp = "id_p=".$_GET["id_p"];		
	}else $lnkidp = "";
	/*-----------------------------------------------------------------------------------------------------------------------*/
?>