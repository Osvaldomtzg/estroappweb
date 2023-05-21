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
        $sql = $con->prepare("SELECT * FROM cerdos WHERE idcerdo=?");
        $sql->execute([$id]);
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

      }else{
        echo 'Ups! Error al procesar la informacion, si el problema persiste comunicarse con EstroApp';
        exit;
    }
}
}
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

                    
                    <div class="col">
                    <div class="card shadow-sm">
                    <img src="imagenes/c.jpg" class="d-block w-100">
                        <div class="card-body">
                            <center><h5 class="card-title">EDITAR DATOS</h5></center>
                            <form action="config/upd.php" method="post">
                            <label class="lead">Código: </label><br>
                            <input type="text" name="icerdo" id="icerdo" readonly value="<?php echo $idcerdo;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Nombre de la cerda: </label><br>
                            <input type="text" name="nombre" id="nombre" value="<?php echo $nombrecerdo;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Nro. de registro: </label><br>
                            <input type="text" name="nregistro" id="nregistro" value="<?php echo $nregistro;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Peso: </label><br>
                            <input type="text" name="peso" id="peso" value="<?php echo $peso;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Raza: </label><br>
                            <input type="text" name="raza" id="raza" value="<?php echo $raza;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Edad: </label><br>
                            <input type="text" name="edad" id="edad" value="<?php echo $edad;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Edad de primer estro: </label><br>
                            <input type="text" name="epestro" id="epestro" value="<?php echo $edadpestro;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Edad de primer parto: </label><br>
                            <input type="text" name="epparto" id="epparto" value="<?php echo $edadpparto;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Cantidad de lechones: </label><br>
                            <input type="text" name="nhijos" id="nhijos" value="<?php echo $nhijos;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Cantidad de partos: </label><br>
                            <input type="text" name="npartos" id="npartos" value="<?php echo $npartos;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Cantidad de lechones vivos: </label><br>
                            <input type="text" name="nhijosvivos" id="nhijosvivos" value="<?php echo $nhijosvivos;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Cantidad de lechones muertos: </label><br>
                            <input type="text" name="nhijosmuertos" id="nhijosmuertos" value="<?php echo $nhijosmuertos;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Cantidad de lechones destetados: </label><br>
                            <input type="text" name="nhijosdestetados" id="nhijosdestetados" value="<?php echo $nhijosdestetados;?>" style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                            <br>
                            <label class="lead">Temperatura: </label><br>
                            <input type="text" name="temperatura" value="<?php echo $temperatura;?>" disabled style="width: 100%; border-radius: 4px; border: 1px solid #787878;">
                          </p>
                    
                          <center>
                          <div class="justify-content-between align-items-center">
                            <div class="btn-group">
                                    <input type="submit" class="btn btn-primary" value="Guardar cambios">
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