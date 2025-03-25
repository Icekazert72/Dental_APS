<?php
// Include the database connection
include '../conexion/conexion.php';

// Query to fetch all consultations
$query = "SELECT c.id_consulta, p.nombre AS paciente, m.nombre AS medico, c.notas, c.diagnostico, c.tratamiento
          FROM Consultas c
          JOIN Pacientes p ON c.id_paciente = p.id_paciente
          JOIN Medicos m ON c.id_medico = m.id_medico";

$result = mysqli_query($conexion, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['paciente']}</td>
                <td>{$row['medico']}</td>
                <td>{$row['notas']}</td>
                <td>{$row['diagnostico']}</td>
                <td>{$row['tratamiento']}</td>
              </tr>";
    }
} else {
    echo "Error: " . mysqli_error($conexion);
}

// Close the connection
mysqli_close($conexion);
?>
