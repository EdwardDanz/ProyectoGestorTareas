<?php
session_start(); // Iniciar la sesión al principio del archivo.
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['usuario_id'] = $user['id']; // Cambiado a usuario_id
            header("Location: ../dashboard.php");
            exit;
        } else {
            // Esto es solo para depuración.
            error_log("Contraseña incorrecta para el email: $email");
        }
    } else {
        // Esto es solo para depuración.
        error_log("No se encontró usuario con el email: $email");
    }

    // Aquí se redirige de nuevo al index con un mensaje de error.
    $_SESSION['login_error'] = true;
    header("Location: ../dashboard.php");
    exit;
}
