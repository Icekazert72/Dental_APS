<?php
session_start();
include('../../admin/conexion/conexion.php');

if (!isset($_SESSION['id_paciente'])) {
    echo json_encode([]);
    exit;
}

$pacienteId = $_SESSION['id_paciente'];

$sql = "SELECT * FROM citas WHERE id_paciente = '$pacienteId'";
$result = mysqli_query($conexion, $sql);

$citas = array();
while ($row = mysqli_fetch_assoc($result)) {
    $citas[] = $row;
}

echo json_encode($citas);

mysqli_close($conexion);
?>
