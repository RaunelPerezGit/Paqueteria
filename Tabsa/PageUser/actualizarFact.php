<?php 
	require_once('Conexion.php');
	require_once('FuncionesBdd.php');

	$guia = $_POST['guia'];
	
	$factura=new Funciones();
	$factura->actualizarFactura($guia);
	
 ?>