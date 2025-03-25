<?php
session_start();

// Verificar si hay sesión activa
if (isset($_SESSION['id_paciente']) || isset($_SESSION['id_usuario'])) {

    // Eliminar las variables de sesión según corresponda
    if (isset($_SESSION['id_paciente'])) {
        session_unset(); 
    }

    if (isset($_SESSION['id_usuario'])) {
        session_unset(); 
    }

    // Destruir la sesión
    session_destroy();

    // Redirigir al usuario a una página de éxito o al login
    header('Location: ../'); // Cambia la URL según tu caso
    exit;
} else {
    // Redirigir al usuario si no hay sesión activa
    header('Location: /login.php'); // Cambia la URL según tu caso
    exit;
}
?>
