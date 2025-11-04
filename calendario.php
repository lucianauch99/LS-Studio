<?php
session_start();
$nombreUsuario = isset($_SESSION['NOMBRE_USUARIO']) ? $_SESSION['NOMBRE_USUARIO'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Studio - Calendario</title>
    <link rel="stylesheet" href="registrate.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="calendario.css">
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
                <li>Planes</li>
                <li>Mis reservas</li>
                <li>Mis pagos</li>
                <li class="activo">Calendario</li>
                <li><a href="cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </aside>

        <main class="main">
            <h1>Calendario de clases</h1>
            
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
        </main>
    </div>
</body>
</html>
