<?php 
	/*
	 * Interhistorias - Invitación a usuarios a realizar subscripción
	 * 
	 */
	session_start();
	ini_set( 'display_errors', 1 );
	include( "data-usuario.php" );
	$users = obtenerRegistroInvitacion();
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

    <title>Interhistorias - Invitación</title>

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
            <a class="navbar-brand" href="../pages/index.php" style="padding:7px; position:absolute; z-index:9;">
            	<img src="../img/logo.png" width="165" height="58">
            </a>
            </div>
            <!-- /.navbar-top-links -->
            <?php //include( "../pages/imenu.php" );?>
        </nav>

      	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span class="title">Envío de invitación para iniciar interhistoria.net</span></h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <div class="row">
                            	<div class="col-lg-6">
                                    <div id="lista_registro" style="padding:12px;">
                                        <table border="0" style="font-size:10px; font-weight:lighter;">
                                          <tr>
                                            <th scope="col" style="color:#0A5A66;">Nombre</th>
                                            <th scope="col" style="color:#0A5A66;">Email</th>
                                            <th scope="col" style="color:#0A5A66;">Telf</th>
                                          </tr>
                                          <?php 
                                            foreach( $users as $r ){
                                          ?>
                                            <tr>
                                            <th scope="col"><?php echo ucwords(strtolower( $r["nombre"] ));?></th>
                                            <th scope="col"><?php echo $r["email"] ;?></th>
                                            <th scope="col"><?php echo $r["fecha"] ;?></th>
                                            </tr>
                                          <?php	
                                            }
                                          ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                	<div id="lista_registro" style="padding:12px;">
                                        <table border="0" style="font-size:10px; font-weight:lighter;">
                                              <tr>
                                                <th scope="col" style="color:#0A5A66;">Nombre</th>
                                                <th scope="col" style="color:#0A5A66;">Usuario</th>
                                                <th scope="col" style="color:#0A5A66;">Pass</th>
                                              </tr>
                                              <?php 
                                                foreach( $users as $r ){
                                                    $datai = generarUserPass( $r["nombre"], $r["telefono"] );
													if( $r["id"] > 120 ){
                                              ?>
                                                <tr>
                                                <th scope="col"><?php echo ucwords( strtolower( $r["nombre"] ) );?></th>
                                                <th scope="col"><?php echo $datai["login"]; ?></th>
                                                <th scope="col"><?php echo $datai["passw"]; ?></th>
                                                </tr>
                                              <?php	
													}
												}
                                              ?>
                                        </table>
                                    </div>	
                                </div>
                            </div>
                            <div class="row">
                            	<div align="center" style="margin:25px 0;">
                                	<form id="invitacionreg" action="data-usuario.php" method="post">
                                    	<input type="hidden" name="reginvemail" value="1">
                                        <input type="hidden" name="minregid" value="120">
                                        <button type="submit" class="btn-form">Enviar mensaje de invitación</button>
                                    </form>
                                    <a href="data-usuario.php?msg1">Enviar invitación individual</a>
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
    </div>
    <!-- /#wrapper -->

    

</body>

</html>
<?php include_once( "analyticstracking.php" ) ?>