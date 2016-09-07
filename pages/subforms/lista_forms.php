<style>.lforms{ list-style:none; }</style>
<li class="dropdown lforms">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-file-o fa-fw"></i> Nueva <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <?php foreach( $lnuevoforms as $nf ){?>
        <li><a href="<?php echo $nf["lnk"]."?id_p=$idp"; ?>"><?php echo $nf["tit"]; ?></a>
        <?php }?>
    </ul>
</li>
