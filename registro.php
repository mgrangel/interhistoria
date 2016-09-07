<?php 
	/*
	 * Interhistorias - Registro de usuarios subscripción
	 * 
	 */
	session_start();
	ini_set( 'display_errors', 1 );
	include( "bd/data-usuario.php" );
	//checkSession( "" );
?>
<!DOCTYPE html>
<html lang="es">
	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<!--<script src="../bower_components/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap Core JavaScript -->
    <!--<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
	<script src="js/locales/bootstrap-datepicker.es.js"></script>
    <script src="js/bootstrapValidator.min.js"></script>
    <script src="js/setup.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#form_nregistro').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    email: {
                        validators: { notEmpty: { message: 'Debe indicar un email' },
						emailAddress: { message: 'Debe especificar un email válido' } }
                    },
					nombre: {
                        validators: { notEmpty: { message: 'Debe indicar un nombre' } }
                    },
                },
				callback: function () {
                	alert("OK");
                }
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="css/ihstyle.css">
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="css/datepicker3.css">
    <style>
    	/* .form-control{
			padding: 24px 18px !important;
			font-size: 22px !important;
		}
		label { font-size:22px; }
		.btn{ font-size: 22px !important; } */
    </style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interhistorias - Registro</title>

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

</head>

<body>

    <div id="wrapper">

      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0; min-height:75px;">
          <div class="navbar-header" style="/*float:none;*/">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
			</button>
            <a class="navbar-brand" href="pages/index.php" style="padding:7px; position:absolute; z-index:9;">
                	<img src="img/logo.png" width="165" height="58"></a>
            </div>
            <!-- /.navbar-top-links -->
            <?php //include( "pages/imenu.php" );?>
        </nav>

      	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span class="title">Registro de usuarios</span></h1>
                </div>
                <div align="left" style="margin:25px 0;">
                	<span class="lsec">Complete el siguiente formulario y pronto estaremos contactándole para proporcionarle acceso 
                    a la plataforma de interhistoria.net</span>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <div class="row">
                            	<form role="form" id="form_nregistro" method="post" action="bd/data-usuario.php">
                                	<input type="hidden" name="regu" value="1">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombres y Apellidos (*)</label>
                                            <input class="form-control" name="nombre" id="rnombre">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Email (*)</label>
                                            <input type="email" class="form-control" name="email" id="remail">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Subespecialidad</label>
                                            <input class="form-control" name="subesp" id="rsubesp">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Teléfonos</label>
                                            <input class="form-control" name="telefono" id="ptelefono">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Ciudad de trabajo</label>
                                            <input class="form-control" name="ciudad" id="rciudad">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Centro de trabajo</label>
                                            <input class="form-control" name="trabajo" id="rtrabajo">
                                            <p class="help-block"></p>
                                        </div>
                                	</div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                           <div> <label>¿Utiliza actualmente algún software médico?</label></div>
                                            <label class="radio-inline">
                                                <input type="radio" name="usa_sw" id="rbt-sw" value="Si" >Sí
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="usa_sw" id="rbt-sra" value="no" checked>No
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                            <label>¿Cuál sería su método ideal de pago de un software médico?</label></div>
                                            <label class="radio-inline">
                                                <input type="radio" name="metodop" id="rbt-mpsa" value="Suscripcion anual" checked>Suscripción anual
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="metodop" id="rbt-mpsm" value="Suscripcion mensual" >Suscripción mensual
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="metodop" id="rbt-mpcp" value="Comision por paciente" >Comisión por paciente
                                            </label>
                                        </div>
                                        <div align="center">
                                        	<div style="padding-top:80px;"></div>
                                        	<button type="submit" class="btn btn-form">Enviar</button>
                                        </div>
                                        <div id="nresp"></div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row"></div>
		</div>
      </div>
    </div>
    <!-- /#wrapper -->

    

</body>

</html>
<?php include_once( "analyticstracking.php" ) ?>