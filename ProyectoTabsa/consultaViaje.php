<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	if (isset($_POST['origenRuta'])) {
		$origen=$_POST['origenRuta'];
		$destino=$_POST['destino'];
		$listaRuta=$_POST['listaRuta'];
		$datos=array($origen,$destino,$listaRuta);
		$ruta=new MetodosUsuario();
		$ruta->registrarRuta($datos);
	} else {
		if (isset($_POST['destino'])) {
			$origen=$_POST['origen'];
			$destino=$_POST['destino'];
			$ruta=$_POST['ruta'];
			$conductor=$_POST['conductor'];
			$vehiculo=$_POST['vehiculo'];
			$listaFactura=$_POST['listaPac'];
			$datos=array($origen,$destino,$ruta,$conductor,$vehiculo,$listaFactura);
			$viaje=new MetodosUsuario();
			$viaje->insertarViaje($origen,$destino,$ruta,$conductor,$vehiculo,$listaFactura);
			echo $origen.$destino.$conductor.$vehiculo.$ruta."lista".$listaFactura;
								# code...
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Viajes</title>
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" type="image/gif/png" href="tabsa.png">
</head>
<body>
	<?php
	include("menuTabsa.php");
	?>
	<div style="margin-top: 15px;" scope='col' class="col-md-6 col-sm-offset-6">
		<a href='' id='agregarViaje' data-toggle='modal' data-target='#modalAgregarViaje' class='btn btn-success'>Nuevo viaje</a>
	</div>


	<div class="col-sm-offset-6 col-sm-6 col-sm-offset-3 col-m-4" style="padding-top: 20px; ">
		<form class="form-inline">
			<div class="col-sm-offset-2 col-sm-10">
			    <div class="form-group has-success has-feedback  col-sm-9">
			      <div class="col-sm-3 col-m-2">
				  <label class="control-label" for="inputGroupSuccess1" style="padding-top: 15px;">Viaje</label>
				  </div>
				  <div class="input-group col-sm-9 col-m-11">
				    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
				    <input type="text" class="form-control" id="cajaBuscarViaje" aria-describedby="inputGroupSuccess1Status" placeholder="Buscar">
				  </div>
			    </div>
		  	</div>
		</form>
	</div>

	<div class="col-sm-offset-2 col-md-9" id="datosViaje" style="width: 80%; height: 400px; overflow: auto; margin-top: 30px;">
				
	</div>




	<?php include("agregarViaje.php") ?>
	<script src="consulta.js"></script>
</body>
</html>

