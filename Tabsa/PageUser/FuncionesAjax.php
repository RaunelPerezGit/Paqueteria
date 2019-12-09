<?php 
  require_once('Conexion.php');
  require_once('FuncionesBdd.php');
  if (isset($_POST['data'])) {
    $peticion=new Funciones();
    $salida=$peticion->addPeticion($_POST['data']);
  }
 ?>