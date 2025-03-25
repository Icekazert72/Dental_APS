<?php
 
session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$bbdd = 'aps';

// Crear conexión
$conexion = mysqli_connect($host, $user, $pass, $bbdd);

// Escapar el valor de la sesión para evitar inyecciones SQL
$id_paciente = mysqli_real_escape_string($conexion, $_SESSION['id_paciente']);

// Consulta SQL con INNER JOIN
$sql = "SELECT hc.fecha_hora, hc.diagnostico, hc.tratamiento, hc.notas 
        FROM historial_clinico AS hc
        INNER JOIN pacientes AS p ON hc.id_paciente = p.id_paciente
        WHERE hc.id_paciente = '$id_paciente'";


$resultado = mysqli_query($conexion, $sql);


$historial_clinico = [];

if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $historial_clinico[] = $fila;
    }
}


echo json_encode($historial_clinico);


mysqli_close($conexion);

?>