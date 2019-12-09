<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	if(isset($_POST['nombreC'])){
		$nombreC=$_POST['nombreC'];
		$contacto=$_POST['contacto'];
		$cargo=$_POST['cargo'];
		$telefono=$_POST['telefono'];
		$estado=$_POST['estado'];
		$ciudad=$_POST['ciudad'];
		$direccion=$_POST['direccion'];
		$cpCod=$_POST['cpCod'];
		$datos=array($nombreC,$contacto,$cargo,$telefono,$estado,$ciudad,$cpCod,$direccion);
		$proveedor=new MetodosUsuario();
		$proveedor->registrarProveedor($datos);
	}elseif (isset($_POST['nombreC1'])) {
		$nombreC1=$_POST['nombreC1'];
		$contacto1=$_POST['contacto1'];
		$cargo1=$_POST['cargo1'];
		$telefono1=$_POST['telefonoP1'];
		$estado1=$_POST['estadoP1'];
		$ciudad1=$_POST['ciudadP1'];
		$direccion1=$_POST['direccionP1'];
		$cpCod1=$_POST['cpCodP1'];
		$cveProv=$_POST['cveProv'];
		$datos=array($nombreC1,$contacto1,$cargo1,$telefono1,$estado1,$ciudad1,$cpCod1,$direccion1,$cveProv);
		$proveedor=new MetodosUsuario();
		$proveedor->modificarProveedor($datos);
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Proveedores</title><meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" type="image/gif/png" href="tabsa.png">
</head>
<body>
	<?php
	include("menuTabsa.php");
	?>
	<div style="margin-top: 15px;" scope='col' class="col-md-6 col-sm-offset-6">
		<a href='' id='agregarProveedor' data-toggle='modal' data-target='#modalProveedor' class='btn btn-success'>Agregar</a>
	</div>
<div class="input-group col-sm-4 col-m-11 col-sm-offset-4">
		<br>		
</div>
<div class="input-group col-sm-4 col-m-11 col-sm-offset-4">
				 <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
				    <input type="text" class="form-control" id="cajaBusquedaProveedor" aria-describedby="inputGroupSuccess1Status" placeholder="Buscar">
</div>
<div class="col-sm-offset-2 col-md-9" id="datosProveedor" style="width: 80%; height: 400px; overflow: auto; margin-top: 30px;">
				
	</div>
<?php include("registroProveedor.php"); ?>


</body>
</html>