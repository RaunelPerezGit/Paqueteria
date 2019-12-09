<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	$usuario=new MetodosUsuario();
	if (isset($_POST['tel_usu'])) {
		$telefono=$_POST['tel_usu'];
		$result=$usuario->buscarUser($telefono);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
	} else {
		if (isset($_POST['telefono'])) {
			$telefono=$_POST['telefono'];
			$result=$usuario->getUserFact($telefono);
		} else {
			$usuario->listarUsuario();
		}
		
	}
	
?>