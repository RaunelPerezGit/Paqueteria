<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');	
	$proveedor=new MetodosUsuario();
	if (isset($_POST['tel_prov'])) {
		$telefono=$_POST['tel_prov'];
		$result=$proveedor->buscarProveedor($telefono);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
	} else {
		$proveedor->listarProveedor();
	}
	
	
?>