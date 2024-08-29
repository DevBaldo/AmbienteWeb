


--------------------------------------------------------------------------------
-- LOGIN: 
-- USUARIO: admin@email.com
-- PASSWORD: 123456
--------------------------------------------------------------------------------



-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS vete;
USE vete;

CREATE TABLE `usuario` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL
);


CREATE TABLE IF NOT EXISTS `servicios` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(100) NOT NULL,
  `precio` DECIMAL(10, 2) NOT NULL
);


CREATE TABLE IF NOT EXISTS `mascotas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(50) NOT NULL,
  `tipo` VARCHAR(30) NOT NULL,
  `edad` INT,
  `usuario_id` INT NOT NULL,
  FOREIGN KEY (`usuario_id`) REFERENCES `usuario`(`id`)
);


CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(100) NOT NULL,
    mascota_id INT NOT NULL,
    servicio_id INT NOT NULL,
    fecha_reserva DATETIME NOT NULL,
    FOREIGN KEY (mascota_id) REFERENCES mascotas(id),
    FOREIGN KEY (servicio_id) REFERENCES servicios(id)
);


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


CREATE TABLE IF NOT EXISTS adopciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_animal VARCHAR(50) NOT NULL,
    tipo_animal VARCHAR(30) NOT NULL,
    raza VARCHAR(50) NOT NULL,
    estado VARCHAR(20) NOT NULL DEFAULT 'pendiente'
);


--------------------------------------------------------------------------------
-- INSERTS
--------------------------------------------------------------------------------

-- admin@email.com 123456
INSERT INTO `usuario` (`email`, `password`, `name`) VALUES
('admin@email.com', '$2y$10$d6POOPxvzXHrTHBT./UyAe.bZFH90l1ZWDpfZZ7i7mCZEY5DejzNq', 'Admin');


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


INSERT INTO `mascotas` (`nombre`, `tipo`, `edad`, `usuario_id`) VALUES
('Firulais', 'Perro', 4, 1),
('Mishka', 'Gato', 2, 1),
('Lola', 'Conejo', 1, 1);


INSERT INTO animales_disponibles (nombre, tipo_animal, raza, anos, descripcion) VALUES 
('Bobby', 'Perro', 'Labrador Retriever', 3, 'Bobby es un perro enérgico y amigable que ama jugar al aire libre. Es ideal para familias con niños.'),
('Mimi', 'Gato', 'Siames', 2, 'Mimi es una gata tranquila y cariñosa que disfruta de la compañía de los humanos. Es perfecta para apartamentos.'),
('Rocky', 'Perro', 'Bulldog Francés', 4, 'Rocky es un bulldog francés leal y afectuoso. Tiene una personalidad juguetona pero también disfruta de las siestas largas.');

--------------------------------------------------------------------------------------------------------