<?php

require('../../conexion/conexion.php');


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$id_paciente = $_POST['id_paciente'];
$fecha_hora = $_POST['fecha_hora'];
$diagnostico = $_POST['diagnostico'];
$tratamiento = $_POST['tratamiento'];
$notas = $_POST['notas'];
$tipo_historial = $_POST['tipo_historial'];


if (empty($id_paciente) || empty($fecha_hora) || empty($diagnostico) || empty($tratamiento) || empty($notas) || empty($tipo_historial)) {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
    exit();
}


$sql = "INSERT INTO Historial_Clinico (id_paciente, fecha_hora, notas, tipo_historial, diagnostico, tratamiento)
        VALUES ('$id_paciente', '$fecha_hora', '$notas', '$tipo_historial', '$diagnostico', '$tratamiento')";


if (mysqli_query($conexion, $sql)) {
    echo json_encode(['success' => true, 'message' => 'Historial clínico agregado correctamente.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al insertar el historial clínico: ' . mysqli_error($conexion)]);
}


mysqli_close($conexion);
?>
