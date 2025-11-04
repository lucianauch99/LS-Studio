<?php
session_start(); // array global que puedo mandar info entre las paginas
include("conexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $contrasena = $_POST['contrasena']; // debe coincidir con el name del input

  $sql = "SELECT * FROM usuarios WHERE email='$email' AND contrasena='$contrasena'";
  $resultado = $conexion->query($sql);

  // Verificamos si hay coincidencias
  if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc(); // extrigo los datos del usuario

    // Guardamos datos en la sesión
    $_SESSION['NOMBRE_USUARIO'] = $fila['nombre'];
    $_SESSION['EMAIL_USUARIO'] = $fila['email'];
    $_SESSION['ID_USUARIO'] = $fila['id'];

    // Si es el admin fuerzo el login
    if ($_SESSION['EMAIL_USUARIO'] == "lucianauch123@gmail.com") {
      header('Location: pagppalADM.php');
      exit;
    } else {
      header('Location: pagppal.php');
      exit;
    }

  } else {
    // Si no hay coincidencia
    header('Location: iniciasesion.php');
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
      <link rel="stylesheet" href="iniciasesion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Encabezado con logo -->
    <header class="header">
        <h1 class="logo">
            <span class="icono">LS</span> Loop Studio
        </h1>
    </header>

    <!-- Contenedor del formulario -->
    <main class="contenedor">
        <div class="formulario">
            <h2>Inicia sesión en tu cuenta</h2>
            <form action="iniciasesion.php" method="POST">
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit">Iniciar sesión</button>
            </form>
            <p class="registro">¿Aún no tienes una cuenta? <a href="registrate.php" class="link">Regístrate.</a></p>
            </p>
        </div>
    </main>

</body>

</html>