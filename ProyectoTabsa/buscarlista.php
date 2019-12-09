<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	if (isset($_POST['folio'])) {
		# code...
	} else {
		$lista=new MetodosUsuario();
		$lista->listarLista();
	}
	
	
?>