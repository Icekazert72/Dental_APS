<?php

session_start();



require_once '../admin/conexion/conexion.php';

$idPaciente = $_SESSION['id_paciente'];
$receta = null;

if ($idPaciente) {
    $receta = getRecetaByPacienteId($conexion, $idPaciente);
}

$isNuevaReceta = false;
if ($idPaciente) {
    $isNuevaReceta = isRecetaNueva($conexion, $idPaciente);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Est.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <style>
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        #notificacionReceta {
            display: none;
            animation: blink 1s infinite;
        }
    </style>
</head>

<body>
    <header>
        <div class="contactos container">
            <div></div>
            <div class="cont">
                <div>+240 222 000 000</div>
                <div>infodentalaps@gmail.com</div>
            </div>
            <div></div>
        </div>
        <div class="header container">
            <div class="logo">
                <h1>DAPS</h1>
            </div>
            <div class="nav-idioma-usuario">
                <div class="nav">
                    <div class="navs">
                        <div class="vn"><a href="../index.php">Inicio</a></div>
                    </div>
                    <div class="navs">
                        <button id="cerrarSesionBtn" class="btn" style="margin-left: 10px; color: red;"><strong>Cerrar sesión</strong></button>
                    </div>
                    <div class="burger btn"><i class="fa-solid fa-bars"></i></div>
                </div>
                <div class="preferencias">
                    <div class="idioma"><img src="../img/bandera.png" alt=""></div>
                    <div class="opciones btn"><i class="fa-solid fa-ellipsis-vertical"></i></div>
                </div>
            </div>
        </div>
        <div id="notificacionReceta" class="alert alert-info" style="display: <?php echo $isNuevaReceta ? 'block' : 'none'; ?>;">
            <strong>Nueva receta disponible!</strong>
        </div>
    </header>

    <main class="container mt-3">

        <div class="container-ms mt-5 mb-5">
            <label for="exampleInputPassword1" class="form-label">
                <h2>Solicitud de Cita <i class="fa-solid fa-notes-medical"></i></h2>
            </label>
            <form class="row gx-3 gy-2 align-items-center" id="citaForm">
                <div class="col-sm-3">
                    <label class="visually-hidden" for="specificSizeInputName">Fecha de Cita</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Jane Doe">
                </div>
                <div class="col-sm-3">
                    <label class="visually-hidden" for="specificSizeInputName">Motivo</label>
                    <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Cual es el motivo ?">
                </div>
                <div class="col-sm-3" style="display: none;">
                    <label class="visually-hidden" for="specificSizeInputGroupUsername">id</label>
                    <div class="input-group">
                        <div class="input-group-text">@</div>
                        <input type="text" class="form-control" id="id" placeholder="id" name="id" value="<?php echo $_SESSION['id'] ?>">
                    </div>
                </div>
                <div class="col-sm-3">
                    <label class="visually-hidden" for="specificSizeSelect">Preference</label>
                    <select class="form-select" name="servicio" id="servicio">
                        <option selected>Que servicio ?</option>
                        <option value="Revision">Revision</option>
                        <option value="Limpieza">Limpieza</option>
                        <option value="Exatraccion">Exatraccion</option>
                        <option value="Implantacion">Implantacion</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">solicita <i class="fa-solid fa-check"></i></button>
                </div>
            </form>
        </div>

        <div class="container mb-5">

            <!-- Contenedor principal -->
            <div class="container">
                <div class="row">
                    <!-- Información del paciente -->
                    <div class="">
                        <div class="card" style="width: 100%; height: 100%;">
                            <div class="card-header">
                                <h4 class="card-title">Bienvenido, <span id="nombrePaciente"><?php echo $_SESSION['nombre'] ?> <?php echo $_SESSION['apellidos'] ?></span></h4>
                            </div>
                            <div class="card-body">
                                <h5>Información personal:</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>CURP:</th>
                                        <td id="curpPaciente">ABC123456789XYZ</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha de Nacimiento:</th>
                                        <td id="fechaNacimientoPaciente"><?php echo $_SESSION['fecha'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td id="emailPaciente"><?php echo $_SESSION['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Género:</th>
                                        <td id="generoPaciente"><?php echo $_SESSION['genero'] ?></td>
                                    </tr>
                                </table>

                                <h5>Historial Médico:</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Diagnóstico</th>
                                            <th>Tratamiento</th>
                                            <th>Notas</th>
                                        </tr>
                                    </thead>
                                    <tbody id="historial">
                                        <!-- <tr>
                                            <td>12/03/2023</td>
                                            <td>Hipertensión</td>
                                            <td>Medicamento A, ejercicio regular</td>
                                            <td>El paciente debe controlar su presión arterial y seguir el tratamiento indicado.</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-primary" onclick="window.location.href='perfil.html'">Ver perfil</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-5">
                <h2 class="text-center mb-4">Mis Citas</h2>

                <!-- Tabla responsiva -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Fecha y Hora</th>
                                <th>Motivo</th>
                                <th>Estado</th>
                                <th>Servicio</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="mis_citas">
                            <!-- Aquí se insertan las filas dinámicamente con PHP o Backend -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="container my-5">
                <h2 class="text-center mb-4">Receta del Paciente</h2>

                <!-- Panel para la receta -->
                <div id="recetaPaciente" class="card" style="display: <?php echo $receta ? 'block' : 'none'; ?>;">
                    <div class="card-header bg-dark text-white">
                        <h5>Detalles de la Receta</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Fecha:</strong> <span id="recetaFecha"><?php echo $receta['fecha_hora'] ?? '--'; ?></span></p>
                        <p><strong>Diagnóstico:</strong> <span id="recetaDiagnostico"><?php echo $receta['diagnostico'] ?? '--'; ?></span></p>
                        <p><strong>Tratamiento:</strong> <span id="recetaTratamiento"><?php echo $receta['tratamiento'] ?? '--'; ?></span></p>
                        <p><strong>Notas:</strong> <span id="recetaNotas"><?php echo $receta['notas'] ?? '--'; ?></span></p>
                        <button id="vistoBtn" class="btn btn-success">Visto</button>
                    </div>
                </div>

                <?php if (!$receta): ?>
                    <div class="alert alert-warning text-center">Sin recetas</div>
                <?php endif; ?>
            </div>

        </div>

        <div id="loadingSpinner" style="display: none;">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p>Cerrando sesión...</p>
        </div>

    </main>

    <script src="js/cita.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2.js"></script>
    <script>
        window.onload = function() {
            loadHistorial();
            loadCitas(); // Llamada para cargar las citas del paciente
        }
    </script>
</body>

</html>