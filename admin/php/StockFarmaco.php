<?php 

        require_once("../bbdd/bbdd.php");

        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $farmaco = $_POST['farmaco'];
        $empleado = $_POST['empleado'];

        if (empty($cantidad)) {
                header("location:../php/Stock.php");
        } else {
            $Insertar = "INSERT INTO stock (cantidad, descripcion, farmaco, empleado) VALUES (
                    '$cantidad', '$descripcion', '$farmaco', '$empleado'
             )";
             $queryInsert = mysqli_query($conexion, $Insertar);
             header("location:../php/Stock.php");
        }