<?php

session_start(); // 1. Inicia la sesión al principio.
include("../../Config/conexion.php");

$codigo = $_POST['codigo'];
$serie = $_POST['serie'];
$modelo = $_POST['modelo'];
$sistema_operativo = $_POST['sistema_operativo'];
$tipo_id = $_POST['tipo_id'];
$estado = $_POST['estado'];

$sql = "INSERT INTO activos (codigo, serie, modelo, sistema_operativo, tipo_id, estado) 
VALUES ('$codigo','$serie','$modelo','$sistema_operativo','$tipo_id','$estado')";

if ($conexion->query($sql) === TRUE){

    // 2. Crea la variable de sesión con el mensaje.
    $_SESSION['mensaje'] = "¡Activo agregado correctamente!";
    $_SESSION['tipo_mensaje'] ="sucess";

    header("Location: index.php");
    exit(); // Siempre usa exit después de un header.

} else{
    echo "Error: " . $conexion->error; 

}

?>