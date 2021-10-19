<?php

session_start();

require_once "../../clases/Conexion.php";

$c = new Conectar();
$conexion=$c->conexion();

$idUsuario=$_SESSION['idUsuario'];

$sql="SELECT ID_ORGJURIS,NOM_ORGJURIS, NOMB_JUZ_MAGIS, NOM_PUESTO_JM, SIGLAS_ORGJURIS
FROM USUARIO 
INNER JOIN CAT_ORG_JURIS ON FK_ORGJURIS = ID_ORGJURIS
WHERE ID_USUARIO = '$idUsuario'";


$result=mysqli_query($conexion,$sql);

?>

	<?php 
	while($mostrar=mysqli_fetch_array($result)){

		$idCatOrgJuris=$mostrar['ID_ORGJURIS'];
		?>

		<option value="<?php echo $idCatOrgJuris ?>"><?php echo $mostrar['NOM_ORGJURIS'];?>

	</option>

	<?php
}
?>


<td><?php echo $mostrar['NOM_ORGJURIS']; ?></td>
<td><?php echo $mostrar['NOMB_JUZ_MAGIS']; ?></td>
<td><?php echo $mostrar['NOM_PUESTO_JM']; ?></td>
<td><?php echo $mostrar['SIGLAS_ORGJURIS']; ?></td>

<?php
