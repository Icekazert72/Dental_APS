<?php



$host = 'localhost';
$user = 'root';
$pass = '';
$bbdd = 'aps';

// Crear conexión
$conexion = mysqli_connect($host, $user, $pass, $bbdd);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// echo "Conexión exitosa!";

// mysqli_close($conexion);
?>