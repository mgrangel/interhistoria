<?php
/* 
*
* Interhistorias - Menú lateral izquierdo
*/
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="blank" style="height:25px;"></li>
            <li>
                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i>Pacientes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="npaciente.php">Agregar nuevo paciente</a>
                    </li>
                  <li>
                        <a href="lista-pacientes.php">Lista de pacientes</a>
                    </li>
                </ul>
            </li>
            <li>
            	<a href="#"><i class="fa fa-edit fa-fw"></i>Formularios<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
					<li><a href="formulario-columna-cervical.php">Columna Cervical</a></li>
					<li><a href="formulario-hombro.php">Hombro</a></li>
                    <li><a href="formulario-codo.php">Codo</a></li>
                    <li><a class="lnk-inact" href="formulario-blank.php">Mano-Muñeca</a></li>
					<li><a href="formulario-columna-dorsal.php">Columna Dorsal / Escoliosis</a></li>
                  	<li><a href="formulario-columna-lumbar.php">Columna Lumbar</a></li>
                    <li><a href="formulario-cadera-adulto.php">Cadera del Adulto</a></li>
					<li><a href="formulario-rodilla.php">Rodilla</a></li>
                    <li><a href="formulario-pies-tobillos.php">Pie-Tobillo</a></li>
                    <li><a class="lnk-inact" href="formulario-blank.php">Politraumatismo</a></li>
                    <li><a class="lnk-inact" href="formulario-blank.php">Control</a></li>
                </ul>
            </li>
            <li>
                
            </li>
        </ul>
    </div>
</div>
