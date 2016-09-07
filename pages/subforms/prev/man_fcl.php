<div class="modal fade" id="manmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Maniobras</h4>
            </div>
            <div class="modal-body">
				<div class="form-group">
                    <div class="checkbox">
                      <input type="text" class="form-control finput" name="x_man_filt" alt="nobd">
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_compelv">Compresión pélvica</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_distpel">Distracción pélvica</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_adams">Maniobra Adams</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_thom">Maniobra Thomas</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_kerbru">Kernig-Brudzinski</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_babinsky">Babinsky</label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_refcrema">Reflejo cremasteriano</label>
                    </div>
                    <div class="checkbox">
                        <table width="100%" border="0" class="tform">
                          <tr>
                            <td width="70%">Lhermitte</td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_lheder">Der</label></td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_lheizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td width="70%">Lasegue</td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_lasder">Der</label></td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_lasizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td width="70%">Lasegue modificado/Bragard</td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_brader">Der</label></td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_braizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td width="70%">Patrick/Faber</td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_pfder">Der</label></td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_pfizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td width="70%">Maniobra piriforme</td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_pirder">Der</label></td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_pirizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td width="70%">Romberg</td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_romder">Der</label></td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_romizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td width="70%">Maniobra Ober</td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_obeder">Der</label></td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_obeizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td width="70%">Puño-percusión</td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_punder">Der</label></td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_izqder">Izq</label></td>
                          </tr>
                          <tr>
                            <td width="70%">Trendelenburg</td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_treder">Der</label></td>
                            <td width="15%"><label class="checkbox-inline">
                      		<input type="checkbox" name="man_treizq">Izq</label></td>
                          </tr>
                      	</table>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox-inline">
                        <input type="checkbox" name="x_txmanotros" class="sw">Otros</label>
                        <input type="text" id="x_txmanotros" class="form-control finput fw" name="man_otros">
                    </div>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" 
                data-dismiss="modal">Cerrar</button>
            </div>
        </div>
	</div>
</div>
        <!-- /.modal-content -->	