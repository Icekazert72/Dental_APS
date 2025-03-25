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

    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $dosis = mysqli_real_escape_string($conn, $_POST['dosis']);
    $via = mysqli_real_escape_string($conn, $_POST['via']);
    $forma_administracion = mysqli_real_escape_string($conn, $_POST['forma_administracion']);
    $efectos_secundarios = mysqli_real_escape_string($conn, $_POST['efectos_secundarios']);
    $estado_fisico = mysqli_real_escape_string($conn, $_POST['estado_fisico']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);

   
    $sql = "INSERT INTO Farmacos (nombre, descripcion, dosis, via, forma_administracion, efectos_secundarios, estado_fisico, stock) 
            VALUES ('$nombre', '$descripcion', '$dosis', '$via', '$forma_administracion', '$efectos_secundarios', '$estado_fisico', '$stock')";

    if (mysqli_query($conn, $sql)) {
        echo "Fármaco registrado correctamente.";
    } else {
        echo "Error al registrar el fármaco: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
