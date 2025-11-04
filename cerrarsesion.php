<?php
session_start();

if (isset("")) {
    session_destroy()
    );
}

// Destruimos la sesión en el servidor
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sesión cerrada - Loop Studio</title>
  <link rel="stylesheet" href="cerrarsesion.css">
</head>
<body>
  <header class="header">
    <div class="logo">
      <div class="logo-box">LS</div>
      <span class="nombre-logo">Loop Studio</span>
    </div>
  </header>

  <main class="centro">
    <div class="mensaje-caja">
      <h2>Has cerrado sesión</h2>
      <p>Volvés al inicio para ingresar de nuevo.</p>
      <a class="boton" href="landing.html">Ir a Iniciar sesión</a>
    </div>
  </main>
</body>
</html>
