<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="Bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="Bootstrap/js/funciones.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-danger">
					<div class="panel panel-heading">Registrar Administrador</div>
					<div class="panel panel-body">
						<form id="frmRegistrarA">
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" name="nombre">
							<label>Apellidos</label>
							<input type="text" class="form-control input-sm" name="apellido">
							<label>Correo electrónico</label>
							<input type="text" class="form-control input-sm" name="correo">
							<label>Teléfono</label>
							<input type="text" class="form-control input-sm" name="tel">
							<label>Contraseña</label>
							<input type="text" class="form-control input-sm" name="contrasena">
							<p></p>
							<span class="btn btn-primary btn-sm" id="registroA">Registrar</span>
							<a href="formularioLogin.php" class="btn btn-default btn-sm">Login</a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#registroA').click(function(){
			vacios=validarFormVacio('frmRegistrarA');
			if (vacios>0) {
				alert('Necesitas llenar todos los campos');
				return false;
			}
			datos=$('#frmRegistrarA').serialize();
			alert(datos);
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarAdm.php",
				success:function(r){
					alert(r);
					if (r>0) {
						alert("Agregado con exito");
					}else{
						alert("Fallo al agregar");
					}
				}
			});
		});
	});
</script>