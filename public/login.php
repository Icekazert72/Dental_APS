<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/Est.css">
<link rel="stylesheet" href="../css/fontawesome.min.css">
<link rel="stylesheet" href="../css/sweetalert2.css">

<body style="height: 100vh; display:flex;">


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
                    <div class="btn" id="home"><a href="../index.php"><i class="fa-solid fa-house-user"></i></a></div>
                    <div class="opciones btn"><i class="fa-solid fa-ellipsis-vertical"></i></div>
                </div>
            </div>
        </div>
    </header>

    <main class="container-fuit mt-3">
        <div class="container fomularioLogin" id="fomularioLogin" style="width: 39%;">
            <form method="POST" action="" id="formLog">
                <label for="exampleInputPassword1" class="form-label">
                    <h4>Si eres Nuevo debes Crear Cuenta "" <i class="fa-regular fa-user"></i> ""</h4>
                </label>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" name="LogEmail" id="LogEmail" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Nunca Compartiremos el correo eloctronico con nadie mas.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Numero de telefono</label>
                    <input type="password" class="form-control" name="LogTelefono" id="LogTelefono">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                <button type="button" id="btnCrear" class="btn" style="background-color: orange;">Crear <i class="fa-regular fa-user"></i> Cuenta</button>
            </form>
        </div>
        <div class="container" id="formularioCrear" style="width: 65%; display:none;">
            <form action="" method="post" id="crearCuenta" enctype="multipart/form-data">
                <label for="exampleInputPassword1" class="form-label">
                    <h2>Crear Cuenta<i class="fa-regular fa-user"></i></h2>
                </label>
                <div class="input-group mt-2">
                    <span class="input-group-text">Nombre y Apellidos</span>
                    <input type="text" aria-label="nombre" name="nombre" class="form-control">
                    <input type="text" aria-label="apellido" name="apellido" class="form-control">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Correo Electronico</span>
                    <input type="email" aria-label="fecha_nacimiento" name="email" class="form-control">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Fecha/Nacimeinto y Direccion</span>
                    <input type="date" aria-label="fecha_nacimiento" name="fecha_nacimiento" class="form-control">
                    <input type="text" aria-label="direccion" name="direccion" class="form-control">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Genero e Historial Medico</span>
                    <input type="text" aria-label="genero" name="genero" class="form-control">
                    <input type="text" aria-label="historial_medico" name="historial_medico" class="form-control">
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Telefono y Foto Carnert</span>
                    <input type="text" aria-label="First name" name="telefono" class="form-control">
                    <input type="file" aria-label="imagen" name="imagen" class="form-control">
                </div>
                <div class="mb-3 form-check mt-2">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Has leido las criterios de ingresion ?</label>
                </div>
                <div id="emailHelp" class="form-text">La imagen ha de ser de tamaño carnet, con un maximo de 2Mb</div>

                <button type="submit" class="btn btn-primary mt-4"><i class="fa-solid fa-check"></i></button>
                <button type="button" id="btnNoCrear" class="btn mt-4" style="color: red; background-color: red;"><i class="fa-solid fa-rectangle-xmark" style=" color: white; "></i></button>
                <button type="button" id="btnLectura" class="btn mt-4" style="color: white; background-color: #a947ba;"><i class="fa-solid fa-book-open-reader"></i></button>
            </form>
        </div>

        <div class="container" id="masInforma" style="width: 70%; display:none;">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Criterios de Creacion #1
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Terminos de Creacion #2
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Informacion Necesaria #3
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <button type="button" id="btnNoCondicion" class="btn mt-4" style="color: red; background-color: red;"><i class="fa-solid fa-rectangle-xmark" style=" color: white; "></i></button>
            </div>
        </div>

        <div id="loadingSpinner_ini" style="display: none;">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p class="text-light"><h1>Iniciando sesión...</h1></p>
        </div>


    </main>

    <script src="../js/ajustes.js"></script>
    <script src="./js/login.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2.js"></script>
</body>

</html>