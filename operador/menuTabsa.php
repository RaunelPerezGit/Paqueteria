<?php
session_start();
if (isset($_SESSION["admin"])) {

?>
<?php
}elseif (isset($_SESSION["usuario"])) {

 ?>

<!DOCTYPE html>
<html style="overflow: hidden;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabsa Express</title>
    <link rel="icon" type="image/gif/png" href="tabsa.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">    
    <link rel="stylesheet" href="bootstrap/css/custom.css">
  </head>
</head>
<body >
<!--  header -->
<header class="my-header " style="height: 70px;">
        <nav class="container navbar navbar-static-top">
            <div class="navbar-header ">

              <div class="my-logo">
                <!--Boton para ocultar la barra lateral-->
                <div class="pull-left">
                    <a  class="navbar-toggle collapsed btnbarra" data-toggle="collapse" data-target="#sidebar-wrapper" >
                      <i class="sr-only">Toggle navigation</i>
                      <i class="fa fa-bars" aria-hidden="true"></i>
                    </a> 
                </div>
                <!-- **************    -->

                <span> <img src="tabsa.png" width="150px" height="65px" ></span>
                <div class="pull-right">
                  <a class="navbar-toggle collapsed btnbarra" data-toggle="collapse" data-target="#barra-menu" >
                    <i class="sr-only">Toggle navigation</i>
                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                  </a> 
                </div>

              </div>

              <div class="my-div-right">

                <div class="navbar-collapse  collapse"  id="barra-menu">
                <ul class="nav navbar-nav my-right-ul">

                  <li>
                    <a href="inicio.php" class="mytool" data-toggle="tooltip" data-placement="bottom" data-original-title="Inicio">
                      <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                  </li>
                  
                  
                  <li class="dropdown user-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img src="dist/user.jpg" class="user-image" >-->
                        <span class="hidden-xs">Operador</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="my-user-header">
                          <img src="tabsa.png" class="img-circle" >
                          <p>
                            <?php echo($_SESSION["usuario"]);?><br>
                            <small><?php 
                            $hoy = getdate();
                            echo $hoy['year']." ".$hoy['month']; ?></small>
                          </p>
                        </li>


                        <li class="my-user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-primary"> <i class="fa fa-user"></i> Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="salir.php" class="btn btn-primary"> <i class="fa fa-power-off"></i> Salir</a>
                            </div>
                        </li>
                      </ul>                   
                  </li>                         
                </ul>
                </div>
              </div>                                                    
            </div>
        </nav>
     </header>



    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/myscript.js"></script>
</body>
</html>
<?php 
}else{
  header("location:index.php");
}
?>