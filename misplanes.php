<?php
session_start();

// Si el usuario no inició sesión, redirigir
if (!isset($_SESSION['NOMBRE_USUARIO'])) {
    header("Location: iniciasesion.php");
    exit;
}

// Simulación temporal de compra de plan.
// En tu proyecto real esto debería venir de la base de datos.
$tienePlan = isset($_SESSION['PLAN_COMPRADO']) && $_SESSION['PLAN_COMPRADO'] == true;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="misplanes.css">
</head>
<body>

    <header class="encabezado">
        <div class="logo">
            <span class="logo-cuadro">LS</span>
            <span class="logo-texto">Loop Studio</span>
        </div>
    </header>

    <main class="contenedor-principal">
        <aside class="menu-lateral">
            <ul>
                <li class="activo">Planes</li>
                <li>Mis reservas</li>
                <li>Mis pagos</li>
                <li>Calendario</li>
                <li><a href="cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </aside>

        <section class="contenido">
            <h1>¡Hola, <?php echo htmlspecialchars($_SESSION['NOMBRE_USUARIO']); ?>!</h1>

            <?php if ($tienePlan): ?>
                <div class="tarjeta-plan">
                    <img src="guitarra.jpg" alt="Plan Starter Beat">
                    <div class="info-plan">
                        <h3>Starter Beat</h3>
                        <p>1 vez a la semana</p>
                        <p>Ideal para iniciarse o probar</p>
                        <button>Ver clases</button>
                    </div>
                </div>
            <?php else: ?>
                <p class="mensaje-vacio">Aún no has comprado ningún plan 🎸</p>
            <?php endif; ?>
        </section>
    </main>

</body>
</html>