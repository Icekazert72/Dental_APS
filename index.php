<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental APS</title>
</head>
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome.min.css">
<link rel="stylesheet" href="css/sweetalert2.css">
<link rel="stylesheet" href="css/Est.css">

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
                <h1>Dental</h1>
            </div>
            <div class="nav-idioma-usuario">
                <div class="nav">
                    <div class="navs">
                        <div class="vn"><a href="">Inicio</a></div>
                        <div class="vn"><a href="">Servicios</a></div>
                        <div class="vn"><a href="">Sobre Nosotros</a></div>
                    </div>
                    <div class="burger btn"><i class="fa-solid fa-bars"></i></div>
                </div>
                <div class="preferencias">
                    <div class="idioma"><img src="img/bandera.png" alt=""></div>
                    <div class="usuario btn" id="btnUsuario"><i class="fa-regular fa-user"></i></div>
                    <div class="opciones btn"><i class="fa-solid fa-ellipsis-vertical"></i></div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="sell">
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="img/dental.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Bienvenido a nuestra clinica dental APS</h5>
                            <p>Tenemos una pregunta para ti ,Es la primera vez que nos visitas? .</p>
                            <div class="respuesta">
                                <div class="btn" id="btnUsuario">SI</div>
                                <div class="btn">NO</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="img/dental.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Te ofrecemos una calidad dental segura</h5>
                            <p>Ya te has regitrado ? si aun no lo haz hecho dale al icono <i class="fa-regular fa-user"></i> para que tengas una cuenta donde podras disfrutar de una interfaz solo para ti</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/dental.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tenemos el mejor personal sanatirio en el campo de la dentadura</h5>
                            <p>puedes contactar directamente con el profesional asignado a tu cargo para consultas externas</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="title mt-3 mb-4">
            <h2>Servicios APS</h2>
        </div>

        <div class="servicios container">

            <div class="tres mb-2">
                <div class="cart">
                    <div class="tarjeta text-center">
                        <div class="icono ">
                            <img src="img/limpieza.png" alt="">
                        </div>
                        <h5>Limpieza dental</h5>
                        <p>Lorem fistrum por la gloria de mi madre esse jarl aliqua llévame al sircoo.</p>

                    </div>
                </div>

                <div class=" cart">
                    <div class="tarjeta text-center">
                        <div class="icono ">
                            <img src="img/revision (1).png" alt="">
                        </div>
                        <h5>Examen dental</h5>
                        <p>Lorem fistrum por la gloria de mi madre esse jarl aliqua llévame al sircoo.</p>

                    </div>
                </div>

                <div class="cart">
                    <div class="tarjeta text-center">
                        <div class="icono">
                            <img src="img/emplaste.png" alt="">
                        </div>
                        <h5>Empastes</h5>
                        <p>Lorem fistrum por la gloria de mi madre esse jarl aliqua llévame al sircoo.</p>

                    </div>
                </div>
            </div>

            <div class="dos mt-1">
                <div class="cart">
                    <div class="tarjeta text-center">
                        <div class="icono">
                            <img src="img/Extraccion.png" alt="">
                        </div>
                        <h5>Extraccion Dental</h5>
                        <p>Lorem fistrum por la gloria de mi madre esse jarl aliqua llévame al sircoo.</p>

                    </div>
                    <a href="" class="btn">MIrar Contenido</a>
                </div>

                <div class=" cart">
                    <div class="tarjeta text-center ">
                        <div class="icono">
                            <img src="img/Insercion.png" alt="">
                        </div>
                        <h5>Insercion Dental</h5>
                        <p>Lorem fistrum por la gloria de mi madre esse jarl aliqua llévame al sircoo.</p>

                    </div>
                    <a href="" class="btn">MIrar Contenido</a>
                </div>
            </div>

        </div>
    </main>

    <footer></footer>

    <div class="modals">
        <div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Login...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalCrearLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Crear ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/ajustes.js"></script>
</body>

</html>