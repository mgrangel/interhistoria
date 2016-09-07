<?php
	/*
	 * Interhistorias - Formulario de columna cervical
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
    <script src="../js/bootstrapValidator.min.js"></script>
    <script src="../js/setup_fcc.js"></script>
    <script src="../js/initih.js"></script>
    <script src="../js/roundslider.js"></script>
    <script src="../js/jquery.rwdImageMaps.js"></script>
    <script src="../js/maphl.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/jquery.ui.touch-punch.min.js"></script>
    <script>
		$(function() {
			$('.map').maphilight({
				fillColor: '008800'
			});
			$('.mhle').click(function(e) {
				e.preventDefault();
				var cl = $(this).attr('data-cl');
				var data = $("." + cl).mouseout().data('maphilight') || {};
				data.alwaysOn = !data.alwaysOn;
				$("." + cl).data('maphilight', data).trigger('alwaysOn.maphilight');
			});
    	});
    </script>
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="../css/ihstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../css/roundslider.css">
	<script>
    	/*$(document).ready(function(e) {
			$('img[usemap]').rwdImageMaps();
		});*/
    </script>
    <style>
    	.xhlmap {
			background-color: #778899; width: 50px; height: 50px; display: block;
		}
	
		.xhlmap:hover {
			background-color: #87CEEB; 
		}
    </style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interhistorias - Formulario columna cervical</title>

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
                <div class="col-lg-12">
                    <h1 class="page-header" <?php if( $nuser == "mikeven" ){ ?> onClick="checkAll( 'frm_columna_cervical' )"<?php }?>>
                    <span class="title">Historia Clínica de Columna Cervical</span></h1>
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
                                <form role="form" id="frm_columna_cervical" class="form_historia">
                                    <!-- Primera columna -->
                                    <div class="col-lg-6" id="primera_columna">
                                        <!-- Motivo de Consulta -->
                                        <div class="form-group" id="bloque_motivo_consulta">
                                        	<input type="hidden" name="idPaciente" id="idp" value="<?php echo $dpaciente["idp"];?>">
                                            <input type="hidden" name="idUsuario" id="idu" value="<?php echo $idu;?>">
                                        	<label for="motivo" class="tsec">Motivo de Consulta</label>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" name="mc_traumatismo">Traumatismo</label>
                                            </div>
                                            <!-- Dolor -->
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" id="chdolor" name="dolor">Dolor</label>
                                            </div>
                                            <div class="form-group subform" id="blockdolor">
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
                                                        <option value="Otro">Otro</option>
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
                                              <label><input type="checkbox" name="mc_mareos">Mareos</label>
                                            </div>
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="mc_nauseas">Náuseas</label>
                                            </div>
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="mc_desmayo">Desmayo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="mc_rigid_art">Rigidez articular</label>
                                            </div>
                                           	<div class="checkbox">
                                            	<input type="text" class="form-control finput" name="mc_notas" placeholder="Notas">
                                            </div>
                                        </div><!-- Motivo de Consulta -->
                                       	<hr> 
                                        <!-- Enfermedad Actual -->
                                        <div class="form-group">
                                            <label for="eactual" class="tsec">Enfermedad Actual</label>
                                            <!-- Duración Síntomas -->
                                            <div class="form-group subform">
                                                <div class="form-group">
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
                                                </div>
                                        	</div><!-- /.Duración Síntomas -->
                                            
                                            <!-- Mecanismo Lesión -->
                                        	<div class="form-group subform">
                                                <label for="exampleInputEmail1">Mecanismo Lesión</label>
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
                                                  <input type="checkbox" name="ml_tracor">Traumatismo cortante</label>
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
                                                  <input type="checkbox" name="ml_rot_forzada">Rotación</label>
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
                                                    <input type="text" class="form-control finput" name="ml_otros" 
                                                    title="300" placeholder="Notas">
                                                </div>
                                            </div><!-- /.Mecanismo Lesión -->
                                        
                                        </div><!-- /.Enfermedad Actual -->
                                        <hr>
                                        <!-- Examen Físico(1) -->
                                        <div class="form-group bloque-ef">
                                            <label for="exampleInputEmail1" class="tsec">Examen Físico</label>
                                            <!-- Rangos -->
                                            <div class="form-group subform">
                                                <div><label for="rangos_activos">Rangos Activos</label></div>
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
                                            <div class="form-group subform">
                                                <div><label for="rangos_pasivos">Rangos Pasivos</label></div>
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
                                            
                                            <!-- Inspección -->
                                            <div class="form-group subform" id="bloque_inspeccion">
                                            	<label for="inspeccion">Inspección</label>
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
                                                  <input type="checkbox" name="ins_aumtmusc">Aumento de tono muscular</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="ins_notas" placeholder="Notas">
                                                </div>
                                        	</div>
                                            <!-- /.Inspección -->
                                            
                                            <!-- Maniobras -->
                                            <div class="form-group subform" id="bloque_maniobras">
                                                <label for="maniobras">
                                                    <a href="#!" data-toggle="modal" data-target="#manmodal" 
                                                    class="lseclnk">Maniobras <i class="fa fa-list-alt"></i></a>
                                                </label>
												<?php include("subforms/man_tfcc.php")?>
                                                <div id="lmancc" class="selopciones"></div>
                                            </div><!-- /.Maniobras -->
                                            
                                            <!-- Palpación -->
                                            <div class="form-group subform" id="bloque_palpacion">
                                                <label for="palpacion">Palpación</label>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_lmedia" class="sw">Línea media</label>
                                                    <input type="text" id="x_pal_lmedia" class="form-control finput fw" name="pal_lmedia">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_procapes" class="sw">Procesos/apófisis espinosas</label>
                                                    <input type="text" id="x_pal_procapes" class="form-control finput fw" name="pal_procapes">
                                                </div>
                                                <div class="checkbox">
                                                    <table width="100%" border="0" class="tform">
                                                      <tr>
                                                        <td>Mastoides</td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_masizq">Izq</label></td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_masder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td>E.C.M.</td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_ecmizq">Izq</label></td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_ecmder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Acromion</td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_acromizq">Izq</label></td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_acromder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Espina escapular</td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_espescizq">Izq</label></td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_espescder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Clavícula</td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_clavizq">Izq</label></td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_clavder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Parótida</td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_paroizq">Izq</label></td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_paroder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Paravertebral</td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_parverizq">Izq</label></td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_parverder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td>ATM</td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_atmizq">Izq</label></td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_atmder">Der</label></td>
                                                      </tr>
                                                    </table>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="pal_notas" placeholder="Notas">
                                                </div>
                                            </div><!-- /.Palpación -->
                                            
                                            <!--<div class="form-group subform sketch">SKETCH</div>-->
                                        	
                                            <!-- Examen de Miembro Superior Izquierdo -->
                                            <div class="form-group subform" id="examen_miembro_superior_izquierdo">
                                                <div><label for="emsi">Examen de Miembro Superior Izquierdo </label></div>
                                                <!-- ROT -->
                                                <div class="form-group subform">
                                                    <div><label for="emsi-rot" class="sublabel">ROT</label></div>
                                                    <div class="form-group subform">
                                                        <label for="emsi_trici" style="font-weight:lighter;">Braquial</label>                                                
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_braq" value="0/4">0/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_braq" value="1/4">1/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_braq" value="2/4">2/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_braq" value="3/4">3/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_braq" value="4/4">4/4
                                                        </label>
                                                    </div>
                                                    <div class="form-group subform">
                                                        <label for="emsi_trici" style="font-weight:lighter;">Tricipital</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_trici" value="0/4">0/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_trici" value="1/4">1/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_trici" value="2/4">2/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_trici" value="3/4">3/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_trici" value="4/4">4/4
                                                        </label>
                                                    </div>
                                                    <div class="form-group subform">
                                                        <label for="emsi_trici" style="font-weight:lighter;">Estiloideo</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_estilo" value="0/4">0/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_estilo" value="1/4">1/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_estilo" value="2/4">2/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_estilo" value="3/4">3/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_estilo" value="4/4">4/4
                                                        </label>
                                                    </div>
                                                </div><!-- /.ROT -->
                                                
                                                <!-- Sensibilidad -->
                                                <div class="form-group subform">
                                                    <div><label for="Sensibilidad" class="sublabel">Sensibilidad</label></div>
                                                    <div class="form-group subform">
                                                        <a href="#!" data-toggle="modal" 
                                                        data-target="#myModalDTCI">Dermatomas <i class="fa fa-image"></i></a>
                                                        <div id="dermtc_izq"></div>
                                                        <div style="clear:both;"></div>
                                                        <?php include( "fccdticerv.html" ); ?>
                                                    </div>
                                                    <div class="form-group subform">
                                                        <a href="#!" data-toggle="modal" 
                                                        data-target="#myModalSI">Territorios nerviosos <i class="fa fa-image"></i></a>
                                                        <div id="sensetnsi"></div>
                                                        <div style="clear:both;"></div>
                                                        <?php include( "sensmsi.html" ); ?>
                                                    </div>
                                                </div><!-- /.Sensibilidad -->
                                                
                                                <!-- Fuerza Muscular -->
                                                <div class="form-group subform" id="fuerza_muscular">
                                                    <div><label for="fuerza_muscular_msi" class="sublabel">Fuerza Muscular</label></div>
                                                    <div class="checkbox">
                                                        <div><label for="rfi_elevhc4" style="font-weight:lighter;">Elevación hombro C4</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_elevhc4" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_elevhc4" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_elevhc4" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_elevhc4" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_elevhc4" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_elevhc4" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <div><label for="rfi_abdhc5" style="font-weight:lighter;">Abducción hombro C5</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_abdhc5" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_abdhc5" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_abdhc5" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_abdhc5" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_abdhc5" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_abdhc5" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <div><label for="rfi_extmunc6" style="font-weight:lighter;">Extensión muñeca C6</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extmunc6" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extmunc6" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extmunc6" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extmunc6" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extmunc6" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extmunc6" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <div><label for="rfi_flexmunc7" style="font-weight:lighter;">Flexión muñeca C7</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_flexmunc7" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_flexmunc7" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_flexmunc7" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_flexmunc7" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_flexmunc7" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_flexmunc7" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <div><label for="rfi_extpulc8" style="font-weight:lighter;">Extensión pulgar C8</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extpulc8" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extpulc8" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extpulc8" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extpulc8" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extpulc8" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_extpulc8" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <div><label for="rfi_intmat1" style="font-weight:lighter;">Intrínsecos mano T1</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_intmat1" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_intmat1" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_intmat1" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_intmat1" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_intmat1" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfi_intmat1" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                </div><!-- /.Fuerza Muscular -->
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="rfi_notas" placeholder="Notas">
                                                </div>
                                            
                                            </div><!-- /.Examen de Miembro Superior Izquierdo -->
                                        
                                        </div><!--./Examen Físico(1) -->
                                    
                                    </div><!-- /.Primera columna -->
                                    <!--========================================= Fin primera columna ==================================== -->
                                    <!--=========================================== Segunda columna ====================================== -->
                                    <div class="col-lg-6">
                                        <!-- Examen físico(2) -->
                                        <div class="form-group bloque-ef">
                                        
                                            <!-- Examen de Miembro Superior Derecho  -->
                                            <div class="form-group subform" id="examen_miembro_superior_derecho">
                                                <div><label for="emsd">Examen de Miembro Superior Derecho</label></div>
                                                <!-- ROT -->
                                                <div class="form-group subform">
                                                    <div><label for="emsd-rot" class="sublabel">ROT</label></div>
                                                    <div class="form-group subform">
                                                        <label for="emsi_trici" style="font-weight:lighter;">Braquial</label>                                                
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_braq" value="0/4">0/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_braq" value="1/4">1/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_braq" value="2/4">2/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_braq" value="3/4">3/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_braq" value="4/4">4/4
                                                        </label>
                                                    </div>
                                                    <div class="form-group subform">
                                                        <label for="emsi_trici" style="font-weight:lighter;">Tricipital</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_trici" value="0/4">0/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_trici" value="1/4">1/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_trici" value="2/4">2/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_trici" value="3/4">3/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_trici" value="4/4">4/4
                                                        </label>
                                                    </div>
                                                    <div class="form-group subform">
                                                        <label for="emsi_trici" style="font-weight:lighter;">Estiloideo</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_estilo" value="0/4">0/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_estilo" value="1/4">1/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_estilo" value="2/4">2/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_estilo" value="3/4">3/4
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_estilo" value="4/4">4/4
                                                        </label>
                                                    </div>
                                                </div><!-- /.ROT -->
                                                
                                                <!-- Sensibilidad -->
                                                <div class="form-group subform">
                                                    <div><label for="Sensibilidad" class="sublabel">Sensibilidad</label></div>
                                                    <div class="form-group subform"><!-- Dermatomas miembro superior derecho-->
                                                        <a href="#!" data-toggle="modal" data-target="#myModalDTCD">
                                                        Dermatomas <i class="fa fa-image"></i></a>
                                                        <div id="dermtc_der"></div>
                                                        <div style="clear:both;"></div>
                                                        <?php include( "fccdtdcerv.html" ); ?>
                                                    </div>
                                                    <div class="form-group subform"><!-- T.N. miembro superior derecho-->
                                                        <a href="#!" data-toggle="modal" data-target="#myModalSD">
                                                            Territorios nerviosos <i class="fa fa-image"></i></a>
                                                        <div id="sensetnsd"></div>
                                                        <div style="clear:both;"></div>
                                                        <?php include( "sensmsd.html" ); ?>
                                                    </div>
                                                </div><!-- /.Sensibilidad -->
                                                
                                                <!-- Fuerza Muscular -->
                                                <div class="form-group subform">
                                                    <div><label for="fuerza_muscular_msi" class="sublabel">Fuerza Muscular</label></div>
                                                    <div class="checkbox">
                                                        <div><label for="rfd_elevhc4" style="font-weight:lighter;">Elevación hombro C4</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_elevhc4" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_elevhc4" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_elevhc4" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_elevhc4" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_elevhc4" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_elevhc4" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <div><label for="rfd_abdhc5" style="font-weight:lighter;">Abducción hombro C5</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_abdhc5" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_abdhc5" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_abdhc5" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_abdhc5" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_abdhc5" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_abdhc5" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <div><label for="rfd_extmunc6" style="font-weight:lighter;">Extensión muñeca C6</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extmunc6" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extmunc6" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extmunc6" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extmunc6" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extmunc6" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extmunc6" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <div><label for="rfd_flexmunc7" style="font-weight:lighter;">Flexión muñeca C7</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_flexmunc7" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_flexmunc7" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_flexmunc7" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_flexmunc7" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_flexmunc7" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_flexmunc7" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <div><label for="rfd_extpulc8" style="font-weight:lighter;">Extensión pulgar C8</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extpulc8" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extpulc8" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extpulc8" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extpulc8" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extpulc8" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_extpulc8" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <div><label for="rfd_intmat1" style="font-weight:lighter;">Intrínsecos mano T1</label></div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_intmat1" value="0/5">0/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_intmat1" value="1/5">1/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_intmat1" value="2/5">2/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_intmat1" value="3/5">3/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_intmat1" value="4/5">4/5
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="rfd_intmat1" value="5/5">5/5
                                                        </label>
                                                    </div>
                                                </div> <!-- Agregado para revisión Fuerza Muscular-->
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="rfd_notas" placeholder="Notas">
                                                </div>
                                            </div><!-- /.Examen de Miembro Superior Derecho -->   
                                            
                                            <!-- Examenes -->
                                            <div class="form-group subform">
                                                <!-- Examen de Columna Lumbar -->
                                                <div class="checkbox">
                                                    <a href="#!" class="lseclnk_drop sw" name="x_efcl">Examen de Columna Lumbar 
                                                    <i class="fa fa-chevron-down"></i></a>
                                                </div>
                                                <div id="x_efcl" class="checkbox fw">
                                                    <div class="checkbox">
                                                      <label for="ef_coltorlum">Examen de Columna Lumbar</label>
                                                      <input type="text" class="form-control finput" name="ef_coltorlum">
                                                    </div>
                                                    <label for="ex_columbar">
                                                        <a id="lnkidp" href="formulario-columna-lumbar.php<?php echo $lnkidp;?>" 
                                                        data-nfrm="formulario-columna-lumbar.php" target="_blank">Examen de Columna Lumbar
                                                        <i class="fa fa-external-link"></i></a>
                                                    </label>
                                                </div><!-- /.Examen de Columna Lumbar -->
                                                
                                                <!-- Examen de hombros -->
                                                <div class="checkbox">
                                                    <a href="#!" class="lseclnk_drop sw" name="x_ef_hom">Examen de hombros
                                                    <i class="fa fa-chevron-down"></i></a>
                                                </div>
                                                <div id="x_ef_hom" class="checkbox fw">
                                                    <div class="checkbox">
                                                      <label for="ef_hom">Examen de hombros</label>
                                                      <input type="text" class="form-control finput" name="ef_hombro">
                                                    </div>
                                                    <label for="ex_columbar">
                                                        <a id="lnkidp" href="formulario-hombro.php<?php echo $lnkidp;?>" 
                                                        data-nfrm="formulario-hombro.php" target="_blank">Examen de hombros
                                                        <i class="fa fa-external-link"></i></a>
                                                    </label>
                                                </div><!-- /.Examen de hombros -->
                                            </div><!-- /.Examenes -->
                                            
                                            <div class="form-group subform">
                                                <div class="checkbox">
                                                  <label for="cadcinafe">Cadena cinemática afectada</label>
                                                  <input type="text" class="form-control finput" name="cadcinafe">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="marcha">Marcha</label>
                                                  <input type="text" class="form-control finput" name="marcha">
                                                </div>
                                            </div>
                                            
                                            
                                        
                                        </div><!-- /.Examen físico(2) -->
										<hr>
                                        <!-- Trae Estudios -->
                                        <div class="form-group">
                                            <label for="estudios" class="tsec">Trae Estudios</label>
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
                                                <textarea id="x_txtac" class="form-control finput fw" name="es_tac" rows=""></textarea>
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
                                                <input type="checkbox" name="x_txang" class="sw">Angiografía</label>
                                                <textarea id="x_txang" class="form-control finput fw" name="es_ang" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txlab" class="sw">Laboratorios</label>
                                                <textarea id="x_txlab" class="form-control finput fw" name="es_labs" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txotr" class="sw">Otros</label>
                                                <textarea id="x_txotr" class="form-control finput fw" name="es_otros" rows="3"></textarea>
                                            </div>
                                        </div><!-- /.Trae Estudios -->
                                        <hr>
                                        <!-- Impresión Diagnóstica -->
                                        <div class="form-group">
                                            <label for="impresion_diagnostica">
                                                <a href="#!" data-toggle="modal" data-target="#idxmodal" 
                                                class="lsec">Impresión Diagnóstica <i class="fa fa-list-alt"></i></a>
                                            </label>
                                            <?php include( "subforms/tidx_fcc.php" )?>
                                            <div id="lidxcc" class="selopciones"></div>
                                        </div><!-- /.Impresión Diagnóstica -->
                                        <hr>
                                        <!-- Plan -->
                                        <div class="form-group">
                                            <div><label for="plan" class="tsec">Plan</label></div>
                                            <!-- RX -->
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="x_pl_rx" id="chrx">Rayos X</label>
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
                                            </div><!-- /.RX  -->
                                            
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_rm">RM</label>
                                            </div>
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
                                              <input type="checkbox" name="pl_emgmsss">EMG MMSS</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_angicerv">Angiografía cervical</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_angicere">Angiografía cerebral</label>
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
                                            </div><!-- /.Laboratorios -->
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_pl_otros" class="sw">Otros</label>
                                                <input type="text" id="x_pl_otros" class="form-control finput fw" name="pl_otros">
                                            </div>
                                            <!-- Referencia -->
                                            <div class="form-group subform">
                                                <label for="Palpación">Referencia</label>
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
                                            </div><!-- /.Referencia -->
                                        	
                                            <!-- Procedimientos -->    
                                            <div class="form-group subform">
                                                <label for="Palpación">Procedimientos</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pro_infiltra" id="chinf" class="sw">Infiltración</label>
                                                </div>
                                                <div id="pro_infiltra" class="fw subform">
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_anesloc">Anestesia local</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_ester">Esteroides</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_pro_notas" class="sw">Otros</label>
                                                        <input type="text" id="x_pro_notas" class="form-control finput fw" name="pro_notas">
                                                    </div>
                                            	</div>
                                            </div><!-- /.Procedimientos -->
                                            
                                            <!-- Cirugía -->
                                            <div class="form-group subform">
                                                <label for="Palpación">Cirugía</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="cir_artro">Artrodesis</label>
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
                                            
                                        </div><!-- /.Plan -->
                                        
                                        <hr><hr>
                                        <div align="center">
                                            <button type="button" class="btn btn-form" data-toggle="modal" data-target="#confirm_modal">Guardar</button>
                                            <?php include( "subforms/confirm.php" )?>
                                            <div id="lidxcc" class="selopciones"></div>
                                    	</div>
                                    
                                    </div><!-- /.Segunda columna -->
                                    
                                    <a href="#!" onClick="getElems('frm_columna_cervical')"></a>
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