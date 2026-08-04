<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin', 'tecnico']);
require_post();
verify_csrf();
require_once __DIR__ . '/../../config/conexion.php';

$activoId = positive_int($_POST['activo_id'] ?? null);
$tipo = $_POST['tipo'] ?? '';
$descripcion = trim($_POST['descripcion'] ?? '');
$tecnico = trim($_POST['tecnico'] ?? '');
$costo = $_POST['costo'] ?? '';
$tiposPermitidos = ['Preventivo', 'Correctivo'];

if ($activoId === null || !in_array($tipo, $tiposPermitidos, true) || ($costo !== '' && (!is_numeric($costo) || (float) $costo < 0))) {
    http_response_code(422);
    exit('Datos de mantenimiento no válidos.');
}

$costo = $costo === '' ? 0.0 : (float) $costo;

try {
    $conexion->begin_transaction();
    $activo = $conexion->prepare("SELECT id FROM activos WHERE id = ? AND estado <> 'baja' FOR UPDATE");
    $activo->bind_param('i', $activoId);
    $activo->execute();
    if (!$activo->get_result()->fetch_assoc()) {
        throw new RuntimeException('Activo no disponible.');
    }

    $guardar = $conexion->prepare('INSERT INTO mantenimientos (activo_id, tipo, descripcion, fecha, costo, tecnico) VALUES (?, ?, ?, NOW(), ?, ?)');
    $guardar->bind_param('issds', $activoId, $tipo, $descripcion, $costo, $tecnico);
    $guardar->execute();

    $detalle = $tipo . ' registrado';
    $historial = $conexion->prepare("INSERT INTO historial_activos (activo_id, accion, descripcion) VALUES (?, 'Mantenimiento', ?)");
    $historial->bind_param('is', $activoId, $detalle);
    $historial->execute();
    $conexion->commit();
} catch (Throwable $e) {
    $conexion->rollback();
    http_response_code(500);
    exit('No fue posible registrar el mantenimiento.');
}

header('Location: index.php');
exit();
