<?php

class Conectar 
	{
	 public function conexion(){
// Create connection
	 	$servidor="192.168.1.224";
	 	$usuario="portal-empleado";
	 	$password='TA2021&%$';
	 	$bd="siga_administrativo";

		$conexion = mysqli_connect($servidor,
									$usuario,
									$password,
									$bd);

		return $conexion;

	}
}
?>
