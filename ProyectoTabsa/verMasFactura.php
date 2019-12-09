<!--<?php
	/*require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
		if(isset($_POST['nombre'])){
			$nombre=$_POST['nombre'];
			$nombreusu=$_POST['nombreusu'];
			$password=sha1($_POST['passwd']);//encriptacion de la contraseña
			$apellidos=$_POST["apellidos"];
			$telefono=$_POST["telefono"];
			$correo=$_POST["correo"];
			$datos=array($nombre,$nombreusu,$password,$apellidos,$telefono,$correo);
			$usuario=new metodosUsuario();
			//$usuario->actualizarCliente($datos);
			//$usuario->listarUsuario();
		}*/

?>-->


<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<div class="modal fade" id="modalVerMasFactura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #334252; border-radius: 4px; height: 70px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">FACTURA</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="verMasFactura.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdCliente1">

	    <div role="tabpanel">
	      	<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" data-toggle="tab" role="tab" style="color: black;">Factura</a></li>
			  <li role="presentation"><a style="color: black;" href="#tab2" aria-controls="tab2" data-toggle="tab" role="tab" >Paquetes</a></li>
			</ul>
	      	
	      	<div class="tab-content"> 
		      	<div role="tabpanel" class="tab-pane active" id="tab1">
					<div class="box-body">
				        <div class="form-group col-md-12 mb-3">
				        				<fieldset disabled>
				        					<div class="col-md-6 mb-3">
											<br>
											<label>Número factura:</label>
											<input type="text" class="form-control is-valid" id="factura" name="nombre" placeholder="" required="">
										</div>
										<div></div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Remitente:</label>
											<input type="text" class="form-control is-valid" id="remitente" name="apellidos" placeholder="" required="">
										</div>
										<div class="col-md-4 mb-3">
											<br>
											<label>Destinatario:</label>
											<input type="text" class="form-control is-valid" id="destinatario" name="telefono" placeholder="Teléfono" required="">
										</div>
										<div class="col-md-8 mb-3">
											<br>
											<label>Monto:</label>
											<input type="text" class="form-control is-valid" id="monto" name="correo" placeholder="$ 0.00" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Fecha:</label>
											<input type="text" class="form-control is-valid" id="fecha" name="passwd" placeholder="YYYY/MM/DD" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Servicio:</label>
											<input type="text" class="form-control is-valid" id="servicio" name="nombreusu" placeholder="" required="">
										</div>
				        				</fieldset>
										
										
										
						</div>

				        <div class="modal-footer">
				        	<br>
				        	<button type="submit" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					    </div>
					</div>
				</div>

				<div role="tabpanel" class="tab-pane" id="tab2">
					<div class="box-body">
				        <div class="form-group col-md-12 mb-3">

				        				<h1>Lista de paquetes</h1>
										
										<div class="col-sm-offset-0 col-md-12" id="tablaPaquete" style='padding-top: 30px'>
				
	                        			</div>
										
						</div>

				        <div class="modal-footer">
				        	<br>
				        	<button type="submit" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					    </div>
					</div>
				</div>

			</div>
		</div>
		  </form>
      </div>

      
    </div>
  </div>
</div>


</body>
</html>