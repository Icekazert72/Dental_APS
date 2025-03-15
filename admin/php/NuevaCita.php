<?php

require_once("../bbdd/bbdd.php");

$id_paciente = $_GET['id_paciente'];

$pacientes = "SELECT * FROM paciente WHERE id_paciente = '$id_paciente'";
$queryPacientes = mysqli_query($conexion, $pacientes);
$Pacientes_query_list = mysqli_num_rows($queryPacientes);
$Pacientes = mysqli_fetch_assoc($queryPacientes);


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
                    <div class="logo_ini"><img src="../img/Logo2.png" alt="" width="35px"><a class="navbar-brand" href="../index.php"><strong>APS</strong></a></div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item perfil_usuario">
                            <div><img src="../img/Logo2.png" width="28px" alt=""></div>
                            <a class="nav-link" href="php/jugadores.php">Usuario</a>
                        </li>
                        <li class="nav-item crear_usuario">
                            <a href="../php/Cita.php" class="btn">Volver</a>
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

    <main class="cotainer-fluit">
        <div class="container py-4">
            <div>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            <form class="row g-3 needs-validation" novalidate method="post" action="Confirmacion_cita.php" enctype="multipart/form-data">

                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="validationCustom02" name="fecha" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="ciudad" required>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Motivo de la cita</label>
                                    <textarea name="motivo" class="form-control" id="" style="width: 370px;" cols="60"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Contacto Medico</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="contacto_medico" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Loc Clinica</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="localizacion_clinica" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="validationCustom02" name="email" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Fecha de la Cita</label>
                                    <input type="date" class="form-control" id="validationCustom02" name="fecha_cita" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Direccion de Clinica</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="direccion_clinica" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">ID del Paciente</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="ID" value="<?php echo $Pacientes['id_paciente']?>"  required>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Establecer</button>
                                    <a href="../php/Cita.php" class="btn btn-primary">Volver</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/menu_citas.js"></script>
</body>

</html>