<?php
require_once "../../../clases/SettingPDO.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        header("Content-Type: application/json");
        $array_devolver=[];
        $email = strtolower($_POST['email']);
        $nombre = ucwords(strtolower($_POST['nombre']));
        $apellido = ucwords(strtolower($_POST['apellido']));
        $org_juris = $_POST['org_juris'];
        $token = $_POST['codigo'];
        $rol_usuario="2";

    function validar_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($nombre)) {
        $array_devolver['error'] = "Nombre es requerido";
        }else {
        $nombre_valido = validar_input($nombre);
        }
    if (empty($apellido)) {
        $array_devolver['error'] = "Apellido es requerido";
        }else {
        $apellido_valido = validar_input($apellido);
        }
    if (empty($org_juris)) {
            $array_devolver['error'] = "El campo organo jurisdiccional es requerido";
            }else {
            $orgjuris_valido = validar_input($org_juris);
            }   
    if (empty($email)) {
        $array_devolver['error'] = "Email es requerido";
        }else {
            $email_valido = validar_input($email);
            if (!filter_var($email_valido, FILTER_VALIDATE_EMAIL)) {
                $array_devolver['error']= "Formato de email invalido";
            }
        } 

        $buscar_user = $con->prepare("SELECT * FROM USUARIO WHERE email = :email LIMIT 1");
        $buscar_user->bindParam(':email', $email_valido, PDO::PARAM_STR);
        $buscar_user->execute();

    if($buscar_user->rowCount() == 1){
        $array_devolver['error'] = "Este correo ya se encuentra registrado";
        $array_devolver['is_login']= false;
    }else{
        //CONSULTAMOS EL TOKEN
        $buscar_token = $con->prepare("SELECT id_token, token
                                        FROM TOKEN WHERE token = :token AND activo= 1");
        $buscar_token->bindParam(':token', $token, PDO::PARAM_STR);
        $buscar_token->execute();
        
            if($buscar_token->rowCount() == 1){//SI EL TOKEN EXISTE
                                $token = $buscar_token->fetch(PDO::FETCH_ASSOC);
                                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                //Creamos el codigo de activacion
                                //$activacion = md5(uniqid(rand(),true));
                                
                                $nuevo_user = $con->prepare("INSERT INTO USUARIO(nombre,apellidos,email,contrasena,fk_orgjuris) 
                                VALUE (:nombre, :apellidos, :email, :password,:fk_org_juris)");
                                $nuevo_user->bindParam(':email', $email_valido, PDO::PARAM_STR);
                                $nuevo_user->bindParam(':password', $password, PDO::PARAM_STR);
                                $nuevo_user->bindParam(':nombre', $nombre_valido, PDO::PARAM_STR);
                                $nuevo_user->bindParam(':apellidos', $apellido_valido, PDO::PARAM_STR);
                                //$nuevo_user->bindParam(':activacion', $activasion, PDO::PARAM_STR);
                                $nuevo_user->bindParam(':fk_org_juris', $orgjuris_valido, PDO::PARAM_INT);
                                $nuevo_user->execute();


                                //ACTUALIZAR TOKEN A INCATIVO
                                $id_token = $token ['id_token'];
                                $update_token =  $con->prepare("UPDATE TOKEN 
                                                                SET activo = 0
                                                                WHERE id_token = :id_token");
                                $update_token->bindParam(':id_token', $id_token, PDO::PARAM_STR);
                                $update_token->execute();
                                
                                
                                //$_SESSION['user_id']= (int) $user_id;
                                $array_devolver['redirect']= './index.php'; 
                                //$array_devolver['is_login']= false;
                                $array_devolver['success']=true;
    
            }else{
                //EL TOKEN NO EXISTE
                $array_devolver['error'] = "El c&oacutedigo de registro es inv&aacutelido";
            }
                
            
    }
    echo json_encode($array_devolver);
}else{
    //exit("!ACCESO DENEGADO¡");
    exit(header("location: ../../../index.php"));
}
?>