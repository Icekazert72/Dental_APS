<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$bbdd = 'aps';
$conexion = mysqli_connect($host, $user, $pass, $bbdd);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$sql = "SELECT c.id_cita, c.id_paciente, c.fecha_hora, c.motivo, c.estado, p.nombre 
        FROM Citas c 
        JOIN Pacientes p ON c.id_paciente = p.id_paciente 
        WHERE c.estado = 'Confirmada'";

$resultado = mysqli_query($conexion, $sql);


$citas_confirmadas = [];

if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $citas_confirmadas[] = $fila;
    }
}


echo json_encode($citas_confirmadas);


mysqli_close($conexion);
?>
