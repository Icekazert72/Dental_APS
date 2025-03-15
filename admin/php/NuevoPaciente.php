<?php

require_once("../bbdd/bbdd.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$fecha = $_POST['fecha'];
$estado_civil = $_POST['estado_civil'];
$domicllo = $_POST['domicillo'];
$ciudad = $_POST['ciudad'];
$email = $_POST['email'];
$contacto = $_POST['contacto'];
$ocupacion = $_POST['ocupacion'];
$genero = $_POST['genero'];
$foto = $_FILES['foto']['name'];
$alojamiento_fotos = "../img/";
$archivos_temporales = $_FILES['foto']['tmp_name'];

$arreglo = explode('.', $foto);
$extension_img = strtolower(end($arreglo));
$extension_img_array = array('jpg', 'png', 'jpeg', 'gif');

if (in_array($extension_img, $extension_img_array)) {
    if (move_uploaded_file($archivos_temporales, $alojamiento_fotos . $foto)) {
        /****validacion***/
        if (empty($nombre)) {
            header("location:../php/Pacientes.php");
        } else {
            $Insertar = "INSERT INTO paciente ( imagen, nombre, apellido, dni, fecha, estado_civil, domicillo, ciudad, correolectronico, contacto, ocupacion, genero ) VALUES (
               '$foto', '$nombre', '$apellido', '$dni', '$fecha', '$estado_civil', '$domicllo', '$ciudad', '$email', '$contacto', '$ocupacion', '$genero'
        )";
            $queryIsert = mysqli_query($conexion, $Insertar);
            header("location:../php/Pacientes.php");
        }
    }
}
