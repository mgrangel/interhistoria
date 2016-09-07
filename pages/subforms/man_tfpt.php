<div class="modal fade" id="manmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Maniobras</h4>
            </div>
            <div class="modal-body">
                <div class="dataTable_wrapper man_opcemergentes">
                	<table class="table table-striped table-hover" id="dataTables-manfpt">
                        <thead>
                            <tr><th></th></tr>
                        </thead>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_thop" data-nombre="Thompson +">Thompson +</label>
                        </td></tr>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_thon" data-nombre="Thompson -">Thompson -</label>
                        </td></tr>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_hom" data-nombre="Homan">Homan</label>
                        </td></tr>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_psin" data-nombre="Pruebas sindesmosis">Pruebas sindesmosis</label>
                        </td></tr>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_jack" data-nombre="Jack">Jack</label>
                        </td></tr>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_mulder" data-nombre="Mulder">Mulder</label>
                        </td></tr>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_appley" data-nombre="Gaveta anterior">Gaveta anterior</label>
                        </td></tr>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_vait" 
                          data-nombre="Varo astragalino/Inclinación talar">Varo astragalino/Inclinación talar</label>
                        </td></tr>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_tinel" data-nombre="Tinel">Tinel</label>
                        </td></tr>
                        <tr class="even gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_buerg" data-nombre="Buerguer">Buerguer</label>
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
			$('#dataTables-manfpt').DataTable({
				responsive: true,
				"paging":   false,
				"ordering": true,
				"info":     false
			});
		});
    </script>
</div>
        <!-- /.modal-content -->	