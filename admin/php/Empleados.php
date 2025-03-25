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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-color-principal btn-modal-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-users-rectangle"></i> <span>Nuevo Usuario</span>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Empleado</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="container mt-5">
                                                <h2 class="mb-4 text-center">Formulario de Registro</h2>
                                                <form id="registroForm" action="registrar_usuario.php" method="POST">
                                                    <div class="row mb-3">
                                                        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="apellidos" class="col-sm-2 col-form-label">Apellidos:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" id="email" name="email" required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="tipo_usuario" class="col-sm-2 col-form-label">Tipo de Usuario:</label>
                                                        <div class="col-sm-10">
                                                            <select id="tipo_usuario" name="tipo_usuario" class="form-select" onchange="toggleMedicoFields()" required>
                                                                <option value="admin">Admin</option>
                                                                <option value="medico">Medico</option>
                                                                <option value="enfermera">Enfermera</option>
                                                                <option value="otro">Otro</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Campos para médicos -->
                                                    <div id="medicoFields" style="display:none;">
                                                        <div class="row mb-3">
                                                            <label for="especialidad" class="col-sm-2 col-form-label">Especialidad:</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="especialidad" name="especialidad">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="numero_licencia" class="col-sm-2 col-form-label">Número de Licencia:</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="numero_licencia" name="numero_licencia">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                                    </div>
                                                    <script>
                                                        function toggleMedicoFields() {
                                                            var tipo_usuario = document.getElementById('tipo_usuario').value;
                                                            var medicoFields = document.getElementById('medicoFields');

                                                            if (tipo_usuario === 'medico') {
                                                                medicoFields.style.display = 'block';
                                                            } else {
                                                                medicoFields.style.display = 'none';
                                                            }
                                                        }
                                                    </script>
                                                </form>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                <div><input type="button" value="Todos" id="todos_abrir"></div>
                <div><input type="button" value="Dr" id="doctores_abrir"></div>
                <div><input type="button" value="Enfermero/a" id="enfermeros_abrir"></div>
                <div class="btn boton-tema-oscuro" id="boton-tema-oscuro"><i class="fa-solid fa-moon"></i></div>
                <div class="btn boton-tema-normal" id="boton-tema-normal"><i class="fa-regular fa-sun"></i></div>
            </div>
        </div>

        <div class="pnls mt-3">
            <div class="paneles panel_empleados" id="panel_todos">
                <table>
                    <thead>
                        <tr>
                            <th>Correo Electronnico</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo de Usuario</th>
                        </tr>
                    </thead>
                    <tbody id="todos_usuarios">
                        <!-- <tr>
                            <th th class="fototable">img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th></th>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <div class="paneles panel_doctores" id="panel_doctores">
                <table>
                    <thead>
                        <tr>
                            <th>Correo Electronnico</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo de Usuario</th>
                        </tr>
                    </thead>
                    <tbody id="medicos">
                        <!-- <tr>
                            <th th class="fototable">img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th>Acciones</th>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <div class="paneles panel_enferm" id="panel_enferm">
                <table>
                    <thead>
                        <tr>
                            <th>Correo Electronnico</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo de Usuario</th>
                        </tr>
                    </thead>
                    <tbody id="enfermera">
                        <!-- <tr>
                            <th th class="fototable">img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th>Acciones</th>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/menu_empleados.js"></script>
    <script src="../js/sweetalert2.js"></script>
</body>

</html>