<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	$destino=$_POST['destino'];	
	$usuario=new MetodosUsuario();
	$usuario->facturasParaListaEnvio($destino);
?>
