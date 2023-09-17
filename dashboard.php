<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}

// Aquí puedes cargar las tareas del usuario desde la base de datos, por ejemplo.

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestor de Tareas</title>
    <!-- Biblioteca de iconos Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>
    <!-- Encabezado -->
    <header>
        <div id="logo">GestorLabors</div>
        <div id="user-menu">
            <a href="user/logout.php" class="logout-button">Cerrar Sesión</a>
            <i class="fas fa-user-circle"></i>
            <ul>
                <li>Ver Perfil</li>
            </ul>
        </div>
    </header>

    <!-- Barra lateral -->
    <aside>
        <button id="togglePanel">⮜</button> <!--Para contraer el panel-->
        <button id="my-tasks"><i class="fas fa-tasks"></i> Mis Tareas</button>
        <button id="create-task" onclick="openModal()"><i class="fas fa-plus"></i> Crear Tarea</button>
        <button id="assigned-tasks"><i class="fas fa-user"></i> Tareas Asignadas</button>
        <!-- Agrega íconos para calendar y clock si lo deseas -->
    </aside>

    <!-- Área Principal -->
    <main>
        <!-- Aquí se lista las tareas -->
    </main>

    <!-- Modal para Crear/Editar Tareas -->
    <div id="task-modal" class="modal">
        <div class="modal-content">
            <!-- Contenido del modal -->
        </div>
        <span class="close-modal" onclick="closeModal()">&times;</span>
    </div>

    <script src="assets/js/dashboard.js"></script>

</body>

</html>