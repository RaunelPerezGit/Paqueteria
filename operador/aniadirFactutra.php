<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	if (isset($_POST['folio'])) {
			
		$factura=$_POST['folio'];	
		$usuario=new MetodosUsuario();
		$usuario->addFacturaViaje($factura);

	} else {
		if (isset($_POST["num_fact"])) {
			$factura=$_POST['num_fact'];	
			$usuario=new MetodosUsuario();
			$usuario->addFactura($factura);
		}else{
			$viaje=new MetodosUsuario();
			$viaje->listarViaje();
		}
		
	}
	
?>