<!-- modal-content -->
<div class="modal fade" id="ficha_anteced" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Antecedentes y Examen funcional</h4>
            </div>
            <div class="modal-body">
            	<?php foreach( $regs_antecedentes as $rega ){ 
					  	$keys = filtrarCamposNumericos( array_keys( $rega ) );
						$aps = obtenerAntecedentesPersonales( "ap", $rega, $keys, $frm_aefn );
						$als = obtenerAntecedentesPersonales( "al", $rega, $keys, $frm_aefn );
						$efn = obtenerAntecedentesPersonales( "efn", $rega, $keys, $frm_aefn );
				?>
            		<div class="form-group regficha_antecedente" id="<?php echo "f_rega".$rega["idAntecedente"]; ?>">
                    	<div><label for="antecedentes_personales" class="tsec">Antecedentes Personales</label></div>
                        <?php echo $aps; ?>
                        <?php if ( $als != "" ) { ?><div><label for="antecedentes_personales" class="">Alergias</label></div><?php } ?>
                        <?php echo $als; ?>
                        <div><label for="antecedentes_personales" class="tsec">Examen funcional</label></div>
                        <?php echo $efn; ?>
                    </div>
                    
                <?php } ?>
                <hr>                                        
                <div class="form-group"><a href="paciente.php?p=<?php echo $idp;?>ap=<?php echo $rega["idAntecedente"];?>">Editar registro</a></div>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
	</div>
</div>
<!-- /.modal-content -->	