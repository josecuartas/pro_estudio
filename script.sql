DROP DATABASE IF EXISTS crud_catalogo;

CREATE DATABASE crud_catalogo CHARACTER
SET
    utf8mb4 DEFAULT COLLATE utf8mb4_general_ci;

USE crud_catalogo;

CREATE TABLE t_usuarios (
    id_user INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(200) NOT NULL,
    password VARCHAR(200) NOT NULL,
    fecha_alta DATE,
    ESTADO TINYINT (1) NOT NULL DEFAULT 1
) ENGINE = innoDB;

CREATE TABLE usuarios (
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(200) NOT NULL,
    APELLIDO VARCHAR(200) NOT NULL,
    EMAIL VARCHAR(200) NOT NULL
) ENGINE = innoDB;

CREATE TABLE proveedores (
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PROVEEDOR VARCHAR(200) NOT NULL,
    FKCONTACTO INT UNSIGNED,
    CONSTRAINT PROVEEDOR_CONTACTO FOREIGN KEY (FKCONTACTO) REFERENCES usuarios (ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = innoDB;

CREATE TABLE productos (
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(200) NOT NULL,
    DESCRIPCION TEXT,
    PRECIO FLOAT(6, 2),
    IMAGEN VARCHAR(200),
    FECHA_ALTA DATE,
    ESTADO TINYINT (1) NOT NULL DEFAULT 1,
    FKPROVEEDOR INT UNSIGNED NOT NULL,
    CONSTRAINT PRODUCTO_PROVEEDOR FOREIGN KEY (FKPROVEEDOR) REFERENCES proveedores (ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = innoDB;

CREATE TABLE categorias (
    ID TINYINT (3) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CATEGORIA VARCHAR(200) NOT NULL UNIQUE
) ENGINE = innoDB;

CREATE TABLE categorizacion (
    FKPRODUCTO INT UNSIGNED NOT NULL,
    FKCATEGORIA TINYINT (3) UNSIGNED NOT NULL,
    PRIMARY KEY (FKPRODUCTO, FKCATEGORIA),
    CONSTRAINT CATEGORIZACION_PRODUCTO FOREIGN KEY (FKPRODUCTO) REFERENCES productos (ID) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT CATEGORIZACION_CATEGORIA FOREIGN KEY (FKCATEGORIA) REFERENCES categorias (ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = innoDB;

INSERT INTO
    usuarios (NOMBRE, APELLIDO, EMAIL)
VALUES
    ('PEDRO', 'RAMIREZ', 'pr@gmail.com'),
    ('JACINTO', 'LOPEZ', 'jl@gmail.com');

INSERT INTO
    proveedores (PROVEEDOR, FKCONTACTO)
VALUES
    ('PROVEEDOR1', 1),
    ('PROVEEDOR2', 2);

INSERT INTO
    categorias (CATEGORIA)
VALUES
    ('Pizzas'),
    ('Lasagnas'),
    ('Pastas');

INSERT INTO
    productos (
        NOMBRE,
        DESCRIPCION,
        PRECIO,
        FECHA_ALTA,
        ESTADO,
        FKPROVEEDOR
    )
VALUES
    (
        'Pizza de muzzarella',
        'Pizza de queso mozarella de búfala',
        3500,
        '2024-12-01',
        1,
        1
    ),
    (
        'Pizza de ananá',
        'Pizza de queso mozarella de búfala y piña',
        5700,
        '2024-12-01',
        1,
        1
    ),
    (
        'Lasagna',
        'Lasagna de care bolognesa',
        8700,
        '2024-12-01',
        1,
        2
    ),
    (
        'Ravioli',
        'Raviolis rellenos de queso y espinaca',
        3800,
        '2024-12-01',
        1,
        2
    );

INSERT INTO
    categorizacion
VALUES
    (1, 1),
    (2, 1),
    (3, 2),
    (4, 3);
