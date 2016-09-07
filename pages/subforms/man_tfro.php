<div class="modal fade" id="manmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Maniobras</h4>
            </div>
            <div class="modal-body">
                <div class="dataTable_wrapper man_opcemergentes">
                	<table class="table table-striped table-hover" id="dataTables-manfro">
                        <thead>
                            <tr><th></th></tr>
                        </thead>
                        <tr class="odd gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="man_tempano" data-nombre="Témpano">Témpano</label></td>
                        </tr>    
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_rofpat" data-nombre="Roce fémoro-patelar">Roce fémoro-patelar</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_clarke" data-nombre="Clarke">Clarke</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_zohler" data-nombre="Zohler">Zohler</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_sage" data-nombre="Sage">Sage</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_pto_acosta" data-nombre="Punto de Acosta">Punto de Acosta</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_mcmurray" data-nombre="McMurray">McMurray</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_appley" data-nombre="Appley">Appley</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_appley_inv" data-nombre="Appley invertido">Appley invertido</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_twist" data-nombre="Twist">Twist</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_gav_ant" data-nombre="Gaveta anterior">Gaveta anterior</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                            <label class="checkbox-inline"><input type="checkbox" name="man_lachman" data-nombre="Lachman">Lachman</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                      		<label class="checkbox-inline"><input type="checkbox" name="man_piv_shift" data-nombre="Pivot-shift">Pivot-shift</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="man_piv_shift_inv" data-nombre="Pivot-shift invertido">Pivot-shift invertido</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="man_gav_post" data-nombre="Gaveta posterior">Gaveta posterior</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="man_stcap_int" data-nombre="Stress cápsula int">Stress cápsula int</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="man_stcap_ext" data-nombre="Stress cápsula ext">Stress cápsula ext</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="man_bost_varo" data-nombre="Bostezo varo">Bostezo varo</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="man_bost_valgo" data-nombre="Bostezo valgo">Bostezo valgo</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="man_slocum_int" data-nombre="Slocum int">Slocum int</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="man_slocum_ext" data-nombre="Slocum ext">Slocum ext</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline"><input type="checkbox" name="man_dial" data-nombre="Dial">Dial</label></td>
                        </tr>
                        <tr class="even gradeX"><td>
                        	<label class="checkbox-inline">
                            <input type="checkbox" name="man_apat" data-nombre="Aprensión patelar">Aprensión patelar</label></td>
                        </tr>
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
			$('#dataTables-manfro').DataTable({
				responsive: true,
				"paging":   false,
				"ordering": true,
				"info":     false
			});
		});
    </script>
</div>
        <!-- /.modal-content -->	