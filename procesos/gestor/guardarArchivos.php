<?php

    session_start();

    require_once "../../clases/Gestor.php";
    $Gestor=new Gestor();

    //echo $resultado; //haciendo este echo estas respondiendo la solicitud ajax

    $idUsuario=$_SESSION['idUsuario'];

    $num_expediente=$_POST['num_expediente'];
    $f_publicacion=$_POST['f_publicacion'];
    $tamañoArchivo=$_FILES['archivoSentencia']['size'];

    $catOrgJuris =  $_POST['OrgJuris'];
    $catInstancia =  $_POST['Instancia'];
    $catSubInstancia = $_POST['SubInstancia'];

    $nombre_archivo=$_FILES['archivoSentencia']['name'];

    if(isset($num_expediente,$f_publicacion)) {

        $carpetaUsuario='../../archivos/'.$idUsuario;
       // $carpetaUsuario='https://www.tachiapas.gob.mx/sentencias_publicas/archivos/'.$idUsuario;

        if (!file_exists($carpetaUsuario)) { //Si no existe la carpeta del usuario creala...
            mkdir($carpetaUsuario,0777,true);//0777 por default, el acceso más amplio posible.
        }
        
        $nombre_archivo=$_FILES['archivoSentencia']['name']; //nombre de archivo

        $cadena = $nombre_archivo;
        $cadenaConvert = strtr($cadena," ","_");



        $explode=explode('.', $cadenaConvert); //Separando cadenas usando delimitador "."
        $tipoArchivo=array_pop($explode);//tipo de archivo
        $rutaAlmacenamiento=$_FILES['archivoSentencia']['tmp_name'];
        
        $link='https://www.tachiapas.gob.mx/administrador_sentencias/archivos/'.$idUsuario.'/'.$cadenaConvert;

        $rutaFinal=$carpetaUsuario."/".$cadenaConvert;

        $datosRegistroArchivo=array("num_expediente"=>$num_expediente,
                                    "fecha_publicacion"=>$f_publicacion,
                                    "nombre_archivo"=>$cadenaConvert,
                                    "tipoArchivo"=>$tipoArchivo,
                                    "rutaAlmacenamiento"=>$link,
                                    "fk_orgJuris"=>$catOrgJuris,
                                    "fk_usuario"=>$idUsuario,
                                    "fk_instancia"=>$catInstancia,
                                    "fk_subinstancia"=>$catSubInstancia
                                    );

        if (move_uploaded_file($rutaAlmacenamiento,$rutaFinal)) {
            $respuesta=$Gestor->agregarRegistroArchivo($datosRegistroArchivo);
        }

        echo $respuesta;

    }else{
        echo 0;
    }

?>