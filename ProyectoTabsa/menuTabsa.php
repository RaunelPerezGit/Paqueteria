<?php
session_start();
require_once('FuncionesBdd.php');
$conteo=new Funciones();
if (isset($_SESSION["admin"])) {
  $contSolEnt=$conteo->getCountSolEnt();
  $contSolCon=$conteo->getCountSolCon();

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
<script type="text/javascript">
  var tiempo;
  function detener(){
    clearInterval(tiempo);
  }
  function actualizarNotificaciones(){
    /*ejecutamos la funcion ajax para actualizar las notificaciones*/
    var actualizarNot="actualizar las notificaciones";
    $.ajax({
        type:"POST",
        url:"FuncionesAjax.php",
        dataType:'html',
        data:{actualizarNot:actualizarNot},
    })
    .done(function(respuesta){
      var datos=respuesta.split("#");
      document.getElementById('sEntrantes').value="10";
      document.getElementById('sConfirmadas').value="11";
      //alert(respuesta);
      //$('#solicitudesEn').html(respuesta);
    })

  }
  function cargar(){
    
   tiempo= window.setInterval(function(){
      //execute the function that call to ajax
      actualizarNotificaciones();
    },3600);
  }
</script>
<body onload="cargar()">
<!--  header -->
<header class="my-header" style="height: 60px; background:rgb(38,64,89);">
        <nav class="container navbar navbar-static-top">
           <!--<span> <?php //echo $_SESSION['admin'].' id= '.$_SESSION['idAdm']; ?></span>-->
           <span style="font-size: 16px; color:white;">Tabsa Express: sucursal: <?php
              require_once('InterfazConexion.php');
              require_once('MetodosUsuario.php'); 
              $usuario=new MetodosUsuario();
              $resultado=$usuario->getSucursal();
              echo $resultado;
            ?></span>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-placement="bottom" data-original-title="Notificaciones">
                      <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                    <!--
                    <ul class="dropdown-menu">
                      <li class="my-user-header">
                        <label>Peticiones de Servicio</label>
                      </li>
                      <li style="width: 60%; height: 120%;">
                        <div>
                        
                        </div>
                      </li>
                     
                    </ul>
                  -->
                  </li>
                  
                  <li class="dropdown user-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img src="dist/user.jpg" class="user-image" >-->
                        <span class="hidden-xs">Administrador</span>
                      </a>
                      <ul class="dropdown-menu">
                      	<li class="my-user-header">
                          <img src="tabsa.png" class="img-circle" >
                          <p><?php echo $_SESSION["admin"] ?><br>

                            <small><?php 
                            /*$hoy = getdate();
                            echo $hoy['year']." ".$hoy['month'];*/
                            setlocale(LC_ALL,"es_ES");
                            echo strftime("%A %d de %B del %Y"); ?></small>
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

<div id="wrapper" class="toggled" style="margin-top: 20px;">

      <!-- Sidebar -->
      <div class="navbar navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
          <li class="my-li-nav"><a href="consultaUsuario.php" style="font-size: 15px; font-weight:bold; margin-top:20px;"><span class="fa fa-user" aria-hidden="true"></span> Gestión de usuarios</a></li>

          <li class=" my-li-nav">
              <a href="consultaPaquete.php" style="font-size: 15px; font-weight:bold; margin-top:15px;"><span class="fa fa-building" aria-hidden="true"></span> G. de Paquetes</a>
          </li>
          <li class=" my-li-nav">
              <a href="consultaProveedor.php" style="font-size: 15px; font-weight:bold; margin-top:15px;"><span class="fa fa-users" aria-hidden="true"></span><span style="font-size: 15px;"></span> Proveedores</span></a>
          </li>

          <li class=" my-li-nav">
              <a href="consultaLista.php" style="font-size: 15px; font-weight:bold; margin-top:15px;"><span class="fa fa-file-text" aria-hidden="true"></span><span style="font-size: 15px;"></span> G. de listas</span></a>
          </li>
           <li class=" my-li-nav">
              <a href="consultaViaje.php" style="font-size: 15px; font-weight:bold; margin-top:15px;"><span class="fa fa-truck" aria-hidden="true"></span><span style="font-size: 15px;"></span> G. de viajes</span></a>
          </li>
          <li class="dropdown my-li-nav">
              <a href="consultaVehiculo.php" style="font-size: 15px; font-weight:bold; margin-top:15px;"><span class="fa fa-taxi" aria-hidden="true"></span> G. de vehículos</span></a>
          </li>
           <li class="dropdown my-li-nav">
              <a href="notificaciones.php" style="font-size: 15px; font-weight:bold; margin-top:15px;"><span class="fa fa-bell" aria-hidden="true"></span>Notificaciones</span><input style="background: #0BC8E3; color: black; margin-left: 1px; margin-right:8px; width: 18px; height:20px; font-size:12px; border-radius:10px; font-weight:bold;" id="sEntrantes" value="<?php echo $contSolEnt;?>"></input><input id="sConfirmadas" style="background:#004843; border-radius:10px; width:18px; height:20px; font-size:12px; color: black; font-weight:bold;" value="<?php echo $contSolCon;?>"></input> </a>
          </li>
        </ul>
      </div>
      
    </div>

    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/myscript.js"></script>
</body>
</html>
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
                  <li>
                    <a href="inicio.php" class="mytool" data-toggle="tooltip" data-placement="bottom" data-original-title="Configuraciones">
                      <i class="fa fa-wrench" aria-hidden="true"></i>
                    </a>
                  </li>
                  
                  <li class="dropdown user-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img src="dist/user.jpg" class="user-image" >-->
                        <span class="hidden-xs">Administrador</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="my-user-header">
                          <img src="tabsa.png" class="img-circle" >
                          <p><?php echo $_SESSION["usuario"] ?><br>

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


<div id="wrapper" class="toggled" style="margin-top: 18px;">

      <!-- Sidebar -->
      <div class="navbar navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
          <li class="my-li-nav"><a href="consultaUsuario.php" style="font-size: 15px;"><span class="fa fa-user" aria-hidden="true"></span> Gestión de usuarios</a></li>

          <li class=" my-li-nav">
              <a href="consultaPaquete.php" style="font-size: 15px;"><span class="fa fa-building" aria-hidden="true"></span> Gestión de paquetes</a>
          </li>
          <li class=" my-li-nav">
              <a href="consultaProveedor.php" style="font-size: 15px;"><span class="fa fa-users" aria-hidden="true"></span><span style="font-size: 15px;"></span> Proveedores</span></a>
          </li>

           <li class=" my-li-nav">
              <a href="consultaLista.php" style="font-size: 15px;"><span class="fa fa-file-text" aria-hidden="true"></span><span style="font-size: 15px;"></span> Gestión de listas</span></a>
          </li>
          <li class=" my-li-nav">
              <a href="consultaViaje.php" style="font-size: 15px;"><span class="fa fa-truck" aria-hidden="true"></span><span style="font-size: 15px;"></span> Gestión de viajes</span></a>
          </li>
          <li class="dropdown my-li-nav">
              <a href="consultaVehiculo.php" style="font-size: 15px;"><span class="fa fa-taxi" aria-hidden="true"></span> Gestión de Vehículos</a>
          </li>
        </ul>
      </div>
      
    </div>

    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/Tabsa.js"></script>
    <script type="text/javascript" src="bootstrap/js/myscript.js"></script>
</body>
</html>
<?php 
}else{
  header("location:index.php");
}
?>