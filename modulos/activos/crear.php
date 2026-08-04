
<?php
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
                Registrar Nuevo Activo
            </h4>

        </div>

        <div class="card-body">
            <!-- <form> en HTML sirve para crear secciones interactivas destinadas a recoger datos del usuario y enviarlos a un servidor.-->
            <!-- method="POST" Los datos se envían de forma interna (no visibles en la URL).-->     

            <form action="guardar.php" method="POST">

                <?= csrf_field() ?>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Código</label>
                        <input type="text" name="codigo" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Serie</label>
                        <input type="text" name="serie" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Modelo</label>
                        <input type="text" name="modelo" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Sistema Operativo</label>
                        <input type="text" name="sistema_operativo" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Tipo de Activo</label>

                        <select name="tipo_id" class="form-select">

                            <?php
                            /* Linea de consulta a la tabla tipos_activo.*/
                            $sqlTipos = "SELECT * FROM tipos_activo";
                            $resultadoTipos = $conexion->query($sqlTipos);
                            /*Usamos un ciclo while para generar automáticamente una lista desplegable de (<option>) con los tipos que ya existen en la base de datos.*/
                            while($tipo = $resultadoTipos->fetch_assoc()){

                            ?>

                            <option value="<?= (int) $tipo['id'] ?>">
                                <?= app_escape($tipo['nombre']) ?>
                            </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Estado</label>

                        <select name="estado" class="form-select">

                            <option value="activo">Activo</option>
                            <option value="dañado">Dañado</option>
                            <option value="reparacion">Reparación</option>
                            <option value="baja">Baja</option>

                        </select>

                    </div>

                </div>
                <!-- Botón Submit - Envía el formulario. -->
                <!-- Enlace - Un botón gris que simplemente te regresa a la lista principal (index.php) sin guardar nada.-->

                <button type="submit" class="btn btn-success">
                    Guardar Activo
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
