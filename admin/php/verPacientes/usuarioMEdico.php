<?php

    require('../../conexion/conexion.php');


$sql = "SELECT * FROM USuarios WHERE tipo_usuario = 'medico'";

$resultado = mysqli_query($conexion, $sql);


$citas_confirmadas = [];

if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $citas_confirmadas[] = $fila;
    }
}


echo json_encode($citas_confirmadas);


mysqli_close($conexion);

?>