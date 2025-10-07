-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_biblioteca1
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_biblioteca1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_biblioteca1` DEFAULT CHARACTER SET utf8 ;
USE `db_biblioteca1` ;

-- -----------------------------------------------------
-- Table `db_biblioteca1`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca1`.`categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_biblioteca1`.`editora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca1`.`editora` (
  `idEditora` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `endereco` VARCHAR(45) NULL,
  PRIMARY KEY (`idEditora`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_biblioteca1`.`livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca1`.`livro` (
  `idLivro` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `anopublicacao` INT NULL,
  `edicao` INT NULL,
  `categoria_idCategoria` INT NOT NULL,
  `editora_idEditora` INT NOT NULL,
  PRIMARY KEY (`idLivro`),
  INDEX `fk_livro_categoria_idx` (`categoria_idCategoria` ASC) VISIBLE,
  INDEX `fk_livro_editora1_idx` (`editora_idEditora` ASC) VISIBLE,
  CONSTRAINT `fk_livro_categoria`
    FOREIGN KEY (`categoria_idCategoria`)
    REFERENCES `db_biblioteca1`.`categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_livro_editora1`
    FOREIGN KEY (`editora_idEditora`)
    REFERENCES `db_biblioteca1`.`editora` (`idEditora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_biblioteca1`.`autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca1`.`autor` (
  `idAutor` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `nacionalidade` VARCHAR(45) NULL,
  PRIMARY KEY (`idAutor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_biblioteca1`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca1`.`pessoa` (
  `idpessoa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`idpessoa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_biblioteca1`.`livro_has_autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca1`.`livro_has_autor` (
  `livro_idLivro` INT NOT NULL,
  `autor_idAutor` INT NOT NULL,
  PRIMARY KEY (`livro_idLivro`, `autor_idAutor`),
  INDEX `fk_livro_has_autor_autor1_idx` (`autor_idAutor` ASC) VISIBLE,
  INDEX `fk_livro_has_autor_livro1_idx` (`livro_idLivro` ASC) VISIBLE,
  CONSTRAINT `fk_livro_has_autor_livro1`
    FOREIGN KEY (`livro_idLivro`)
    REFERENCES `db_biblioteca1`.`livro` (`idLivro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_livro_has_autor_autor1`
    FOREIGN KEY (`autor_idAutor`)
    REFERENCES `db_biblioteca1`.`autor` (`idAutor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_biblioteca1`.`emprestimo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca1`.`emprestimo` (
  `idemprestimo` INT NOT NULL AUTO_INCREMENT,
  `dataemprestimo` TIMESTAMP NULL,
  `datadevolucao` TIMESTAMP NULL,
  `pessoa_idpessoa` INT NOT NULL,
  PRIMARY KEY (`idemprestimo`),
  INDEX `fk_emprestimo_pessoa1_idx` (`pessoa_idpessoa` ASC) VISIBLE,
  CONSTRAINT `fk_emprestimo_pessoa1`
    FOREIGN KEY (`pessoa_idpessoa`)
    REFERENCES `db_biblioteca1`.`pessoa` (`idpessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_biblioteca1`.`emprestimo_has_livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca1`.`emprestimo_has_livro` (
  `emprestimo_idemprestimo` INT NOT NULL,
  `livro_idLivro` INT NOT NULL,
  PRIMARY KEY (`emprestimo_idemprestimo`, `livro_idLivro`),
  INDEX `fk_emprestimo_has_livro_livro1_idx` (`livro_idLivro` ASC) VISIBLE,
  INDEX `fk_emprestimo_has_livro_emprestimo1_idx` (`emprestimo_idemprestimo` ASC) VISIBLE,
  CONSTRAINT `fk_emprestimo_has_livro_emprestimo1`
    FOREIGN KEY (`emprestimo_idemprestimo`)
    REFERENCES `db_biblioteca1`.`emprestimo` (`idemprestimo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_has_livro_livro1`
    FOREIGN KEY (`livro_idLivro`)
    REFERENCES `db_biblioteca1`.`livro` (`idLivro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
