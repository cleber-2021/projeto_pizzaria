create table cliente(
id_cli integer not null auto_increment,
nome varchar (60),
telefone varchar(30),
email varchar(30),
endereco varchar(100),
bairro varchar (100),
primary key (id_cli));

create table autenticacao (
id_aut integer not null auto_increment,
id_cli integer,
nome_usuario varchar (50),
senha varchar(50),
primary key (id_aut),
foreign key (id_cli) references cliente (id_cli));


create table sabor(
id_sabor int not null auto_increment,
nome_sabor varchar(30) not null,
ingredientes_sabor varchar (240) not null,
tipo_sabor varchar (30) not null,
primary key (id_sabor));


create table pedido(
id_pedido integer not null auto_increment,
id_sabor integer,
id_cli integer,
tamanho varchar(50),
valor_total double,
andamento varchar (50) default 'Pedido realizado', 
primary key (id_pedido),
foreign key (id_sabor) references sabor (id_sabor),
foreign key (id_cli) references cliente (id_cli)
);

create table backup_pedido(
id_backup integer not null auto_increment,
tamanho varchar (50),
nome_sabor varchar (50),
tipo_sabor varchar (50),
nome varchar (100),
endereco varchar(100),
bairro varchar (100),
primary key (id_backup) 
);

create table valores(
id_valor integer auto_increment not null,
descricao varchar (50),
valor  double,
primary key (id_valor)
);

create table backup_sabor(
id_backup_sabor integer auto_increment not null,
nome_sabor varchar (50),
ingredientes_sabor varchar (300),
tipo_sabor varchar (50),
primary key (id_backup_sabor) 
);

insert into cliente(nome)value('administrador');
insert into autenticacao(id_cli, nome_usuario, senha) value((select id_cli from cliente where nome = 'administrador'),'adm','voale@123');

insert into sabor (nome_sabor, ingredientes_sabor, tipo_sabor) values ("Prestigio", "chocolate, coco ralado", "Doce");
insert into sabor (nome_sabor, ingredientes_sabor, tipo_sabor) values ("Morango", "chocolate, leite condensado, morango", "Doce");
insert into sabor (nome_sabor, ingredientes_sabor, tipo_sabor) values ("Brigadeiro", "Brigadeiro, cereja", "Doce");
insert into sabor (nome_sabor, ingredientes_sabor, tipo_sabor) values ("Calabresa", "queijo, molho de tomate, calabresa em rodelas, cebola, tomate picado, azeite e orégano. ", "Salgada");
insert into sabor (nome_sabor, ingredientes_sabor, tipo_sabor) values ("Frango com catupiry", "Queijo muçarela, frango, catupiry, sálvia e molho de tomate", "Salgada");

insert into sabor (nome_sabor, ingredientes_sabor, tipo_sabor) values ("Muçarela", "Queijo muçarela em abundância, molho de tomate fresco, azeitona, rodelas de tomate e orégano!", "Salgada");
insert into valores(descricao, valor) values ("Broto", 10.00);
insert into valores(descricao, valor) values ("Pequena", 20.00);
insert into valores(descricao, valor) values ("Média", 45.00);
insert into valores(descricao, valor) values ("Grande", 50.00);
insert into valores(descricao, valor) values ("Familia", 65.00);

