create database alquilaUnSobrino;


create table usuarios
(
	login char(20) not null primary key,
	password char (50) not null,
	nombre char(30) not null,
	apellido char (20) not null,
	email char(20) not null,
	telefono char(20) not null,
	direccion char(30) not null,
	ciudad char(30) not null,
	fecha_nacimiento date not null,
	privilegio char (1)
);

create table pedidos
(
	id_pedido int unsigned not null auto_increment primary key,
	login char(20) not null,
	coste_total float(7,2),
	fecha datetime not null
);

create table ingenieros
(
	id_ingeniero int unsigned not null auto_increment primary key,
	nombre char(20) not null,
	descripcion char(254) not null,
	foto char(20) not null,
	precio float(7,2),
	disponibilidad tinyint unsigned not null
);

create table pedido_ingenieros
(
	id_pedido int unsigned not null,
	id_ingeniero int unsigned not null,
	primary key (id_pedido, id_ingeniero)

);