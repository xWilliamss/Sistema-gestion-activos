<?php

session_start();

include("../../config/conexion.php");

$activo_id = $_POST['activo_id'];
$usuario_id = $_POST['usuario_id'];


// VALIDAR SI EL ACTIVO YA ESTÁ ASIGNADO

$validar = "SELECT * FROM asignaciones
WHERE activo_id='$activo_id'
AND estado='activo'";

$resultadoValidar = $conexion->query($validar);

if($resultadoValidar->num_rows > 0){

    echo "
    <script>
        alert('Este activo ya está asignado');
        window.location='crear.php';
    </script>
    ";

    exit();
}


// INSERTAR ASIGNACIÓN

$sql = "INSERT INTO asignaciones
(activo_id, usuario_id, fecha_asignacion, estado)

VALUES

('$activo_id','$usuario_id',NOW(),'activo')";


if($conexion->query($sql) === TRUE){

    // REGISTRAR HISTORIAL

    $historial = "INSERT INTO historial_activos
    (activo_id, accion, descripcion)

    VALUES

    (
    '$activo_id',
    'Asignación',
    'Activo asignado a usuario'
    )";

    $conexion->query($historial);

    header("Location: index.php");

}else{

    echo "Error: " . $conexion->error;

}
?>