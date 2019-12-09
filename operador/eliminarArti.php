<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	
	$clavePaq = $_POST['claveP'];
	$cantidad = $_POST['cantidad'];
	$precio   = $_POST['precio'];
	$paquete  = $_POST['paquete'];
	$articulo=new MetodosUsuario();
	$articulo->eliminarArticulo($clavePaq, $cantidad, $precio, $paquete);
?>