<?php 
  require_once('Conexion.php');
  require_once('FuncionesBdd.php');
  $tarifa=new Funciones();
  $salida=$tarifa->getTarifa();
  $tarifas=explode("@",(string)$salida);
  /*if (isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['email']) && isset($_POST['telefono'])) {
    $peticion=new Funciones();
    $datos=array($_POST['nombre'],$_POST['telefono'],$_POST['direccion'],$_POST['email'],$_POST['opc'],$_POST['canT'],$_POST['valT'],$_POST['salida']);
    $salida=$peticion->addPeticion($datos);
  }*/
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tabsa Express</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/styleTabsa.css" rel="stylesheet">

    <!--
    <script type="text/javascript" async defer src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCiYASrv9JFSq0oNCKlVh_Zg4uvoBQhlOg&libraries=places"></script>-->
  
    
 
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.min.js"></script>

     <!-- Custom scripts for this template -->
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    <script src="js/tabsa.js"></script>
    

  </head>

  <body id="page-top">
    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper" style="height: 40%;" >
      <ul class="sidebar-nav" >
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="#">Loggin</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="http://localhost/ProyectoTabsa/index.php">Administrador</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#">Operador</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#">Cliente</a>
        </li>
      </ul>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex " style="height: 30px;">
      <div class="container text-center my-auto">
        <img class="mb-1" src="img/tabsa.png" style="width: 40%; height: 100px;"></img>
        <h2 class="mb-3">
          <em style="color: white;">¡Hacemos que las cosas sucedan!</em>
        </h2>
      </div>
      <div class="overlay"></div>
    </header>

    <!-- Services -->
    <section class="content-section text-white text-center col-lg-8 col-md-3 mb-5 mb-lg-0 flex-container" id="services" style="background:rgb(250,250,250,0.3); border-radius: 15px; ">
      <div class="container">
        <div class="content-section-heading">
          <h2 class="mb-5">Tarifas</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-3  mb-lg-0" style="float: left;">
            <h2 class="text-secundary mb-2">Paquetes</h2>
            <div class="col-lg-2 col-md-3  mb-lg-0" style="display: inline-table;">
              <span class="service-icon rounded-circle mx-auto mb-3 d-none d-md-block" style="background: #D11341; color: #fff;">
                <i class="fa fa-usd " aria-hidden="true"></i>
              </span>
              <h4>
                <strong>Express</strong>
              </h4>
              <p class="text-faded mb-0"><?php echo $tarifas[0]; ?></p>
            </div>
            <div class="col-lg-2 col-md-3  mb-lg-0" style="display: inline-table;">
              <span class="service-icon rounded-circle mx-auto mb-3 d-none d-md-block"  style="background: #FF8C00; color: #fff;">
                <i class="fa fa-usd" aria-hidden="true"></i>
              </span>
              <h4>
                <strong>Rapido</strong>
              </h4>
              <p class="text-faded mb-0"><?php echo $tarifas[0]; ?></p>
            </div>
  
         
               <div class="col-lg-2 col-md-3  mb-lg-0" style="display: inline-table; color: #fff;">
                  <span class="service-icon rounded-circle mx-auto mb-3 d-none d-md-block" style="background: #FABF50; color: #fff;">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                  </span>
                  <h4>
                    <strong>Regular</strong>
                  </h4>
                  <p class="text-faded mb-0"><?php echo $tarifas[1]; ?></p>
                </div>

          </div>
          <div class="col-lg-6 col-md-3  mb-lg-0" style="float: right;">
            <h2 class="text-secundary mb-2">Documentos</h2>
             <div class="col-lg-2 col-md-3  mb-lg-0"   style="display: inline-table;">
                  <span class="service-icon rounded-circle mx-auto mb-3 d-none d-md-block" style="background: #D11341; color: #fff;">
                    <i class="fa fa-usd " aria-hidden="true"></i>
                  </span>
                  <h4>
                    <strong>Expres</strong>
                  </h4>
                  <p class="text-faded mb-0"><?php echo $tarifas[2]; ?></p>
                </div>

                 <div class="col-lg-2 col-md-3  mb-lg-0"  style="display: inline-table;">
                  <span class="service-icon rounded-circle mx-auto mb-3 d-none d-md-block" style="background: #FF8C00; color: #fff;">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                  </span>
                  <h4>
                    <strong>Rapido</strong>
                  </h4>
                  <p class="text-faded mb-0"><?php echo $tarifas[3]; ?></p>
                </div>

                 <div class="col-lg-2 col-md-3  mb-lg-0"  style="display: inline-table;">
                  <span class="service-icon rounded-circle mx-auto mb-3 d-none d-md-block" style="background: #FABF50; color: #fff;">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                  </span>
                  <h4>
                    <strong>Regular</strong>
                  </h4>
                  <p class="text-faded mb-0"><?php echo $tarifas[4]; ?></p>
                </div>
          </div>       
         
        </div>
      </div>
    </section>

  <!--Imagen-->
  <div class="container">
    <a href="http://www.google.com">
      <img src="img/app.jpg" class="mb-3" style="margin-top: 15px; opacity: 0.8; width: 100%; border-radius: 15px;">
    </a>
  </div>
   <!--seccion de carrusel-->
  <section class="section-white flex-container" style="background:rgb(250,250,250,0.3); ">
    
  </section>


    <!-- Boton -->
    <section class="content-section  text-white flex-container" style="background:rgb(250,250,250,0.3); border-radius: 15px;">
      <div class="container text-center">
        <h2 class="mb-4">Solicitud de Servicio</h2>
        <a href="#" class="btn btn-xl btn-light mr-4 mb-4 btn-primary" data-toggle="modal" data-target="#modalEditPaquete">Registrar Servicio</a>
      </div>
    </section>

    <!-- Mapa -->
    <section id="contact" class="map flex-container">
      <div class="col s9" id="mapa" style="width:100%; height:700px; float: right; position: relative;">

        <!-- Grey navigation panel -->
      </div>
      <br/>
    </section>

    <!-- Footer -->
    <footer class="footer text-center " style="background: #2E8099; height: 30%;">
      <div class="container">
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-facebook"></i>
            </a>
          </li>
        </ul>
        <p class="small mb-0" style="color: white;">Copyright &copy; Tabsa Express 2018</p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>


    <!------ Modal ------------>

    <div class="modal fade  bd-example-modal-lg" id="modalEditPaquete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle">Datos Requeridos</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading btn btn-success col-md-12 mb-1" >
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                      <p style="color: black;">Datos del Remitente</p></a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body" style="display: inline-table;">
                      <div class=" col-md-4" style="display: inline-table;">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                      </div>
                      <div class=" col-md-4" style="display: inline-table;">
                        <label for="nombre">Apellidos</label>
                        <input type="text" class="form-control" id="apR" name="apR">
                      </div>
                       <div class=" col-md-4" style="display: inline-table;">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="mail">
                      </div>
                       <div class="col-md-8" style="display: inline-table;">
                        <label for="direccion">Direcciòn</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="calle,col,ciudad">
                      </div>
                      <!--
                      <div class="col-md-2" style="display: inline-table;">
                        <label >C.postal</label>
                        <input type="text" class="form-control" id="codR" name="codR">
                      </div>
                      <div class="col-md-2" style="display: inline-table;">
                        <label >No. de Casa</label>
                        <input type="text" class="form-control" id="casaR" name="casaR">
                      </div>
                      -->
                      <div class=" col-md-4" style="display: inline-table;">
                        <label for="telefono">Tèlefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading btn btn-success col-md-12 mb-1">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                      <p style="color: black;">Datos del Destinatario</p></a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body" style="display: inline-table;">
                      <div class="col-md-4" style="display: inline-table;">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombreD" name="nombreD">
                      </div>
                      <div class="col-md-4" style="display: inline-table;">
                        <label for="nombre">Apellidos</label>
                        <input type="text" class="form-control" id="apD" name="apD">
                      </div>
                       <div class="col-md-4" style="display: inline-table;">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="emailD" name="mailD">
                      </div>
                       <div class="col-md-8" style="display: inline-table;">
                        <label for="direccion">Direcciòn</label>
                        <input type="text" class="form-control"  id="direccionD" name="direccionD">
                      </div>
                      <!--
                      <div class="col-md-2" style="display: inline-table;">
                        <label >C.postal</label>
                        <input type="text" class="form-control"  id="codD" name="codD">
                      </div>
                      <div class="col-md-2" style="display: inline-table;">
                        <label >No. de Casa</label>
                        <input type="text" class="form-control"  id="casaD" name="casaD">
                      </div>
                      -->
                      <div class=" col-md-4" style="display: inline-table;">
                        <label for="telefono">Tèlefono</label>
                        <input type="text" class="form-control" id="telefonoD" name="telefonoD">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading btn btn-success col-md-12 mb-1">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                      <p style="color: black;">Datos del Paquete</p></a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-8 mb-3" style="display: inline-table;">
                        <br>
                        <label>Tipo de Servicio:</label>
                        <select class="form-control form-control-sm" id="servicio" name="servicio">
                          <option value="regular">Regular</option>
                          <option value="urgente">Urgente</option>
                        </select>
                      </div>
                      <div class="col-md-6" style="display: inline-table;">
                        <input type="hidden" name="salida" id="salida">
                        <input type="radio" name="opc" id="doc" value="1" onclick="ocultar();"  style="width:20px;height:20px">
                        <label>Documento</label>
                      </div>
                      <div class="col-md-6" style="display: inline-table;">
                         <input type="radio" name="opc" id="paq" value="2" onclick="desaparecer();" style="width:20px;height:20px">
                         <label>Paquete</label>
                      </div>
                      <!--Paquete-->
                      <div class="col-md-12 d-none" style="display: inline-table;" id="formPaquete">
                         <div class="col-md-6 mb-1" style="display: inline-table;">
                            <br>
                            <input type="text" name="art" id="art"  class="form-control is-valid" placeholder="Artículo">
                          </div>
                          <div class="col-md-3 mb-1" style="display: inline-table;">
                            <br>
                            <input type="text"  name="cant" id="cant"  class="form-control is-valid" placeholder="Cantidad">
                          </div>
                          <div class="col-md-3 mb-1" style="display: inline-table;">
                            <br>
                            <input type="text" name="val" id="val"  class="form-control is-valid" placeholder="Valor">
                            <input type="hidden" name="salida" id="salida">
                          </div>
                          <div class="col-md-12 mb-1">
                            <br>
                            <button type="button" id="agregar" class="btn btn-info col-md-12 mb-1">Agregar Detalles</button>
                          </div>

                          <div class="col-md-12 mb-1 " style="height: 150px; overflow: auto;">
                            <br>
                            <table id="tabla" class="table table-bordered col-md-8 mb-1">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Artículo</th>
                                  <th scope="col">Cantidad</th>
                                  <th scope="col">Valor</th>
                                </tr>
                              <tbody>
                              </tbody>
                            </table>
                          </div>

                            <div class="col-md-6 mb-1" style="display: inline-table;">
                              <label>Cantidad total:</label>
                              <input type="text" class="form-control is-valid" name="canT" id="canT" onfocus="totalCant();" placeholder="0" required="" >
                            </div>
                            
                            <div class="col-md-6 mb-1" style="display: inline-table;">
                              <label>Valor total:</label>
                              <input type="text" class="form-control is-valid" name="valT" id="valT" onfocus="totalVal();" placeholder="0.00" required="">
                            </div> 
                            <!--datos de dimension-->
                             <div class="col-md-12 mb-1 ">
                                <div class="form-group" style="display: inline-table;">
                                  
                                  <div class="col-md-12 mb-1 " style="display: inline-table;">
                                  <h4>Dimensiones</h4>
                                    </div>

                                  <div class="col-md-4 mb-1 " style="display: inline-table;">
                                    <br>
                                    <input type="number" id="largo" class="form-control is-valid" name="largo" placeholder="Largo (cm)" required="">
                                  </div>
                                  <div class="col-md-4 mb-1" style="display: inline-table;">
                                    <br>
                                    <input type="number" id="alto" class="form-control is-valid" name="alto" placeholder="Alto (cm)" required="">
                                  </div>
                                  <div class="col-md-4 mb-1" style="display: inline-table;">
                                    <br>
                                    <input type="number" id="ancho" class="form-control is-valid" name="ancho" placeholder="Ancho (cm)" required="">
                                  </div>
                                  <div class="col-md-6 mb-1" style="display: inline-table;">
                                    <br>
                                    <input type="number" id="peso" step="0.001" class="form-control is-valid" name="peso" onfocus="calcular();" placeholder="Peso vol." required="">
                                  </div>
                                  <div class="col-md-6 mb-1" style="display: inline-table;">
                                    <br>
                                    <input type="text" id="peso1" class="form-control is-valid" name="peso1" placeholder="Peso físico (kg)" required="">
                                  </div>
                                </div>
                              </div> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <input type="button" id="enviar" class="btn btn-primary" value="Enviar Peticion">
        </div>
      </div>
      </div>
    </div>
    
  </div>

   </div> 
    </div>
  </div>
</div>


    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAH_mteAb8TrptsQr9B31yjrntIpehE4bo"></script>
    <script src="js/map.js"></script>
    <script type="text/javascript">
      function ocultar() {
        var form=document.getElementById("formPaquete");
        form.classList.add("d-none");
      }
      function desaparecer() {
        var form=document.getElementById("formPaquete");
        form.classList.remove("d-none");
      }

    </script>

  </body>

</html>
