<?php
	/*
	 * Interhistorias - Formulario pie y tobillo
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
    <script src="../js/setup_fpt.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="../css/ihstyle.css">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interhistorias - Formulario Pie-Tobillo</title>

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
                    <h1 class="page-header" onClick="checkAll( 'frm_pie_tobillo' )">
                    	<span class="title">Historia clínica de pie-tobillo</span>
                        <span class="title" onClick="checkAll( 'frm_pie_tobillo_d' )">.</span>
                    </h1>
                </div>
                <div class="col-lg-12">
                	<div id="form_selector" align="center">
                		<a id="selizq" href="#!" onClick="slideForm('izq')">IZQ</a>&nbsp;&nbsp;  
                        <a id="selder" href="#!" onClick="slideForm('der')">DER</a>&nbsp;&nbsp;
                        <a id="selder" href="formulario-pies-tobillos.php">AMBOS</a>&nbsp;&nbsp; 
                    </div>
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
                            <div id="panel-bizq" class="row">
                                <div id="fixed-right" align="center"><div class="vtext" align="center">IZQ</div></div>
                                <form role="form" id="frm_pie_tobillo">
                                    <!-- Primera columna -->
                                    <div class="col-lg-6">
                                        <!-- -->
                                        <div class="form-group">
                                            <input type="hidden" name="idPaciente" id="idp" value="<?php echo $dpaciente["idp"];?>">
                                            <input type="hidden" name="idUsuario" id="idu" value="<?php echo $idu;?>">
                                            <input type="hidden" name="izq_der" id="izqder" value="izq">
                                            
                                            <label for="motivo_consulta" class="tsec">Motivo de Consulta</label>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="traumatismo">Traumatismo</label>
                                            </div>
                                            <!--Dolor-->
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
                                                  <input type="text" class="form-control finput" name="dol_cartipo">
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
                                                  <label for="exacerbantes_atenuantes">Exacerbantes/atenuantes</label>
                                                  <input type="text" class="form-control finput" name="dol_exaten">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="Severidad">Severidad</label>
                                                  <input type="text" class="form-control finput" name="dol_sever">
                                                </div>
                                            </div><!--Dolor-->
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="aumento_vol">Aumento de volumen</label>
                                            </div>
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="deform">Deformidad</label>
                                            </div>
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="inest">Inestabilidad</label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" name="crep_chasq">Crepitación/Chasquido</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="equimosis">Equimosis</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="ulcera">Ulcera</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="text" class="form-control finput" name="motivos_notas" title="300">
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
                                                        <input type="radio" name="rb_ds" class="rbdur" value="dur_ld">Larga data
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
                                                  <input type="checkbox" name="caida_pies">Caída propios pies</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="caida_altura">Caída altura</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="acc_deport">Accidente deportivo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="acc_trans">Accidente tránsito</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="arroll">Arrollamiento</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="acc_inesp">Accidente inespecífico</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" 
                                                  name="cont_musc_br">Contracción muscular brusca/inadecuada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="invforz">Inversión forzada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="everforz">Eversión forzada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="flexplant">Flexión plantar</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="flexdors">Flexión dorsal</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pronacion">Pronación</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="supinacion">Supinación</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="trauma_contuso">Traumatismo contuso</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="trauma_cortante">Traumatismo cortante </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="congenito">Congénito</label>
                                                </div>
                                        	</div> 
                                            <div class="checkbox">
                                              <input type="text" class="form-control finput" name="mlesion_notas" title="300">
                                            </div>      
                                        </div>
                                        <!-- -->
                                        <div class="form-group">
                                            <label for="antecedentes_personales" class="tsec">Antecedentes Personales</label>
                                            <div class="checkbox">
                                                <label for="traumatologicos">Traumatológicos</label>
                                                <textarea class="form-control finput" name="ap_trauma" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label for="quirurgicos">Quirúrgicos</label>
                                                <textarea class="form-control finput" name="ap_quir" rows="3"></textarea>
                                            </div>
                                            <div class="form-group subform">
                                                <div><label for="alergias">Alergias</label></div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="al_asa">ASA</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="al_aines">AINEs</label>
                                                </div>
                                                <div class="checkbox">
                                                  	<label class="checkbox-inline">
                                                	<input type="checkbox" name="x_dch_otral" class="sw">Otros</label>
                                                  	<input type="text" id="x_dch_otral" class="form-control finput fw" name="al_otros">
                                                </div>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ap_dmhiper">DM/Hiperinsulinismo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ap_hta">HTA</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ap_asma">Asma</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ap_tiroides">Tiroides</label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txapmed" class="sw">Medicamentos</label>
                                                <input type="text" id="x_txapmed" class="form-control finput fw" name="ap_medic">
                                            </div>
                                            <div class="checkbox">
                                                <input type="text" class="form-control finput" name="ap_notas" title="300">
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="form-group">
                                            <label for="examen_funcional" class="tsec">Examen Funcional</label>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="rigidez_matutina">Rigidez matutina</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="perdida_peso">Pérdida peso</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="gana_peso">Ganancia peso</label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="apetito">Apetito</label>
                                                <input type="text" class="form-control finput" name="apetito">
                                            </div>
                                            <div class="checkbox">
                                                <label for="micciones">Micciones</label>
                                                <input type="text" class="form-control finput" name="micciones">
                                            </div>
                                            <div class="checkbox">
                                                <label for="evacuaciones">Evacuaciones</label>
                                                <input type="text" class="form-control finput" name="evacuaciones">
                                            </div>
                                            <div class="checkbox">
                                                <label for="hab_psicobio">Hábitos Psicobiológicos</label>
                                                <input type="text" class="form-control finput" name="hab_psicobio">
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="form-group">
                                            <label for="examen_físico" class="tsec">Examen Físico</label>
                                            <!-- * -->
                                            <div><label for="tpie">Inspección</label></div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txmar" class="sw" alt="nobd">Marcha</label>
                                                <input type="text" id="x_txmar" class="form-control finput fw" name="ef_marcha">
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txclz" class="sw" alt="nobd">Calzado</label>
                                                <input type="text" id="x_txclz" class="form-control finput fw" name="ef_calzado">
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txpis" class="sw" alt="nobd">Pisada</label>
                                                <input type="text" id="x_txpis" class="form-control finput fw" name="ef_pisada">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_piecavo">Pie cavo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_pieplano">Pie plano</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_piequiv">Pie equinovaro</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_arctra">Arco transversal</label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txeqm" class="sw" alt="nobd">Equimosis</label>
                                                <input type="text" id="x_txeqm" class="form-control finput fw" name="ef_equim">
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txavol" class="sw" alt="nobd">Aumento de volumen</label>
                                                <input type="text" id="x_txavol" class="form-control finput fw" name="ef_aumvol">
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txefv" class="sw" alt="nobd">Edema con fovea tobillo</label>
                                                <input type="text" id="x_txefv" class="form-control finput fw" name="ef_efovtob">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_equino">Equino</label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txher" class="sw" alt="nobd">Herida</label>
                                                <input type="text" id="x_txher" class="form-control finput fw" name="ef_herida">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_lpiel">Lesiones piel</label>
                                            </div>
                                           	<div class="form-group subform">
                                            	<label for="tpie">Tipo Pie</label>
                                            	<div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ef_pegip">Pie egipcio</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ef_pgmort">Pie griego/Morton</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ef_promcuad">Pie romano/cuadrado</label>
                                                </div>
                                            </div>
                                            <div class="form-group subform">
                                            	<label for="tpie">Retropie</label>
                                            	<div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txval" class="sw" alt="nobd">Valgo(°)</label>
                                                    <input type="text" id="x_txval" class="form-control finput fw" name="ef_valgo">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txvar" class="sw" alt="nobd">Varo(°)</label>
                                                    <input type="text" id="x_txvar" class="form-control finput fw" name="ef_varo">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ef_haglund">Haglund</label>
                                                </div>
                                            </div>
                                            <div class="form-group subform">
                                            	<label for="medpie">Mediopie</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ef_metaducto">Metatarso aducto</label>
                                                </div>
                                            </div>
                                            <div class="form-group subform">
                                            	<label for="antpie">Antepie</label>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ef_bunion">Bunion</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ef_hallvalg">Hallux valgo</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txafk" class="sw" alt="nobd">Angulo fick(°)</label>
                                                    <input type="text" id="x_txafk" class="form-control finput fw" name="ef_afick">
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ef_bnette">Bunionette</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txdgar" class="sw" alt="nobd">Dedo garra</label>
                                                    <input type="text" id="x_txdgar" class="form-control finput fw" name="ef_dgarra">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txdmar" class="sw" alt="nobd">Dedo martillo</label>
                                                    <input type="text" id="x_txdmar" class="form-control finput fw" name="ef_dmart">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txdmal" class="sw" alt="nobd">Dedo mallet</label>
                                                    <input type="text" id="x_txdmal" class="form-control finput fw" name="ef_dmallet">
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ef_pdactil">Polidactilia</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txpnq" class="sw" alt="nobd">Paroniquia</label>
                                                    <input type="text" id="x_txpnq" class="form-control finput fw" name="ef_pniquia">
                                                </div>
                                            </div>
                                            <div class="form-group subform">
                                                <label for="rangos_activos">Rangos Activos</label>
                                                <div class="checkbox">
                                                    <label for="ra_flexion">Dorsiflexión(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_dflexion">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_extension">Flexión plantar(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_flexplan">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Supinación(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_supina">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Pronación(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_prona">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Extensión dedos(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_extded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Flexión dedos(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_flexded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Abducción pie(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_abdpie">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Aducción pie(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_adpie">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Abducción dedos(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_abdded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Aducción dedos(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_aded">
                                                </div>
                                                <label for="Meses">Rangos Pasivos</label>
                                                <div class="checkbox">
                                                    <label for="ra_flexion">Dorsiflexión(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_dflexion">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_extension">Flexión plantar(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_flexplan">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Supinación(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_supina">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Pronación(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_prona">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Extensión dedos(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_extded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Flexión dedos(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_flexded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Abducción pie(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_abdpie">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Aducción pie(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_adpie">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Abducción dedos(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_abdded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Aducción dedos(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_aded">
                                                </div>
											</div>
                                            <!-- * -->                                            
                            				<label for="maniobras">
                                            	<a href="#!" data-toggle="modal" data-target="#manmodal" class="lsec">Maniobras
                                                <i class="fa fa-list-alt"></i></a>
                                            </label>
                    						<?php include( "subforms/man_tfpt.php" )?>
                                            <div id="lmanfpt" class="selopciones"></div>
                                            <!-- * -->
                                        </div>
                                    </div>
                                    <!-- Fin primera columna -->
                                    <!-- Segunda columna -->
                                    <div class="col-lg-6">
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="palpacion" class="tsec">Palpación</label>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="aquiles">Aquiles</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="b5mtt">Base 5to MTT</label>
                                            </div>
                                            
                                            <div class="checkbox">
                                                <label for="ef_efovtob">Cabezas metatarsianos</label>
                                                <input type="text" class="form-control finput" name="cbzmetatar">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="calca">Calcáneo</label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="ef_masas">Crepitación</label>
                                                <input type="text" class="form-control finput" name="crepit">
                                            </div>
                                            <div class="checkbox">
                                                <label for="ef_efovtob">Dedos</label>
                                                <input type="text" class="form-control finput" name="dedos">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="delto">Deltoideo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="escaf">Escafoides</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                            <input type="checkbox" name="larttc">Línea articular talo-crural</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="maltib">Maleolo tibial</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="malext">Maleolo externo</label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="ef_masas">Masas</label>
                                                <input type="text" class="form-control finput" name="masas">
                                            </div>
                                            <div class="checkbox">
                                                <label for="ef_efovtob">Metatarsiano</label>
                                                <input type="text" class="form-control finput" name="metatar">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="perasant">Peroneo astragalino anterior</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="peraspos">Peroneo astragalino posterior</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="percal">Peroneo calcáneo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pulped">Pulso pedeo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="tenper">Tendones peroneos</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="tentibpf">Tendón tibial posterior y flexores</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="tentiba">Tendón tibial anterior</label>
                                            </div>
                                            <div class="checkbox">
                                              <input type="text" class="form-control finput" name="ef_notas" title="300">
                                            </div>
                                        </div>
                                        <div class="sketch">SKETCH</div>
                                        <div class="form-group">
                                            <label for="exam_roipsi">Examen de Rodilla Ipsilateral</label>
                                            <input type="text" class="form-control finput" name="exam_roipsi">
                                            <label for="exam_caipsi">Examen de Cadera Ipsilateral</label>
                                            <input type="text" class="form-control finput" name="exam_caipsi">
                                            <div>
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="cadcinlocafe">Cadena cinemática local afectada</label>
                                            </div>
                                            <div>
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="nvaslocafe">Neuro-vascular local afectado</label>
                                            </div>
                                            <label for="fmusc">Fuerza Muscular</label>
                                            <input type="text" class="form-control finput" name="fmusc">
                                            <div class="form-group">
                                            	<div class="form-group">Columna común</div>
                                                <label for="fmusc">Examen de Columna Lumbar</label>
                                                <input type="text" class="form-control finput" name="excolumb">
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="hiperlaxart">Hiperlaxitud articular</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="estudios" class="tsec">Trae Estudios</label>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txrx" class="sw">Rayos X</label>
                                                <textarea id="x_txrx" class="form-control finput fw" name="es_rx" rows="3"></textarea>
                                                <input type="text" >
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
                                                <input type="text" id="x_txotr" class="form-control finput fw" name="es_otros">
                                            </div>
                                        </div>
                                        <!-- * -->
                                        <label for="impresion_diagnostica">
                                            <a href="#!" data-toggle="modal" data-target="#idxmodal" 
                                            class="lsec">Impresión Diagnóstica <i class="fa fa-list-alt"></i></a>
                                        </label>
                                        <?php include( "subforms/tidx_fpt.php" )?>
                                        <div id="lidxfpt" class="selopciones"></div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="plan" class="tsec">Plan</label>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" id="chrx" name="pl_rx">Rayos X</label>
                                            </div> 
                                            <div class="form-group subform" id="blockrx">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_aptob">AP tobillo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_latob">Lateral tobillo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_mortaja">Mortaja</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_apcapoy">AP ambos pies con apoyo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_oblpie">Oblícua pie</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_latsimpie">Lateral simple pie</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_latapoy">Lateral con apoyo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_oblicuaint">Axiales  calcáneo/harris</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_broden">Broden</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_canale">Canale</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_proses">Proyección sesamoideos</label>
                                                </div>
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
                                              <input type="checkbox" name="pl_tacrec3d">TAC + REC 3D</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_ecopb">Eco partes blandas</label>
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
                                              <input type="checkbox" name="pl_labs">Laboratorios</label>
                                            </div>
                                        </div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="Examen de cadera" class="tsec">Referencias</label>
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
                                              <input type="checkbox" name="ref_preoper">Preoperatorio</label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_txrefotros" class="sw">Otros</label>
                                                <input type="text" id="x_txrefotros" class="form-control finput fw" name="ref_otros">
                                            </div>
                                        </div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="procedimientos" class="tsec">Procedimientos</label>
                                            <div class="checkbox">
                                                <label for="pr_atrocentesis">Artrocentesis</label>
                                                <input type="text" class="form-control finput" name="pr_atrocentesis">
                                            </div>
                                            <div class="form-group subform">
                                                <label for="Examen de cadera">Infiltración</label>
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
                                        </div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="Examen de cadera" class="tsec">Cirugía</label>
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
                                        </div>
                                        <!-- ültimo bloque de formulario -->
                                        <div id="informe_autogenerado"></div>
                                    </div>
                                    <div align="center">
                                        <button type="button" class="btn btn-form" data-toggle="modal" data-target="#confirm_modal_i">Guardar</button>
                                        
										<div class="modal fade" id="confirm_modal_i" tabindex="-1" 
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button id="closemodalx" type="button" 
                                                    class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title tsec" id="myModalLabel">Confirmar</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <span class="dataTable">Confirma el registro del formulario de historia médica</span>    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-primary" 
                                                    onclick="regHistoriaI_D( 'frm_pie_tobillo', 'nresp' )">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <a href="#!" onClick="getElems('frm_pie_tobillo')">_</a>
                                    <!--  -->
                                    <div id="formelems"></div><div id="nresp"></div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
 <!-- ///////////////////////////////////////////////////////////// DIVISION FORMULARIOS //////////////////////////////////////////////////////// -->
                            <div id="panel-bder" class="row">
                                <div id="fixed-right"><div class="vtext">DER</div></div>
                                <form role="form" id="frm_pie_tobillo_d">
                                    <!-- Primera columna -->
                                    <div class="col-lg-6">
                                        <!-- -->
                                        <div class="form-group">
                                            <input type="hidden" name="idPaciente" id="idp_d">
                                            <input type="hidden" name="idUsuario" id="idu" value="<?php echo $idu;?>">
                                            <input type="hidden" name="izq_der" id="izqder" value="der">
                                            
                                            <label for="motivo_consulta" class="tsec">Motivo de Consulta</label>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="traumatismo">Traumatismo</label>
                                            </div><!--Dolor-->
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" id="dchdolor" name="dolor">Dolor</label>
                                            </div>
                                            <div id="dblockdolor" class="form-group subform">
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
                                                  <input type="text" class="form-control finput" name="dol_cartipo">
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
                                                  <label for="exacerbantes_atenuantes">Exacerbantes/atenuantes</label>
                                                  <input type="text" class="form-control finput" name="dol_exaten">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="Severidad">Severidad</label>
                                                  <input type="text" class="form-control finput" name="dol_sever">
                                                </div>
                                            </div><!--Dolor-->
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="aumento_vol">Aumento de volumen</label>
                                            </div>
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="deform">Deformidad</label>
                                            </div>
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="inest">Inestabilidad</label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" name="crep_chasq">Crepitación/Chasquido</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="equimosis">Equimosis</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="ulcera">Ulcera</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="text" class="form-control finput" name="motivos_notas" title="300">
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
                                                        <input type="radio" name="rb_ds" class="rbdur" value="dur_ld">Larga data
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
                                                  <input type="checkbox" name="caida_pies">Caída propios pies</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="caida_altura">Caída altura</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="acc_deport">Accidente deportivo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="acc_trans">Accidente tránsito</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="arroll">Arrollamiento</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="acc_inesp">Accidente inespecífico</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" 
                                                  name="cont_musc_br">Contracción muscular brusca/inadecuada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="invforz">Inversión forzada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="everforz">Eversión forzada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="flexplant">Flexión plantar</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="flexdors">Flexión dorsal</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pronacion">Pronación</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="supinacion">Supinación</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="trauma_contuso">Traumatismo contuso</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="trauma_cortante">Traumatismo cortante </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="congenito">Congénito</label>
                                                </div>
                                                <div class="checkbox">
                                                  <input type="text" class="form-control finput" name="mlesion_notas" title="300">
                                                </div>
                                        	</div>       
                                        </div>
                                        <!-- -->
                                        <div class="form-group">
                                            <label for="antecedentes_personales" class="tsec">Antecedentes Personales</label>
                                            <div class="checkbox">
                                                <label for="traumatologicos">Traumatológicos</label>
                                                <textarea class="form-control finput" name="ap_trauma" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label for="quirurgicos">Quirúrgicos</label>
                                                <textarea class="form-control finput" name="ap_quir" rows="3"></textarea>
                                            </div>
                                            <div class="form-group subform">
                                                <div><label for="alergias">Alergias</label></div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="al_asa">ASA</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="al_aines">AINEs</label>
                                                </div>
                                                <div class="checkbox">
                                                  	<label class="checkbox-inline">
                                                	<input type="checkbox" name="x_ch_otral" class="sw">Otros</label>
                                                  	<input type="text" id="x_ch_otral" class="form-control finput fw" name="al_otros">
                                                </div>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ap_dmhiper">DM/Hiperinsulinismo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ap_hta">HTA</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ap_asma">Asma</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ap_tiroides">Tiroides</label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxapmed" class="sw">Medicamentos</label>
                                                <input type="text" id="x_dtxapmed" class="form-control finput fw" name="ap_medic">
                                            </div>
                                            <div class="checkbox">
                                                <input type="text" class="form-control finput" name="ap_notas" title="300">
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="form-group">
                                            <label for="examen_funcional" class="tsec">Examen Funcional</label>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="rigidez_matutina">Rigidez matutina</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="perdida_peso">Pérdida peso</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="gana_peso">Ganancia peso</label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="apetito">Apetito</label>
                                                <input type="text" class="form-control finput" name="apetito">
                                            </div>
                                            <div class="checkbox">
                                                <label for="micciones">Micciones</label>
                                                <input type="text" class="form-control finput" name="micciones">
                                            </div>
                                            <div class="checkbox">
                                                <label for="evacuaciones">Evacuaciones</label>
                                                <input type="text" class="form-control finput" name="evacuaciones">
                                            </div>
                                            <div class="checkbox">
                                                <label for="hab_psicobio">Hábitos Psicobiológicos</label>
                                                <input type="text" class="form-control finput" name="hab_psicobio">
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="form-group">
                                            <label for="examen_físico" class="tsec">Examen Físico</label>
                                            <!-- * -->
                                            <div><label for="tpie">Inspección</label></div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxmar" class="sw" alt="nobd">Marcha</label>
                                                <input type="text" id="x_dtxmar" class="form-control finput fw" name="ef_marcha">
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxclz" class="sw" alt="nobd">Calzado</label>
                                                <input type="text" id="x_dtxclz" class="form-control finput fw" name="ef_calzado">
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxpis" class="sw" alt="nobd">Pisada</label>
                                                <input type="text" id="x_dtxpis" class="form-control finput fw" name="ef_pisada">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_piecavo">Pie cavo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_pieplano">Pie plano</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_piequiv">Pie equinovaro</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_arctra">Arco transversal</label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxeqm" class="sw" alt="nobd">Equimosis</label>
                                                <input type="text" id="x_dtxeqm" class="form-control finput fw" name="ef_equim">
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxavol" class="sw" alt="nobd">Aumento de volumen</label>
                                                <input type="text" id="x_dtxavol" class="form-control finput fw" name="ef_aumvol">
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxefv" class="sw" alt="nobd">Edema con fovea tobillo</label>
                                                <input type="text" id="x_dtxefv" class="form-control finput fw" name="ef_efovtob">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_equino">Equino</label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxher" class="sw" alt="nobd">Herida</label>
                                                <input type="text" id="x_dtxher" class="form-control finput fw" name="ef_herida">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="ef_lpiel">Lesiones piel</label>
                                            </div>
                                           	<div class="form-group subform">
                                            	<label for="tpie">Tipo pie</label>
                                            	<div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ef_pegip">Pie egipcio</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ef_pgmort">Pie griego/Morton</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ef_promcuad">Pie romano/cuadrado</label>
                                                </div>
                                            </div>
                                            <div class="form-group subform">
                                            	<label for="tpie">Retropie</label>
                                            	<div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxval" class="sw" alt="nobd">Valgo(°)</label>
                                                    <input type="text" id="x_dtxval" class="form-control finput fw" name="ef_valgo">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxvar" class="sw" alt="nobd">Varo(°)</label>
                                                    <input type="text" id="x_dtxvar" class="form-control finput fw" name="ef_varo">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ef_haglund">Haglund</label>
                                                </div>
                                            </div>
                                            <div class="form-group subform">
                                            	<label for="medpie">Mediopie</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ef_metaducto">Metatarso aducto</label>
                                                </div>
                                            </div>
                                            <div class="form-group subform">
                                            	<label for="antpie">Antepie</label>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ef_bunion">Bunion</label>
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ef_hallvalg">Hallux valgo</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxafk" class="sw" alt="nobd">Angulo fick(°)</label>
                                                    <input type="text" id="x_dtxafk" class="form-control finput fw" name="ef_afick">
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ef_bnette">Bunionette</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxdgar" class="sw" alt="nobd">Dedo garra</label>
                                                    <input type="text" id="x_dtxdgar" class="form-control finput fw" name="ef_dgarra">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxdmar" class="sw" alt="nobd">Dedo martillo</label>
                                                    <input type="text" id="x_dtxdmar" class="form-control finput fw" name="ef_dmart">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxdmal" class="sw" alt="nobd">Dedo mallet</label>
                                                    <input type="text" id="x_dtxdmal" class="form-control finput fw" name="ef_dmallet">
                                                </div>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="ef_pdactil">Polidactilia</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxpnq" class="sw" alt="nobd">Paroniquia</label>
                                                    <input type="text" id="x_dtxpnq" class="form-control finput fw" name="ef_pniquia">
                                                </div>
                                            </div>
                                            <div class="form-group subform">
                                                <label for="rangos_activos">Rangos Activos</label>
                                                <div class="checkbox">
                                                    <label for="ra_flexion">Dorsiflexión(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_dflexion">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_extension">Flexión plantar(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_flexplan">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Supinación(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_supina">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Pronación(°)</label>
                                                    <input type="text" class="form-control finput" name="ra_prona">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Extensión dedos</label>
                                                    <input type="text" class="form-control finput" name="ra_extded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Flexión dedos</label>
                                                    <input type="text" class="form-control finput" name="ra_flexded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Abducción pie</label>
                                                    <input type="text" class="form-control finput" name="ra_abdpie">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Aducción pie</label>
                                                    <input type="text" class="form-control finput" name="ra_adpie">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Abducción dedos</label>
                                                    <input type="text" class="form-control finput" name="ra_abdded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Aducción dedos</label>
                                                    <input type="text" class="form-control finput" name="ra_aded">
                                                </div>
                                                <label for="Meses">Rangos Pasivos</label>
                                                <div class="checkbox">
                                                    <label for="ra_flexion">Dorsiflexión(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_dflexion">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_extension">Flexión plantar(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_flexplan">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Supinación(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_supina">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Pronación(°)</label>
                                                    <input type="text" class="form-control finput" name="rp_prona">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Extensión dedos</label>
                                                    <input type="text" class="form-control finput" name="rp_extded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Flexión dedos</label>
                                                    <input type="text" class="form-control finput" name="rp_flexded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Abducción pie</label>
                                                    <input type="text" class="form-control finput" name="rp_abdpie">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Aducción pie</label>
                                                    <input type="text" class="form-control finput" name="rp_adpie">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Abducción dedos</label>
                                                    <input type="text" class="form-control finput" name="rp_abdded">
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ra_lag_cuadricipital">Aducción dedos</label>
                                                    <input type="text" class="form-control finput" name="rp_aded">
                                                </div>
											</div>
                                            <!-- * -->                                            
                            				<label for="maniobras">
                                            	<a href="#!" data-toggle="modal" data-target="#dmanmodal" class="lsec">Maniobras
                                                <i class="fa fa-list-alt"></i></a>
                                            </label>
                    						<?php include("subforms/man_tfptd.php")?>
                                            <div id="lmanfptd" class="selopciones"></div>
                                            <!-- * -->
                                        </div>
                                    </div>
                                    <!-- Fin primera columna -->
                                    <!-- Segunda columna -->
                                    <div class="col-lg-6">
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="palpacion" class="tsec">Palpación</label>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="aquiles">Aquiles</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="b5mtt">Base 5to MTT</label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="ef_efovtob">Cabezas metatarsianos</label>
                                                <input type="text" class="form-control finput" name="cbzmetatar">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="calca">Calcáneo</label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="ef_masas">Crepitación</label>
                                                <input type="text" class="form-control finput" name="crepit">
                                            </div>
                                            <div class="checkbox">
                                                <label for="ef_efovtob">Dedos</label>
                                                <input type="text" class="form-control finput" name="dedos">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="delto">Deltoideo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="escaf">Escafoides</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                            <input type="checkbox" name="larttc">Línea articular talo-crural</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="maltib">Maleolo tibial</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="malext">Maleolo externo</label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="ef_masas">Masas</label>
                                                <input type="text" class="form-control finput" name="masas">
                                            </div>
                                            <div class="checkbox">
                                                <label for="ef_efovtob">Metatarsiano</label>
                                                <input type="text" class="form-control finput" name="metatar">
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="perasant">Peroneo astragalino anterior</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="peraspos">Peroneo astragalino posterior</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="percal">Peroneo calcáneo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pulped">Pulso pedeo</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="tenper">Tendones peroneos</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="tentibpf">Tendón tibial posterior y flexores</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="tentiba">Tendón tibial anterior</label>
                                            </div>
                                            <div class="checkbox">
                                              <input type="text" class="form-control finput" name="ef_notas" title="300">
                                            </div>
                                        </div>
                                        <!--<div class="sketch">SKETCH</div>-->
                                        <div class="form-group">
                                            <label for="exam_roipsi">Examen de rodilla ipsilateral</label>
                                            <input type="text" class="form-control finput" name="exam_roipsi">
                                            <label for="exam_caipsi">Examen de cadera ipsilateral</label>
                                            <input type="text" class="form-control finput" name="exam_caipsi">
                                            <div>
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="cadcinlocafe">Cadena cinemática local afectada</label>
                                            </div>
                                            <div>
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="nvaslocafe">Neuro-vascular local afectado</label>
                                            </div>
                                            <label for="fmusc">Fuerza muscular</label>
                                            <input type="text" class="form-control finput" name="fmusc">
                                            <div class="form-group">
                                            	<div class="form-group">Columna común</div>
                                                <label for="fmusc">Examen de columna lumbar</label>
                                                <input type="text" class="form-control finput" name="excolumb">
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="hiperlaxart">Hiperlaxitud articular</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="estudios" class="tsec">Trae estudios</label>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxrx" class="sw">Rayos X</label>
                                                <textarea id="x_dtxrx" class="form-control finput fw" name="es_rx" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxrm" class="sw">RM</label>
                                                <textarea id="x_dtxrm" class="form-control finput fw" name="es_rm" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxtac" class="sw">TAC</label>
                                                <textarea id="x_dtxtac" class="form-control finput fw" name="es_tac" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxus" class="sw">US</label>
                                                <textarea id="x_dtxus" class="form-control finput fw" name="es_us" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxemg" class="sw">EMG</label>
                                                <textarea id="x_dtxemg" class="form-control finput fw" name="es_emg" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxlab" class="sw">Laboratorios</label>
                                                <textarea id="x_dtxlab" class="form-control finput fw" name="es_labs" rows="3"></textarea>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxotr" class="sw">Otros</label>
                                                <input type="text" id="x_dtxotr" class="form-control finput fw" name="es_otros">
                                            </div>
                                        </div>
                                        <!-- * -->
                                        <label for="impresion_diagnostica">
                                            <a href="#!" data-toggle="modal" data-target="#didxmodal" 
                                            class="lsec">Impresión Diagnóstica <i class="fa fa-list-alt"></i></a>
                                        </label>
                                        <?php include( "subforms/tidx_fptd.php" )?>
                                        <div id="lidxfptd" class="selopciones"></div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="plan" class="tsec">Plan</label>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" id="dchrx" name="pl_rx">Rayos X</label>
                                            </div> 
                                            <div class="form-group subform" id="dblockrx">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_aptob">AP tobillo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_latob">Lateral tobillo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_mortaja">Mortaja</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_apcapoy">AP ambos pies con apoyo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_oblpie">Oblícua pie</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_latsimpie">Lateral simple pie</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_latapoy">Lateral con apoyo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_oblicuaint">Axiales  calcáneo/harris</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_broden">Broden</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_canale">Canale</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pl_proses">Proyección sesamoideos</label>
                                                </div>
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
                                              <input type="checkbox" name="pl_tacrec3d">TAC + REC 3D</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_ecopb">Eco partes blandas</label>
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
                                                <label for="pl_labs">Laboratorios</label>
                                                <input type="text" class="form-control finput" name="pl_labs">
                                            </div>
                                        </div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="Examen de cadera" class="tsec">Referencias</label>
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
                                              <input type="checkbox" name="ref_preoper">Preoperatorio</label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_dtxrefotros" class="sw">Otros</label>
                                                <input type="text" id="x_dtxrefotros" class="form-control finput fw" name="ref_otros">
                                            </div>

                                        </div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="procedimientos" class="tsec">Procedimientos</label>
                                            <div class="checkbox">
                                                <label for="pr_atrocentesis">Artrocentesis</label>
                                                <input type="text" class="form-control finput" name="pr_atrocentesis">
                                            </div>
                                            <div class="form-group subform">
                                                <label for="Examen de cadera">Infiltración</label>
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
                                        </div>
                                        <!-- * -->
                                        <div class="form-group">
                                            <label for="Examen de cadera" class="tsec">Cirugía</label>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="cir_artcop">Artroscopia</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="cir_reconsliga">Reconstrucción ligamentaria</label>
                                            </div>
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="cir_osteomia">Osteotomía</label>
                                            </div>
                                        </div>
                                        <!-- ültimo bloque de formulario -->
                                        <div id="informe_autogenerado"></div>
                                    </div>
                                    <div align="center">
                                        <button type="button" class="btn btn-form" data-toggle="modal" 
                                        data-target="#confirm_modal">Guardar</button>
                                        <div class="modal fade" id="confirm_modal" tabindex="-1" 
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button id="closemodalx" type="button" 
                                                    class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title tsec" id="myModalLabel">Confirmar</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <span class="dataTable">Confirma el registro del formulario de historia médica</span>    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-primary" 
                                                    onclick="regHistoriaI_D( 'frm_pie_tobillo_d', 'dnresp' )">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!--  -->
                                    <div id="formelems"></div><div id="dnresp"></div>
                                </form>
                            </div>
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