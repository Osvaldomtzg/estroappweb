<?php

require 'config/config.php';
require 'config/database.php';
$dbase=new bdate();
$con = $dbase->conectar();
$sql = $con->prepare("SELECT idcerdo, nombrecerdo, temperatura FROM cerdos WHERE estado=1 ORDER BY temperatura DESC");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

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
          <h4 class="text-white">Datos</h4>
          <ul class="list-unstyled">
            <li><a href="./decibeles.php" class="text-white">Decibeles</a></li>
            <li><a href="#" class="text-white">Movimiento</a></li>
            <li><a href="#" class="text-white">Inf. Adicional</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong>EstroApp</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="logout.php" class="nav-link"> Cerrar Sesión </a>
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

            <?php foreach($resultado as $row){ ?>
                    <div class="col">
                    <div class="card shadow-sm">
                    
                    <img src="imagenes/c.jpg" class="d-block w-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombrecerdo']; ?></h5>
                            <P class="card-text">Temperatura: <?php echo $row['temperatura']; ?>°C</p>
                            
                            <?php // REPARAR
                            if( $row['temperatura'] >37){
                            
                              echo '¡EN POSIBLE PROESTRO!';
                            }else{
                              echo 'En estado normal';
                            }  
                            ?>

                          </p>
                                <div class="btn-group">
                                    <a href="detalles.php?id=<?php echo $row['idcerdo']; ?>&token=<?php echo hash_hmac('sha1', $row['idcerdo'], KEY_TOKEN);?>" class="btn btn-primary">Detalles</a>

                                </div>
                            </div>
                        </div>
                    </div>
            <?php }?>
            <div class="col" type="button">
                    <div class="card shadow-sm">
                    
                    <img src="imagenes/anadir256.png" class="d-block w-100">
                        <div class="card-body" >
                            <center><h5 class="card-title">Registrar nueva cerda</h5>
                            <div class="btn-group">
                                    <a href="/estroapp/agregar.php" class="btn btn-primary">Registrar</a>
                                </div></center>
                            <!-- ?php // REPARAR
                            if(  =37){
                              echo 'En posible pre estro';
                            }else{
                              echo 'En estado normal';
                            }  
                            ?> -->

                          </p>
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