-- MySQL Script generated by MySQL Workbench
-- Mon Dec 12 15:26:35 2016
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema vendedores
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema vendedores
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vendedores` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `vendedores` ;

-- -----------------------------------------------------
-- Table `vendedores`.`ven_cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendedores`.`ven_cargo` (
  `idCargo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(150) NULL COMMENT '',
  `fechaMod` DATETIME NULL COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idCargo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vendedores`.`ven_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendedores`.`ven_usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idCargo` INT NOT NULL COMMENT '',
  `nombre` VARCHAR(75) NULL COMMENT '',
  `apellido` VARCHAR(75) NULL COMMENT '',
  `email` VARCHAR(45) NULL COMMENT '',
  `usuario` VARCHAR(45) NULL COMMENT '',
  `contrasena` VARCHAR(45) NULL COMMENT '',
  `puntos` VARCHAR(45) NULL COMMENT '',
  `fechaMod` DATETIME NULL COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idUsuario`)  COMMENT '',
  INDEX `fk_ven_usuario_ven_cargo1_idx` (`idCargo` ASC)  COMMENT '',
  CONSTRAINT `fk_ven_usuario_ven_cargo1`
    FOREIGN KEY (`idCargo`)
    REFERENCES `vendedores`.`ven_cargo` (`idCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vendedores`.`ven_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendedores`.`ven_categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(75) NULL COMMENT '',
  `imagen` VARCHAR(150) NULL COMMENT '',
  `idPadre` INT NULL COMMENT '',
  `fechaMod` DATETIME NULL COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idCategoria`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vendedores`.`ven_usuario_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendedores`.`ven_usuario_admin` (
  `idUsuarioAdmin` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NULL COMMENT '',
  `apellido` VARCHAR(45) NULL COMMENT '',
  `email` VARCHAR(45) NULL COMMENT '',
  `usuario` VARCHAR(45) NULL COMMENT '',
  `contrasena` VARCHAR(45) NULL COMMENT '',
  `fechaMod` DATETIME NULL COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idUsuarioAdmin`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vendedores`.`ven_noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendedores`.`ven_noticia` (
  `idNoticia` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idCategoria` INT NOT NULL COMMENT '',
  `idUsuarioAdmin` INT NOT NULL COMMENT '',
  `titulo` VARCHAR(75) NULL COMMENT '',
  `subtitulo` VARCHAR(75) NULL COMMENT '',
  `contenido` TEXT NULL COMMENT '',
  `imagen` VARCHAR(150) NULL COMMENT '',
  `tipoTemplate` INT NULL COMMENT '',
  `fechaMod` DATETIME NULL COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idNoticia`)  COMMENT '',
  INDEX `fk_noticia_categoria_idx` (`idCategoria` ASC)  COMMENT '',
  INDEX `fk_noticia_usuario_admin1_idx` (`idUsuarioAdmin` ASC)  COMMENT '',
  CONSTRAINT `fk_noticia_categoria`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `vendedores`.`ven_categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_noticia_usuario_admin1`
    FOREIGN KEY (`idUsuarioAdmin`)
    REFERENCES `vendedores`.`ven_usuario_admin` (`idUsuarioAdmin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
