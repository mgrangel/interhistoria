<div class="modal fade" id="manmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Maniobras</h4>
            </div>
            <div class="modal-body">
                <div class="dataTable_wrapper man_opcemergentes">
                	<table class="table table-striped table-hover" id="dataTables-manfcd">
                        <thead>
                            <tr><th></th></tr>
                        </thead>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_ctap" 
                          data-nombre="Compresión Torácica Antero-Posterior">Compresión Torácica Antero-Posterior</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_ctl" data-nombre="Compresión Torácica Lateral">Compresión Torácica Lateral</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_adams" data-nombre="Maniobra Adams">Maniobra Adams</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_plomada" data-nombre="Plomada">Plomada</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                            <table width="100%" border="0" class="tform">
                              <tr>
                                <td width="70%">Lhermitte</td>
                                <td width="15%"><label class="checkbox-inline">
                                <input type="checkbox" name="man_lheizq" data-nombre="Lhermitte izq">Izq</label></td>
                                <td width="15%"><label class="checkbox-inline">
                                <input type="checkbox" name="man_lheder" data-nombre="Lhermitte der">Der</label></td>
                              </tr>
                              <tr>
                                <td width="70%">Puñopercusión</td>
                                <td width="15%"><label class="checkbox-inline">
                                <input type="checkbox" name="man_puperizq" data-nombre="Puñopercusión izq">Izq</label></td>
                                <td width="15%"><label class="checkbox-inline">
                                <input type="checkbox" name="man_puperder" data-nombre="Puñopercusión der">Der</label></td>
                              </tr>
                              <tr>
                                <td width="70%">Lasegue</td>
                                <td width="15%"><label class="checkbox-inline">
                                <input type="checkbox" name="man_lasizq" data-nombre="Lasegue izquierdo">Izq</label></td>
                                <td width="15%"><label class="checkbox-inline">
                                <input type="checkbox" name="man_lasder" data-nombre="Lasegue derecho">Der</label></td>
                              </tr>
                              <tr>
                              	<td width="70%">Lasegue modificado/Bragard</td>
                                <td width="15%"><label class="checkbox-inline">
                                <input type="checkbox" name="man_braizq" data-nombre="Lasegue modificado/Bragard izq">Izq</label></td>
                                <td width="15%"><label class="checkbox-inline">
                                <input type="checkbox" name="man_brader" data-nombre="Lasegue modificado/Bragard der">Der</label></td>
                              </tr>
                            </table>
                        </td></tr>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline"><input type="checkbox" name="x_man_medfldo" class="sw">Medición de flexión dorsal</label>
                          <input type="text" id="x_man_medfldo" class="form-control finput fw" name="man_medfldo" 
                          data-nombre="Medición de flexión dorsal">
                        </td></tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="x_man_medexto" 
                            class="sw">Medición de expansión torácica</label>
                          <input type="text" id="x_man_medexto" class="form-control finput fw" name="man_medexto" 
                          data-nombre="Medición de expansión torácica">
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
			$('#dataTables-manfcd').DataTable({
				responsive: true,
				"paging":   false,
				"ordering": true,
				"info":     false
			});
		});
    </script>
</div>
        <!-- /.modal-content -->	