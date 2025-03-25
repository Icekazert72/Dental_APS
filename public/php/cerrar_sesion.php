<?php
session_start();


if (isset($_SESSION['id_paciente']) || isset($_SESSION['id_usuario'])) {
    
   
    if (isset($_SESSION['id_paciente'])) {
        session_unset(); 
    }

    if (isset($_SESSION['id_usuario'])) {
        session_unset(); 
    }

    
    session_destroy();

   
    echo json_encode(['success' => true, 'message' => 'Sesión cerrada correctamente.']);
} else {
   
    echo json_encode(['success' => false, 'message' => 'No hay sesión activa.']);
}
?>

