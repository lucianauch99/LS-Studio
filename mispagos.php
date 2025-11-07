<?php
session_start();
include("conexiondb.php"); // agrego la conexión a la base de datos

// Si el usuario no inició sesión, redirigir
if (!isset($_SESSION['NOMBRE_USUARIO']) || !isset($_SESSION['ID_USUARIO'])) {
    header("Location: landing.html");
    exit;
}

// Si el usuario compra plan (caso: mispagos.php?comprar=1)
if (isset($_GET['comprar']) && $_GET['comprar'] === '1') {
    $_SESSION['TIENE_PLAN'] = true;

    // Guardo la compra en la base de datos si no existe ya
    $usuario_id = (int)$_SESSION['ID_USUARIO'];
    $verificar = "SELECT * FROM compras WHERE usuario_id = $usuario_id";
    $resultado = $conexion->query($verificar);

    if (!($resultado && $resultado->num_rows > 0)) {
        $insertar = "INSERT INTO compras (usuario_id, plan_nombre, fecha_compra) VALUES ($usuario_id, 'Starter Beat', NOW())";
        $conexion->query($insertar);
    }

    // Redirijo para limpiar el GET y recargar estado
    header('Location: mispagos.php');
    exit;
}

// Verifico si tiene plan activo (de sesión o base de datos)
$usuario_id = (int)$_SESSION['ID_USUARIO'];
$consulta = "SELECT * FROM compras WHERE usuario_id = $usuario_id";
$resultado = $conexion->query($consulta);

if ($resultado && $resultado->num_rows > 0) {
    $_SESSION['TIENE_PLAN'] = true;
    $tienePlan = true;
} else {
    $_SESSION['TIENE_PLAN'] = false;
    $tienePlan = false;
}

$nombreUsuario = $_SESSION['NOMBRE_USUARIO'];
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Studio - MIS PAGOS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="mispagos.css">
</head>

<body>
      <!-- mi header/encabezado con el logo -->

     <!-- mi header con el logo -->
    <header class="header">
        <h1 class="logo"><span class="icono">LS</span> Loop Studio</h1>
    </header>
    <!-- mi contenido principal -->
  <!-- mi aside lateral izquierda-->
    <div class="contenedor">
        <aside class="aside">
            <ul>
                <li><a href="pagppal.php">Planes</a></li>
                <li> <a href="misreservas.php">Mis reservas</a></li>
                <li class="activo"><a href="mispagos.php">Mis pagos</a></li>
                <li><a href="calendario.php">Calendario</a></li>
                <li><a href="cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </aside>
  <!-- mi contenido principal con el plan -->

        <main class="main">
            <h1>Mis pagos</h1>
            <?php if ($tienePlan): ?>
                <div class="card">
                    <img src="imagenes/guitarra-landing.jpg" alt="Plan Starter Beat">
                    <div class="card-content">
                        <h3>Starter Beat</h3>
                        <p>1 vez a la semana</p>
                        <p class="subtexto">Ideal para iniciarse o probar</p>
                        <button>Comprado</button>
                    </div>
                </div>
            <?php else: ?>
                <p>No tenés reservas activas.</p>
            <?php endif; ?>

        </main>
    </div>
</body>

</html>