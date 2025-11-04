<?php
//creo variables

$nombreservidor = "localhost";
$contrasena = "";
$nombreusuario = "root";
$database = "loopstudio_db";

//creo la conexion 

$conexion = new mysqli($nombreservidor, $nombreusuario, $contrasena, $database);

//verifico la conexion 
if ($conexion->errno) { //errno metodo para traer el numero del error
    die("Error de conexion" . $conexion->$errno);
    //mata la conexion y me muestra el mensaje
}
//si todo esta bien no entra al if y muestra conexion exitosa
//echo "Conexion exitosa";
