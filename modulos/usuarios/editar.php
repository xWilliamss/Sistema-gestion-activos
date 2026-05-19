<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../../login.php");
}

include("../../config/conexion.php");
include("../../templates/header.php");
include("../../templates/sidebar.php");

$id = $_GET['id'];

$sql = "SELECT * FROM usuarios
WHERE id='$id'";

$resultado = $conexion->query($sql);

$usuario = $resultado->fetch_assoc();

?>

<div class="container-fluid p-4">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h4>
                Editar Usuario
            </h4>

        </div>

        <div class="card-body">

            <form action="actualizar.php" method="POST">

                <input type="hidden"
                name="id"
                value="<?= $usuario['id'] ?>">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Nombre</label>

                        <input type="text"
                        name="nombre"
                        value="<?= $usuario['nombre'] ?>"
                        class="form-control"
                        required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Apellido</label>

                        <input type="text"
                        name="apellido"
                        value="<?= $usuario['apellido'] ?>"
                        class="form-control"
                        required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Departamento</label>

                        <input type="text"
                        name="departamento"
                        value="<?= $usuario['departamento'] ?>"
                        class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Cargo</label>

                        <input type="text"
                        name="cargo"
                        value="<?= $usuario['cargo'] ?>"
                        class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Correo</label>

                        <input type="email"
                        name="correo"
                        value="<?= $usuario['correo'] ?>"
                        class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Teléfono</label>

                        <input type="text"
                        name="telefono"
                        value="<?= $usuario['telefono'] ?>"
                        class="form-control">

                    </div>

                </div>

                <button type="submit"
                class="btn btn-success">

                    Actualizar

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