create database obras;

use obras;


CREATE TABLE usuarios (
  id INT(10) NOT NULL AUTO_INCREMENT,
  rut VARCHAR(255) NOT NULL,
  clave VARCHAR(255) DEFAULT NULL,
  nombre VARCHAR(255) NOT NULL,
  apellidos VARCHAR(255) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  contacto VARCHAR(255) DEFAULT NULL,
  email VARCHAR(255) NOT NULL,
  tipo VARCHAR(255) DEFAULT NULL,
  estado INT(10) DEFAULT 0,
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP() NOT NULL,  
  PRIMARY KEY (id)
);

INSERT INTO usuarios (rut, clave, nombre, apellidos, fecha_nacimiento, contacto, email, tipo, estado, fecha_creacion)
VALUES ('17525457-9', 'c0e21b77a35c69aaf01cb8bb7a3f3194', 'Victor', 'Martinez Zamora', '1991-11-29', '975143052', 'koke1592@gmail.com', 'U', 1, '1991-11-21 00:00:00');


update usuarios set clave='c0e21b77a35c69aaf01cb8bb7a3f3194' where rut='17525457-9';



create table materiales(
  id INT(10) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(500) NOT NULL,
  tipo VARCHAR(500) NOT NULL,
  estado INT(10) DEFAULT 0

);

create table proyectos(
  id INT(10) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  region VARCHAR(50) NOT NULL,
  direccion VARCHAR(100) NOT NULL,
  inicio DATE NOT NULL,
  termino DATE NOT NULL,
  rut_cliente VARCHAR(12) NOT NULL,
  nombre_cliente VARCHAR(50) NOT NULL,
  presupuesto INT(10) NOT NULL,
  tipo VARCHAR(50) NOT NULL,
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP() NOT NULL,
  usuario_crea VARCHAR(255) NOT NULL,
  estado INT(10) DEFAULT 0,
  primary key (id)
);