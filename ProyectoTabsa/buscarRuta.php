<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');	
	$origeDes=$_POST['origenDestino'];	
	$usuario=new MetodosUsuario();
	$usuario->getRutas($origeDes);
?>