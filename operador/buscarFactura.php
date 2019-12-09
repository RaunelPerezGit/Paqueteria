<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');	
	$usuario=new MetodosUsuario();
	$usuario->listarFactura();
?>