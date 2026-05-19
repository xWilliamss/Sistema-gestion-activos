<?php

session_start();

include("../../config/conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$departamento = $_POST['departamento'];
$cargo = $_POST['cargo'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO usuarios

(
nombre,
apellido,
departamento,
cargo,
correo,
telefono,
estado
)

VALUES

(
'$nombre',
'$apellido',
'$departamento',
'$cargo',
'$correo',
'$telefono',
'activo'
)";


if($conexion->query($sql) === TRUE){

    header("Location: index.php");

}else{

    echo "Error: " . $conexion->error;

}
?>