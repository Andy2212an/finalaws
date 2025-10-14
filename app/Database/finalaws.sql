CREATE DATABASE IF NOT EXISTS finalaws;
USE finalaws;

CREATE TABLE Mascotas (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(50),
    Especie VARCHAR(30),
    Raza VARCHAR(50),
    Edad INT,
    Sexo CHAR(1),
    Color VARCHAR(30),
    Peso DECIMAL(5,2),
    NombreDueno VARCHAR(100),
    TelefonoDueno VARCHAR(20),
    DireccionDueno VARCHAR(200),
    FechaVacunacion DATE
);
INSERT INTO Mascotas 
(Nombre, Especie, Raza, Edad, Sexo, Color, Peso, NombreDueno, TelefonoDueno, DireccionDueno, FechaVacunacion) 
VALUES
('Firulais', 'Perro', 'Labrador', 3, 'M', 'Dorado', 25.50, 'Juan Pérez', '555-1234', 'Calle Falsa 123', '2024-05-10'),
('Michi', 'Gato', 'Siames', 2, 'F', 'Blanco y negro', 4.20, 'Ana Gómez', '555-5678', 'Av. Siempre Viva 742', '2024-06-15'),
('Loro', 'Ave', 'Guacamayo', 5, 'M', 'Multicolor', 1.10, 'Carlos López', '555-8765', 'Calle Luna 456', '2023-12-20'),
('Nemo', 'Pez', 'Betta', 1, 'M', 'Rojo', 0.05, 'Laura Sánchez', '555-4321', 'Av. del Mar 89', '2024-01-05');

SELECT * FROM Mascotas;