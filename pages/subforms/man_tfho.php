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
                          <input type="checkbox" name="man_apley" data-nombre="Rascado Apley">Rascado Apley</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_jobe" data-nombre="Jobe">Jobe</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_speed" data-nombre="Speed">Speed</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_yergason" data-nombre="Yergason">Yergason</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_neer" data-nombre="Neer">Neer</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_hawken" data-nombre="Hawkins-Kennedy">Hawkins-Kennedy</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_obrien" data-nombre="O'Brien">O'Brien</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_clunk" data-nombre="Clunk">Clunk</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_napoleon" data-nombre="Napoleón">Napoleón</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_clairon" data-nombre="Clairon">Clairon</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_crossover" data-nombre="Cross-over">Cross-over</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_liftoff" data-nombre="Lift-off/Despegue">Lift-off/Despegue</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_pitslap" data-nombre="Pitcher/Slap">Pitcher/Slap</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_ludington" data-nombre="Ludington">Ludington</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_lippman" data-nombre="Lippman">Lippman</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_inest_ant" data-nombre="Inestabilidad anterior">Inestabilidad anterior</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_inest_post" data-nombre="Inestabilidad posterior">Inestabilidad posterior</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_sulcus" data-nombre="Surco/Sulcus">Surco/Sulcus</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_feagin" data-nombre="Feagin">Feagin</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_wrigth" data-nombre="Wrigth">Wrigth</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_adson" data-nombre="Maniobra Adson">Maniobra Adson</label>
                        </td></tr>
                        <tr class="odd gradeX"><td>
                          <label class="checkbox-inline">
                          <input type="checkbox" name="man_halstead" data-nombre="Maniobra Halstead">Maniobra Halstead</label>
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