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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-color-principal btn-modal-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-users-rectangle"></i><span> Nuevo Empleado</span>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Empleado</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3 needs-validation" novalidate method="post" action="NuevoPaciente.php" enctype="multipart/form-data">
                                                <div class="col-md-4">
                                                    <label for="validationCustom01" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="validationCustom01" name="nombre" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Apellido</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="apellido" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">DNI</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="numero" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Fecha</label>
                                                    <input type="date" class="form-control" id="validationCustom02" name="fecha" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Profesion</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="profesion" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Oreganizacion</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="organizacion" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Puesto Ocupado</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="puesto" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Nacionalidad</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="nacionalidad" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">FOTO</label>
                                                    <input type="file" class="form-control" name="foto" id="validationCustom02" required>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary" type="submit">Agregar</button>
                                                </div>
                                            </form>

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
                            <th th class="fototable">Foto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Targeta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th th class="fototable">img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th><div><i class="fa-regular fa-address-card"></i></div></th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="paneles panel_doctores" id="panel_doctores">
                <table>
                    <thead>
                        <tr>
                            <th th class="fototable">Foto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Especialidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th th class="fototable">img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th>Acciones</th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="paneles panel_enferm" id="panel_enferm">
                <table>
                    <thead>
                        <tr>
                            <th th class="fototable">Foto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Especialidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th th class="fototable">img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th>Acciones</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/menu_empleados.js"></script>
</body>

</html>