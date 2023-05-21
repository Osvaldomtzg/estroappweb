<?php

require 'config/config.php';
require 'config/database.php';
$dbase=new bdate();
$con = $dbase->conectar();

$sql = $con->prepare("SELECT * FROM historialsonidos where dia = CURDATE()");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
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
    <META HTTP-EQUIV="REFRESH" CONTENT="30;URL=decibeles.php">
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
<main class="mainDb">
    <div class="container">
        <center><h3>RUIDO REGISTRADO EN LAS ULTIMAS HORAS</h3></center>   
         
    </div>
    <div>
        <canvas id="myChart"></canvas>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Obtener el canvas y su contexto
  var canvas = document.getElementById('myChart');
  var ctx = canvas.getContext('2d');

  // Crear los datos para la gráfica
  var soundData = [];
  var timeData = [];
  <?php
    foreach ($resultado as $row) {
      echo "soundData.push(" . $row['intensidadSonido'] . ");\n";
      echo "timeData.push('" . $row['hora'] . "');\n";
    }
  ?>

  // Crear la gráfica con Chart.js
  var chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: timeData,
      datasets: [{
        label: 'Nivel de Ruido',
        data: soundData,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script>
  window.onload = updateClock;
  var totalTime = 30;
  function updateClock() {
  document.getElementById('countdown').innerHTML = totalTime;
  if(totalTime==0){
    console.log('Final');
  }else{
    totalTime-=1;
    setTimeout("updateClock()",1000);
  }
}
</script>
<br>
<center><span><font color='585858'>Actualizando datos en: </span><span id="countdown"></span> <span> segundos</span></font></center>
<br>
<center> <font color='red' family='sans-serif' size='2px'> ⚠ Un ruido constante superior a 400 indica posible estro</font></center>  
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
crossorigin="anonymous"></script>
</body>
</html>