<?php

require('../../admin/conexion/conexion.php');


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$sql = "SELECT c.id_cita, p.nombre, c.fecha_hora, c.motivo, c.estado 
        FROM Citas c
        JOIN Pacientes p ON c.id_paciente = p.id_paciente";
$result = mysqli_query($conexion, $sql);


if (mysqli_num_rows($result) > 0) {
    $citas = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $citas[] = $row;
    }
} else {
    $citas = [];
}


$sql_cancelados = "SELECT c.id_cita, p.nombre, c.fecha_hora, c.motivo, c.estado 
        FROM Citas c
        JOIN Pacientes p ON c.id_paciente = p.id_paciente WHERE c.estado = 'Cancelada'";
$result_cancelados = mysqli_query($conexion, $sql_cancelados);


if (mysqli_num_rows($result_cancelados) > 0) {
    $citas_cancelados = [];
    while ($row_cancelados = mysqli_fetch_assoc($result_cancelados)) {
        $citas_cancelados[] = $row_cancelados;
    }
} else {
    $citas_cancelados = [];
}



$sql_completados = "SELECT c.id_cita, p.nombre, c.fecha_hora, c.motivo, c.estado 
        FROM Citas c
        JOIN Pacientes p ON c.id_paciente = p.id_paciente WHERE c.estado = 'Completada'";
$result_completados = mysqli_query($conexion, $sql_completados);


if (mysqli_num_rows($result_completados) > 0) {
    $citas_completados = [];
    while ($row_completados = mysqli_fetch_assoc($result_completados)) {
        $citas_completados[] = $row_completados;
    }
} else {
    $citas_completados = [];
}




mysqli_close($conexion);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/pcts.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <link rel="shortcut icon" href="../img/Logo2.png" type="image/x-icon">
</head>

<body class="tema" id="tema">

    <header class="container-fluit">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <div class="logo_ini"><img src="../img/Logo2.png" alt="" width="35px"><a class="navbar-brand" href="../index.php"><strong><i class="fa-solid fa-angle-left"></i></strong></a></div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item perfil_usuario">
                            <div><img src="../img/Logo2.png" width="28px" alt=""></div>
                            <a class="nav-link" href="php/jugadores.php">Usuario</a>
                        </li>
                        <li class="nav-item crear_usuario">
                            <a href="../index.php" class="btn">Volver</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-buscar" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main class="container-fluit">
        <div class="panel_estado">
            <div class="menu" id="cerrarMenu"><i class="fa-regular fa-circle-dot"></i></div>
            <div class="menu_trat">
                <div><input type="button" value="Completados" id="todos_abrir_citas"></div>
                <div><input type="button" value="Confirmadas" id="confirmacion_abrir"></div>
                <div><input type="button" value="Cancelados" id="pendientes_abrir"></div>
                <div class="btn boton-tema-oscuro" id="boton-tema-oscuro"><i class="fa-solid fa-moon"></i></div>
                <div class="btn boton-tema-normal" id="boton-tema-normal"><i class="fa-regular fa-sun"></i></div>
            </div>
        </div>

        <div class="pnls mt-3">
            <div class="paneles panel_citas" id="panel_citas">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de la cita</th>
                            <th>Motivo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <?php

                    if (count($citas_completados) > 0) {
                        foreach ($citas_completados as $cita_completados) {
                            echo "<tr>";

                            echo "<th>" . htmlspecialchars($cita_completados['nombre']) . "</th>";
                            echo "<th>" . htmlspecialchars($cita_completados['fecha_hora']) . "</th>";
                            echo "<th>" . htmlspecialchars($cita_completados['motivo']) . "</th>";
                            echo "<th>" . htmlspecialchars($cita_completados['estado']) . "</th>";
                            echo "</tr>";
                        }
                    } else {

                        echo "<tr><th colspan='4'>No hay citas disponibles</th></tr>";
                    }
                    ?>
                </table>
            </div>

            <div class="paneles panel_confirmadas" id="panel_confirmadas">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de la cita</th>
                            <th>Motivo</th>
                            <th>Gestion</th>
                        </tr>
                    </thead>
                    <tbody id="confirmados_check">

                    </tbody>
                </table>
            </div>

            <div class="paneles panel_pendientes" id="panel_pendientes">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de la cita</th>
                            <th>Motivo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (count($citas_cancelados) > 0) {
                            foreach ($citas_cancelados as $cita_cancelados) {
                                echo "<tr>";

                                echo "<th>" . htmlspecialchars($cita_cancelados['nombre']) . "</th>";
                                echo "<th>" . htmlspecialchars($cita_cancelados['fecha_hora']) . "</th>";
                                echo "<th>" . htmlspecialchars($cita_cancelados['motivo']) . "</th>";
                                echo "<th>" . htmlspecialchars($cita_cancelados['estado']) . "</th>";
                                echo "</tr>";
                            }
                        } else {

                            echo "<tr><th colspan='4'>No hay citas disponibles</th></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="paneles panel_todas" id="panel_todas">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de la cita</th>
                            <th>Motivo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Verificar si hay citas y mostrarlas
                        if (count($citas) > 0) {
                            foreach ($citas as $cita) {
                                // Asignar la clase CSS según el estado de la cita
                                $estado_class = '';
                                switch ($cita['estado']) {
                                    case 'Confirmada':
                                        $estado_class = 'estado-confirmada';
                                        break;
                                    case 'Cancelada':
                                        $estado_class = 'estado-cancelada';
                                        break;
                                    case 'Pendiente':
                                        $estado_class = 'estado-pendiente';
                                        break;
                                    case 'Completada':
                                        $estado_class = 'estado-completada';
                                        break;
                                }

                                echo "<tr>";
                                echo "<th>" . htmlspecialchars($cita['nombre']) . "</th>";
                                echo "<th>" . htmlspecialchars($cita['fecha_hora']) . "</th>";
                                echo "<th>" . htmlspecialchars($cita['motivo']) . "</th>";
                                echo "<th class='" . $estado_class . "'>" . htmlspecialchars($cita['estado']) . "</th>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><th colspan='4'>No hay citas disponibles</th></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>



    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/menu_citas.js"></script>
    <script src="../js/check_cancel.js"></script>
    <script src="../js/sweetalert2.js"></script>
</body>

</html>