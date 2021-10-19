<?php
session_start();
require_once"../../clases/Conexion.php";
$c=new Conectar();
$conexion=$c->conexion();

$idUsuario = $_SESSION['idUsuario'];

	$sql="SELECT E.ID_EXPEDIENTE, E.NUM_EXPEDIENTE, DATE_FORMAT(E.FECHA_PUBLICACION,'%d/%m/%Y') AS FECHA_PUBLICACION, S.NOM_SUBINSTANCIA AS DESCRIPCION, E.RUTA AS RUTA, TIPO
			FROM EXPEDIENTE E
			INNER JOIN CAT_INSTANCIA I ON E.FK_INSTANCIA = I.ID_INSTANCIA
			INNER JOIN CAT_SUB_INSTANCIA S ON E.FK_SUBINSTANCIA = S.ID_SUBINSTANCIA
			INNER JOIN CAT_ORG_JURIS ON E.FK_ORGJURIS = ID_ORGJURIS
			WHERE FK_USUARIO = '$idUsuario'";

	$result= mysqli_query($conexion,$sql);

?>

<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table" id="tablaGestorDataTable">
				<thead class="table-dark">
					<tr style="text-align: center;">
						<th>No. EXPEDIENTE</th>
						<th>FECHA DE PUBLICACI&Oacute;N</th>
						<th>DESCRIPCI&Oacute;N</th>
						<th>Visualizar</th>
						<th>Descargar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php

						while($mostrar=mysqli_fetch_array($result)){
							$rutaDescarga=$mostrar['RUTA'];
							$nombre_archivo=$mostrar['RUTA'];
							$idExpediente=$mostrar['ID_EXPEDIENTE'];
					?>
					<tr style="text-align: center;">
						<td><?php echo $mostrar['NUM_EXPEDIENTE']; ?></td>
						<td><?php echo $mostrar['FECHA_PUBLICACION']; ?></td>
						<td><?php echo $mostrar['DESCRIPCION']; ?></td>
						<td>

							<span 	
								class="btn btn-primary btn-sm" 
								data-toggle="modal" 
								data-target="#visualizarArchivo" 
								onclick="obtenerExpedienteporId('<?php echo $idExpediente; ?>
										')">
								<span class="fa fa-eye" aria-hidden="true"></span>
							</span>
						
						</td>
						<td>		
							<a href="<?php echo $rutaDescarga; ?>" 
								download="<?php echo $nombre_archivo; ?>" class="btn btn-success btn-sm">
								<span class="fas fa-download"></span>
							</a>
						</td>
						<td>
							<span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idExpediente; ?>')">
								<span class="far fa-trash-alt"></span>
							</span>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {
		$('#tablaGestorDataTable').DataTable( {
			"order": [[ 3, "desc" ]],
			language: {
				"decimal":        "",
				"emptyTable":     "No hay datos",
				"info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty":      "Mostrando 0 a 0 de 0 registros",
				"infoFiltered":   "(Filtro de _MAX_ total registros)",
				"infoPostFix":    "",
				"thousands":      ",",
				"lengthMenu":     "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search":         "Buscar:",
				"zeroRecords":    "No se encontraron coincidencias",
				"paginate": {
					"first":      "Primero",
					"last":       "Ultimo",
					"next":       "Pr&oacute;ximo",
					"previous":   "Anterior"
				},
				"aria": {
					"sortAscending":  ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			}
		} );
	} );

</script>