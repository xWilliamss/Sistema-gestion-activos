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
                Nueva Asignación
            </h4>

        </div>

        <div class="card-body">

            <form action="guardar.php" method="POST">

                <?= csrf_field() ?>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Activo</label>

                        <select name="activo_id" class="form-select" required>

                            <option value="">
                                Seleccione un activo
                            </option>

                            <?php
                            // Vamos a mostrar SOLO activos disponibles.

                            $sqlActivos = "SELECT * FROM activos
                            WHERE estado != 'baja' AND id NOT IN ( 
                            
                            SELECT activo_id 
                            FROM asignaciones 
                            WHERE estado='activo'
                            )";

                            $resultadoActivos = $conexion->query($sqlActivos);

                            while($activo = $resultadoActivos->fetch_assoc()){

                            ?>

                            <option value="<?= (int) $activo['id'] ?>">

                                <?= app_escape($activo['codigo']) ?>

                                <?= app_escape($activo['modelo']) ?>

                            </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Usuario</label>

                        <select name="usuario_id" class="form-select" required>

                            <option value="">
                                Seleccione un usuario
                            </option>

                            <?php

                            $sqlUsuarios = "SELECT * FROM usuarios WHERE estado = 'activo'";

                            $resultadoUsuarios = $conexion->query($sqlUsuarios);

                            while($usuario = $resultadoUsuarios->fetch_assoc()){

                            ?>

                            <option value="<?= (int) $usuario['id'] ?>">

                                <?= app_escape($usuario['nombre']) ?>
                                <?= app_escape($usuario['apellido']) ?>

                            </option>

                            <?php } ?>

                        </select>

                    </div>

                </div>

                <button type="submit"
                class="btn btn-success">

                    Guardar Asignación

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
