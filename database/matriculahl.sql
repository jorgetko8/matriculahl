/*

CREATE TABLE administrativos(
dni int(8) not null,
nombres varchar(100) not null,
ape_paterno varchar(100),
ape_materno varchar(100),
celular varchar(10),
correo varchar(100),
direccion varchar(150),
distrito varchar(100),
fecha_nac date
CONSTRAINT pk_administrativos PRIMARY KEY(dni)
)Engine=InnoDB;

CREATE TABLE apoderados(
dni int(8) not null,
nombres varchar(100) not null,
ape_paterno varchar(100),
ape_materno varchar(100),
celular varchar(10),
correo varchar(100),
direccion varchar(150),
distrito varchar(100),
fecha_nac date,
CONSTRAINT pk_apoderados PRIMARY KEY(dni),
)Engine=InnoDB;

CREATE TABLE alumnos(
dni int(8) not null,
nombres varchar(100) not null,
ape_paterno varchar(100),
ape_materno varchar(100),
direccion varchar(150),
distrito varchar(100),
fecha_nac date,
CONSTRAINT pk_alumnos PRIMARY KEY(dni),
)Engine=InnoDB;

*/
CREATE DATABASE matriculahl;

USE matriculahl;

CREATE TABLE personas(
dni int(8) not null,
nombres varchar(100) not null,
ape_paterno varchar(100),
ape_materno varchar(100),
direccion varchar(150),
distrito varchar(100),
fecha_nac date,
tipo varchar(20),
CONSTRAINT pk_personas PRIMARY KEY(dni)
)Engine=InnoDB;

CREATE TABLE administrativos(
id int(10) auto_increment not null,
correo varchar(100),
celular varchar(10),
persona_dni int(8) not null,
CONSTRAINT pk_administrativos PRIMARY KEY(id),
CONSTRAINT fk_administrativos_personas FOREIGN KEY(persona_dni) REFERENCES personas(dni)
)Engine=InnoDB;

CREATE TABLE apoderados(
id int(10) auto_increment not null,
celular varchar(10),
correo varchar(100),
persona_dni int(8) not null,
CONSTRAINT pk_apoderados PRIMARY KEY(id),
CONSTRAINT fk_apoderados_personas FOREIGN KEY(persona_dni) REFERENCES personas(dni)
)Engine=InnoDB;

CREATE TABLE alumnos(
id int(10) auto_increment not null,
persona_dni int(8) not null,
CONSTRAINT pk_alumnos PRIMARY KEY(id),
CONSTRAINT fk_alumnos_personas FOREIGN KEY(persona_dni) REFERENCES personas(dni)
)Engine=InnoDB;

CREATE TABLE lineas_apoderado(
id int(10) auto_increment not null,
apoderado_dni int(8) not null,
alumno_dni int(8) not null,
CONSTRAINT pk_lineas_apoderados PRIMARY KEY(id),
CONSTRAINT fk_lineas_apoderados FOREIGN KEY(apoderado_dni) REFERENCES apoderados(persona_dni),
CONSTRAINT fk_lineas_alumnos FOREIGN KEY(alumno_dni) REFERENCES alumnos(persona_dni)
)Engine=InnoDB;

CREATE TABLE usuarios(
id int(10) auto_increment not null,
persona_dni int(8) not null,
usuario varchar(10) not null,
password varchar(10) not null,
privilegio int(1) not null,
estado int(1) not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT fk_usuarios_personas FOREIGN KEY(persona_dni) REFERENCES personas(dni)
)Engine=InnoDB;

