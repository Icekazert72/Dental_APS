<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica APS</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Es.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="shortcut icon" href="./img/Logo2.png" type="image/x-icon">
</head>

<body class="tema" id="tema">
    <div class="navigation-bar">
        <nav>

            <ul>

                <li>
                    <a href="#">
                        <div><img src="img/Logo2.png" width="45px" alt=""></div>
                        <div><span>
                                <h3>Clinica APS</h3>
                            </span></div>
                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <div><i class="fas fa-home"></i></div>
                        <div><span>Principal</span></div>
                    </a>
                </li>

                <li>
                    <a href="php/Pacientes.php">
                        <div><i class="fas fa-user"></i></div>
                        <div><span>Pacientes</span></div>
                    </a>
                </li>

                <li>
                    <a href="php/Cita.php">
                        <div><i class="fa-solid fa-notes-medical"></i></div>
                        <div><span>Citas</span></div>
                    </a>
                </li>

                <li>
                    <a href="php/Consultas.php">
                        <div><i class="fa-regular fa-clipboard"></i></div>
                        <div><span>Consultas</span></div>
                    </a>
                </li>

                <li>
                    <a href="php/Empleados.php">
                        <div><i class="fa-solid fa-users-rectangle"></i></div>
                        <div><span>Empleados</span></div>
                    </a>
                </li>

                <li>
                    <a href="php/Stock.php">
                        <div><i class="fa-solid fa-box-open"></i></div>
                        <div><span>Stock</span></div>
                    </a>
                </li>

                <li class="logout">
                    <a href="#">
                        <div><i class="fa-solid fa-arrow-right-from-bracket" style="color: red;"></i></div>
                        <div><span style="color: red;">Salir</span></div>
                    </a>
                </li>

            </ul>

        </nav>
    </div>

    <header class="container-fluit">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <div><a class="navbar-brand" href="#"><strong>APS</strong></a></div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item perfil_usuario">
                            <div><img src="img/Logo2.png" width="28px" alt=""></div>
                            <a class="nav-link" href="php/jugadores.php">Admin</a>
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

    <main class="container-fluid">
        <div class="panel-centlral">
            <div class="panel panel-pacientes">
                <div>
                    <h5>PACIENTES</h5>
                </div>
                <div><span>
                        <h2>0</h2>
                    </span></div>
            </div>
            <div class="panel panel-farmaco">
                <div>
                    <h5>FARMACOS</h5>
                </div>
                <div><span>
                        <h2>0</h2>
                    </span></div>
            </div>
            <div class="panel panel-citas">
                <div>
                    <h5>CITAS</h5>
                </div>
                <div><span>
                        <h2>0</h2>
                    </span></div>
            </div>
            <div class="panel panel-consultas">
                <div>
                    <h5>CONSULTAS</h5>
                </div>
                <div><span>
                        <h2>0</h2>
                    </span></div>
            </div>
        </div>

        <div class="panel_estado">

            <div class="menu_trat">
                <div class="btn boton-tema" id="boton-tema"><i class="fa-regular fa-circle-dot"></i></div>
                <div><button class="btn" type="button" id="recientes">Paciente Reciente</button></div>
                <div><button class="btn" type="button" id="C_recientes">Citas Recientes</button></div>
                <div><button class="btn" type="button" id="recetado">Farmaco Recetado</button></div>
                <div class="btn boton-tema-oscuro" id="boton-tema-oscuro"><i class="fa-solid fa-moon"></i></div>
                <div class="btn boton-tema-normal" id="boton-tema-normal"><i class="fa-regular fa-sun"></i></div>

            </div>
        </div>

        <div class="pnls">
            <div class="paneles panel_tablas panel_reciente" id="panel_reciente">
                <table>
                    <thead>
                        <tr>
                            <th class="fototable">Foto</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="usuarios_recientes">
                        <!-- <tr>
                            <th class="fototable" style=""><img src="img/" alt=""></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <div class="paneles panel_tablas panel_c_reciente" id="panel_c_reciente">
                <table>
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Apelldo</th>
                            <th>Motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th>Acciones</th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="paneles panel_tablas panel_recetado" id="panel_recetado">
                <table>
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th>Acciones</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/principal.js"></script>
    <script src="js/usuarios_recientes.js"></script>
</body>

</html>