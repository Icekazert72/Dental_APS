<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "aps"; 


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$sql = "SELECT id_medico, nombre FROM Medicos";
$result = mysqli_query($conn, $sql);

$medicos = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $medicos[] = $row;
    }
}

echo json_encode($medicos);

mysqli_close($conn);
?>
