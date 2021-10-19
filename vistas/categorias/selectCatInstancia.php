<?php

session_start();

function getLista(){

require_once "../../clases/Conexion.php";

$c = new Conectar();
$conexion=$c->conexion();
$Orgjuris =$_POST['Orgjuris'];

$sql="SELECT ID_INSTANCIA, NOM_INSTANCIA
FROM CAT_ORG_JURIS
INNER JOIN CAT_INSTANCIA ON FK_INSTANCIA = ID_INSTANCIA
WHERE ID_ORGJURIS = $Orgjuris";

$html="<option selected disabled='disabled'>Seleccionar una Instancia</option>";
$result=mysqli_query($conexion,$sql);

while($rowsub = $result->fetch_assoc())
{
	$html.= "<option value='".$rowsub['ID_INSTANCIA']."'>".$rowsub['NOM_INSTANCIA']."</option>";
}
      return $html;
  } 

   echo getLista();
?>