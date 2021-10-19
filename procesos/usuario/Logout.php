<?php

$Function=(empty($_POST['functionName'])) ? NULL: $_POST['functionName'];
    
    if ($Function){
        switch($Function){
            case 'delete_session':
                $action=DeleteSession();
            break;
            //Completar....
        }
    } 
    else{
            exit();
    }

    $Response=array("action"=>$action);
    header('Content-type: application/json; charset=utf-8'); 
    echo json_encode($Response);

    function DeleteSession(){
        session_start();
        if (isset($_SESSION['ID_USUARIO'])){
            session_unset();
            session_destroy();
            $action= "Sesión Finalizada";
        } else{
                $action= "No existe";
                //exit():
            }  
        return $action;
    }
?>