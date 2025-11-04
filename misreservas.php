<?php
session_start();

// Si el usuario no ha iniciado sesión, redirigir
if (!isset($_SESSION['usuario'])) {
    header('Location: iniciasesion.php');
    exit;
}

$nombreUsuario = $_SESSION['usuario'];
$tienePlan = true; // Ejemplo: podrías obtenerlo desde tu base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Studio - Mis reservas</title>
    <link rel="stylesheet" href="registrate.css" />
    <link rel="stylesheet" href="misreservas.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="logo">
            <div class="logo-box">LS</div>
            <span class="nombre-logo">Loop Studio</span>
        </div>
    </header>

    <div class="contenedor">
        <aside class="aside">
            <ul>
                <li><a href="misplanes.php"> Planes </a></li>
                <li class="activo">Mis reservas</li>
                <li><a href="mispagos.php">Mis pagos</a></li>
                <li><a href="calendario.php"> Calendario</a></li>
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
