flush privileges;

CREATE DATABASE IF NOT EXISTS ce;
ALTER DATABASE ce CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ce;

CREATE TABLE usuario(
id int auto_increment not null,
email varchar(30) not null,
senha varchar(30) not null,
nomEmp varchar(30) not null,
Pnome varchar(30) not null,
Snome varchar(30) not null,
tipoEmp varchar(30) not null,
descEmp varchar(30) not null,
PRIMARY KEY(id)
);


CREATE TABLE categorias( 
id int AUTO_INCREMENT NOT NULL, 
nome varchar(30) NOT NULL, 
idUser int NOT NULL, 
PRIMARY KEY (id), 
FOREIGN KEY (idUser) REFERENCES usuario(id) 
);

CREATE TABLE produtos(
id int auto_increment not null,
nome varchar(30) not null,
estoqueMin int not null,
estoque int not null,
descProd varchar(50) not null,
categoria int,
locprod varchar(60) not null,
codprod varchar(50) not null,
PRIMARY KEY(id),
FOREIGN KEY (categoria) REFERENCES categorias(id) 
);
