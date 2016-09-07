<div class="modal fade" id="antemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Antecedentes y Examen funcional</h4>
            </div>
            <div class="modal-body">
            	<form role="form" id="formulario_antecedentes">
                    <input id="id_paciente" name="idPaciente" type="hidden" value="<?php echo $idp;?>"/>
                    <input id="id_usuario" name="idUsuario" type="hidden" value="<?php echo $idu;?>"/>
                    <div class="form-group">
                    <div><label for="antecedentes_personales_title" class="tsec">Antecedentes Personales</label></div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label for="ap_trauma">Traumatológicos</label>
                                <textarea class="form-control finput" name="ap_trauma" rows="3"></textarea>
                            </div>
                            <div class="checkbox">
                                <label for="ap_quir">Quirúrgicos</label>
                                <textarea class="form-control finput" name="ap_quir" rows="3"></textarea>
                            </div>
                            <div class="form-group subform">
                                <div><label for="alergias">Alergias</label></div>
                                <div class="checkbox">
                                  <label class="checkbox-inline"><input type="checkbox" name="al_asa">ASA</label>
                                </div>
                                <div class="checkbox">
                                  <label class="checkbox-inline"><input type="checkbox" name="al_aines">AINEs</label>
                                </div>
                                <div class="checkbox">
                                  <label class="checkbox-inline"><input type="checkbox" name="al_penicilina">Penicilina</label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox-inline">
                                    <input type="checkbox" name="x_al_otros" class="sw">Otros</label>
                                    <input type="text" id="x_al_otros" class="form-control finput fw" name="al_otros">
                                </div>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline">
                              <input type="checkbox" name="ap_dmhiper">DM/Hiperinsulinismo</label>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline"><input type="checkbox" name="ap_hta">HTA</label>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline"><input type="checkbox" name="ap_asma">Asma</label>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline"><input type="checkbox" name="ap_tiroides">Tiroides</label>
                            </div>
                            <div class="checkbox">
                                <label class="checkbox-inline">
                                <input type="checkbox" name="x_txapmed" class="sw">Medicamentos</label>
                                <input type="text" id="x_txapmed" class="form-control finput fw" name="ap_medic">
                            </div>
                            <div class="checkbox">
                                <input type="text" class="form-control finput" name="ap_notas" title="300">
                            </div>
                        </div>
                  </div>
                    <div class="form-group">
                        <div>
                          <label for="examen_funcional" class="tsec">Examen Funcional</label></div>
                        <div class="form-group">
                            <div class="checkbox">
                              <label class="checkbox-inline">
                              <input type="checkbox" name="efn_rigmat">Rigidez matutina</label>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline">
                              <input type="checkbox" name="efn_perdpeso">Pérdida peso</label>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline">
                              <input type="checkbox" name="efn_gpeso">Ganancia peso</label>
                            </div>
                            <div class="checkbox">
                                <label for="efn_apet">Apetito</label>
                                <input type="text" class="form-control finput" name="efn_apet">
                            </div>
                            <div class="checkbox">
                                <label for="efn_micc">Micciones</label>
                                <input type="text" class="form-control finput" name="efn_micc">
                            </div>
                            <div class="checkbox">
                                <label for="efn_evac">Evacuaciones</label>
                                <input type="text" class="form-control finput" name="efn_evac">
                            </div>
                            <div class="checkbox">
                                <label for="efn_hpbio">Hábitos Psicobiológicos</label>
                                <input type="text" class="form-control finput" name="efn_hpbio">
                            </div>
                        </div>   
                    </div> 
                    <div align="center"><button type="button" class="btn btn-form" onclick="registrarAPEFN()">Guardar</button></div> 
                    <div id="paciente_r" align="center"></div> 
       		  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
	</div>
</div>
        <!-- /.modal-content -->	