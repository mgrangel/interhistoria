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
                      <input type="text" class="form-control finput" name="x_man_filt">
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline">
                      <input type="checkbox" name="man_distr">Distracción</label>
                    </div>
                    <div class="checkbox">
                        <table width="100%" border="0" class="tform">
                          <tr>
                            <td width="70%">Bakody (mejora)</td>
                            <td width="15%"><label class="checkbox-inline">
                          	<input type="checkbox" name="man_mbakder">Der</label></td>
                            <td width="15%"><label class="checkbox-inline">
                          	<input type="checkbox" name="man_mbakizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td>Bakody (empeora)</td>
                            <td><label class="checkbox-inline">
                          <input type="checkbox" name="man_ebakder">Der</label></td>
                            <td><label class="checkbox-inline">
                          <input type="checkbox" name="man_ebakizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td>Maniobra Adson</td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_adsonder">Der</label></td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_adsonizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td>Maniobra Haldstead</td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_halder">Der</label></td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_halizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td>Lhermitte</td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_lheder">Der</label></td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_lheizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td>Romberg</td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_romder">Der</label></td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_romizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td>Spurling</td>
                            <td><label class="checkbox-inline">
                          <input type="checkbox" name="man_spuder">Der</label></td>
                            <td><label class="checkbox-inline">
                          <input type="checkbox" name="man_spuizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td>Spurling reverso</td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_rspuder">Der</label></td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_rspuizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td>Jackson</td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_jackder">Der</label></td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_jackizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td>Bikele</td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_bikder">Der</label></td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_bikizq">Izq</label></td>
                          </tr>
                          <tr>
                            <td>DeKlein-Nieuwenhuyse</td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_dnder">Der</label></td>
                            <td><label class="checkbox-inline">
                            <input type="checkbox" name="man_dnizq">Izq</label></td>
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