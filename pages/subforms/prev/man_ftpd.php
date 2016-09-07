<?php 
/*
 * Interhistorias - Formulario pie tobillo ( Maniobras )
 * 
 */
?>
<div class="modal fade" id="dmanmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Maniobras</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_thop">Thompson +</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_thon">Thompson -</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_hom">Homan</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_psin">Pruebas sindesmosis</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_jack">Jack</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_mulder">Mulder</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_appley">Gaveta anterior</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_vait">Varo astragalino/Inclinación talar</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_tinel">Tinel</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_buerg">Buerguer</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox-inline">
                        <input type="checkbox" name="x_dtxmanotros" class="sw"  data-nombre="">Otros</label>
                        <input type="text" id="x_dtxmanotros" class="form-control finput fw" name="man_otros" data-nombre="Otros">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
	</div>
</div>
        <!-- /.modal-content -->	