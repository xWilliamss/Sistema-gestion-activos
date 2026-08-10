<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin', 'tecnico']);
require_once __DIR__ . '/../../config/conexion.php';

$activos = $conexion->query("SELECT id, codigo, modelo FROM activos WHERE estado <> 'baja' ORDER BY codigo");
include '../../templates/header.php';
include '../../templates/sidebar.php';
?>

<div class="container-fluid p-4">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white"><h4 class="mb-0">Programar mantenimiento preventivo</h4></div>
        <div class="card-body">
            <form action="guardar.php" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Activo</label>
                        <select name="activo_id" class="form-select" required>
                            <option value="">Seleccione un activo</option>
                            <?php while ($activo = $activos->fetch_assoc()): ?>
                                <option value="<?= (int) $activo['id'] ?>"><?= app_escape($activo['codigo']) ?> — <?= app_escape($activo['modelo']) ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Frecuencia</label>
                        <select name="frecuencia_dias" class="form-select" required>
                            <option value="30">Cada 30 días</option>
                            <option value="60">Cada 60 días</option>
                            <option value="90" selected>Cada 90 días</option>
                            <option value="180">Cada 180 días</option>
                            <option value="365">Anual</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Próxima fecha</label>
                        <input type="date" name="proxima_fecha" class="form-control" value="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Técnico responsable</label>
                        <input type="text" name="tecnico" class="form-control" value="<?= app_escape($_SESSION['nombre'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Prioridad</label>
                        <select name="prioridad" class="form-select">
                            <option value="baja">Baja</option>
                            <option value="media" selected>Media</option>
                            <option value="alta">Alta</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Notas</label>
                        <textarea name="notas" class="form-control" rows="3" placeholder="Alcance del mantenimiento o instrucciones especiales"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Guardar plan</button>
                <a href="index.php" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>
