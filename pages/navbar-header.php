<style> .navbar-right{float: right!important; }</style>
<?php 
/* 
*
* Interhistorias - Barra de navegación superior
*/

$nuser = "";
if( isset( $_SESSION["user"] ) ){
	$nuser = $_SESSION["user"]["usuario"];
}
?>
<div id="sesname"><?php echo $nuser; ?></div>
<ul class="nav navbar-top-links navbar-right">
    <!--<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages">
            <li>
                <a href="#">
                    <div>
                        <strong>Interhistorias</strong>
                        <span class="pull-right text-muted">
                            <em>Ayer</em>
                        </span>
                    </div>
                    <div>Mensaje nuevo</div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <strong>Interhistorias</strong>
                        <span class="pull-right text-muted">
                            <em>Ayer</em>
                        </span>
                    </div>
                    <div>Mensaje nuevo</div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <strong>Interhistorias</strong>
                        <span class="pull-right text-muted">
                            <em>Ayer</em>
                        </span>
                    </div>
                    <div>Mensaje nuevo</div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                    <strong>Leer todos los mensajes</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-upload fa-fw"></i> Nuevo mensaje
                        <span class="pull-right text-muted small">Hoy</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                    <strong>Ver todas las alertas</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </li>-->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil</a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i>Configuración</a>
            </li>
            <li class="divider"></li>
            <li><a href="index.php?logout"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
            </li>
        </ul>
    </li>
</ul>
<!-- /.navbar-top-links -->