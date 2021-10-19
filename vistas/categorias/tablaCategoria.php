<?php

session_start();

require_once "../../clases/Conexion.php";

$LoginEmail = $_SESSION['email'];
$idUsuario = $_SESSION['idUsuario'];

$conexion = new Conectar();
$conexion = $conexion->conexion();
?>
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table" id="tablaCat_Org_Juris_DataTable">
				<thead class="table-dark">
					<tr style="text-align: center;">
						<th>&Oacute;RGANO JURISDICCIONAL</th>
						<th>JUEZ | MAGISTRADA(O)</th>
					<!--	<th>PUESTO</th>-->
						<th>SIGLAS</th>
					<!--	<th>EDITAR</th>
						<th>ELIMINAR</th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sql="SELECT ID_ORGJURIS,NOM_ORGJURIS, NOMB_JUZ_MAGIS, NOM_PUESTO_JM, SIGLAS_ORGJURIS
					FROM USUARIO 
					INNER JOIN CAT_ORG_JURIS ON FK_ORGJURIS = ID_ORGJURIS
					WHERE ID_USUARIO = '$idUsuario'";

					$result=mysqli_query($conexion,$sql);

					while ($mostrar=mysqli_fetch_array($result)) {
							//$ID_ORGJURIS=$mostrar['ID_ORGJURIS'];

						?>
						<tr style="text-align: center;">
							<td><?php echo $mostrar['NOM_ORGJURIS']; ?></td>
							<td><?php echo $mostrar['NOMB_JUZ_MAGIS']; ?></td>
							<td><?php echo $mostrar['SIGLAS_ORGJURIS']; ?></td>
					<!--	<td>
							<span class="btn btn-warning btn-sm" >
								<span class="fas fa-edit"></span>
							</span>
						</td>
						<td>
						<span class="btn btn-danger btn-sm" onclick="eliminarCatOrgJuris(
						'<?php echo $idOrgJuris ?>')">
							<span class="fas fa-trash-alt"></span>
						</span>
					</td>-->
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
</div>
</div>
<script type="text/javascript">

	$(document).ready(function() {
		$('#tablaCat_Org_Juris_DataTable').DataTable( {
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
					"next":       "Próximo",
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
