<?php

/*Este código corresponde a la página de Inicio de Sesión (Login) del sistema. */

session_start();
require_once __DIR__ . '/config/auth.php';
/*isset($_SESSION['usuario']): Comprueba si la variable de sesión usuario ya existe.*/
/*header("Location: index.php"): Si el usuario ya había iniciado sesión previamente, este bloque lo redirige automáticamente a la página principal (index.php). */
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Gestión de Activos WPB</title>

    <!-- Bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

     <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: navy;


        }
    </style>

</head>

<body class="bg-ligth">

    <div class="container">

        <!-- justify-content-center y align-items-center: Centran la tarjeta del login perfectamente de forma tanto horizontal como vertical en el medio de la pantalla.
         vh-100: Fuerza a que el contenedor ocupe el 100% de la altura de la pantalla visible.-->
        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-4">

                <div class="card shadow border-0">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">

                            <i class="bi bi-pc-display" 
                            style="font-size: 60px;"></i> 

                            <h3 class="mt-3"> 
                                Gestión de Activos
                            </h3>
                            
                        </div>
                        <!-- action="validar.php": los datos viajan hacia un archivo externo llamado validar.php,
                          el cual se encargará de comprobar en la base de datos si el usuario y la contraseña son correctos.-->

                        <!--method="POST": Envía la información oculta en el cuerpo de la petición. -->
                        <form action="validar.php" method="POST">

                            <?= csrf_field() ?>

                            <div class="mb-3">

                                <label for="">Usuario</label>

                                <input type="text" 
                                name="usuario" 
                                class="form-control" required>

                            </div>

                            <div class="mb-3">

                                <label for="">Contraseña</label>
                                <!-- usamos type="password": para ocultar los caracteres de la contraseña reemplazándolos por puntos o asteriscos.-->
                                <input type="password" 
                                name="password" class="form-control" required>

                            </div>

                            <button type="submit" 
                            class="btn btn-primary w-100">

                            Iniciar Sesión

                            </button>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
    
</body>
</html>
