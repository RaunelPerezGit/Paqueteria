<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
		if(isset($_POST['monto'])){
			$tipo=$_POST['tipo'];
			$tipo1=$_POST['tipo1'];
			$monto=$_POST['monto'];
			$datos=array($tipo,$tipo1,$monto);
			$usuario=new metodosUsuario();
			$usuario->registrarTarifa($datos);
			//$usuario->listarUsuario();
		}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>


<div class="modal fade" id="modalEditTarifa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #334252; border-radius: 4px; height: 70px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">TARÍFA</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="registrarTarifa.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdTarifa">
 
					<div class="box-body">
				        <div class="form-group col-md-12 mb-3">

										<div class="col-md-6 mb-3">
										  <br>
										  <label>Servicio:</label>
										  <select class="form-control form-control-sm" name="tipo">
										  	<option>Paquete</option>
										  	<option>Documento</option>
										  </select>
										</div>
										<div class="col-md-6 mb-3">
										  <br>
										  <label>Tipo de Servicio:</label>
										  <select class="form-control form-control-sm" name="tipo1">
										  	<option>Express</option>
										  	<option>Rápido</option>
										  	<option>Regular</option>
										  </select>
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Monto:</label>
											<input type="text" class="form-control is-valid" name="monto" placeholder="$0.00" required="">
										</div>
											
										
						</div>

				        <div class="modal-footer">
				        	<br>
				        	<button type="submit" id="IdTarifa" class="btn btn-primary">Aceptar</button>
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					    </div>
					</div>

		  </form>
      </div>

      
    </div>
  </div>
</div>

</body>
</html>