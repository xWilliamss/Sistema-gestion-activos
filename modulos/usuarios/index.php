<?php

session_start();
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

if(!isset($_SESSION['usuario'])){
    header("Location: ../../login.php");
}

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

                            <?= $fila['nombre'] ?>
                            <?= $fila['apellido'] ?>

                        </td>

                        <td><?= $fila['departamento'] ?></td>

                        <td><?= $fila['cargo'] ?></td>

                        <td><?= $fila['correo'] ?></td>

                        <td><?= $fila['telefono'] ?></td>
                        

                        <td>

                            <span class="badge bg-success">

                                <?= $fila['estado'] ?>

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
                            <a href="eliminar.php?id=<?= $fila['id'] ?>"
                            class="btn btn-danger btn-sm"

                            onclick="return confirm('¿Deseas desactivar este usuario?')">

                                <i class="bi bi-trash"></i>

                            </a>
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