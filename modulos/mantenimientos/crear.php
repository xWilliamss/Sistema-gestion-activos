<?php

session_start();
require_once __DIR__ . '/../../config/auth.php';
require_roles(['admin', 'tecnico']);

include("../../config/conexion.php");
include("../../templates/header.php");
include("../../templates/sidebar.php");

?>

<div class="container-fluid p-4">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h4>
                Registrar Mantenimiento
            </h4>

        </div>

        <div class="card-body">

            <form action="guardar.php" method="POST">

                <?= csrf_field() ?>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Activo</label>

                        <select name="activo_id"
                        class="form-select"
                        required>

                            <option value="">
                                Seleccione un activo
                            </option>

                            <?php

                            $sqlActivos = "SELECT * FROM activos
                            WHERE estado != 'baja'";

                            $resultadoActivos = $conexion->query($sqlActivos);

                            while($activo = $resultadoActivos->fetch_assoc()){

                            ?>

                            <option value="<?= (int) $activo['id'] ?>">

                                <?= app_escape($activo['codigo']) ?>
                                -
                                <?= app_escape($activo['modelo']) ?>

                            </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Tipo</label>

                        <select name="tipo"
                        class="form-select">

                            <option value="Preventivo">
                                Preventivo
                            </option>

                            <option value="Correctivo">
                                Correctivo
                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Descripción</label>

                        <textarea
                        name="descripcion"
                        class="form-control"
                        rows="4"></textarea>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Técnico</label>

                        <input type="text"
                        name="tecnico"
                        class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Costo</label>

                        <input type="number"
                        step="0.01"
                        name="costo"
                        class="form-control">

                    </div>

                </div>

                <button type="submit"
                class="btn btn-success">

                    Guardar

                </button>

                <a href="index.php"
                class="btn btn-secondary">

                    Volver

                </a>

            </form>

        </div>

    </div>

</div>

<?php
include("../../templates/footer.php");
?>
