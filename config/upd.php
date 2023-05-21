<?php 

require 'database.php';
$dbase=new bdate();
$con = $dbase->conectar();

    echo' HE ENTRADO EN EL IF PERO NO PUEDO HACER NADA ';
    $idc=$_POST['icerdo'];
    $nombrec=$_POST['nombre'];
    $nregistroc=$_POST['nregistro'];
    $pesoc=$_POST['peso'];
    $razac=$_POST['raza'];
    $edadc=$_POST['edad'];
    $epestroc=$_POST['epestro'];
    $eppartoc=$_POST['epparto'];
    $nhijosc=$_POST['nhijos'];
    $npartosc=$_POST['npartos'];
    $nhijosvivosc=$_POST['nhijosvivos'];
    $nhijosmuertosc=$_POST['nhijosmuertos'];
    $nhijosdestetadosc=$_POST['nhijosdestetados'];

    $sql3 = "UPDATE cerdos SET nombrecerdo=:nom, nregistro=:nreg, peso=:pes, raza=:raz, edad=:eda, edadpestro=:epestro, edadpparto=:eparto, nhijos=:nhij, npartos=:npart, nhijosvivos=:nvivos,
    nhijosmuertos=:nmuertos, nhijosdestetados=:ndestetados WHERE idcerdo=:icerdox";
    $stmt = $con->prepare($sql3);
    $stmt->bindParam(":nom",$nombrec);
    $stmt->bindParam(":nreg",$nregistroc);
    $stmt->bindParam(":pes",$pesoc);
    $stmt->bindParam(":raz",$razac);
    $stmt->bindParam(":eda",$edadc);
    $stmt->bindParam(":epestro",$epestroc);
    $stmt->bindParam(":eparto",$eppartoc);
    $stmt->bindParam(":nhij",$nhijosc);
    $stmt->bindParam(":npart",$npartosc);
    $stmt->bindParam(":nvivos",$nhijosvivosc);
    $stmt->bindParam(":nmuertos",$nhijosmuertosc);
    $stmt->bindParam(":ndestetados",$nhijosdestetadosc);
    $stmt->bindParam(":icerdox",$idc);
    if($stmt->execute()){
        header("location: /estroapp/cerdos.php");
        
    }else{
        print"complete todos los campos del formulario";
    }

?>