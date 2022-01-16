CREATE DATABASE tienda_master;

USE tienda_master;

-- USUARIOS
CREATE TABLE usuarios(
    id INT(255) AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(20),
    imagen VARCHAR(255),

    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)

)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(null, "Admin", "Admin", "admin@mail.com", "123456", "admin", null);

-- CATEGORIAS
CREATE TABLE categorias(
    id INT(255) AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,

    CONsTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO categorias VALUES(null, 'Manga Corta');
INSERT INTO categorias VALUES(null, 'Tirantes');
INSERT INTO categorias VALUES(null, 'Manga Larga');
INSERT INTO categorias VALUES(null, 'Sudadera');

-- PRODUCTOS
CREATE TABLE productos(
    id INT(255) AUTO_INCREMENT NOT NULL,
    categoria_id INT(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion MEDIUMTEXT,
    precio FLOAT(100,2) NOT NULL,
    stock INT(255) NOT NULL,
    oferta VARCHAR(2) NOT NULL, 
    fecha DATE NOT NULL,
    imagen VARCHAR(255),

    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)

)ENGINE=InnoDb;


-- PEDIDOS
CREATE TABLE pedidos(
    id INT(255) AUTO_INCREMENT NOT NULL,
    usuario_id INT(255) NOT NULL,
    provincia VARCHAR(100) NOT NULL,
    localidad VARCHAR(100) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    costo FLOAT(200,2) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    fecha DATE,
    hora TIME,

    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)

)ENGINE=InnoDB;

-- LINEAS PEDIDOS
CREATE TABLE lineas_pedidos(
    id INT(255) AUTO_INCREMENT NOT NULL,
    pedido_id INT(255) NOT NULL,
    producto_id INT(255)  NOT NULL,
    unidades INT(255)NOT NULL,

    CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_lineas_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
    CONSTRAINT fk_lineas_producto FOREIGN KEY(producto_id) REFERENCES productos(id)

)ENGINE=InnoDb;