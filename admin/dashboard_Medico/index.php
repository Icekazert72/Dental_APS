<?php
include '../conexion/conexion.php';

if (isset($_SESSION['tipo_usuario']) == 'enfermera' && isset($_SESSION['tipo_usuario']) == 'otros' ) {
    header('location:../../../../../Dental_APS/index.php');
}

$num_citas = 0;
$num_pacientes = 0;

// Obtener el número de citas
$result = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM Citas WHERE estado = 'Pendiente'");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $num_citas = $row['total'];
}

// Obtener el número de pacientes
$result = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM Pacientes");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $num_pacientes = $row['total'];
}

mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Médico</title>
   <link rel="stylesheet" href="../css/all.min.css">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/fontawesome.min.css">
   <link rel="stylesheet" href="../css/sweetalert2.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
            background-color: #007bff;
        }
        .navbar-brand {
            color: #fff !important;
        }
        .nav-link {
            color: #fff !important;
            transition: background-color 0.3s, color 0.3s;
        }
        .nav-link:hover {
            background-color: #0056b3;
            color: #fff !important;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .form-container h3 {
            color: #007bff;
        }
        .form-container .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .card:hover {
            cursor: pointer;
            opacity: 0.8;
            transition: 1s;
        }
        .table-container {
            height: 220px;
            overflow-y: scroll;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Dental APS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showTable('pacientes')">Pacientes</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showTable('citas')">Citas</button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../../Dental_APS/index.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-5">Dashboard Médico</h1>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card text-white bg-info mb-3"">
                    <div class="card-header">Número de Citas</div>
                    <div class="card-body">
                        <h5 class="card-title" id="num_citas"><?php echo $num_citas; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-success mb-3"">
                    <div class="card-header">Número de Pacientes</div>
                    <div class="card-body">
                        <h5 class="card-title" id="num_pacientes"><?php echo $num_pacientes; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="" id="pacientes" role="tabpanel">
                <h3 class="mt-4">Tabla de Pacientes</h3>
                <div class="table-container">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Paciente</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody id="pacientesBody">
                            <!-- Aquí se insertarán los datos de los pacientes -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="" id="citas" role="tabpanel">
                <h3 class="mt-4">Tabla de Citas</h3>
                <div class="table-container">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Paciente</th>
                                <th>Fecha y Hora</th>
                                <th>Motivo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="citasBody">
                            <!-- Aquí se insertarán los datos de las citas -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-container">
                    <h3>Registrar Consulta</h3>
                    <form class="mt-4" id="consultaForm">
                        <div class="form-group">
                            <label for="id_paciente">ID Paciente</label>
                            <input type="number" class="form-control" id="id_paciente" name="id_paciente" required>
                        </div>
                        <div class="form-group">
                            <label for="notas">Notas</label>
                            <textarea class="form-control" id="notas" name="notas" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="diagnostico">Diagnóstico</label>
                            <input type="text" class="form-control" id="diagnostico" name="diagnostico" required>
                        </div>
                        <div class="form-group">
                            <label for="tratamiento">Tratamiento</label>
                            <input type="text" class="form-control" id="tratamiento" name="tratamiento" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar Consulta</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-container">
                    <h3>Dar Receta</h3>
                    <form class="mt-4" id="recetaForm">
                        <div class="form-group">
                            <label for="id_paciente_receta">ID Paciente</label>
                            <input type="number" class="form-control" id="id_paciente_receta" name="id_paciente_receta" required>
                        </div>
                        <div class="form-group">
                            <label for="id_medico">ID Médico</label>
                            <input type="number" class="form-control" id="id_medico" name="id_medico" required>
                        </div>
                        <div class="form-group">
                            <label for="id_farmaco">ID Fármaco</label>
                            <input type="number" class="form-control" id="id_farmaco" name="id_farmaco" required>
                        </div>
                        <div class="form-group">
                            <label for="dosis">Dosis</label>
                            <input type="text" class="form-control" id="dosis" name="dosis" required>
                        </div>
                        <div class="form-group">
                            <label for="frecuencia">Frecuencia</label>
                            <input type="text" class="form-control" id="frecuencia" name="frecuencia" required>
                        </div>
                        <div class="form-group">
                            <label for="duracion">Duración</label>
                            <input type="text" class="form-control" id="duracion" name="duracion" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Dar Receta</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="form-container">
            <h3>Buscar Paciente</h3>
            <form class="mt-4" id="searchForm">
                <div class="form-group">
                    <label for="search">Buscar por Nombre o Apellido</label>
                    <input type="text" class="form-control" id="search" name="search" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <div class="mt-4" id="searchResults">
                <h4>Resultados de la Búsqueda</h4>
                <div class="table-container">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Paciente</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody id="resultsBody">
                            <!-- Aquí se insertarán los resultados de la búsqueda -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2.js"></script>
    
    <script>
    function showTable(tableId) {
        $('.tab-pane').removeClass('show active');
        $('#' + tableId).addClass('show active');
        if (tableId === 'pacientes') {
            loadPacientes();
        } else if (tableId === 'citas') {
            loadCitas();
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Función para cargar pacientes
        function loadPacientes() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'load_pacientes.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            try {
                const data = JSON.parse(xhr.responseText);

                // Verificar si los datos tienen la propiedad "error"
                if (data.error) {
                    console.error('Error del servidor:', data.error);
                    Swal.fire('Error', 'Error al cargar los pacientes: ' + data.error, 'error');
                    return;
                }

                // Verificar que la respuesta sea un array
                if (!Array.isArray(data)) {
                    console.error('Los datos recibidos no son un arreglo válido');
                    Swal.fire('Error', 'Hubo un error al procesar los pacientes.', 'error');
                    return;
                }

                // Mostrar los datos en la tabla
                const pacientesBody = document.getElementById('pacientesBody');
                pacientesBody.innerHTML = ''; // Limpiar tabla antes de agregar filas
                data.forEach(paciente => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${paciente.id_paciente}</td>
                        <td>${paciente.nombre}</td>
                        <td>${paciente.apellidos}</td>
                        <td>${paciente.email}</td>
                        <td>${paciente.telefono}</td>
                    `;
                    pacientesBody.appendChild(row);
                });

            } catch (e) {
                console.error('Error al procesar la respuesta JSON:', e);
                Swal.fire('Error', 'Error al procesar los datos de pacientes.', 'error');
            }
        } else {
            console.error('Error en la solicitud de pacientes:', xhr.status, xhr.statusText);
            Swal.fire('Error', 'No se pudo cargar la tabla de pacientes.', 'error');
        }
    };
    xhr.onerror = function() {
        console.error('Error de red al cargar pacientes.');
        Swal.fire('Error', 'Error de red al intentar cargar los pacientes.', 'error');
    };
    xhr.send();
}


        // Función para cargar citas
        function loadCitas() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'load_citas.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            try {
                const data = JSON.parse(xhr.responseText);

                // Verificar si los datos contienen un error
                if (data.error) {
                    console.error('Error del servidor:', data.error);
                    Swal.fire('Error', 'Error al cargar las citas: ' + data.error, 'error');
                    return;
                }

                // Verificar que la respuesta sea un array
                if (!Array.isArray(data)) {
                    console.error('Los datos recibidos no son un arreglo válido');
                    Swal.fire('Error', 'Hubo un error al procesar las citas.', 'error');
                    return;
                }

                // Mostrar las citas en la tabla
                const citasBody = document.getElementById('citasBody');
                citasBody.innerHTML = ''; // Limpiar tabla antes de agregar filas
                data.forEach(cita => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${cita.id_paciente}</td>
                        <td>${cita.fecha_hora}</td>
                        <td>${cita.motivo}</td>
                        <td>${cita.estado}</td>
                    `;
                    citasBody.appendChild(row);
                });

            } catch (e) {
                console.error('Error al procesar la respuesta JSON:', e);
                Swal.fire('Error', 'Error al procesar los datos de citas.', 'error');
            }
        } else {
            console.error('Error en la solicitud de citas:', xhr.status, xhr.statusText);
            Swal.fire('Error', 'No se pudo cargar la tabla de citas.', 'error');
        }
    };
    xhr.onerror = function() {
        console.error('Error de red al cargar citas.');
        Swal.fire('Error', 'Error de red al intentar cargar las citas.', 'error');
    };
    xhr.send();
}


loadCitas();
loadPacientes();

        // Función para la búsqueda de pacientes
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const searchValue = document.getElementById('search').value;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `buscar_paciente.php?search=${searchValue}`, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    const resultsBody = document.getElementById('resultsBody');
                    resultsBody.innerHTML = '';
                    data.forEach(paciente => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${paciente.id_paciente}</td>
                            <td>${paciente.nombre}</td>
                            <td>${paciente.apellidos}</td>
                            <td>${paciente.email}</td>
                            <td>${paciente.telefono}</td>
                        `;
                        resultsBody.appendChild(row);
                    });
                } else {
                    console.error('Error en la solicitud de búsqueda de pacientes:', xhr.status, xhr.statusText);
                    Swal.fire('Error', 'No se pudo realizar la búsqueda de pacientes.', 'error');
                }
            };
            xhr.onerror = function() {
                console.error('Error de red al buscar pacientes.');
                Swal.fire('Error', 'Error de red al intentar buscar los pacientes.', 'error');
            };
            xhr.send();
        });

        // Función para registrar una consulta
        document.getElementById('consultaForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('consultaForm'));
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'registrar_consulta.php', true);
            xhr.onload = function() {
                const response = JSON.parse(xhr.responseText);
                if (xhr.status === 200) {
                    Swal.fire(response.message, '', 'success');
                    document.getElementById('consultaForm').reset();
                } else {
                    Swal.fire(response.message, '', 'error');
                }
            };
            xhr.onerror = function() {
                Swal.fire('Error', 'Hubo un error al registrar la consulta', 'error');
                console.error('Error de red al registrar consulta:', xhr.status, xhr.statusText);
            };
            xhr.send(formData);
        });

        // Función para registrar una receta
        document.getElementById('recetaForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('recetaForm'));
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'dar_receta.php', true);
            xhr.onload = function() {
                const response = JSON.parse(xhr.responseText);
                if (xhr.status === 200) {
                    Swal.fire(response.message, '', 'success');
                    document.getElementById('recetaForm').reset();
                } else {
                    Swal.fire(response.message, '', 'error');
                }
            };
            xhr.onerror = function() {
                Swal.fire('Error', 'Hubo un error al dar la receta', 'error');
                console.error('Error de red al dar receta:', xhr.status, xhr.statusText);
            };
            xhr.send(formData);
        });

        window.showTable = showTable; // Asegura que showTable esté disponible globalmente
    });
       
</script>


</body>
</html>