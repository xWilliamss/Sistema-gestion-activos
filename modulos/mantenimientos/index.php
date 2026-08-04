<?php

session_start();
require_once __DIR__ . '/../../config/auth.php';
require_login();

include("../../config/conexion.php");
include("../../templates/header.php");
include("../../templates/sidebar.php");

?>

<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            Mantenimientos
        </h2>
        
        <?php if($_SESSION['rol'] != 'consulta'){ ?>
        <a href="crear.php" class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>
            Nuevo Mantenimiento

        </a>
        <?php } ?>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Activo</th>
                        <th>Tipo</th>
                        <th>Técnico</th>
                        <th>Descripción</th>
                        <th>Fecha</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $sql = "

                    SELECT
                    mantenimientos.*,
                    activos.codigo

                    FROM mantenimientos

                    INNER JOIN activos
                    ON mantenimientos.activo_id = activos.id

                    ORDER BY fecha DESC

                    ";

                    $resultado = $conexion->query($sql);

                    while($fila = $resultado->fetch_assoc()){

                    ?>

                    <tr>

                        <td><?= $fila['id'] ?></td>

                        <td><?= app_escape($fila['codigo']) ?></td>

                        <td>

                            <span class="badge bg-warning text-dark">

                                <?= app_escape($fila['tipo']) ?>

                            </span>

                        </td>

                        <td><?= app_escape($fila['tecnico']) ?></td>

                        <td><?= app_escape($fila['descripcion']) ?></td>

                        <td><?= app_escape($fila['fecha']) ?></td>

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
