<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin']);
require_post();
verify_csrf();
require_once __DIR__ . '/../../config/conexion.php';

$id = positive_int($_POST['id'] ?? null);
if ($id === null) {
    http_response_code(422);
    exit('Usuario no válido.');
}

$validar = $conexion->prepare("SELECT 1 FROM asignaciones WHERE usuario_id = ? AND estado = 'activo' LIMIT 1");
$validar->bind_param('i', $id);
$validar->execute();

if ($validar->get_result()->num_rows > 0) {
    header('Location: index.php?error=asignaciones_activas');
    exit();
}

$stmt = $conexion->prepare("UPDATE usuarios SET estado = 'inactivo' WHERE id = ?");
$stmt->bind_param('i', $id);

if (!$stmt->execute()) {
    http_response_code(500);
    exit('No fue posible desactivar el usuario.');
}

header('Location: index.php');
exit();
