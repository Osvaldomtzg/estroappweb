<?php 

$server = "bwv47eidtri3qd3jtzav-mysql.services.clever-cloud.com";
$user = "ug5vgjxbyeaedlrr";
$pass = "kCFWiuE0mPwi2EO14Yss";
$database = "bwv47eidtri3qd3jtzav";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>