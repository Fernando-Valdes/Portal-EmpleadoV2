<?php

require_once "Conexion.php";

class Usuario extends Conectar{

	public function agregarUsuario($datos){
		$conexion=Conectar::conexion();

		//Si el usuario existe retorna 2
		if (self::buscarUsuarioRepetido($datos['email'])) {
			return 2;
		}else{ //de otro modo inserta el usuario NUEVO

			$sql = "INSERT INTO USUARIO (nombre,
			apellidos,
			email,
			contrasena,
			fk_orgjuris) 
			VALUES (?,?,?,?,?)";

			$query = $conexion->prepare($sql);
		//Los parametros son obtenidos del arreglo
			$query->bind_param("ssssi", 
										$datos['nombre'],
										$datos['apellidos'],
										$datos['email'],
										$datos['password'],
										$datos['organoJuris']);


			$exito=$query->execute();
			$query->close();

			return $exito;

		}

	}

	public function buscarUsuarioRepetido($email){
		$conexion= Conectar::conexion();

		$sql= "SELECT email 
				FROM USUARIO
				WHERE email='$email'";

		$result= mysqli_query($conexion, $sql);

		$datos=mysqli_fetch_array($result);

		//Si los datos obtenidos no están vacíos o si los datos obtenidos en la consulta son igual al dato ingresado en $email ($_POST['email'] devolverá 1...

		if ($datos!="" || $datos==$email) {
			return 1;
		}else{
			return 0;
		}
	}

	public function login($email,$password){
		$conexion= Conectar::conexion();

		$sql= "SELECT count(*) as existeUsuario
				FROM USUARIO
				WHERE EMAIL='$email' 
				AND CONTRASENA = '$password'";

		$result = mysqli_query($conexion, $sql);

		$respuesta= mysqli_fetch_array($result)['existeUsuario'];

		if ($respuesta > 0) {
			$_SESSION['email'] = $email;

			$sql= "SELECT ID_USUARIO
				FROM USUARIO
				WHERE EMAIL='$email' 
				AND CONTRASENA = '$password'";

		$result = mysqli_query($conexion, $sql);
		$idUsuario = mysqli_fetch_row($result)[0];


			$_SESSION['idUsuario'] = $idUsuario;

			return 1;
		}else{
			return 0;
		}
	}
}

?>