/*criando uma base de dados*/

create database exerciciocrud;

/*conectando uma base existente*/

use exerciciocrud;

create table cliente(

    cod int primary key auto_increment,
    nome varchar(60) not null,
    email varchar(60) not null,
    cpf char(11)not null,
    estadocivil varchar(13)not null
);

create table usuario(

        cod int primary key auto_increment,
        nome varchar(60) not null,
        email varchar(60) not null,
        dtnasc date not null,
        cpf char(14) not null, 
        login varchar(30)not null unique,
        senha char(32)not null,
        perfil enum('adm', 'user') not null,
        foto varchar(30) not null,
        status char(1) not null

);

create table endereco(
    
    codend int primary key auto_increment,
    logradouro varchar(50) not null,
    numero varchar(10) not null,
    complemento varchar(30) not null,
    cep char(9) not null,
    bairro varchar(50) not null,
    cidade varchar(50) not null,
    uf char(2) not null,
    codusuario int unique,
    foreign key (codusuario) references usuario (cod)
     
);

insert into usuario values(null, 'Guilherme','guilherme@gmail.com','1994-02-21','145.277.857-45','guidantas', md5('123'),'adm','perfil.png','a');
insert into usuario values(null, 'Ed','ed@gmail.com','1992-02-21','145.277.857-45','ed ', md5('123'),'user','perfil.png','a');

/*varchar texto ate 255 caracteres*/

/*DATE -> yyyy-mm-dd