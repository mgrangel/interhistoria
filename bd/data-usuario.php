<?php
	/* Interhistorias 2015 Conexión a base de datos */
	/*-----------------------------------------------------------------------------------------------------------------------*/
	/*-----------------------------------------------------------------------------------------------------------------------*/
	function checkSession( $page ){
		if( isset( $_SESSION["login"] ) ){
			if( $page == "index" ) 
				echo "<script> window.location = 'pages/'</script>";
		}else{
			if( $page == "" )
				echo "<script> window.location = '../index.php'</script>";		
		}
	}
	/* ----------------------------------------------------------------------------------------------------- */
	function obtenerDataUsuario( $usuario ){
		$sql = "select usuario, nombre, apellido from usuario where usuario";					
	}
	/* ----------------------------------------------------------------------------------------------------- */
	function registrarInicioSesion( $usuario, $dbh ){
		$adj_time = 96; // Tiempo para ajustar diferencia con hora de servidor ( minutos )
		$adjsql = "NOW() + INTERVAL $adj_time MINUTE";
		$query = "insert into ingreso values ('', $usuario[idUsuario], $adjsql )";
		$Rs = mysql_query ( $query, $dbh );
		return mysql_insert_id();	
	}
	/* ----------------------------------------------------------------------------------------------------- */
	function iniciarSesion( $usuario, $pass, $dbh ){
		ini_set("session.gc_maxlifetime","7200");
		session_start();
		$idresult = 0;
		$sql = "select idUsuario, usuario, password, email, nombre, apellido, ci, descripcion, msds, cmdf from usuario 
				where usuario ='".$usuario."' and password='".$pass."'";
		$data = mysql_query ( $sql, $dbh );
		$data_user = mysql_fetch_array( $data );
		$nrows = mysql_num_rows( $data );
		
		if( $nrows > 0 ){
			$_SESSION["login"] = 1;
			$_SESSION["user"] = $data_user;
			registrarInicioSesion( $data_user, $dbh );
			$idresult = 1; 
		}
		
		return $idresult;
	}
	/* ----------------------------------------------------------------------------------------------------- */
	if( isset( $_POST["login"] ) ){
		include( "bd.php" );
		
		$usuario = $_POST["usuario"];
		$pass = $_POST["pass"];
		$return = iniciarSesion( $usuario, $pass, $dbh );
		echo $return;
	}
	/*--------------------------------------------------------------------------------------------------------*/
	if( isset( $_GET["logout"] ) ){
		include( "bd.php" );
		unset( $_SESSION["login"] );
		echo "<script> window.location = '../index.php'</script>";		
	}
	/*--------------------------------------------------------------------------------------------------------*/
	if( isset( $_SESSION["login"] ) ){
		$idu = $_SESSION["user"]["idUsuario"];
	}else $idu = NULL;
	/*--------------------------------------------------------------------------------------------------------*/
	function registrarUsuarioSuscripcion( $u ){
		include( "bd.php" );
		$adj_time = 96; // Tiempo para ajustar diferencia con hora de servidor ( minutos )
		$adjsql = "NOW() + INTERVAL $adj_time MINUTE";
		$query = "insert into registro values ('','$u[nombre]','$u[email]','$u[telf]','$u[subesp]','$u[ciudad]',
					'$u[trabajo]','$u[usa_sw]','$u[metodop]', $adjsql, 0)";
		$Rs = mysql_query ( $query, $dbh );
		return mysql_insert_id();						
	}
	
	if( isset( $_POST["regu"] ) ){
		$u["nombre"] = $_POST["nombre"];
		$u["email"] = $_POST["email"];
		$u["subesp"] = $_POST["subesp"];
		$u["telf"] = $_POST["telefono"];
		$u["ciudad"] = $_POST["ciudad"];
		$u["trabajo"] = $_POST["trabajo"];
		$u["usa_sw"] = $_POST["usa_sw"];
		$u["metodop"] = $_POST["metodop"];
		
		$rr = registrarUsuarioSuscripcion( $u );
		
		echo "<script> window.location = '../registrado.php'</script>";
	}
	/*--------------------------------------------------------------------------------------------------------*/
	function chequearUsuarioExistente( $dbh, $identificador ){
		$datau["encontrado"] = 0;
		$datau["usuario"] = NULL;
		
		$sql = "select usuario, password, email from usuario where usuario='$identificador' or email='$identificador'";
		$data = mysql_query ( $sql, $dbh );
		$data_user = mysql_fetch_array( $data );
		$nrows = mysql_num_rows( $data );
		
		if( $nrows > 0 ){
			$datau["encontrado"] = 1;
			$datau["usuario"] = $data_user;	 
		}
		return $datau;			
	}
	/*--------------------------------------------------------------------------------------------------------*/
	function enviarPasswordEmail( $data_u ){
		include( "PHPMailer-master/PHPMailerAutoload.php" );
		ini_set( 'display_errors', 1 );
		
		//$email = "mikeven@gmail.com";
		$diremail = strtolower( $data_u["email"] );
        $mail = new phpmailer();
		$mail->IsSMTP();
		//$mail->Host = "192.168.100.8";
		$mail->IsSendmail();
		$mail->From = "info@interhistoria.net";
		$mail->FromName = "Interhistorias";
		$mail->AddAddress( $diremail );
		$mail->AddReplyTo( "info@interhistoria.net","Mensajero Interhistorias" );
		$mail->IsHTML( true );
		$cuerpo_mensaje = file_get_contents( "email_enviopassword.html" );
		$cuerpo_mensaje = str_replace( "{usuario}", $data_u["usuario"], $cuerpo_mensaje );
		$cuerpo_mensaje = str_replace( "{password}", $data_u["password"], $cuerpo_mensaje );
		$mail->Subject = utf8_decode( "Recuperación de contraseña" );
		$mail->Body = $cuerpo_mensaje;
		$mail->AltBody = '';
		
		$rmail = $mail->Send();
		if( !$rmail ){
			echo "El mensaje no se pudo enviar. <p>";
			echo "Mailer Error: " . $mail->ErrorInfo;
			exit;
		}
		else 
			return $rmail;		
	}
	/*--------------------------------------------------------------------------------------------------------*/
	if( isset( $_POST["recuperar_passw"] ) ){
		include( "bd.php" );
		
		$respuesta = "Error al enviar datos";
		$data_r = chequearUsuarioExistente( $dbh, $_POST["uemail"] );
		if ( $data_r["encontrado"] == 1 ){
			$cod_r = enviarPasswordEmail( $data_r["usuario"]  );
			if( $cod_r == 1 ) $respuesta = "Se ha enviado su contraseña al buzón de correo electrónico";
			else $respuesta = "Ocurrió un error al enviar datos por email";		
		}
		else
			$respuesta = "No hay registros asociados a este dato";
		
		echo $respuesta;
		
	}
	/*--------------------------------------------------------------------------------------------------------*/
	function obtenerRegistroInvitacion(){
		include( "bd.php" );
		$query = "select idRegistro as id, nombre, email, telefono, date_format(fecha_r,'%d/%m/%Y') as fecha from registro";
		$Rs = mysql_query ( $query, $dbh );
		$regs = array();
		while( $r = mysql_fetch_array( $Rs ) ){
			$regs[] = $r;
		}
		return $regs;	
	}
	
	function generarUserPass( $nombre, $tlf ){
		$u["login"] = substr( strtolower( $nombre ), 0, 5 );
		$u["passw"] = substr( strtolower( $nombre ), 0, 2 ).substr( $tlf, -4 );
		return $u;
	}
	/*--------------------------------------------------------------------------------------------------------*/
	function crearUsuarioInvitacion( $usuario, $dbh ){
		$query = "insert into usuario ( usuario, password, email, fecha_r ) 
					values ( '$usuario[login]', '$usuario[passw]', '$usuario[email]', NOW() )";
		//$Rs = mysql_query ( $query, $dbh );
		//return mysql_insert_id();
		echo $query.";"."<br>";
	}
	/*--------------------------------------------------------------------------------------------------------*/
	function enviarMensajeInvitacion( $usuario, $mail ){
		ini_set( 'display_errors', 1 );
		
		//$email = "mikeven@gmail.com";
		$diremail = strtolower( $usuario["email"] );
        $mail = new phpmailer();
		$mail->IsSMTP();
		//$mail->Host = "192.168.100.8";
		$mail->IsSendmail();
		$mail->From = "info@interhistoria.net";
		$mail->FromName = "Interhistorias";
		$mail->AddAddress( $diremail );
		$mail->AddReplyTo( "info@interhistoria.net","Mensajero Interhistorias" );
		$mail->IsHTML( true );
		$cuerpo_mensaje = file_get_contents( "email_invreg.html" );
		$cuerpo_mensaje = str_replace( "{nombre}", $usuario["nombre"], $cuerpo_mensaje );
		$cuerpo_mensaje = str_replace( "{usuario}", $usuario["login"], $cuerpo_mensaje );
		$cuerpo_mensaje = str_replace( "{password}", $usuario["passw"], $cuerpo_mensaje );
		$mail->Subject = utf8_decode( "Invitación de interhistoria" );
		$mail->Body = $cuerpo_mensaje;
		$mail->AltBody = '';
		echo $diremail."<br>";
		if( !$mail->Send() ){
			echo "El mensaje no se pudo enviar. <p>";
			echo "Mailer Error: " . $mail->ErrorInfo;
			exit;
		}
	}
	/*--------------------------------------------------------------------------------------------------------*/
	if( isset( $_POST["reginvemail"] ) ){
		//include( "bd.php" );
		include( "PHPMailer-master/PHPMailerAutoload.php" );
		$mail = new phpmailer();
		$regs = obtenerRegistroInvitacion();
		$count = 0;
		$min_id = $_POST["minregid"];
		foreach( $regs as $r ){
			$count++;
        	$usuario = generarUserPass( $r["nombre"], $r["telefono"] );
			$usuario["nombre"] = $r["nombre"]; 
			$usuario["email"] = $r["email"];
			if( $r["id"] > $min_id ){
				echo $usuario["nombre"]." ".$r["email"]."<br>";
				$idru = crearUsuarioInvitacion( $usuario, $dbh );
				enviarMensajeInvitacion( $usuario, $mail );
			}
		}
	}
	/*--------------------------------------------------------------------------------------------------------*/
	if( isset( $_GET["msg1"] ) ){
		include( "PHPMailer-master/PHPMailerAutoload.php" );
		$mail = new phpmailer();
		$usuario["nombre"] = "Leonardo Pinto";
		$usuario["login"] = "leopintop";
		$usuario["passw"] = "leopintop"; 
		$usuario["email"] = "leopintop@hotmail.com";
		enviarMensajeInvitacion( $usuario, $mail );
	}
	/*--------------------------------------------------------------------------------------------------------*/
?>