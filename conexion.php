<?php

class conexion{
    const user='ug5vgjxbyeaedlrr';
    const pass='kCFWiuE0mPwi2EO14Yss';
    const bd='bwv47eidtri3qd3jtzav';
    const servidor='bwv47eidtri3qd3jtzav-mysql.services.clever-cloud.com';

    public function conectarbd(){
        $conectar=new mysqli(self::servidor, self::user, self::pass, self::bd);
        if($conectar->connect_errno){
            die("Error en la conexion".$conectar->connect_error);
        }
        return $conectar;
    }
}

?>