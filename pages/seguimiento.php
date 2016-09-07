<?php 
/* 
*
* Interhistorias - Pestaña de consulta de seguimiento
*/

?>
<style> 
	#cseg > li > a{ padding:0 !important; min-height:0; }
</style>
<ul class="nav navbar-top-links navbar-right" id="cseg">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-book fa-fw"></i><i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <?php 
				while( $reg = mysql_fetch_array( $seguimiento )){
					$lnk = "historia.php?f=$reg[id]&nf=$nform";
			?>
            	<li><a href="<?php echo $lnk; ?>"><?php echo $reg["fecha"]; ?></a></li>
			<?php } ?>
            <!--<li class="divider"></li>-->
        </ul>
    </li>
</ul>
<!-- /.navbar-top-links -->