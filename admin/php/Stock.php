<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STOCK</title>
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
                                <i class="fa-solid fa-box-open"></i><span> Nuevo Farmaco</span>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Farmaco</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="POST" id="farmacoForm">
                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="descripcion" class="form-label">Descripción</label>
                                                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dosis" class="form-label">Dosis</label>
                                                    <input type="text" class="form-control" id="dosis" name="dosis">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="via" class="form-label">Vía</label>
                                                    <input type="text" class="form-control" id="via" name="via">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="forma_administracion" class="form-label">Forma de Administración</label>
                                                    <input type="text" class="form-control" id="forma_administracion" name="forma_administracion">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="efectos_secundarios" class="form-label">Efectos Secundarios</label>
                                                    <textarea class="form-control" id="efectos_secundarios" name="efectos_secundarios"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="estado_fisico" class="form-label">Estado Físico</label>
                                                    <select class="form-control" id="estado_fisico" name="estado_fisico">
                                                        <option value="Gaseoso">Gaseoso</option>
                                                        <option value="Sólido">Sólido</option>
                                                        <option value="Líquido">Líquido</option>
                                                        <option value="Semisólido">Semisólido</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stock" class="form-label">Stock</label>
                                                    <input type="number" class="form-control" id="stock" name="stock" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Registrar Fármaco</button>
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
                <div><button type="button" class="btn" id="solidos">Solidos</button></div>
                <div><button type="button" class="btn" id="semisolidos">Semisolidos</button></div>
                <div><button type="button" class="btn" id="liquidos">Liquidos</button></div>
                <div><button type="button" class="btn" id="gaseosos">Gaseosos</button></div>
                <div class="btn boton-tema-oscuro" id="boton-tema-oscuro"><i class="fa-solid fa-moon"></i></div>
                <div class="btn boton-tema-normal" id="boton-tema-normal"><i class="fa-regular fa-sun"></i></div>
            </div>
        </div>

        <div class="pnls mt-3">
            <div class="paneles panel_solidos" id="panel_solidos">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estado Fisico</th>
                            <th>Via</th>
                            <th>Cantidad Stock</th>
                        </tr>
                    </thead>
                    <tbody id="farm_solidos">
                        <!-- <tr>
                            <th th class="fototable">img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th>Acciones</th>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <div class="paneles panel_semisolidos" id="panel_semisolidos">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estado Fisico</th>
                            <th>Via</th>
                            <th>Cantidad Stock</th>
                        </tr>
                    </thead>
                    <tbody id="farm_semisolidos">
                        <!-- <tr>
                            <th th class="fototable">img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th>Acciones</th>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <div class="paneles panel_liquidos" id="panel_liquidos">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estado Fisico</th>
                            <th>Via</th>
                            <th>Cantidad Stock</th>
                        </tr>
                    </thead>
                    <tbody id="farm_liquidos">
                        <!-- <tr>
                            <th th class="fototable">img</th>
                            <th>Todos</th>
                            <th>Apelldo</th>
                            <th>Acciones</th>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <div class="paneles panel_gaseosos" id="panel_gaseosos">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estado Fisico</th>
                            <th>Via</th>
                            <th>Cantidad Stock</th>
                        </tr>
                    </thead>
                    <tbody id="farm_gaseosos">
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
    <script src="../js/menu_stock.js"></script>
    <script src="../js/sweetalert2.js"></script>
</body>

</html>