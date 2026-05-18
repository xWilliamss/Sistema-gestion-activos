<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}

include("config/conexion.php");
include("templates/header.php");
include("templates/sidebar.php");


// TOTAL ACTIVOS

$sqlActivos = "SELECT COUNT(*) total FROM activos
WHERE estado != 'baja'";

$resultadoActivos = $conexion->query($sqlActivos);
$totalActivos = $resultadoActivos->fetch_assoc()['total'];


// TOTAL USUARIOS

$sqlUsuarios = "SELECT COUNT(*) total FROM usuarios";

$resultadoUsuarios = $conexion->query($sqlUsuarios);
$totalUsuarios = $resultadoUsuarios->fetch_assoc()['total'];


// ASIGNACIONES ACTIVAS

$sqlAsignaciones = "SELECT COUNT(*) total FROM asignaciones
WHERE estado='activo'";

$resultadoAsignaciones = $conexion->query($sqlAsignaciones);
$totalAsignaciones = $resultadoAsignaciones->fetch_assoc()['total'];


// MANTENIMIENTOS

$sqlMantenimientos = "SELECT COUNT(*) total FROM mantenimientos";

$resultadoMantenimientos = $conexion->query($sqlMantenimientos);
$totalMantenimientos = $resultadoMantenimientos->fetch_assoc()['total'];

?>

<div class="container-fluid p-4">

    <div class="mb-4">

        <h2>
            Dashboard
        </h2>

        <p class="text-muted">

            Bienvenido,
            <?= $_SESSION['nombre'] ?>

        </p>

    </div>

    <div class="row g-4">

        <!-- ACTIVOS -->

        <div class="col-md-3">

            <div class="card shadow border-0 bg-primary text-white">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>
                                Activos
                            </h6>

                            <h2>
                                <?= $totalActivos ?>
                            </h2>

                        </div>

                        <i class="bi bi-pc-display"
                        style="font-size: 50px;"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- USUARIOS -->

        <div class="col-md-3">

            <div class="card shadow border-0 bg-success text-white">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>
                                Usuarios
                            </h6>

                            <h2>
                                <?= $totalUsuarios ?>
                            </h2>

                        </div>

                        <i class="bi bi-people"
                        style="font-size: 50px;"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- ASIGNACIONES -->

        <div class="col-md-3">

            <div class="card shadow border-0 bg-warning text-dark">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>
                                Asignaciones
                            </h6>

                            <h2>
                                <?= $totalAsignaciones ?>
                            </h2>

                        </div>

                        <i class="bi bi-arrow-left-right"
                        style="font-size: 50px;"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- MANTENIMIENTOS -->

        <div class="col-md-3">

            <div class="card shadow border-0 bg-danger text-white">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>
                                Mantenimientos
                            </h6>

                            <h2>
                                <?= $totalMantenimientos ?>
                            </h2>

                        </div>

                        <i class="bi bi-tools"
                        style="font-size: 50px;"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- TABLA RECIENTE -->

    <div class="card shadow border-0 mt-5">

        <div class="card-header bg-dark text-white">

            Últimos Activos Registrados

        </div>

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>Código</th>
                        <th>Modelo</th>
                        <th>Estado</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $sqlUltimos = "SELECT * FROM activos
                    WHERE estado != 'baja'
                    ORDER BY id DESC
                    LIMIT 5";

                    $resultadoUltimos = $conexion->query($sqlUltimos);

                    while($fila = $resultadoUltimos->fetch_assoc()){

                    ?>

                    <tr>

                        <td><?= $fila['codigo'] ?></td>

                        <td><?= $fila['modelo'] ?></td>

                        <td>

                            <span class="badge bg-success">

                                <?= $fila['estado'] ?>

                            </span>

                        </td>

                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php
include("templates/footer.php");
?>