<?php

require_once('conexion.php');

$soundvalue = $_POST['soundvalue'];

$conn = new conexion();

    $query = "INSERT INTO historialsonidos(intensidadSonido, hora, dia) VALUES ('$soundvalue', NOW(), NOW())";
    $insert = mysqli_query($conn->conectarbd(),$query);
    echo "****** SONIDO REGISTRADO ******";
    echo "{SoundValue: ".$soundvalue."} <br>";
    echo "****** DATOS INSERTADOS EN LA BASE DE DATOS ****** <br>";
?>