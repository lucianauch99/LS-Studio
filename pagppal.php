<?php
session_start();
include("conexiondb.php"); // agrego la conexión

// verifico sesión, sino lo mando a la landing de nuevo
if (!isset($_SESSION['NOMBRE_USUARIO']) || !isset($_SESSION['ID_USUARIO'])) {
    header('Location: landing.html');
    exit;
}

// datos de sesión actuales
$usuario_id = (int)$_SESSION['ID_USUARIO'];
$nombreUsuario = $_SESSION['NOMBRE_USUARIO'];

// Si el usuario compra plan (ej: pagppal.php?comprar=1)
if (isset($_GET['comprar']) && $_GET['comprar'] === '1') {
    // verifico si ya tiene un plan registrado en la base
    $verificar = "SELECT * FROM compras WHERE usuario_id = $usuario_id";
    $resultado = $conexion->query($verificar);

    if (!($resultado && $resultado->num_rows > 0)) {
        // guardo la compra (columna plan_nombre y fecha_compra)
        $insertar = "INSERT INTO compras (usuario_id, plan_nombre, fecha_compra) VALUES ($usuario_id, 'Starter Beat', NOW())";
        $conexion->query($insertar);
    }

    // marco que tiene plan
    $_SESSION['TIENE_PLAN'] = true;

    // redirijo a la página de pagos
    header('Location: mispagos.php');
    exit;
}

// verifico si el usuario tiene plan en la base (por si cerró sesión y volvió a entrar)
$verificarPlan = "SELECT * FROM compras WHERE usuario_id = $usuario_id";
$resultadoPlan = $conexion->query($verificarPlan);
$_SESSION['TIENE_PLAN'] = ($resultadoPlan && $resultadoPlan->num_rows > 0);

// recupero estado actual
$tienePlan = isset($_SESSION['TIENE_PLAN']) && $_SESSION['TIENE_PLAN'] === true;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Studio - Planes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="pagppal.css">
</head>

<body>
    <!-- mi header con el logo -->
    <header class="header">
        <h1 class="logo"> <span class="icono">LS</span> Loop Studio</h1>
    </header>
    <!-- mi contenido principal -->

    <div class="contenedor">
        <aside class="aside">
            <ul>
                <li class="activo">Planes</li>
                <li><a href="misreservas.php">Mis reservas</a></li>
                <li><a href="mispagos.php">Mis pagos</a></li>
                <li><a href="calendario.php">Calendario</a></li>
                <li><a href="cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </aside>

        <main class="main">
            <h1>¡Hola, <?php echo htmlspecialchars($_SESSION['NOMBRE_USUARIO']); ?>!</h1>
            <div class="card">
                <img src="imagenes/guitarra-landing.jpg" alt="Plan Starter Beat">
                <div class="card-content">
                    <h3>Starter Beat</h3>
                    <p>1 vez a la semana</p>
                    <p class="subtexto">Ideal para iniciarse o probar</p>
                    <a href="pagppal.php?comprar=1"><button>Comprar plan</button></a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>