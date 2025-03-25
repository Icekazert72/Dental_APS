<?php
session_start();
include('../../admin/conexion/conexion.php');

if (!isset($_SESSION['id_paciente'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
    exit;
}

$pacienteId = $_SESSION['id_paciente'];
$fecha = $_POST['fecha'];
$motivo = $_POST['motivo'];
$servicio = $_POST['servicio'];
$estado = 'Pendiente'; // Estado predeterminado

$sql = "INSERT INTO citas (id_paciente, fecha_hora, motivo, servicio, estado) VALUES ('$pacienteId', '$fecha', '$motivo', '$servicio', '$estado')";

try {
    if (mysqli_query($conexion, $sql)) {
        echo json_encode(['success' => true]);
    } else {
        throw new Exception("Error al insertar la cita: " . mysqli_error($conexion));
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

mysqli_close($conexion);
?>

