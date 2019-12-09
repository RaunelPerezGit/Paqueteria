<?php 
  require_once('InterfazConexion.php');
  require_once('FuncionesBdd.php');
  $conteo=new Funciones();
  $contSolEnt=$conteo->getCountSolEnt();
  $contSolCon=$conteo->getCountSolCon();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notificaciones</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">    
  <link rel="stylesheet" href="bootstrap/css/custom.css">
  <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
  <script type="text/javascript" src="bootstrap/js/Tabsa.js"></script>
</head>
<body>
<?php
	include("menuTabsa.php");
?>
<!--Solicitudes entrantes para el sistema-->
<div class="card text-center" style="display: inline-table; background:#0BC8E3; max-width: 30rem; width: 20%; margin-left: 350px;  border-radius: 5px;">
  <div class="card-header">
    <h4 style="color: white; font-weight: bold;">Solicitudes de Servicio</h4>
  </div>
  <div class="card-body text-success">
    <div class="col-md-6">
      <h1 style="color: white; font-weight: bold;"><?php echo $contSolEnt ?></h1>
      <h5 class="card-title" style="font-weight: bold; color: white;">No. De Peticiones</h5>
    </div>
    <div class="col-md-6">
      <h1></h1>
      <i class="fa fa-inbox fa-4x" style="color: white;" aria-hidden="true" ></i>
    </div>
  </div>
  <div class="card-footer bg-transparent border-success col-md-12">
  	<a href="#" class="btn btn-default" id="solicitarSer"> <i class="fa fa-inbox" style="color: black;" aria-hidden="true" >Ver Solicitudes</i></a>
  </div>
</div>

<!--Solicitudes confirmadas por los usuarios-->
<div class="card text-center" style="display: inline-table; background:#004843; max-width: 30rem; width: 20%; margin-left: 60px;  border-radius: 5px;">
  <div class="card-header">
    <h4 style="color: white; font-weight: bold;">Solicitudes Aceptadas</h4>
  </div>
  <div class="card-body text-success">
    <div class="col-md-6" id="solAcep">
      <h1 style="color: white; font-weight: bold;"><?php echo $contSolCon; ?></h1>
      <h5 class="card-title" style="font-weight: bold; color: white;">No. De Peticiones</h5>
    </div>
    <div class="col-md-6">
      <h1></h1>
      <i class="fa fa-inbox fa-4x" style="color: white;" aria-hidden="true" ></i>
    </div>
  </div>
  <div class="card-footer bg-transparent border-success col-md-12">
    <a href="#" class="btn btn-default" id="confirmarSer"><i class="fa fa-inbox" style="color: black;" aria-hidden="true" >Ver Solicitudes</i></a>
  </div>
</div>
<!--lista de las peticiones segun lo escogido-->
<div class="col-sm-offset-2 col-md-9" id="solicitudesEn" style=" width: 80%; height: 300px; overflow: auto; margin-top: 30px;">
        
</div>

<!--Modal para asignar vehiculo y operador para la recogida del paquete-->
<div class="modal fade" id="aceptarSolVeh" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Enviar Operador</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group col-md-6">
          <input type="hidden" name="folioFactura" id="folioFactura">
          <label for="comboOpe">Elige un Operador</label>
          <select class="form-control" id="comboOpe">
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="asignarOpe">Asignar a Operador</button>
      </div>
    </div>
  </div>
</div>
<?php include("verMasFactura.php") ?>
<script src="consulta.js"></script>
</body>
</html>