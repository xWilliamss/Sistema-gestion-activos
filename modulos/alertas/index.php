<?php

require_once __DIR__ . '/../../config/auth.php';
require_login();
require_once __DIR__ . '/../../config/conexion.php';

$garantiasVencidas = $conexion->query("SELECT id, codigo, modelo, garantia_fin FROM activos WHERE estado <> 'baja' AND garantia_fin IS NOT NULL AND garantia_fin < CURDATE() ORDER BY garantia_fin ASC");
$garantiasProximas = $conexion->query("SELECT id, codigo, modelo, garantia_fin FROM activos WHERE estado <> 'baja' AND garantia_fin BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) ORDER BY garantia_fin ASC");
$mantenimientosVencidos = $conexion->query("SELECT p.*, a.codigo, a.modelo FROM planes_mantenimiento p INNER JOIN activos a ON a.id = p.activo_id WHERE p.estado = 'activo' AND p.proxima_fecha < CURDATE() ORDER BY p.proxima_fecha ASC");
$mantenimientosProximos = $conexion->query("SELECT p.*, a.codigo, a.modelo FROM planes_mantenimiento p INNER JOIN activos a ON a.id = p.activo_id WHERE p.estado = 'activo' AND p.proxima_fecha BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) ORDER BY p.proxima_fecha ASC");

include '../../templates/header.php';
include '../../templates/sidebar.php';
?>

<div class="container-fluid p-4">
    <div class="mb-4">
        <h2 class="mb-1">Centro de alertas</h2>
        <p class="text-muted mb-0">Se actualiza automáticamente al consultar la información del inventario.</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card shadow border-0 h-100">
                <div class="card-header bg-danger text-white"><i class="bi bi-exclamation-octagon"></i> Mantenimientos vencidos</div>
                <div class="card-body">
                    <?php if ($mantenimientosVencidos->num_rows === 0): ?><p class="text-muted mb-0">No hay mantenimientos preventivos vencidos.</p><?php endif; ?>
                    <?php while ($item = $mantenimientosVencidos->fetch_assoc()): ?>
                        <div class="border-bottom py-2"><strong><?= app_escape($item['codigo']) ?></strong> — <?= app_escape($item['modelo']) ?><br><small>Programado para <?= app_escape($item['proxima_fecha']) ?> · Prioridad <?= app_escape($item['prioridad']) ?></small></div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow border-0 h-100">
                <div class="card-header bg-warning text-dark"><i class="bi bi-tools"></i> Mantenimientos próximos (30 días)</div>
                <div class="card-body">
                    <?php if ($mantenimientosProximos->num_rows === 0): ?><p class="text-muted mb-0">No hay mantenimientos próximos.</p><?php endif; ?>
                    <?php while ($item = $mantenimientosProximos->fetch_assoc()): ?>
                        <div class="border-bottom py-2"><strong><?= app_escape($item['codigo']) ?></strong> — <?= app_escape($item['modelo']) ?><br><small>Programado para <?= app_escape($item['proxima_fecha']) ?> · Técnico: <?= app_escape($item['tecnico'] ?: 'Sin asignar') ?></small></div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow border-0 h-100">
                <div class="card-header bg-danger text-white"><i class="bi bi-shield-x"></i> Garantías vencidas</div>
                <div class="card-body">
                    <?php if ($garantiasVencidas->num_rows === 0): ?><p class="text-muted mb-0">No hay garantías vencidas registradas.</p><?php endif; ?>
                    <?php while ($item = $garantiasVencidas->fetch_assoc()): ?>
                        <div class="border-bottom py-2"><strong><?= app_escape($item['codigo']) ?></strong> — <?= app_escape($item['modelo']) ?><br><small>Venció el <?= app_escape($item['garantia_fin']) ?></small></div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow border-0 h-100">
                <div class="card-header bg-warning text-dark"><i class="bi bi-shield-exclamation"></i> Garantías por vencer (30 días)</div>
                <div class="card-body">
                    <?php if ($garantiasProximas->num_rows === 0): ?><p class="text-muted mb-0">No hay garantías próximas a vencer.</p><?php endif; ?>
                    <?php while ($item = $garantiasProximas->fetch_assoc()): ?>
                        <div class="border-bottom py-2"><strong><?= app_escape($item['codigo']) ?></strong> — <?= app_escape($item['modelo']) ?><br><small>Vence el <?= app_escape($item['garantia_fin']) ?></small></div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>
