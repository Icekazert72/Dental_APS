<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aps";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$tiempo = isset($_GET['tiempo']) ? $_GET['tiempo'] : 24;
$intervalo = $tiempo * 3600;

$sql = "SELECT 
    c.id_cita,
    c.id_paciente,
    c.fecha_hora,
    c.motivo,
    c.estado,
    p.nombre
FROM 
    Citas c
JOIN 
    Pacientes p ON c.id_paciente = p.id_paciente
WHERE 
    c.estado = 'Pendiente'";

$result = $conn->query($sql);

// Arreglo para almacenar los resultados de las citas
$citas = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Almacenamos los datos de cada cita en un array
        $citas[] = $row;
    }
} else {
    $citas = [];
}

$conn->close();

// Retornar los datos en formato JSON
echo json_encode($citas);
