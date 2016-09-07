<div class="modal fade" id="manmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Maniobras</h4>
            </div>
            <div class="modal-body">
                <div class="dataTable_wrapper man_opcemergentes">
                	<table class="table table-striped table-hover" id="dataTables-manfcc">
                        <thead>
                            <tr><th></th></tr>
                        </thead>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_distr" data-nombre="Distracción">Distracción</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                            <table width="100%" border="0" class="tform">
                              <tr>
                                <td width="70%">Bakody (mejora)</td>
                                <td width="15%"><label class="checkbox-inline">
                                <input type="checkbox" name="man_mbakder" data-nombre="Bakody (mejora) der">Der</label></td>
                                <td width="15%"><label class="checkbox-inline">
                                <input type="checkbox" name="man_mbakizq" data-nombre="Bakody (mejora) izq">Izq</label></td>
                              </tr>
                              <tr>
                                <td>Bakody (empeora)</td>
                                <td><label class="checkbox-inline">
                              <input type="checkbox" name="man_ebakder" data-nombre="Bakody (empeora) der">Der</label></td>
                                <td><label class="checkbox-inline">
                              <input type="checkbox" name="man_ebakizq" data-nombre="Bakody (empeora) izq">Izq</label></td>
                              </tr>
                              <tr>
                                <td>Maniobra Adson</td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_adsonder" data-nombre="Maniobra Adson der">Der</label></td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_adsonizq" data-nombre="Maniobra Adson izq">Izq</label></td>
                              </tr>
                              <tr>
                                <td>Maniobra Halsted</td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_halder" data-nombre="Maniobra Halsted der">Der</label></td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_halizq" data-nombre="Maniobra Halsted izq">Izq</label></td>
                              </tr>
                              <tr>
                                <td>Lhermitte</td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_lheder" data-nombre="Lhermitte der">Der</label></td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_lheizq" data-nombre="Lhermitte izq">Izq</label></td>
                              </tr>
                              <tr>
                                <td>Romberg</td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_romder" data-nombre="Romberg der">Der</label></td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_romizq" data-nombre="Romberg izq">Izq</label></td>
                              </tr>
                              <tr>
                                <td>Spurling</td>
                                <td><label class="checkbox-inline">
                              <input type="checkbox" name="man_spuder" data-nombre="Spurling der">Der</label></td>
                                <td><label class="checkbox-inline">
                              <input type="checkbox" name="man_spuizq" data-nombre="Spurling izq">Izq</label></td>
                              </tr>
                              <tr>
                                <td>Spurling reverso</td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_rspuder" data-nombre="Spurling reverso der">Der</label></td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_rspuizq" data-nombre="Spurling reverso izq">Izq</label></td>
                              </tr>
                              <tr>
                                <td>Jackson</td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_jackder" data-nombre="Jackson der">Der</label></td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_jackizq" data-nombre="Jackson der">Izq</label></td>
                              </tr>
                              <tr>
                                <td>Bikele</td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_bikder" data-nombre="Bikele der">Der</label></td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_bikizq" data-nombre="Bikele izq">Izq</label></td>
                              </tr>
                              <tr>
                                <td>DeKlein-Nieuwenhuyse</td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_dnder" data-nombre="DeKlein-Nieuwenhuyse der">Der</label></td>
                                <td><label class="checkbox-inline">
                                <input type="checkbox" name="man_dnizq"data-nombre="DeKlein-Nieuwenhuyse izq">Izq</label></td>
                              </tr>
                            </table>
                        </td></tr>
                    </table>
                    <div class="checkbox">
                    	<label class="checkbox-inline">
                        <input type="checkbox" name="x_txmanotros" class="sw" data-nombre="">Otros</label>
                        <input type="text" id="x_txmanotros" class="form-control finput fw" name="man_otros" data-nombre="Otros">
                	</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
	</div>
    <script>
		$(document).ready(function() {
			$('#dataTables-manfcc').DataTable({
				responsive: true,
				"paging":   false,
				"ordering": true,
				"info":     false
			});
		});
    </script>
</div>
        <!-- /.modal-content -->	