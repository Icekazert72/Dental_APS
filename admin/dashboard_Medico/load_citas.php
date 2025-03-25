<?php
include '../conexion/conexion.php';

header('Content-Type: application/json');  // Establece el tipo de contenido como JSON

// Verificar la conexión a la base de datos
if (!$conexion) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al conectar con la base de datos.']);
    error_log('Error al conectar con la base de datos.');
    exit;
}

// Consulta SQL para obtener las citas con estado 'Pendiente'
$query = "SELECT id_cita, id_paciente, id_medico, fecha_hora, motivo, estado FROM Citas WHERE estado = 'Pendiente'";
$result = mysqli_query($conexion, $query);

// Verificar si la consulta fue exitosa
if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Error en la consulta SQL: ' . mysqli_error($conexion)]);
    error_log('Error en la consulta SQL: ' . mysqli_error($conexion));
    exit;
}

// Crear un arreglo con las citas obtenidas
$citas = [];
while ($row = mysqli_fetch_assoc($result)) {
    $citas[] = $row;
}

// Verificar si no se encontraron citas
if (empty($citas)) {
    http_response_code(404);
    echo json_encode(['error' => 'No se encontraron citas pendientes.']);
    error_log('No se encontraron citas pendientes en la base de datos.');
    exit;
}

// Cerrar la conexión con la base de datos
mysqli_close($conexion);

// Devolver las citas en formato JSON
echo json_encode($citas);
?>
