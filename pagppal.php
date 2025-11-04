<?php
session_start();
// Si no está logueado, lo manda al inicio de sesión
if (!isset($_SESSION['NOMBRE_USUARIO'])) {
    header('Location: iniciasesion.php');
    exit;
}

$nombre = htmlspecialchars($_SESSION['NOMBRE_USUARIO']);
$tienePlan=1;
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Studio - PLANES</title>
    <link rel="stylesheet" href="registrate.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="pagppal.css">
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
                <li class="activo">Planes</li>
                <li>Mis reservas <a href="misreservas.php"></a> </li>
                <li>Mis pagos <a href="mispagos.php"></a></li>
                <li>Calendario <a href="calendario.php"></a></li>
                <li><a href="cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </aside>

        <main class="main">
            <h1>¡Hola, <?php echo htmlspecialchars($nombre); ?>!</h1>

            <?php if ($tienePlan): ?>
            <div class="card">
                <img src="imagenes/guitarra-landing.jpg" alt="Plan Starter Beat">
                <div class="card-content">
                    <h3>Starter Beat</h3>
                    <p>1 vez a la semana</p>
                    <p class="subtexto">Ideal para iniciarse o probar</p>
                    <button>Comprar plan</button>
                </div>
            </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>