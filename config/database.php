<?php

class bdate{
    private $hostname = "bwv47eidtri3qd3jtzav-mysql.services.clever-cloud.com";
    private $database="bwv47eidtri3qd3jtzav";
    private $charset="utf8";

    function conectar(){

        try{
        $conexion = "mysql:host". $this->hostname . "; dbname=". $this->database . "; charset=". $this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false 
        ];

        $pdo = new PDO('mysql:dbname=bwv47eidtri3qd3jtzav;host=bwv47eidtri3qd3jtzav-mysql.services.clever-cloud.com', 'ug5vgjxbyeaedlrr', 'kCFWiuE0mPwi2EO14Yss', $options);
        return $pdo;
    }catch(PDOException $e){
        echo 'Error de conexion a base de datos: '. $e->getMessage();
        exit;
    }

    }
}