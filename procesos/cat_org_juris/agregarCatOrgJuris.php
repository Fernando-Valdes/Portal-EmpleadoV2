<?php

	session_start();

	require_once"../../clases/catOrgJuris.php";

	$categorias= new Categorias();


	$datos= array(
		'idUsuario'=>$_SESSION['idUsuario'],
		'nombreOrgJuris'=>$_POST['nombreOrgJuris'],
		'jm'=>$_POST['jm'],
		'puesto'=>$_POST['puesto'],
		'siglas'=>$_POST['siglas'],
		'fk_instancia'=>$_POST['fk_instancia']
	);

	echo $categorias->agregarCatOrgJuris($datos);

?>