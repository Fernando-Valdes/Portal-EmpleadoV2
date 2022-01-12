<?php
require_once "../../../clases/SettingPDO.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        header("Content-Type: application/json");
        $array_devolver=[];
        $email = strtolower($_POST['email']);
        $enlace = $_POST['enlace'];
       

        function validar_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (empty($enlace)) {
            $array_devolver['error'] = "Enlace requerido";
            }
        if (empty($email)) {
            $array_devolver['error'] = "Email es requerido";
            }else {
                $email_valido = validar_input($email);
                if (!filter_var($email_valido, FILTER_VALIDATE_EMAIL)) {
                    $array_devolver['error']= "Formato de email invalido";
                }
            } 

            $buscar_user = $con->prepare("SELECT * FROM empleado WHERE correo_electronico = :email OR fk_enlace=:enlace LIMIT 1");
            $buscar_user->bindParam(':email', $email_valido, PDO::PARAM_STR);
            $buscar_user->bindParam(':enlace', $enlace, PDO::PARAM_STR);
            $buscar_user->execute();

            if($buscar_user->rowCount() == 1){
                $array_devolver['error'] = "El correo o número de enlace ya se encuentran registrados";
                $array_devolver['is_login']= false;
            }else{

                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                //Creamos el codigo de activacion
                //$activacion = md5(uniqid(rand(),true));
                
                $nuevo_user = $con->prepare("INSERT INTO empleado(correo_electronico, contrasena, fk_enlace) 
                VALUES (:email, :password, :enlace)");
                $nuevo_user->bindParam(':email', $email_valido, PDO::PARAM_STR);
                $nuevo_user->bindParam(':password', $password, PDO::PARAM_STR);
                $nuevo_user->bindParam(':enlace', $enlace, PDO::PARAM_STR);
                $nuevo_user->execute();

                //$_SESSION['user_id']= (int) $user_id;
                $array_devolver['redirect']= './index.php'; 
                //$array_devolver['is_login']= false;
                $array_devolver['success']=true;
            }
            echo json_encode($array_devolver);

        }else{
        //exit("!ACCESO DENEGADO�0�3");
        exit(header("location: ../../../index.php"));
    }
?>