<?php

include("../../config/conexion.php");
include("../../templates/header.php");
include("../../templates/sidebar.php");

$id = $_GET['id'];

$sql = "SELECT * FROM activos WHERE id = '$id'";
$resultado = $conexion->query($sql);

$activo = $resultado->fetch_assoc();

?>

<div class="container-fluid p-4">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h4>
                Editar Activo
            </h4>

        </div>

        <div class="card-body">

            <form action="actualizar.php" method="POST">

                <input type="hidden" name="id" value="<?= $activo['id'] ?>">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Código</label>
                        <input type="text" name="codigo"
                        value="<?= $activo['codigo'] ?>"
                        class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Serie</label>
                        <input type="text" name="serie"
                        value="<?= $activo['serie'] ?>"
                        class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Modelo</label>
                        <input type="text" name="modelo"
                        value="<?= $activo['modelo'] ?>"
                        class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Sistema Operativo</label>
                        <input type="text" name="sistema_operativo"
                        value="<?= $activo['sistema_operativo'] ?>"
                        class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Estado</label>

                        <select name="estado" class="form-select">

                            <option value="activo"
                            <?= $activo['estado'] == 'activo' ? 'selected' : '' ?>>
                            Activo
                            </option>

                            <option value="dañado"
                            <?= $activo['estado'] == 'dañado' ? 'selected' : '' ?>>
                            Dañado
                            </option>

                            <option value="reparacion"
                            <?= $activo['estado'] == 'reparacion' ? 'selected' : '' ?>>
                            Reparación
                            </option>

                            <option value="baja"
                            <?= $activo['estado'] == 'baja' ? 'selected' : '' ?>>
                            Baja
                            </option>

                        </select>

                    </div>

                </div>

                <button type="submit" class="btn btn-success">
                    Actualizar
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