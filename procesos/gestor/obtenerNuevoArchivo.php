<?php

    require_once "../../clases/Gestor.php";

    $Gestor=new Gestor();
    $idExpediente=$_POST['ID_EXPEDIENTE'];

    echo $Gestor->obtenerRutaArchivo($idExpediente);

?>