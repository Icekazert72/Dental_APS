<?php

    define("SERVIDOR","localhost");
    define("USUARIO","root");
    define("CONTRASEÑA","");
    define("BD","clinicaAPS");

    $conexion = mysqli_connect(SERVIDOR, USUARIO, CONTRASEÑA, BD);

   