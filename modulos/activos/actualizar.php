<?php

include("../../config/conexion.php");

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$serie = $_POST['serie'];
$modelo = $_POST['modelo'];
$sistema_operativo = $_POST['sistema_operativo'];
$estado = $_POST['estado'];

$sql = "UPDATE activos SET

codigo='$codigo',
serie='$serie',
modelo='$modelo',
sistema_operativo='$sistema_operativo',
estado='$estado'

WHERE id='$id'";

if($conexion->query($sql) === TRUE){

    header("Location: index.php");

}else{

    echo "Error: " . $conexion->error;

}
?>