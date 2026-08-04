<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin']);
require_post();
verify_csrf();
require_once __DIR__ . '/../../config/conexion.php';

$id = positive_int($_POST['id'] ?? null);
if ($id === null) {
    http_response_code(422);
    exit('Activo no válido.');
}

try {
    $conexion->begin_transaction();

    $baja = $conexion->prepare("UPDATE activos SET estado = 'baja' WHERE id = ?");
    $baja->bind_param('i', $id);
    $baja->execute();

    if ($baja->affected_rows !== 1) {
        throw new RuntimeException('El activo no existe o ya estaba dado de baja.');
    }

    $historial = $conexion->prepare("INSERT INTO historial_activos (activo_id, accion, descripcion) VALUES (?, 'Baja de activo', 'Activo marcado como baja')");
    $historial->bind_param('i', $id);
    $historial->execute();
    $conexion->commit();
} catch (Throwable $e) {
    $conexion->rollback();
    http_response_code(500);
    exit('No fue posible dar de baja el activo.');
}

header('Location: index.php');
exit();
