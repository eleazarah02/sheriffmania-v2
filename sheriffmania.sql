SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE database bdsheriffmania;

USE bdsheriffmania;
CREATE TABLE `users` (
`uid` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
`username` varchar(25) NOT NULL UNIQUE,
`password` varchar(200) NOT NULL,
`email` varchar(100) NOT NULL,
`name` varchar(100) NOT NULL
);

INSERT INTO `users`(`uid`,`username`,`password`, `email`, `name`) 
VALUES ('1','Super','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','eleazarah@sheriffmania.org.mx','Eleazar Albino Hernández');

CREATE TABLE productos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	codigo VARCHAR(255) NOT NULL,
	descripcion VARCHAR(255) NOT NULL,
	precioVenta DECIMAL(5, 2) NOT NULL,
	precioCompra DECIMAL(5, 2) NOT NULL,
	existencia DECIMAL(5, 2) NOT NULL,
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE ventas(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	fecha DATETIME NOT NULL,
	total DECIMAL(7,2),
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE productos_vendidos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_producto BIGINT UNSIGNED NOT NULL,
	cantidad BIGINT UNSIGNED NOT NULL,
	id_venta BIGINT UNSIGNED NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(id_producto) REFERENCES productos(id) ON DELETE CASCADE,
	FOREIGN KEY(id_venta) REFERENCES ventas(id) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

INSERT INTO productos(id, codigo, descripcion, precioVenta, precioCompra, existencia) 
VALUES
(1, '1', 'Galletas chokis', 15, 10, 100),
(2, '2', 'Mermelada de fresa', 80, 65, 100),
(3, '3', 'Aceite', 20, 18, 100),
(4, '4', 'Palomitas de maíz', 15, 12, 100),
(5, '5', 'Doritos', 8, 5, 100);

create table proveedor(
id BIGINT NOT NULL primary key AUTO_INCREMENT, 
nombre VARCHAR (100) NOT NULL, 
direccion VARCHAR (200) NOT NULL,
telefono VARCHAR (10) NOT NULL
);

insert into proveedor (id,nombre,direccion,telefono) values
(1,'Corona SA de CV','Puebla, Mexico','2351001010'),
(2,'Sheriffmania SA de CV','Puebla, Mexico','2491309473'),
(3,'Patrona SA de CV','Puebla, Mexico','2351001010');