<?php
require 'config/config.php';
require 'config/database.php';
$dbase=new bdate();
$con = $dbase->conectar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="imagenes/cerdo.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EstroApp | Inicio</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Acerca de EstroApp</h4>
          <p class="text-muted">Somos un grupo de ingenieros enfocados en la automatización de procesos relacionados a la agronomia. EstroApp reduce tiempos y costos en la monitorización y detección oportuna del estro en Cerdas</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contacto</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Blog</a></li>
            <li><a href="#" class="text-white">Facebook</a></li>
            <li><a href="#" class="text-white">Email</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark">
    <div class="container">
      <a href="/estroapp/cerdos.php" class="navbar-brand">
        <strong>EstroApp</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a href="/config/logout.php" class="nav-link"> Cerrar Sesión </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>

<!--Contenido-->
<main>
    <div class="container">
            <div class="row row-cols-1  row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                    <div class="card shadow-sm">
                    <img src="imagenes/c.jpg" class="d-block w-100">
                        <div class="card-body">
                            <center><h5 class="card-title">AGREGAR CERDA</h5></center>
                            <form action="config/add.php" method="post">
                            <label class="lead">Código: </label><br>
                            <input type="text" name="icerdo" id="icerdo" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <label style="font-size: 12px">	&#9888; No repetir el codigo de otros cerdos, en caso de error regresa a la pagina anterior </label><br>
                            
                            <label class="lead">Nombre de la cerda: </label><br>
                            <input type="text" name="nombre" id="nombre" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Nro. de registro: </label><br>
                            <input type="text" name="nregistro" id="nregistro" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Peso: </label><br>
                            <input type="text" name="peso" id="peso" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Raza: </label><br>
                            <input type="text" name="raza" id="raza" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Edad (Meses): </label><br>
                            <input type="text" name="edad" id="edad" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Edad de primer estro (Meses): </label><br>
                            <input type="text" name="epestro" id="epestro" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Edad de primer parto (Meses): </label><br>
                            <input type="text" name="epparto" id="epparto" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Cantidad de lechones: </label><br>
                            <input type="text" name="nhijos" id="nhijos" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Cantidad de partos: </label><br>
                            <input type="text" name="npartos" id="npartos" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Cantidad de lechones vivos: </label><br>
                            <input type="text" name="nhijosvivos" id="nhijosvivos" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Cantidad de lechones muertos: </label><br>
                            <input type="text" name="nhijosmuertos" id="nhijosmuertos" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Cantidad de lechones destetados: </label><br>
                            <input type="text" name="nhijosdestetados" id="nhijosdestetados" value="" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Temperatura: </label><br>
                            <input type="text" name="temperatura" id="temperatura" value="El sensor lo registrará" readonly style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                          </p>
                          <center>
                          <div class="justify-content-between align-items-center">
                            <div class="btn-group">
                                    <input type="submit" class="btn btn-primary" value="Agregar">
                                </div>
                                <a href="/estroapp/cerdos.php" class="btn btn-success">Cancelar</a>
                          </div>
                          
                          </center>
                          </form>
                            </div>
                        </div>
                    </div>
                   
           
    </div>
    </div>
</main>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
crossorigin="anonymous"></script>
</body>
</html>