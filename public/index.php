<?php

session_start();

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
                        <div class="vn"><a href="">Servicios</a></div>
                        <div class="vn"><a href="">Sobre Nosotros</a></div>
                    </div>
                    <div class="burger btn"><i class="fa-solid fa-bars"></i></div>
                </div>
                <div class="preferencias">
                    <div class="idioma"><img src="../img/bandera.png" alt=""></div>
                    <div class="opciones btn"><i class="fa-solid fa-ellipsis-vertical"></i></div>
                </div>
            </div>
        </div>
    </header>

    <main class="container mt-3">

        <div class="menu_panel">
            <div class="card">
                <div class="card-header">
                    Mi historial Medico
                </div>
                <div class="card-body" style="background-color: transparent;">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary"><i class="fa-regular fa-heart"></i> Ver</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Citas
                </div>
                <div class="card-body" style="background-color: transparent;">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary"><i class="fa-solid fa-notes-medical"></i> Solicitar</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Gestion de plantilla
                </div>
                <div class="card-body" style="background-color: transparent;">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary"><i class="fa-solid fa-clipboard"></i></a>
                    <button type="button" class="btn btn-primary position-relative">
                        Mensage <i class="fa-solid fa-box"></i>
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>

        </div>

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

        <div class="containet-ms">

        </div>

    </main>

    <script src="js/cita.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2.js"></script>
</body>

</html>