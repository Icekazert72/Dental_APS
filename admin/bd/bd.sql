DROP DATABASE IF EXISTS aps;

CREATE DATABASE aps;
USE aps;

CREATE TABLE Pacientes (
    id_paciente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    apellidos VARCHAR(100),
    imagen VARCHAR(100),
    fecha_nacimiento DATE,
    direccion VARCHAR(255),
    telefono VARCHAR(15),
    email VARCHAR(100),
    historial_medico TEXT,
    genero VARCHAR(10),
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Medicos (
    id_medico INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    apellidos VARCHAR(100),
    especialidad VARCHAR(100),
    email VARCHAR(100),
    telefono VARCHAR(15),
    numero_licencia VARCHAR(50)
);

CREATE TABLE Citas (
    id_cita INT PRIMARY KEY AUTO_INCREMENT,
    id_paciente INT,
    fecha_hora DATETIME,
    motivo VARCHAR(255),
    estado ENUM(
        'Pendiente',
        'Confirmada',
        'Cancelada',
        'Completada'
    ),
    servicio VARCHAR (100),
    FOREIGN KEY (id_paciente) REFERENCES Pacientes (id_paciente)
);



CREATE TABLE Servicios (
    id_servicio INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    descripcion TEXT,
    precio DECIMAL(10, 2),
    categoria VARCHAR(50)
);

CREATE TABLE Tratamientos (
    id_tratamiento INT PRIMARY KEY AUTO_INCREMENT,
    id_cita INT,
    id_servicio INT,
    notas TEXT,
    fecha_tratamiento DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cita) REFERENCES Citas (id_cita),
    FOREIGN KEY (id_servicio) REFERENCES Servicios (id_servicio)
);

CREATE TABLE Farmacos (
    id_farmaco INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    dosis VARCHAR(50),
    via VARCHAR(50),
    forma_administracion VARCHAR(50),
    efectos_secundarios TEXT,
    estado_fisico ENUM(
        'Gaseoso',
        'Sólido',
        'Líquido',
        'Semisólido'
    ), 
    stock INT DEFAULT 0, 
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Pagos (
    id_pago INT PRIMARY KEY AUTO_INCREMENT,
    id_cita INT,
    fecha_hora DATETIME,
    monto DECIMAL(10, 2),
    metodo_pago VARCHAR(50),
    estado_pago ENUM('Exitoso', 'Fallido'),
    FOREIGN KEY (id_cita) REFERENCES Citas (id_cita)
);

CREATE TABLE Historial_Clinico (
    id_historial INT PRIMARY KEY AUTO_INCREMENT,
    id_paciente INT,
    fecha_hora DATETIME,
    notas TEXT,
    tipo_historial VARCHAR(50),
    FOREIGN KEY (id_paciente) REFERENCES Pacientes (id_paciente)
);

CREATE TABLE Recetas (
    id_receta INT PRIMARY KEY AUTO_INCREMENT,
    id_paciente INT,
    id_medico INT,
    id_farmaco INT,
    dosis VARCHAR(50),
    frecuencia VARCHAR(50),
    duracion VARCHAR(50),
    fecha_prescripcion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_paciente) REFERENCES Pacientes (id_paciente),
    FOREIGN KEY (id_medico) REFERENCES Medicos (id_medico),
    FOREIGN KEY (id_farmaco) REFERENCES Farmacos (id_farmaco)
);

CREATE TABLE CitasCanceladas (
    id_cita_cancelada INT PRIMARY KEY AUTO_INCREMENT,
    id_cita INT,
    motivo_cancelacion VARCHAR(255),
    fecha_cancelacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cita) REFERENCES Citas (id_cita)
);

CREATE TABLE Facturas (
    id_factura INT PRIMARY KEY AUTO_INCREMENT,
    id_paciente INT,
    fecha_emision DATETIME DEFAULT CURRENT_TIMESTAMP,
    monto DECIMAL(10, 2),
    estado_pago ENUM(
        'Pagado',
        'Pendiente',
        'Cancelado'
    ),
    FOREIGN KEY (id_paciente) REFERENCES Pacientes (id_paciente)
);

INSERT INTO
    Historial_Clinico (
        id_historial,
        id_paciente,
        fecha_hora,
        notas,
        tipo_historial
    )
VALUES (
        1,
        1,
        NOW(),
        'Paciente sin antecedentes médicos relevantes.',
        'Inicial'
    );

INSERT INTO
    Pacientes (
        id_paciente,
        nombre,
        apellidos,
        fecha_nacimiento,
        direccion,
        telefono,
        email,
        historial_medico,
        genero
    )
VALUES (
        1,
        'Juan',
        'Pérez',
        '1980-01-01',
        'Calle Falsa 123',
        '555-1234',
        'juan@example.com',
        'Ninguno',
        'Masculino'
    );

DELETE FROM Pacientes WHERE id_paciente = 1;

UPDATE Pacientes SET telefono = '555-5678' WHERE id_paciente = 1;

SELECT * FROM Pacientes;

-- Paso 1: Crear la tabla Citas-- Paso 1: Crear la tabla Citas
CREATE TABLE Citas (
    id_cita INT PRIMARY KEY AUTO_INCREMENT,
    id_paciente INT,
    id_medico INT,
    fecha_hora DATETIME,
    motivo VARCHAR(255),
    estado ENUM(
        'Pendiente',
        'Confirmada',
        'Caducada'
    ) DEFAULT 'Pendiente',
    FOREIGN KEY (id_paciente) REFERENCES Pacientes (id_paciente),
    FOREIGN KEY (id_medico) REFERENCES Medicos (id_medico)
);

-- Paso 2: Insertar una nueva cita
INSERT INTO
    Citas (
        id_paciente,
        id_medico,
        fecha_hora,
        motivo
    )
VALUES (
        1,
        1,
        '2023-10-20 14:00:00',
        'Consulta general'
    );

-- Paso 3: Confirmar la cita
UPDATE Citas SET estado = 'Confirmada' WHERE id_cita = 1;
-- Asegúrate de usar el id_cita correcto

-- Simular el paso del tiempo (esto se haría en un momento posterior)
-- Paso 4: Actualizar el estado de las citas que han caducado
UPDATE Citas
SET
    estado = 'Caducada'
WHERE
    estado = 'Pendiente'
    AND fecha_hora < NOW();

-- Paso 5: Verificar el estado de las citas
SELECT * FROM Citas;