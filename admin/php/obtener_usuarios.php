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

$sql = "SELECT imagen, nombre, apellidos, fecha_registro FROM pacientes WHERE fecha_registro > NOW() - INTERVAL $intervalo SECOND ORDER BY fecha_registro DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $foto = $row['imagen'];  
        $nombre = $row['nombre'];
        $apellido = $row['apellidos'];

        echo "<tr>";
        echo "<th class='fototable'><img src='img/$foto' style='width: 70%' alt=''></th>";
        echo "<th>$nombre</th>";
        echo "<th>$apellido</th>";
        echo "<th><div><i class='fa-regular fa-address-card'></i></div></th>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay usuarios recientes</td></tr>";
}

$conn->close();
?>
