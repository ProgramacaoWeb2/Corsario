CREATE DATABASE Teste123 DEFAULT CHARSET=latin1;
USE Teste123;

CREATE TABLE Endereco(
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
) ENGINE = INNODB;

CREATE TABLE Usuario(
	idUsuario INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    login VARCHAR(50) NOT NULL,
    senha VARCHAR(150) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    tipoUsuario INTEGER NOT NULL,

    telefone VARCHAR(9),
    cartaoCredito VARCHAR(30) ,
    
	idEndereco INTEGER UNSIGNED,
    
    INDEX(idUsuario),
    PRIMARY KEY(idUsuario),
    CONSTRAINT fk_Endereco FOREIGN KEY (idEndereco) REFERENCES Endereco(idEndereco) ON DELETE CASCADE 
    
) ENGINE = INNODB;





CREATE TABLE Fornecedor(
	idFornecedor INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    nome VARCHAR(200) NOT NULL,
    descricao VARCHAR(200) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    idEndereco INTEGER UNSIGNED,
    
    
    INDEX(idFornecedor),
    PRIMARY KEY (idFornecedor),
    CONSTRAINT fk_EnderecoFornecedor FOREIGN KEY (idEndereco) REFERENCES Endereco(idEndereco) 
) ENGINE = INNODB;



CREATE TABLE Produto(
	idProduto INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    fkFornecedorProduto INTEGER UNSIGNED,


    nome VARCHAR(200) NOT NULL,
    descricao VARCHAR(70) NOT NULL,
    foto VARCHAR(70) NOT NULL,
     
   
    INDEX(idProduto),
    PRIMARY KEY (idProduto),
    CONSTRAINT fk_Fornecedor FOREIGN KEY (fkFornecedorProduto) REFERENCES fornecedor(idFornecedor) ON DELETE CASCADE 
) ENGINE = INNODB;


CREATE TABLE Estoque(
	idEstoque INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    fkProdutoEstoque INTEGER UNSIGNED,
    
   	quantidade INTEGER NOT NULL,
    preco DOUBLE NOT NULL,
   
    INDEX(idEstoque),
    PRIMARY KEY (idEstoque),
    CONSTRAINT fk_Produto FOREIGN KEY(fkProdutoEstoque) REFERENCES produto(idProduto) ON DELETE CASCADE 
) ENGINE = INNODB;


CREATE TABLE Pedido(
	IdPedido INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
  
    numero INTEGER NOT NULL,
   	dataPedido DATE NOT NULL,
    dataEntrega DATE NOT NULL,
    situacao VARCHAR(10) NOT NULL,
    
	idUsuario INTEGER UNSIGNED,
   
    
    INDEX(IdPedido),
    PRIMARY KEY (IdPedido),
    CONSTRAINT fkUsuario FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)

) ENGINE = INNODB;

CREATE TABLE PedidoItens(
	idItemPedido INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
    quantidade INTEGER NOT NULL,
   	preco DOUBLE NOT NULL,
   
    INDEX(idItemPedido),
    PRIMARY KEY (idItemPedido)
) ENGINE = INNODB;


INSERT INTO Usuario (login, senha, nome, tipoUsuario) VALUES ("admin@admin.com", MD5("admin1234"), "Admin", 1)
