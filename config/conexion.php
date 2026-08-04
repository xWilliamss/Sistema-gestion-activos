<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'gestion_activos26';

$conexion = new mysqli($server, $user, $password, $db);

if ($conexion->connect_errno) {
    die('Conexión fallida: ' . $conexion->connect_error);
}

if (!$conexion->set_charset('utf8mb4')) {
    die('No se pudo configurar UTF-8: ' . $conexion->error);
}
