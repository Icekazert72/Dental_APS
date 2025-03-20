<?php

    require('../../conexion/conexion.php');

    

if (!$conexion) {
    die(json_encode(['error' => 'Error al conectar con la base de datos: ' . mysqli_connect_error()]));
}

$sql = "SELECT p.nombre, p.apellido, p.foto, c.servicio, c.estado 
        FROM Pacientes p 
        JOIN Citas c ON p.id_paciente = c.id_paciente
        WHERE c.estado = 'Pendiente'";


$result = mysqli_query($conexion, $sql);


if (!$result) {
    die(json_encode(['error' => 'Error en la consulta: ' . mysqli_error($conexion)]));
}


$patients = [];


while ($row = mysqli_fetch_assoc($result)) {
    $patients[] = $row;
}


echo json_encode($patients);


mysqli_close($conexion);

?>