<?php $lista_pacientes = obtenerTablaPacientes( $dbh, "mini", $_SESSION["user"]["idUsuario"] );?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closemodalx" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Pacientes</h4>
            </div>
            <div class="modal-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nombres</th><th>Apellido</th>
                                <th>Cédula</th><th>Edad</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
							<?php 
                                $n = 1;	
                                foreach( $lista_pacientes as $p ){
                                    if( $n % 2 == 0 ) $cl = "even"; else $cl = "odd";
                            ?>
							<tr class="<?php echo $cl;?> gradeX">
							<td><?php echo $p["nombre"];?></td>
							<td><?php echo $p["apellido"];?></td>
							<td><?php echo $p["cedula"];?></td>
							<td><?php echo $p["edad"];?></td>
							<td>
                            	<input type="hidden" id="infop<?php echo $p["id"];?>"
                                 value="<?php echo $p["nombre"]." ".$p["apellido"];?>">
                                <a class="getidp" href="<?php echo $p["link"];?>" 
                                title="<?php echo $p["id"];?>">Seleccionar</a>
                            </td>
							</tr>
							<?php } ?>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true,
				"order": [[ 1, "asc" ]]
			});
		});
    </script>
    <!-- /.modal-dialog -->
</div>
