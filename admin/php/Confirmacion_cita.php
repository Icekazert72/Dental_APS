
<?php

require_once("../bbdd/bbdd.php");

$fecha = $_POST['fecha'];
$ciudad = $_POST['ciudad'];
$motivo = $_POST['motivo'];
$contacto_medico = $_POST['contacto_medico'];
$email = $_POST['email'];
$fecha_cita = $_POST['fecha_cita'];
$direccion_clinica = $_POST['direccion_clinica'];
$ID = $_POST['ID'];

if (empty($fecha)) {
        header("location:../php/NuevaCita.php");
} else {

    $inyec_cita = "INSERT INTO cita_confirmada (motivo, fecha, contacto_Medico, ciudad, correolectronico, fecha_cita, direccion_clinica, paciente) VALUES (
    '$motivo', '$fecha', '$contacto_medico', '$ciudad', '$email', '$fecha_cita', '$direccion_clinica', '$ID'
    )";
    $queryInsert = mysqli_query($conexion, $inyec_cita);
    header("location:../php/Cita.php");
}

