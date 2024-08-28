


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



--------------------------------------------------------------------------------
-- INSERTS
--------------------------------------------------------------------------------
INSERT INTO Mascotas (nombre, especie, raza, edad, sexo, estado_adopcion) VALUES
('Rex', 'Perro', 'Labrador', 3, 'Macho', 'Disponible'),
('Luna', 'Gato', 'Siamés', 2, 'Hembra', 'Disponible'),
('Coco', 'Conejo', 'Angora', 1, 'Macho', 'Disponible'),
('Rita', 'Perro', 'Poodle', 4, 'Hembra', 'Disponible'),
('Max', 'Gato', 'Persa', 5, 'Macho', 'Adoptado');

INSERT INTO Clientes (nombre, direccion, telefono, email) VALUES
('Ana Pérez', 'Av. Principal 123, Ciudad', '555-1234', 'ana.perez@example.com'),
('Luis Gómez', 'Calle Secundaria 456, Ciudad', '555-5678', 'luis.gomez@example.com'),
('María Fernández', 'Paseo del Parque 789, Ciudad', '555-9101', 'maria.fernandez@example.com'),
('Carlos Rodríguez', 'Plaza Mayor 101, Ciudad', '555-1122', 'carlos.rodriguez@example.com'),
('Laura Martínez', 'Calle del Sol 202, Ciudad', '555-3344', 'laura.martinez@example.com');

INSERT INTO Citas (id_cliente, id_mascota, fecha_hora, motivo) VALUES
(1, 1, '2024-09-01 10:00:00', 'Consulta general'),
(2, 2, '2024-09-02 11:00:00', 'Vacunación'),
(3, 3, '2024-09-03 09:30:00', 'Desparasitación'),
(4, 4, '2024-09-04 14:00:00', 'Chequeo pre-quirúrgico'),
(5, 1, '2024-09-05 16:00:00', 'Radiografía');

INSERT INTO Emergencias (id_cliente, id_mascota, fecha_hora, descripcion) VALUES
(1, 1, '2024-08-30 20:00:00', 'Accidente de tráfico'),
(2, 2, '2024-08-31 22:30:00', 'Problema respiratorio'),
(3, 3, '2024-09-01 18:15:00', 'Ingestión de objeto extraño'),
(4, 4, '2024-09-02 07:45:00', 'Herida abierta'),
(5, 5, '2024-09-03 21:00:00', 'Síntomas de envenenamiento');

INSERT INTO Historial_Medico (id_mascota, fecha, diagnostico, tratamiento, notas) VALUES
(1, '2024-08-15', 'Otitis', 'Antibióticos', 'Recuperación completa esperada.'),
(2, '2024-08-16', 'Gripe felina', 'Antivirales', 'Observación continua.'),
(3, '2024-08-17', 'Dermatitis', 'Pomada tópica', 'Controlar el rascado.'),
(4, '2024-08-18', 'Fractura de pata', 'Inmovilización', 'Requiere reposo.'),
(5, '2024-08-19', 'Esguince', 'Descanso y analgésicos', 'Seguimiento necesario.');

INSERT INTO Servicios (nombre_servicio, descripcion, precio) VALUES
('Consultas generales y de especialidad', 'Evaluaciones completas para diferentes necesidades y especialidades.', 50.00),
('Vacunación', 'Vacunas para proteger a tu mascota de enfermedades comunes.', 30.00),
('Desparasitación', 'Tratamiento para eliminar parásitos internos y externos.', 25.00),
('Cirugías', 'Procedimientos quirúrgicos necesarios para el bienestar de tu mascota.', 150.00),
('Radiografías y ecografías', 'Estudios de imágenes para diagnósticos precisos.', 100.00),
('Hospitalización', 'Atención y cuidado de tu mascota en caso de enfermedad o cirugía.', 200.00),
('Laboratorio clínico', 'Análisis y pruebas de laboratorio para diagnósticos exactos.', 80.00),
('Grooming', 'Servicios de estética y cuidado para mantener a tu mascota limpia y saludable.', 40.00),
('Venta de alimentos y accesorios', 'Productos esenciales para el cuidado y bienestar de tu mascota.', 20.00);

INSERT INTO Adopciones (id_mascota, id_cliente, fecha_adopcion, estado) VALUES
(1, 1, '2024-08-20', 'Completada'),
(2, 2, '2024-08-21', 'Completada'),
(3, 3, '2024-08-22', 'Pendiente'),
(4, 4, '2024-08-23', 'Pendiente'),
(5, 5, '2024-08-24', 'Completada');

INSERT INTO Contactos (nombre, email, telefono, mensaje, fecha_envio) VALUES
('Sofía López', 'sofia.lopez@example.com', '555-6789', 'Me gustaría agendar una cita para mi perro.', '2024-08-25 09:00:00'),
('Javier Ortega', 'javier.ortega@example.com', '555-9876', '¿Tienen servicios de grooming disponibles?', '2024-08-26 10:15:00'),
('Claudia Moreno', 'claudia.moreno@example.com', '555-5432', 'Quisiera saber más sobre las adopciones.', '2024-08-27 11:30:00');



--------------------------------------------------------------------------------------------------------


--NUEVA BASE DE DATOS--

CREATE TABLE `usuario` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL
);

-- admin@email.com 123456
INSERT INTO `usuario` (`email`, `password`, `name`) VALUES
('admin@email.com', '$2y$10$d6POOPxvzXHrTHBT./UyAe.bZFH90l1ZWDpfZZ7i7mCZEY5DejzNq', 'Admin');

CREATE TABLE IF NOT EXISTS `servicios` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(100) NOT NULL,
  `precio` DECIMAL(10, 2) NOT NULL);

INSERT INTO `servicios` (`nombre`, `precio`) VALUES
('Consultas generales y de especialidad', 50.00),
('Vacunación', 25.00),
('Desparasitación', 30.00),
('Cirugías', 300.00),
('Radiografías y ecografías', 100.00),
('Hospitalización', 150.00),
('Laboratorio clínico', 75.00),
('Grooming', 40.00),
('Venta de alimentos y accesorios', 35.00);

CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(100) NOT NULL,
    mascota_id INT NOT NULL,
    servicio_id INT NOT NULL,
    fecha_reserva DATETIME NOT NULL,
    FOREIGN KEY (mascota_id) REFERENCES mascotas(id),
    FOREIGN KEY (servicio_id) REFERENCES servicios(id)
);

CREATE TABLE IF NOT EXISTS `mascotas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(50) NOT NULL,
  `tipo` VARCHAR(30) NOT NULL,
  `edad` INT,
  `usuario_id` INT NOT NULL,
  FOREIGN KEY (`usuario_id`) REFERENCES `usuario`(`id`)
);

-- Insertar datos en la tabla 'mascotas
INSERT INTO `mascotas` (`nombre`, `tipo`, `edad`, `usuario_id`) VALUES
('Firulais', 'Perro', 4, 1),
('Mishka', 'Gato', 2, 1),
('Lola', 'Conejo', 1, 1);

CREATE TABLE IF NOT EXISTS historial_clinico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reserva_id INT NOT NULL,
    mascota_id INT NOT NULL,
    fecha_reserva DATETIME NOT NULL,
    servicio_id INT NOT NULL,
    FOREIGN KEY (reserva_id) REFERENCES reservas(id),
    FOREIGN KEY (mascota_id) REFERENCES mascotas(id),
    FOREIGN KEY (servicio_id) REFERENCES servicios(id)
);

CREATE TABLE IF NOT EXISTS animales_disponibles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    tipo_animal VARCHAR(30) NOT NULL,
    raza VARCHAR(50) NOT NULL,
    anos INT NOT NULL,
    descripcion TEXT
);

INSERT INTO animales_disponibles (nombre, tipo_animal, raza, anos, descripcion) VALUES 
('Bobby', 'Perro', 'Labrador Retriever', 3, 'Bobby es un perro enérgico y amigable que ama jugar al aire libre. Es ideal para familias con niños.'),
('Mimi', 'Gato', 'Siames', 2, 'Mimi es una gata tranquila y cariñosa que disfruta de la compañía de los humanos. Es perfecta para apartamentos.'),
('Rocky', 'Perro', 'Bulldog Francés', 4, 'Rocky es un bulldog francés leal y afectuoso. Tiene una personalidad juguetona pero también disfruta de las siestas largas.');

CREATE TABLE IF NOT EXISTS adopciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_animal VARCHAR(50) NOT NULL,
    tipo_animal VARCHAR(30) NOT NULL,
    raza VARCHAR(50) NOT NULL,
    estado VARCHAR(20) NOT NULL DEFAULT 'pendiente'
);
