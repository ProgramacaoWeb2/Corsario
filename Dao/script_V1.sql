CREATE DATABASE db;
USE db;

CREATE TABLE usuario(
	idUsuario INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    login VARCHAR(50) NOT NULL,
    senha VARCHAR(150) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    
    
    INDEX(idUsuario),
    PRIMARY KEY(idUsuario)
    
);


CREATE TABLE fornecedor(
	idFornecedor INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    fkEndereco INTEGER UNSIGNED,
    
    
    nome VARCHAR(200) NOT NULL,
    descricao VARCHAR(200) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    
    
    INDEX(idFornecedor),
	FOREIGN KEY (fkEndereco) REFERENCES endereco(idEndereco),
    PRIMARY KEY (idFornecedor)
);


CREATE TABLE endereco(
	idEndereco INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    
    rua VARCHAR(200) NOT NULL,
    numero VARCHAR(100) NOT NULL,
    complemento VARCHAR(100) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cep VARCHAR(15) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado VARCHAR(10) NOT NULL,
     
    INDEX(idEndereco),
    PRIMARY KEY (idEndereco)
);


CREATE TABLE cliente(
	idCliente INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    fkEndereco INTEGER UNSIGNED,
    
    nome VARCHAR(200) NOT NULL,
    telefone VARCHAR(9) NOT NULL,
    email VARCHAR(50) NOT NULL,
    cartaoCredito VARCHAR(30) NOT NULL,
     
    
    FOREIGN KEY (fkEndereco) REFERENCES endereco(idEndereco),
    INDEX(idCliente),
    PRIMARY KEY (idCliente)
);

CREATE TABLE produto(
	idProduto INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    fkFornecedor INTEGER UNSIGNED,
    
    nome VARCHAR(200) NOT NULL,
    descricao VARCHAR(70) NOT NULL,
    foto VARCHAR(70) NOT NULL,
     
    FOREIGN KEY (fkFornecedor) REFERENCES fornecedor(idFornecedor), 
    INDEX(idProduto),
    PRIMARY KEY (idProduto)
   
);

CREATE TABLE estoque(
	idEstoque INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    fkProduto INTEGER UNSIGNED,
    
   	quantidade INTEGER NOT NULL,
    preco DOUBLE NOT NULL,
   
    FOREIGN KEY(fkProduto) REFERENCES produto(idProduto),
    INDEX(idEstoque),
    PRIMARY KEY (idEstoque)
);


CREATE TABLE pedido(
	IdPedido INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    fkCliente INTEGER UNSIGNED,
    
    numero INTEGER NOT NULL,
   	dataPedido DATE NOT NULL,
    dataEntrega DATE NOT NULL,
    situacao VARCHAR(10) NOT NULL,
   
    
    FOREIGN KEY (fkCliente) REFERENCES cliente(idCliente),
    INDEX(IdPedido),
    PRIMARY KEY (IdPedido)

);

CREATE TABLE itemPedido(
	idItemPedido INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    quantidade INTEGER NOT NULL,
   	preco DOUBLE NOT NULL,
   
    INDEX(idItemPedido),
    PRIMARY KEY (idItemPedido)
);



