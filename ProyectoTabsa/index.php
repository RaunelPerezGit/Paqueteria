<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
	if(isset($_POST['usuario'])){
		$nombre=$_POST['usuario'];
		$password=$_POST['password'];
		$usuario=new MetodosUsuario();
		$datos=array($nombre,$password);
		$result=$usuario->validarUsuario($datos);
		echo $result;
		if($result==1){
			//header('Location:menuTabsa.php');
			echo '<meta http-equiv="refresh" content="0; URL=menuTabsa.php">';
		}elseif ($result==2) {
			//header('Location:menuTabsa.php');
			echo '<meta http-equiv="refresh" content="0; URL=menuTabsa.php">';
		}else{
			//$this->conectar();
			//$query="insert into administrador values (null,'".$nombre."','".sha1($password)."')";
			//$result1=$this->insertar($query);
			echo "<script>alert('El usuario no fue encontrado!!!');</script>";
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="Bootstrap/js/jquery.js"></script>
	<link rel="icon" type="image/gif/png" href="tabsa.png">
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
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario">
							<label>Contraseña</label>
							<input type="password" class="form-control input-sm" name="password">
							<p></p>
							<button type="submit" class="btn btn-primary btn-sm">Entrar</button> 
							<!--a href="registro.php" class="btn btn-danger btn-sm">Registrarse</a-->
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>