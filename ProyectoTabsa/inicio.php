<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicio</title>
    <link rel="icon" type="image/gif/png" href="tabsa.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">    
    <link rel="stylesheet" href="bootstrap/css/custom.css">
</head>
<body>
    <?php
    include("menuTabsa.php");
    ?>
    <!--
    <div class="container-fluid" style="padding-top: 20px;">
        <div class="container py-5">
            <div class="row">
               <div class="col-md-4 col-sm-offset-3">
                    <div class="card text-center" style="background: #8BCFCC; max-width: 200px; border-radius: 5px;">
                        <div class="card-block">
                            <div>
                                <i style="color: white;  font-size: 70px; padding-bottom: 15px; padding-top: 15px;" class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="card-footer text-muted" style="font-size: 20px; color: white; background: #415865; border-radius: 5px;">
                                <button type="button" class="btn btn-secondary" style="width: 100%; background: #539092; border-radius: 5px;">Paquetes Entregados</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-center" style="background: #FFC93C; max-width: 200px; border-radius: 5px;">
                        <div class="card-block">
                            <div>
                                <i style="color: white;  font-size: 70px; padding-bottom: 15px; padding-top: 15px;" class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            </div>
                            <div class="card-footer text-muted" style="font-size: 20px; color: white; background: #415865; border-radius: 5px;">
                                <button type="button" class="btn btn-secondary" style="width: 100%; background: #F5A855; border-radius: 5px;">Paquetes en Espera</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br><br>-->
<?php include("registrarTarifa.php") ?>

<div class="col-sm-offset-5 col-sm-4">
    <button  style="width: 190px; height: 50px; font-size: 20px;" type="button" class="btn btn-primary btn-lg active fa fa-money" aria-hidden="true" id='tarifadd' data-toggle='modal' data-target='#modalEditTarifa' class='btn btn-success'>Nueva tarífa</button>
</div>

<div class="col-sm-offset-0 col-md-12" id="datosTarifa" style='padding-top: 30px'>
    
</div>

<script type="text/javascript" src="consulta.js"></script>
</body>
</html>

<?php
    require_once('InterfazConexion.php');
    require_once('MetodosUsuario.php');
    $usuario=new MetodosUsuario();
    $usuario->verTarifa();
?>