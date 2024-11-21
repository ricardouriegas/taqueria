-- Crear la base de datos
CREATE DATABASE Taqueria;

-- Usar la base de datos
USE Taqueria;

-- Tabla Ingredientes
CREATE TABLE Ingredientes (
    num_ingrediente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    b_disponible BOOLEAN NOT NULL
);

-- Tabla Usuarios
CREATE TABLE Usuarios (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(100) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    rol ENUM('admin', 'mesero', 'cajero', 'cocinero') NOT NULL
);

-- Tabla Pedido (crear primero)
CREATE TABLE Pedido (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATE NOT NULL,
    hora TIME NOT NULL
);

-- Tabla Mesas (crear después)
CREATE TABLE Mesas (
    num_mesa INT PRIMARY KEY,
    id_pedido INT NULL,
    FOREIGN KEY (id_pedido) REFERENCES Pedido(id_pedido)
);

-- Tabla historial_pedido
CREATE TABLE historial_pedido (
    id_historial INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATE NOT NULL,
    id_mesa INT NOT NULL,
    id_pedido INT NOT NULL,
    FOREIGN KEY (id_mesa) REFERENCES Mesas(num_mesa),
    FOREIGN KEY (id_pedido) REFERENCES Pedido(id_pedido)
);

-- Tabla Productos
CREATE TABLE Productos (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre_producto VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

-- Tabla Pedido_Detalle
CREATE TABLE Pedido_Detalle (
    id_detalle INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES Pedido(id_pedido),
    FOREIGN KEY (id_producto) REFERENCES Productos(id_producto)
);

-- Tabla Detalle_Ingredientes
CREATE TABLE Detalle_Ingredientes (
    id_detalle_ingrediente INT PRIMARY KEY AUTO_INCREMENT,
    id_detalle INT NOT NULL,
    num_ingrediente INT NOT NULL,
    FOREIGN KEY (id_detalle) REFERENCES Pedido_Detalle(id_detalle),
    FOREIGN KEY (num_ingrediente) REFERENCES Ingredientes(num_ingrediente)
);