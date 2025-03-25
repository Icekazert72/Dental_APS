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

// Consulta SQL para obtener los pacientes
$query = "SELECT id_paciente, nombre, apellidos, email, telefono FROM Pacientes";
$result = mysqli_query($conexion, $query);

// Verificar si la consulta fue exitosa
if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Error en la consulta SQL: ' . mysqli_error($conexion)]);
    error_log('Error en la consulta SQL: ' . mysqli_error($conexion));
    exit;
}

// Crear un arreglo con los pacientes obtenidos
$pacientes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $pacientes[] = $row;
}

// Verificar si no se encontraron pacientes
if (empty($pacientes)) {
    http_response_code(404);
    echo json_encode(['error' => 'No se encontraron pacientes.']);
    error_log('No se encontraron pacientes en la base de datos.');
    exit;
}

// Cerrar la conexión con la base de datos
mysqli_close($conexion);

// Devolver los pacientes en formato JSON
echo json_encode($pacientes);
?>
