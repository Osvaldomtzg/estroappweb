<?php

require 'config/config.php';
require 'config/database.php';
$dbase=new bdate();
$con = $dbase->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id=='' || $token ==''){
    echo 'Ups! Error al procesar la informacion, si el problema persiste comunicarse con EstroApp';
    exit;
}else{
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
    if($token==$token_tmp){
        
        $sql = $con->prepare("SELECT count(idcerdo) FROM cerdos WHERE idcerdo=? AND estado=1");
        $sql->execute([$id]);

        $consulta = $con->prepare("SELECT Dia, temperatura, max(temperatura) as max_temp FROM historial WHERE idcerdo=? group by Dia ORDER BY Dia DESC");
        $consulta->execute([$id]);
        $historial = $consulta->fetchAll(PDO::FETCH_ASSOC);

        if($sql->fetchColumn()>0){
            $sql = $con->prepare("SELECT idcerdo, nombrecerdo, nregistro, peso, raza, edad, edadpestro, edadpparto, nhijos, npartos, nhijosvivos, nhijosmuertos, nhijosdestetados, temperatura FROM cerdos WHERE idcerdo=? AND estado=1 LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $idcerdo = $row['idcerdo'];
            $nombrecerdo = $row['nombrecerdo'];
            $nregistro = $row['nregistro'];
            $peso = $row['peso'];
            $raza = $row['raza'];
            $edad = $row['edad'];
            $edadpestro = $row['edadpestro'];
            $edadpparto = $row['edadpparto'];
            $nhijos = $row['nhijos'];
            $npartos = $row['npartos'];
            $nhijosvivos = $row['nhijosvivos'];
            $nhijosmuertos = $row['nhijosmuertos'];
            $nhijosdestetados = $row['nhijosdestetados'];
            $temperatura = $row['temperatura'];
      }

    }else{
        echo 'Ups! Error al procesar la informacion, si el problema persiste comunicarse con EstroApp';
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EstroApp | Inicio</title>
    <link rel="icon" href="imagenes/cerdo.ico">
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
            <a href="/estroapp/" class="nav-link active"> Cerdos </a>
          </li>
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
        <div class="row">
            <div class="col-md-6 order-md-1">
                <img src="imagenes/c.jpg" class="d-block w-100">
            </div>
            <div class="col-md-6 order-md-2">
                <section id="nombrec">
                <h1><?php echo $nombrecerdo; ?></h1>
                </section>
                <section id="section1">
                <img src="imagenes/nregistro.png"><br>
                <p class="lead">Nro. de registro: <?php echo $nregistro; ?></p>
                </section>
                <section id="section2">
                <img src="imagenes/peso.png">
                <p class="lead">Peso: <?php echo $peso; ?> kg</p>
                </section>
                <section id="section1">
                <img src="imagenes/raza.png">
                <p class="lead">Raza: <?php echo $raza; ?></p>
                </section>
                <section id="section2">
                <img src="imagenes/edad.png">
                <p class="lead">Edad: <?php echo $edad; ?> meses</p>
                </section>
                <section id="section1">
                <img src="imagenes/primer.png">
                <p class="lead">Edad de primer estro: <?php echo $edadpestro; ?> meses</p>
                </section>
                <section id="section2">
                <img src="imagenes/parto.png">
                <p class="lead">Edad de primer parto: <?php echo $edadpparto; ?> meses</p>
                </section>
                <section id="section1">
                <img src="imagenes/hijos.png">
                <p class="lead">Nro. de lechones: <?php echo $nhijos; ?></p>
                </section>
                <section id="section2">
                <img src="imagenes/parto.png">
                <p class="lead">Nro. de partos: <?php echo $npartos; ?></p>
                </section>
                <section id="section1">
                <img src="imagenes/hijos.png">
                <p class="lead">Nro. de lechones vivos: <?php echo $nhijosvivos; ?></p>
                </section>
                <section id="section2">
                <img src="imagenes/carne.png">
                <p class="lead">Nro. de lechones muertos: <?php echo $nhijosmuertos; ?></p>
                </section>
                <section id="section1">
                <img src="imagenes/biberon.png">
                <p class="lead">Nro. de lechones destetados: <?php echo $nhijosdestetados; ?></p>
                </section>
                <section id="section2">
                <img src="imagenes/calor.png">
                <p class="lead">Temperatura: <?php echo $temperatura; ?> °C</p>
                </section>
                <br>
                <center>
                <div class="justify-content-between align-items-center">
                  <div class="btn-group" >
                     <a href="editar.php?id=<?php echo $idcerdo; ?>&token=<?php echo hash_hmac('sha1', $idcerdo, KEY_TOKEN);?>" class="btn btn-primary">Editar Informacion</a>
                  </div>
                     <a href="config/delete.php?id=<?php echo $idcerdo; ?>" class="btn btn-success">Eliminar Cerda</a><br><br>
                     <a href="config/qr.php?id=<?php echo $idcerdo; ?>" class="btn btn-success">Ver QR</a>
                </div>
                <br>
                <br>
                
                

                <section id="section1">
                <p class="lead">Historial</p>
                <table class="table table-hover" id="historial">
                  <thead>
                    <tr>
                      <th>Temperatura</th>
                      <th>Fecha</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($historial as $historial){?>
                    <tr>
                    <td><?php echo $historial['max_temp']; ?></td>
                    <td><?php echo $historial['Dia']; ?></td>
                    
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                </section>
            </div>
        </div>        
    </div>
</main>

<script>
$(document).ready(function(){
  $('#historial').DataTable();
});
</script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
crossorigin="anonymous"></script>
</body>
</html>