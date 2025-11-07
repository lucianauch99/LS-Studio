<?php
session_start();

// Si el usuario no inició sesión, redirigir
if (!isset($_SESSION['NOMBRE_USUARIO']) || !isset($_SESSION['ID_USUARIO'])) {
    header("Location: landing.html");
    exit;
}

// Recupero el nombre del usuario
$nombreUsuario = $_SESSION['NOMBRE_USUARIO'];

// Verifico si tiene plan activo (desde la sesión)
$tienePlan = isset($_SESSION['TIENE_PLAN']) && $_SESSION['TIENE_PLAN'] === true;
?>
<!-- HTML de calendario: muestra contenido si $tienePlan es true -->


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Studio - Calendario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="calendario.css">
</head>

<body>
     <!-- mi header con el logo -->
    <header class="header">
        <h1 class="logo"><span class="icono">LS</span> Loop Studio</h1>
    </header>
    <!-- mi contenido principal -->
    <div class="contenedor">
        <aside class="aside">
            <ul>
                <li><a href="pagppal.php">Planes</a></li>
                <li><a href="misreservas.php">Mis reservas</a></li>
                <li><a href="mispagos.php">Mis pagos</a></li>
                <li class="activo">Calendario</a></li>
                <li><a href="cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </aside>

        <main class="main">
            <h1>Calendario de clases</h1>
            <?php if ($tienePlan): ?>
                <div class="card">
                    <div class="card-content">
                        <h3>Mes: Noviembre</h3>
                        <ul style="text-align:left; display:inline-block;">
                            <li>3/11/2025</li>
                            <li>10/11/2025</li>
                            <li>17/11/2025</li>
                            <li>24/11/2025</li>
                        </ul>
                        <button style="background-color:#47b13b;">Reservado</button>
                    </div>
                </div>
                   <?php else: ?>
                    <p>No tenés reservas activas.</p>
                <?php endif; ?>
        </main>
    </div>
</body>

</html>