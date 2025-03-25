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
                    <div class="logo_ini"><img src="../img/Logo2.png" alt="" width="35px"><a class="navbar-brand" href="../index.php"><strong><i class="fa-solid fa-angle-left"></i></strong></a></div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item perfil_usuario">
                            <div><img src="../img/Logo2.png" width="28px" alt=""></div>
                            <a class="nav-link" href="php/jugadores.php">Usuario</a>
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
                <div><input type="button" value="Todas" id="todos_abrir_consultas"></div>
                <div><input type="button" value="Diarias" id="diarias_abrir"></div>
                <div class="btn boton-tema-oscuro" id="boton-tema-oscuro"><i class="fa-solid fa-moon"></i></div>
                <div class="btn boton-tema-normal" id="boton-tema-normal"><i class="fa-regular fa-sun"></i></div>
            </div>
        </div>

        <div class="pnls mt-3">
            <div class="paneles panel_consultas" id="panel_consultas">
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre Paciente</th>
                                <th>Nombre Medico</th>
                                <th>Notas</th>
                                <th>Diagnostico</th>
                                <th>Tratamientos</th>
                            </tr>
                        </thead>
                        <tbody id="all_consultas">
                            <!-- Las consultas se cargarán aquí dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="paneles panel_diarias" id="panel_diarias">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre Paciente</th>
                            <th>Nombre Medico</th>
                            <th>Notas</th>
                            <th>Diagnostico</th>
                            <th>Tratamientos</th>
                        </tr>
                    </thead>
                    <tbody id="all_diarias">
                        <!-- Las consultas diarias se cargarán aquí dinámicamente -->
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/menu_consultas.js"></script>
    <script>
        function cargarConsultas() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../php/obtener_consultas.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('all_consultas').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function cargarConsultasDiarias() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../php/obtener_consultas_diarias.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('all_diarias').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        // Llamar a las funciones al cargar la página
        cargarConsultas();
        cargarConsultasDiarias();
    </script>
</body>

</html>