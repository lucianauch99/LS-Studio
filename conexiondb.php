<?php
// creo variables
$nombreservidor = "localhost";
$nombreusuario = "root";
$contrasena = "";
$database = "loopstudio_db";

// creo la conexión 
$conexion = new mysqli($nombreservidor, $nombreusuario, $contrasena, $database);

// verifico la conexión 
if ($conexion->connect_errno) { 
    die("Error de conexión: " . $conexion->connect_error);
}

// no echo para evitar 'headers already sent'
?>
