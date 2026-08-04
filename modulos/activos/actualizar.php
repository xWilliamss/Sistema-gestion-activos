<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin', 'tecnico']);
require_post();
verify_csrf();
require_once __DIR__ . '/../../config/conexion.php';

$id = positive_int($_POST['id'] ?? null);
$codigo = trim($_POST['codigo'] ?? '');
$serie = trim($_POST['serie'] ?? '');
$modelo = trim($_POST['modelo'] ?? '');
$sistemaOperativo = trim($_POST['sistema_operativo'] ?? '');
$estado = $_POST['estado'] ?? '';
$estadosPermitidos = ['activo', 'dañado', 'reparacion', 'baja'];

if ($id === null || $codigo === '' || !in_array($estado, $estadosPermitidos, true)) {
    http_response_code(422);
    exit('Datos de activo no válidos.');
}

$stmt = $conexion->prepare('UPDATE activos SET codigo = ?, serie = ?, modelo = ?, sistema_operativo = ?, estado = ? WHERE id = ?');
$stmt->bind_param('sssssi', $codigo, $serie, $modelo, $sistemaOperativo, $estado, $id);

if (!$stmt->execute()) {
    http_response_code(500);
    exit('No fue posible actualizar el activo.');
}

header('Location: index.php');
exit();
