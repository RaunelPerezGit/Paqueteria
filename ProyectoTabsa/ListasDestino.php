<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');	
	$elegido=$_POST['elegido'];	
	$usuario=new MetodosUsuario();
	$usuario->getListasDestino($elegido);
?>