<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin']);
require_post();
verify_csrf();
require_once __DIR__ . '/../../config/conexion.php';

$id = positive_int($_POST['id'] ?? null);
if ($id === null) {
    http_response_code(422);
    exit('Asignación no válida.');
}

try {
    $conexion->begin_transaction();

    $buscar = $conexion->prepare("SELECT activo_id FROM asignaciones WHERE id = ? AND estado = 'activo' FOR UPDATE");
    $buscar->bind_param('i', $id);
    $buscar->execute();
    $asignacion = $buscar->get_result()->fetch_assoc();
    if (!$asignacion) {
        throw new RuntimeException('La asignación no está activa.');
    }

    // El esquema admite activo/finalizado; se usa finalizado como estado de devolución.
    $devolver = $conexion->prepare("UPDATE asignaciones SET estado = 'finalizado', fecha_devolucion = NOW() WHERE id = ?");
    $devolver->bind_param('i', $id);
    $devolver->execute();

    $historial = $conexion->prepare("INSERT INTO historial_activos (activo_id, accion, descripcion) VALUES (?, 'Devolución', 'Activo devuelto y liberado')");
    $historial->bind_param('i', $asignacion['activo_id']);
    $historial->execute();
    $conexion->commit();
} catch (Throwable $e) {
    $conexion->rollback();
    http_response_code(500);
    exit('No fue posible devolver el activo.');
}

header('Location: index.php');
exit();
