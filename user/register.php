<?php
include '../config/database.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $apellido, $email, $password]);
        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        $error = 'Error al registrar el usuario: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="register.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="submit" value="Registrarse">
    </form>
    <?php
    if ($error) {
        echo "<p>$error</p>";
    }
    ?>
    <p>¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a></p>
</body>
</html>
