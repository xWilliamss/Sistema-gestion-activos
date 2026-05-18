<?php

session_start();

include("config/conexion.php");

$usuario = $_POST['usuario'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM sistema_usuarios
WHERE usuario='$usuario'
AND password='$password'
AND estado='activo'";

$resultado = $conexion->query($sql);

if($resultado->num_rows > 0){

    $datos = $resultado->fetch_assoc();

    $_SESSION['usuario'] = $datos['usuario'];
    $_SESSION['nombre'] = $datos['nombre'];
    $_SESSION['rol'] = $datos['rol'];

    header("Location: index.php");

}else{

    echo "
    <script>
        alert('Usuario o contraseña incorrectos');
        window.location='login.php';
    </script>
    ";

}
?>