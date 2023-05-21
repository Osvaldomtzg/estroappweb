<?php 

require 'database.php';
$dbase=new bdate();
$con = $dbase->conectar();


$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id==''){
    echo '¡Ups! Error al procesar la informacion, si el problema persiste comunicarse con EstroApp';
    exit;
}  

    $sql3 = "UPDATE cerdos SET estado='2' WHERE idcerdo='$id'";
    $stmt = $con->prepare($sql3);
    if($stmt->execute()){
        header("location: /estroapp/cerdos.php");
        
    }else{
        echo "<script>alert('Oink! Error al eliminar.')</script>";
    }

?>