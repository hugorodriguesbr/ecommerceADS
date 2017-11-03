CREATE DATABASE ecommerce;

USE ecommerce;

CREATE TABLE  produtos (
 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 nome VARCHAR( 50 ) NOT NULL ,
 descricao VARCHAR( 80 ) NOT NULL ,
 valor DECIMAL(10,2) NOT NULL,
 foto VARCHAR( 100 ) NOT NULL,
 estrelas INT NOT NULL
) ENGINE = MYISAM

INSERT INTO `ecommerce`.`produtos` (`id` ,`nome` ,`descricao` ,`valor` ,`foto` ,`estrelas`)
VALUES (NULL , 'Samsung S5', 'Galaxy S5', '600.15', 'galaxy5.jpg', '4'), 
       (NULL , 'Micro SD', 'SD 8GB', '80.12', 'microsd.jpg', '3');



