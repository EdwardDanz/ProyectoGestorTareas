<?php
// Requieres el archivo de conexión a la base de datos
require_once 'config/database.php';

// Aquí puedes iniciar una sesión si quieres rastrear a los usuarios
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Gestor de Tareas</title>

    <!-- Aquí puedes incluir tus CSS -->
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    <!-- Aquí va tu estructura principal del sitio -->
    <main>
        <div class="content-wrapper">
            <header>
                <h1 id="animatedTitle">Gestor de Tareas</h1>
            </header>
            <?php if (!isset($_SESSION['usuario_id'])) : ?>
                <!-- Contenedor para el formulario de inicio de sesión -->
                <div id="loginForm">
                    <form action="user/login_logic.php" method="post">
                        <input type="email" name="email" placeholder="Correo electrónico" required>
                        <input type="password" name="password" placeholder="Contraseña" required>
                        <button type="submit">Iniciar sesión</button>
                    </form>
                    <button class="btn-register">Crear nuevo usuario</button>
                </div>

                <!-- Aquí es donde irá el formulario de registro, que estará oculto por defecto -->
                <div id="registerForm" style="display: none;">
                    <form action="user/register_logic.php" method="post">
                        <input type="text" name="nombre" placeholder="Nombre" required>
                        <input type="text" name="apellido" placeholder="Apellido" required>
                        <input type="email" name="email" placeholder="Correo electrónico" required>
                        <input type="password" name="password" placeholder="Contraseña" required>
                        <button type="submit">Registrar</button>
                    </form>
                    <button onclick="hideRegisterForm()">Cerrar</button>
                </div>



            <?php else : ?>
                <!-- Muestra contenido para usuarios logueados, como la lista de tareas -->

            <?php endif; ?>
        </div>
    </main>

    <footer>
        <!-- Pie de página, si lo necesitas -->
    </footer>

    <!-- Aquí puedes incluir tus scripts JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>