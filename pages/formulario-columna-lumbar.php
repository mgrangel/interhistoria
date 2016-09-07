<?php
	/*
	 * Interhistorias - Formulario de columna lumbar
	 * 
	 */
	session_start();
	ini_set( 'display_errors', 1 );
	include( "../bd/data-usuario.php" );
	checkSession( "" );
	include( "../bd/data-paciente.php" );
?>
<!DOCTYPE html>
<html lang="es">
	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/bootstrapValidator.min.js"></script>
    <script src="../js/setup_fcl.js"></script>
    <script src="../js/initih.js"></script>
    <script src="../js/roundslider.js"></script>
    <script src="../js/maphl.js"></script>
    <script>
		$(function() {
			$('.map').maphilight({
				fillColor: '008800'
			});
			$('.mhle').click(function(e) {
				e.preventDefault();
				var cl = $(this).attr('data-cl');
				var data = $("."+cl).mouseout().data('maphilight') || {};
				data.alwaysOn = !data.alwaysOn;
				$("." + cl).data('maphilight', data).trigger('alwaysOn.maphilight');
			});
    	});
    </script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/jquery.ui.touch-punch.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapValidator.css">
    <link rel="stylesheet" typ e="text/css" href="../css/ihstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/roundslider.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    <style>
    	.rslide{ margin-right:12px; padding:18px; }
    </style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interhistorias - Formulario columna lumbar</title>

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
            <?php //include( "imenu.php" );?>
        </nav>
		<!-- Navigation -->
      	<div id="page-wrapper" style="margin:0;">
            <div class="row">
                <div class="col-lg-12" <?php if( $nuser == "mikeven" ){ ?> onClick="checkAll( 'frm_columna_lumbar' )"<?php }?>>
                    <h1 class="page-header"><span class="title">Historia Clínica de Columna Lumbar</span></h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<button class="btn btn-form-blanco" data-toggle="modal" 
                            data-target="#myModal" style="float:left;">Seleccionar paciente</button>
                             <!-- Modal --><?php include( "lpacientes.php" );?><!-- /.modal -->
                            <div id="nombre_paciente"><?php echo $dpaciente["nombre"];?></div>
                            <div style="clear:both;"></div>   
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" id="frm_columna_lumbar" class="form_historia">
                                    <div class="col-lg-6" id="primera_columna">
                                        <input type="hidden" name="idPaciente" id="idp" value="<?php echo $dpaciente["idp"];?>">
                                        <input type="hidden" name="idUsuario" id="idu" value="<?php echo $idu;?>">
                                        <!-- Motivo de Consulta -->
                                        <div class="form-group" id="motivo_consulta">
                                        	<label for="exampleInputEmail1" class="tsec">Motivo de Consulta</label>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" name="mc_traumatismo">Traumatismo</label>
                                            </div>
                                            <!-- Dolor -->
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" id="chdolor" name="dolor">Dolor</label>
                                            </div>
                                            <div id="blockdolor" class="form-group subform">
                                                <div class="checkbox">
                                                  <label for="sitio">Sitio</label>
                                                  <input type="text" class="form-control finput" name="dol_sitio">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="inicio_desencad">Inicio-desencadenantes</label>
                                                  <input type="text" class="form-control finput" name="dol_inidesencad">
                                                </div>
                                                <div class="checkbox">
                                                  	<label for="caracter_tipo">Carácter-tipo</label>
                                                  	<select class="form-control" name="dol_cartipo" onChange="chopt(this)" id="ldctipo">
                                                        <option value="" selected>Ninguno</option>
                                                        <option value="punzante">Punzante</option>
                                                        <option value="opresivo">Opresivo</option>
                                                        <option value="sordo">Sordo</option>
                                                        <option value="terebrante">Terebrante</option>
                                                        <option value="lancinante">Lancinante</option>
                                                        <option value="urente">Urente</option>
                                                        <option value="otro">Otro</option>
                                                    </select>
                                                    <div class="form-group" id="tx_ctipo" style="padding:8px 0;">
                                                        <input class="form-control" name="x_ctipo" id="txcaract">
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="irradiaciones">Irradiaciones</label>
                                                  <input type="text" class="form-control finput" name="dol_irrad">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="asociaciones">Asociaciones</label>
                                                  <input type="text" class="form-control finput" name="dol_asoc">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="tiempo_horario_acalmias">Tiempo-horario-acalmias</label>
                                                  <input type="text" class="form-control finput" name="dol_tha">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="exacerbantes_atenuantes">Exacerbantes</label>
                                                  <input type="text" class="form-control finput" name="dol_exa">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="exacerbantes_atenuantes">Atenuantes</label>
                                                  <input type="text" class="form-control finput" name="dol_aten">
                                                </div>
                                                <div class="checkbox">
                                                  	<label for="Severidad">Severidad</label>
                                                  	<select class="form-control" name="dol_sever">
                                                        <option value="" selected>Ninguno</option>
                                                        <option value="ocasional">Ocasional</option>
                                                        <option value="leve">Leve</option>
                                                        <option value="moderado">Moderado</option>
                                                        <option value="severo">Severo</option>
                                                        <option value="incapacitante">Incapacitante</option>
                                                	</select>
                                                </div>
                                            </div><!-- /.Dolor -->
                                            
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="mc_aumento_vol">Aumento de volumen</label>
                                            </div>
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="mc_deformidad">Deformidad</label>
                                            </div>
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="mc_rigid_art">Rigidez</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="x_mc_otros" class="sw">Otros</label>
                                                <input type="text" id="x_mc_otros" class="form-control finput fw" name="mc_otros">
                                            </div>
                                        </div><!-- /.Motivo de Consulta -->
                                        <hr>
                                        <!-- Enfermedad Actual -->
                                        <div class="form-group">
                                            <div><label for="exampleInputEmail1" class="tsec">Enfermedad Actual</label></div>
                                            <!-- Duración Síntomas -->
                                            <div class="form-group subform">
                                                <div><label>Duración Síntomas</label></div>
                                                <label class="radio-inline">
                                                    <input type="radio" name="rb_ds" class="rbdur" value="dur_d">Días
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="rb_ds" class="rbdur" value="dur_s">Semanas
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="rb_ds" class="rbdur" value="dur_m">Meses
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="rb_ds" class="rbdur rbdur_ld" value="dur_ld">Larga data
                                                </label>
                                                <div class="checkbox" id="dur_sin">
                                                  <input type="text" class="form-control finput" name="dur_sin">
                                                </div>
                                        	</div><!-- /.Duración Síntomas -->
                                            
                                            <!-- Mecanismo Lesión -->
                                        	<div class="form-group subform">
                                                <div>
                                                  <label for="exampleInputEmail1">Mecanismo Lesión</label></div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_caida_pies">Caída propios pies</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_caida_altura">Caída altura</label>
                                                </div>
                                                
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_trauma_cort">Traumatismo cortante</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_acc_deport">Accidente deportivo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_acc_trans">Accidente tránsito</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ml_acc_inesp">Accidente inespecífico</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_arroll">Arrollamiento</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_rot_forzada">Rotación forzada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_hipex">Hiperextensión</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_insidioso">Insidioso</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="ml_otros" title="300">
                                                </div>
                                        	</div><!-- /.Mecanismo Lesión -->
                                        </div><!-- /.Enfermedad Actual -->
                                        <hr>
                                        <!-- Examen Físico(1) -->
                                        <div class="form-group">
                                            <div><label for="examen_fisico" class="tsec">Examen Físico</label></div>
                                            <!-- Inspección -->
                                            <div class="form-group subform">
                                                <div><label for="exampleInputEmail1">Inspección</label></div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_avol">Aumento de volumen</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txed" class="sw" alt="nobd">Edema</label>
                                                    <input type="text" id="x_txed" class="form-control finput fw" name="ins_edema">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txma" class="sw" alt="nobd">Masas</label>
                                                    <input type="text" id="x_txma" class="form-control finput fw" name="ins_masas">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txdef" class="sw" alt="nobd">Deformidades</label>
                                                    <input type="text" id="x_txdef" class="form-control finput fw" name="ins_deform">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_mcafe">Manchas café au lait</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_diast">Diastematomielia</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_atonmus">Aumento de tono muscular</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="ins_aglob">Abdomen globoso</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="ins_notas1" placeholder="Notas">
                                                </div>
                                            </div><!-- /.Inspección -->
                                            
                                            <!-- Rangos -->
                                            <div class="form-group subform">
                                                <div><label for="exampleInputEmail1">Rangos Activos</label></div>
                                                <div class="row">
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left"><label class="checkbox-inline">Flex - Ext</label></div>
                                                        <div id="rs_flex_ext"></div>
                                                        <div id="rsfev" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_flexion" id="rsra_flexion">
                                                        <input type="hidden" class="form-control finput" name="ra_extension" id="rsra_extension">
                                                    </div>
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left"><label class="checkbox-inline">Rotación</label></div>
                                                        <div id="rs_rot"></div>
                                                        <div id="rsrv" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_rotizq" id="rsra_rotizq">
                                                        <input type="hidden" class="form-control finput" name="ra_rotder" id="rsra_rotder">
                                                    </div>
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left">
                                                        <label class="checkbox-inline">Lateralización</label></div>
                                                        <div id="rs_lat"></div>
                                                        <div id="rslv" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_latizq" id="rsra_latizq">
                                                        <input type="hidden" class="form-control finput" name="ra_latder" id="rsra_latder">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group subform" style="width:100%;">
                                                <div><label for="exampleInputEmail1">Rangos Pasivos</label></div>
                                                <div class="row">
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left"><label class="checkbox-inline">Flex - Ext</label></div>
                                                        <div id="rs_flex_ext_p"></div>
                                                        <div id="rsfev_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_flexion" id="rsrp_flexion">
                                                        <input type="hidden" class="form-control finput" name="rp_extension" id="rsrp_extension">
                                                    </div>
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left"><label class="checkbox-inline">Rotación</label></div>
                                                        <div id="rs_rot_p"></div>
                                                        <div id="rsrv_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_rotizq" id="rsrp_rotizq">
                                                        <input type="hidden" class="form-control finput" name="rp_rotder" id="rsrp_rotder">
                                                    </div>
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left">
                                                        <label class="checkbox-inline">Lateralización</label></div>
                                                        <div id="rs_lat_p"></div>
                                                        <div id="rslv_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_latizq" id="rsrp_latizq">
                                                        <input type="hidden" class="form-control finput" name="rp_latder" id="rsrp_latder">
                                                    </div>
                                                </div>
                                            </div><!-- /.Rangos -->
                                        
                                            <!-- Maniobras -->
                                            <div class="form-group subform" id="bloque_maniobras">
                                                <label for="maniobras">
                                                    <a href="#!" data-toggle="modal" data-target="#manmodal" class="lseclnk">
                                                    Maniobras <i class="fa fa-list-alt"></i></a>
                                                </label>
                                                <?php include( "subforms/man_tfcl.php" ); ?>
                                                <div id="lmancl" class="selopciones"></div>
                                            </div><!-- /.Maniobras -->
                                            
                                            <!-- Palpación -->
                                            <div class="form-group subform">
                                                <label for="palpacion">Palpación</label>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_lmedia" class="sw" alt="nobd">Línea media</label>
                                                    <input type="text" id="x_pal_lmedia" class="form-control finput fw" name="pal_lmedia">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_procapes" class="sw" alt="nobd">Apófisis espinosas</label>
                                                    <input type="text" id="x_pal_procapes" class="form-control finput fw" name="pal_procapes">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="pal_coxis">Coxis</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="pal_sinpub">Sínfisis púbica</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="pal_coltor">Columna torácica</label>
                                                </div>
                                                <div class="checkbox">
                                                    <table width="100%" border="0" class="tform">
                                                      <tr>
                                                        <td width="60%">Sacroilíaca</td>
                                                        <td width="20%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_sacizq">Izq</label></td>
                                                        <td width="20%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_sacder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td width="70%">Trocánter</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_troizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_troder">Der</label></td>
                                                        
                                                      </tr>
                                                      <tr>
                                                        <td width="70%">Isquion</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                      <input type="checkbox" name="pal_isqizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                      <input type="checkbox" name="pal_isqder">Der</label></td>
                                                        
                                                      </tr>
                                                      <tr>
                                                        <td width="70%">Glúteo</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_gluizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_gluder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td width="70%">E.I.A.S.</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_eiasizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_eiasder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td width="70%">E.I.P.S.</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_eipsizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_eipsder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td width="70%">Cresta ilíaca</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_crilizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_crilder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td width="70%">Paravertebral</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_parverizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_parverder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td width="70%">Ligamento inguinal</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_ligingizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_ligingder">Der</label></td>
                                                      </tr>
                                                    </table>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="pal_notas" placeholder="Notas">
                                                </div>
                                            </div><!-- /.Palpación -->
                                        
                                            <!-- Examen de Miembro Inferior Izquierdo -->
                                            <div class="form-group subform">
                                                <div>
                                                    <label for="exam_miembro_inf_izq">Examen de Miembro Inferior Izquierdo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label for="rfi_medreal">Medición real(cm)</label>
                                                  <div id="rfi_medreal" class="sldbarval" style="width:85%; float:left;"></div>
                                                  <div id="rfi_medreal_val" class="labsldbarval"></div>
                                                  <div style="clear:both;"></div>
                                                  <input type="hidden" class="form-control finput" name="rfi_medreal" id="frm_rfi_medreal">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="rfi_pultibost">Pulso tibial posterior</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="rfi_pulsopop">Pulso poplíteo</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="rfi_pulfemo">Pulso femoral</label>
                                                </div>
                                                
                                                <!-- ROT -->
                                                <div class="form-group subform">
                                                    <div><label for="rot">ROT</label></div>
                                                    <div class="checkbox">
                                                        <label for="Patelar">Patelar</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_patelar" value="0/4">0/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_patelar" value="1/4">1/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_patelar" value="2/4">2/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_patelar" value="3/4">3/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_patelar" value="4/4">4/4
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="aquiles">Aquiles</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_aquiles" value="0/4">0/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_aquiles" value="1/4">1/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_aquiles" value="2/4">2/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_aquiles" value="3/4">3/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_aquiles" value="4/4">4/4
                                                        </label>
                                                    </div>
                                                </div><!-- /.ROT -->
                                                
                                                <!-- Sensibilidad -->
                                                <div class="form-group subform">
                                                    <div><label for="Sensibilidad">Sensibilidad</label></div>
                                                    <div class="form-group subform">
                                                        <a href="#!" data-toggle="modal" data-target="#myModalSIDerm">
                                                        Dermatomas <i class="fa fa-image"></i></a>
                                                        <div id="dermatlumb_izq"></div>
                                                        <div style="clear:both;"></div>
                                                        <?php include( "fcldti.html" ); ?>
                                                    </div>
                                                    <div class="form-group subform">
                                                        <a href="#!" data-toggle="modal" data-target="#myModalSI">
                                                        Territorios nerviosos <i class="fa fa-image"></i></a>
                                                        <div id="sensetnsi"></div>
                                                        <div style="clear:both;"></div>
                                                        <?php include( "fclsensmsi.html" ); ?>
                                                    </div>
                                                </div><!-- /.Sensibilidad -->
                                                
                                                <!-- Fuerza muscular -->
                                                <div class="form-group subform">
                                                    <div><label for="fuerza_muscular_mii">Fuerza muscular</label></div>
                                                    <div class="form-group subform">
                                                        <div class="checkbox">
                                                            <div><label for="rfi_flexcadl2" style="font-weight:lighter;">Flexión cadera L2</label></div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexcadl2" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexcadl2" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexcadl2" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexcadl2" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexcadl2" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexcadl2" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <div><label for="emsi_fmusc" style="font-weight:lighter;">Extensión rodilla L3</label></div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_extrodl3" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_extrodl3" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_extrodl3" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_extrodl3" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_extrodl3" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_extrodl3" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <div><label for="emsi_fmusc" style="font-weight:lighter;">Dorsiflexión pie L4</label></div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_dorflel4" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_dorflel4" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_dorflel4" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_dorflel4" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_dorflel4" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_dorflel4" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <div><label for="emsi_fmusc" style="font-weight:lighter;">Extensión Hallux L5</label></div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_exthalll5" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_exthalll5" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_exthalll5" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_exthalll5" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_exthalll5" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_exthalll5" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <div><label for="emsi_fmusc" style="font-weight:lighter;">Flexión plantar pie S1</label></div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_fleplans1" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_fleplans1" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_fleplans1" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_fleplans1" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_fleplans1" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_fleplans1" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <div><label for="emsi_fmusc" style="font-weight:lighter;">Flexión rodilla S2</label></div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexrods2" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexrods2" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexrods2" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexrods2" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexrods2" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfi_flexrods2" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="text" class="form-control finput" 
                                                            name="rfi_eminotas" placeholder="Notas">
                                                        </div>
                                                    </div>
                                                </div><!-- /.Fuerza muscular -->
                                            
                                            </div><!-- /.Examen de Miembro Inferior Izquierdo -->
                                        
                                        </div><!-- /.Examen Físico(1) -->
                                        
                                    </div><!-- /.primera_columna -->
                                    <!--========================================= Fin primera columna ==================================== -->
                                    <!--=========================================== Segunda columna ====================================== -->
                                    <div class="col-lg-6" id="segunda_columna">
                                        <!-- Examen físico(2) -->
                                        <div class="form-group examen-físico">
                                            <!-- Examen de Miembro Inferior Derecho -->
                                            <div class="form-group subform">
                                                <div><label for="exam_miembro_inf_izq">Examen de Miembro Inferior Derecho</label></div>
                                                <div class="checkbox">
                                                    <label for="rfd_medreal">Medición real(cm)</label>
                                                    <div id="rfd_medreal" class="sldbarval" style="width:85%; float:left;"></div>
                                                    <div id="rfd_medreal_val" class="labsldbarval"></div>
                                                    <div style="clear:both;"></div>
                                                    <input type="hidden" class="form-control finput" name="rfd_medreal" id="frm_rfd_medreal">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="rfd_pultibost">Pulso tibial posterior</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="rfd_pulsopop">Pulso Poplíteo</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="rfd_pulfemo">Pulso femoral</label>
                                                </div>
                                                <!-- ROT -->
                                                <div class="form-group subform">
                                                    <div><label for="rot">ROT</label></div>
                                                    <div class="checkbox">
                                                        <label for="Patelar">Patelar</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_patelar" value="0/4">0/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_patelar" value="1/4">1/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_patelar" value="2/4">2/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_patelar" value="3/4">3/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_patelar" value="4/4">4/4
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="aquiles">Aquiles</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_aquiles" value="0/4">0/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_aquiles" value="1/4">1/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_aquiles" value="2/4">2/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_aquiles" value="3/4">3/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_aquiles" value="4/4">4/4
                                                        </label>
                                                    </div>
                                                </div><!-- /.ROT -->
                                                
                                                <!-- Sensibilidad -->
                                                <div class="form-group subform">
                                                    <div><label for="Sensibilidad">Sensibilidad</label></div>
                                                    <div class="form-group subform">
                                                        <a href="#!" data-toggle="modal" data-target="#myModalSDDerm">
                                                        Dermatomas <i class="fa fa-image"></i></a>
                                                        <div id="dermatlumb_der"></div>
                                                        <div style="clear:both;"></div>
                                                        <?php include( "fcldtd.html" ); ?>
                                                    </div>
                                                    <div class="form-group subform">
                                                        <a href="#!" data-toggle="modal" data-target="#myModalSD">
                                                            Territorios nerviosos <i class="fa fa-image"></i></a>
                                                        <div id="sensetnsd"></div>
                                                        <div style="clear:both;"></div>
                                                        <?php include("fclsensmsd.html"); ?>
                                                    </div>
                                                </div><!-- /.Sensibilidad -->
                                                
                                                <!-- Fuerza muscular -->
                                                <div class="form-group subform">
                                                    <div><label for="fuerza_muscular_mid">Fuerza muscular</label></div>
                                                    <div class="form-group subform">
                                                        <div class="checkbox">
                                                            <div>
                                                                <label for="emsi_fmusc" style="font-weight:lighter;">Flexión cadera L2</label>
                                                            </div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexcadl2" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexcadl2" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexcadl2" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexcadl2" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexcadl2" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexcadl2" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <div><label for="emsi_fmusc" style="font-weight:lighter;">Extensión rodilla L3</label></div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_extrodl3" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_extrodl3" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_extrodl3" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_extrodl3" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_extrodl3" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_extrodl3" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <div>
                                                                <label for="emsi_fmusc" style="font-weight:lighter;">Dorsiflexión pie L4</label>
                                                            </div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_dorflel4" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_dorflel4" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_dorflel4" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_dorflel4" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_dorflel4" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_dorflel4" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <div><label for="emsi_fmusc" style="font-weight:lighter;">Extensión Hallux L5</label></div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_exthalll5" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_exthalll5" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_exthalll5" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_exthalll5" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_exthalll5" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_exthalll5" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <div><label for="emsi_fmusc" style="font-weight:lighter;">Flexión plantar pie S1</label></div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_fleplans1" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_fleplans1" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_fleplans1" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_fleplans1" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_fleplans1" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_fleplans1" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <div><label for="emsi_fmusc" style="font-weight:lighter;">Flexión rodilla S2</label></div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexrods2" value="0/5">0/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexrods2" value="1/5">1/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexrods2" value="2/5">2/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexrods2" value="3/5">3/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexrods2" value="4/5">4/5
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rfd_flexrods2" value="5/5">5/5
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="text" class="form-control finput" 
                                                            name="rfd_eminotas" placeholder="Notas">
                                                        </div>
                                                    </div>
                                                </div><!-- /.Fuerza muscular -->   
                                            
                                            </div><!-- /.Examen de Miembro Inferior Derecho -->
                                            
                                            <!-- Sub-bloque examen físico -->
                                            <div class="form-group">
                                                <div class="checkbox">
                                                  <label for="ef_medmsis">Medición aparente izquierdo(cm)</label>
                                                  <div id="ef_medapai" class="sldbarval" style="width:85%; float:left;"></div>
                                                  <div id="ef_medapai_val" class="labsldbarval"></div>
                                                  <div style="clear:both;"></div>
                                                  <input type="hidden" class="form-control finput" name="ef_medapai" id="frm_ef_medapai">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="ef_medmsis">Medición aparente derecho(cm)</label>
                                                  <div id="ef_medapad" class="sldbarval" style="width:85%; float:left;"></div>
                                                  <div id="ef_medapad_val" class="labsldbarval"></div>
                                                  <div style="clear:both;"></div>
                                                  <input type="hidden" class="form-control finput" name="ef_medapad" id="frm_ef_medapad">
                                                </div>
                                                
                                                <!-- EX FCA -->
                                                <div class="checkbox">
                                                    <a href="#!" class="lseclnk_drop sw" name="x_ef_excadera">Examen de caderas <i class="fa fa-chevron-down">
                                                    </i></a>
                                                </div>
                                                <div id="x_ef_excadera" class="checkbox fw extlnkform">
                                                    <div class="checkbox">
                                                        <label for="ef_excadera">Examen de caderas</label>
                                                        <input type="text" class="form-control finput" name="ef_excadera">
                                                    </div>
                                                    <label for="ef_excadera">
                                                        <a id="lnkidp_c" href="formulario-cadera-adulto.php<?php echo $lnkidp;?>" 
                                                        data-nfrm="formulario-cadera-adulto.php" target="_blank">
                                                        Examen de cadera del adulto <i class="fa fa-external-link"></i></a>
                                                    </label>
                                                </div><!-- /.EX FCA -->
                                                
                                                <!-- EX FCD -->
                                                <div class="checkbox">
                                                    <a href="#!" class="lseclnk_drop sw" 
                                                    name="x_ef_excoltor">Examen columna torácica <i class="fa fa-chevron-down"></i></a>
                                                </div>
                                                <div id="x_ef_excoltor" class="checkbox fw extlnkform">
                                                    <div class="checkbox">
                                                      <label for="ef_excoltor">Examen columna torácica</label>
                                                      <input type="text" class="form-control finput" name="ef_excoltor">
                                                    </div>
                                                    <label for="ex_columbar">
                                                        <a id="lnkidp" href="formulario-columna-dorsal.php<?php echo $lnkidp;?>" 
                                                        data-nfrm="formulario-columna-dorsal.php" target="_blank">
                                                        Examen de columna dorsal<i class="fa fa-external-link"></i></a>
                                                    </label>
                                                </div><!-- /.EX FCD -->
                                                
                                                <div class="checkbox">
                                                  <label for="ef_cacinaf">Cadena cinemática afectada</label>
                                                  <input type="text" class="form-control finput" name="ef_cacinaf">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="ef_marcha">Marcha</label>
                                                  <input type="text" class="form-control finput" name="ef_marcha">
                                                </div>
                                                <div class="checkbox">
                                                  <input type="text" class="form-control finput" name="ef_notas" placeholder="Notas">
                                                </div>
                                            
                                            </div><!-- /.Sub-bloque examen físico -->
                                        </div><!-- /.Examen físico(2) -->
                                        <hr>
                                        <!--Trae Estudios-->
                                        <div class="form-group">
                                            <div>
                                              <label for="estudios" class="tsec">Trae Estudios</label></div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txrx" class="sw">Rayos X</label>
                                                <textarea id="x_txrx" class="form-control finput fw" name="es_rx" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txrm" class="sw">RM</label>
                                                <textarea id="x_txrm" class="form-control finput fw" name="es_rm" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txtac" class="sw">TAC</label>
                                                <textarea id="x_txtac" class="form-control finput fw" name="es_tac" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txus" class="sw">US</label>
                                                <textarea id="x_txus" class="form-control finput fw" name="es_us" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txemg" class="sw">EMG</label>
                                                <textarea id="x_txemg" class="form-control finput fw" name="es_emg" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txeab" class="sw">Eco abdominal</label>
                                                <textarea id="x_txeab" class="form-control finput fw" name="es_ecoab" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txlab" class="sw">Laboratorios</label>
                                                <textarea id="x_txlab" class="form-control finput fw" name="es_labs" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txotr" class="sw">Otros</label>
                                                <input type="text" id="x_txotr" class="form-control finput fw" name="es_otros">
                                            </div>
                                        </div><!-- /.Trae Estudios-->
                                        <hr>
                                        <!-- Impresión Diagnóstica -->
                                        <div class="form-group" id="bloque_idx">
                                            <label for="impresion_diagnostica">
                                                <a href="#!" data-toggle="modal" data-target="#idxmodal" 
                                                class="lsec">Impresión Diagnóstica <i class="fa fa-list-alt"></i></a>
                                            </label>
                                            <?php include( "subforms/tidx_fcl.php" )?>
                                            <div id="lidxcl" class="selopciones"></div>
                                        </div><!-- /.Impresión Diagnóstica -->
                                        <hr>
                                        <!-- Plan -->
                                        <div class="form-group">
                                            <div><label for="plan" class="tsec">Plan</label></div>
                                            <!-- RX -->
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" id="chrx" name="x_pl_rx">Rayos X</label>
                                            </div>
                                            <div class="form-group subform" id="blockrx">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_ap">AP</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_lat">Lateral</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_din">Dinámicas</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_oblic">Oblícuas</label>
                                                </div>
                                            </div><!-- /.RX -->
                                            
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_ecotest">Eco testicular</label>
                                            </div>
                                            
                                            <!-- RM -->
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_rm" id="chrm">RM</label>
                                            </div>
                                            <div class="form-group subform" id="blockrm">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_rmcls">Resonancia magnética columna lumbo-sacra</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" 
                                                  name="pl_rmctls">Resonancia magnética de columna toraco-lumbar con Stir</label>
                                                </div>
                                            </div><!-- /.RM -->
                                            
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_tac">TAC</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_tac3d">TAC +3D</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_us">US</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_emgmmii">EMG MMII</label>
                                            </div>
                                            
                                            <!-- Laboratorios -->
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_labs" id="chlabs">Laboratorios</label>
                                            </div>
                                            <div class="form-group subform" id="blocklabs">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_perfil20">Perfil 20</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_perfilpo">Perfil preoperatorio</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_reuma">Perfil reumatoideo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_tiroid">Perfil tiroideo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_hemat">Hematología completa</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_qsang">Química sanguínea</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_phepat">Pruebas hepáticas</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_ptpttinr">PT/PTT/INR</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_pcr">PCR cualitativo y cuantitativo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_vsg">VSG</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_hba1c">HbA1c</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_fta">FTA</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="lab_otros">Otras</label>
                                                </div>
                                            </div><!-- Laboratorios -->
                                        	<div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_pl_otros" class="sw">Otros</label>
                                                <input type="text" id="x_pl_otros" class="form-control finput fw" name="pl_otros">
                                            </div>
                                            <!-- SubPlan -->
                                            <div class="form-group subform">
                                            	<!-- Referencias -->
                                            	<div class="form-group">
                                                    <label for="Palpación">Referencias</label>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ref_rehab">Rehabilitación</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ref_reuma">Reumatología</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ref_endoc">Endocrinología</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ref_neuro">Neurocirugía</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="x_ref_dr" class="sw">Dr.</label>
                                                        <input type="text" id="x_ref_dr" class="form-control finput fw mayusc" name="ref_dr">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="x_ref_preoper" class="sw">Preoperatorio</label>
                                                        <input type="text" id="x_ref_preoper" class="form-control finput fw" name="ref_preoper">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_txrefotros" class="sw">Otros</label>
                                                        <input type="text" id="x_txrefotros" class="form-control finput fw" name="ref_otros">
                                                    </div>
                                            	</div><!-- /.Referencias -->
                                                
                                                <!-- Procedimientos -->    
                                                <div class="form-group">
                                                    <label for="Palpación">Procedimientos</label>
                                                    <div class="checkbox">
                                                    	<label class="checkbox-inline">
                                                    	<input type="checkbox" name="pro_infiltra" id="chinf" class="sw">Infiltración</label>
                                                    </div>
                                                    <div id="pro_infiltra" class="fw subform">
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="pro_anestlocal">Anestesia local</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="pro_esteroides">Esteroides</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pro_notas" class="sw">Otros</label>
                                                            <input type="text" id="x_pro_notas" class="form-control finput fw" name="pro_notas">
                                                        </div>
                                                    </div>
                                                </div><!-- /.Procedimientos -->
                                                
                                                <!-- Cirugía -->
                                                <div class="form-group">
                                                    <label for="cirugia">Cirugía</label>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="cir_artrodes">Artrodesis</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="cir_artroplas">Artroplastia</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_cir_notas" class="sw">Otros</label>
                                                        <input type="text" id="x_cir_notas" class="form-control finput fw" name="cir_notas">
                                                    </div>
                                                </div><!-- /.Cirugía -->
                                            	
                                            </div><!-- /.SubPlan -->
                                        	
                                        </div><!-- /.Plan -->
                                    
                                    </div><!-- /.segunda_columna -->
                                    <div align="center">
                                        <button type="button" class="btn btn-form" data-toggle="modal" 
                                        data-target="#confirm_modal">Guardar</button>
                                        <?php include("subforms/confirm.php")?>
                                    </div>
                                    <!--<a href="#!" onClick="getElems('frm_columna_lumbar')">.</a>-->
                                    <div id="formelems"></div><div id="nresp"></div>
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
    <!-- /#wrapper -->
</body>
</html>
<?php include_once( "analyticstracking.php" ) ?>