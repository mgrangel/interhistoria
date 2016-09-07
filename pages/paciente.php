<?php 
	/*
	 * Interhistorias - Ficha de paciente
	 * 
	 */
	session_start();
	ini_set( 'display_errors', 1 );
	include( "../bd/data-usuario.php" );
	include( "../bd/data-campos.php" );
	checkSession( "" );
	include( "../bd/data-paciente.php" );
	$idu = $_SESSION["user"]["idUsuario"];
?>
<!DOCTYPE html>
<html lang="es">
	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/locales/bootstrap-datepicker.es.js"></script>
    <script src="../js/bootstrapValidator.min.js"></script>
    <script src="../js/setup.js"></script>
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

    <title>Interhistorias - Datos paciente</title>
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
<?php 
	$antecedentes = false; $modificacion_ap = false;
	
	$lhist = array(); $lnuevoforms = array();
	if( isset( $_GET["p"] ) ){
		$idp = $_GET["p"];
		if ( pacienteUsuario( $dbh, $idp, $idu ) == false ) $idp = 0;
		$rp = obtenerPacienteId( $dbh, $idp );
	}
	else $idp = 0;
	
	if( $idp != 0 ){
		$datahist = obtenerHistorialPacienteId( $dbh, $idp );
		
		$lhistanteced = obtenerHistorialAntecedentes( $dbh, $idp, $idu );
		$regs_antecedentes = obtenerRegistrosAntecedentes( $dbh, $idp, $idu );
		
		if( count( $lhistanteced ) > 0 ) $antecedentes = true;
		$lhist = $datahist["ord"];
		$lnuevoforms = $datahist["lforms"];
		if( isset( $_GET["rap"] ) ){ 
			$modificacion_ap = true;
			$reg_ap = obtenerRegistroAP( $dbh, $_GET["rap"] );
		}
	}
?>
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
                    <h1 class="page-header">
                    	<span class="title">
							<?php if( isset( $_GET["p"] ) ) echo $rp["titulo"]." ".$rp["nombre"]." ".$rp["apellido"]; 
									else echo "Falta parámetro de identificación del paciente";?></span>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Datos del paciente <div style="float:right;">Historial de consultas</div></div>
                        
                        <div id="fdata_paciente" class="panel-body">
                            <div class="row">
                            	<?php if( isset( $_GET["p"] ) ) {?>
                                    <div class="col-lg-6">
                                        <form role="form" id="form_npaciente" method="get">
                                            <div class="form-group">
                                                <label class="lab0">Edad: &nbsp;</label><?php echo $rp["edad"];?>&nbsp;
                                                <label class="lab0">Sexo: &nbsp;</label><?php echo $rp["sexo"];?>&nbsp;
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Cédula/Identificación: &nbsp;</label><?php echo $rp["cedula"];?>&nbsp;
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Fecha de nacimiento: &nbsp;</label><?php echo $rp["fnac"];?>
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Edo civil: &nbsp;</label><?php echo $rp["cv"];?>&nbsp;
                                                <label class="lab0">Idioma: &nbsp;</label><?php echo $rp["idioma"];?>
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Peso: &nbsp;</label><?php echo $rp["peso"];?>&nbsp;
                                                <label class="lab0">Estatura: &nbsp;</label><?php echo $rp["estatura"];?>&nbsp;
                                                <label class="lab0">I.M.C.(kg/㎡): &nbsp;</label><?php echo $rp["imc"];?>
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Dominancia: &nbsp;</label><?php echo $rp["dominancia"];?>&nbsp;
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Email: &nbsp;</label><?php echo $rp["email"];?>&nbsp;
                                                <label class="lab0">Teléfono: &nbsp;</label><?php echo $rp["telefono"];?>
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Dirección: &nbsp;</label><?php echo $rp["dir"];?>&nbsp;
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="lab0">Ocupación: &nbsp;</label><?php echo $rp["ocupacion"];?>&nbsp;
                                                <label class="lab0">Lugar de trabajo: &nbsp;</label><?php echo $rp["lt"];?>&nbsp;
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Actividades físicas: &nbsp;</label><?php echo $rp["af"];?>&nbsp;
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Religión: &nbsp;</label><?php echo $rp["religion"];?>&nbsp;
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Representante/Familiar: &nbsp;</label><?php echo $rp["representante"];?>&nbsp;
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Compañía de seguros: &nbsp;</label><?php echo $rp["seguro"];?>&nbsp;
                                            </div>
                                            <div class="form-group">
                                                <label class="lab0">Dr quien remite: &nbsp;</label><?php echo $rp["dr_remitido"];?>&nbsp;
                                            </div>
                                        </form>
                                        <hr>
                                        <div id="antecedentes_habitos">
                                            <a href="#!" class="showhide" id="antecedenteshp">Antecedentes y Examen funcional</a>
                                            <div id="l_antecedenteshp" class="cont_sh" style="margin-left:50px;">
                                                <a href="#!" id="nregistro_a" data-toggle="modal" 
                                                data-target="#antemodal">Agregar registro de antecedentes</a>
                                                <?php 
                                                    if( $antecedentes == true ){ 
                                                    	include( "subforms/ficha_antecedentes.php" );
                                                    		foreach( $lhistanteced as $rant ){
                                                        		$fecha = $rant["fecha"];?>
                                                                <div class="reg_antecedentes" id="<?php echo "rega".$rant["id"]; ?>">
                                                                    <a href="#!" class="lnk_gris" data-toggle="modal" data-target="#ficha_anteced" 
                                                                    data-idap="<?php echo $rant["id"]; ?>" data-idp="<?php echo $idp;?>">
                                                                        <?php echo $fecha; ?>
                                                                    </a>
                                                                </div>
                                                		<?php }
												} ?> 
                                                <?php include( "subforms/form_antecedentes.php" ); ?>
                                            </div>
                                            <?php 
												if( $modificacion_ap == true ){ 
													include( "subforms/m_antecedentes.php" ); ?>
                                                    <script> $(document).ready(function(){ $("#mregistro_ap").click();}); </script>
                                            		<a href="#!" id="mregistro_ap" data-toggle="modal" data-target="#rm_anteced"></a>
                                            <?php } ?>
                                        </div>
                                        <?php if( $idp != 0 ){?>
                                            <hr>                                        
                                            <div class="form-group">
                                                <a href="mpaciente.php?p=<?php echo $idp;?>">Editar paciente</a>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <div id="historial_lista">
                                            <table width="100%" border="0" align="left">
                                              <tr height="30px">
                                              <td width="45%" align="right"></td>
                                                <td width="65%" align="left" style="padding-left:10px; margin:8px 0">
                                                    <?php include( "subforms/lista_forms.php" );?>
                                                </td>
                                              </tr>
                                               <?php foreach( $lhist as $h ){ 
                                                $lnk = "historia.php?f=".$h["id"]."&nf=".$h["tbdform"]; ?>
                                              <tr>
                                                <td width="45%" align="right"><?php echo $h["fecha"];?></td>
                                                <td width="65%" align="left" style="padding-left:10px;">
                                                    <a class="lsec" href="<?php echo $lnk;?>"><?php echo $h["tform"];?></a>
                                                </td>
                                              </tr>
                                              <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                <?php } ?>
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