<?php
// Datos de conexión
$host = 'localhost';  // Cambia esto por tu host de base de datos
$dbname = 'aps';  // Cambia esto por el nombre de tu base de datos
$username = 'root';  // Cambia esto por tu nombre de usuario
$password = '';  // Cambia esto por tu contraseña

// Conexión a la base de datos usando MySQLi
$conexion = mysqli_connect($host, $username, $password, $dbname);

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si se recibieron datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $fecha_nacimiento = mysqli_real_escape_string($conexion, $_POST['fecha_nacimiento']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $historial_medico = mysqli_real_escape_string($conexion, $_POST['historial_medico']);
    $genero = mysqli_real_escape_string($conexion, $_POST['genero']);

    // Manejar la imagen subida
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        // Obtener información del archivo
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $imagen_name = $_FILES['imagen']['name'];
        $imagen_size = $_FILES['imagen']['size'];
        $imagen_type = $_FILES['imagen']['type'];

        // Directorio de destino para guardar las imágenes
        $directorio_destino = '../img/';

        // Verificar si la imagen tiene un tamaño adecuado
        if ($imagen_size > 2000000) { // 2 MB máximo
            die("La imagen es demasiado grande.");
        }

        // Verificar que el archivo sea una imagen (puedes agregar más verificaciones si lo deseas)
        if (exif_imagetype($imagen_tmp) !== false) {
            // Generar un nombre único para la imagen
            $imagen_nueva = uniqid() . '-' . $imagen_name;

            // Mover la imagen al directorio de destino
            if (move_uploaded_file($imagen_tmp, $directorio_destino . $imagen_nueva)) {
                // La ruta de la imagen que se guardará en la base de datos
                $ruta_imagen = $directorio_destino . $imagen_nueva;

                // Consulta SQL para insertar los datos
                $sql = "INSERT INTO Pacientes (nombre, apellidos, fecha_nacimiento, direccion, telefono, email, historial_medico, genero, imagen) 
                        VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$telefono', '$email', '$historial_medico', '$genero', '$ruta_imagen')";

                // Ejecutar la consulta
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

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
