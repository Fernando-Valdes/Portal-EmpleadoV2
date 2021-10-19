<?php
//session_start();

require_once "Conexion.php";

class Gestor extends Conectar{
	public function agregarRegistroArchivo($datosRegistroArchivo){
		$conexion=Conectar::conexion();
		$sql="INSERT INTO EXPEDIENTE 	(NUM_EXPEDIENTE,
										FECHA_PUBLICACION,
										NOMBRE_ARCHIVO,
										TIPO,
										RUTA,
										FK_ORGJURIS,
										FK_USUARIO,
										FK_INSTANCIA,
										FK_SUBINSTANCIA)
			VALUES (?,?,?,?,?,?,?,?,?)";

		$query=$conexion->prepare($sql);

		$query->bind_param("sssssiiii", $datosRegistroArchivo['num_expediente'],
			$datosRegistroArchivo['fecha_publicacion'],
			$datosRegistroArchivo['nombre_archivo'],
			$datosRegistroArchivo['tipoArchivo'],
			$datosRegistroArchivo['rutaAlmacenamiento'],
			$datosRegistroArchivo['fk_orgJuris'],
			$datosRegistroArchivo['fk_usuario'],
			$datosRegistroArchivo['fk_instancia'],
			$datosRegistroArchivo['fk_subinstancia']
		);


		$respuesta=$query->execute();
		$query->close();


		return $respuesta;

	}

	public function obtenerNombreArchivo($idExpediente){
		$conexion=Conectar::conexion();
		$sql="SELECT NOMBRE_ARCHIVO 
				FROM EXPEDIENTE 
				WHERE ID_EXPEDIENTE='$idExpediente'";
		$result=mysqli_query($conexion,$sql);
		return mysqli_fetch_array($result)['NOMBRE_ARCHIVO'];
	}

	public function eliminarRegistroArchivo($idExpediente){
		$conexion=Conectar::conexion();
		$sql="DELETE 
				FROM EXPEDIENTE 
				WHERE ID_EXPEDIENTE=?";
		$query=$conexion->prepare($sql);
		$query->bind_param('i',$idExpediente);
		$respuesta=$query->execute();
		$query->close();
		return $respuesta;
	}

	public function obtenerRutaArchivo($idExpediente)
	{
	$conexion=Conectar::conexion();
		$sql="SELECT RUTA,TIPO
				FROM EXPEDIENTE 
				WHERE ID_EXPEDIENTE='$idExpediente'";
		$result=mysqli_query($conexion,$sql);
		$datos=mysqli_fetch_array($result);
		$NOMBRE_ARCHIVO=$datos['RUTA'];
		$extension=$datos['TIPO'];
		return self::tipoArchivo($NOMBRE_ARCHIVO,$extension);

	}

	public function tipoArchivo($NOMBRE_ARCHIVO,$extension)
	{
		//$idUsuario=$_SESSION['idUsuario'];
		$ruta=$NOMBRE_ARCHIVO;

		
			return '<embed src="'.$ruta. '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px"/>'; 
		
	}
}

?>