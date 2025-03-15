<?php

        require_once("../bbdd/bbdd.php");

        $nombre = $_POST['nombre'];
        $via = $_POST['via'];
        $formato = $_POST['formato'];
        $uso = $_POST['uso'];
        $efecto = $_POST['efecto'];
        $precio_unitario = $_POST['precio_unitario'];
        $imagen = $_FILES['imagen']['name'];
        $alojamiento_imagen = "../img/";
        $archivosTempoarales = $_FILES['imagen']['tmp_name'];

        $array_imagen =explode('.', $imagen);
        $ext_img = strtolower(end($array_imagen));
        $ext_img_array = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($ext_img, $ext_img_array)) {
                if (move_uploaded_file($archivosTempoarales, $alojamiento_imagen . $imagen)) {
                    if (empty($nombre)) {
                        header("location:../php/Stock.php");
                    } else {
                        $Insertar = "INSERT INTO farmaco (nombre, imagen, formato, via, Uso, efecto, precio_unitario) VALUES (
                            '$nombre', '$imagen', '$formato', '$via', '$uso', '$efecto', '$precio_unitario'
                        ) ";
                        $queryInsert = mysqli_query($conexion, $Insertar);
                        header("location:../php/Stock.php");

                    }
                }
            }

