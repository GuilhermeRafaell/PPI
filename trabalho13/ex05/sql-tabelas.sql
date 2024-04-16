CREATE TABLE produto
(
   id int PRIMARY KEY auto_increment,
   nome_do_produto varchar(50),
   marca char(14) UNIQUE,
   descricao varchar(255) UNIQUE
) ENGINE=InnoDB;

/*CRTL+SHIFT+ENTER (executar a query no php-myadmin)*/

INSERT INTO produto (nome_do_produto, marca, descricao)
VALUES ('Smart TV LED 55', 'Samsung', 'Smart TV LED 55 polegadas, 4K, com Wi-Fi integrado');

INSERT INTO produto (nome_do_produto, marca, descricao)
VALUES ('Smartphone 6.5 ABC', 'Apple', 'Smartphone Apple, tela 6.5 polegadas, 128GB, câmera dupla');