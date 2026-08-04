<?php

session_start();
require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin', 'consulta']);

include("../../config/conexion.php");
include("../../templates/header.php");
include("../../templates/sidebar.php");

?>

<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            Asignaciones de Activos
        </h2>

        <?php if($_SESSION['rol'] != 'consulta'){ ?>
        <a href="crear.php" class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>
            Nueva Asignación

        </a>
        <?php } ?>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Activo</th>
                        <th>Usuario</th>
                        <th>Fecha Asignación</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $sql = "SELECT 
                    asignaciones.*,
                    activos.codigo,
                    usuarios.nombre,
                    usuarios.apellido

                    FROM asignaciones

                    INNER JOIN activos
                    ON asignaciones.activo_id = activos.id

                    INNER JOIN usuarios
                    ON asignaciones.usuario_id = usuarios.id

                    WHERE asignaciones.estado = 'activo'";

                    $resultado = $conexion->query($sql);

                    while($fila = $resultado->fetch_assoc()){

                    ?>

                    <tr>

                        <td><?= $fila['id'] ?></td>

                        <td><?= app_escape($fila['codigo']) ?></td>

                        <td>
                            <?= app_escape($fila['nombre']) ?>
                            <?= app_escape($fila['apellido']) ?>
                        </td>

                        <td><?= app_escape($fila['fecha_asignacion']) ?></td>

                        <td>

                            <span class="badge bg-success">
                                <?= app_escape($fila['estado']) ?>
                            </span>

                        </td>

                        <td>
                            <?php if($_SESSION['rol'] != 'consulta'){ ?>
                            <form action="devolver.php" method="POST" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= (int) $fila['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm"

                            onclick="return confirm('¿Deseas devolver este activo?')">

                                <i class="bi bi-arrow-return-left"></i>

                            </button>
                            </form>
                            <?php } ?>

                        </td>

                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php
include("../../templates/footer.php");
?>
