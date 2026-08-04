<?php

session_start();
require_once __DIR__ . '/config/auth.php';
require_post();
verify_csrf();

require_once __DIR__ . '/config/conexion.php';

$usuario = trim($_POST['usuario'] ?? '');
$password = $_POST['password'] ?? '';

$stmt = $conexion->prepare("SELECT id, nombre, usuario, password, rol FROM sistema_usuarios WHERE usuario = ? AND estado = 'activo' LIMIT 1");
$stmt->bind_param('s', $usuario);
$stmt->execute();
$datos = $stmt->get_result()->fetch_assoc();

if ($datos) {
    $passwordValida = password_verify($password, $datos['password']);

    // Conserva el acceso a cuentas MD5 existentes y actualiza el hash al iniciar sesión.
    if (!$passwordValida && hash_equals($datos['password'], md5($password))) {
        $passwordValida = true;
        $nuevoHash = password_hash($password, PASSWORD_DEFAULT);
        $actualizar = $conexion->prepare('UPDATE sistema_usuarios SET password = ? WHERE id = ?');
        $actualizar->bind_param('si', $nuevoHash, $datos['id']);
        $actualizar->execute();
    }

    if ($passwordValida) {
        session_regenerate_id(true);
        $_SESSION['usuario'] = $datos['usuario'];
        $_SESSION['nombre'] = $datos['nombre'];
        $_SESSION['rol'] = $datos['rol'];

        header('Location: index.php');
        exit();
    }
}

header('Location: login.php?error=credenciales');
exit();
