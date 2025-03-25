<?php

require_once("../bbdd/bbdd.php");

$id_paciente = $_GET['id'];
$select_paciente = "SELECT * FROM paciente WHERE id_paciente = '$id_paciente'";
$query_select_paciente = mysqli_query($conexion, $select_paciente);
$extraer = mysqli_num_rows($query_select_paciente);
$paciente = mysqli_fetch_assoc($query_select_paciente);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $paciente['nombre'] ?> <?php echo $paciente['apellido'] ?>: 000<?php echo $paciente['id_paciente'] ?></title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/pcts.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="shortcut icon" href="../img/Logo2.png" type="image/x-icon">
</head>

<body>
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
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container-fluit tarjeta_paciente">
        <!-- Modal -->

        <div class="container py-4">
            <div>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            
                            <div class="tarjeta_pacientes">
                                    <div class="tp_1"><img src="../img/<?php echo $paciente['imagen'] ?>" alt=""></div>
                                    <div class="tp_2">
                                        <div class="dato card-title"> <?php echo $paciente['nombre'] ?> <?php echo $paciente['apellido'] ?></div>
                                        <div class="dato card-text"><div><strong>DNI</strong></div> <div><p></p></div></div>
                                        <div class="dato card-text"><div><strong>FECHA DE NACIMIENTO</strong></div> <div><p></p></div></div>
                                        <div class="dato card-text"><div><strong>ESTADO CIVIL</strong></div> <div><p></p></div></div>
                                        <div class="dato card-text"><div><strong>DOMICILLO</strong></div> <div><p></p></div></div>
                                        <div class="dato card-text"><div><strong>CIUDAD</strong></div> <div><p></p></div></div>
                                        <div class="dato card-text"><div><strong>EMAIL</strong></div> <div><p></p></div></div>
                                        <div class="dato card-text"><div><strong>CONTACTO</strong></div> <div><p></p></div></div>
                                        <div class="dato card-text"><div><strong>GENERO</strong></div> <div><p></p></div></div>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


    <script src="../js/bootstrap.min.js"></script>
</body>

</html>