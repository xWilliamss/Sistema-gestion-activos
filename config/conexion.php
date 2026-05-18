<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "gestion_activos26";

$conexion = new mysqli($server,$user,$password,$db);

if ($conexion->connect_errno) {
    die("Conexion fallida" . $conexion->connect_errno);
} 
?>
