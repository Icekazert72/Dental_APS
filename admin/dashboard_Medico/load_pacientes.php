<?php
include '../conexion/conexion.php';

$query = "SELECT id_paciente, nombre, apellidos, email, telefono FROM Pacientes";
$result = mysqli_query($conexion, $query);

$pacientes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $pacientes[] = $row;
}

mysqli_close($conexion);

header('Content-Type: application/json');
echo json_encode($pacientes);
?>
