<?php 
	/*
	 * Interhistorias - Registro de nuevo paciente
	 * 
	 */
	session_start();
	ini_set( 'display_errors', 1 );
	include( "../bd/data-usuario.php" );
	checkSession( "" );
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
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/locales/bootstrap-datepicker.es.js"></script>
    <script src="../js/bootstrapValidator.min.js"></script>
    <script src="../js/setup.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#form_npaciente').bootstrapValidator({
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
					cedula: {
                        validators: { 
							//numeric: { message: 'Debe indicar número de cédula válido' },
							notEmpty: { message: 'Debe indicar número de cédula' } 
						}
                    },
					nombres: {
                        validators: { notEmpty: { message: 'Debe indicar un nombre' } }
                    },
					apellidos: {
                        validators: { notEmpty: { message: 'Debe indicar un apellido' } }
                    },
					pfnacimiento: {
                        validators: { notEmpty: { message: 'Debe indicar la fecha de nacimiento' } }
                    }
                },
				callback: function () {
                	alert("OK");
                }
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="../css/ihstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker3.css">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interhistorias - Nuevo paciente</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
            <a class="navbar-brand" href="index.php" style="padding:7px; position:absolute; z-index:9;">
                	<img src="../img/logo.png" width="165" height="58"></a>
            </div>
            <!-- /.navbar-header -->
            <?php include( "navbar-header.php" );?>
            <!-- /.navbar-top-links -->
            <?php include( "imenu.php" );?>
        </nav>

      	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span class="title">Nuevo paciente</span></h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Datos para registrar nuevo paciente</div>
                        <div class="panel-body">
                            <div class="row">
                            	<form role="form" id="form_npaciente" method="post">
                                	<input type="hidden" name="idu" value="<?php echo $_SESSION["user"]["idUsuario"];?>">
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Título</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-sr" value="Sr" checked>Sr
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-sra" value="Sra">Sra
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-srta" value="Srta">Srta
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-dr" value="Dr">Dr
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-lic" value="Lic">Lic
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-ing" value="Ing">Ing
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-mr" value="Mr">Mr
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <select class="form-control" name="sexo" id="psexo">
                                                <option value="femenino">Femenino</option>
                                                <option value="masculino">Masculino</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombres (*)</label>
                                            <input class="form-control" name="nombres" id="pnombres">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Apellidos (*)</label>
                                            <input class="form-control" name="apellidos" id="papellidos">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Cédula/Identificación (*)</label>
                                            <input class="form-control" name="cedula" id="pcedula">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha de nacimiento (*)</label>
                                            <input class="form-control" id="datetimepicker" readonly  name="pfnacimiento">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Estado civil</label>
                                            <select class="form-control" name="edocivil" id="pedocivil">
                                                <option value="soltero">Soltero</option>
                                                <option value="casado">Casado</option>
                                                <option value="divorciado">Divorciado</option>
                                                <option value="viudo">Viudo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Email (*)</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Teléfonos</label>
                                            <input class="form-control" name="telefono1" id="ptelefono1">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input class="form-control" name="direccion" id="pdireccion">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Idioma primario</label>
                                            <select class="form-control" name="idioma" id="pidioma">
                                                <option value="español">Español</option>
                                                <option value="ingles">Inglés</option>
                                                <option value="aleman">Alemán</option>
                                                <option value="portugues">Portugués</option>
                                                <option value="chino">Chino</option>
                                                <option value="ruso">Ruso</option>
                                                <option value="otro">Otro</option>
                                            </select>
                                        </div>
                                	</div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Peso (Kg)</label>
                                            <input class="form-control" name="peso" id="ppeso" onBlur="mostrarIMC()" onKeyPress="mostrarIMC()">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Estatura (mt)</label>
                                            <input class="form-control" name="estatura" id="pestatura" onKeyPress="mostrarIMC()"  
                                            onBlur="mostrarIMC()">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>I.M.C.(kg/㎡)</label>
                                            <label id="imcval" style="margin-left:20px"></label>
                                            <input type="hidden" name="imc" id="himc">
                                        </div>
                                        <div class="form-group">
                                            <label>Dominancia</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dominancia" id="izquierda" value="Izquierda" checked>Izquierda
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dominancia" id="derecha" value="Derecha">Derecha
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dominancia" id="ambidiestra" value="Ambidiestra">Ambidiestra
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Ocupación</label>
                                            <input class="form-control" name="ocupacion" id="pocupación">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Lugar de trabajo</label>
                                            <input class="form-control" name="ltrabajo" id="pltrabajo">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Actividades físicas/deportivas</label>
                                            <input class="form-control" name="actividades" id="pactividades">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Religión</label>
                                            <select class="form-control" name="religion" id="preligion">
                                                <option value="Católica">Católica</option>
                                                <option value="Cristiana">Cristiana</option>
                                                <option value="Evangélica">Evangélica</option>
                                                <option value="Judía">Judía</option>
                                                <option value="Musulmán">Musulmán</option>
                                                <option value="Protestante">Protestante</option>
                                                <option value="Otra">Otra</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Representante/Familiar</label>
                                            <input class="form-control" name="representante" id="prepresentante">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Compañia de Seguro</label>
                                            <select class="form-control" name="seguro" id="pseguro" onChange="chopt(this)">
                                            	<option value="seguros_altamira">Seguros Altamira</option>
                                                <option value="seguros_avila">Seguros Ávila</option>
                                                <option value="seguros_la_previsora">Seguros La Previsora</option>
                                                <option value="liberty_mutual">Liberty Mutual</option>
                                                <option value="adriatica_de_seguros">Adriática de Seguros</option>
                                                <option value="seguros_la">Seguros Los Andes</option>
                                                <option value="seguros_nuevo_mundo">Seguros Nuevo Mundo</option>
                                                <option value="seguros_horizonte">Seguros Horizonte</option>
                                                <option value="la_oriental_de_seguros">La Oriental de Seguros</option>
                                                <option value="seguros_piramide">Seguros Pirámide</option>
                                                <option value="seguros_universitas">Seguros Universitas</option>
                                                <option value="multinacional_de_seguros">Multinacional de Seguros</option>
                                                <option value="seguros_qualitas">Seguros Qualitas</option>
                                                <option value="la_vitalicia">La Vitalicia</option>
                                                <option value="Otra">Otra</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="hidpseguro">
                                            <label>Compañia de Seguro</label>
                                            <input class="form-control" name="seleccion" id="opseguro">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Dr quien remite</label>
                                            <input class="form-control" name="doctor" id="pdoctor">
                                            <p class="help-block"></p>
                                        </div>
                                        <div align="center">
                                        	<button type="submit" class="btn btn-form" onClick="chckForm()">Guardar</button>
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