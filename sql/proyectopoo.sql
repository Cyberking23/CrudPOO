-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS proyectopoo;

-- Usar la base de datos
USE proyectopoo;

-- Crear una tabla sencilla llamada 'datos'
CREATE TABLE datos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  mensaje TEXT,
  creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO datos (nombre, correo, mensaje) VALUES
('Carlos Merino', 'carlos@example.com', 'Hola, este es un mensaje de prueba.'),
('Ana Torres', 'ana.torres@email.com', 'Estoy interesada en el proyecto.'),
('Luis Mejía', 'luismejia@mail.com', '¿Puedo obtener más información?'),
('María López', 'maria.lopez@correo.com', 'Gracias por la oportunidad.');

