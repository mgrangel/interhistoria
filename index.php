<?php
	/*
	 * Interhistorias - Página principal
	 * 
	 */
	session_start();
	ini_set( 'display_errors', 1 );
	include( "bd/data-usuario.php" );
	checkSession( 'index' );
?>
<!DOCTYPE html>
<html lang="es">
	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="js/bootstrapValidator.min.js"></script>
    <script src="js/initih.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="css/ihstyle.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interhistorias</title>
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		.page-header{float:none !important;}
		.panel-body{ margin:0 15px; }
		body{
			background:url(img/ihbgnd.png);
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover; 
			background-repeat:no-repeat;
		}
		#logoih{ background:url(img/logo.png); width:265px; height:95px; margin:20px auto; }
    </style>
</head>
<body>
    <div id="wrapper">
      	<div id="page-wrapper" style="margin:0;">
            <div class="row">
                <div class="col-lg-4"><div id="logoih"></div></div>
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                	<div class="panel">
                        <!--<div class="panel-heading"><h1 class="page-header"><span class="title">Inicio de sesión</span></h1></div>-->
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" id="loginform">
                                	<div class="col-xs-12 col-md-6">
                                        <input name="login" type="hidden" value="1"/>
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" class="form-control finput" name="usuario" id="usuario">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" class="form-control finput" name="pass" id="pass">
                                        </div>
                                        <div align="right">
                                            <button type="button" class="btn btn-form" onClick="log_in()">Entrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                            	<div class="col-xs-12 col-md-6">
                                    <div class="form-group" align="left">
                                    <label>
                                        <a href="#!" data-toggle="modal" 
                                        data-target="#rpassmodal" class="lsec">Recuperar contraseña</a>
                                        <?php include( "frmr_password.php" ); ?>
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <div id="response"></div>
                        <!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div>    
            </div>
            <div class="banda_color"></div>
            <div class="row">
                <div class="col-lg-12"><?php include( "ihslider.html" );?></div>
            </div>
            <!--<div class="banda_color"></div>-->
            <div class="row">
            	<div align="center" style="padding:50px 0;">
                	<div class="col-lg-4"></div>
                    <div class="col-lg-4">
                    	<div class="panel panel-default" style="padding:35px;">
                    		<p class="title">¿Nuevo usuario?</p>
                    		<a href="registro.php" target="_top"><button class="btn btn-form-blanco" style="width:200px;">Registrarse</button></a>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>	
            </div>
		</div>
      </div>
    </div>
    <!-- /#wrapper -->
</body>

</html>
<?php include_once( "analyticstracking.php" ) ?>