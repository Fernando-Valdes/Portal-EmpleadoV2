<?php
//llamar conexion;
require_once "../../../clases/SettingPDO.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    
    function validar_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    if (empty($email)) {
        $array_devolver['error'] = "Email es requerido";
        }else {
            $email_valido = validar_input($email);
            if (!filter_var($email_valido, FILTER_VALIDATE_EMAIL)) {
                $array_devolver['error']= "Formato de email invalido";
            }
        } 

    // comprobar si el user existe 
    $buscar_user = $con->prepare("SELECT * FROM USUARIO WHERE email = :email LIMIT 1");
    $buscar_user->bindParam(':email', $email_valido, PDO::PARAM_STR);
    $buscar_user->execute();

    if($buscar_user->rowCount() == 1){
        // Existe
        $user = $buscar_user->fetch(PDO::FETCH_ASSOC);
        $user_id = (int) $user['ID_USUARIO'];
        $hash = (string) $user['CONTRASENA'];
        
        if(password_verify($password,$hash)){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['idUsuario']=$user_id;
            $_SESSION['email']=$email;
            $array_devolver['redirect'] ='./vistas/inicio.php';
        }else{
                $array_devolver['error']="Los datos que ingresó no son validos.";
            }

    }else{
      $array_devolver['error']="Los datos que ingresó no son validos.";
      //concatenar ruta . <a href='http://192.168.64.2/webs/login_system/registro.php'>Nuevo cuenta</a>
    }
    echo json_encode($array_devolver);
}else{
        //exit("!ACCESO DENEGADO¡");
        exit(header("location: ../../../index.php"));
}
?>
