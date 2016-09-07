<div class="modal fade" id="rpassmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title tsec" id="myModalLabel">Recuperar contraseña</h4>
            </div><!-- /.modal-header -->
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            	<span>Ingrese la dirección de correo o el nombre de usuario asociado a la cuenta</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" id="form_nregistro" action="">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Email o Usuario</label>
                                                <input class="form-control" name="uemail" id="uemail_recuperarpassw">
                                                <p class="help-block"></p>
                                            </div>
                                            <div align="center">
                                                <div style="padding-top:20px;"></div>
                                                <button type="button" class="btn btn-form" id="frmrecuperacionp">Enviar</button>
                                            </div>
                                            <div id="passw_msg" style="padding:28px;"></div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
	</div>
</div>
<script src="js/setup.js"></script>