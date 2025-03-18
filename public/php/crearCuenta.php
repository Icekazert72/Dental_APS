<?php

$host = 'localhost';  
$dbname = 'aps';  
$username = 'root'; 
$password = '';  


$conexion = mysqli_connect($host, $username, $password, $dbname);


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $fecha_nacimiento = mysqli_real_escape_string($conexion, $_POST['fecha_nacimiento']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $historial_medico = mysqli_real_escape_string($conexion, $_POST['historial_medico']);
    $genero = mysqli_real_escape_string($conexion, $_POST['genero']);

  
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $imagen_name = $_FILES['imagen']['name'];
        $imagen_size = $_FILES['imagen']['size'];
        $imagen_type = $_FILES['imagen']['type'];

        
        $directorio_destino = '../img/';

        
        if ($imagen_size > 2000000) { 
            die("La imagen es demasiado grande.");
        }

      
        if (exif_imagetype($imagen_tmp) !== false) {
          
            $imagen_nueva = uniqid() . '-' . $imagen_name;

           
            if (move_uploaded_file($imagen_tmp, $directorio_destino . $imagen_nueva)) {
              
                $ruta_imagen = $directorio_destino . $imagen_nueva;

              
                $sql = "INSERT INTO Pacientes (nombre, apellidos, fecha_nacimiento, direccion, telefono, email, historial_medico, genero, imagen) 
                        VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$telefono', '$email', '$historial_medico', '$genero', '$ruta_imagen')";

               
                if (mysqli_query($conexion, $sql)) {
                    echo "Paciente agregado exitosamente.";
                } else {
                    echo "Error al agregar paciente: " . mysqli_error($conexion);
                }
            } else {
                echo "Error al subir la imagen.";
            }
        } else {
            echo "El archivo no es una imagen válida.";
        }
    } else {
        echo "No se subió ninguna imagen o hubo un error en la carga de la imagen.";
    }
}


mysqli_close($conexion);
?>
