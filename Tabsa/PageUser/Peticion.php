<!DOCTYPE html>
<html>
<head>
	<title>Temporal</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet">

	<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/tabsa.js"></script>
</head>
<body>
	<center class="mb-5">
		<img src="img/tabsa.png">
	</center>
	<div class="container">
			<center>
				<div class="form-group" style="padding: 5%">
					<label><?php echo("<b>Nombre: </b>".$_GET['name']); ?></label> <br>
					<label><?php echo("<b>Telefono: </b>".$_GET['phone']); ?></label> <br>
					<label><?php echo("<b>Direccion: </b>".$_GET['address']); ?></label> <br>
					<label><?php echo("<b>Correo: </b>".$_GET['mail']); ?></label> <br>
					<label><i><b>Si todos sus tados son correctos de clic en aceptar<br>Para procesar su solicitud.</b></i></label> <br>

					<label id="nGuia" style="display:none;"><?php echo($_GET['numguia']); ?></label>
					<button type="button" class="btn btn-success" value="aceptar" name="aceptarG" id="aceptarG">Aceptar</button>
				</div>	
			</center>

	</div>
	
</body>
</html>