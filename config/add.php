<?php 

require 'database.php';
$dbase=new bdate();
$con = $dbase->conectar(); //CONEXIÓN A LA BASE DE DATOS

    $idc=$_POST['icerdo'];
    $nombrec=$_POST['nombre'];
    $nregistroc=$_POST['nregistro'];
    $pesoc=$_POST['peso'];
    $razac=$_POST['raza'];
    $edadc=$_POST['edad'];
    $epestroc=$_POST['epestro']; //TODO ESTO VIENE DEL ARCHIVO AGREGAR.PHP, ES EL FORMULARIO, LOS TEXTBOX SE LLAMAN COMO ESTA ENTRE [' '] Y SE GUARDAN EN LA VARIABLE $variable
    $eppartoc=$_POST['epparto'];
    $nhijosc=$_POST['nhijos'];
    $npartosc=$_POST['npartos'];
    $nhijosvivosc=$_POST['nhijosvivos'];
    $nhijosmuertosc=$_POST['nhijosmuertos'];
    $nhijosdestetadosc=$_POST['nhijosdestetados'];
    $temperaturac=$_POST['temperatura'];

    $sql3 = "INSERT INTO cerdos(idcerdo, nombrecerdo, nregistro, peso, raza, edad, edadpestro, edadpparto, nhijos, npartos, nhijosvivos, nhijosmuertos, nhijosdestetados, temperatura) VALUES 
    ('$idc', '$nombrec', '$nregistroc', '$pesoc','$razac', '$edadc', '$epestroc', '$eppartoc', '$nhijosc', '$npartosc', '$nhijosvivosc', 
    '$nhijosmuertosc', '$nhijosdestetadosc', '$temperaturac')"; // PREPARACIÓN DE INSERT    YA QUEDO, FUNCIONANDO AL 100

    $stmt = $con->prepare($sql3); // PREPARAMOS LA CONEXIÓN A LA BASE DE DATOS CON LA VARIABLE $CON

    if($stmt->execute()){ //EJECUTAMOS EL INSERT, SI ES CORRECTO ENTRA EN EL IF
        header("location: qr.php?id=".$idc);
    }else{ //SI ES INCORRECTO MUESTRA ESTE MENSAJE
        echo "<script>alert('Oink! Error al agregar, revisa que los códigos no se repitan.')</script>";
    }

?>