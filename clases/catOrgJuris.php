<?php

require_once "Conexion.php";

class Categorias extends Conectar{
	
	public function agregarCatOrgJuris($datos){
		$conexion = Conectar::conexion();

		$sql = "INSERT INTO CAT_ORG_JURIS 
										(NOM_ORGJURIS, 
										NOMB_JUZ_MAGIS, 
										NOM_PUESTO_JM, 
										SIGLAS_ORGJURIS, 
										FK_INSTANCIA) 
						VALUES (?,?,?,?,?)";

		$query = $conexion->prepare($sql);
		$query->bind_param("ssssi",  $datos['nombreOrgJuris'],
									 $datos['jm'],
									 $datos['puesto'],
									 $datos['siglas'],
									 $datos['fk_instancia']);
		$respuesta=$query->execute();
		$query->close();

		return $respuesta;


	}

	public function eliminarCatOrgJuris($ID_ORGJURIS){
		$conexion=Conectar::conexion();

		$sql="DELETE FROM CAT_ORG_JURIS
				WHERE ID_ORGJURIS =?";

		$query=$conexion->prepare($sql);
		$query->bind_param('i',$ID_ORGJURIS);
		$respuesta = $query->execute();
		$query->close();
		return $respuesta;
	}
}

?>

