



--------------------------------------------------------------------------------
-- LOGIN: 
-- USUARIO: admin
-- PASSWORD: admin123
--------------------------------------------------------------------------------




-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS veterinaria;
USE veterinaria;


-- Creación de la tabla admin
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL
);

-- Insert de un ADMiN
INSERT INTO admin (usuario, clave) VALUES 
('admin', SHA2('admin123', 256));


-- Creación de la tabla Mascotas
CREATE TABLE Mascotas (
    id_mascota INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    raza VARCHAR(50),
    edad INT,
    sexo VARCHAR(10),
    estado_adopcion ENUM('Disponible', 'Adoptado') DEFAULT 'Disponible'
);

-- Creación de la tabla Clientes
CREATE TABLE Clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    email VARCHAR(100)
);

-- Creación de la tabla Citas
CREATE TABLE Citas (
    id_cita INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    id_mascota INT NULL,
    fecha_hora DATETIME NOT NULL,
    motivo TEXT,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente),
    FOREIGN KEY (id_mascota) REFERENCES Mascotas(id_mascota)
);

-- Creación de la tabla Emergencias
CREATE TABLE Emergencias (
    id_emergencia INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    id_mascota INT NULL,
    fecha_hora DATETIME NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente),
    FOREIGN KEY (id_mascota) REFERENCES Mascotas(id_mascota)
);

-- Creación de la tabla Historial_Medico
CREATE TABLE Historial_Medico (
    id_historial INT AUTO_INCREMENT PRIMARY KEY,
    id_mascota INT,
    fecha DATE NOT NULL,
    diagnostico TEXT,
    tratamiento TEXT,
    notas TEXT,
    FOREIGN KEY (id_mascota) REFERENCES Mascotas(id_mascota)
);

-- Creación de la tabla Servicios
CREATE TABLE Servicios (
    id_servicio INT AUTO_INCREMENT PRIMARY KEY,
    nombre_servicio VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2)
);

-- Creación de la tabla Adopciones
CREATE TABLE Adopciones (
    id_adopcion INT AUTO_INCREMENT PRIMARY KEY,
    id_mascota INT,
    id_cliente INT,
    fecha_adopcion DATE NOT NULL,
    estado ENUM('Pendiente', 'Completada') DEFAULT 'Pendiente',
    FOREIGN KEY (id_mascota) REFERENCES Mascotas(id_mascota),
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente)
);

-- Creación de la tabla Contactos
CREATE TABLE Contactos (
    id_contacto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telefono VARCHAR(20),
    mensaje TEXT,
    fecha_envio DATETIME NOT NULL
);