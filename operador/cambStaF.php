<?php 
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');

	$claveA=$_POST['claveF'];
	$factura=new MetodosUsuario();
	$factura->cambiarEstadoArticulo($claveA);
	
 ?>