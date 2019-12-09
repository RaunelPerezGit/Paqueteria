<?php
//require_once("clases/Conexion.php");
//require_once("clases/IngresarLogin.php");
//$loginA=new Login();
//$loginA->login();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista de Envio</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php
	include("menuTabsa.php");
	?>
	<div class="container">
		<div class="row">
			<!--<div class="col-md-4"></div>-->
			<div class="col-md-8 col-sm-offset-3">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Lista de envío</div>
					<div class="panel panel-body">
						<form>
							  <div class="row">
							    <div class="col-md-6 mb-3">
							      <label for="validationServer01">Ingrese la factura</label>
							      <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Factura" required>
							      
							    </div>

							    <div class="col-md-6 mb-3">
							      <label for="validationServer02">Ingrese el vehículo</label>
							      <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Vehículo" required>
							      
							  </div>
							  <div class="row">
							    <div class="col-md-6 mb-3">
							      <label for="validationServer03">Ciudad</label>
							      <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="Ciudad" required>
							      
							    </div>
							    <div class="col-md-3 mb-3">
							      <label for="validationServer04">Estado</label>
							      <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="Estado" required>
							      
							    </div>
							    
							  </div>
							  <br>
							  <button class="btn btn-primary" type="submit">Agregar factura</button>
							</div>
							</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

<script>

(function() {
  'use strict';

  window.addEventListener('load', function() {
    var form = document.getElementById('needs-validation');
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  }, false);
})();
</script>
</body>
</html>