<?php

session_start();
require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin', 'consulta']);
/* 
En caso de ocultar esta pagina los roles que nos sean el admin.
if($_SESSION['rol'] != 'admin'){

    echo "

    <div style='padding:20px;
    font-family:Arial;'>

        Acceso denegado

    </div>

    ";

    exit();
}
*/

include("../../config/conexion.php");
include("../../templates/header.php");
include("../../templates/sidebar.php");

?>

<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Usuarios
        </h2>

        <?php if($_SESSION['rol'] != 'consulta'){ ?>
        <a href="crear.php"
        class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>
            Nuevo Usuario

        </a>
        <?php } ?>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>Departamento</th>
                        <th>Cargo</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $sql = "SELECT * FROM usuarios
                    WHERE estado != 'inactivo'";

                    $resultado = $conexion->query($sql);

                    while($fila = $resultado->fetch_assoc()){

                    ?>

                    <tr>

                        <td><?= $fila['id'] ?></td>

                        <td>

                            <?= app_escape($fila['nombre']) ?>
                            <?= app_escape($fila['apellido']) ?>

                        </td>

                        <td><?= app_escape($fila['departamento']) ?></td>

                        <td><?= app_escape($fila['cargo']) ?></td>

                        <td><?= app_escape($fila['correo']) ?></td>

                        <td><?= app_escape($fila['telefono']) ?></td>
                        

                        <td>

                            <span class="badge bg-success">

                                <?= app_escape($fila['estado']) ?>

                            </span>

                        </td>

                        <td>

                            <!--ocultar botines solo para rol de consulta-->
                            <?php if($_SESSION['rol'] != 'consulta'){ ?>
                            <a href="editar.php?id=<?= $fila['id'] ?>"
                            class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil"></i>

                            </a>
                            <?php } ?>

                            <?php if($_SESSION['rol'] != 'consulta'){ ?>
                            <form action="eliminar.php" method="POST" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= (int) $fila['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm"

                            onclick="return confirm('¿Deseas desactivar este usuario?')">

                                <i class="bi bi-trash"></i>

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
