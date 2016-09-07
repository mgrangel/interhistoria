<?php
	/*
	 * Interhistorias - Formulario de rodilla
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
    <script src="../js/setup_fro.js"></script>
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

    <title>Interhistorias - Formulario Rodilla</title>

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
                <div class="col-lg-12" <?php if( $nuser == "mikeven" ){ ?> onClick="checkAll( 'frm_rodilla' )"<?php }?>>
                    <h1 class="page-header">
                    	<span class="title">Historia Clínica de Rodilla</span>
                    </h1>
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
                                <form role="form" id="frm_rodilla" class="form_historia">
                                    <!-- Primera columna -->
                                    <div class="col-lg-6">
                                        <!-- -->
                                        <div>
                                        	<label class="radio-inline">
                                                <input type="radio" name="lado" id="lado_izq" value="Izquierda" checked>Izquierda</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="lado" id="lado_der" value="Derecha">Derecha</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="idPaciente" id="idp" value="<?php echo $dpaciente["idp"];?>">
                                            <input type="hidden" name="idUsuario" id="idu" value="<?php echo $idu;?>">
                                            <input type="hidden" name="borrador" id="fro_borrador" value="1">
                                            <label for="motivo_consulta" class="tsec">Motivo de Consulta</label>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_traumatismo">Traumatismo</label>
                                            </div><!--Dolor-->
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
                                                        <option value="Ocasional">Ocasional</option>
                                                        <option value="Leve">Leve</option>
                                                        <option value="Moderado">Moderado</option>
                                                        <option value="Severo">Severo</option>
                                                        <option value="Incapacitante">Incapacitante</option>
                                                	</select>
                                                </div>
                                            </div><!--Dolor-->
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
                                              <input type="checkbox" name="mc_inest">Inestabilidad</label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" name="mc_crepchasq">Crepitación/Chasquido</label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" name="mc_bloqart">Bloqueo Articular</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_signocine">Signo del cine</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_equimosis">Equímosis</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="text" class="form-control finput" name="mc_notas" title="300">
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="form-group">
                                            <label for="enfermedad_actual" class="tsec">Enfermedad Actual</label>
                                            <div class="form-group subform">
                                                <div class="form-group">
                                                    <div subform>
                                                      <label>Duración Síntomas</label></div>
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
                                        	</div>
                                            <div class="form-group subform">
                                            	<label for="mecanismo_lesion">Mecanismo Lesión</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_caidap">Caída propios pies</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_caltura">Caída altura</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_accdeport">Accidente deportivo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_acctrans">Accidente tránsito</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_aroll">Arrollamiento</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_accinesp">Accidente inespecífico</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" 
                                                  name="ml_conmuscbrus">Contracción muscular brusca/inadecuada</label>
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
                                                  <input type="checkbox" name="ml_valgo">Valgo forzado</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_varo">Varo forzado</label>
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
                                                  <input type="text" class="form-control finput" name="ml_notas" title="300">
                                                </div>
                                        	</div>       
                                        </div>
                                        <!-- Bloque Antecedentes personales y Examen Funcional -->
                                        
                                        <!-- FIN Bloque Antecedentes personales y Examen Funcional -->
                                        <div class="form-group">
                                            <label for="examen_físico" class="tsec">Examen Físico</label>
                                            <!-- * -->
                                            <div class="form-group subform">
                                                <label for="rangos_activos">Rangos Activos</label>
                                                <div class="row">
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left"><label class="checkbox-inline">Flexión</label></div>
                                                        <div id="rs_flex_ext"></div>
                                                        <div id="rsfev" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_flexion" id="rsra_flexion">
                                                        <!--<input type="hidden" class="form-control finput" name="ra_extension" id="rsra_extension">-->
                                                    </div>
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left">
                                                        <label class="checkbox-inline">Lag cuadricipital</label></div>
                                                        <div id="rs_lcuad"></div>
                                                        <div id="rslcv" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_lagcuad" id="rsra_lagcuad">
                                                    </div>
                                                </div>
                                                <label for="Meses">Rangos Pasivos</label>
                                                <div class="row">
                                                    <div class="col-md-3 rslide">
                                                    	<div class="trslide" align="left"><label class="checkbox-inline">Flexión</label></div>
                                                    	<div id="rs_flex_ext_p"></div>
                                                        <div id="rsfev_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_flexion" id="rsrp_flexion">
                                                        <!--<input type="hidden" class="form-control finput" name="rp_extension" id="rsrp_extension">-->
                                                    </div>
                                                </div>
											</div>
                                            <!-- * -->
                                            <div class="form-group subform">
                                                <label for="inspeccion">Inspección</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_aumento_vol">Aumento de volumen</label>
                                                </div>
                                                <div class="checkbox">
                                                  	<label class="checkbox-inline">
                                                	<input type="checkbox" name="x_ef_chds" class="sw" alt="nobd">Derrame sinovial</label>
                                                  	<input type="text" id="x_ef_chds" class="form-control finput fw" name="ins_dersin">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_tpatelar">Tilt patelar</label>
                                                </div>
                                                <div class="checkbox">
                                                  	<label class="checkbox-inline">
                                                	<input type="checkbox" name="x_ef_chvr" class="sw" alt="nobd">Varo(°)</label>
                                                  	<input type="text" id="x_ef_chvr" class="form-control finput fw" name="ins_varo">
                                                </div>
                                                <div class="checkbox">
                                                  	<label class="checkbox-inline">
                                                	<input type="checkbox" name="x_ef_chvg" class="sw" alt="nobd">Valgo(°)</label>
                                                  	<input type="text" id="x_ef_chvg" class="form-control finput fw" name="ins_valgo">
                                                </div>
                                                <div class="checkbox">
                                                  	<label class="checkbox-inline">
                                                	<input type="checkbox" name="x_ef_chaq" class="sw" alt="nobd">Ángulo Q(°)</label>
                                                  	<input type="text" id="x_ef_chaq" class="form-control finput fw" name="ins_angq">
                                                </div>
                                                <div class="checkbox">
                                                  	<label class="checkbox-inline">
                                                	<input type="checkbox" name="x_ef_chhm" class="sw" alt="nobd">Hipomovilidad</label>
                                                  	<input type="text" id="x_ef_chhm" class="form-control finput fw" name="ins_hipomov">
                                                </div>
                                                <div class="checkbox">
                                                  <input type="text" class="form-control finput" name="ins_notas" title="300">
                                                </div>
                                            </div>
                                            <!-- * -->
                                            <label for="maniobras">
                                                <a href="#!" data-toggle="modal" data-target="#manmodal" class="lsec">Maniobras
                                                <i class="fa fa-list-alt"></i></a>
                                            </label>
											<?php include("subforms/man_tfro.php")?>
                                            <div id="lmanfro" class="selopciones"></div>
                                            <!--<div class="sketch">SKETCH</div>-->
                                            <div class="form-group">
                                                <label for="palpacion" class="tsec">Palpación</label>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txrot" class="sw">Rótula</label>
                                                    <input type="text" id="x_txrot" class="form-control finput fw" name="pal_rotula">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txtat" class="sw">TAT</label>
                                                    <input type="text" id="x_txtat" class="form-control finput fw" name="pal_tat">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txtp" class="sw">Tendón patelar</label>
                                                    <input type="text" id="x_txtp" class="form-control finput fw" name="pal_tpat">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txan" class="sw">Anserina</label>
                                                    <input type="text" id="x_txan" class="form-control finput fw" name="pal_anser">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txgy" class="sw">Gerdy</label>
                                                    <input type="text" id="x_txgy" class="form-control finput fw" name="pal_gerdy">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txbit" class="sw">B.I.T.</label>
                                                    <input type="text" id="x_txbit" class="form-control finput fw" name="pal_bit">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txpe" class="sw">Peroné</label>
                                                    <input type="text" id="x_txpe" class="form-control finput fw" name="pal_perone">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txepi" class="sw">Epicóndilos</label>
                                                    <input type="text" id="x_txepi" class="form-control finput fw" name="pal_epicon">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txpop" class="sw">Poplíteo</label>
                                                    <input type="text" id="x_txpop" class="form-control finput fw" name="pal_poplit">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txmes" class="sw">Meseta</label>
                                                    <input type="text" id="x_txmes" class="form-control finput fw" name="pal_meseta">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txisq" class="sw">Isquiotibiales</label>
                                                    <input type="text" id="x_txisq" class="form-control finput fw" name="pal_isquiot">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txtbf" class="sw">Tendón bíceps femoral</label>
                                                    <input type="text" id="x_txtbf" class="form-control finput fw" name="pal_tbifem">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txmas" class="sw">Masas</label>
                                                    <input type="text" id="x_txmas" class="form-control finput fw" name="pal_masas">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txcrp" class="sw">Crepitación</label>
                                                    <input type="text" id="x_txcrp" class="form-control finput fw" name="pal_crep">
                                                </div>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="pal_crepnota" title="300">
                                                </div>
                                                <!-- ------------------------------------------------------------------------------------- -->
                                                <div class="checkbox">
                                                    <label for="pal_trofismo">Trofismo muscular aparato extensor izq(cm)</label>
                                                    <div id="pal_trofismo" class="sldbarval" style="width:85%; float:left;"></div>
                                                    <div id="pal_trofismo_val" class="labsldbarval"></div>
                                                    <div style="clear:both;"></div>
                                                    <input type="hidden" class="form-control finput" name="pal_trofismo" id="frm_pal_trofismo">
                                                </div>
                                                
                                                <div class="checkbox">
                                                    <label for="pal_trofismo">Trofismo muscular aparato extensor der(cm)</label>
                                                    <div id="pal_trofismo_d" class="sldbarval" style="width:85%; float:left;"></div>
                                                    <div id="pal_trofismo_d_val" class="labsldbarval"></div>
                                                    <div style="clear:both;"></div>
                                                    <input type="hidden" class="form-control finput" name="pal_trofismo_d" id="frm_pal_trofismo_d">
                                                </div>
                                                
                                                <div class="checkbox">
                                                  <label for="pal_kt1000">Desplazamiento KT1000 izq(mm)</label>
                                                  <div id="pal_kt1000" class="sldbarval_15" style="width:85%; float:left;"></div>
                                                  <div id="pal_kt1000_val" class="labsldbarval"></div>
                                                  <div style="clear:both;"></div>
                                                  <input type="hidden" class="form-control finput" name="pal_kt1000" id="frm_pal_kt1000">
                                                </div>
                                                
                                                <div class="checkbox">
                                                  <label for="pal_kt1000">Desplazamiento KT1000 der(mm)</label>
                                                  <div id="pal_kt1000_d" class="sldbarval_15" style="width:85%; float:left;"></div>
                                                  <div id="pal_kt1000_d_val" class="labsldbarval"></div>
                                                  <div style="clear:both;"></div>
                                                  <input type="hidden" class="form-control finput" name="pal_kt1000_d" id="frm_pal_kt1000_d">
                                                </div>
                                                <!-- ------------------------------------------------------------------------------------- -->
                                                <label for="notas_pp">Rodilla contralateral</label>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="pal_rodcontra" title="300">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--========================================= Fin primera columna ==================================== -->
                                    <!--=========================================== Segunda columna ====================================== -->
                                    <div class="col-lg-6">
                                        <!-- Ex FCL -->
                                        <div class="checkbox">
                                            <a href="#!" class="lsec sw" name="x_ef_columbar">Examen de Columna Lumbar 
                                            <i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div id="x_ef_columbar" class="checkbox fw">
                                            <div class="checkbox">
                                              <label for="ef_columbar">Examen de Columna Lumbar</label>
                                              <input type="text" class="form-control finput" name="ef_columbar">
                                            </div>
                                            <label for="ef_columbar">
                                                <a id="lnkidp" href="formulario-columna-lumbar.php<?php echo $lnkidp;?>" 
                                                data-nfrm="formulario-columna-lumbar.php" target="_blank">Examen de Columna Lumbar
                                                <i class="fa fa-external-link"></i></a>
                                            </label>
                                        </div>
                                        <!-- Ex FCA -->
                                        <div class="checkbox">
                                            <a href="#!" class="lsec sw" name="x_ef_cadera">Examen de caderas <i class="fa fa-chevron-down">
                                            </i></a>
                                        </div>
                                        <div id="x_ef_cadera" class="checkbox fw extlnkform">
                                            <div class="checkbox">
                                                <label for="ef_cadera">Examen de caderas</label>
                                                <input type="text" class="form-control finput" name="ef_cadera">
                                            </div>
                                            <label for="ef_cadera">
                                                <a id="lnkidp" href="formulario-cadera-adulto.php<?php echo $lnkidp;?>" 
                                                data-nfrm="formulario-cadera-adulto.php" target="_blank">
                                                Examen de cadera del adulto <i class="fa fa-external-link"></i></a>
                                            </label>
                                        </div>
                                        <!-- -->
                                        <div class="form-group">
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_hiperlaxart">Hiperlaxitud articular</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_cadlocafe">Cadena cinemática local afectada</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_nvasclocafec">Neuro-vascular local afectado</label>
                                            </div>
                                        </div>
                                        <!-- * -->
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
                                                <input type="checkbox" name="x_txlab" class="sw">Laboratorios</label>
                                                <textarea id="x_txlab" class="form-control finput fw" name="es_labs" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txotr" class="sw">Otros</label>
                                                <textarea id="x_txotr" class="form-control finput fw" name="es_otros" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- * -->
                                        <label for="impresion_diagnostica">
                                            <a href="#!" data-toggle="modal" data-target="#idxmodal" 
                                            class="lsec">Impresión Diagnóstica <i class="fa fa-list-alt"></i></a>
                                        </label>
                                        <?php include("subforms/tidx_fro.php")?>
                                        <div id="lidxro" class="selopciones"></div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="plan" class="tsec">Plan</label>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" id="chrx" name="pl_rx" value="RM">Rayos X</label>
                                            </div> 
                                            <div class="form-group subform" id="blockrx">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_apsimple">AP simple</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_apoyo">AP con apoyo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_latsimple">Lateral simple</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_lat30flex">Lateral 30° flexión</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_laxirot20">Laurin-Axial rótula 20°</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_meraxrot">Merchant-Axial rótula</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txplotr" class="sw">Otros</label>
                                                    <input type="text" id="x_txplotr" class="form-control finput fw" name="rx_otros">
                                                </div>
                                                <!--<div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_proytunel">Proyección túnel</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_oblicuaext">Oblícua externa</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_oblicuaint">Oblícua interna</label>
                                                </div>-->
                                            </div>
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
                                              <input type="checkbox" name="pl_tacfulk">TAC Fulkerson</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_tacrec3d">TAC + REC 3D</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_ecopb">Eco partes blandas</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_ecoart">Eco articular</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_ecodvenoso">Eco doppler venoso</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_dupvenart">Eco dúplex venoso y arterial</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_emg">EMG</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_gamma">Gammagrama</label>
                                            </div>
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
                                            </div>
                                        </div>
                                        <!-- * -->
                                        <div class="form-group subform">
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
                                                  <input type="checkbox" name="ref_endocrin">Endocrinología</label>
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
                                                    <input type="checkbox" name="x_txrefotros" class="sw">Otros</label>
                                                    <input type="text" id="x_txrefotros" class="form-control finput fw" name="ref_otros">
                                                </div>
                                            </div>
                                        	<!-- * -->
                                            <div class="form-group">
                                                <label for="procedimientos">Procedimientos</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pr_atrocentesis">Artrocentesis</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            	<label for="Infiltración">Infiltración</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pr_anestloc">Anestesia local</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pr_esteroides">Esteroides</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pr_viscosup">Viscosuplementación</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pr_plasmaplaq">Plasma plaquetario</label>
                                                </div>
                                            </div>
                                        	<!-- * -->
                                            <div class="form-group">
                                                <label for="Examen de cadera">Cirugía</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="cir_cirugia">Artroscopia</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="cir_reconsliga">Reconstrucción ligamentaria</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="cir_osteomia">Osteotomía</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="cir_artroplastia">Artroplastia</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ültimo bloque de formulario -->
                                    </div>
                                    <div align="center">
                                        <button type="button" class="btn btn-form" data-toggle="modal" data-target="#confirm_modal">Guardar</button>
                                        <?php include("subforms/confirm.php")?>
                                    </div>
                                    <!--  -->
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