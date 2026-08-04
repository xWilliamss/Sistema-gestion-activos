<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin']);
require_post();
verify_csrf();
require_once __DIR__ . '/../../config/conexion.php';

$nombre = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$departamento = trim($_POST['departamento'] ?? '');
$cargo = trim($_POST['cargo'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');

if ($nombre === '' || $apellido === '' || ($correo !== '' && !filter_var($correo, FILTER_VALIDATE_EMAIL))) {
    http_response_code(422);
    exit('Datos de usuario no válidos.');
}

$stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, departamento, cargo, correo, telefono, estado) VALUES (?, ?, ?, ?, ?, ?, 'activo')");
$stmt->bind_param('ssssss', $nombre, $apellido, $departamento, $cargo, $correo, $telefono);

if (!$stmt->execute()) {
    http_response_code(500);
    exit('No fue posible guardar el usuario.');
}

header('Location: index.php');
exit();
