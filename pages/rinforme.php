<?php 
	ini_set( 'display_errors', 1 );
	include( "../bd/data-forms.php" );
	include( "../bd/data-campos.php" );
	include( "../bd/data-informe.php" );
	include( "../bd/data-paciente.php" );
	$nform = $_GET["nf"];
	$idf = $_GET["f"];
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
	<script src="../js/jquery.cleditor.js"></script>
    <script src="../js/setup.js"></script>
    <script>
		$(document).ready(function(){
			$("textarea").cleditor({ 
				controls: "bold italic underline strikethrough subscript superscript | font size " +
						"style | color highlight removeformat | bullets numbering | outdent " +
						"indent | alignleft center alignright justify | undo redo | " +
						"rule image link unlink | cut copy paste pastetext | print source",
						colors: // colors in the color popup
						"FFF FCC FC9 FF9 FFC 9F9 9FF CFF CCF FCF " +
						"CCC F66 F96 FF6 FF3 6F9 3FF 6FF 99F F9F " +
						"BBB F00 F90 FC6 FF0 3F3 6CC 3CF 66C C6C " +
						"999 C00 F60 FC3 FC0 3C0 0CC 36F 63F C3C " +
						"666 900 C60 C93 990 090 399 33F 60C 939 " +
						"333 600 930 963 660 060 366 009 339 636 " +
						"000 300 630 633 330 030 033 006 309 303",
					fonts: // font names in the font popup
						"Arial,Arial Black,Comic Sans MS,Courier New,Narrow,Garamond," +
						"Georgia,Impact,Sans Serif,Serif,Tahoma,Trebuchet MS,Verdana",
					sizes: // sizes in the font size popup
						"1,2,3,4,5,6,7",
					styles: // styles in the style popup
						[["Paragraph", "<p>"], ["Header 1", "<h1>"], ["Header 2", "<h2>"],
						["Header 3", "<h3>"],  ["Header 4","<h4>"],  ["Header 5","<h5>"],
						["Header 6","<h6>"]] })[0].focus();
		});
	</script>
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="../css/ihstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker3.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.cleditor.css">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interhistorias - Informe autogenerado</title>
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
	
	if( $form ){
		$dfile = obtenerArchivoInforme( $nform );
		include( "../bd/".$dfile["file"] );
		$keys = filtrarCamposNumericos( array_keys( $form ) );
		//prnt_frm_keys( filtrarCamposNumericos( $keys ) );
		$fecha = fecha();
		$dp = obtenerPacienteId( $dbh, $form["idPaciente"] );
		$motivo = motivo( $dfile["nombre"], $form, $keys, $frm_fpt ); $tdur = tiempo( $form );
		$causas = mlesion( $form, $keys, $frm_fpt );
		$efisico = efisico( $form, $keys, $frm_fpt );
		$studios = estudios( $form, $keys, $frm_fpt );
		$idx = impDiag( $form, $keys, $frm_fpt );
		$plan = plan( $form, $keys, $frm_fpt );
	}
	//print_r($motivo);
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
            <?php include( "navbar-header.php" ); ?>
            <!-- /.navbar-top-links -->
            <?php include( "imenu.php" ); ?>
        </nav>
		
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <span class="title"></span>
                    </h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Registrar informe</div>
                        
                        <div id="fdata_paciente" class="panel-body">
                            <div class="row">
                            	<form role="form" id="form_npaciente" method="get">
                                	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    	<textarea id="input1" name="input1">
                                        	<?php if($form){?>
												<?php echo $fecha; ?><br>Identificación<br>
                                                <?php echo $dp["nombre"]." ".$dp["apellido"]; ?><br>
                                                <?php echo $dp["cedula"]; ?><br><br>
                                                <span style="text-decoration: underline;">Informe médico</span><br><br>
                                                <?php echo "Paciente ".$dp["sexo"]." de ".$dp["edad"]." años"; ?> 
                                                de edad quien acude a esta consulta presentando <?php echo $motivo; ?> de 
												<?php echo $tdur; ?>, posterior a
                                                <?php echo $causas; ?><br><br>
                                                <blockquote style="margin: 0 0 0 40px;">
                                                    <div><b>Al examen físico</b></div>
                                                </blockquote><br>
                                                <blockquote style="margin: 0 0 0 45px;">
                                                	<?php echo $efisico;?>
                                                </blockquote><br>
                                                <blockquote style="margin: 0 0 0 40px;">
                                                    <div><b>Trae estudios</b></div>
                                                </blockquote><br>
                                                <blockquote style="margin: 0 0 0 45px;">
                                                	<?php echo $studios;?>
                                                </blockquote><br>
                                                <blockquote style="margin: 0 0 0 40px;">
                                                    <div><b>Impresión diagnóstica</b></div>
                                                </blockquote><br><br>
                                                <blockquote style="margin: 0 0 0 45px;">
                                                	<?php echo $idx;?>
                                                </blockquote><br>
                                                <blockquote style="margin: 0 0 0 40px;">
                                                    <div><b>Plan</b></div>
                                                </blockquote>
                                                <blockquote style="margin: 0 0 0 45px; border: none; text-decoration:underline;">
                                                    <div>Se indican los siguientes estudios: </div>
                                                </blockquote><br>
                                                <blockquote style="margin: 0 0 0 50px;">
                                                	<?php echo $plan["est"];?>
                                                </blockquote><br>
                                                <blockquote style="margin: 0 0 0 45px; border: none; text-decoration:underline;">
                                                    <div>Se refiere para: </div>
                                                </blockquote><br>
                                                <blockquote style="margin: 0 0 0 50px;">
                                                	<?php echo $plan["ref"];?>
                                                </blockquote><br>
                                                <blockquote style="margin: 0 0 0 45px; border: none; text-decoration:underline;">
                                                    <div>Amerita: </div>
                                                </blockquote>
                                                <blockquote style="margin: 0 0 0 50px;">
                                                	<?php echo $plan["req"];?>
                                                </blockquote>                                       
                                            <?php }?>
                                        </textarea>		
                                	</div>
                                    <!-- /.col-lg-6 (nested) -->
                                    
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