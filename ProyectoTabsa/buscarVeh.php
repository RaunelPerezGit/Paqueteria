<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');	
	$vehiculo=new MetodosUsuario();
	if (isset($_POST['placas'])) {
		$placas=$_POST['placas'];
		$result=$vehiculo->buscarVeh($placas);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
	} else {
		if (isset($_POST['tel_prov'])) {
			$telefonoProv=$_POST['tel_prov'];
			$vehiculo->eliminarProveedor($telefonoProv);
		} else {
			$vehiculo->listarVehiculo();
		}
		
		
	}
	
	
?>