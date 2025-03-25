<?php
include '../conexion/conexion.php';

$id_paciente = $_POST['id_paciente'];
$notas = $_POST['notas'];
$diagnostico = $_POST['diagnostico'];
$tratamiento = $_POST['tratamiento'];

$query = "INSERT INTO Consultas (id_paciente, id_medico, notas, diagnostico, tratamiento) VALUES ($id_paciente, 1, '$notas', '$diagnostico', '$tratamiento')";
$result = mysqli_query($conexion, $query);

if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'Consulta registrada']);
} else {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Error al registrar consulta']);
}

mysqli_close($conexion);
?>
