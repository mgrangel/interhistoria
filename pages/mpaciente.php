<?php 
	/*
	 * Interhistorias - Modificación datos de paciente
	 * 
	 */
	session_start();
	ini_set( 'display_errors', 1 );
	include( "../bd/data-usuario.php" );
	include( "../bd/data-paciente.php" );
	checkSession( "" );
	if( isset( $_GET["p"] ) ) $p = $_GET["p"]; else $p = 0;
	if( pacienteUsuario( $dbh, $p, $idu ) == false ) 
		$p = 0;	
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

    <title>Interhistorias - Modificar paciente</title>

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
	<?php $paciente = obtenerPacienteId( $dbh, $p ); ?>
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
            	<img src="../img/logo.png" width="165" height="58">
            </a>
            </div>
            <!-- /.navbar-header -->
            <?php include( "navbar-header.php" );?>
            <!-- /.navbar-top-links -->
            <?php include( "imenu.php" );?>
        </nav>
      	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span class="title">Ficha del paciente</span></h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Actualización de datos de paciente</div>
                        <div class="panel-body">
                            <div class="row">
                            	<form role="form" id="form_mpaciente" method="get">
                                	<input type="hidden" name="idu" value="<?php echo $_SESSION["user"]["idUsuario"];?>">
                                    <input type="hidden" name="idp" value="<?php echo $p;?>">
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Título</label>
                                            <?php $tit = $paciente["titulo"];?>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-sr" value="sr" <?php echo tselop("sr",$tit,"chk");?>>Sr
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-sra" value="sra" <?php echo tselop("sra",$tit,"chk");?>>Sra
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-srta" value="srta"<?php echo tselop("srta",$tit,"chk");?>>Srta
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-dr" value="dr" <?php echo tselop("dr",$tit,"chk");?>>Dr
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-lic" value="lic" <?php echo tselop("lic",$tit,"chk");?>>Lic
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-ing" value="ing" <?php echo tselop("ing",$tit,"chk");?>>Ing
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="titulo" id="rbt-mr" value="mr" <?php echo tselop("mr",$tit,"chk");?>>Mr
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
                                            <input class="form-control" name="nombres" id="pnombres" value="<?php echo $paciente["nombre"];?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Apellidos (*)</label>
                                            <input class="form-control" name="apellidos" id="papellidos" value="<?php echo $paciente["apellido"];?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Cédula/Identificación (*)</label>
                                            <input class="form-control" name="cedula" id="pcedula" value="<?php echo $paciente["cedula"];?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha de nacimiento (*)</label>
                                            <input class="form-control" id="datetimepicker" readonly 
                                            name="pfnacimiento" value="<?php echo $paciente["fnac"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Estado civil</label>
                                            <?php $ec = $paciente["cv"]?>
                                            <select class="form-control" name="edocivil" id="pedocivil">
                                                <option value="soltero" <?php echo tselop("soltero",$ec,"sel");?>>Soltero</option>
                                                <option value="casado" <?php echo tselop("casado",$ec,"sel");?>>Casado</option>
                                                <option value="divorciado" <?php echo tselop("divorciado",$ec,"sel");?>>Divorciado</option>
                                                <option value="viudo" <?php echo tselop("viudo",$ec,"sel");?>>Viudo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Email (*)</label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $paciente["email"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Teléfonos</label>
                                            <input class="form-control" name="telefono1" id="ptelefono1" 
                                            value="<?php echo $paciente["telefono"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input class="form-control" name="direccion" id="pdireccion" 
                                            value="<?php echo $paciente["dir"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Idioma primario</label>
                                            <?php $idioma = $paciente["idioma"]?>
                                            <select class="form-control" name="idioma" id="pidioma">
                                                <option value="español" <?php echo tselop( "español",$idioma,"sel");?>>Español</option>
                                                <option value="ingles" <?php echo tselop( "ingles",$idioma,"sel");?>>Inglés</option>
                                                <option value="aleman" <?php echo tselop( "aleman",$idioma,"sel" );?>>Alemán</option>
                                                <option value="portugues" <?php echo tselop( "portugues", $idioma,"sel");?>>Portugués</option>
                                                <option value="chino" <?php echo tselop( "chino",$idioma,"sel");?>>Chino</option>
                                                <option value="ruso" <?php echo tselop( "ruso",$idioma,"sel");?>>Ruso</option>
                                                <option value="otro" <?php echo tselop( "otro",$idioma,"sel");?>>Otro</option>
                                            </select>
                                        </div>
                                	</div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Peso (Kg)</label>
                                            <input class="form-control" name="peso" id="ppeso" 
                                            onBlur="mostrarIMC()" onKeyPress="mostrarIMC()" value="<?php echo $paciente["peso"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Estatura (mt)</label>
                                            <input class="form-control" name="estatura" id="pestatura" onKeyPress="mostrarIMC()"  
                                            onBlur="mostrarIMC()" value="<?php echo $paciente["estatura"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>I.M.C.(kg/㎡)</label>
                                            <label id="imcval" style="margin-left:20px"><?php echo $paciente["imc"]?></label>
                                            <input type="hidden" name="imc" id="himc">
                                        </div>
                                        <div class="form-group">
                                            <label>Dominancia</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dominancia" id="rbt-sr" value="Izquierda" 
												<?php echo tselop("Izquierda",$paciente["dominancia"],"chk");?>>Izquierda
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dominancia" id="rbt-sra" value="Derecha" 
												<?php echo tselop("Derecha",$paciente["dominancia"],"chk");?>>Derecha
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dominancia" id="rbt-srta" value="Ambidiestra" 
												<?php echo tselop("Ambidiestra",$paciente["dominancia"],"chk");?>>Ambidiestra
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Ocupación</label>
                                            <input class="form-control" name="ocupacion" id="pocupación" value="<?php echo $paciente["ocupacion"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Lugar de trabajo</label>
                                            <input class="form-control" name="ltrabajo" id="pltrabajo" value="<?php echo $paciente["lt"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Actividades físicas/deportivas</label>
                                            <input class="form-control" name="actividades" id="pactividades" value="<?php echo $paciente["af"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Religión</label>
                                            <?php $rel = $paciente["religion"];?>
                                            <select class="form-control" name="religion" id="preligion">
                                                <option value="catolica" <?php echo tselop("catolica",$rel,"sel");?>>Católica</option>
                                                <option value="cristiana" <?php echo tselop("cristiana",$rel,"sel");?>>Cristiana</option>
                                                <option value="evangelica" <?php echo tselop("evangelica",$rel,"sel");?>>Evangélica</option>
                                                <option value="judia" <?php echo tselop("judia",$rel,"sel");?>>Judía</option>
                                                <option value="musulman" <?php echo tselop("musulman",$rel,"sel");?>>Musulmán</option>
                                                <option value="protestante" <?php echo tselop("protestante",$rel,"sel");?>>Protestante</option>
                                                <option value="otra" <?php echo tselop("otra",$rel,"sel");?>>Otra</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Representante/Familiar</label>
                                            <input class="form-control" name="representante" id="prepresentante" 
                                            value="<?php echo $paciente["representante"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Compañía de Seguro</label>
											<?php $seg = $paciente["seguro"];?>
                                            <select class="form-control" name="seguro" id="pseguro" onChange="chopt(this)">
                                            	<option value="seguros_altamira" <?php echo tselop("seguros_altamira",$seg,"sel");?>>Seguros Altamira</option>
                                                <option value="seguros_avila" <?php echo tselop("seguros_avila",$seg,"sel");?>>Seguros Ávila</option>
                                                <option value="seguros_la_previsora" <?php echo tselop("seguros_la_previsora",$seg,"sel");?>>Seguros La Previsora</option>
                                                <option value="liberty_mutual" <?php echo tselop("liberty_mutual",$seg,"sel");?>>Liberty Mutual</option>
                                                <option value="adriatica_de_seguros" <?php echo tselop("adriatica_de_seguros",$seg,"sel");?>>Adriática de Seguros</option>
                                                <option value="seguros_la" <?php echo tselop("seguros_la",$seg,"sel");?>>Seguros Los Andes</option>
                                                <option value="seguros_nuevo_mundo" <?php echo tselop("seguros_nuevo_mundo",$seg,"sel");?>>Seguros Nuevo Mundo</option>
                                                <option value="seguros_horizonte" <?php echo tselop("seguros_horizonte",$seg,"sel");?>>Seguros Horizonte</option>
                                                <option value="la_oriental_de_seguros" <?php echo tselop("La Oriental de Seguros",$seg,"sel");?>>La Oriental de Seguros</option>
                                                <option value="seguros_piramide" <?php echo tselop("seguros_piramide",$seg,"sel");?>>Seguros Pirámide</option>
                                                <option value="seguros_universitas" <?php echo tselop("seguros_universitas",$seg,"sel");?>>Seguros Universitas</option>
                                                <option value="multinacional_de_seguros" <?php echo tselop("multinacional_de_seguros",$seg,"sel");?>>Multinacional de Seguros</option>
                                                <option value="seguros_qualitas" <?php echo tselop("seguros_qualitas",$seg,"sel");?>>Seguros Qualitas</option>
                                                <option value="la_vitalicia" <?php echo tselop("la_vitalicia",$seg,"sel");?>>La Vitalicia</option>
                                                <option value="Otra">Otra</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="hidpseguro">
                                            <input type="hidden" id="valseguro" value="<?php echo $seg;?>">
                                            <input class="form-control" name="seleccion" id="opseguro" value="<?php echo $seg;?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Dr quien remite</label>
                                            <input class="form-control" name="doctor" id="pdoctor" value="<?php echo $paciente["dr_remitido"]?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <?php if($p != 0) {?>
                                        <div align="center">
                                        	<button type="button" class="btn btn-form" onClick="actPaciente()">Guardar</button>
                                        </div>
                                        <?php } ?>
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
<script type="text/javascript">
	if( $("#valseguro").val() != "seguros_avila" )
		$("#hidpseguro").show( 200 );
</script>
</body>

</html>
<?php include_once( "analyticstracking.php" ) ?>