<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		var salida="";
		var x=1;
		var d="";
		
		$(document).on('click','#agregar', function(){
			                       	var articulo=document.getElementById("art").value;
									var cantidad=document.getElementById("cant").value;
									var valor=document.getElementById("val").value;
									if (articulo!="" && cantidad!="" && valor!="") {
										d+= '<tr>'+
 										'<td>'+x+'</td>'+
 										'<td>'+articulo+'</td>'+
 										'<td>'+cantidad+'</td>'+
 										'<td>'+valor+'</td>'+
 										'</tr>';

	 									$("#tabla").append(d);
	 									salida+=articulo+"@"+cantidad+" @"+valor+",";
	 									document.cookie ='variable='+salida;
	 									x=x+1;
	 									d="";
	 									document.getElementById("salida").value=salida;
	 									document.getElementById("art").value="";
	 									document.getElementById("cant").value="";
										document.getElementById("val").value="";
	 			                        $("#tabla").append(d);
	 			                        
									} else {
										alert("No puedes dejar campos vacios");
									}
			 						
		});

	</script>
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
	      <form class="form-horizontal" method="POST" action="inicio.php" >

	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdCliente1">

	    <div role="tabpanel">
	      	<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" data-toggle="tab" role="tab" style="color: black;">Factura</a></li>
			  <li role="presentation"><a style="color: black;" href="#tab2" aria-controls="tab2" data-toggle="tab" role="tab" >Paquetes</a></li>
			  <li role="presentation"><a style="color: black;" href="#tab3" aria-controls="tab3" data-toggle="tab" role="tab" >Articulos</a></li>
			</ul>
	      	
	      	<div class="tab-content"> 
		      	<div role="tabpanel" class="tab-pane active" id="tab1">
					<div class="box-body">
				        <div class="form-group col-md-12 mb-3">
				        				<fieldset disabled>
				        					<div class="col-md-6 mb-3">
											<br>
											<label>Número Factura:</label>
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
				        	<h2>Datos del paquete</h2>						
				        	
				        		<div class="col-md-3 mb-3">
									<br>
									<label>Numero Paquete:</label>
									<input type="text" class="form-control is-valid" id="nPaquete" name="nPaquete" placeholder="" required="" readonly="readonly">
								</div>	
				        	
							
							<div class="col-md-3 mb-3">
								<br>
								<label>Largo:</label>
								<input type="text" class="form-control is-valid" id="lPaquete" name="lPaquete" placeholder="" required="">
							</div>

							<div class="col-md-3 mb-3">
								<br>
								<label>Alto:</label>
								<input type="text" class="form-control is-valid" id="aPaquete" name="aPaquete" placeholder="" required="">
							</div>

							<div class="col-md-3 mb-3">
								<br>
								<label>Ancho:</label>
								<input type="text" class="form-control is-valid" id="anPaquete" name="anPaquete" placeholder="" required="">
							</div>

							<div class="col-md-6 mb-3">
								<br>
								<label>Peso:</label>
								<input type="text" class="form-control is-valid" id="pPaquete" name="pPaquete" placeholder="" required="">
							</div>
						</div>
				        <div class="modal-footer">
				        	<br>
				        	<button type="button" id="updatePaquete" class="btn btn-primary">Guardar Cambios</button>
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					    </div>
					</div>
				</div>

				<div role="tabpanel" class="tab-pane" id="tab3">
					<div class="box-body">
				        <div class="form-group col-md-12 mb-1">
				        	<h1>Lista de Articulos</h1>
							<div class="col-sm-offset-0 col-md-12" id="tablaArticulo" style='padding-top: 10px'>
	                        </div>
						</div>
						
						<div class="form-group">
								<div class="col-md-12">
									<p>Si hay objetos no registrados por favor registrelos.</p>
								</div>
							
								<div class="col-md-4 mb-1">
									<br>
									<input type="text" name="art" id="art"  class="form-control is-valid" placeholder="Artículo">
							    </div>
							    <div class="col-md-4 mb-1">
									<br>
									<input type="text"  name="cant" id="cant"  class="form-control is-valid" placeholder="Cantidad">
							    </div>
							    <div class="col-md-4 mb-3">
									<br>
									<input type="text" name="val" id="val"  class="form-control is-valid" placeholder="Valor">
									<input type="hidden" name="salida" id="salida">
							    </div>
								<div class="col-md-4 mb-3" style="margin-left: 30%;">
									<br>
									<button type="button" id="agregar" class="btn btn-info col-md-12 mb-3">Agregar</button>
							    </div>

								<div class="col-md-12 mb-3 " style="height: 150px; overflow: auto;">
									<br>
									<table id="tabla" class="table table-bordered col-md-8 mb-3">

									  <thead>
									    <tr>
									      <th scope="col">#</th>
									      <th scope="col">Artículo</th>
									      <th scope="col">Cantidad</th>
									      <th scope="col">Valor</th>
									    </tr>
									  </thead>
									  <tbody>
									  </tbody>
									</table>
								</div>
							</div>

				        <div class="modal-footer">
				        	<br>
				        	<button type="submit" class="btn btn-primary">Aceptar</button>
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