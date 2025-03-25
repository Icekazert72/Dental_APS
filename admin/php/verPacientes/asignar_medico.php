<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aps";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cita = isset($_POST['id_cita']) ? $_POST['id_cita'] : null;
    $id_medico = isset($_POST['id_medico']) ? $_POST['id_medico'] : null;

    if ($id_cita && $id_medico) {
        $sql = "UPDATE Citas SET id_medico = '$id_medico', estado = 'Confirmada' WHERE id_cita = '$id_cita'";

        if (mysqli_query($conn, $sql)) {
            echo "Cita asignada correctamente.";
        } else {
            echo "Error al asignar el médico: " . mysqli_error($conn);
        }
    } else {
        echo "Datos incompletos. No se pudo asignar el médico.";
    }
}

mysqli_close($conn);
?>
