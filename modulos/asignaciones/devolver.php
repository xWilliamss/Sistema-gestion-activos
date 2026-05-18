<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../../login.php");
}

include("../../config/conexion.php");

$id = $_GET['id'];


// OBTENER DATOS DE ASIGNACIÓN

$sqlAsignacion = "SELECT * FROM asignaciones
WHERE id='$id'";

$resultadoAsignacion = $conexion->query($sqlAsignacion);

$asignacion = $resultadoAsignacion->fetch_assoc();

$activo_id = $asignacion['activo_id'];


// ACTUALIZAR ASIGNACIÓN

$sql = "UPDATE asignaciones

SET
estado='devuelto',
fecha_devolucion=NOW()

WHERE id='$id'";


if($conexion->query($sql) === TRUE){

    // REGISTRAR HISTORIAL

    $historial = "INSERT INTO historial_activos
    (activo_id, accion, descripcion)

    VALUES

    (
    '$activo_id',
    'Devolución',
    'Activo devuelto y liberado'
    )";

    $conexion->query($historial);

    header("Location: index.php");

}else{

    echo "Error: " . $conexion->error;

}
?>