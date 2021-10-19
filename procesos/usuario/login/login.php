<?php
session_start();
require_once "../../../clases/Usuario.php";

$email = $_POST['login'];
$password = sha1($_POST['password']);

$usuarioObj = new Usuario();
echo $usuarioObj->login($email, $password);


?>