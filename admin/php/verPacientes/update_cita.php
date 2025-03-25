<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aps";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$id_cita = isset($_POST['id_cita']) ? $_POST['id_cita'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';

if ($id_cita && $estado) {
    
    $sql = "UPDATE Citas SET estado = '$estado' WHERE id_cita = $id_cita";
    
    
    if (mysqli_query($conn, $sql)) {
        echo "Cita actualizada correctamente";
    } else {
        echo "Error al actualizar la cita: " . mysqli_error($conn);
    }
} else {
    echo "Faltan parámetros";
}

mysqli_close($conn);

?>
