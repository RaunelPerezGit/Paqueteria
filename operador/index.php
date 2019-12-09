<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	if(isset($_POST['email'])){
		$nombre=$_POST['email'];
		$password=$_POST['password'];
		$usuario=new MetodosUsuario();
		$datos=array($nombre,$password);
		$result=$usuario->validarUsuario($datos);
		if($result==1){
			echo '<meta http-equiv="refresh" content="0; URL=inicio.php">';
		}elseif ($result==2) {
			echo '<meta http-equiv="refresh" content="0; URL=inicio.php">';
		}else{
			include('alerts.php');
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="Bootstrap/js/jquery.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">    
    <link rel="stylesheet" href="bootstrap/css/custom.css">
</head>
<body style="background-color: rgba(0, 0, 0, 0.12);">

	<div class="container">
		<br>
		<br>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Tabsa Express</div>
					<div class="panel panel-body">
						<p>
							<img src="tabsa.png" width="190px" height="190px">
						</p>
						<form id="frmLogin" method="post" action="index.php">
							<label>Email</label>
							<input type="email" class="form-control input-sm" name="email">
							<label>Contraseña</label>
							<input type="password" class="form-control input-sm" name="password">
							<p></p>
							<button type="submit" class="btn btn-primary btn-sm">Entrar</button> 
							<a href="registro.php" class="btn btn-danger btn-sm">Registrarse</a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>