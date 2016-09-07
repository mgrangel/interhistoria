<?php
	/*
	 * Interhistorias - Formulario de codo
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
    <script src="../js/setup_fco.js"></script>
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

    <title>Interhistorias - Formulario Codo</title>

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
                <div class="col-lg-12" onClick="checkAll( 'frm_codo' )">
                    <h1 class="page-header"><span class="title">Historia Clínica de Codo</span></h1>
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
                                <form role="form" id="frm_codo" class="form_historia">
                                    <div class="col-lg-6">
                                    	<div>
                                        	<label class="radio-inline">
                                                <input type="radio" name="lado" id="lado_izq" value="Izquierdo">Izquierdo</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="lado" id="lado_der" value="Derecho" checked>Derecho</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="idPaciente" id="idp" value="<?php echo $dpaciente["idp"];?>">
                                            <input type="hidden" name="idUsuario" id="idu" value="<?php echo $idu;?>">
                                            <label for="motivo_consulta" class="tsec">Motivo de Consulta</label>
                                            <div class="form_group">
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" name="mc_traumatismo">Traumatismo</label>
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
                                                            <option value="Punzante">Punzante</option>
                                                            <option value="Opresivo">Opresivo</option>
                                                            <option value="Sordo">Sordo</option>
                                                            <option value="Terebrante">Terebrante</option>
                                                            <option value="Lancinante">Lancinante</option>
                                                            <option value="Urante">Urante</option>
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
                                                  <label><input type="checkbox" name="mc_aumento_vol">Aumento de volumen</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label><input type="checkbox" name="mc_deformidad">Deformidad</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label><input type="checkbox" name="mc_inestabilidad">Inestabilidad</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="mc_crep_chasq">Crepitación/Chasquido</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="mc_bloq_art">Bloqueo articular</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label for="notas_motivos">
                                                    <input type="text" class="form-control finput" name="mc_notas" title="300"></label>
                                                </div>
                                        	</div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                              <label for="enfermedad_actual" class="tsec">Enfermedad Actual</label></div>
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
                                                <div>
                                                  <label for="exampleInputEmail1">Mecanismo Lesión</label></div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_caidap">Caída propios pies</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_mestir">Caída mano estirada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_tracon">Traumatismo contuso</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_tracor">Traumatismo cortante</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_valgo">Valgo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_varo">Varo</label>
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
                                                    <input type="text" class="form-control finput" name="ml_otros" title="300">
                                                </div>
                                        	</div>
                                        </div>
                                        <!-- Bloque Antecedentes personales y Examen Funcional -->
                                        <!--<label for="maniobras">
                                            <a href="#!" data-toggle="modal" data-target="#antemodal" class="lsec">Antecedentes y Examen funcional
                                            <i class="fa fa-list-alt"></i></a>
                                        </label>-->
                                        <?php //include( "subforms/antecedentes.php" )?>
                                        <!-- FIN Bloque Antecedentes personales y Examen Funcional -->
                                        <div class="form-group">
                                            <div>
                                              <label for="exampleInputEmail1" class="tsec">Examen Físico</label></div>
                                            <div class="form-group subform">
                                                <div>
                                                  <label for="exampleInputEmail1">Rangos Activos</label></div>
                                                <div class="row">
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left"><label class="checkbox-inline">Flex - Ext</label></div>
                                                        <div id="rs_flex_ext"></div>
                                                        <div id="rsfev" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" 
                                                        name="ra_flexion" id="rsra_flexion" value="0">
                                                        <input type="hidden" class="form-control finput" 
                                                        name="ra_extension" id="rsra_extension" value="0">
                                                    </div>
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left">
                                                        	<label class="checkbox-inline">Supinación - Pronación</label></div>
                                                        <div id="rs_supron"></div>
                                                        <div id="rsspv" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_supina" id="rsra_supina" value="0">
                                                        <input type="hidden" class="form-control finput" name="ra_pronac" id="rsra_pronac" value="0">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group subform">
                                                <div>
                                                  <label for="exampleInputEmail1">Rangos Pasivos</label></div>
                                                <div class="row">
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left"><label class="checkbox-inline">Flex - Ext</label></div>
                                                        <div id="rs_flex_ext_p"></div>
                                                        <div id="rsfev_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" 
                                                        name="rp_flexion" id="rsrp_flexion" value="0">
                                                        <input type="hidden" class="form-control finput" 
                                                        name="rp_extension" id="rsrp_extension" value="0">
                                                    </div>
                                                    <div class="col-md-3 rslide">
                                                        <div class="trslide" align="left">
                                                            <label class="checkbox-inline">Supinación - Pronación</label></div>
                                                        <div id="rs_supron_p"></div>
                                                        <div id="rsspv_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_supina" id="rsrp_supina" value="0">
                                                        <input type="hidden" class="form-control finput" name="rp_pronac" id="rsrp_pronac" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group subform">
                                                <label for="exampleInputEmail1">Inspección</label>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_aumvol">Aumento de volumen</label>
                                                </div>
                                                <div class="checkbox">
                                                  	<label class="checkbox-inline">
                                                	<input type="checkbox" name="x_txed" class="sw" alt="nobd">Edema</label>
                                                  	<input type="text" id="x_txed" class="form-control finput fw" name="ins_edema">
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_equimo">Equimosis</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ins_striang">Signo del triángulo</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">Ángulo estimado</label>
                                                </div>
                                                <div class="col-md-3 rslide">
                                                    <div class="trslide" align="left"><label class="checkbox-inline">Valgo</label></div>
                                                    <div id="rs_ef_valgo"></div>
                                                    <div id="rsvlg" class="txrsval"></div>
                                                    <input type="hidden" class="form-control finput" name="ins_valgo" id="rsef_valgo" value="0">
                                                </div>
                                                <div class="col-md-3 rslide">
                                                    <div class="trslide" align="left"><label class="checkbox-inline">Varo</label></div>
                                                    <div id="rs_ef_varo"></div>
                                                    <div id="rsva" class="txrsval"></div>
                                                    <input type="hidden" class="form-control finput" name="ins_varo" id="rsef_varo" value="0">
                                                </div>
                                                <div class="checkbox">
                                                    <input type="text" class="form-control finput" name="ins_notas">
                                                </div>
                                                
                                        	</div>
                                            <!-- * -->
                                            <label for="maniobras">
                                                <a href="#!" data-toggle="modal" data-target="#manmodal" 
                                                class="lsec">Maniobras <i class="fa fa-list-alt"></i></a>
                                            </label>
                                            <?php include( "subforms/man_tfco.php" )?>
                                            <div id="lmanho" class="selopciones"></div>
                                            <!-- * -->
                                        </div>
                                    </div>
                                    <!--========================================= Fin primera columna ==================================== -->
                                    <!--=========================================== Segunda columna ====================================== -->
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label for="palpacion" class="tsec">Palpación</label>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_pal_burole" class="sw">Bursa Olecraneana</label>
                                                <input type="text" id="x_pal_burole" class="form-control finput fw" name="pal_burole">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_olecra">Olecranon</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_tentric">Tendón Tríceps</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_epiext">Epicondilo externo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_textsup">Tendón Extenso-Supinador</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_epicinep">Epicondilo Interno/Epitroclea </label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_tenflexpro">Tendón Flexo-Pronador</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_cupcabrad">Cúpula/Cabeza Radial</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_coron">Coronoides</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_ligcolrad">Ligamento Colateral Radial</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_ligcoluln">Ligamento Colateral Ulnar</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_tenbic">Tendón Bíceps</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_tbr">Tuberosidad Bicipital Radio</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_artbraq">Arteria Braqueal</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_artrad">Arteria Radial</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pal_nervuln">Nervio Ulnar</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="text" class="form-control finput" name="pal_notas">
                                            </div>
                                            <!--<div>SKETCH</div>-->
                                        </div>
                                        <div class="form-group">
                                        	<!-- Ex FHO -->
                                        	<div class="checkbox">
                                                <a href="#!" class="lsec sw" name="x_efhips">Examen de Hombro Ipsilateral 
                                                <i class="fa fa-chevron-down"></i></a>
                                            </div>
                                            <div id="x_efhips" class="checkbox fw">
                                            	<div class="checkbox">
                                                  <label for="ef_hips">Examen de Hombro Ipsilateral</label>
                                                  <input type="text" class="form-control finput" name="ef_hips">
                                                </div>
                                                <label>
                                                    <a id="lnkidp" href="formulario-hombro.php<?php echo $lnkidp;?>" 
                                                    data-nfrm="formulario-hombro.php" target="_blank"> 
                                                    Examen de hombro <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div>
                                            <!-- Ex FCC -->
                                            <div class="checkbox">
                                                <a href="#!" class="lsec sw" name="x_efcolc">Examen de Columna Cervical 
                                                <i class="fa fa-chevron-down"></i></a>
                                            </div>
                                            <div id="x_efcolc" class="checkbox fw">
                                            	<div class="checkbox">
                                                  <label for="ex_colls">Examen de Columna Cervical</label>
                                                  <input type="text" class="form-control finput" name="ef_colc">
                                                </div>
                                                <label for="ex_columbar">
                                                    <a id="lnkidp" href="formulario-columna-cervical.php<?php echo $lnkidp;?>" 
                                                    data-nfrm="formulario-columna-cervical.php" target="_blank">Examen de Columna Cervical
                                                    <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div>
                                            <!-- Ex FMA -->
                                            <div class="checkbox">
                                                <a href="#!" class="lsec sw" name="x_ef_munips">Examen de Muñeca Ipsilateral 
                                                <i class="fa fa-chevron-down"></i></a>
                                            </div>
                                            <div id="x_ef_munips" class="checkbox fw">
                                            	<div class="checkbox">
                                                  <label for="ef_munips">Examen de Muñeca Ipsilateral</label>
                                                  <input type="text" class="form-control finput" name="ef_munips">
                                                </div>
                                                <label for="ex_columbar">
                                                    <a id="lnkidp" href="#!" 
                                                    data-nfrm="formulario-mano.php" target="_blank">Examen de Mano-Muñeca
                                                    <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="checkbox">
                                          <label class="checkbox-inline">
                                          <input type="checkbox" name="ef_cadlocafe">Cadena Cinemática Local Afectada</label>
                                        </div>
                                        <!-- * -->
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
                                                <input type="checkbox" name="x_txlab" class="sw">Laboratorios</label>
                                                <textarea id="x_txlab" class="form-control finput fw" name="es_labs" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- * -->
                                        <label for="impresion_diagnostica">
                                            <a href="#!" data-toggle="modal" data-target="#idxmodal" 
                                            class="lsec">Impresión Diagnóstica <i class="fa fa-list-alt"></i></a>
                                        </label>
                                        <?php include("subforms/tidx_fco.php")?>
                                        <div id="lidxho" class="selopciones"></div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <div><label for="fh-plan" class="tsec">Plan</label></div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_rx" id="chrx">Rayos X</label>
                                            </div>
                                            <div class="form-group subform" id="blockrx">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_ap">AP</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_apverdadera">AP verdadera</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_axial">Axial</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_axilar">Axilar</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_escapula">Y de escápula</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_latranst">Lateral transtorácica</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_salida">Salida</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txplotr" class="sw">Otros</label>
                                                    <input type="text" id="x_txplotr" class="form-control finput fw" name="rx_otros">
                                                </div>
                                            </div>
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
                                              <input type="checkbox" name="pl_us">US</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_emg">EMG</label>
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
                                        <div class="form-group subform">
                                            <label for="Referencias">Referencias</label>
                                            <div class="form-group">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ref_rehab">Rehabilitación</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ref_reuma">Reumatología</label>
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
                                                    <input type="checkbox" name="x_ch_refartro" class="sw">Artocentésis</label>
                                                    <input type="text" id="x_ch_refartro" class="form-control finput fw" name="ref_atroc">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group subform">
                                            <label for="Infiltración">Infiltración</label>
                                            <div class="form-group">
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
                                                  <input type="checkbox" name="pro_plaplaq">Plasma plaquetario</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group subform">    
                                            <label for="Cirugía">Cirugía</label>
                                            <div class="form-group">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="cir_artrot">Artrotomía</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="cir_artscop">Artroscopia</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="cir_reclig">Reconstrucción ligamentaria</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkbox">
                                            <input type="text" name="pl_notas" class="form-control finput">
                                        </div>
                                        <!-- último bloque de formulario -->
                                        <div align="center">
                                            <button type="button" class="btn btn-form" 
                                            data-toggle="modal" data-target="#confirm_modal">Guardar</button>
                                            <?php include("subforms/confirm.php")?>
                                    	</div>
                                    </div>
                                    <!--<div onClick="getElems( 'frm_codo' )">.</div>-->
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