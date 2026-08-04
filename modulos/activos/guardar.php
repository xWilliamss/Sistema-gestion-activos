<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin']);
require_post();
verify_csrf();
require_once __DIR__ . '/../../config/conexion.php';

$codigo = trim($_POST['codigo'] ?? '');
$serie = trim($_POST['serie'] ?? '');
$modelo = trim($_POST['modelo'] ?? '');
$sistemaOperativo = trim($_POST['sistema_operativo'] ?? '');
$tipoId = positive_int($_POST['tipo_id'] ?? null);
$estado = $_POST['estado'] ?? '';
$estadosPermitidos = ['activo', 'dañado', 'reparacion', 'baja'];

if ($codigo === '' || $tipoId === null || !in_array($estado, $estadosPermitidos, true)) {
    http_response_code(422);
    exit('Datos de activo no válidos.');
}

$stmt = $conexion->prepare('INSERT INTO activos (codigo, serie, modelo, sistema_operativo, tipo_id, estado) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->bind_param('ssssis', $codigo, $serie, $modelo, $sistemaOperativo, $tipoId, $estado);

if (!$stmt->execute()) {
    http_response_code(500);
    exit('No fue posible guardar el activo.');
}

$_SESSION['mensaje'] = 'Activo agregado correctamente.';
$_SESSION['tipo_mensaje'] = 'success';
header('Location: index.php');
exit();
