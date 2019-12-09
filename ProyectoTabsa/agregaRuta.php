<!DOCTYPE html>
<html>
<head>
	<title></title>


<script type="text/javascript">
		var num=1;
		var renglon="";
		var salida="";
		$(document).on('click','#addRuta', function(){
			
			var _puntoStop=document.getElementById("puntoStop").value;
			if(_puntoStop===""){
				alert("Se requiere que ingrese una ciudad en el punto de parada.");
			}else{
			 renglon+= '<tr>'+
 				'<td>'+num+'</td>'+
 				'<td>'+_puntoStop+'</td>'+
 				'</tr>';
 			$("#tablaRuta").append(renglon);
 			salida+=_puntoStop+",";
 			num=num+1;
 			renglon="";
 			document.getElementById("puntoStop").value="";
 			document.getElementById("listaRuta").value=salida;
 			}	
		});


$(document).on('click','#ver', function(){
		var tabla2 = document.getElementById("tablaRuta");
		alert(tabla2);
		var tdsTabla2 = tabla2.getElementsByTagName("tr");
		var i =0;
		for (i=0; i<tdsTabla2.length; i++){
		//alert(tdsTabla2[i]);
		}
});



</script>




</head>
<body>
<div class="modal fade" id="modalAgregarRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 110px;">
  <div class="modal-dialog modal-m" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: gray; border-radius: 4px; height: 100px;">
      	<div class="col-sm-12">
      		
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red; font-size: 30px;"><span aria-hidden="true">&times;</span></button>

        	
        	<div class="col-sm-3"><span> <img src="tabsa.png" width="120px" height="50px" ></span></div>

        	<div class="col-sm-offset-1 col-sm-5" >
	        	<div class="col-sm-offset-1">
	        		<h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">RUTAS</h4>
	    		</div>
	    		<div class="col-sm-offset-1">
	        	<p class="modal-title" id="myModalLabel" style="color: white; font-size: 10px;">PAQUETERIA TABSA EXPRESS</p>
	    		</div>
    		</div>
    		<br>
    		<div class="col-offset-sm-1 col-sm-2">
    			<small style="color: white; font-size: 14px; border-top: 20px;"><?php 
                    $hoy = getdate();
                    echo $hoy['year']."/".$hoy['month']; ?></small>
            </div>
    		
      	</div>
      </div>
        

      <div class="modal-body">
	      <form class="form-horizontal" action="consultaViaje.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<div class="col-md-12" style="padding-bottom: 20px;">
	      		<div>

	      			<div class="col-sm-offset-0 col-sm-6">
						<label for="validationServer01" style="padding-top: 20px;">Origen</label>
							<input value="" type="text" class="form-control is-valid" name="origenRuta" id="validationServer01" placeholder="Origen" required>
					</div>
					<div class="col-sm-offset-0 col-sm-6">
						<label for="validationServer01" style="padding-top: 20px;">Destino</label>
							<input type="text" class="form-control is-valid" name="destino" id="validationServer01" placeholder="Destino" requiered>
					</div>
					<div class="col-sm-offset-0 col-sm-9">
						<label for="validationServer01" style="padding-top: 20px;">Punto de parada: </label>
						<input type="text" class="form-control is-valid" id="puntoStop" placeholder="">
					</div>

					

					<div class="col-sm-3" style="padding-top: 45px; padding-bottom: 10px;">
						<a href='#' id='addRuta' class='btn btn-info'>Agregar</a>
					</div>

					<div class="col-sm-3" style="padding-top: 45px; padding-bottom: 10px;">
						<a href='#' id='ver' class='btn btn-info'>Ver</a>
					</div>

					<div class="col-md-12 mb-3 " style="height: 150px; overflow: auto;">
						<br>
						<input type="hidden" name="listaRuta" id="listaRuta">
						<table id="tablaRuta" class="table table-bordered col-md-8 mb-3">

							<thead>
							<tr>
								<th scope="col">Número</th>
								<th scope="col">Ciudad</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>

				<div class="col-sm-offset-0 col-sm-11">
					<div class="col-sm-offset-1 col-md-11" id="datosPuntosRuta" style='padding-top: 40px'>
					</div>
				
				</div>

	      	</div>
	      	</div>

	    
	      	
	      	
	      	<div class="modal-footer">
				<br>
				<button type="submit" class="btn btn-primary">Aceptar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		
		  </form>
      </div>

      
    </div>
  </div>
</div>
</body>
</html>
