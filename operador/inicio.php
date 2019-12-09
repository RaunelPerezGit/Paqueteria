
<?php
require_once('InterfazConexion.php');
require_once('MetodosUsuario.php');
// Notificar solamente errores de ejecución

error_reporting(E_ERROR | E_WARNING | E_PARSE);


$paquete=new MetodosUsuario();
if (isset($_POST['salida'])) {
	$arreglo = explode(",", $_POST['salida']);
	$paquete->fijarMasArticulos($arreglo, $_POST['nPaquete']);
	unset($_POST['salida']);
	header("Location: http://localhost/operador/inicio.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Paquetes pendientes</title>
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" type="image/gif/png" href="tabsa.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">    
    <link rel="stylesheet" href="bootstrap/css/custom.css">

</head>
<body>
	<?php
	include("menuTabsa.php");
	?>
	
	<div class="col-sm-offset-6 col-sm-6 col-sm-offset-3 col-m-4" style="padding-top: 20px; ">
		<form class="form-inline">
			<div class="col-sm-offset-2 col-sm-10">
			    <div class="form-group has-success has-feedback  col-sm-9">
			      <div class="col-sm-3 col-m-1">
				  <label class="control-label" for="inputGroupSuccess1" style="padding-top: 15px;">Factura</label>
				  </div>
				  <div class="input-group col-sm-9 col-m-11">
				    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
				    <input type="text" class="form-control" id="cajaBuscarFactura" aria-describedby="inputGroupSuccess1Status" placeholder="Buscar">
				  </div>
			    </div>
		  	</div>
		</form>
	</div>

	<div class="col-sm-offset-1 col-md-9" id="datosFactura" style="width: 80%; height: 400px; overflow: auto; margin-top: 30px;">	
	</div>


	<?php include("verMasFactura.php") ?>
	<script src="consulta.js"></script>
</body>
</html>