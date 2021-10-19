<?php

    require_once "../../clases/Gestor.php";
    $Gestor=new Gestor();
    
    $idExpediente=$_POST['ID_EXPEDIENTE'];
    
    session_start();
    $idUsuario=$_SESSION['idUsuario'];
    
    $nombreArchivo= $Gestor->obtenerNombreArchivo($idExpediente);
    
   $rutaEliminar='../../archivos/'.$idUsuario.'/'.$nombreArchivo;
    
    	if (unlink($rutaEliminar)) {
    		echo $Gestor->eliminarRegistroArchivo($idExpediente);
    	}else{
    		echo 0;
    	}
?>

