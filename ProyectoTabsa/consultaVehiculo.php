<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
		if(isset($_POST['placas'])){
		$placas=$_POST['placas'];
		$modelo=$_POST["modelo"];
		$marca=$_POST["marca"];
		$capacidad=$_POST["capacidad"];
		$datos=array($modelo,$marca,$placas,$capacidad);
		$vehiculo=new MetodosUsuario();
		$vehiculo->registrarVehiculo($datos);
		//$usuario->listarUsuario();
		}elseif (isset($_POST['placas1'])) {
			$idVeh=$_POST['idVeh'];
			$modelo1=$_POST['modelo1'];
			$marca1=$_POST['marca1'];
			$placas1=$_POST['placas1'];
			$capacidad1=$_POST['capacidad1'];
			$datos=array($idVeh,$modelo1,$marca1,$placas1,$capacidad1);
			$vehiculo=new MetodosUsuario();
			$vehiculo->modificarVehiculo($datos);
		}
		
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vehículos</title><meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" type="image/gif/png" href="tabsa.png">
</head>
<body>
	<?php
	include("menuTabsa.php");
	?>
	<div style="margin-top: 15px;" scope='col' class="col-md-6 col-sm-offset-6">
		<a href='' id='agregarUsuario' data-toggle='modal' data-target='#modalVehiculo' class='btn btn-success'>Agregar</a>
		
	</div>
<div class="input-group col-sm-4 col-m-11 col-sm-offset-4">
		<br>		
</div>

<div class="input-group col-sm-4 col-m-11 col-sm-offset-4">
	
				 <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
				    <input type="text" class="form-control" id="cajaBusquedaVehiculo" aria-describedby="inputGroupSuccess1Status" placeholder="Buscar">
</div>			
<div class="col-sm-offset-2 col-md-9" id="datosVehiculo" style="width: 80%; height: 400px; overflow: auto; margin-top: 30px;">
				
	</div>

<?php include("registroVehiculo.php") ?>


</body>
</html>