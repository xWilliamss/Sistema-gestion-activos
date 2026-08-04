<?php

require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin']);
require_once __DIR__ . '/../../config/conexion.php';

$id = positive_int($_GET['id'] ?? null);
if ($id === null) {
    http_response_code(404);
    exit('Usuario no válido.');
}

$stmt = $conexion->prepare('SELECT id, nombre, apellido, departamento, cargo, correo, telefono FROM usuarios WHERE id = ? AND estado = \'activo\' LIMIT 1');
$stmt->bind_param('i', $id);
$stmt->execute();
$usuario = $stmt->get_result()->fetch_assoc();
if (!$usuario) {
    http_response_code(404);
    exit('Usuario no encontrado.');
}

include '../../templates/header.php';
include '../../templates/sidebar.php';
?>

<div class="container-fluid p-4">
    <div class="card shadow border-0">
        <div class="card-header bg-warning"><h4>Editar Usuario</h4></div>
        <div class="card-body">
            <form action="actualizar.php" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= (int) $usuario['id'] ?>">
                <div class="row">
                    <div class="col-md-6 mb-3"><label>Nombre</label><input type="text" name="nombre" value="<?= app_escape($usuario['nombre']) ?>" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label>Apellido</label><input type="text" name="apellido" value="<?= app_escape($usuario['apellido']) ?>" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label>Departamento</label><input type="text" name="departamento" value="<?= app_escape($usuario['departamento']) ?>" class="form-control"></div>
                    <div class="col-md-6 mb-3"><label>Cargo</label><input type="text" name="cargo" value="<?= app_escape($usuario['cargo']) ?>" class="form-control"></div>
                    <div class="col-md-6 mb-3"><label>Correo</label><input type="email" name="correo" value="<?= app_escape($usuario['correo']) ?>" class="form-control"></div>
                    <div class="col-md-6 mb-3"><label>Teléfono</label><input type="text" name="telefono" value="<?= app_escape($usuario['telefono']) ?>" class="form-control"></div>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="index.php" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>
