<?php 
	session_start();
	ini_set( 'display_errors', 1 );
	include( "../bd/data-usuario.php" );
	checkSession( "" );
	include( "../bd/data-forms.php" );
	include( "../bd/data-campos.php" );
	include( "../bd/data-informe.php" );
	include( "../bd/data-paciente.php" );
	if( isset( $_GET["nf"] ) && isset( $_GET["f"] ) ){
		if( esParamFormValido( $_GET["nf"], $tforms ) == true )
			$nform = $_GET["nf"];
		else
			$nform = NULL;
			
		$idf = $_GET["f"];
	} else header('Location: index.php');
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
	$form = obtenerRegistroForm( $dbh, $idf, $nform );
	if( $nform == "frm_pie_tobillo" ) $subt = $form["lado"]; else $subt = "";
	if( $nform )
		$tform = "Historia clínica de ".tituloForm( $nform, $subt );
	else
		$tform = "Error de parámetro al buscar registro de historia";
	if( $form ){
		$dfile = obtenerArchivoInforme( $nform );
		
		include( "../bd/".$dfile["file"] );
		$keys = filtrarCamposNumericos( array_keys( $form ) );
		
		//prnt_frm_keys( filtrarCamposNumericos( $keys ) );
		$fecha = obtenerFechaConFormato($dbh, $form["fecha_r"], "%d/%m/%Y");	//Función en bd.php
		$dp = obtenerPacienteId( $dbh, $form["idPaciente"] );
		$motivo = motivoHistoria( $dfile["nombre"], $form, $keys, $dfile["fld_arr"] ); $tdur = tiempo( $form );
		$causas = mlesion( $form, $keys, $dfile["fld_arr"] )."<br>";
		$efisico = efisico( $form, $keys, $dfile["fld_arr"] );
		$studios = estudios( $form, $keys, $dfile["fld_arr"] );
		//$idx = impDiag( $form, $keys, $dfile["fld_arr"] );
		$idx = elemSecForms( "idx", $form, $keys, $dfile["fld_arr"] );
		$plan = plan( $form, $keys, $dfile["fld_arr"] );
		
		$antecedentes = elemSecForms( "antecedentes", $form, $keys, $dfile["fld_arr"] );
		$exfuncional = elemSecForms( "exfuncional", $form, $keys, $dfile["fld_arr"] );
		$exfisico = elemSecForms( "exfisico", $form, $keys, $dfile["fld_arr"] );
		$maniobras = elemSecForms( "maniobras", $form, $keys, $dfile["fld_arr"] );
		$palpacion = elemSecForms( "palpacion", $form, $keys, $dfile["fld_arr"] );
		if(( $nform == "frm_columna_lumbar" ) || ( $nform == "frm_columna_cervical" ) || ( $nform == "frm_columna_dorsal" )){
			$exmiembros = elemSecForms( "exmiembros", $form, $keys, $dfile["fld_arr"] );
		}
		$seguimiento = obtenerConsultaSeguimiento( $dbh, $nform, $form["idPaciente"] );
	}else{
		$seguimiento = array(); $dp = "";
	}
?>
<body >
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
						<?php if ( $form ){?>
                    		<a href="paciente.php?p=<?php echo $form["idPaciente"];?>">
                            	<span class="title"><?php echo $dp["nombre"]." ".$dp["apellido"];?></span>
                        	</a>
						<?php } ?>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<?php if ( $form ){?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<?php echo $tform." ($fecha)"; ?>
                            <div style="float:right;"><?php include( "seguimiento.php" );?></div>
                        </div>
                        <div id="fdata_paciente" class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- --->
                                    <div id="block_motivo">
                                    	<div><span class="lab0">Motivo de consulta</span></div>
                                        <div class="subform txform">
                                            <?php if( isset($form["lado"]) ) $lado = $form["lado"]; else $lado = "";?>
                                        	<div><b>Evaluación <?php echo $dfile["nombre"]." ".$lado;?></b></div>
                                            <div><?php echo $motivo; ?></div>
                                        </div>
                                    </div>
                                    <!-- --->
                                    <div id="enfermedad_actual">
                                    	<div><span class="lab0">Enfermedad actual</span></div>
                                    	<div class="subform">
                                            <div><span><b>Duración síntomas: </span><?php echo $tdur; ?></div>
                                            <div><span><b>Mecanismo Lesión</b></span></div>
                                            <div class="subform txform"><?php echo $causas; ?></div>
                                    	</div>
                                    </div>
                                    <!-- --->
                                    <div id="exfisico">
                                    	<div><span class="lab0">Examen físico</span></div>
                                    	<div class="subform txform">
                                            <div><?php echo $efisico; ?></div>
                                    	</div>
                                    </div>
                                    <!-- --->
                                    <div id="traeestudios" class="txform">
                                    	<div><span class="lab0">Trae estudios</span></div>
                                    	<div class="subform">
                                            <div><?php echo $studios; ?></div>
                                    	</div>
                                    </div>
                                </div>
                                <!-- ================================================= Segunda columna ================================================-->
                                <div class="col-lg-6 txform">
                                    <div id="idx">
                                    	<div><span class="lab0">Impresión diagnóstica</span></div>
                                    	<div class="subform">
                                            <div><?php echo $idx; ?></div>
                                    	</div>
                                    </div>
                                    <!-- * -->
                                    <div id="plan">
                                    	<div><span class="lab0">Plan</span></div>
                                    	<div class="subform">
                                            <div><span class="lab1">Plan</span></div>
                                            <div><?php echo $plan["est"]; ?></div>
                                            <div><?php echo $plan["lab"]; ?></div>
                                            <div><span class="lab1">Referencia</span></div>
                                            <div><?php echo $plan["ref"]; ?></div>
                                            <div><span class="lab1">Procedimiento</span></div>
                                            <div><?php echo $plan["req"]; ?></div>
                                    	</div>
                                    </div>
                                    <!-- * -->
                                    <?php if( isset( $form["borrador"] ) &&  ( $form["borrador"] == 1 ) ) {?>
                                    <div id="modificar_historia" style="margin-top:15px;">
                                    	<a href="informe.php?nf=<?php echo $nform;?>&f=<?php echo $idf;?>" class="lsec">Modificar historia</a>
                                    </div> 
									<?php } ?> 
                                    <div id="informe_historia" style="margin-top:15px;">
                                    	<a href="informe.php?nf=<?php echo $nform;?>&f=<?php echo $idf;?>" class="lsec">Ver informe</a>
                                    </div> 
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <?php } ?><!-- IF FORM -->
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