<!-- modal-content -->
<div class="modal fade" id="rm_anteced" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Antecedentes y Examen funcional</h4>
            </div>
            <div class="modal-body">
            	<form role="form" id="frm_mod_antecedentes">
                    <input id="id_paciente" name="idPaciente" type="hidden" value="<?php echo $idp;?>"/>
                    <input id="id_ap" name="idAntecedente" type="hidden" value="<?php echo $_GET["rap"];?>"/>
                    <div class="form-group">
                    <div><label for="antecedentes_personales_title" class="tsec">Antecedentes Personales</label></div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label for="ap_trauma">Traumatológicos</label>
                                <textarea class="form-control finput" name="ap_trauma" rows="3"><?php echo $reg_ap["ap_trauma"];?></textarea>
                            </div>
                            <div class="checkbox">
                                <label for="ap_quir">Quirúrgicos</label>
                                <textarea class="form-control finput" name="ap_quir" rows="3"><?php echo $reg_ap["ap_quir"];?></textarea>
                            </div>
                            <div class="form-group subform">
                                <div><label for="alergias">Alergias</label></div>
                                <div class="checkbox">
                                  <label class="checkbox-inline">
                                  <input type="checkbox" name="al_asa" <?php echo tselop(1,$reg_ap["al_asa"],"chk");?>>ASA</label>
                                </div>
                                <div class="checkbox">
                                  <label class="checkbox-inline"><input type="checkbox" 
                                  name="al_aines" <?php echo tselop(1,$reg_ap["al_aines"],"chk");?>>AINEs</label>
                                </div>
                                <div class="checkbox">
                                  <label class="checkbox-inline"><input type="checkbox" 
                                  name="al_penicilina" <?php echo tselop(1,$reg_ap["al_penicilina"],"chk");?>>Penicilina</label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox-inline">Otros</label>
                                    <input type="text" id="x_al_otros" class="form-control finput" 
                                    name="al_otros" value="<?php echo $reg_ap["al_otros"];?>">
                                </div>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline">
                              <input type="checkbox" name="ap_dmhiper" <?php echo tselop(1,$reg_ap["ap_dmhiper"],"chk");?>>DM/Hiperinsulinismo</label>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline"><input type="checkbox" 
                              name="ap_hta" <?php echo tselop(1,$reg_ap["ap_hta"],"chk");?>>HTA</label>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline"><input type="checkbox" 
                              name="ap_asma" <?php echo tselop(1,$reg_ap["ap_asma"],"chk");?>>Asma</label>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline"><input type="checkbox" 
                              name="ap_tiroides" <?php echo tselop(1,$reg_ap["ap_tiroides"],"chk");?>>Tiroides</label>
                            </div>
                            <div class="checkbox">
                                <label class="checkbox-inline">Medicamentos</label>
                                <input type="text" id="x_txapmed" class="form-control finput" name="ap_medic" value="<?php echo $reg_ap["ap_medic"];?>">
                            </div>
                            <div class="checkbox">
                                <input type="text" class="form-control finput" name="ap_notas" title="300" value="<?php echo $reg_ap["ap_notas"];?>">
                            </div>
                        </div>
                  </div>
                    <div class="form-group">
                        <div>
                          <label for="examen_funcional" class="tsec">Examen Funcional</label></div>
                        <div class="form-group">
                            <div class="checkbox">
                              <label class="checkbox-inline">
                              <input type="checkbox" name="efn_rigmat" <?php echo tselop(1,$reg_ap["efn_rigmat"],"chk");?>>Rigidez matutina</label>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline">
                              <input type="checkbox" name="efn_perdpeso" <?php echo tselop(1,$reg_ap["efn_perdpeso"],"chk");?>>Pérdida peso</label>
                            </div>
                            <div class="checkbox">
                              <label class="checkbox-inline">
                              <input type="checkbox" name="efn_gpeso" <?php echo tselop(1,$reg_ap["efn_gpeso"],"chk");?>>Ganancia peso</label>
                            </div>
                            <div class="checkbox">
                                <label for="efn_apet">Apetito</label>
                                <input type="text" class="form-control finput" name="efn_apet" value="<?php echo $reg_ap["efn_apet"];?>">
                            </div>
                            <div class="checkbox">
                                <label for="efn_micc">Micciones</label>
                                <input type="text" class="form-control finput" name="efn_micc" value="<?php echo $reg_ap["efn_micc"];?>">
                            </div>
                            <div class="checkbox">
                                <label for="efn_evac">Evacuaciones</label>
                                <input type="text" class="form-control finput" name="efn_evac" value="<?php echo $reg_ap["efn_evac"];?>">
                            </div>
                            <div class="checkbox">
                                <label for="efn_hpbio">Hábitos Psicobiológicos</label>
                                <input type="text" class="form-control finput" name="efn_hpbio" value="<?php echo $reg_ap["efn_hpbio"];?>">
                            </div>
                        </div>   
                    </div> 
                    <div align="center"><button type="button" class="btn btn-form" onclick="modificarAPEFN()">Guardar</button></div> 
                    <div id="paciente_rap" align="center"></div> 
       		  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
	</div>
</div>
        <!-- /.modal-content -->	