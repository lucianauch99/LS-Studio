<?php
session_start();
include("conexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    //Verifico si el usuario ya existe
    $verificar = "SELECT * FROM usuarios WHERE email='$email'";
    $resultado = $conexion->query($verificar); //Preguntale a la base de datos si existe alguien con este correo
}   

    if ($resultado->num_rows > 0) {
        // Ya existe un usuario con ese email
        header('Location: registrate.php?error=1');
        exit;
    }

    // Inserto nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena')";

    if ($conexion->query($sql) === TRUE) {
        // Guardamos los datos en la sesión
        $_SESSION['NOMBRE_USUARIO'] = $nombre;
        $_SESSION['EMAIL_USUARIO'] = $email;
        $_SESSION['ID_USUARIO'] = $conexion->$insertar_id;

        // Redirigimos al inicio o panel
        header('Location: pagppal.php');
        exit;
    } else {
        echo "Error al registrar: " . $conexion->error;
   
    } 
    header('Location: registrate.php');{
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REGISTRATE</title>
    <link rel="stylesheet" href="registrate.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <h1 class="logo">
            <span class="icono">LS</span> Loop Studio
        </h1>
    </header>

    <main class="contenedor">
        <div class="formulario">
            <h2>Registrá tu cuenta</h2>
            <form action="registrate.php" method="POST">
                <label for="nombre"></label>
                <input type="text" name="nombre" placeholder="Nombre" required>
                <label for="email"></label>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <label for="contrasena"></label>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit">Registrate</button>
            </form>
            <p>¿Tienes una cuenta? <a href="iniciasesion.php" class="link">Inicia sesión</a></p>
        </div>
        </section>
    </main>
</body>

</html>