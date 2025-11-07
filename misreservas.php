<?php
session_start();
include("conexiondb.php"); // agrego la conexión

// Si el usuario no inició sesión, redirigir
if (!isset($_SESSION['NOMBRE_USUARIO']) || !isset($_SESSION['ID_USUARIO'])) {
    header("Location: landing.html");
    exit;
}

// El estado del plan viene de la sesión o de la base de datos
$usuario_id = (int)$_SESSION['ID_USUARIO'];
$nombreUsuario = $_SESSION['NOMBRE_USUARIO'];

// verifico si tiene un plan activo en base de datos
$consulta = "SELECT * FROM compras WHERE usuario_id = $usuario_id";
$resultado = $conexion->query($consulta);

if ($resultado && $resultado->num_rows > 0) {
    $_SESSION['TIENE_PLAN'] = true;
    $tienePlan = true;
} else {
    $_SESSION['TIENE_PLAN'] = false;
    $tienePlan = false;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Studio - Mis reservas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./misreservas.css">
</head>

<body>
    <!-- mi header con el logo -->
    <header class="header">
        <h1 class="logo">
            <span class="icono">LS</span> Loop Studio
</h1>
    </header>
    <!-- mi contenido principal -->

    <div class="contenedor">
        <aside class="aside">
            <ul>
                <li><a href="pagppal.php">Planes</a></li>
                <li class="activo">Mis reservas</li>
                <li><a href="mispagos.php">Mis pagos</a></li>
                <li><a href="calendario.php">Calendario</a></li>
                <li><a href="cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </aside>

        <main class="main">
            <h1>Mis reservas</h1>

            <?php if ($tienePlan): ?>
                <div class="card">
                    <div class="card-content">
                        <h3>Mes: Noviembre</h3>
                        <div class="fechas">
                            <p>3/11/2025</p>
                            <p>10/11/2025</p>
                            <p>17/11/2025</p>
                            <p>24/11/2025</p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p>No tenés reservas activas.</p>
            <?php endif; ?>
        </main>
    </div>
</body>

</html>