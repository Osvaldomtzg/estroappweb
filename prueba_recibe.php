<?php

require_once('conexion.php');

$cerdo = $_POST['cerdo'];
$temperatura=$_POST['temperatura'];

$conn = new conexion();

$query = "SELECT * FROM cerdos WHERE idcerdo = '$cerdo'";
$select = mysqli_query($conn->conectarbd(),$query);

if($select->num_rows){
    $query = "UPDATE cerdos SET temperatura=$temperatura WHERE idcerdo='$cerdo'";
    $update = mysqli_query($conn->conectarbd(),$query);
    $query = "INSERT INTO historial(idcerdo, temperatura, Hora, Dia) VALUES ('$cerdo', '$temperatura',NOW(),NOW())";
    $insert = mysqli_query($conn->conectarbd(),$query);
    echo "****** CERDOS ENCONTRADOS POR QR ******";
    echo "{Cerdo: ".$cerdo." | Temperatura: ".$temperatura."} <br>";
    echo "****** DATOS INSERTADOS EN SQL ****** <br>";
}else{
    echo "****** NO EXISTEN CERDOS CON ESE CODIGO QR ******";
}
?>