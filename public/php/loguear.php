<?php
session_start();  

$host = 'localhost'; 
$dbname = 'aps'; 
$username = 'root';  
$password = '';  


$conn = mysqli_connect($host, $username, $password, $dbname);


if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}


if (isset($_POST['LogEmail']) && isset($_POST['LogTelefono'])) {
    $email = mysqli_real_escape_string($conn, $_POST['LogEmail']);
    $telefono = mysqli_real_escape_string($conn, $_POST['LogTelefono']);
    
   
    $sql = "SELECT * FROM pacientes WHERE email = '$email' AND telefono = '$telefono'";
    $result = mysqli_query($conn, $sql);
    

    if (mysqli_num_rows($result) > 0) {
        
        $user = mysqli_fetch_assoc($result);
        
        
        $_SESSION['id'] = $user['id_paciente'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['telefono'] = $user['telefono'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['historial_medico'] = $user['historial_medico'];
        $_SESSION['fecha'] = $user['fecha_nacimiento'];
        
       
        echo "success"; 
    } else {
       
        echo "error";  
    }
}


mysqli_close($conn);
?>
