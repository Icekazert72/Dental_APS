<?php
include '../conexion/conexion.php';

$query = "SELECT id_cita, id_paciente, id_medico, fecha_hora, motivo, estado FROM Citas WHERE estado = 'Pendiente'";
$result = mysqli_query($conexion, $query);

$citas = [];
while ($row = mysqli_fetch_assoc($result)) {
    $citas[] = $row;
}

mysqli_close($conexion);

header('Content-Type: application/json');
echo json_encode($citas);
?>
