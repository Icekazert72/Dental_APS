<?php
session_start();

// Incluir la conexión a la base de datos
$host = 'localhost';
$user = 'root';
$pass = '';
$bbdd = 'aps';

// Crear conexión
$conexion = mysqli_connect($host, $user, $pass, $bbdd);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se ha recibido una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $fecha = $_POST['fecha'];
    $motivo = $_POST['motivo'];
    $servicio = $_POST['servicio'];
    $id_paciente = $_POST['id'];

    // Validar si los campos no están vacíos
    if (empty($fecha) || empty($motivo) || empty($servicio) || empty($id_paciente)) {
        echo 'error'; // Retornar error si hay campos vacíos
        exit;
    }

    // Preparar la consulta SQL para insertar los datos en la tabla Citas
    $sql = "INSERT INTO Citas (id_paciente, fecha_hora, motivo, estado, servicio) 
            VALUES ('$id_paciente', '$fecha', '$motivo', 'Pendiente', '$servicio')";

    // Ejecutar la consulta y verificar si la inserción fue exitosa
    if (mysqli_query($conexion, $sql)) {
        echo 1; // Retornar 'success' si la inserción fue exitosa
    } else {
        echo 2; // Retornar 'error' si hubo un problema en la inserción
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>

