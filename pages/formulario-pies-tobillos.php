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
    <script src="../js/roundslider.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/jquery.ui.touch-punch.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="../css/ihstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/roundslider.css">
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
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="padding:7px; position:absolute; z-index:9;">
            	<img src="../img/logo.png" width="165" height="58">
            </a>
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
                    <h1 class="page-header" 
					<?php if( $nuser == "mikeven" ){ ?> onClick="checkAll( 'frm_pie_tobillo' ); checkAll( 'frm_pie_tobillo_d' )"<?php }?>>
                    	<span class="title">Historia Clínica de Pie-Tobillo</span>
                        <!--<span class="title" onClick="checkAll( 'frm_pie_tobillo_d' )"></span>-->
                    </h1>
                </div>
                <div class="col-lg-12">
                	<!--<div id="form_selector" align="center">
                		<a id="selizq" href="formulario-pie-tobillo.php">GUARDAR INDIVIDUAL</a>  
                    </div>-->
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
                                <div style="padding:8px 0;">
                                    <div class="panel-heading" align="center">
                                        Seleccione Pie izquierdo o Derecho. Para guardar ambos no marque ninguna opción
                                    </div>
                                </div>
                                <!-- Primera columna: Pie izquierdo -->
                                <div class="col-lg-6">
                                    <div align="center">
                                        <label for="Pie izquierdo" class="stfrm">Pie izquierdo</label>
                                        <input type="radio" name="usarpie" data-tfd="frm_pie_tobillo_d" class="deactf" id="chipizq">
                                    </div>
                                    <hr>
                                    <form role="form" id="frm_pie_tobillo" class="form_historia">
                                        <!-- Valores iniciales -->
                                        <div align="center">
                                            <input type="hidden" name="idPaciente" id="idp" value="<?php echo $dpaciente["idp"];?>">
                                            <input type="hidden" name="idUsuario" id="idu" value="<?php echo $idu;?>">
                                            <input type="hidden" name="lado" id="izqder" value="izquierdo">
                                        </div><!-- /.Valores iniciales -->
                                        <!-- Motivo de consulta -->
                                        <div class="form-group">
                                            <label for="motivo_consulta" class="tsec">Motivo de consulta</label>
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
                                              <label>
                                              <input type="checkbox" name="mc_aumento_vol">Aumento de volumen</label>
                                            </div>
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="mc_deform">Deformidad</label>
                                            </div>
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="mc_inest">Inestabilidad</label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" name="mc_crepchas">Crepitación/Chasquido</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_equimosis">Equimosis</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_ulcera">Úlcera</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_signoped">Signo de la pedrada</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="text" class="form-control finput" name="mc_notas" title="300" placeholder="Notas">
                                            </div>
                                        </div><!-- /.Motivo de consulta -->
                                        <hr>
                                        <!-- Enfermedad actual -->
                                        <div class="form-group">
                                            <label for="enfermedad_actual" class="tsec">Enfermedad actual</label>
                                            <!-- Duración síntomas -->
                                            <div class="form-group subform">
                                                <div subform><label>Duración síntomas</label></div>
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
                                            </div><!-- /.Duración síntomas -->
                                            
                                            <!-- Mecanismo lesión -->
                                            <div class="form-group subform">
                                                <label for="mecanismo_lesion">Mecanismo lesión</label>
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
                                                  name="ml_cont_musc_br">Contracción muscular brusca/inadecuada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_invforz">Inversión forzada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_everforz">Eversión forzada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_flexplant">Flexión plantar</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_flexdors">Flexión dorsal</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_pronacion">Pronación</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_supinacion">Supinación</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_trauma_contuso">Traumatismo contuso</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_trauma_cortante">Traumatismo cortante </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_congenito">Congénito</label>
                                                </div>
                                                <div class="checkbox">
                                                  <input type="text" class="form-control finput" name="ml_notas" title="300" placeholder="Notas">
                                                </div>
                                            </div> <!-- /.Mecanismo lesión -->
                                                  
                                        </div><!-- /.Enfermedad actual -->
                                        <hr>
                                        <!-- Examen físico(1) -->
                                        <div class="form-group examen_fisico">
                                            <label for="examen_físico" class="tsec">Examen físico</label>
                                            
                                            <!-- Inspección -->
                                            <div class="form-group subform">
                                                <div><label for="tpie">Inspección</label></div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txmar" class="sw" alt="nobd">Marcha</label>
                                                    <input type="text" id="x_txmar" class="form-control finput fw" name="ins_marcha">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txclz" class="sw" alt="nobd">Calzado</label>
                                                    <input type="text" id="x_txclz" class="form-control finput fw" name="ins_calzado">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txpis" class="sw" alt="nobd">Pisada</label>
                                                    <input type="text" id="x_txpis" class="form-control finput fw" name="ins_pisada">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_piecavo">Pie cavo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_pieplano">Pie plano</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_piequiv">Pie equinovaro</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_arctra">Arco transversal</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txeqm" class="sw" alt="nobd">Equimosis</label>
                                                    <input type="text" id="x_txeqm" class="form-control finput fw" name="ins_equim">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txavol" class="sw" alt="nobd">Aumento de volumen</label>
                                                    <input type="text" id="x_txavol" class="form-control finput fw" name="ins_aumvol">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txefv" class="sw" alt="nobd">Edema con fovea tobillo</label>
                                                    <input type="text" id="x_txefv" class="form-control finput fw" name="ins_efovtob">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_equino">Equino</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txher" class="sw" alt="nobd">Herida</label>
                                                    <input type="text" id="x_txher" class="form-control finput fw" name="ins_herida">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_lpiel">Lesiones piel</label>
                                                </div>
                                                <!-- Opciones pie -->
                                                <div class="form-group subform">
                                                    <label for="tpie">Tipo pie</label>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_pegip">Pie egipcio</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_pgmort">Pie griego/Morton</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_promcuad">Pie romano/cuadrado</label>
                                                    </div>
                                                </div>
                                                <div class="form-group subform">
                                                    <label for="tpie">Retropie</label>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_txval" class="sw" alt="nobd">Valgo(°)</label>
                                                        <input type="text" id="x_txval" class="form-control finput fw" name="ins_valgo">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_txvar" class="sw" alt="nobd">Varo(°)</label>
                                                        <input type="text" id="x_txvar" class="form-control finput fw" name="ins_varo">
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_haglund">Haglund</label>
                                                    </div>
                                                </div>
                                                <div class="form-group subform">
                                                    <label for="medpie">Mediopie</label>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_metaducto">Metatarso aducto</label>
                                                    </div>
                                                </div>
                                                <div class="form-group subform">
                                                    <label for="antpie">Antepie</label>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="ins_bunion">Bunion</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="ins_hallvalg">Hallux valgo</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_txafk" class="sw" alt="nobd">Angulo fick(°)</label>
                                                        <input type="text" id="x_txafk" class="form-control finput fw" name="ins_afick">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="ins_bnette">Bunionette</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_txdgar" class="sw" alt="nobd">Dedo garra</label>
                                                        <input type="text" id="x_txdgar" class="form-control finput fw" name="ins_dgarra">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_txdmar" class="sw" alt="nobd">Dedo martillo</label>
                                                        <input type="text" id="x_txdmar" class="form-control finput fw" name="ins_dmart">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_txdmal" class="sw" alt="nobd">Dedo mallet</label>
                                                        <input type="text" id="x_txdmal" class="form-control finput fw" name="ins_dmallet">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="ins_pdactil">Polidactilia</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_txpnq" class="sw" alt="nobd">Paroniquia</label>
                                                        <input type="text" id="x_txpnq" class="form-control finput fw" name="ins_pniquia">
                                                    </div>
                                                </div><!-- /.Opciones Pie -->
                                            </div><!-- /.Inspección -->
                                            
                                            <!-- Rangos -->
                                            <div class="form-group subform">
                                                <label for="rangos_activos">Rangos activos</label>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Dorsiflex. - Flexión plantar</label></div>
                                                        <div id="rs_dorfp"></div>
                                                        <div id="rsdfpv" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_dflexion" id="rsra_dflexion">
                                                        <input type="hidden" class="form-control finput" name="ra_flexplan" id="rsra_flexplan">
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Supin. - Pron.</label></div>
                                                    	<div id="rs_supr"></div>
                                                        <div id="rsspv" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_supina" id="rsra_supina">
                                                        <input type="hidden" class="form-control finput" name="ra_prona" id="rsra_prona">
                                                    </div>
												</div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Flex - Ext Dedos</label></div>
                                                    	<div id="rs_flexd"></div>
                                                        <div id="rsfedv" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_flexded" id="rsra_flexded">
                                                        <input type="hidden" class="form-control finput" name="ra_extded" id="rsra_extded">
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Abduc. Aduc. pie</label></div>
                                                    	<div id="rs_abadp"></div>
                                                        <div id="rsaapv" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_abdpie" id="rsra_abdpie">
                                                        <input type="hidden" class="form-control finput" name="ra_adpie" id="rsra_adpie">
                                                    </div>
                                            	</div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Abduc. Aduc. dedos</label></div>
                                                    	<div id="rs_abadd"></div>
                                                        <div id="rsaadv" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_abdded" id="rsra_abdded">
                                                        <input type="hidden" class="form-control finput" name="ra_aded" id="rsra_aded">
                                                    </div>
                                            	</div>
                                                <label for="Meses">Rangos pasivos</label>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Dorsiflex. - Flexión plantar</label></div>
                                                        <div id="rs_dorfp_p"></div>
                                                        <div id="rsdfpv_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_dflexion" id="rsrp_dflexion">
                                                        <input type="hidden" class="form-control finput" name="rp_flexplan" id="rsrp_flexplan">
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Supin. - Pro.</label></div>
                                                    	<div id="rs_supr_p"></div>
                                                        <div id="rsspv_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_supina" id="rsrp_supina">
                                                        <input type="hidden" class="form-control finput" name="rp_prona" id="rsrp_prona">
                                                    </div>
												</div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Flex - Ext Dedos</label></div>
                                                    	<div id="rs_flexd_p"></div>
                                                        <div id="rsfedv_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_flexded" id="rsrp_flexded">
                                                        <input type="hidden" class="form-control finput" name="rp_extded" id="rsrp_extded">
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Abduc. Aduc. pie</label></div>
                                                    	<div id="rs_abadp_p"></div>
                                                        <div id="rsaapv_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_abdpie" id="rsrp_abdpie">
                                                        <input type="hidden" class="form-control finput" name="rp_adpie" id="rsrp_adpie">
                                                    </div>
												</div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Abduc. Aduc. dedos</label></div>
                                                    	<div id="rs_abadd_p"></div>
                                                        <div id="rsaadv_p" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_abdded" id="rsrp_abdded">
                                                        <input type="hidden" class="form-control finput" name="rp_aded" id="rsrp_aded">
                                                    </div>
                                            	</div>
                                            </div><!-- /.Rangos -->
                                            
                                            <!-- Maniobras -->                                            
                                            <div class="form-group subform">
                                                <label for="maniobras">
                                                    <a href="#!" data-toggle="modal" data-target="#manmodal" class="lseclnk">Maniobras
                                                    <i class="fa fa-list-alt"></i></a>
                                                </label>
                                                <?php include( "subforms/man_tfpt.php" )?>
                                                <div id="lmanfpt" class="selopciones"></div>
                                            </div><!-- /.Maniobras -->
                                            
                                            <!-- Palpación -->
                                            <div class="form-group subform">
                                                <label for="palpacion">Palpación</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_aquiles">Aquiles</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_b5mtt">Base 5to MTT</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_cbzmetatar" class="sw">Cabezas metatarsianos</label>
                                                    <input type="text" id="x_pal_cbzmetatar" class="form-control finput fw" name="pal_cbzmetatar">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_calca">Calcáneo</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_crepit" class="sw">Crepitación</label>
                                                    <input type="text" id="x_pal_crepit" class="form-control finput fw" name="pal_crepit">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_dedos" class="sw">Dedos</label>
                                                    <input type="text" id="x_pal_dedos" class="form-control finput fw" name="pal_dedos">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_delto">Deltoideo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_escaf">Escafoides</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                <input type="checkbox" name="pal_larttc">Línea articular talo-crural</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_maltib">Maleolo tibial</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_malext">Maleolo externo</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_masas" class="sw">Masas</label>
                                                    <input type="text" id="x_pal_masas" class="form-control finput fw" name="pal_masas">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_metatar" class="sw">Metatarsiano</label>
                                                    <input type="text" id="x_pal_metatar" class="form-control finput fw" name="pal_metatar">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_perasant">Peroneo astragalino anterior</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_peraspos">Peroneo astragalino posterior</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_percal">Peroneo calcáneo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_pulped">Pulso pedeo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_tenper">Tendones peroneos</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_tentibpf">Tendón tibial posterior y flexores</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_tentiba">Tendón tibial anterior</label>
                                                </div>
                                                <div class="checkbox">
                                                  <input type="text" class="form-control finput" name="pal_notas" 
                                                  title="300" placeholder="Notas">
                                                </div>
                                            </div><!-- /.Palpación -->
                                            
                                            <!-- EX FCL -->
                                            <div class="checkbox">
                                                <a href="#!" class="lseclnk_drop sw" name="x_ef_excolumb">
                                                    Columna común <i class="fa fa-chevron-down"></i>
                                                </a>
                                            </div>
                                            <div id="x_ef_excolumb" class="checkbox fw extlnkform">
                                                <div class="checkbox">
                                                    <label for="ef_excolumb">Examen de columna lumbar</label>
                                                    <input type="text" class="form-control finput" name="ef_excolumb">
                                                </div>
                                                <label for="lnkidp">
                                                    <a id="lnkidp" href="formulario-columna-lumbar.php<?php echo $lnkidp;?>" 
                                                    data-nfrm="formulario-columna-lumbar.php" target="_blank">
                                                    Examen de columna lumbar <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div><!-- /.EX FCL -->
                                            
                                            <!-- EX FCA -->
                                            <div class="checkbox">
                                                <a href="#!" class="lseclnk_drop sw" name="x_ef_ex_caipsi">
                                                    Examen de cadera ipsilateral <i class="fa fa-chevron-down"></i>
                                                </a>
                                            </div>
                                            <div id="x_ef_ex_caipsi" class="checkbox fw extlnkform">
                                                <div class="checkbox">
                                                    <label for="ef_ex_caipsi">Examen de cadera</label>
                                                    <input type="text" class="form-control finput" name="ef_ex_caipsi">
                                                </div>
                                                <label for="lnkidp">
                                                    <a id="lnkidp" href="formulario-cadera-adulto.php<?php echo $lnkidp;?>" 
                                                    data-nfrm="formulario-cadera-adulto.php" target="_blank">
                                                    Examen de cadera <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div><!-- /.EX FCA -->
                                            
                                            <!-- EX FRO -->
                                            <div class="checkbox">
                                                <a href="#!" class="lseclnk_drop sw" name="x_ef_ex_roipsi">
                                                    Examen de rodilla ipsilateral <i class="fa fa-chevron-down"></i>
                                                </a>
                                            </div>
                                            <div id="x_ef_ex_roipsi" class="checkbox fw extlnkform">
                                                <div class="checkbox">
                                                    <label for="ef_ex_roipsi">Examen de rodilla</label>
                                                    <input type="text" class="form-control finput" name="ef_ex_roipsi">
                                                </div>
                                                <label for="lnkidp">
                                                    <a id="lnkidp" href="formulario-rodilla.php<?php echo $lnkidp;?>" 
                                                    data-nfrm="formulario-rodilla.php" target="_blank">
                                                    Examen de rodilla <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div><!-- /.EX FRO -->
                                            
                                            <!-- otros -->                                        
                                            <div class="form-group">
                                                <div>
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="ef_cadcinlocafe">Cadena cinemática local afectada</label>
                                                </div>
                                                <div>
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="ef_nvaslocafe">Neuro-vascular local afectado</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ef_fmusc">Fuerza muscular</label>
                                                    <input type="text" class="form-control finput" name="ef_fmusc">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="ef_hiperlaxart">Hiperlaxitud articular</label>
                                                </div>
                                            </div><!-- /.otros -->
                                        </div><!-- /.Examen físico(1) -->
                                        <hr>
                                        <!-- Trae estudios -->
                                            <div class="form-group">
                                                <label for="estudios" class="tsec">Trae estudios</label>
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
                                                    <input type="text" id="x_txotr" class="form-control finput fw" name="es_otros">
                                                </div>
                                            </div><!-- /.Trae estudios -->
                                        <hr>
                                        <!-- Impresión diagnóstica -->
                                        <div class="form-group">
                                            <label for="impresion_diagnostica">
                                                <a href="#!" data-toggle="modal" data-target="#idxmodal" 
                                                class="lsec">Impresión diagnóstica <i class="fa fa-list-alt"></i></a>
                                            </label>
                                            <?php include("subforms/tidx_fpt.php")?>
                                            <div id="lidxfpt" class="selopciones"></div>
                                        </div><!-- /.Impresión diagnóstica -->
                                        <hr>
                                        <!-- Plan -->
                                        <div class="form-group">
                                            <label for="plan" class="tsec">Plan</label>
                                            <!-- RX -->
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" id="chrx" name="x_pl_rx">Rayos X</label>
                                            </div> 
                                            <div class="form-group subform" id="blockrx">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_aptob">AP tobillo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_latob">Lateral tobillo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_mortaja">Mortaja</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_apcapoy">AP ambos pies con apoyo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_oblpie">Oblícua pie</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_latsimpie">Lateral simple pie</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_latapoy">Lateral con apoyo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_oblicuaint">Axiales  calcáneo/harris</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_broden">Broden</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_canale">Canale</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_proses">Proyección sesamoideos</label>
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
                                                    <input type="checkbox" name="x_lab_otros" class="sw">Otros</label>
                                                    <input type="text" id="x_lab_otros" class="form-control finput fw" name="lab_otros">
                                                </div>
                                            </div><!-- /.Laboratorios -->
                                        	<div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_pl_otros" class="sw" alt="nobd">Otros</label>
                                                <input type="text" id="x_pl_otros" class="form-control finput fw" name="pl_otros">
                                            </div>
                                        	<!-- Referencias -->
                                            <div class="form-group subform">
                                                <label for="Examen de cadera">Referencias</label>
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
                                                    <label><input type="checkbox" name="x_refi_dr" class="sw">Dr.</label>
                                                    <input type="text" id="x_refi_dr" class="form-control finput fw mayusc" name="ref_dr">
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="x_refi_preoper" class="sw">Preoperatorio</label>
                                                    <input type="text" id="x_refi_preoper" class="form-control finput fw" name="ref_preoper">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_txrefotros" class="sw">Otros</label>
                                                    <input type="text" id="x_txrefotros" class="form-control finput fw" name="ref_otros">
                                                </div>
                                            </div><!-- /.Referencias -->
                                            
                                            <!-- Procedimientos -->
                                            <div class="form-group subform">
                                                <label for="procedimientos">Procedimientos</label>
                                                <div class="checkbox">
                                                	<label class="checkbox-inline">
                                                	<input type="checkbox" name="pro_atrocentesis">Artrocentésis</label>
                                                </div>
                                                <!-- Infiltración -->
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="pro_infiltra" id="chinf" class="sw">Infiltración</label>
                                                </div>
                                                <div id="pro_infiltra" class="fw subform">
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_anestloc">Anestesia local</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_esteroides">Esteroides</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_viscosup">Viscosuplementación</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_plasmaplaq">Plasma plaquetario</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_pro_otros" class="sw">Otros</label>
                                                        <input type="text" id="x_pro_otros" class="form-control finput fw" name="pro_otros">
                                                    </div>
                                                </div><!-- /.Infiltración -->
                                            	<!--<div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pro_otros" class="sw">Otros</label>
                                                    <input type="text" id="x_pro_otros" class="form-control finput fw" name="pro_otros">
                                                </div>-->
                                            </div><!-- /.Procedimientos -->
                                            
                                            <!-- Cirugía -->
                                            <div class="form-group subform">
                                            	<label for="Examen de cadera">Cirugía</label>
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
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_cir_notas" class="sw">Otros</label>
                                                    <input type="text" id="x_cir_notas" class="form-control finput fw" name="cir_notas">
                                                </div>
                                            </div><!-- /.Cirugía -->
                                        
                                        </div><!-- /.Plan -->
                                        
                                        <!-- ültimo bloque de formulario -->
                                        <div id="drespi"></div>
                                	</form>	
                                </div>
                                <!-- Fin primera columna -->
                                <!-- /////////////////////////// DIVISION FORMULARIOS /////////////////////////// -->
                                <!-- Segunda columna: Pie derecho -->
                                <div class="col-lg-6" id="segunda_columna">
                                	<div align="center">
                                        <label for="motivo_consulta" class="stfrm">Pie derecho</label>
                                        <input type="radio" name="usarpie" data-tfd="frm_pie_tobillo" class="deactf" id="chipder">
                                    </div>
                                    <hr>
                                    <form role="form" id="frm_pie_tobillo_d" class="form_historia">
                                        <!-- Motivo de consulta -->
                                        <div class="form-group">
                                            <!-- Valores iniciales -->
                                            <div align="center">
                                                <input type="hidden" name="idPaciente" id="idp_d" value="<?php echo $dpaciente["idp"];?>">
                                                <input type="hidden" name="idUsuario" id="idu" value="<?php echo $idu;?>">
                                                <input type="hidden" name="lado" id="izqder" value="derecho">
                                            </div><!-- /.Valores iniciales -->
                                            
                                            <label for="motivo_consulta" class="tsec">Motivo de consulta</label>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_traumatismo">Traumatismo</label>
                                            </div>
                                            <!-- Dolor -->
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
                                                  	<select class="form-control" name="dol_cartipo" onChange="chopt_d(this)" id="ldctipo_d">
                                                        <option value="punzante">Punzante</option>
                                                        <option value="opresivo">Opresivo</option>
                                                        <option value="sordo">Sordo</option>
                                                        <option value="terebrante">Terebrante</option>
                                                        <option value="lancinante">Lancinante</option>
                                                        <option value="urente">Urente</option>
                                                        <option value="otro">Otro</option>
                                                    </select>
                                                    <div class="form-group" id="tx_ctipo_d" style="padding:8px 0;">
                                                        <input class="form-control" name="x_ctipo" id="txcaract_d">
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
                                                  <label for="dol_exa">Exacerbantes</label>
                                                  <input type="text" class="form-control finput" name="dol_exa">
                                                </div>
                                                <div class="checkbox">
                                                  <label for="dol_aten">Atenuantes</label>
                                                  <input type="text" class="form-control finput" name="dol_aten">
                                                </div>
                                                <div class="checkbox">
                                                	<label for="Severidad">Severidad</label>
                                                    <select class="form-control" name="dol_sever">
                                                        <option value="Ocasional">Ocasional</option>
                                                        <option value="Leve">Leve</option>
                                                        <option value="Moderado">Moderado</option>
                                                        <option value="Severo">Severo</option>
                                                        <option value="Incapacitante">Incapacitante</option>
                                                    </select>
                                                </div>
                                            </div><!-- /.Dolor -->
                                            
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="mc_aumento_vol">Aumento de volumen</label>
                                            </div>
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="mc_deform">Deformidad</label>
                                            </div>
                                            <div class="checkbox">
                                              <label>
                                              <input type="checkbox" name="mc_inest">Inestabilidad</label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" name="mc_crepchas">Crepitación/Chasquido</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_equimosis">Equimosis</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_ulcera">Ulcera</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mc_signoped">Signo de la pedrada</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="text" class="form-control finput" name="mc_notas" title="300" placeholder="Notas">
                                            </div>
                                        </div><!-- /.Motivo de consulta -->
                                        <hr>
                                        <!-- Enfermedad actual -->
                                        <div class="form-group">
                                            <label for="enfermedad_actual" class="tsec">Enfermedad actual</label>
                                            <!-- Duración síntomas -->
                                            <div class="form-group subform">
                                                <div><label>Duración síntomas</label></div>
                                                <label class="radio-inline">
                                                    <input type="radio" name="rb_ds" class="rbdur_d" value="dur_d">Días
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="rb_ds" class="rbdur_d" value="dur_s">Semanas
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="rb_ds" class="rbdur_d" value="dur_m">Meses
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="rb_ds" class="rbdur_d rbdur_ld" value="dur_ld">Larga data
                                                </label>
                                                <div class="checkbox" id="dur_sin_d">
                                                    <input type="text" class="form-control finput_d" name="dur_sin">
                                                </div>
                                            </div><!-- /.Duración síntomas -->
                                            
                                            <!-- Mecanismo lesión -->
                                            <div class="form-group subform">
                                                <label for="mecanismo_lesion">Mecanismo lesión</label>
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
                                                  name="ml_cont_musc_br">Contracción muscular brusca/inadecuada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_invforz">Inversión forzada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_everforz">Eversión forzada</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_flexplant">Flexión plantar</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_flexdors">Flexión dorsal</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_pronacion">Pronación</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_supinacion">Supinación</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_trauma_contuso">Traumatismo contuso</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_trauma_cortante">Traumatismo cortante </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ml_congenito">Congénito</label>
                                                </div>
                                                <div class="checkbox">
                                                  <input type="text" class="form-control finput" name="ml_notas" title="300" placeholder="Notas">
                                                </div>
                                            </div><!-- /.Mecanismo lesión -->
                                                  
                                        
                                        </div><!-- /.Enfermedad actual -->
                                        <hr>
                                        <!-- Examen físico -->
                                        <div class="form-group">
                                            <label for="examen_físico" class="tsec">Examen físico</label>
                                            <!-- Inspección -->
                                            <div class="form-group subform">
                                                <div><label for="tpie">Inspección</label></div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxmar" class="sw" alt="nobd">Marcha</label>
                                                    <input type="text" id="x_dtxmar" class="form-control finput fw" name="ins_marcha">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxclz" class="sw" alt="nobd">Calzado</label>
                                                    <input type="text" id="x_dtxclz" class="form-control finput fw" name="ins_calzado">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxpis" class="sw" alt="nobd">Pisada</label>
                                                    <input type="text" id="x_dtxpis" class="form-control finput fw" name="ins_pisada">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_piecavo">Pie cavo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_pieplano">Pie plano</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_piequiv">Pie equinovaro</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_arctra">Arco transversal</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxeqm" class="sw" alt="nobd">Equimosis</label>
                                                    <input type="text" id="x_dtxeqm" class="form-control finput fw" name="ins_equim">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxavol" class="sw" alt="nobd">Aumento de volumen</label>
                                                    <input type="text" id="x_dtxavol" class="form-control finput fw" name="ins_aumvol">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxefv" class="sw" alt="nobd">Edema con fovea tobillo</label>
                                                    <input type="text" id="x_dtxefv" class="form-control finput fw" name="ins_efovtob">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_equino">Equino</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxher" class="sw" alt="nobd">Herida</label>
                                                    <input type="text" id="x_dtxher" class="form-control finput fw" name="ins_herida">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="ins_lpiel">Lesiones piel</label>
                                                </div>
                                                <!-- Opciones pie  -->
                                                <div class="form-group subform">
                                                    <label for="tpie">Tipo pie</label>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_pegip">Pie egipcio</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_pgmort">Pie griego/Morton</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_promcuad">Pie romano/cuadrado</label>
                                                    </div>
                                                </div>
                                                <div class="form-group subform">
                                                    <label for="tpie">Retropie</label>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_dtxval" class="sw" alt="nobd">Valgo(°)</label>
                                                        <input type="text" id="x_dtxval" class="form-control finput fw" name="ins_valgo">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_dtxvar" class="sw" alt="nobd">Varo(°)</label>
                                                        <input type="text" id="x_dtxvar" class="form-control finput fw" name="ins_varo">
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_haglund">Haglund</label>
                                                    </div>
                                                </div>
                                                <div class="form-group subform">
                                                    <label for="medpie">Mediopie</label>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="ins_metaducto">Metatarso aducto</label>
                                                    </div>
                                                </div>
                                                <div class="form-group subform">
                                                    <label for="antpie">Antepie</label>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="ins_bunion">Bunion</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="ins_hallvalg">Hallux valgo</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_dtxafk" class="sw" alt="nobd">Angulo fick(°)</label>
                                                        <input type="text" id="x_dtxafk" class="form-control finput fw" name="ins_afick">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="ins_bnette">Bunionette</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_dtxdgar" class="sw" alt="nobd">Dedo garra</label>
                                                        <input type="text" id="x_dtxdgar" class="form-control finput fw" name="ins_dgarra">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_dtxdmar" class="sw" alt="nobd">Dedo martillo</label>
                                                        <input type="text" id="x_dtxdmar" class="form-control finput fw" name="ins_dmart">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_dtxdmal" class="sw" alt="nobd">Dedo mallet</label>
                                                        <input type="text" id="x_dtxdmal" class="form-control finput fw" name="ins_dmallet">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="ins_pdactil">Polidactilia</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_dtxpnq" class="sw" alt="nobd">Paroniquia</label>
                                                        <input type="text" id="x_dtxpnq" class="form-control finput fw" name="ins_pniquia">
                                                    </div>
                                                </div><!-- Opciones pie  -->
                                            
                                            </div><!-- /.Inspección -->
                                            
                                            <!-- Rangos -->
                                            <div class="form-group subform">
                                                <label for="rangos_activos">Rangos activos</label>
                                                <!-- RA -->
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Dorsiflex. - Flexión plantar</label></div>
                                                        <div id="drs_dorfp"></div>
                                                        <div id="rsdfpv_d" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_dflexion" id="rsra_dflexion">
                                                        <input type="hidden" class="form-control finput" name="ra_flexplan" id="rsra_flexplan">
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Supin. - Pron.</label></div>
                                                    	<div id="drs_supr"></div>
                                                        <div id="rsspv_d" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_supina" id="rsra_supina">
                                                        <input type="hidden" class="form-control finput" name="ra_prona" id="rsra_prona">
                                                    </div>
												</div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Flex - Ext Dedos</label></div>
                                                    	<div id="drs_flexd"></div>
                                                        <div id="rsfedv_d" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_flexded" id="rsra_flexded">
                                                        <input type="hidden" class="form-control finput" name="ra_extded" id="rsra_extded">
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Abduc. Aduc. pie</label></div>
                                                    	<div id="drs_abadp"></div>
                                                        <div id="rsaapv_d" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_abdpie" id="rsra_abdpie">
                                                        <input type="hidden" class="form-control finput" name="ra_adpie" id="rsra_adpie">
                                                    </div>
                                            	</div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Abduc. Aduc. dedos</label></div>
                                                    	<div id="drs_abadd"></div>
                                                        <div id="rsaadv_d" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="ra_abdded" id="rsra_abdded">
                                                        <input type="hidden" class="form-control finput" name="ra_aded" id="rsra_aded">
                                                    </div>
                                            	</div>
                                                <label for="Meses">Rangos pasivos</label>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Dorsiflex. - Flexión plantar</label></div>
                                                        <div id="drs_dorfp_p"></div>
                                                        <div id="rsdfpv_p_d" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" 
                                                        name="rp_dflexion" id="rsrp_dflexion">
                                                        <input type="hidden" class="form-control finput" 
                                                        name="rp_flexplan" id="rsrp_flexplan">
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Supin. - Pro.</label></div>
                                                    	<div id="drs_supr_p"></div>
                                                        <div id="rsspv_p_d" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_supina" id="rsrp_supina">
                                                        <input type="hidden" class="form-control finput" name="rp_prona" id="rsrp_prona">
                                                    </div>
												</div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Flex - Ext Dedos</label></div>
                                                    	<div id="drs_flexd_p"></div>
                                                        <div id="rsfedv_p_d" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" 
                                                        name="rp_flexded" id="rsrp_flexded">
                                                        <input type="hidden" class="form-control finput" name="rp_extded" id="rsrp_extded">
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Abduc. Aduc. pie</label></div>
                                                    	<div id="drs_abadp_p"></div>
                                                        <div id="rsaapv_p_d" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" name="rp_abdpie" id="rsrp_abdpie">
                                                        <input type="hidden" class="form-control finput" name="rp_adpie" id="rsrp_adpie">
                                                    </div>
												</div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-xs-4 rslide">
                                                    	<div class="trslide" align="left">
                                                        <label class="checkbox-inline">Abduc. Aduc. dedos</label></div>
                                                    	<div id="drs_abadd_p"></div>
                                                        <div id="rsaadv_p_d" class="txrsval"></div>
                                                        <input type="hidden" class="form-control finput" 
                                                        name="rp_abdded" id="rsrp_abdded">
                                                        <input type="hidden" class="form-control finput" name="rp_aded" id="rsrp_aded">
                                                    </div>
                                            	</div>
                                            </div><!-- /.Rangos -->
                                            
                                            <!-- Maniobras -->
                                            <div class="form-group subform">                                            
                                                <label for="maniobras">
                                                    <a href="#!" data-toggle="modal" data-target="#dmanmodal" class="lseclnk">Maniobras
                                                    <i class="fa fa-list-alt"></i></a>
                                                </label>
                                                <?php include( "subforms/man_tfptd.php" )?>
                                                <div id="lmanfptd" class="selopciones"></div>
                                            </div><!-- /.Maniobras -->
                                            
                                            <!-- Palpación -->
                                            <div class="form-group subform">
                                                <label for="palpacion">Palpación</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_aquiles">Aquiles</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_b5mtt">Base 5to MTT</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_cbzmetatar" class="sw">Cabezas metatarsianos</label>
                                                    <input type="text" id="x_pal_cbzmetatar" class="form-control finput fw" name="pal_cbzmetatar">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_calca">Calcáneo</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_crepit" class="sw">Crepitación</label>
                                                    <input type="text" id="x_pal_crepit" class="form-control finput fw" name="pal_crepit">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_dedos" class="sw">Dedos</label>
                                                    <input type="text" id="x_pal_dedos" class="form-control finput fw" name="pal_dedos">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_delto">Deltoideo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_escaf">Escafoides</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                <input type="checkbox" name="pal_larttc">Línea articular talo-crural</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_maltib">Maleolo tibial</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_malext">Maleolo externo</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_masas" class="sw">Masas</label>
                                                    <input type="text" id="x_pal_masas" class="form-control finput fw" name="pal_masas">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pal_metatar" class="sw">Metatarsiano</label>
                                                    <input type="text" id="x_pal_metatar" class="form-control finput fw" name="pal_metatar">
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_perasant">Peroneo astragalino anterior</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_peraspos">Peroneo astragalino posterior</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_percal">Peroneo calcáneo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_pulped">Pulso pedeo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_tenper">Tendones peroneos</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_tentibpf">Tendón tibial posterior y flexores</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pal_tentiba">Tendón tibial anterior</label>
                                                </div>
                                                <div class="checkbox">
                                                  <input type="text" class="form-control finput" name="pal_notas" 
                                                  title="300" placeholder="Notas">
                                                </div>
                                            </div><!-- /.Palpación -->
                                            
                                            <!-- EX FCL -->
                                            <div class="checkbox">
                                                <a href="#!" class="lseclnk_drop sw" name="x_ef_excolumb_d">
                                                    Columna común <i class="fa fa-chevron-down"></i>
                                                </a>
                                            </div>
                                            <div id="x_ef_excolumb_d" class="checkbox fw extlnkform">
                                                <div class="checkbox">
                                                    <label for="ef_excolumb">Examen de columna lumbar</label>
                                                    <input type="text" class="form-control finput" name="ef_excolumb">
                                                </div>
                                                <label for="lnkidp">
                                                    <a id="lnkidp" href="formulario-columna-lumbar.php<?php echo $lnkidp;?>" 
                                                    data-nfrm="formulario-columna-lumbar.php" target="_blank">
                                                    Examen de columna lumbar <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div><!-- /.EX FCL -->
                                            
                                            <!-- EX FCA -->
                                            <div class="checkbox">
                                                <a href="#!" class="lseclnk_drop sw" name="x_ef_ex_caipsi_d">
                                                    Examen de cadera ipsilateral <i class="fa fa-chevron-down"></i>
                                                </a>
                                            </div>
                                            <div id="x_ef_ex_caipsi_d" class="checkbox fw extlnkform">
                                                <div class="checkbox">
                                                    <label for="ef_ex_caipsi">Examen de cadera</label>
                                                    <input type="text" class="form-control finput" name="ef_ex_caipsi">
                                                </div>
                                                <label for="lnkidp">
                                                    <a id="lnkidp" href="formulario-cadera-adulto.php<?php echo $lnkidp;?>" 
                                                    data-nfrm="formulario-cadera-adulto.php" target="_blank">
                                                    Examen de cadera <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div><!-- /.EX FCA -->
                                            
                                            <!-- EX FRO -->
                                            <div class="checkbox">
                                                <a href="#!" class="lseclnk_drop sw" name="x_ef_ex_roipsi_d">
                                                    Examen de rodilla ipsilateral <i class="fa fa-chevron-down"></i>
                                                </a>
                                            </div>
                                            <div id="x_ef_ex_roipsi_d" class="checkbox fw extlnkform">
                                                <div class="checkbox">
                                                    <label for="ef_ex_roipsi">Examen de rodilla</label>
                                                    <input type="text" class="form-control finput" name="ef_ex_roipsi">
                                                </div>
                                                <label for="lnkidp">
                                                    <a id="lnkidp" href="formulario-rodilla.php<?php echo $lnkidp;?>" 
                                                    data-nfrm="formulario-rodilla.php" target="_blank">
                                                    Examen de rodilla <i class="fa fa-external-link"></i></a>
                                                </label>
                                            </div><!-- /.EX FRO -->
                                            
                                            <!-- otros -->
                                            <div class="form-group">
                                                <div>
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="ef_cadcinlocafe">Cadena cinemática local afectada</label>
                                                </div>
                                                <div>
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="ef_nvaslocafe">Neuro-vascular local afectado</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label for="ef_fmusc">Fuerza muscular</label>
                                                    <input type="text" class="form-control finput" name="ef_fmusc">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="ef_hiperlaxart">Hiperlaxitud articular</label>
                                                </div>
                                            </div><!-- /.otros -->
                                        </div><!-- /.Examen físico -->
                                        <hr>
                                        <!-- Trae estudios -->
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
                                        </div><!-- /.Trae estudios -->
                                        <hr>
                                        <!-- Impresión diagnóstica -->
                                        <div class="form-group">
                                            <label for="impresion_diagnostica">
                                                <a href="#!" data-toggle="modal" data-target="#didxmodal" 
                                                class="lsec">Impresión diagnóstica <i class="fa fa-list-alt"></i></a>
                                            </label>
                                            <?php include( "subforms/tidx_fptd.php" )?>
                                            <div id="lidxfptd" class="selopciones"></div>
                                        </div><!-- /.Impresión diagnóstica -->
                                        <hr>
                                        <!-- Plan -->
                                        <div class="form-group">
                                            <label for="plan" class="tsec">Plan</label>
                                            <!-- RX -->
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" id="dchrx" name="x_pl_rx">Rayos X</label>
                                            </div> 
                                            <div class="form-group subform" id="dblockrx">
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_aptob">AP tobillo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_latob">Lateral tobillo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_mortaja">Mortaja</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_apcapoy">AP ambos pies con apoyo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_oblpie">Oblícua pie</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_latsimpie">Lateral simple pie</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_latapoy">Lateral con apoyo</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_oblicuaint">Axiales  calcáneo/harris</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_broden">Broden</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_canale">Canale</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="rx_proses">Proyección sesamoideos</label>
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
                                            <!-- Laboratorios -->
                                            <div class="checkbox">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" name="pl_labs" id="dchlabs">Laboratorios</label>
                                            </div>
                                            <div class="form-group subform" id="dblocklabs">
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
                                                    <input type="checkbox" name="x_lab_otros" class="sw">Otros</label>
                                                    <input type="text" id="x_lab_otros" class="form-control finput fw" name="lab_otros">
                                                </div>
                                            </div><!-- /.Laboratorios -->
                                        	<div class="checkbox">
                                                <label class="checkbox-inline">
                                                <input type="checkbox" name="x_pl_otrosd" class="sw" alt="nobd">Otros</label>
                                                <input type="text" id="x_pl_otrosd" class="form-control finput fw" name="pl_otros">
                                            </div>
                                        	<!-- Referencias -->
                                            <div class="form-group subform">
                                                <label for="Examen de cadera">Referencias</label>
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
                                                    <label><input type="checkbox" name="x_refd_dr" class="sw">Dr.</label>
                                                    <input type="text" id="x_refd_dr" class="form-control finput fw mayusc" name="ref_dr">
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="x_refd_preoper" class="sw">Preoperatorio</label>
                                                    <input type="text" id="x_refd_preoper" class="form-control finput fw" name="ref_preoper">
                                                </div>
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_dtxrefotros" class="sw">Otros</label>
                                                    <input type="text" id="x_dtxrefotros" class="form-control finput fw" name="ref_otros">
                                                </div>
                                            </div><!-- /.Referencias -->
                                            
                                            <!-- Procedimientos -->
                                            <div class="form-group subform">
                                                <label for="procedimientos">Procedimientos</label>
                                                <div class="checkbox">
                                                  <label class="checkbox-inline">
                                                  <input type="checkbox" name="pro_atrocentesis">Artrocentésis</label>
                                                </div>
                                                <!-- Infiltración -->
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="pro_infiltra" data-fname="pro_infiltra_d" 
                                                    id="chinf" class="sw">Infiltración</label>
                                                </div>
                                                <div id="pro_infiltra_d" class="fw subform">
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_anestloc">Anestesia local</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_esteroides">Esteroides</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_viscosup">Viscosuplementación</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label class="checkbox-inline">
                                                      <input type="checkbox" name="pro_plasmaplaq">Plasma plaquetario</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="checkbox-inline">
                                                        <input type="checkbox" name="x_pro_otros_d" class="sw">Otros</label>
                                                        <input type="text" id="x_pro_otros_d" class="form-control finput fw" name="pro_otros">
                                                    </div>
                                                </div><!-- /.Infiltración -->
                                            	<!--<div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_pro_otros" class="sw">Otros</label>
                                                    <input type="text" id="x_pro_otros" class="form-control finput fw" name="pro_otros">
                                                </div>-->
                                            </div><!-- /.Procedimientos -->
                                            
                                            <!-- Cirugía -->
                                            <div class="form-group subform">
                                                <label for="Examen de cadera">Cirugía</label>
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
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                    <input type="checkbox" name="x_cir_notas_d" class="sw">Otros</label>
                                                    <input type="text" id="x_cir_notas_d" class="form-control finput fw" name="cir_notas">
                                                </div>
                                            </div><!-- Cirugía -->
                                        
                                        </div><!-- /.Plan -->
                                        
                                        <!-- ültimo bloque de formulario -->
                                        <div id="informe_autogenerado"></div>
                                        <hr><hr>
                                        <!-- Bloque final -->
                                        <div align="center">
                                            <button type="button" class="btn btn-form" data-toggle="modal" 
                                            data-target="#confirm_modal">Guardar</button>
                                            <!-- Ventana de diálogo modal -->
                                            <div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" 
                                            							aria-labelledby="myModalLabel" aria-hidden="true">
                                            
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
                                                        <div id="waitconfirm"></div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                            <button type="button" class="btn btn-primary" 
                                                            onclick="regHistoriaIDos()">Confirmar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        	
                                            </div><!-- /.Ventana de diálogo modal -->
                                        
                                        </div><!-- /.Bloque final -->
                                        <div id="formelems"></div><div id="dnresp"></div>
                                    </form>
                                </div>
                            
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