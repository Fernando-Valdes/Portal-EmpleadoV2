<?php

session_start();

function getLista(){

require_once "../../clases/Conexion.php";

$c = new Conectar();
$conexion=$c->conexion();

$idCatInstancia = $_POST['Instancia'];

$sql="SELECT ID_SUBINSTANCIA, NOM_SUBINSTANCIA
FROM CAT_SUB_INSTANCIA
WHERE FK_INSTANCIA =$idCatInstancia";

$result=mysqli_query($conexion,$sql);

$html="";

while($rowsub = $result->fetch_assoc())
{
	$html.= "<option value='".$rowsub['ID_SUBINSTANCIA']."'>".$rowsub['NOM_SUBINSTANCIA']."</option>";
}
      return $html;
  } 

   echo getLista();
?>