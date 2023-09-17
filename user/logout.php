<?php
session_start();  // Iniciar la sesión

// Establecer la variable de sesión para indicar que el usuario acaba de cerrar sesión.
$_SESSION['just_logged_out'] = true;

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se desea destruir completamente la sesión, también se borra la cookie de sesión.
// Nota: ¡Esto destruirá la sesión y no solo los datos de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión
session_destroy();

// Redireccionar al usuario a la página principal o de inicio de sesión
header("Location: ../index.php");
exit;
?>
