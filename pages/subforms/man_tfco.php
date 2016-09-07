<div class="modal fade" id="manmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Maniobras</h4>
            </div>
            <div class="modal-body">
                <div class="dataTable_wrapper man_opcemergentes">
                	<table class="table table-striped table-hover" id="dataTables-manfco">
                        <thead>
                            <tr><th></th></tr>
                        </thead>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_aolepi" 
                          data-nombre="Alineación Olecranon-Epicondilos">Alineación Olecranon-Epicondilos</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_bosmed" data-nombre="Bostezo Medial">Bostezo Medial</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_boslat" data-nombre="Bostezo Lateral">Bostezo Lateral</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_aplat" 
                          data-nombre="Aprensión (Pivot-Shift) Posterolateral">Aprensión (Pivot-Shift) Posterolateral</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_teex" 
                          data-nombre="Tests para Epicondilitis Externa">Tests para Epicondilitis Externa</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_tein" 
                          data-nombre="Tests para Epicondilitis Interna">Tests para Epicondilitis Interna</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_tinuln" data-nombre="Tinel Ulnar">Tinel Ulnar</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_wartb" data-nombre="Wartenberg">Wartenberg</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_pprored" data-nombre="Prueba del Pronador Redondo">Prueba del Pronador Redondo</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_ppinpi" 
                          data-nombre="Prueba de la Pinza pulgar-índice">Prueba de la Pinza pulgar-índice</label>
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
			$('#dataTables-manfco').DataTable({
				responsive: true,
				"paging":   false,
				"ordering": true,
				"info":     false
			});
		});
    </script>
</div>
        <!-- /.modal-content -->	