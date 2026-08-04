<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin', 'tecnico']);
require_once __DIR__ . '/../../config/conexion.php';

$id = positive_int($_GET['id'] ?? null);
if ($id === null) {
    http_response_code(404);
    exit('Activo no válido.');
}

$activoStmt = $conexion->prepare('SELECT codigo FROM activos WHERE id = ? LIMIT 1');
$activoStmt->bind_param('i', $id);
$activoStmt->execute();
$activo = $activoStmt->get_result()->fetch_assoc();
if (!$activo) {
    http_response_code(404);
    exit('Activo no encontrado.');
}

$historialStmt = $conexion->prepare('SELECT id, accion, descripcion, fecha FROM historial_activos WHERE activo_id = ? ORDER BY fecha DESC');
$historialStmt->bind_param('i', $id);
$historialStmt->execute();
$historial = $historialStmt->get_result();

include '../../templates/header.php';
include '../../templates/sidebar.php';
?>

<div class="container-fluid p-4">
    <div class="card shadow border-0">
        <div class="card-header bg-info text-white"><h4>Historial del Activo: <?= app_escape($activo['codigo']) ?></h4></div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark"><tr><th>ID</th><th>Acción</th><th>Descripción</th><th>Fecha</th></tr></thead>
                <tbody>
                    <?php while ($fila = $historial->fetch_assoc()): ?>
                    <tr>
                        <td><?= (int) $fila['id'] ?></td>
                        <td><span class="badge bg-primary"><?= app_escape($fila['accion']) ?></span></td>
                        <td><?= app_escape($fila['descripcion']) ?></td>
                        <td><?= app_escape($fila['fecha']) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>
