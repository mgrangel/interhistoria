<?php
	/*
	 * Interhistorias - Formulario de columna dorsal
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
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/bootstrapValidator.min.js"></script>
    <script src="../js/initih.js"></script>
    <script src="../js/setup_fcd.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../js/roundslider.js"></script>
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
    <link rel="stylesheet" type="text/css" href="../css/roundslider.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="../css/ihstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interhistorias - Formulario columna dorsal</title>

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

      	<div id="page-wrapper" style="margin:0;">
            <div class="row">
                <div class="col-lg-12" <?php if( $nuser == "mikeven" ){ ?> onClick="checkAll( 'frm_columna_dorsal' )"<?php }?>>
                    <h1 class="page-header"><span class="title">Historia Clínica de Columna Dorsal</span></h1>
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
                                <form role="form" id="frm_columna_dorsal" class="form_historia">
                                    <!-- Primera columna -->
                                    <div class="col-lg-6">
                                        <input type="hidden" name="idPaciente" id="idp" value="<?php echo $dpaciente["idp"];?>">
                                        <input type="hidden" name="idUsuario" id="idu" value="<?php echo $idu;?>">
                                        
                                        <!-- Motivo de Consulta -->
                                        <div class="form-group" id="motivo_consulta">
                                            <label for="motivo_consulta" class="tsec">Motivo de Consulta</label>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_traumatismo">Traumatismo</label>
                                            </div>
                                            <!-- Dolor -->
                                            <div class="checkbox">
                                              <label><input type="checkbox" id="chdolor" name="dolor">Dolor</label>
                                            </div>
                                            <div id="blockdolor" class="form-group subform">
                                                <div class="checkbox">
                                                  <label for="sitio">Sitio</label>
                                                  <input type="text" class="form-control finput" name="dol_sitio">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="inicio_desencad">Origen-Inicio-desencadenantes</label>
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
                                            	<label><input type="checkbox" name="mc_aumento_vol">Aumento de volumen</label>
                                            </div>
                                            <div class="checkbox">
                                            	<label><input type="checkbox" name="mc_deformidad">Deformidad</label>
                                            </div>
                                            <div class="checkbox">
                                            	<label><input type="checkbox" name="mc_masas">Masas</label>
                                            </div>
                                            <div class="checkbox">
                                            	<label><input type="checkbox" name="mc_rigidez">Rigidez</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="x_mc_otros" class="sw">Otros</label>
                                                <input type="text" id="x_mc_otros" class="form-control finput fw" name="mc_otros">
                                            </div>
                                            <div class="checkbox">
                                                <input type="text" class="form-control finput" name="mc_notas" title="300" placeholder="Notas">
                                            </div>
                                        </div><!-- /.Motivo de Consulta -->
                                        <hr>
                                        <!-- Enfermedad Actual -->
                                        <div class="form-group">
                                            <div><label for="enfermedad_actual" class="tsec">Enfermedad Actual</label></div>
                                            <!-- Duración Síntomas -->
                                            <div class="form-group subform">
                                                <label>Duración Síntomas</label>
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
                                                <div><label for="exampleInputEmail1">Mecanismo Lesión</label></div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_caidap">Caída propios pies</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_caltura">Caída de altura</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_tracor">Traumatismo cortante</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_accdeport">Accidente deportivo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_acctrans">Accidente de tránsito</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_accinesp">Accidente inespecífico</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_aroll">Arrollamiento</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_rot">Rotación</label>
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
                                        <div class="form-group examen_fisico">
                                            <div><label for="exampleInputEmail1" class="tsec">Examen Físico</label></div>
                                            <!-- Inspección -->
                                            <div class="form-group subform">
                                                <label for="exampleInputEmail1">Inspección</label>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_gibad">Giba dorsal</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_pectusex">Pectus Excavatum</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_pectusca">Pectus Carinatum</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_toraxto">Tórax Tonel</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_tirsupcla">Tiraje supraclavicular</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_tirinterc">Tiraje intercostal</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_roscoscon">Rosario costo-condral</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_escapal">Escápula alada</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_escapsprg">Escápula Sprengel</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_deformdw">Deformidad Dowager</label>
                                                </div>
                                            </div><!-- /.Inspección -->
                                            
                                            <!-- Rangos Activos -->
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
                                            </div><!-- /.Rangos Activos -->
                                            
                                            <!-- Rangos Pasivos -->
                                            <div class="form-group subform">
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
                                            </div><!-- /.Rangos Pasivos -->
                                            
                                        	<div class="form-group subform">
                                            	<div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_avol" class="sw">Aumento de volumen</label>
                                                    <input type="text" id="x_avol" class="form-control finput fw" name="ins_aumentovol">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_edema" class="sw">Edema</label>
                                                    <input type="text" id="x_edema" class="form-control finput fw" name="ins_edema">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_mass" class="sw">Masas</label>
                                                    <input type="text" id="x_mass" class="form-control finput fw" name="ins_masas">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_defm" class="sw">Deformidades</label>
                                                    <input type="text" id="x_defm" class="form-control finput fw" name="ins_deform">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_atm" class="sw">Aumento tono muscular</label>
                                                    <input type="text" id="x_atm" class="form-control finput fw" name="ins_aumentotm">
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_aumglob">Aumento globoso</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_mancal">Manchas cafe-au-lait</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="ins_notas" 
                                                    title="300" placeholder="Notas">
                                                </div>	
                                            </div>
                                            
                                            <!-- Sensibilidad -->
                                            <div class="form-group subform">
                                                <div><label for="Sensibilidad">Sensibilidad</label></div>
                                                <div class="form-group subform">
                                                    <a href="#!" data-toggle="modal" data-target="#myModalDTI">
                                                        Dermatomas lado izquierdo <i class="fa fa-image"></i></a>
                                                    <div id="dermtfcd_izq"></div>
                                                    <div style="clear:both;"></div>
                                                    <?php include( "fcddti.html" ); ?>
                                                </div>
                                                <div class="form-group subform">
                                                    <a href="#!" data-toggle="modal" data-target="#myModalDTD">
                                                        Dermatomas lado derecho <i class="fa fa-image"></i></a>
                                                    <div id="dermtfcd_der"></div>
                                                    <div style="clear:both;"></div>
                                                    <?php include( "fcddtd.html" ); ?>
                                                </div>
                                            </div><!-- /.Sensibilidad -->
                                            
                                            <!-- Maniobras -->
                                            <div class="form-group subform" id="bloque_maniobras">
                                                <label for="maniobras">
                                                    <a href="#!" data-toggle="modal" data-target="#manmodal" 
                                                    class="lseclnk">Maniobras <i class="fa fa-list-alt"></i></a>
                                                </label>
                                                <?php include( "subforms/man_tfcd.php" )?>
                                                <div id="lmanfcd" class="selopciones"></div>
                                            </div><!-- /.Maniobras -->
                                        
                                        </div><!-- /.Examen Físico(1) -->
                                    
                                    </div><!-- /.Primera columna -->
                                    <!--========================================= Fin primera columna ==================================== -->
                                    <!--=========================================== Segunda columna ====================================== -->
                                    <div class="col-lg-6">
                                        <!-- Examen Físico(2) -->
                                        <div class="form-group examen_fisico">
                                            <!-- Palpación -->
                                            <div class="form-group subform" id="palpacion">
                                                <label for="palpacion">Palpación</label>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_lmedia" class="sw">Línea media</label>
                                                    <input type="text" id="x_pal_lmedia" class="form-control finput fw" name="pal_lmedia">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_procae" class="sw">Procesos / Apófisis espinas</label>
                                                    <input type="text" id="x_pal_procae" class="form-control finput fw" name="pal_procae">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_harcos" class="sw">Hemiarco costal</label>
                                                    <input type="text" id="x_pal_harcos" class="form-control finput fw" name="pal_harcos">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_unconcos" class="sw">Unión condro-costal</label>
                                                    <input type="text" id="x_pal_unconcos" class="form-control finput fw" name="pal_unconcos">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_estern" class="sw">Esternón</label>
                                                    <input type="text" id="x_pal_estern" class="form-control finput fw" name="pal_estern">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_viscabdm" class="sw">Visceromegalias abdominales</label>
                                                    <input type="text" id="x_pal_viscabdm" class="form-control finput fw" name="pal_viscabdm">
                                                </div>
                                                <div class="checkbox">
                                                    <table width="100%" border="0" class="tform">
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
                                                        <td width="70%">Clavícula</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_clavizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_clavder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td width="70%">Reborde costal inferior</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_reborcizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_reborcder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Paravertebral</td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_parverizq">Izq</label></td>
                                                        <td><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_parverder">Der</label></td>
                                                      </tr>
                                                      <tr>
                                                        <td width="70%">Sacroilíaca</td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_sacroizq">Izq</label></td>
                                                        <td width="15%"><label class="checkbox-inline">
                                                        <input type="checkbox" name="pal_sacroder">Der</label></td>
                                                      </tr>
                                                    </table>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="pal_notas" placeholder="Notas">
                                                </div>
                                                
                                                <!--<div>SKETCH</div>-->
                                            
                                            </div><!-- /.Palpación -->
                                            
                                            <!-- Exámenes -->
                                            <div class="form-group subform">
                                                <!-- Ex FCL -->
                                                <div class="form-group">
                                                    <a href="#!" class="lseclnk_drop sw" name="x_ef_columbar">Examen de Columna Lumbar 
                                                    <i class="fa fa-chevron-down"></i></a>
                                                </div>
                                                <div id="x_ef_columbar" class="checkbox fw">
                                                    <div class="checkbox">
                                                      <label for="ex_colls">Examen de Columna Lumbar</label>
                                                      <input type="text" class="form-control finput" name="ef_columbar">
                                                    </div>
                                                    <label for="ef_columbar">
                                                        <a id="lnkidp" href="formulario-columna-lumbar.php<?php echo $lnkidp;?>" 
                                                        data-nfrm="formulario-columna-lumbar.php" target="_blank">Examen de Columna Lumbar
                                                        <i class="fa fa-external-link"></i></a>
                                                    </label>
                                                </div><!-- /.Ex FCL -->
                                            
                                                <!-- Ex FCC -->
                                                <div class="form-group">
                                                    <a href="#!" class="lseclnk_drop sw" name="x_ef_colcerv">Examen de Columna Cervical 
                                                    <i class="fa fa-chevron-down"></i></a>
                                                </div>
                                                
                                                <div id="x_ef_colcerv" class="checkbox fw">
                                                    <div class="checkbox">
                                                      <label for="ef_colcerv">Examen de Columna Cervical</label>
                                                      <input type="text" class="form-control finput" name="ef_colcerv">
                                                    </div>
                                                    <label for="ef_colcerv">
                                                        <a id="lnkidp" href="formulario-columna-cervical.php<?php echo $lnkidp;?>" 
                                                        data-nfrm="formulario-columna-cervical.php" target="_blank">Examen de Columna Cervical
                                                        <i class="fa fa-external-link"></i></a>
                                                    </label>
                                                </div><!-- /.Ex FCC -->
                                                <div class="form-group">
                                                    <label for="traumatologicos">Marcha</label>
                                                    <input type="text" class="form-control finput" name="ef_marcha">
                                                </div>
                                            </div><!-- /.Exámenes -->
                                            
                                            <!-- Mediciones -->
                                            <div class="form-group subform">
                                                <!-- Medicion real -->
                                                <label for="exampleInputEmail1">Medición real</label>
                                                <div class="checkbox">
                                                    <div class="checkbox">
                                                        <label for="mid_medreal">Miembro inferior izquierdo</label>
                                                        <div id="ef_medmii" class="sldbarval" style="width:85%; float:left;"></div>
                                                        <div id="ef_medmii_val" class="labsldbarval"></div>
                                                        <div style="clear:both;"></div>
                                                        <input type="hidden" class="form-control finput" name="ef_medmii" id="frm_ef_medmii">
                                                    </div>
                                                    <div class="checkbox">
                                                      <label for="mid_medreal">Miembro inferior derecho</label>
                                                      <div id="ef_medmid" class="sldbarval" style="width:85%; float:left;"></div>
                                                      <div id="ef_medmid_val" class="labsldbarval"></div>
                                                      <div style="clear:both;"></div>
                                                      <input type="hidden" class="form-control finput" name="ef_medmid" id="frm_ef_medmid">
                                                    </div>
                                                </div><!-- /.Medicion real -->
                                                
                                                <!-- Medicion aparente -->
                                                <label for="exampleInputEmail1">Medición aparente</label>
                                                <div class="checkbox">
                                                    <div class="checkbox">
                                                        <label for="mid_medreal">Miembro inferior izquierdo</label>
                                                        <div id="ef_medapai" class="sldbarval" style="width:85%; float:left;"></div>
                                                        <div id="ef_medapai_val" class="labsldbarval"></div>
                                                        <div style="clear:both;"></div>
                                                        <input type="hidden" class="form-control finput" name="ef_medapai" id="frm_ef_medapai">
                                                    </div>
                                                    <div class="checkbox">
                                                      <label for="mid_medreal">Miembro inferior derecho</label>
                                                      <div id="ef_medapad" class="sldbarval" style="width:85%; float:left;"></div>
                                                      <div id="ef_medapad_val" class="labsldbarval"></div>
                                                      <div style="clear:both;"></div>
                                                      <input type="hidden" class="form-control finput" name="ef_medapad" id="frm_ef_medapad">
                                                    </div>
                                                </div><!-- /.Medicion aparente -->
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="ef_notas2" 
                                                    title="300" placeholder="Notas">
                                                </div>
                                            </div><!-- /.Mediciones -->
                                         </div><!-- /.Examen Físico(2) -->
                                        <hr>
                                        <!-- Trae Estudios -->
                                        <div class="form-group">
                                            <div><label for="estudios" class="tsec">Trae Estudios</label></div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txrx" class="sw">Rayos X</label>
                                                <textarea id="x_txrx" class="form-control finput fw" name="es_rx" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_esmedcobb" class="sw">Medición de Cobb</label>
                                                <input type="text" id="x_esmedcobb" class="form-control finput fw" name="es_medcobb">
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
                                                <input type="checkbox" name="x_es_ecotest" class="sw">Eco testicular</label>
                                                <textarea id="x_es_ecotest" class="form-control finput fw" name="es_ecotest" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txlab" class="sw">Laboratorios</label>
                                                <textarea id="x_txlab" class="form-control finput fw" name="es_labs" rows="3"></textarea>
                                            </div>
                                        </div><!-- /.Trae Estudios -->
                                        <hr>
                                        <!-- Impresión Diagnóstica -->
                                        <div id="idx" class="form-group">
                                            <label for="impresion_diagnostica">
                                                <a href="#!" data-toggle="modal" data-target="#idxmodal" 
                                                class="lsec">Impresión Diagnóstica <i class="fa fa-list-alt"></i></a>
                                            </label>
                                            <?php include( "subforms/tidx_fcd.php" )?>
                                            <div id="lidxho" class="selopciones"></div>
                                        </div><!-- /.Impresión Diagnóstica -->
                                        <hr>
                                        <!-- Plan -->
                                        <div class="form-group" id="bloque_plan">
                                            <div><label for="fh-plan" class="tsec">Plan</label></div>
                                            
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
                                                  <input type="checkbox" name="rx_lateral">Lateral</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_dinam">Dinámicas</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_oblicuas">Oblícuas</label>
                                                </div>
                                            </div><!-- /.RX -->
                                            
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
                                              <input type="checkbox" name="pl_tac3d">TAC + 3D</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_us">US</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_emgmsss">EMG MSSS</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_emgmsis">EMG MSIS</label>
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
                                                <input type="checkbox" name="x_pl_notas" class="sw">Otros</label>
                                                <input type="text" id="x_pl_notas" class="form-control finput fw" name="pl_notas">
                                            </div>
                                            <!-- Referencias -->
                                            <div class="form-group subform">
                                                <label for="Referencias">Referencias</label>
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
                                                  <input type="checkbox" name="ref_endocrin">Endocrinología</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ref_neurocir">Neurocirugía</label>
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
                                                    <input type="checkbox" name="x_ref_otros" class="sw">Otros</label>
                                                    <input type="text" id="x_ref_otros" class="form-control finput fw" name="ref_otros">
                                                </div>
                                            </div><!-- /.Referencias -->
                                            
                                            <!-- Procedimientos -->
                                            <div class="form-group subform">
                                                <label for="Infiltración">Procedimientos</label>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="pro_infiltra" id="chinf" class="sw">Infiltración</label>
                                                </div>
                                                <div id="pro_infiltra" class="fw subform">
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_anestesia">Anestesia local</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_ester">Esteroides</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_pro_otros" class="sw">Otros</label>
                                                        <input type="text" id="x_pro_otros" class="form-control finput fw" name="pro_otros">
                                                    </div>
                                                </div>
                                            </div><!-- /.Procedimientos -->
                                            
                                            <!-- Cirugía -->
                                            <div class="form-group subform">    
                                                <label for="Cirugía">Cirugía</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="cir_artdes">Artrodesis</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="cir_artplas">Artroplastia</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_cir_notas" class="sw">Otros</label>
                                                    <input type="text" id="x_cir_notas" class="form-control finput fw" name="cir_notas">
                                                </div>
                                            </div><!-- /.Cirugía -->
                                        </div><!-- /.Plan -->
                                        
                                        <!-- último bloque de formulario -->
                                        <hr><hr>
                                        <div align="center">
                                            <button type="button" class="btn btn-form" data-toggle="modal" data-target="#confirm_modal">Guardar</button>
                                            <?php include("subforms/confirm.php")?>
                                    	</div>
                                    
                                    </div><!-- /.Segunda columna -->
                                    
                                    <div onClick="getElems( 'frm_columna_dorsal' )"></div>
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
    </div>
    <!-- /#wrapper -->
</body>
</html>
<?php include_once( "analyticstracking.php" ) ?>