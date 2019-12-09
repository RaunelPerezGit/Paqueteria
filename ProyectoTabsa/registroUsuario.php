
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	<script type="text/javascript">
		function habilitar(valor){
			var tipo=document.getElementById("tipoUsuario").value;
			if (tipo=="Cliente") {
				document.getElementById("calidad").disabled=false;
			} else {
				document.getElementById("calidad").disabled=true;
			}

		}
	</script>
<div class="modal fade" id="modalEditUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-m" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #3F6699; border-radius: 3px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white;">USUARIO</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="consultaUsuario.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdUsuario">
	      	
			<div class="box-body">
		        <div class="form-group col-md-12 mb-3">

		        				
		        				<div class="col-md-6 mb-3">
		        				  <br>
								  <label>Tipo de usuario:</label>
								  <select class="form-control form-control-sm" name="tipoUsuario" id="tipoUsuario" onchange="habilitar(this.value);">
								  	<option value="Cliente">Cliente</option>
								  	<option value="Conductor">Conductor</option>
								  </select>
								</div>
								<div class="col-md-6 mb-3">
		        				  <br>
								  <label>Clasificación:</label>
								  <select class="form-control form-control-sm" name="calidad" id="calidad" >
								  	<option value="Preferencial">Preferencial</option>
								  	<option value="Normal">Normal</option>
								  </select>
								</div>

								<div class="col-md-6 mb-3">
									<br>
									<label>Nombre:</label>
									<input type="text" class="form-control is-valid" id="nombre" name="nombre" placeholder="Nombre" required="">
								</div>
								<div></div>
								<div class="col-md-6 mb-3">
									<br>
									<label>Apellidos:</label>
									<input type="text" class="form-control is-valid" id="apellidos" name="apellidos" placeholder="Apellidos" required="">
								</div>
								<div class="col-md-4 mb-3">
									<br>
									<label>Teléfono:</label>
									<input type="text" class="form-control is-valid" id="telefono" name="telefono" placeholder="Teléfono" required="">
								</div>
								<div class="col-md-8 mb-3">
									<br>
									<label>Correo:</label>
									<input type="e-mail" class="form-control is-valid" id="correo" name="correo" placeholder="Correo" required="">
								</div>
								<div class="col-md-4 mb-3">
									<br>
									<label>Contraseña:</label>
									<input type="password" class="form-control is-valid" id="password" name="password" placeholder="Contraseña" required="">
								</div>
								<div class="col-md-12 mb-3">
									<br>
									<h3> Domicilio</h3>
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


<div class="modal fade" id="modalModUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-m" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #3F6699; border-radius: 3px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white;">USUARIO</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="consultaUsuario.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdUsuario">
	      	
			<div class="box-body">
		        <div class="form-group col-md-12 mb-3">
		        				<div class="col-md-12 mb-3">
		        				  <input type="hidden" name="idUser" id="idUser">
								</div>

								<div class="col-md-6 mb-3">
									<br>
									<label>Nombre:</label>
									<input type="text" class="form-control is-valid" id="nombre1" name="nombre1" placeholder="Nombre" required="">
								</div>
								<div></div>
								<div class="col-md-6 mb-3">
									<br>
									<label>Apellidos:</label>
									<input type="text" class="form-control is-valid" id="apellidos1" name="apellidos1" placeholder="Apellidos" required="">
								</div>
								<div class="col-md-4 mb-3">
									<br>
									<label>Teléfono:</label>
									<input type="text" class="form-control is-valid" id="telefono1" name="telefono1" placeholder="Teléfono" required="">
								</div>
								<div class="col-md-8 mb-3">
									<br>
									<label>Correo:</label>
									<input type="e-mail" class="form-control is-valid" id="correo1" name="correo1" placeholder="Correo" required="">
								</div>
								<div class="col-md-4 mb-3">
									<br>
									<label>Contraseña:</label>
									<input type="hidden" class="form-control is-valid" id="password1" name="password1" placeholder="Contraseña" required="">
								</div>
								<div class="col-md-12 mb-3">
									<br>
									<h3> Domicilio</h3>
									<br>
								</div>
								<div class="col-md-6 mb-3">
									<label>Estado:</label>
									<input type="text" class="form-control is-valid" id="estado1" name="estado1" placeholder="Estado" required="">
								</div>
								<div class="col-md-6 mb-3">
									<label>Ciudad:</label>
									<input type="text" class="form-control is-valid" id="ciudad1" name="ciudad1" placeholder="Ciudad" required="">
								</div>
								<div class="col-md-9 mb-3">
									<br>
									<label>Direccion:</label>
									<input type="text" class="form-control is-valid" id="direccion1" name="direccion1" placeholder="Dirección" required="">
								</div>
								<div class="col-md-3 mb-3">
									<br>
									<label>C.P:</label>
									<input type="text" class="form-control is-valid" id="cpCod1" name="cpCod1" placeholder="C.P." required="">
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

<!--<body  data-target="#navbar-example" >
	<div class="modal fade" id="modalEditUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="container"  style="width: 100%; height: 650px; overflow: auto;">
		<div class="row">
			<div class="col-md-10 col-sm-offset-2">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Usuario</div>
					<div class="panel panel-body">
						<form class="col-md-12 mb-3 ">
							<div class="form-group">
								<div class="col-md-6 mb-3">
									<label>Nombre:</label>
									<input type="text" class="form-control is-valid" name="" placeholder="Nombre" required="">
								</div>
								<div class="col-md-6 mb-3">
									<label>Apellidos:</label>
									<input type="text" class="form-control is-valid" name="" placeholder="Apellidos" required="">
								</div>
								<div class="col-md-3 mb-3">
									<label>Telefono</label>
									<input type="text" class="form-control is-valid" name="" placeholder="Telefono" required="">
								</div>
								<div class="col-md-9 mb-3">
									<label>Correo</label>
									<input type="e-mail" class="form-control is-valid" name="" placeholder="Correo" required="">
								</div>
								<div class="col-md-4 mb-3">
									<label>Contraseña</label>
									<input type="password" class="form-control is-valid" name="" placeholder="Contraseña" required="">
								</div>
								<<div><label style="padding-top: 20px;">Domicilio:</label></div>
								<
								<div class="col-md-12 mb-3">
									<br>
									<h3> Domicilio</h3>
									<br>
								</div>
								<div class="col-md-6 mb-3">
									<label>Estado:</label>
									<input type="text" class="form-control is-valid" name="" placeholder="Estado" required="">
								</div>
								<div class="col-md-6 mb-3">
									<label>Ciudad:</label>
									<input type="text" class="form-control is-valid" name="" placeholder="Ciudad" required="">
								</div>
								<div class="col-md-9 mb-3">
									<label>Colonia:</label>
									<input type="text" class="form-control is-valid" name="" placeholder="Colonia" required="">
								</div>
								<div class="col-md-3 mb-3">
									<label>C.P:</label>
									<input type="text" class="form-control is-valid" name="" placeholder="C.P." required="">
								</div>
								<div class="col-md-10 mb-3">
									<label>Calle:</label>
									<input type="text" class="form-control is-valid" name="" placeholder="Calle" required="">
								</div>
								<div class="col-md-9 mb-3">
									<label>Orientación:</label>
									<input type="text" class="form-control is-valid" name="" placeholder="Orientación" required="">
								</div>
								<div class="col-md-3 mb-3">
									<label>Número:</label>
									<input type="text" class="form-control is-valid" name="" placeholder="Núm" required="">
								</div>
								<div class="col-md-3 mb-3" style="margin-left: 70%; display: inline-block;">
									<br>
									<button type="button" class="btn btn-primary">Agregar Usuario</button>
								</div>

							</div>
						</form>					    
					</div>
					
				</div>
					
			</div>
			
			
		</div>
		
		
	</div>
	</div>	
</body>-->

</body>
</html>