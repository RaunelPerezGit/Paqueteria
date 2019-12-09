<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	if (isset($_POST['placas'])) {
		$placas=$_POST['placas'];
		$vehiculo=new MetodosUsuario();
		$vehiculo->eliminarVehiculo($placas);
	} else {
		$telefono=$_POST['tel_usu'];
		$usuario=new MetodosUsuario();
		$usuario->eliminarUsuario($telefono);
	}
	
	

?>