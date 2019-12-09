<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	if(isset($_POST['listaFac'])){
		$listaP=$_POST['listaFac'];
		$lista=new MetodosUsuario();
		$lista->registrarlista($listaP);
	}
?>


<!DOCTYPE html>
<html>
<head>	
	<title>Listas</title>
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" type="image/gif/png" href="tabsa.png">
</head>
<body>
	<?php
	include("menuTabsa.php");
	?>
	<div style="margin-top: 15px;" scope='col' class="col-md-6 col-sm-offset-6">
		<a href='' id='agregarLista' data-toggle='modal' data-target='#modalAgregarLista' class='btn btn-success'>Nueva lista</a>
	</div>


	<div class="col-sm-offset-6 col-sm-6 col-sm-offset-3 col-m-4" style="padding-top: 20px; ">
		<form class="form-inline">
			<div class="col-sm-offset-2 col-sm-10">
			    <div class="form-group has-success has-feedback  col-sm-9">
			      <div class="col-sm-3 col-m-1">
				  <label class="control-label" for="inputGroupSuccess1" style="padding-top: 15px;">Folio</label>
				  </div>
				  <div class="input-group col-sm-9 col-m-11">
				    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
				    <input type="text" class="form-control" id="cajaBusquedalista" aria-describedby="inputGroupSuccess1Status" placeholder="Buscar">
				  </div>
			    </div>
		  	</div>
		</form>
	</div>

	<div class="col-sm-offset-2 col-md-9" id="jeje" style='padding-top: 80px'>
			<div id="datoslista"></div>	
	</div>




	<?php include("agregarLista.php") ?>
	<script src="consulta.js"></script>
</body>
</html>

