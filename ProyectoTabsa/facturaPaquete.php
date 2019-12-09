

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript">
		var salida="";
		function habilitar(valor){
			if (valor=='Documento') {
				document.getElementById("art").disabled=true;
				document.getElementById("cant").disabled=true;
				document.getElementById("val").disabled=true;
				document.getElementById("largo").disabled=true;
				document.getElementById("alto").disabled=true;
				document.getElementById("ancho").disabled=true;
				document.getElementById("peso").disabled=true;
				document.getElementById("peso1").disabled=true;
				document.getElementById("agregar").disabled=true;
				document.getElementById("canT").disabled=true;
				document.getElementById("valt").disabled=true;
			}else{
				document.getElementById("art").disabled=false;
				document.getElementById("cant").disabled=false;
				document.getElementById("val").disabled=false;
				document.getElementById("largo").disabled=false;
				document.getElementById("alto").disabled=false;
				document.getElementById("ancho").disabled=false;
				document.getElementById("peso").disabled=false;
				document.getElementById("peso1").disabled=false;
				document.getElementById("agregar").disabled=false;
				document.getElementById("canT").disabled=false;
				document.getElementById("valt").disabled=false;
			}
		}
		var x=1;
		var d="";
		

		function calcular(){
			var largo=document.getElementById("largo").value;
			var alto=document.getElementById("alto").value;
			var ancho=document.getElementById("ancho").value;
			peso=((largo*alto*ancho)/500);
			document.getElementById("peso").value=peso;
		}
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
	 			                        totalCant();
	 			                        totalVal();	
									} else {
										alert("No puedes dejar campos vacios");
									}
			 						
		});

		function totalCant(){
			cantidad=document.getElementById("salida").value;
			var total=0;
			res=cantidad.split(",");
			for (var i = 0; i < res.length-1; i+=1) {
              	var res1=res[i].split("@");
              	//alert(res1[1])
				var x=parseInt(res1[1]);
				//alert("x->"+x);
				total=total+x;
            }
            document.getElementById("canT").value=total;
		}

		function totalVal(){
			cantidad=document.getElementById("salida").value;
			//alert(cantidad);
			var total=0;
			res=cantidad.split(",");
			for (var i = 0; i < res.length-1; i+=1) {
              	var res1=res[i].split("@");
				var x=parseInt(res1[2]);
				total=total+x;
            }
            document.getElementById("valt").value=total;
		}

		function calcularTotal(){
			importe=document.getElementById("importe").value;
			seguro=document.getElementById("seguro").value;
			adicional=document.getElementById("adicional").value;
			descuento=document.getElementById("descuento").value;
			var totalFact=parseInt(importe)+parseInt(seguro)+parseInt(adicional)-parseInt(descuento);
			document.getElementById("totalFact").value=totalFact;
		}

	</script>
</head>
<body>

	<div class="modal fade" id="modalEditPaquete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" style="width: 80%;" role="document">
    <div class="modal-content">

       <div class="modal-header bg-blue" style="background: gray; border-radius: 4px; height: 100px;">
      	<div class="col-sm-12">
      		
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red; font-size: 30px;"><span aria-hidden="true">&times;</span></button>

        	
        	<div class="col-sm-2"><span> <img src="tabsa.png" width="120px" height="50px" ></span></div>

        	<div class="col-sm-offset-1 col-sm-7" >
	        	<div class="col-sm-offset-0">
	        		<h4 class="modal-title" id="myModalLabel" style="color: black; font-size: 15px; ">FACTURAS DE PAQUETES/DOCUMENTOS</h4>
	    		</div>
	    		<div class="col-sm-offset-0">
	        	<p class="modal-title" id="myModalLabel" style="color: white; font-size: 10px;"><span style="font-size: 16px; color:white;">Sucursal: <?php
		              require_once('InterfazConexion.php');
		              require_once('MetodosUsuario.php'); 
		              $usuario=new MetodosUsuario();
		              $resultado=$usuario->getSucursal();
		              echo $resultado;
		            ?></span>
		        </p>
	    		</div>
    		</div>
    		<div class="col-offset-sm-3 col-sm-1">
    			
    			<p style="color: white; font-size: 14px; border-top: 20px;"><?php 
                    $hoy = getdate();
                    echo $hoy['year']."/ ".$hoy['month']; ?></p>
            </div>
    		
      	</div>
      </div>

      <div class="modal-body">

	<div class="container" style="width: 100%; height: 550px; overflow: auto;">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					
					<div class="panel panel-body col-md-6 mb-3">
						<div class="panel panel-primary">
						<div class="panel panel-heading col-md-12 mb-3">Remitente</div>
						<form class="col-md-12 mb-3 " action="consultaPaquete.php" method="POST">
						<div class="col-md-12 mb-3 ">
							<div class="form-group">
								<div class="col-md-12 mb-3">
								  <br>
								  <div class="col-md-12 mb-3">
								    <div class="input-group">
								      <input type="text" class="form-control" placeholder="Id teléfono" id="telRem">
								      <span class="input-group-btn">
								        <button class="btn btn-default" type="button" id="buscarRem">Buscar</button>
								      </span>
								    </div><!-- /input-group -->
								  </div><!-- /.col-lg-6 -->
								</div><!-- /.row -->
								<div class="col-md-6 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="nombreR" name="nombreR" placeholder="Nombre" required="">
								</div>
								<div class="col-md-6 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="apellidosR" name="apellidosR" placeholder="Apellidos" required="">
								</div>
								<div class="col-md-6 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="telefonoR" name="telefonoR" placeholder="Teléfono" required="">
								</div>

								<div class="col-md-12 mb-3"><label style="padding-top: 20px;">Domicilio:</label></div>
								<div class="col-md-6 mb-3">
									<input type="text" class="form-control is-valid" id="estadoR" name="estadoR" placeholder="Estado" required="">
								</div>
								<div class="col-md-6 mb-3">
									<input type="text" class="form-control is-valid" id="ciudadR" name="ciudadR" placeholder="Ciudad" required="">
								</div>
								<div class="col-md-8 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="direccionR" name="direccionR" placeholder="Dirección" required="">
								</div>
								<div class="col-md-4 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="cpCodR" name="cpCodR" placeholder="C.P." required="">
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-body col-md-6 mb-3">
					<div class="panel panel-primary">
						<div class="panel panel-heading col-md-12 mb-3">Destinatario</div>
						<div class="col-md-12 mb-3 ">
							<div class="form-group">
								<div class="col-md-12 mb-3">
								  <br>
								  <div class="col-md-12 mb-3">
								    <div class="input-group">
								      <input type="text" class="form-control" placeholder="Id teléfono" id="telDes">
								      <span class="input-group-btn">
								        <button class="btn btn-default" type="button" id="buscarDes">Buscar</button>
								      </span>
								    </div><!-- /input-group -->
								  </div><!-- /.col-lg-6 -->
								</div><!-- /.row -->
								<div class="col-md-6 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="nombreD" name="nombreD" placeholder="Nombre" required="">
								</div>
								<div class="col-md-6 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="apellidosD" name="apellidosD" placeholder="Apellidos" required="">
								</div>
								<div class="col-md-6 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="telefonoD" name="telefonoD" placeholder="Teléfono" required="">
								</div>

								<div class="col-md-12 mb-3"><label style="padding-top: 20px;">Domicilio:</label></div>
								<div class="col-md-6 mb-3">
									
									<input type="text" class="form-control is-valid" id="estadoD" name="estadoD" placeholder="Estado" required="">
								</div>
								<div class="col-md-6 mb-3">
									
									<input type="text" class="form-control is-valid" id="ciudadD" name="ciudadD" placeholder="Ciudad" required="">
								</div>
								<div class="col-md-8 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="direccionD" name="direccionD" placeholder="Dirección" required="">
								</div>
								<div class="col-md-4 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="cpCodD" name="cpCodD" placeholder="C.P." required="">
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="panel panel-body col-md-12 mb-3" >
					<div class="panel panel-primary">
						<div class="panel panel-heading col-md-12 mb-3">Paquete</div>
							<div class="col-md-3 mb-3 ">
							<div class="form-group">
								
								<div class="col-md-12 mb-3">
								  <label>Servicio:</label>
								  <select class="form-control form-control-sm" name="tipo" id="tipo" onchange="habilitar(this.value);">
								  	<option value="Paquete">Paquete</option>
								  	<option value="Documento">Documento</option>
								  </select>
								</div>

								<div class="col-md-12 mb-3">
								  <br>
								  <label>Tipo de Servicio:</label>
								  <select class="form-control form-control-sm" id="servicio" name="servicio">
								  	<option value="regular">Regular</option>
								  	<option value="urgente">Urgente</option>
								  </select>
								</div>

								<div class="col-md-12 mb-3">
								  <br>
								  <label>Tipo de entrega:</label>
								  <select class="form-control form-control-sm" name="lugar">
								  	<option>Oficina</option>
								  	<option>Domicilio</option>
								  </select>
								</div>
								<div class="col-md-12 mb-4">
								  <br>
								  <?php
								  require_once('InterfazConexion.php');
					              require_once('MetodosUsuario.php'); 
					              $usuario=new MetodosUsuario();
					              $resultado=$usuario->getFecha();
								   ?>
								  <label>Fecha Inicio:</label>
								  <input class="form-control form-control-sm" type="text" name="fethSal" value="<?php /*$fecha=getdate(time()); $dia=cal_days_in_month(0, $fecha['mon'], $fecha['year']); echo $dia.'/'.$fecha['month'].'/'.$fecha['year'];*/
								  //echo date('d-m-y',strtotime($resultado));
								  setlocale(LC_ALL, "es_ES");
								  echo strftime("%d/%m/%Y"); ?>">
								</div>
								<div class="col-md-12 mb-4">
								  <br>
								  <label>Fecha de entrega:</label>
								  <input class="form-control form-control-sm" type="date" name="fethEnt">
								</div>

							</div>
						    </div>

						    <div class="col-md-3 mb-3 ">
							<div class="form-group">
							
								<div class="col-md-12 mb-3">
									<br>
									<input type="text" name="art" id="art"  class="form-control is-valid" placeholder="Artículo">
							    </div>
							    <div class="col-md-6 mb-3">
									<br>
									<input type="text"  name="cant" id="cant"  class="form-control is-valid" placeholder="Cantidad">
							    </div>
							    <div class="col-md-6 mb-3">
									<br>
									<input type="text" name="val" id="val"  class="form-control is-valid" placeholder="Valor">
									<input type="hidden" name="salida" id="salida">
							    </div>
								<div class="col-md-12 mb-3">
									<br>
									<button type="button" id="agregar" class="btn btn-info col-md-12 mb-3">Agregar detalles</button>
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
									   <!-- <tr>
											<td><input type="text" name="articulo[]" style="width:50px;"></td>
 
		   									<td><input type="text" name="cantidad[]" style="width:50px;"></td> 
 
											<td><input type="text" name="valor[]" style="width:50px;"></td> 
										</tr> -->
									  </thead>
									  <tbody>
									  </tbody>
									</table>
								</div>

								<div class="col-md-6 mb-3 ">
									<label>Cantidad total:</label>
									<input type="text" class="form-control is-valid" name="canT" onfocus="totalCant();" placeholder="0" required="" id="canT">
								</div>

								<div class="col-md-6 mb-3 ">
									<label>Valor total:</label>
									<input type="text" class="form-control is-valid" name="valt" onfocus="totalVal();" placeholder="0.00" required="" id="valt">
								</div>


							</div>
						    </div>

						    <div class="col-md-3 mb-3 ">
							<div class="form-group">
								
								<div class="col-md-12 mb-3 ">
								<label>Paquete</label>
							    </div>

								<div class="col-md-12 mb-3 ">
									<br>
									<input type="number" id="largo" class="form-control is-valid" name="largo" placeholder="Largo (cm)" required="">
								</div>
								<div class="col-md-12 mb-3">
									<br>
									<input type="number" id="alto" class="form-control is-valid" name="alto" placeholder="Alto (cm)" required="">
								</div>
								<div class="col-md-12 mb-3">
									<br>
									<input type="number" id="ancho" class="form-control is-valid" name="ancho" placeholder="Ancho (cm)" required="">
								</div>
								<div class="col-md-12 mb-3">
									<br>
									<input type="number" id="peso" step="0.001" class="form-control is-valid" name="peso" onfocus="calcular();" placeholder="Peso vol." required="">
								</div>
								<div class="col-md-12 mb-3">
									<br>
									<input type="text" id="peso1" class="form-control is-valid" name="peso1" placeholder="Peso físico (kg)" required="">
								</div>


							</div>
						    </div>

						    <div class="col-md-3 mb-3 " >
							<div class="form-group">
								
								<div class="col-md-12 mb-3 ">
								<label>Pago</label>
							    </div>

								<div class="col-md-12 mb-3">
								  <label>Tipo de pago:</label>
								  <select class="form-control form-control-sm" name="pago">
								  	<option>Efectivo</option>
								  	<option>Cheque</option>
								  	<option>Tarjeta</option>
								  </select>
								</div>

								<div class="col-md-12 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="importe"  name="importe" placeholder="Importe" required="">
								</div>
								<div class="col-md-12 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="seguro" name="seguro" placeholder="Costo de seguro" required="">
								</div>
								<div class="col-md-12 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="adicional" name="adicional" placeholder="Pago adicional" required="">
								</div>
								<div class="col-md-12 mb-3">
									<br>
									<input type="text" class="form-control is-valid" id="descuento" name="descuento" placeholder="Descuento" required="">
								</div>
								<div class="col-md-2 mb-3">
									<br>
									<label>Total:</label>
								</div>
								<div class="col-md-10 mb-3">
									<br>
									<input type="text" class="form-control is-valid" name="total" id="totalFact" placeholder="0.00"  onfocus="calcularTotal();" required="">
								</div>
								<div class="col-md-12 mb-3">
									<br>
									<button type="submit" class="btn btn-info col-md-12 mb-3">Guardar factura</button>
							    </div>
							</div>
						    </div>
						   
						   
						</form>

					</div>
				</div>
			</div>
			
			</div>
			
			
		</div>
		
		
	</div>

	 </div> 
    </div>
  </div>
</div>

	
</body>
</html>