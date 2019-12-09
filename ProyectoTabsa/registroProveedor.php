
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<div class="modal fade" id="modalProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-m" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #3F6699; border-radius: 3px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white;">PROVEEDOR</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="consultaProveedor.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdUsuario">
	      	
			<div class="box-body">
		        <div class="form-group col-md-12 mb-3">
								<div class="col-md-6 mb-3">
									<br>
									<label>Compañía:</label>
									<input type="text" class="form-control is-valid" id="nombreC" name="nombreC" placeholder="Compañía" required="">
								</div>
								<div class="col-md-6 mb-3">
									<br>
									<label>Nombre del contacto:</label>
									<input type="text" class="form-control is-valid" id="contacto" name="contacto" placeholder="Nombre del contacto" required="">
								</div>
								<div class="col-md-6 mb-3">
									<br>
									<label>Cargo del contacto:</label>
									<input type="text" class="form-control is-valid" id="cargo" name="cargo" placeholder="Cargo" required="">
								</div>
								<div class="col-md-6 mb-3">
									<br>
									<label>Teléfono:</label>
									<input type="text" class="form-control is-valid" id="telefono" name="telefono" placeholder="Teléfono" required="">
								</div>
								<div></div>
								<div class="col-md-12 mb-3">
									<br>
									<h3>Dirección</h3>
									<br>
								</div>
								<div class="col-md-6 mb-3">
									<label>Estado:</label>
									<input type="text" class="form-control is-valid" id="estado" name="estado" placeholder="Estado" required="">
								</div>
								<div class="col-md-6 mb-3">
									<label>Ciudad:</label>
									<input type="text" class="form-control is-valid" id="ciudad" name="ciudad" placeholder="Ciudad" required="">
								</div>
								<div class="col-md-9 mb-3">
									<br>
									<label>Dirección:</label>
									<input type="text" class="form-control is-valid" id="direccion" name="direccion" placeholder="Dirección" required="">
								</div>
								<div class="col-md-3 mb-3">
									<br>
									<label>C.P.:</label>
									<input type="text" class="form-control is-valid" id="cpCod" name="cpCod" placeholder="C.P." required="">
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


<div class="modal fade" id="modalModProv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-m" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #3F6699; border-radius: 3px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white;">USUARIO</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="consultaProveedor.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdUsuario">
	      	
			<div class="box-body">
		        <div class="form-group col-md-12 mb-3">
		        				<div class="col-md-6 mb-3">
									<br>
									<label>Compañia:</label>
									<input type="hidden" class="form-control is-valid" id="cveProv" name="cveProv" placeholder="Compañía" required="">
									<input type="text" class="form-control is-valid" id="nombreC1" name="nombreC1" placeholder="Compañía" required="">
								</div>
								<div class="col-md-6 mb-3">
									<br>
									<label>Nombre del Contacto:</label>
									<input type="text" class="form-control is-valid" id="contacto1" name="contacto1" placeholder="Nombre del contacto" required="">
								</div>
								<div class="col-md-6 mb-3">
									<br>
									<label>Cargo del Contacto:</label>
									<input type="text" class="form-control is-valid" id="cargo1" name="cargo1" placeholder="Cargo" required="">
								</div>
								<div class="col-md-6 mb-3">
									<br>
									<label>Telefono:</label>
									<input type="text" class="form-control is-valid" id="telefonoP1" name="telefonoP1" placeholder="Teléfono" required="">
								</div>
								<div></div>
								<div class="col-md-12 mb-3">
									<br>
									<h3> Direccion</h3>
									<br>
								</div>
								<div class="col-md-6 mb-3">
									<label>Estado:</label>
									<input type="text" class="form-control is-valid" id="estadoP1" name="estadoP1" placeholder="Estado" required="">
								</div>
								<div class="col-md-6 mb-3">
									<label>Ciudad:</label>
									<input type="text" class="form-control is-valid" id="ciudadP1" name="ciudadP1" placeholder="Ciudad" required="">
								</div>
								<div class="col-md-9 mb-3">
									<br>
									<label>Direccion:</label>
									<input type="text" class="form-control is-valid" id="direccionP1" name="direccionP1" placeholder="Dirección" required="">
								</div>
								<div class="col-md-3 mb-3">
									<br>
									<label>C.P:</label>
									<input type="text" class="form-control is-valid" id="cpCodP1" name="cpCodP1" placeholder="C.P." required="">
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