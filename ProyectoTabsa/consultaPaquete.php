
<?php
require_once('InterfazConexion.php');
require_once('MetodosUsuario.php');
$factura=new MetodosUsuario();
if (isset($_POST['salida'])) {
	$nombreR =$_POST['nombreR'];
	$apellidosR =$_POST['apellidosR'];
	$telefonoR=$_POST['telefonoR'];
	$estadoR= $_POST['estadoR'];
	$ciudadR= $_POST['ciudadR'];
	$direccionR =$_POST['direccionR'];
	$codigoR=$_POST['cpCodR'];
	$nombreD =$_POST['nombreD'];
	$apellidosD =$_POST['apellidosD'];
	$telefonoD=$_POST['telefonoD'];
	$estadoD =$_POST['estadoD'];
	$ciudadD =$_POST['ciudadD'];
	$direccionD =$_POST['direccionD'];
	$codigoD=$_POST['cpCodD'];
	$tipo=$_POST['tipo'];//si es paquete o documento
	$servicio=$_POST['servicio'];//si es regular etc
	$lugar=$_POST['lugar'];
	$renglones=$_POST['salida'];
	$canT=$_POST['canT'];
	$valT=$_POST['valt'];
	$largo=$_POST['largo'];
	$alto=$_POST['alto'];
	$ancho=$_POST['ancho'];
	$pesoV=$_POST['peso'];
	$pesoF=$_POST['peso1'];
	$pago=$_POST['pago'];
	$importe=$_POST['importe'];
	$seguro=$_POST['seguro'];
	$adicional=$_POST['adicional'];
	$descuento=$_POST['descuento'];
	$total=$_POST['total'];
	$fechEnt=$_POST['fethEnt'];
	$datosRemitente=array($nombreR,$apellidosR,$telefonoR,$estadoR,$ciudadR,$direccionR,$codigoR);
	$datosDestinatario=array($nombreD,$apellidosD,$telefonoD,$estadoD,$ciudadD,$direccionD,$codigoD);
	$datosFactura=array($importe,$descuento,$total,$tipo,$servicio,$pago,$fechEnt);
	$datosPaquete=array($largo,$alto,$ancho,$pesoV,$pesoF,$valT,$canT,$renglones);
	$factura->agregarFactura($datosRemitente,$datosDestinatario,$datosFactura,$datosPaquete);
	$tipo1='Documento';
	//$s=strcmp($tipo, $tipo1);
	//echo $s;
	if (strcmp($tipo, $tipo1) === 0 ) {
		#...
		//echo "es documento";
	} else {
		//echo "es paquete";
		

	}
	
	$valor=$_POST['salida'];
	/*for ($i = 0; $i < count($valor); $i++) {
		echo $valor[$i];
	}*/
	
	//header('location:consultaPaquete.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Paquetes</title>
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" type="image/gif/png" href="tabsa.png">
</head>
<body>
	<?php
	include("menuTabsa.php");
	?>
	<div style="margin-top: 15px;" scope='col' class="col-md-6 col-sm-offset-6">
		<a href='' id='agregarUsuario' data-toggle='modal' data-target='#modalEditPaquete' class='btn btn-success'>Agregar</a>
	</div>


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

	<div class="col-sm-offset-2 col-md-9" id="datosFactura" style="width: 80%; height: 400px; overflow: auto; margin-top: 30px;">
				
	</div>




	<?php include("verMasFactura.php") ?>
	<?php include("facturaPaquete.php") ?>
	<script src="consulta.js"></script>
</body>
</html>