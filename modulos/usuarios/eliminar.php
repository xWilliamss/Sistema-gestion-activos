
<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../../login.php");
}

include("../../config/conexion.php");

$id = $_GET['id'];


// VALIDAR SI TIENE ASIGNACIONES ACTIVAS

$validar = "

SELECT * FROM asignaciones

WHERE usuario_id='$id'
AND estado='activo'

";

$resultadoValidar = $conexion->query($validar);


if($resultadoValidar->num_rows > 0){

    echo "

    <script>

        alert('No se puede desactivar porque el usuario tiene activos asignados');

        window.location='index.php';

    </script>

    ";

    exit();

}


// BAJA LÓGICA

$sql = "

UPDATE usuarios

SET estado='inactivo'

WHERE id='$id'

";


if($conexion->query($sql) === TRUE){

    header("Location: index.php");

}else{

    echo "Error: " . $conexion->error;

}
?>