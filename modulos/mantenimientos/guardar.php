<?php

session_start();

include("../../config/conexion.php");

$activo_id = $_POST['activo_id'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$tecnico = $_POST['tecnico'];
$costo = $_POST['costo'];

$sql = "INSERT INTO mantenimientos

(activo_id, tipo, descripcion, fecha, costo, tecnico)

VALUES

(
'$activo_id',
'$tipo',
'$descripcion',
NOW(),
'$costo',
'$tecnico'
)";


if($conexion->query($sql) === TRUE){

    // HISTORIAL

    $historial = "INSERT INTO historial_activos

    (activo_id, accion, descripcion)

    VALUES

    (
    '$activo_id',
    'Mantenimiento',
    '$tipo registrado'
    )";

    $conexion->query($historial);

    header("Location: index.php");

}else{

    echo "Error: " . $conexion->error;

}
?>