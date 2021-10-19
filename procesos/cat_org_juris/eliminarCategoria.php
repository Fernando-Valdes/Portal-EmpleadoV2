<?php

session_start();
require_once "../../clases/catOrgJuris";

$Categorias = new Categorias();

echo $Categorias->eliminarCatOrgJuris($_POST['ID_ORGJURIS']);

?>