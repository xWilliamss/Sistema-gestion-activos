<?php
// 1. SIEMPRE DEBE SER LA PRIMERA LÍNEA DEL ARCHIVO
session_start(); // Este session es del archivo guardar.php. sirve para mostar mensaje de "¡Activo agregado correctamente!"


/* Incluimos las carpetas y los archivos correspontentes. */

include("../../config/conexion.php");
include("../../templates/header.php");
include("../../templates/sidebar.php");
?>
<!-- <div> son cajones o comparminientos. -->
<div class="container-fluid p-4">
    
    <!-- 2. AQUÍ SE MUESTRA LA ALERTA (Arriba del título para que sea muy visible) -->
    <?php if(isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['mensaje']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php 
        // Se limpian las variables para que no repita el mensaje al recargar la página
        unset($_SESSION['mensaje']);
        unset($_SESSION['tipo_mensaje']);
    endif; 
    ?>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            Gestión de Activos
        </h2>

        <?php if($_SESSION['rol'] != 'consulta'){ ?> 
        <a href="crear.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Nuevo Activo
        </a>
        <?php } ?>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-hover table-bordered align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Serie</th>
                        <th>Modelo</th>
                        <th>Sistema Operativo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <?php

                    $sql = "SELECT * FROM activos WHERE estado !='baja'";
                    $resultado = $conexion->query($sql);

                    while($fila = $resultado->fetch_assoc()){

                    ?>

                    <!-- Tabla de activos, cada <td> es una columna.-->
                    <!-- Lo que esta dentro del <td>, es la abreviación del echo en php para imprimir. -->    
                    <!-- $fila seria mi variable, para llamar las columna de mi base de datos-->
                    <tr>

                        <td><?= $fila['id'] ?></td>
                        <td><?= $fila['codigo'] ?></td>
                        <td><?= $fila['serie'] ?></td>
                        <td><?= $fila['modelo'] ?></td>
                        <td><?= $fila['sistema_operativo'] ?></td>
                        <td>

                            <span class="badge bg-success">
                                <?= $fila['estado'] ?>
                            </span>

                        </td>

                        <td>
                            <!--Esta linea 94 nos ayuda a ocultar los botones de crud-->
                            <?php if($_SESSION['rol'] != 'consulta'){ ?>
                            <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <?php } ?>

                            <?php if($_SESSION['rol'] != 'consulta'){ ?>
                            <a href="historial.php?id=<?= $fila['id'] ?>"class="btn btn-info btn-sm">
                                <i class="bi bi-clock-history"></i> 
                            </a>
                            <?php } ?>

                            <?php if($_SESSION['rol'] != 'consulta'){ ?>
                            <a href="eliminar.php?id=<?= $fila['id'] ?>" 
                            class="btn btn-danger btn-sm" 
                            onclick="return confirm('¿Deseas enviar este activo a baja?')">
                            
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