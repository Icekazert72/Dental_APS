<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "aps"; 

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si los datos han sido enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $tipo_usuario = mysqli_real_escape_string($conn, $_POST['tipo_usuario']);
    $especialidad = isset($_POST['especialidad']) ? mysqli_real_escape_string($conn, $_POST['especialidad']) : null;
    $numero_licencia = isset($_POST['numero_licencia']) ? mysqli_real_escape_string($conn, $_POST['numero_licencia']) : null;

  
    $sql_usuario = "INSERT INTO Usuarios (nombre, apellidos, email, telefono, tipo_usuario) 
                    VALUES ('$nombre', '$apellidos', '$email', '$telefono', '$tipo_usuario')";
    
    if (mysqli_query($conn, $sql_usuario)) {
        
        $id_usuario = mysqli_insert_id($conn);
        
       
        if ($tipo_usuario === 'medico') {
            $sql_medico = "INSERT INTO Medicos (nombre, apellidos, especialidad,  email,  telefono, numero_licencia, id_usuario) 
                           VALUES ( '$nombre', '$apellidos', '$especialidad', '$email', '$telefono', '$numero_licencia', '$id_usuario')";
            if (mysqli_query($conn, $sql_medico)) {
                echo "Usuario y Médico registrados correctamente.";
            } else {
                echo "Error al registrar médico: " . mysqli_error($conn);
            }
        } else {
            echo "Usuario registrado correctamente.";
        }
    } else {
        echo "Error al registrar usuario: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
