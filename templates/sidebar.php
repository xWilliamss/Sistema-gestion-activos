 <div class="d-flex ">
    <!-- barra lateral -->
     <div class="big-drak text-drak p-3 vh-100" style="width: 250px;">
        <h4 class="text-center mb-4">
            
            <a href="/gestion_activos/index.php" class="text-decoration-none text-dark">

            <i class="bi bi-pc-display"></i>
            Activo TI
            </a>
            
        </h4>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a href="/gestion_activos/index.php" class="nav-link text-black">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="/gestion_activos/modulos/activos/" class="nav-link text-black">
                    <i class="bi bi-pc"></i>
                    Activos
                </a>
            </li>

            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] != 'tecnico'){ ?>
            <li class="nav-item mb-2">
                <a href="/gestion_activos/modulos/usuarios/" class="nav-link text-black">
                    <i class="bi bi-people"></i>
                        Usuarios
                </a>
            </li>
            <?php } ?>

            <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] != 'tecnico'){ ?>
            <li class="nav-item mb-2">
                <a href="/gestion_activos/modulos/asignaciones/" class="nav-link text-black">
                    <i class="bi bi-arrow-left-right"></i>
                    Asignaciones
                </a>
            </li>
            <?php } ?>

            <li class="nav-item mb-2">
                <a href="/gestion_activos/modulos/mantenimientos/" class="nav-link text-black">
                    <i class="bi bi-tools"></i>
                    Mantenimientos
                </a>
            </li>


            <li class="nav-item mb-2">
                <a href="/gestion_activos/modulos/reportes/index.php" class="nav-link text-black">
                    <i class="bi bi-file-earmark-pdf"></i>
                    Reportes
                </a>
            </li>

        </ul>
        <hr>
        
        <form action="/gestion_activos/logout.php" method="POST">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-danger w-100">

        <i class="bi bi-box-arrow-right"></i>

        Cerrar Sesión

        </button>
        </form>
</div>
