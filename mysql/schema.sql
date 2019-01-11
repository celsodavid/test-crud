CREATE SCHEMA `crud` DEFAULT CHARACTER SET utf8 ;

USE crud ;

CREATE TABLE `crud`.`cadastro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  `rg` VARCHAR(20) NULL,
  `cep` VARCHAR(10) NULL,
  `endereco` VARCHAR(50) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC));

ALTER TABLE `crud`.`cadastro` 
ADD COLUMN `numero` VARCHAR(20) NULL AFTER `endereco`;

INSERT INTO `cadastro` (`id`,`nome`,`email`,`senha`,`telefone`,`rg`,`cep`,`endereco`,`numero`) VALUES (1,'Celso Lopes','celso.lopes@test.com','eb36322ec85f0c581440d3eab46fa63a','11997528918','413641037','0554440','rua domingos conversani','123');
INSERT INTO `cadastro` (`id`,`nome`,`email`,`senha`,`telefone`,`rg`,`cep`,`endereco`,`numero`) VALUES (2,'Mirtes Lopes','mirtes.lopes@test.com','eb36322ec85f0c581440d3eab46fa63a','11997595515','123456789','0554440','rua domingos conversani','321');
INSERT INTO `cadastro` (`id`,`nome`,`email`,`senha`,`telefone`,`rg`,`cep`,`endereco`,`numero`) VALUES (3,'Ana Porto','ana.porto@test.com','eb36322ec85f0c581440d3eab46fa63a','11992159016','123456789','0554440','rua domingos conversani','789');
INSERT INTO `cadastro` (`id`,`nome`,`email`,`senha`,`telefone`,`rg`,`cep`,`endereco`,`numero`) VALUES (4,'Novo teste','testes001@gmail.com','5583413443164b56500def9a533c7c70','11997598918','412541034','05544040','Rua Domingos Conversani','33');

CREATE TABLE `crud`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`));

INSERT INTO `crud`.`categoria` (`nome`) VALUES ('normal');
INSERT INTO `crud`.`categoria` (`nome`) VALUES ('especial');

CREATE TABLE `crud`.`produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_categoria` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `produto_id_categoria_idx` (`id_categoria` ASC),
  CONSTRAINT `produto_id_categoria`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `crud`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

INSERT INTO `crud`.`produto` (`id_categoria`, `nome`)
VALUES (1, 'Produto 1'),(1, 'Produto 2'), (2, 'Produto 3'), (1, 'Produto 4'), (1, 'Produto 5'), (2, 'Produto 6'),
(1, 'Produto 7'), (1, 'Produto 8'), (2, 'Produto 9'), (1, 'Produto 10'), (1, 'Produto 11'), (2, 'Produto 12'),
(1, 'Produto 13'), (1, 'Produto 14'), (2, 'Produto 15'), (1, 'Produto 16'), (1, 'Produto 17');