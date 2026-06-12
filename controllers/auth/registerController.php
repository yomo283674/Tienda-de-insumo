<?php
session_start();
require_once __DIR__ . '/../../models/usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $terms = $_POST['terms'] ?? '';

    // Validar que no haya campos vacíos
    if (empty($nombre) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
        header("Location: ../../views/auth/register.php");
        exit();
    }

    // Validar coincidencia de contraseñas
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Las contraseñas no coinciden.";
        header("Location: ../../views/auth/register.php");
        exit();
    }

    // Validar términos y condiciones
    if (empty($terms)) {
        $_SESSION['error'] = "Debes aceptar los términos y condiciones.";
        header("Location: ../../views/auth/register.php");
        exit();
    }

    $usuarioModel = new Usuario();

    // Validar si el email ya existe
    if ($usuarioModel->emailExiste($email)) {
        $_SESSION['error'] = "El email ya está registrado.";
        header("Location: ../../views/auth/register.php");
        exit();
    }

    // 3 = Cliente (asegúrate de que este rol exista en tu tabla 'roles')
    $registrado = $usuarioModel->registrar($nombre, $email, $password, 3);

    if ($registrado) {
        $_SESSION['success'] = "Cuenta creada exitosamente. Puedes iniciar sesión.";
        header("Location: ../../views/auth/login.php");
        exit();
    } else {
        $_SESSION['error'] = "Hubo un error al registrar. Verifica tu conexión o intenta más tarde.";
        header("Location: ../../views/auth/register.php");
        exit();
    }
} else {
    header("Location: ../../views/auth/register.php");
    exit();
}
?>
