<?php
	/*
	 * Interhistorias - Página inicio Dashboard
	 * 
	 */
	session_start();
	ini_set( 'display_errors', 1 );
	include( "../bd/data-usuario.php" );
	checkSession('');
?>
<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" type="text/css" href="../css/ihstyle.css">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Interhistoria</title>

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
            <?php include( "imenu.php" );?>
        </nav>
      	<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span class="title">Inicio</span></h1>
                </div> 
			</div>
			<div class="row" align="center">
            	<div class="col-lg-12">
                	<img src="../img/bodymain.png" class="img-responsive" usemap="#cuerpop" id="bodyimg"> 
                    <map name="cuerpop">
                    <area shape="rect" coords="166,90,217,131" href="formulario-columna-cervical.php" onMouseOver="imgcuerpo('fcc')" class="bp"/>
                    
                    <area shape="poly" coords="96,171,101,151,117,133,143,124,162,129,150,148,118,162" href="formulario-hombro.php">
                    <area shape="poly" coords="228,142,221,128,241,121,264,131,278,144,283,165,243,149" href="formulario-hombro.php">
                    <area shape="poly" coords="83,271,80,249,102,245,108,270" href="formulario-codo.php">
                    <area shape="poly" coords="268,262,274,236,293,242,288,264" href="formulario-codo.php">
                    <area shape="poly" coords="181,272,174,263,181,256,173,250,181,244,175,240,181,235,174,230,182,226,176,221,182,216,177,212,182,208,183,132,197,131,198,207,204,213,197,219,206,221,197,229,206,231,198,239,208,241,201,249,209,252,203,259,209,262,201,272" href="formulario-columna-dorsal.php">
                    <area shape="rect" coords="171,272,213,327" href="formulario-columna-lumbar.php" onMouseOver="imgcuerpo('fcl')" class="bp"/>
                    <area shape="rect" coords="110,497,162,551" href="formulario-rodilla.php" onMouseOver="imgcuerpo('fro')" class="bp"/>
                    <area shape="rect" coords="216,497,270,551" href="formulario-rodilla.php" onMouseOver="imgcuerpo('fro')" class="bp"/>
                    <area shape="rect" coords="93,684,153,746" href="formulario-pies-tobillos.php" onMouseOver="imgcuerpo('fpt')" class="bp"/>
                    <area shape="rect" coords="224,684,286,743" href="formulario-pies-tobillos.php" onMouseOver="imgcuerpo('fpt')" class="bp"/>
                    <area shape="poly" coords="148,308,161,318,182,329,207,328,222,317,233,309,238,327,245,336,232,367,224,375,207,368,190,369,174,368,161,375,150,367,144,352,141,336" href="formulario-cadera-adulto.php" onMouseOver="imgcuerpo('fca')" class="bp">
                  </map>
              </div>
			</div>
        </div>
	</div>
    </div>
    
    <!-- /#wrapper -->

    <!-- jQuery -->
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>

<!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	<script src="../js/jquery.rwdImageMaps.js"></script>
	<script>
    	$(document).ready(function(e) {
			//$('img[usemap]').rwdImageMaps();
			$(".bp").mouseout(function(e) {
				$("#bodyimg").attr('src','../img/bodymain.png');	
			})
		});
		function imgcuerpo( p ){ 
			if( p == "fho" ) $("#bodyimg").attr('src','../img/hombros.png');
			if( p == "fcc" ) $("#bodyimg").attr('src','../img/cuello.png');
			if( p == "fcl" ) $("#bodyimg").attr('src','../img/columna.png');
			if( p == "fca" ) $("#bodyimg").attr('src','../img/caderas.png');
			if( p == "fpt" ) $("#bodyimg").attr('src','../img/tobillos.png');
			if( p == "fro" ) $("#bodyimg").attr('src','../img/rodillas.png');
		}
    </script>
</body>
</html>
<?php include_once( "analyticstracking.php" ) ?>