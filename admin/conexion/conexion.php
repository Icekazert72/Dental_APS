<?php



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

// echo "Conexión exitosa!";

// mysqli_close($conexion);

function getRecetaByPacienteId($conexion, $idPaciente) {
    $query = "SELECT fecha_hora, diagnostico, tratamiento, notas 
              FROM Consultas 
              WHERE id_paciente = ? 
              ORDER BY fecha_hora DESC LIMIT 1";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $idPaciente);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function isRecetaNueva($conexion, $idPaciente) {
    $query = "SELECT TIMESTAMPDIFF(MINUTE, fecha_hora, NOW()) AS minutos 
              FROM Consultas 
              WHERE id_paciente = ? 
              ORDER BY fecha_hora DESC LIMIT 1";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $idPaciente);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Return true if the latest prescription is less than 2 minutes old
    return $row && $row['minutos'] < 2;
}
?>