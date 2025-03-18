<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aps"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT imagen, nombre, apellidos, fecha_registro FROM pacientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $foto = $row['imagen'];  
        $nombre = $row['nombre'];
        $apellido = $row['apellidos'];
        $creacion = $row['fecha_registro'];

        echo "<tr>";
        echo "<th class='fototable'><img src='../img/$foto' style='width: 100%' alt='Foto de $nombre'></th>";
        echo "<th>$nombre</th>";
        echo "<th>$apellido</th>";
        echo "<th>$creacion</th>";
        echo "</tr>";
    }
} 

$conn->close();
?>
