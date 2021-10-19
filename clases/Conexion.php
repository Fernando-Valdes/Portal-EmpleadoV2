<?php

class Conectar 
	{
	 public function conexion(){
// Create connection
	 	$servidor="162.241.61.148";
	 	$usuario="tachiapa_verspub";
	 	$password='Chiapas2021TA&%$';
	 	$bd="tachiapa_verspub";

		$conexion = mysqli_connect($servidor,
									$usuario,
									$password,
									$bd);

		return $conexion;

	}

}

?>
