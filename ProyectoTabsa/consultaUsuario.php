<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
		if(isset($_POST['nombre'])){
			$nombre=$_POST['nombre'];
			$apellidos=$_POST["apellidos"];
			$correo=$_POST["correo"];
			$telefono=$_POST["telefono"];
			$password=sha1($_POST["password"]);//encriptacion de la contraseña
			$tipoUsuario=$_POST["tipoUsuario"];
			$estado=$_POST["estado"];
			$ciudad=$_POST["ciudad"];
			$cpCod=$_POST["cpCod"];
			$dir=$_POST['direccion'];
		if ($tipoUsuario=="Cliente") {
			$calidad=$_POST['calidad'];
			$datos=array($nombre,$apellidos,$correo,$telefono,$password,$tipoUsuario,$estado,$ciudad,$cpCod,$dir,$calidad);
			$usuario=new MetodosUsuario();
			$usuario->registrarUsuario($datos);
		} else {
			$datos=array($nombre,$apellidos,$correo,$telefono,$password,$tipoUsuario,$estado,$ciudad,$cpCod,$dir,"conductor");
			$usuario=new MetodosUsuario();
			$usuario->registrarUsuario($datos);
		}

		}elseif (isset($_POST['nombre1'])) {
		$idUser=$_POST['idUser'];	
		$nombre=$_POST['nombre1'];
		$apellidos=$_POST["apellidos1"];
		$correo=$_POST["correo1"];
		$telefono=$_POST["telefono1"];
		//encriptacion de la contraseña
		$tipoUsuario=$_POST["tipoUsuario1"];
		$estado=$_POST["estado1"];
		$ciudad=$_POST["ciudad1"];
		$cpCod=$_POST["cpCod1"];
		$dir=$_POST['direccion1'];
		$datos=array($nombre,$apellidos,$correo,$telefono,$estado,$ciudad,$cpCod,$dir,$idUser);
		$usuario=new MetodosUsuario();
		$usuario->modificarUser($datos);
		}
		
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Usuarios</title><meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" type="image/gif/png" href="tabsa.png">
</head>
<body>
	<?php
	include("menuTabsa.php");
	?>
	<div style="margin-top: 15px;" scope='col' class="col-md-6 col-sm-offset-6">
		<a href='' id='agregarUsuario' data-toggle='modal' data-target='#modalEditUsuario' class='btn btn-success'>Agregar</a>
	</div>
<div class="input-group col-sm-4 col-m-11 col-sm-offset-4">
		<br>		
</div>
<div class="input-group col-sm-4 col-m-11 col-sm-offset-4">
				 <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
				    <input type="text" class="form-control" id="cajaBusqueda" aria-describedby="inputGroupSuccess1Status" placeholder="Buscar">
</div>
<div class="col-sm-offset-2 col-md-9" id="datos" style="width: 80%; height: 400px; overflow: auto; margin-top: 30px;">
				
	</div>

<!-- Editar Usuario -->
<!--<div class="modal fade" id="modalEditPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Persona</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal">
	      	<!-- parametros ocultos --><!--
	      	<input type="hidden" id="mhdnIdPersona">
	      	
			<div class="box-body">
		        <div class="form-group">
		            <label class="col-sm-3 control-label">Nombre</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="mtxtNombre" class="form-control" id="nombre" placeholder="">
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-3 control-label">Apellidos</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="mtxtApPaterno" class="form-control" id="apellidos" value="" >
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-3 control-label">Telefono</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="mtxtApMaterno" class="form-control" id="telefono">
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-3 control-label">Email</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="mtxtEmail" class="form-control" id="correo">
		            </div>
		        </div>

		        <div class="modal-footer">
			        <button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
			        <button type="button" class="btn btn-info" id="mbtnUpdPerona">Actualizar</button>
			    </div>
			</div>
		  </form>
      </div>

      
    </div>
  </div>
</div>-->


<!--Agregar Usuario-->

<?php include("registroUsuario.php") ?>


</body>
</html>