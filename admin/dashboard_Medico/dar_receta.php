<?php
include '../conexion/conexion.php';

$id_paciente = $_POST['id_paciente_receta'];
$id_medico = $_POST['id_medico'];
$id_farmaco = $_POST['id_farmaco'];
$dosis = $_POST['dosis'];
$frecuencia = $_POST['frecuencia'];
$duracion = $_POST['duracion'];

$query = "INSERT INTO Recetas (id_paciente, id_medico, id_farmaco, dosis, frecuencia, duracion) VALUES ($id_paciente, $id_medico, $id_farmaco, '$dosis', '$frecuencia', '$duracion')";
$result = mysqli_query($conexion, $query);

if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'Receta registrada']);
} else {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Error al registrar receta']);
}

mysqli_close($conexion);
?>
