<?php

include("../../config/conexion.php");

$id = $_GET['id'];

$sql = "UPDATE activos 
SET estado='baja'
WHERE id='$id'";

if($conexion->query($sql) === TRUE){

    // registrar historial

    $historial = "INSERT INTO historial_activos
    (activo_id, accion, descripcion)
    VALUES
    ('$id', 'Baja de activo', 'Activo marcado como baja')";

    $conexion->query($historial);

    header("Location: index.php");

}else{

    echo "Error: " . $conexion->error;

}
?>