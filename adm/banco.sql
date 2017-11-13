CREATE DATABASE ecommerce;

USE ecommerce;

/*PRODUTOS*/
CREATE TABLE IF NOT EXISTS produtos  (
 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 nome VARCHAR( 50 ) NOT NULL ,
 descricao VARCHAR( 80 ) NOT NULL ,
 valor DECIMAL(10,2) NOT NULL,
 foto VARCHAR( 100 ) NOT NULL,
 estrelas INT NOT NULL
) ENGINE = MYISAM;

INSERT INTO `ecommerce`.`produtos` (`id` ,`nome` ,`descricao` ,`valor` ,`foto` ,`estrelas`)
VALUES (NULL , 'Samsung S5', 'Galaxy S5', '600.15', 'galaxy5.jpg', '4'), 
       (NULL , 'Micro SD', 'SD 8GB', '80.12', 'microsd.jpg', '3');

/*USUARIOS*/
 CREATE TABLE IF NOT EXISTS usuarios (
 	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    nome VARCHAR( 50 ) NOT NULL ,
    login VARCHAR( 80 ) NOT NULL,
    senha VARCHAR ( 80 ) NOT NULL
 	) ENGINE = MYISAM;


INSERT INTO usuarios (`id` ,`nome` ,`login` ,`senha` )
VALUES (NULL , 'Administrador' , 'admin'  , MD5('admin')), 
       (NULL , 'Marlon Hugo'   , 'marlon' , MD5('123456'));


/*CLIENTE*/
CREATE TABLE IF NOT EXISTS cliente (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    email VARCHAR( 80 ) NOT NULL,
    senha VARCHAR ( 80 ) NOT NULL
 	) ENGINE = MYISAM;

INSERT INTO cliente (`id` ,`email` ,`senha` )
VALUES (NULL , 'alessandra@unis.edu.br'  , MD5('esquci123')), 
       (NULL , 'bruno@unis.edu.br' , MD5('123456'));

/*PEDIDO*/
CREATE TABLE IF NOT EXISTS pedido (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	idpedido INT NOT NULL,
    idcliente INT NOT NULL,
    idproduto INT NOT NULL, 
    quantidade INT NOT NULL,
    datacompra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX cliente_ind (idcliente),
    INDEX prodito_ind (idproduto),
    CONSTRAINT fk_cliente FOREIGN KEY (idcliente) REFERENCES cliente(id),
    CONSTRAINT fk_produto FOREIGN KEY (idproduto) REFERENCES produtos(id)
 	) ENGINE = MYISAM;

INSERT INTO pedido (`id` ,`idpedido`, `idcliente`, `idproduto`, `quantidade`, `datacompra`)
VALUES (NULL , 1010, 1 , 1 , 1, '2017-11-01 14:00:01'), 
       (NULL , 1010, 1 , 1 , 2, '2017-11-01 14:20:01');
