<?php
session_start();


require('../../admin/conexion/conexion.php');

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['LogEmail']) && isset($_POST['LogTelefono'])) {
    $email = mysqli_real_escape_string($conexion, $_POST['LogEmail']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['LogTelefono']);
    
    if (empty($email) || empty($telefono)) {
        echo "Por favor, ingrese ambos campos de correo y teléfono.";
        exit;
    }

    
    $sql_paciente = "SELECT * FROM pacientes WHERE email = '$email' AND telefono = '$telefono'";
    $result_paciente = mysqli_query($conexion, $sql_paciente);

    if (mysqli_num_rows($result_paciente) > 0) {
        
        $user = mysqli_fetch_assoc($result_paciente);

        $_SESSION['id_paciente'] = $user['id_paciente'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['apellidos'] = $user['apellidos'];
        $_SESSION['telefono'] = $user['telefono'];
        $_SESSION['genero'] = $user['genero'];
        $_SESSION['historial_medico'] = $user['historial_medico'];
        $_SESSION['fecha'] = $user['fecha_nacimiento'];
        
        echo "Paciente";
    } else {
        
        $sql_usuario = "SELECT * FROM Usuarios WHERE email = '$email' AND telefono = '$telefono'";
        $result_usuario = mysqli_query($conexion, $sql_usuario);

        if (mysqli_num_rows($result_usuario) > 0) {
           
            $user = mysqli_fetch_assoc($result_usuario);

            $_SESSION['id_usuario'] = $user['id_usuario'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['apellidos'] = $user['apellidos'];
            $_SESSION['telefono'] = $user['telefono'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];

            
            echo "Usuario:" . $user['tipo_usuario']; 
        } else {
           
            echo "Correo o teléfono incorrectos.";
        }
    }
} else {
   
    echo "Por favor, ingrese ambos campos de correo y teléfono.";
}


mysqli_close($conexion);
?>
