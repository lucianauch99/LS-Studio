<?php
session_start();
include("conexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conexion->real_escape_string($_POST['email']);
    $contrasena = $conexion->real_escape_string($_POST['contrasena']);

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND contrasena='$contrasena'";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        $_SESSION['NOMBRE_USUARIO'] = $usuario['nombre'];
        $_SESSION['EMAIL_USUARIO'] = $usuario['email'];
        $_SESSION['ID_USUARIO'] = $usuario['id'];

        // Verifico si el usuario ya tiene un plan comprado en la BD
        $usuario_id = (int)$usuario['id'];
        $sqlPlan = "SELECT * FROM compras WHERE usuario_id = $usuario_id";
        $resPlan = $conexion->query($sqlPlan);
        $_SESSION['TIENE_PLAN'] = ($resPlan && $resPlan->num_rows > 0);

        header('Location: pagppal.php');
        exit;
    } else {
        header('Location: iniciasesion.php?error=1');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="iniciasesion.css">
</head>

<body>
      <!-- mi header/encabezado con logo -->
    <header class="header">
        <h1 class="logo"><span class="icono">LS</span> Loop Studio</h1>
    </header>
  <!-- mi contenido principal con el formulario -->
    <main class="contenedor">
        <div class="formulario">
            <h2>Inicia sesión en tu cuenta</h2>
            <form action="iniciasesion.php" method="POST">
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit">Iniciar sesión</button>
            </form>
            <p>¿Aún no tienes una cuenta? <a href="registrate.php">Regístrate</a></p>
        </div>
    </main>
</body>

</html>