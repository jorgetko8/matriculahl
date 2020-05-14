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


/*------------ CORRECCIONES -----------*/

CREATE DATABASE matriculahl;

USE matriculahl;

CREATE TABLE estudiantes(
documento_identidad int(13) not null,
tipo_documento varchar(30) not null,
nombres varchar(50) not null,
ape_paterno varchar(20),
ape_materno varchar(20),
sexo varchar(10),
fecha_nac date,
religion varchar(30),
pais varchar(20),
departamento varchar(20),
provincia varchar(20),
distrito varchar(20),
discapacidad varchar(2) not null,
tipo_discapacidad varchar(20),
CONSTRAINT pk_estudiantes PRIMARY KEY(documento_identidad)
)Engine=InnoDB;

CREATE TABLE estudiantes_domicilios(
id int(20) auto_increment not null,
estudiante_doc int(13) not null,
direccion varchar(100) not null,
lugar varchar(50),
departamento varchar(50),
provincia varchar(50),
distrito varchar(50),
telefono varchar(9),
CONSTRAINT pk_estudiantes_domicilios PRIMARY KEY(id),
CONSTRAINT fk_estudiantes_domicilios FOREIGN KEY(estudiante_doc) REFERENCES estudiantes(documento_identidad)
)Engine=InnoDB;

CREATE TABLE apoderados(
documento_identidad int(13) not null,
tipo_documento varchar(30) not null,
nombres varchar(50) not null,
ape_paterno varchar(20),
ape_materno varchar(20),
fecha_nac date,
grado_instruccion varchar(30),
ocupacion varchar(30),
vive_con_estudiante varchar(2),
religion varchar(30),
correo varchar(100),
celular varchar(10),
CONSTRAINT pk_apoderados PRIMARY KEY(documento_identidad)
)Engine=InnoDB;

CREATE TABLE lineas_apoderados(
id int(20) auto_increment not null,
apoderado_doc int(13) not null,
estudiante_doc int(13) not null,
CONSTRAINT pk_lineas_apoderados PRIMARY KEY(id),
CONSTRAINT fk_lineas_apoderados FOREIGN KEY(apoderado_doc) REFERENCES apoderados(documento_identidad),
CONSTRAINT fk_lineas_estudiantes FOREIGN KEY(estudiante_doc) REFERENCES estudiantes(documento_identidad)
)Engine=InnoDB;

CREATE TABLE administrativos(
documento_identidad int(13) not null,
tipo_documento varchar(30) not null,
nombres varchar(50) not null,
ape_paterno varchar(20),
ape_materno varchar(20),
correo varchar(100),
celular varchar(10),
CONSTRAINT pk_administrativos PRIMARY KEY(documento_identidad)
)Engine=InnoDB;

CREATE TABLE usuarios(
id int(10) auto_increment not null,
documento_identidad int(13) not null,
usuario varchar(10) not null,
password varchar(10) not null,
privilegio int(1) not null,
estado int(1) not null,
foto varchar(50),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT fk_usuarios_estudiantes FOREIGN KEY(documento_identidad) REFERENCES estudiantes(documento_identidad),
CONSTRAINT fk_usuarios_administrativos FOREIGN KEY(documento_identidad) REFERENCES administrativos(documento_identidad)
)Engine=InnoDB;