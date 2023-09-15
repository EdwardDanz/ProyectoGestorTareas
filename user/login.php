<?php
include '../config/database.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    if ($user = $stmt->fetch()) {
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../index.php");
            exit;
        } else {
            $error = 'Contraseña incorrecta.';
        }
    } else {
        $error = 'El usuario con este correo electrónico no existe.';
    }
}

// Suponiendo que $resultado contiene los datos del usuario después de una consulta exitosa.
$row = $resultado->fetch(PDO::FETCH_ASSOC);
$_SESSION['usuario_id'] = $row['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="text" name="usuarionombre" placeholder="Nombre de usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="submit" value="Iniciar sesión">
    </form>
    <?php
    if ($error) {
        echo "<p>$error</p>";
    }
    ?>
    <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
</body>
</html>
