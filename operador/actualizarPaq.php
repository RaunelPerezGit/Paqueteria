<?php 
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');

	$clave = $_POST['claveP'];
	$largo = $_POST['largo'];
	$alto  = $_POST['alto'];
	$ancho = $_POST['ancho'];
	$peso  = $_POST['peso'];

	$paquete=new MetodosUsuario();
	$paquete->actualizarPaquete($clave, $largo, $alto, $ancho, $peso);
	
 ?>