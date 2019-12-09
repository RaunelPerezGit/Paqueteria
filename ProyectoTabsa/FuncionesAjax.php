<?php 
  require_once('InterfazConexion.php');
  require_once('FuncionesBdd.php');
  if (isset($_POST['data'])) {
  	/*listar las solicitudes entrantes*/
    $peticion=new Funciones();
    $salida=$peticion->listaSolicitudSer();
  }

  if (isset($_POST['enviar'])) {
  	$factura=$_POST['enviar'];
  	$peticion=new Funciones();
  	$confirmar=$peticion->sendEmail($factura);
  }

  if (isset($_POST['confirmarSer'])) {
  	$confirmarPeticion=new Funciones();
  	$confirmar=$confirmarPeticion->listaSolicitudCon();
  }

  if (isset($_POST['operador'])) {
  	$operadores=new Funciones();
  	$lista=$operadores->getOperadores();
  }

  if (isset($_POST['asignar'])) {
    $asignar=explode("#",$_POST['asignar']);
    $asignacion=new Funciones();
    $asig=$asignacion->asignarOperador($asignar[0],$asignar[1]);
  }

  if (isset($_POST['actualizarNot'])) {
    $conteo=new Funciones();
    $contSolEnt=$conteo->getCountSolEnt();
    $contSolCon=$conteo->getCountSolCon();
    echo $contSolEnt."#".$contSolCon;
  }

  if (isset($_POST['valorBuscarE'])) {
    $buscar= new Funciones();
    $buscarSol=$buscar->ordenarSoliEnt($_POST['valorBuscarE']);
  }

 ?>