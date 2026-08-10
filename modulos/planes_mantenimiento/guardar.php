<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin', 'tecnico']);
require_post();
verify_csrf();
require_once __DIR__ . '/../../config/conexion.php';

$activoId = positive_int($_POST['activo_id'] ?? null);
$frecuencia = positive_int($_POST['frecuencia_dias'] ?? null);
$proximaFecha = valid_optional_date($_POST['proxima_fecha'] ?? '');
$tecnico = trim($_POST['tecnico'] ?? '');
$prioridad = $_POST['prioridad'] ?? '';
$notas = trim($_POST['notas'] ?? '');

if ($activoId === null || $frecuencia === null || $frecuencia > 3650 || $proximaFecha === null || !in_array($prioridad, ['baja', 'media', 'alta'], true)) {
    http_response_code(422);
    exit('Datos del plan no válidos.');
}

try {
    $conexion->begin_transaction();
    $activo = $conexion->prepare("SELECT id FROM activos WHERE id = ? AND estado <> 'baja' FOR UPDATE");
    $activo->bind_param('i', $activoId);
    $activo->execute();
    if (!$activo->get_result()->fetch_assoc()) {
        throw new RuntimeException('Activo no disponible.');
    }

    $existente = $conexion->prepare("SELECT id FROM planes_mantenimiento WHERE activo_id = ? AND estado = 'activo' LIMIT 1");
    $existente->bind_param('i', $activoId);
    $existente->execute();
    if ($existente->get_result()->fetch_assoc()) {
        throw new RuntimeException('El activo ya tiene un plan preventivo activo.');
    }

    $guardar = $conexion->prepare("INSERT INTO planes_mantenimiento (activo_id, frecuencia_dias, proxima_fecha, tecnico, prioridad, notas) VALUES (?, ?, ?, ?, ?, ?)");
    $guardar->bind_param('iissss', $activoId, $frecuencia, $proximaFecha, $tecnico, $prioridad, $notas);
    $guardar->execute();
    $conexion->commit();
} catch (Throwable $e) {
    $conexion->rollback();
    header('Location: crear.php?error=plan');
    exit();
}

header('Location: index.php');
exit();
