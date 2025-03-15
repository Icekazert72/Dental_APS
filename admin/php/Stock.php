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

                                            <form class="row g-3 needs-validation" novalidate method="post" action="NuevoFarmaco.php" enctype="multipart/form-data">
                                                <div class="col-md-4">
                                                    <label for="validationCustom01" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="validationCustom01" name="nombre" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Formato</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="formato" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Via</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="via" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Uso</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="uso" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Efecto</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="efecto" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Precio Unitario</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="precio_unitario" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Imagen</label>
                                                    <input type="file" class="form-control" name="imagen" id="validationCustom02" required>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary" type="submit">Agregar a Stock</button>
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

                        <li class="nav-item stock">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-color-principal bx btn-modal-1" data-bs-toggle="modal" data-bs-target="#exampleModal_2">
                                <i class="fa-solid fa-box-open"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">AGREGAR</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3 needs-validation" novalidate method="post" action="StockFarmaco.php" enctype="multipart/form-data">
                                                <div class="col-md-4">
                                                    <label for="validationCustom01" class="form-label">Cantidad</label>
                                                    <input type="text" class="form-control" id="validationCustom01" name="cantidad" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Descripcion</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="descripcion" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Farmaco</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="farmaco" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">ID Empleado</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="empleado" required>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary" type="submit">Agregar a Stock</button>
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
                            <th th class="fototable">Foto</th>
                            <th>Nombre</th>
                            <th>Via</th>
                            <th>Precio</th>
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

            <div class="paneles panel_semisolidos" id="panel_semisolidos">
                <table>
                    <thead>
                        <tr>
                            <th th class="fototable">Foto</th>
                            <th>Nombre</th>
                            <th>Via</th>
                            <th>Precio</th>
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

            <div class="paneles panel_liquidos" id="panel_liquidos">
                <table>
                    <thead>
                        <tr>
                            <th th class="fototable">Foto</th>
                            <th>Nombre</th>
                            <th>Via</th>
                            <th>Precio</th>
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

            <div class="paneles panel_gaseosos" id="panel_gaseosos">
                <table>
                    <thead>
                        <tr>
                            <th th class="fototable">Foto</th>
                            <th>Nombre</th>
                            <th>Via</th>
                            <th>Precio</th>
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
    <script src="../js/menu_stock.js"></script>
</body>

</html>