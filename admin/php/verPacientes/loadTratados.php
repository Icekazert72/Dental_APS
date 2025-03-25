<?php

    require('../../conexion/conexion.php');


$sql = "SELECT p.nombre, p.apellidos, p.imagen, c.servicio, c.estado, c.motivo
        FROM Pacientes p 
        JOIN Citas c ON p.id_paciente = c.id_paciente WHERE c.estado = 'Completada'";

$resultado = mysqli_query($conexion, $sql);


$citas_confirmadas = [];

if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $citas_confirmadas[] = $fila;
    }
}


echo json_encode($citas_confirmadas);


mysqli_close($conexion);

?>