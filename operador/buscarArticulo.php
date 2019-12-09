<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	
	$factura=$_POST['num_fact'];
	$usuario=new MetodosUsuario();
	$usuario->listarArticulo($factura);
?>