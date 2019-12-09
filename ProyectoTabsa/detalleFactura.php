
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	<div class="modal fade" id="modalListaD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-m" role="document">
    		<div class="modal-content">

      <div class="modal-header bg-blue" style="background: #3F6699; border-radius: 3px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white;">VEHICULO</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="consultaVehiculo.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdUsuario">
	      	
			<div class="box-body">
		        <div class="form-group col-md-12 mb-3">

								<div class="col-md-6 mb-3">
									<br>
									<label>Modelo:</label>
									<input type="text" class="form-control is-valid" name="modelo" placeholder="Modelo" required="">
								</div>
								<div></div>
								<div class="col-md-6 mb-3">
									<br>
									<label>Marca:</label>
									<input type="text" class="form-control is-valid" name="marca" placeholder="Marca" required="">
								</div>
								<div class="col-md-4 mb-3">
									<br>
									<label>Placas:</label>
									<input type="text" class="form-control is-valid" name="placas" placeholder="Placas" required="">
								</div>
								
								<div class="col-md-8 mb-3">
									<br>
									<label>Capacidad volumétrica:</label>
									<input type="number" class="form-control is-valid" name="capacidad" placeholder="Capacidad volumétrica" required="">
								</div>
								
							</div>

		        <div class="modal-footer">
		        	<br>
		        	<button type="submit" class="btn btn-primary">Aceptar</button>
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			    </div>
			</div>
		  </form>
      </div>

      
    		</div>
  		</div>
	</div>
	<script src="consulta.js"></script>  
</body>
</html>