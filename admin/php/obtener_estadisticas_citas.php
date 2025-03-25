<?php

session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$bbdd = 'aps';


$conexion = mysqli_connect($host, $user, $pass, $bbdd);


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$sql = "SELECT estado, COUNT(*) as cantidad FROM Citas GROUP BY estado";
$resultado = mysqli_query($conexion, $sql);

$estadisticas = [];

if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $estadisticas[] = $fila;
    }
} else {
    echo json_encode(['error' => 'Error al obtener las estadísticas.']);
    exit;
}


echo json_encode($estadisticas);


mysqli_close($conexion);
?>
