<div class="modal fade" id="manmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Maniobras</h4>
            </div>
            <div class="modal-body">
                <div class="dataTable_wrapper man_opcemergentes">
                	<table class="table table-striped table-hover" id="dataTables-manfho">
                        <thead>
                            <tr><th></th></tr>
                        </thead>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_trendel" data-nombre="Trendelenburg">Trendelenburg</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_flam" data-nombre="Flamingo">Flamingo</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_patfab" data-nombre="Patrick/Faber">Patrick/Faber</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_pinz" data-nombre="Pinzamiento">Pinzamiento</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_tdeslab" data-nombre="Test desgarro Labrum">Test desgarro Labrum</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_thomas" data-nombre="Thomas">Thomas</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_ober" data-nombre="Ober">Ober</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_piriforme" data-nombre="Piriforme">Piriforme</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_fulcro" data-nombre="Fulcro">Fulcro</label>
                        </td></tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline">
                            <input type="checkbox" name="x_man_metcraig" class="sw" data-nombre="">Método Craig anteversión femoral(°)</label>
                            <input type="text" id="x_man_metcraig" class="form-control finput fw" 
                            name="man_metcraig" data-nombre="Método Craig anteversión femoral(°)">
                        </td></tr>
                    </table>
                    <div class="checkbox">
                        <label class="checkbox-inline">
                        <input type="checkbox" name="x_txmanotros" class="sw"  data-nombre="">Otros</label>
                        <input type="text" id="x_txmanotros" class="form-control finput fw" name="man_otros"  data-nombre="Otros">
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
			$('#dataTables-manfho').DataTable({
				responsive: true,
				"paging":   false,
				"ordering": true,
				"info":     false
			});
		});
    </script>
</div>
        <!-- /.modal-content -->	