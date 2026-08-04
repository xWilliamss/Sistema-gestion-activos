<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin']);
require_post();
verify_csrf();
require_once __DIR__ . '/../../config/conexion.php';

$activoId = positive_int($_POST['activo_id'] ?? null);
$usuarioId = positive_int($_POST['usuario_id'] ?? null);

if ($activoId === null || $usuarioId === null) {
    http_response_code(422);
    exit('Activo o usuario no válido.');
}

try {
    $conexion->begin_transaction();

    // El bloqueo del activo evita dos asignaciones simultáneas del mismo equipo.
    $activo = $conexion->prepare("SELECT id FROM activos WHERE id = ? AND estado <> 'baja' FOR UPDATE");
    $activo->bind_param('i', $activoId);
    $activo->execute();
    if (!$activo->get_result()->fetch_assoc()) {
        throw new RuntimeException('Activo no disponible.');
    }

    $usuario = $conexion->prepare("SELECT id FROM usuarios WHERE id = ? AND estado = 'activo' LIMIT 1");
    $usuario->bind_param('i', $usuarioId);
    $usuario->execute();
    if (!$usuario->get_result()->fetch_assoc()) {
        throw new RuntimeException('Usuario no disponible.');
    }

    $asignacionActiva = $conexion->prepare("SELECT id FROM asignaciones WHERE activo_id = ? AND estado = 'activo' LIMIT 1");
    $asignacionActiva->bind_param('i', $activoId);
    $asignacionActiva->execute();
    if ($asignacionActiva->get_result()->fetch_assoc()) {
        throw new RuntimeException('El activo ya está asignado.');
    }

    $asignar = $conexion->prepare("INSERT INTO asignaciones (activo_id, usuario_id, fecha_asignacion, estado) VALUES (?, ?, NOW(), 'activo')");
    $asignar->bind_param('ii', $activoId, $usuarioId);
    $asignar->execute();

    $historial = $conexion->prepare("INSERT INTO historial_activos (activo_id, accion, descripcion) VALUES (?, 'Asignación', 'Activo asignado a usuario')");
    $historial->bind_param('i', $activoId);
    $historial->execute();
    $conexion->commit();
} catch (Throwable $e) {
    $conexion->rollback();
    header('Location: crear.php?error=asignacion');
    exit();
}

header('Location: index.php');
exit();
