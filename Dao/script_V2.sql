CREATE DATABASE CorsarioDb;
USE CorsarioDb;

CREATE TABLE Usuario(
	idUsuario INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    login VARCHAR(50) NOT NULL,
    senha VARCHAR(150) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    
    
    INDEX(idUsuario),
    PRIMARY KEY(idUsuario)
    
);


CREATE TABLE Fornecedor(
	idFornecedor INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    
    
    nome VARCHAR(200) NOT NULL,
    descricao VARCHAR(200) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    
    
    INDEX(idFornecedor),
    PRIMARY KEY (idFornecedor)
);

CREATE TABLE Cliente(
	idCliente INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
   
    nome VARCHAR(200) NOT NULL,
    telefone VARCHAR(9) NOT NULL,
    email VARCHAR(50) NOT NULL,
    cartaoCredito VARCHAR(30) NOT NULL,
     
    
    INDEX(idCliente),
    PRIMARY KEY (idCliente)
);


CREATE TABLE Endereco(
	idEndereco INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    idFornecedor INTEGER UNSIGNED,
    idCliente INTEGER UNSIGNED,

    rua VARCHAR(200) NOT NULL,
    numero VARCHAR(100) NOT NULL,
    complemento VARCHAR(100) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cep VARCHAR(15) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado VARCHAR(10) NOT NULL,
     
    INDEX(idEndereco),
    PRIMARY KEY (idEndereco),
    CONSTRAINT fkFornecedor FOREIGN KEY (idFornecedor) REFERENCES fornecedor(idFornecedor),
    CONSTRAINT fkCliente FOREIGN KEY (idCliente) REFERENCES cliente(idCliente)
);



CREATE TABLE Produto(
	idProduto INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    idFornecedor INTEGER UNSIGNED,


    nome VARCHAR(200) NOT NULL,
    descricao VARCHAR(70) NOT NULL,
    foto VARCHAR(70) NOT NULL,
     
   
    INDEX(idProduto),
    PRIMARY KEY (idProduto),
    CONSTRAINT fkFornecedor FOREIGN KEY (idFornecedor) REFERENCES fornecedor(idFornecedor)
);

CREATE TABLE Estoque(
	idEstoque INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    idProduto INTEGER UNSIGNED,
    
   	quantidade INTEGER NOT NULL,
    preco DOUBLE NOT NULL,
   
    INDEX(idEstoque),
    PRIMARY KEY (idEstoque),
    CONSTRAINT fkProduto FOREIGN KEY(idProduto) REFERENCES produto(idProduto)
);


CREATE TABLE Pedido(
	IdPedido INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    idCliente INTEGER UNSIGNED,
    
    numero INTEGER NOT NULL,
   	dataPedido DATE NOT NULL,
    dataEntrega DATE NOT NULL,
    situacao VARCHAR(10) NOT NULL,
   
    
    INDEX(IdPedido),
    PRIMARY KEY (IdPedido),
    CONSTRAINT fkCliente FOREIGN KEY (idCliente) REFERENCES cliente(idCliente)

);

CREATE TABLE PedidoItens(
	idItemPedido INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    quantidade INTEGER NOT NULL,
   	preco DOUBLE NOT NULL,
   
    INDEX(idItemPedido),
    PRIMARY KEY (idItemPedido)
);



