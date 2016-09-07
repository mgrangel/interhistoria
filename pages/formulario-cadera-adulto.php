<?php
	/*
	 * Interhistorias - Formulario de cadera del adulto
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
    <script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/locales/bootstrap-datepicker.es.js"></script>
    <script src="../js/bootstrapValidator.min.js"></script>
    <script src="../js/initih.js"></script>
    <script src="../js/setup_fca.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/jquery.ui.touch-punch.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../js/roundslider.js"></script>
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

    <title>Interhistorias - Formulario cadera del adulto</title>

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
                <div class="col-lg-12" <?php if( $nuser == "mikeven" ){ ?> onClick="checkAll( 'frm_cadera_adulto' )"<?php }?>>
                    <h1 class="page-header">
                    <span class="title">Historia Clínica de Cadera del Adulto</span></h1>
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
                                <form role="form" id="frm_cadera_adulto" class="form_historia">
                                    <!-- Primera columna -->
                                    <div class="col-lg-6" id="primera_columna">
                                    	<!-- val_iniciales -->
                                        <div id="val_iniciales">
                                        	<label class="radio-inline"><input type="radio" name="lado" id="lado_izq" value="izquierda">Izquierda</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="lado" id="lado_der" value="derecha" checked>Derecha</label>
                                            <input type="hidden" name="idPaciente" id="idp" value="<?php echo $dpaciente["idp"];?>">
                                        	<input type="hidden" name="idUsuario" id="idu" value="<?php echo $idu;?>">
                                        </div><!-- /.val_iniciales -->
                                        <hr>
                                        <!-- Motivo de Consulta -->
                                        <div class="form-group" id="motivo_consulta">
                                            <label for="motivo_consulta" class="tsec">Motivo de Consulta</label>
                                            <div class="form_group">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="mc_traumatismo">Traumatismo</label>
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
                                                	<label><input type="checkbox" name="mc_signoc">Signo de la C</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label><input type="checkbox" name="mc_aumento_vol">Aumento de volumen</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label>
                                                  <input type="checkbox" name="mc_deformidad">Deformidad</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label>
                                                  <input type="checkbox" name="mc_inestabilidad">Inestabilidad</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" name="mc_crep_chasq">Crepitación/Chasquido</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" name="mc_rigid_art">Rigidez Articular</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" name="mc_calmed_dific">Calzado y medias con dificultad</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="mc_equimosis">Equímosis</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="mc_notas" title="300" placeholder="Notas">
                                                </div>
                                        	</div>
                                        </div><!-- /.Motivo de Consulta -->
                                        <hr>
                                        <!-- Enfermedad Actual -->
                                        <div class="form-group">
                                        	<div><label for="exampleInputEmail1" class="tsec">Enfermedad Actual</label></div>
                                            <!-- Duración Síntomas -->
                                            <div class="form-group subform">
                                                <div class="form-group">
                                                    <div subform><label>Duración Síntomas</label></div>
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
                                                        <input type="radio" name="rb_ds" class="rbdur_ld" value="dur_ld">Larga data
                                                    </label>
                                                    <div class="checkbox" id="dur_sin">
                                                        <input type="text" class="form-control finput" name="dur_sin">
                                                    </div>
                                                </div>
                                            </div><!-- /.Duración Síntomas -->
                                        	
                                            <!-- Mecanismo Lesión -->
                                            <div class="form-group subform">
                                                <div><label for="mecanismo_lesion">Mecanismo Lesión</label></div>
                                                <div class="form-group">
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
                                                      <input type="checkbox" name="ml_acc_deport">Accidente deportivo</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ml_acc_trans">Accidente tránsito</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ml_arroll">Arrollamiento</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ml_acc_inesp">Accidente inespecífico</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" 
                                                      name="ml_cont_musc_br">Contracción muscular inadecuada</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ml_tracon">Traumatismo contuso</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ml_tracor">Traumatismo cortante </label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ml_traind">Traumatismo indirecto</label>
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
                                                      <input type="text" class="form-control finput" name="ml_otros" title="300" placeholder="Notas">
                                                    </div>
                                                </div>       
                                            </div><!-- /.Mecanismo Lesión -->
                                        
                                        </div><!-- /.Enfermedad Actual -->
                                        <hr>
                                        <!-- Examen Físico -->
                                        <div class="form-group examen_fisico">
                                        	<label for="examen_físico" class="tsec">Examen Físico</label>
                                            
                                            <div class="form-group subform">
                                                <!-- Rangos -->
                                                <div class="form-group">
                                                    <label for="rangos_activos">Rangos Activos</label>
                                                    <div class="row">
                                                        <div class="col-md-3 rslide">
                                                            <div class="trslide" align="left">
                                                            <label class="checkbox-inline">Abducción - Aducción</label></div>
                                                            <div id="rs_abdad"></div>
                                                            <div id="rsabdv" class="txrsval"></div>
                                                            <input type="hidden" class="form-control finput" name="ra_abduc" id="rsra_abduc">
                                                            <input type="hidden" class="form-control finput" name="ra_aduc" id="rsra_aduc">
                                                        </div>
                                                        <div class="col-md-3 rslide">
                                                            <div class="trslide" align="left">
                                                            <label class="checkbox-inline">Rot: Int - Ext</label></div>
                                                            <div id="rs_rotinex"></div>
                                                            <div id="rsriev" class="txrsval"></div>
                                                            <input type="hidden" class="form-control finput" name="ra_rotin" id="rsra_rotin">
                                                            <input type="hidden" class="form-control finput" name="ra_rotex" id="rsra_rotex">
                                                        </div>
                                                        <div class="col-md-3 rslide">
                                                            <div class="trslide" align="left">
                                                            <label class="checkbox-inline">Flex - Ext</label></div>
                                                            <div id="rs_flex_ext"></div>
                                                            <div id="rsfev" class="txrsval"></div>
                                                            <input type="hidden" class="form-control finput" name="ra_flexion" id="rsra_flexion">
                                                            <input type="hidden" class="form-control finput" name="ra_extension" id="rsra_extension">
                                                        </div>
                                                    </div>
                                                    <label for="rangos_pasivos">Rangos Pasivos</label>
                                                    <div class="row">
                                                        <div class="col-md-3 rslide">
                                                            <div class="trslide" align="left">
                                                            <label class="checkbox-inline">Rot: Int - Ext</label></div>
                                                            <div id="rs_rotinex_p"></div>
                                                            <div id="rsriev_p" class="txrsval"></div>
                                                            <input type="hidden" class="form-control finput" name="rp_rotin" id="rsrp_rotin">
                                                            <input type="hidden" class="form-control finput" name="rp_rotex" id="rsrp_rotex">
                                                        </div>
                                                        <div class="col-md-3 rslide">
                                                            <div class="trslide" align="left"><label class="checkbox-inline">Flex - Ext</label></div>
                                                            <div id="rs_flex_ext_p"></div>
                                                            <div id="rsfev_p" class="txrsval"></div>
                                                            <input type="hidden" class="form-control finput" name="rp_flexion" id="rsrp_flexion">
                                                            <input type="hidden" class="form-control finput" name="rp_extension" id="rsrp_extension">
                                                        </div>
                                                    </div>
                                                </div><!-- /.Rangos -->
                                                
                                                <!-- Inspección -->
                                                <div class="form-group" id="bloque_inspeccion">
                                                    <label for="inspeccion">Inspección</label>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_aumento_vol">Aumento de volumen</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_mtrendel">Marcha Trendelenburg</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_flogosis">Flogosis</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_contflex">Contractura en flexión</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_flexaforz">Flexión con abducción forzada</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_ins_hipomov" class="sw" alt="nobd">Hipomovilidad</label>
                                                        <input type="text" id="x_ins_hipomov" class="form-control finput fw" name="ins_hipomov">
                                                    </div>
                                                </div>
                                        	
                                            	<!-- Maniobras -->
                                                <div class="form-group" id="bloque_maniobras">
                                                    <label for="maniobras">
                                                        <a href="#!" data-toggle="modal" data-target="#manmodal" class="lseclnk">Maniobras
                                                        <i class="fa fa-list-alt"></i></a>
                                                    </label>
                                                    <?php include("subforms/man_tfca.php")?>
                                                    <div id="lmanfca" class="selopciones"></div>
                                                </div><!-- /.Maniobras -->
                                                
                                                <!-- Palpación -->
                                                <div class="form-group">
                                                    <label for="palpacion">Palpación</label>
													<!-- Mediciones -->
                                                    <div class="form-group subform">
                                                        <label for="medicion_real" class="sublabel">Medición real</label>
                                                        <div class="checkbox">
                                                          <label for="pal_medmcv_izq">Medición miembro izq(cm)</label>
                                                          <div id="pal_medmcv_izq" class="sldbarval" style="width:85%; float:left;"></div>
                                                          <div id="pal_medmcv_izq_val" class="labsldbarval"></div>
                                                          <div style="clear:both;"></div>
                                                          <input type="hidden" class="form-control finput" name="pal_medmcv_izq" id="frm_pal_medmcv_izq">
                                                        </div>
                                                        <div class="checkbox">
                                                          <label for="pal_medmcv_der">Medición miembro der(cm)</label>
                                                          <div id="pal_medmcv_der" class="sldbarval" style="width:85%; float:left;"></div>
                                                          <div id="pal_medmcv_der_val" class="labsldbarval"></div>
                                                          <div style="clear:both;"></div>
                                                          <input type="hidden" class="form-control finput" name="pal_medmcv_der" id="frm_pal_medmcv_der">
                                                        </div>
                                                        <label for="medicion_aparente" class="sublabel">Medición aparente</label>
                                                        <div class="checkbox">
                                                          <label for="pal_medmca_izq">Medición miembro izq(cm)</label>
                                                          <div id="pal_medmca_izq" class="sldbarval" style="width:85%; float:left;"></div>
                                                          <div id="pal_medmca_izq_val" class="labsldbarval"></div>
                                                          <div style="clear:both;"></div>
                                                          <input type="hidden" class="form-control finput" name="pal_medmca_izq" id="frm_pal_medmca_izq">
                                                        </div>
                                                        <div class="checkbox">
                                                          <label for="pal_medmca_der">Medición miembro der(cm)</label>
                                                          <div id="pal_medmca_der" class="sldbarval" style="width:85%; float:left;"></div>
                                                          <div id="pal_medmca_der_val" class="labsldbarval"></div>
                                                          <div style="clear:both;"></div>
                                                          <input type="hidden" class="form-control finput" name="pal_medmca_der" id="frm_pal_medmca_der">
                                                        </div>
													</div><!-- /.Mediciones -->
                                                    
                                                    <!-- sub-bloque palpación -->
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                          <label class="checkbox-inline">
                                                          <input type="checkbox" name="pal_rorebit">Roce/Resalto BIT</label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label class="checkbox-inline">
                                                          <input type="checkbox" name="pal_roreprof">Roce/Resalto profundo</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pal_tromayor" class="sw">Trocánter mayor</label>
                                                            <input type="text" id="x_pal_tromayor" class="form-control finput fw" name="pal_tromayor">
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pal_tenglumed" class="sw">Tendón glúteo medio</label>
                                                            <input type="text" id="x_pal_tenglumed" class="form-control finput fw" name="pal_tenglumed">
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pal_isquiotib" class="sw">Isquiotibiales</label>
                                                            <input type="text" id="x_pal_isquiotib" class="form-control finput fw" name="pal_isquiotib">
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pal_bit" class="sw">B.I.T.</label>
                                                            <input type="text" id="x_pal_bit" class="form-control finput fw" name="pal_bit">
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pal_isquion" class="sw">Isquion</label>
                                                            <input type="text" id="x_pal_isquion" class="form-control finput fw" name="pal_isquion">
                                                        </div>
                                                        <div class="checkbox">
                                                          <label class="checkbox-inline">
                                                          <input type="checkbox" name="pal_distpel">Distracción pélvica</label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label class="checkbox-inline">
                                                          <input type="checkbox" name="pal_aproxpel">Aproximación pélvica</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pal_tenbifem" class="sw">Tendón bíceps femoral</label>
                                                            <input type="text" id="x_pal_tenbifem" class="form-control finput fw" name="pal_tenbifem">
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pal_masas" class="sw">Masas</label>
                                                            <input type="text" id="x_pal_masas" class="form-control finput fw" name="pal_masas">
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pal_coxis" class="sw">Coxis</label>
                                                            <input type="text" id="x_pal_coxis" class="form-control finput fw" name="pal_coxis">
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pal_ingle" class="sw">Ingle</label>
                                                            <input type="text" id="x_pal_ingle" class="form-control finput fw" name="pal_ingle">
                                                        </div>
                                                    </div><!-- /.sub-bloque palpación -->
                                                
                                                </div><!-- /.Palpación -->
                                                
                                            </div>
                                            
                                            <!--<div>SKETCH</div>-->
                                        
                                        </div><!-- /.Examen Físico(1) -->
                                        
                                    </div><!-- /.Primera columna -->
                                    <!--========================================= Fin primera columna ==================================== -->
                                    <!--=========================================== Segunda columna ====================================== -->
                                    <div class="col-lg-6" id="segunda_columna">
                                        <!-- Examen físico(2) -->
                                        <div class="form-group examen_fisico">
                                        	
                                            <!-- EX FCL -->
                                            <div class="checkbox">
                                                <a href="#!" class="lseclnk_drop sw" name="x_exfco">
                                                Examen de Columna Lumbosacra <i class="fa fa-chevron-down"></i></a>
                                            </div>
                                            <div id="x_exfco" class="checkbox fw">
                                            	<div class="checkbox">
                                                  <label for="ex_colls">Examen de Columna Lumbosacra</label>
                                                  <input type="text" class="form-control finput" name="ef_excolumbar">
                                                </div>
                                                <label for="ex_columbar">
                                                    <a id="lnkidp" href="formulario-columna-lumbar.php<?php echo $lnkidp;?>" 
                                                    data-nfrm="formulario-columna-lumbar.php" target="_blank">
                                                    Examen de columna lumbar <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div><!-- /.EX FCL -->
                                            
                                            <!-- EX FRO -->
                                            <div class="checkbox">
                                                <a href="#!" class="lseclnk_drop sw" name="x_exfro">Examen de Rodilla <i class="fa fa-chevron-down"></i></a>
                                            </div>
                                            <div id="x_exfro" class="checkbox fw">
                                            	<div class="checkbox">
                                                  <label for="ex_colls">Examen de Rodilla</label>
                                                  <input type="text" class="form-control finput" name="ef_exrodilla">
                                                </div>
                                                <label for="ex_columbar">
                                                    <a id="lnkidp" href="formulario-rodilla.php<?php echo $lnkidp;?>" 
                                                    data-nfrm="formulario-rodilla.php" target="_blank">Examen de Rodilla
                                                    <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div><!-- /.EX FRO -->
                                            
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_laxartexa">Hiperlaxitud articular</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_cadlocafe">Cadena cinemática local afectada</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_neuvasla">Neuro-vascular local afectado</label>
                                            </div>
                                            
                                            <div class="checkbox">
                                            	<label class="checkbox-inline">
                                                <input type="checkbox" name="x_ef_exabdom" class="sw" alt="nobd">Examen abdómino-pélvico</label>
                                                <input type="text" id="x_ef_exabdom" class="form-control finput fw" name="ef_exabdom">
                                            </div>
                                            <div class="checkbox">
                                            	<label class="checkbox-inline">
                                                <input type="checkbox" name="x_ef_cadcontlat" class="sw" alt="nobd">Examen cadera contralateral</label>
                                                <input type="text" id="x_ef_cadcontlat" class="form-control finput fw" name="ef_cadcontlat">
                                            </div>
                                            <div class="checkbox">
                                            	<a href="http://www.orthopaedicscore.com/scorepages/harris_hip_score.html" 
                                                target="_blank">Score de Harris <i class="fa fa-external-link"></i></a>
                                                <input type="text" id="harris_score" class="form-control finput" 
                                                name="ef_sharris" placeholder="Score de Harris">
                                            </div>
                                        </div><!-- /.Examen físico(2) -->
                                        <hr>
                                        <!-- Trae Estudios -->
                                        <div class="form-group">
                                            <label for="Palpación" class="tsec">Trae Estudios</label>
                                            <div class="checkbox">
                                            	<label class="checkbox-inline"><input type="checkbox" name="x_esrx" class="sw">Rayos X</label>	
                                            </div>
                                            <div id="x_esrx" class="form-group subform fw">    
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="x_txrxpel" class="sw">Rayos X Pelvis</label>
                                                	<textarea id="x_txrxpel" class="form-control finput fw" name="es_rxpel" rows="3"></textarea>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="x_txrxcolsa" class="sw">Rayos X columna-sacra </label>
                                                  <textarea id="x_txrxcolsa" class="form-control finput fw" name="es_rxcolsa" rows="3"></textarea>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txesotr" class="sw">Otros</label>
                                                    <textarea id="x_txesotr" class="form-control finput fw" name="es_rxotros" rows="3"></textarea>
                                                </div>
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
                                            	<input type="checkbox" name="x_txlabs" class="sw">Laboratorios</label>
                                            	<textarea id="x_txlabs" class="form-control finput fw" name="es_labs" rows="3"></textarea>
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
                                            <?php include("subforms/tidx_fca.php")?>
                                            <div id="lidxfca" class="selopciones"></div>
                                        </div><!-- /.Impresión Diagnóstica -->
                                        <hr>
                                        <!-- Plan -->
                                        <div class="form-group">
                                            <div><label for="Plan" class="tsec">Plan</label></div>
                                            <!-- RX -->
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" id="chrx" name="x_pl_rx">Rayos X</label>
                                            </div>
                                            <div class="form-group subform" id="blockrx">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_poacp">Pelvis ósea ap centrada en pubis</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_rana">Rana</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_lateral">Lateral</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_protent">Proyección entrada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_proysal">Proyección salida</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_falobli">Falsa oblícua</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_judet">Judet</label>
                                                </div>
                                            </div><!-- /.RX -->
                                            
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_rm">RM</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_artrorm">Artro RM</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_tac">TAC</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_tac3d">TAC + REC 3D</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_ecopbland">Eco partes blandas</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_ecoart">Eco articular</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_dopven">Eco doppler venoso</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_ecodupva">Eco dúplex venoso y arterial</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_emg">EMG</label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_pl_gamgra" class="sw" alt="nobd">GammaGrama</label>
                                                <input type="text" id="x_pl_gamgra" class="form-control finput fw" name="pl_gamgra">
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
                                                  <input type="checkbox" name="lab_otros">Otros</label>
                                                </div>
                                            </div><!-- /.Laboratorios -->
                                        	<div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_pl_otros" class="sw" alt="nobd">Otros</label>
                                                <input type="text" id="x_pl_otros" class="form-control finput fw" name="pl_otros">
                                            </div>
                                            <!-- REF,PROC,CIR -->
                                            <div class="form-group subform">
                                                <!-- Referencias -->
                                                <div class="form-group">
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
                                                      <input type="checkbox" name="ref_cirgen">Cirugía general</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ref_endoc">Endocrinología</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ref_ciresp">Cirugía espinal</label>
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
                                                        <input type="checkbox" name="x_ref_otr" class="sw">Otros</label>
                                                        <input type="text" id="x_ref_otr" class="form-control finput fw" name="ref_otros">
                                                    </div>
                                                </div><!-- /.Referencias -->
                                                
                                                <!-- Procedimientos -->    
                                                <div class="form-group">
                                                    <label for="Palpación">Procedimientos</label>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_pro_atrocen" class="sw" alt="nobd">Artrocentesis</label>
                                                        <input type="text" id="x_pro_atrocen" class="form-control finput fw" name="pro_atrocen">
                                                    </div>
                                                    <!-- Infiltración -->
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
                                                          <input type="checkbox" name="pro_visco">Viscosuplementación</label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label class="checkbox-inline">
                                                          <input type="checkbox" name="pro_plaspl">Plasma plaquetario</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-inline">
                                                            <input type="checkbox" name="x_pro_notas" class="sw">Otros</label>
                                                            <input type="text" id="x_pro_notas" class="form-control finput fw" name="pro_notas">
                                                        </div>
                                                    </div><!-- /.Infiltración -->
                                                
                                                </div><!-- /.Procedimientos -->
                                                
                                                <!-- Cirugía -->
                                                <div class="form-group">
                                                    <label for="Palpación">Cirugía</label>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="cir_atroc">Artroscopia</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="cir_hartplas">Hemiartroplastia</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="cir_atrop">Artroplastia total</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_cir_notas" class="sw">Otros</label>
                                                        <input type="text" id="x_cir_notas" class="form-control finput fw" name="cir_notas">
                                                    </div>
                                                </div><!-- /.Cirugía -->
											
                                            </div><!-- /.REF,PROC,CIR -->
                                            
                                        </div><!-- /.Plan -->
                                        <hr><hr>
                                        <!-- ültimo bloque de formulario -->
                                        <div align="center">
                                            <button type="button" class="btn btn-form" 
                                            data-toggle="modal" data-target="#confirm_modal">Guardar</button>
                                            <?php include("subforms/confirm.php")?>
                                    	</div>
                                    </div>
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