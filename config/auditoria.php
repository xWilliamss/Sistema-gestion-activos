<?php

function registrar_historial(mysqli $conexion, int $activoId, string $accion, string $descripcion): void
{
    $usuario = $_SESSION['usuario'] ?? 'sistema';

    $stmt = $conexion->prepare(
        'INSERT INTO historial_activos (activo_id, accion, descripcion, usuario) VALUES (?, ?, ?, ?)'
    );
    $stmt->bind_param('isss', $activoId, $accion, $descripcion, $usuario);

    if (!$stmt->execute()) {
        throw new RuntimeException('No fue posible registrar la trazabilidad del activo.');
    }
}
