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
<div class="modal fade" id="modalAgregarLista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: gray; border-radius: 4px; height: 100px;">
      	<div class="col-sm-12">
      		
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red; font-size: 30px;"><span aria-hidden="true">&times;</span></button>

        	
        	<div class="col-sm-3"><span> <img src="tabsa.png" width="120px" height="50px" ></span></div>

        	<div class="col-sm-offset-1 col-sm-5" >
	        	<div class="col-sm-offset-1">
	        		<h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">LISTA DE ENVIO</h4>
	    		</div>
	    		<div class="col-sm-offset-1">
	        	<p class="modal-title" id="myModalLabel" style="color: white; font-size: 10px;">PAQUETERIA TABSA EXPRESS</p>
	    		</div>
    		</div>
    		<div class="col-offset-sm-3 col-sm-2">
    			<p style="color: white; font-size: 16px;">FOLIO:</p>
    			<small style="color: white; font-size: 14px; border-top: 20px;"><?php 
                    $hoy = getdate();
                    echo $hoy['year']."/ ".$hoy['month']; ?></small>
            </div>
    		
      	</div>
      </div>
        

      <div class="modal-body">
	      <form class="form-horizontal" action="consultaLista.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<div class="col-md-12" style="padding-bottom: 20px;">
	      		<div>
		      		<div class="col-sm-offset-1 col-sm-8">
						<label for="validationServer01" style="padding-top: 20px;">Ingrese el destino</label>
							<input type="text" class="form-control is-valid" id="destiny" placeholder="Destino" required>
					</div>

					<div class="col-sm-3" style="padding-top: 45px; padding-bottom: 10px;">
						<a href='#' id='verListasEnvio' class='btn btn-default'>Ver facturas disponibles</a>
					</div>
				</div>

				<div class="col-sm-offset-0 col-sm-12">
				<div class="col-sm-offset-0 col-sm-6">
					<div class="col-sm-offset-0 col-md-10" id="datosFacturaDisponible" style='padding-top: 60px; height: 150px; overflow:'>
					</div>
				</div>

				<div class="col-sm-6  " style="height: 250px; overflow: auto; padding-top: 63px;">
									<br>
									<table id="tabla" class="table table-bordered col-md-8 mb-3">

									  <thead>
									    <tr>
									      <th scope="col">Número</th>
									      <th scope="col">Servicio</th>
									      <th scope="col">Tipo de servicio</th>
									    </tr>
									  </thead>
									  <tbody>
									  </tbody>
									</table>
				</div>
				<div class="col-md-6 mb-3">
					<br>
					<input type="hidden" class="form-control is-valid" name="listaFac" id="listaFac" required="">
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
