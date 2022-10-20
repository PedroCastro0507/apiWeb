create database produtos;
use produtos;

CREATE TABLE produtos(
	id_produto integer auto_increment not null,
    nome varchar(40) not null,
    preco varchar(8) not null,
    quantidade integer not null,
    primary key(id_produto)
);

select * from produtos; 
