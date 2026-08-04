<?php
session_start();
require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin']);

include("../../config/conexion.php");
include("../../templates/header.php");
include("../../templates/sidebar.php");
?>

<div class="container-fluid p-4">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h4>
                Nuevo Usuario
            </h4>

        </div>

        <div class="card-body">

            <form action="guardar.php" method="POST">

                <?= csrf_field() ?>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Departamento</label>
                         <input type="text" name="departamento" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Cargo</label>
                        <input type="text" name="cargo" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Correo</label>
                        <input type="email" name="correo" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Teléfono</label>
                        <input type="text" name="telefono"class="form-control">
                    </div>

                </div>

                <button type="submit" class="btn btn-success">
                    Guardar Usuario
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Volver
                </a>

            </form>

        </div>

    </div>

</div>

<?php
include("../../templates/footer.php");
?>
