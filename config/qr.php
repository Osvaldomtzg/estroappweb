<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id==''){
    echo '¡Ups! Error al procesar la informacion, si el problema persiste comunicarse con EstroApp';
    exit;
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EstroApp | Inicio</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
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
<center>
  <br>
<label style="font-family: system-ui,-apple-system, Segoe UI ,Roboto, Helvetica Neue , Noto Sans , Liberation Sans ,Arial,sans-serif, Apple Color Emoji , Segoe UI Emoji , Segoe UI Symbol , Noto Color Emoji; font-size: 20px; color:#f22b56;">¡Petición exitosa!</label><br>
<label style="font-family: system-ui,-apple-system, Segoe UI ,Roboto, Helvetica Neue , Noto Sans , Liberation Sans ,Arial,sans-serif, Apple Color Emoji , Segoe UI Emoji , Segoe UI Symbol , Noto Color Emoji; font-size: 40px">QR de <?php echo $id ?>: </label><br>

<img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $id ?>&amp;size=500x500" alt="" title="" class="d-block w-100"/><br>
<label style="font-family: system-ui,-apple-system, Segoe UI ,Roboto, Helvetica Neue , Noto Sans , Liberation Sans ,Arial,sans-serif, Apple Color Emoji , Segoe UI Emoji , Segoe UI Symbol , Noto Color Emoji; font-size: 20px"> Favor de imprimir el código QR y colocarlo en un lugar visible para el lector QR</label><br><br>

<div class="justify-content-between align-items-center">
    <div class="btn-group">
        <a href="/estroapp/cerdos.php" class="btn btn-primary">Menu Principal</a>
    </div>
</div>
</center>
<br>

</main>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
crossorigin="anonymous"></script>
</body>