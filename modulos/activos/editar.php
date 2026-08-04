<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin', 'tecnico']);
require_once __DIR__ . '/../../config/conexion.php';

$id = positive_int($_GET['id'] ?? null);
if ($id === null) {
    http_response_code(404);
    exit('Activo no válido.');
}

$stmt = $conexion->prepare('SELECT id, codigo, serie, modelo, sistema_operativo, estado FROM activos WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $id);
$stmt->execute();
$activo = $stmt->get_result()->fetch_assoc();
if (!$activo) {
    http_response_code(404);
    exit('Activo no encontrado.');
}

include '../../templates/header.php';
include '../../templates/sidebar.php';
?>

<div class="container-fluid p-4">
    <div class="card shadow border-0">
        <div class="card-header bg-warning"><h4>Editar Activo</h4></div>
        <div class="card-body">
            <form action="actualizar.php" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= (int) $activo['id'] ?>">
                <div class="row">
                    <div class="col-md-6 mb-3"><label>Código</label><input type="text" name="codigo" value="<?= app_escape($activo['codigo']) ?>" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label>Serie</label><input type="text" name="serie" value="<?= app_escape($activo['serie']) ?>" class="form-control"></div>
                    <div class="col-md-6 mb-3"><label>Modelo</label><input type="text" name="modelo" value="<?= app_escape($activo['modelo']) ?>" class="form-control"></div>
                    <div class="col-md-6 mb-3"><label>Sistema Operativo</label><input type="text" name="sistema_operativo" value="<?= app_escape($activo['sistema_operativo']) ?>" class="form-control"></div>
                    <div class="col-md-6 mb-3">
                        <label>Estado</label>
                        <select name="estado" class="form-select">
                            <?php foreach (['activo' => 'Activo', 'dañado' => 'Dañado', 'reparacion' => 'Reparación', 'baja' => 'Baja'] as $valor => $etiqueta): ?>
                                <option value="<?= $valor ?>" <?= $activo['estado'] === $valor ? 'selected' : '' ?>><?= $etiqueta ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="index.php" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>
