<?php
session_start();
include("conexiondb.php");

// Solo lo voy a procesar cuando se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $email = $conexion->real_escape_string($_POST['email']);
    $contrasena = $conexion->real_escape_string($_POST['contrasena']);

    // voy a verificar primero si el usuario ya existe
    $verificar = "SELECT * FROM usuarios WHERE email='$email'";
    $resultado = $conexion->query($verificar); // Preguntale a la base de datos si existe alguien con este correo

    // ya existe un usuario con ese email, da un error y refresca la pag
    if ($resultado && $resultado->num_rows > 0) {
        header('Location: registrate.php?error=1'); 
        exit;
    }

    // voy a insertar un nuevo usuario a la tabla usuarios
    $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena')";

    // datos en la sesión y la mantengo abierta
    if ($conexion->query($sql) === TRUE) {
        $_SESSION['NOMBRE_USUARIO'] = $nombre;
        $_SESSION['EMAIL_USUARIO'] = $email;
        $_SESSION['ID_USUARIO'] = $conexion->insert_id;
        $_SESSION['TIENE_PLAN'] = false; // por defecto y por ser nuevo, no tiene plan aun el usuario 

        header('Location: pagppal.php'); //una vez registrado lo mando a la pag ppal
        exit;
    } else {
        echo "Error al registrar: " . $conexion->error; //si hay algun error printeo que hay un error al registrarse
        exit;
    }
}
?>
<!-- HTML de registro (igual que el tuyo) -->
<!DOCTYPE html>
<html lang="es">
<head> ... tu head ... </head>
<body>
  <!-- tu HTML de form -->
</body>
</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="registrate.css" />
</head>

<body>
    <!-- mi header con el logo -->
    <header class="header">
        <h1 class="logo"><span class="icono">LS</span> Loop Studio</h1>
    </header>
    <!-- mi contenido principal -->

    <main class="contenedor">
        <div class="formulario">
            <h2>Registrá tu cuenta</h2>
            <form action="registrate.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit">Registrate</button>
            </form>
            <p>¿Tienes una cuenta? <a href="iniciasesion.php">Inicia sesión</a></p>
        </div>
    </main>
</body>

</html>