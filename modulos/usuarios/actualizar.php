<?php

session_start();

include("../../config/conexion.php");

$id = $_POST['id'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$departamento = $_POST['departamento'];
$cargo = $_POST['cargo'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

$sql = "UPDATE usuarios SET

nombre='$nombre',
apellido='$apellido',
departamento='$departamento',
cargo='$cargo',
correo='$correo',
telefono='$telefono'

WHERE id='$id'";


if($conexion->query($sql) === TRUE){

    header("Location: index.php");

}else{

    echo "Error: " . $conexion->error;

}
?>