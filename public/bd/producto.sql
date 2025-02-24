
CREATE DATABASE zapatillas;
use zapatillas;

CREATE TABLE producto (

    id_z INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR (50),
    precio VARCHAR (50),
    imagen VARCHAR (50)

);

SELECT * FROM producto;