<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aps";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$id_cita = $_POST['id_cita'];
$estado = $_POST['estado'];


$nueva_fecha = '';


if ($estado == 'pendiente') {
    $nueva_fecha = "DATE_ADD(fecha_hora, INTERVAL 1 DAY)";
} else {
    $nueva_fecha = 'fecha_hora'; 
}


$sql = "UPDATE Citas SET estado = '$estado'";

if ($nueva_fecha) {
    $sql .= ", fecha_hora = $nueva_fecha"; 
}

$sql .= " WHERE id_cita = $id_cita";

// Ejecutar la consulta
if (mysqli_query($conn, $sql)) {
    echo 'success'; 
} else {
    echo 'error'; 
}


mysqli_close($conn);
?>
