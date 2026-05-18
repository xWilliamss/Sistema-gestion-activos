<?php
// Desde el módulo de activos:
// click en un botón ver TODO el historial del equipo. esa es la funcion de esta pagina.
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../../login.php");
}

include("../../config/conexion.php");
include("../../templates/header.php");
include("../../templates/sidebar.php");

$id = $_GET['id'];


// OBTENER ACTIVO

$sqlActivo = "SELECT * FROM activos
WHERE id='$id'";

$resultadoActivo = $conexion->query($sqlActivo);

$activo = $resultadoActivo->fetch_assoc();

?>

<div class="container-fluid p-4">

    <div class="card shadow border-0">

        <div class="card-header bg-info text-white">

            <h4>

                Historial del Activo:
                <?= $activo['codigo'] ?>

            </h4>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Acción</th>
                        <th>Descripción</th>
                        <th>Fecha</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $sqlHistorial = "

                    SELECT *
                    FROM historial_activos

                    WHERE activo_id='$id'

                    ORDER BY fecha DESC

                    ";

                    $resultadoHistorial = $conexion->query($sqlHistorial);

                    while($fila = $resultadoHistorial->fetch_assoc()){

                    ?>

                    <tr>

                        <td><?= $fila['id'] ?></td>

                        <td>

                            <span class="badge bg-primary">

                                <?= $fila['accion'] ?>

                            </span>

                        </td>

                        <td><?= $fila['descripcion'] ?></td>

                        <td><?= $fila['fecha'] ?></td>

                    </tr>

                    <?php } ?>

                </tbody>

            </table>

            <a href="index.php"
            class="btn btn-secondary">

                Volver

            </a>

        </div>

    </div>

</div>

<?php
include("../../templates/footer.php");
?>