<?php
include '../conexion/conexion.php';

$search = $_GET['search'];
$search = mysqli_real_escape_string($conexion, $search);

$query = "SELECT id_paciente, nombre, apellidos, email, telefono FROM Pacientes WHERE nombre LIKE '%$search%' OR apellidos LIKE '%$search%'";
$result = mysqli_query($conexion, $query);

$pacientes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $pacientes[] = $row;
}

mysqli_close($conexion);

header('Content-Type: application/json');
echo json_encode($pacientes);
?>
