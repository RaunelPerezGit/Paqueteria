<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');	
	if(isset($_POST['salida'])){
		$salida=$_POST['salida'];
		$listaR=new MetodosUsuario();
		$resLista=$listaR->getlista($salida);
		echo $salida;
		echo "entre aqui";
		}
							
							//$resultado->data_seek(0);
?>
<!--<script type="text/javascript">
      $(document).ready(function()
   {
      $("#modalAgregarViaje").modal("show");
   });
 </script>-->
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
<div class="modal fade" id="modalAgregarViaje" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: gray; border-radius: 4px; height: 100px;">
      	<div class="col-sm-12">
      		
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red; font-size: 30px;"><span aria-hidden="true">&times;</span></button>

        	
        	<div class="col-sm-3"><span> <img src="tabsa.png" width="120px" height="50px" ></span></div>

        	<div class="col-sm-offset-1 col-sm-5" >
	        	<div class="col-sm-offset-1">
	        		<h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">VIAJES</h4>
	    		</div>
	    		<div class="col-sm-offset-1">
	        	<p class="modal-title" id="myModalLabel" style="color: white; font-size: 10px;">PAQUETERIA TABSA EXPRESS</p>
	    		</div>
    		</div>
    		<div class="col-offset-sm-3 col-sm-2">
    			<p style="color: white; font-size: 16px;">NÚMERO:</p>
    			<small style="color: white; font-size: 14px; border-top: 20px;"><?php 
                    $hoy = getdate();
                    echo $hoy['year']."/ ".$hoy['month']; ?></small>
            </div>
    		
      	</div>
      </div>
        

      <div class="modal-body">
	      <form class="form-horizontal" action="consultaViaje.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<div class="col-md-12" style="padding-bottom: 20px;">
	      		<div>

	      			<div class="col-sm-offset-0 col-sm-4">
						<label for="validationServer01" style="padding-top: 20px;">Origen</label>
							<?php
							require_once('InterfazConexion.php');
							require_once('MetodosUsuario.php');	
							$usuario=new MetodosUsuario();
							$resultado=$usuario->getOrigen();
							$row = $resultado->fetch_assoc()
							//$resultado->data_seek(0);
							?>
							<input value="<?php echo $row['ciu_dir'] ?>" type="text" class="form-control is-valid" id="origen" name="origen" placeholder="Origen" required>
					</div>
					<div class="col-sm-offset-0 col-sm-4">
						<label for="validationServer01" style="padding-top: 20px;">Destino</label>
							<input type="text" class="form-control is-valid" id="destino" name="destino" placeholder="Destino">
					</div>
					<div class="col-sm-offset-2 col-sm-2" style="padding-top: 50px;">
						<a href='#' id='agregarRuta' data-toggle='modal' data-target='#modalAgregarRuta' class='btn btn-default'>Nueva ruta</a>
					</div>

	      			<!-- <div class="col-sm-12">
						<br>
						<label>Seleccione una ruta:</label>
						<?php
							/*require_once('InterfazConexion.php');
							require_once('MetodosUsuario.php');	
							$usuario=new MetodosUsuario();
							$resultado=$usuario->getConductorVehiculoDisponible();*/
							//$resultado->data_seek(0);
						?>
						<select class="form-control form-control-sm">
						 <?php    
						   // while ( $row = $resultado->fetch_assoc() )    
						    {
						        ?>
						    
						        <option value=" <?php //echo $row['modelo_vehi'] ?> " >
						        <?php //echo $row['modelo_vehi']; ?>
						        </option>
						        
						        <?php
						    }    
						  ?>   
						</select>
					</div>-->




						<div class="col-sm-12">
						<br>
						<label>Seleccione una ruta:</label>
						<!-- <?php $origen//='<script type="text/javascript">document.getElementById("origen").value;</script>'?>
						<?php $destino//='<script type="text/javascript">document.getElementById("destino").value; </script>'?>-->
						<?php
							require_once('InterfazConexion.php');
							require_once('MetodosUsuario.php');	
							$usuario=new MetodosUsuario();
							//$resultado2=$usuario->getRutas();
							//$resultado->data_seek(0);
						?>
						<select class="form-control form-control-sm" id="dropDownRuta" name="ruta">
						  
						</select>
					</div>






		      		<div class="col-sm-6">
						<br>
						<label>Seleccione un Conductor:</label>
						<?php
							require_once('InterfazConexion.php');
							require_once('MetodosUsuario.php');	
							$usuario=new MetodosUsuario();
							$resultado=$usuario->getConductor();
							//$resultado->data_seek(0);
						?>
						<select class="form-control form-control-sm" name="conductor">
						<?php
						if ($resultado->num_rows>0) {    
						    while ( $row = $resultado->fetch_assoc() )    
						    {
						        ?>
						        <option value="<?php echo $row['cve_usu'] ?>" >
						        <?php echo $row['nom_usu']; ?> <?php echo $row['ap_usu']; ?>
						        </option>
						        
						        <?php
						    }
						    }else{    
						  ?>
						  	<option>No hay vehículos disponibles</option> 
						  <?php
						  } 
						  ?>  
						</select>
					</div>


					<div class="col-sm-6">
						<br>
						<label>Seleccione un vehículo:</label>
						<?php
							require_once('InterfazConexion.php');
							require_once('MetodosUsuario.php');	
							$usuario=new MetodosUsuario();
							$resultado=$usuario->getVehiculo();
							//$resultado->data_seek(0);
						?>
						<select class="form-control form-control-sm" name="vehiculo">
						<?php
						if ($resultado->num_rows>0) {    
						    while ( $row = $resultado->fetch_assoc() )    
						    {
						        ?>
						        <option value="<?php echo $row['cve_vehi'] ?>">
						        <?php echo $row['marca_vehi']; ?> <?php echo $row['modelo_vehi']; ?>
						        </option>
						        
						        <?php
						    }
						    }else{    
						  ?>
						  	<option>No hay vehículos disponibles</option> 
						  <?php
						  } 
						  ?>  
						</select>
					</div>



				<div class="col-sm-offset-0 col-sm-12">
				<div class="col-sm-offset-0 col-sm-6">
					<div class="col-sm-offset-0 col-md-10" id="ListasPaquete" style='padding-top: 60px; height: 150px; overflow:'>
					</div>
				</div>

				<div class="col-sm-6  " style="height: 250px; overflow: auto; padding-top: 63px;">
									<br>
									<table id="tabla2" class="table table-bordered col-md-8 mb-3">

									  <thead>
									    <tr>
									      <th scope="col">Folio</th>
									      <th scope="col">Fecha</th>
									      <th scope="col">Cant. paquetes</th>
									    </tr>
									  </thead>
									  <tbody>
									  </tbody>
									</table>
				</div>
				<div class="col-md-6 mb-3">
					<br>
					<input type="hidden" class="form-control is-valid" name="listaPac" id="listaPac" required="">
				</div>
				</div>



				</div>

				<div class="col-sm-offset-0 col-sm-11">
					<div class="col-sm-offset-1 col-md-11" id="datosListaPaquete" style='padding-top: 40px'>
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
<?php
    include("agregaRuta.php");
    ?>
</body>
</html>
