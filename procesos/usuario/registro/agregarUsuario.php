<?php

require_once "../../../clases/Usuario.php";

$password=sha1($_POST['password']);
$organoJuris=$_POST['organoJuris'];
//Usuario $rolUser=2;
//Administrador $rolUser=1;

$datos = array(
			'nombre'=>$_POST['nombre'],
			'apellidos'=>$_POST['apellidos'], 
			'email'=>$_POST['email'], 
			'password'=>$password,
			'organoJuris'=>$organoJuris
			);

$usuario = new Usuario();
echo $usuario->agregarUsuario($datos);

?>
