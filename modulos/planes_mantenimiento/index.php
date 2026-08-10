<?php

require_once __DIR__ . '/../../config/auth.php';
require_login();
require_once __DIR__ . '/../../config/conexion.php';

$sql = "SELECT p.*, a.codigo, a.modelo,
        CASE
            WHEN p.estado = 'pausado' THEN 'Pausado'
            WHEN p.proxima_fecha < CURDATE() THEN 'Vencido'
            WHEN p.proxima_fecha <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) THEN 'Próximo'
            ELSE 'Programado'
        END AS situacion
    FROM planes_mantenimiento p
    INNER JOIN activos a ON a.id = p.activo_id
    ORDER BY p.estado = 'activo' DESC, p.proxima_fecha ASC";
$planes = $conexion->query($sql);

include '../../templates/header.php';
include '../../templates/sidebar.php';
?>

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Planes preventivos</h2>
            <p class="text-muted mb-0">Programación anticipada de mantenimiento por activo.</p>
        </div>
        <?php if ($_SESSION['rol'] !== 'consulta'): ?>
            <a href="crear.php" class="btn btn-primary"><i class="bi bi-calendar-plus"></i> Nuevo plan</a>
        <?php endif; ?>
    </div>

    <div class="card shadow border-0">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark"><tr><th>Activo</th><th>Próxima fecha</th><th>Frecuencia</th><th>Prioridad</th><th>Técnico</th><th>Situación</th><th>Acciones</th></tr></thead>
                <tbody>
                    <?php while ($plan = $planes->fetch_assoc()): ?>
                        <?php
                        $clase = $plan['situacion'] === 'Vencido' ? 'bg-danger' : ($plan['situacion'] === 'Próximo' ? 'bg-warning text-dark' : ($plan['situacion'] === 'Pausado' ? 'bg-secondary' : 'bg-success'));
                        ?>
                        <tr>
                            <td><strong><?= app_escape($plan['codigo']) ?></strong><br><small class="text-muted"><?= app_escape($plan['modelo']) ?></small></td>
                            <td><?= app_escape($plan['proxima_fecha']) ?></td>
                            <td><?= (int) $plan['frecuencia_dias'] ?> días</td>
                            <td><?= app_escape(ucfirst($plan['prioridad'])) ?></td>
                            <td><?= app_escape($plan['tecnico'] ?: 'Sin asignar') ?></td>
                            <td><span class="badge <?= $clase ?>"><?= app_escape($plan['situacion']) ?></span></td>
                            <td>
                                <?php if ($_SESSION['rol'] !== 'consulta'): ?>
                                    <form action="cambiar_estado.php" method="POST" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="<?= (int) $plan['id'] ?>">
                                        <input type="hidden" name="estado" value="<?= $plan['estado'] === 'activo' ? 'pausado' : 'activo' ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"><?= $plan['estado'] === 'activo' ? 'Pausar' : 'Reactivar' ?></button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>
