<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin', 'tecnico']);
require_post();
verify_csrf();
require_once __DIR__ . '/../../config/conexion.php';

$id = positive_int($_POST['id'] ?? null);
$estado = $_POST['estado'] ?? '';
if ($id === null || !in_array($estado, ['activo', 'pausado'], true)) {
    http_response_code(422);
    exit('Plan no válido.');
}

$stmt = $conexion->prepare('UPDATE planes_mantenimiento SET estado = ? WHERE id = ?');
$stmt->bind_param('si', $estado, $id);
if (!$stmt->execute()) {
    http_response_code(500);
    exit('No fue posible actualizar el plan.');
}

header('Location: index.php');
exit();
