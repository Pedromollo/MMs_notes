-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema notas_mms
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `notas_mms` ;

-- -----------------------------------------------------
-- Schema notas_mms
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `notas_mms` DEFAULT CHARACTER SET utf8 ;
USE `notas_mms` ;

-- -----------------------------------------------------
-- Table `notas_mms`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notas_mms`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notas_mms`.`anota_anotas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notas_mms`.`anota_anotas` (
  `idanota_notas` INT NOT NULL AUTO_INCREMENT,
  `usuarios_id_usuario` INT NOT NULL,
  `titulo` TEXT(50) NOT NULL,
  `anotacao` TEXT(300) NOT NULL,
  PRIMARY KEY (`idanota_notas`),
  INDEX `fk_Notas_Dados_idx` (`usuarios_id_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_Notas_Dados`
    FOREIGN KEY (`usuarios_id_usuario`)
    REFERENCES `notas_mms`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
