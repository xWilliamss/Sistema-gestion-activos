<?php

session_start();
require_once __DIR__ . '/../../config/auth.php';
require_login();

include("../../templates/header.php");
include("../../templates/sidebar.php");

?>

<div class="container-fluid p-4">

    <div class="mb-4">

        <h2>
            Centro de Reportes
        </h2>

        <p class="text-muted">
            Generación de reportes del sistema de gestión de activos.
        </p>

    </div>

    <div class="row">

        <!-- Inventario -->

        <div class="col-md-6 col-lg-3 mb-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <i class="bi bi-pc-display fs-1 text-primary"></i>

                    <h5 class="mt-3">
                        Inventario General
                    </h5>

                    <p class="text-muted">
                        Listado completo de activos.
                    </p>

                    <a href="inventario.php"
                    target="_blank"
                    class="btn btn-primary">

                        Generar PDF

                    </a>

                </div>

            </div>

        </div>

        <!-- Asignaciones -->

        <div class="col-md-6 col-lg-3 mb-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <i class="bi bi-person-check fs-1 text-success"></i>

                    <h5 class="mt-3">
                        Asignaciones
                    </h5>

                    <p class="text-muted">
                        Activos entregados a usuarios.
                    </p>

                    <a href="asignaciones.php"
                    target="_blank"
                    class="btn btn-success">

                        Generar PDF

                    </a>

                </div>

            </div>

        </div>

        <!-- Mantenimientos -->

        <div class="col-md-6 col-lg-3 mb-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <i class="bi bi-tools fs-1 text-warning"></i>

                    <h5 class="mt-3">
                        Mantenimientos
                    </h5>

                    <p class="text-muted">
                        Historial de mantenimientos.
                    </p>

                    <a href="mantenimientos.php"
                    target="_blank"
                    class="btn btn-warning">

                        Generar PDF

                    </a>

                </div>

            </div>

        </div>

        <!-- Historial -->

        <div class="col-md-6 col-lg-3 mb-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <i class="bi bi-clock-history fs-1 text-danger"></i>

                    <h5 class="mt-3">
                        Historial
                    </h5>

                    <p class="text-muted">
                        Movimientos registrados.
                    </p>

                    <a href="historial.php"
                    target="_blank"
                    class="btn btn-danger">

                        Generar PDF

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
include("../../templates/footer.php");
?>
