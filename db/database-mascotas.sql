-- MySQL Workbench Forward Engineering
 CREATE DATABASE mydb;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
USE `mydb`;

-- Drop existing tables (if they exist)
DROP TABLE IF EXISTS `Vacuna`;
DROP TABLE IF EXISTS `TipoMascota`;
DROP TABLE IF EXISTS `Raza`;
DROP TABLE IF EXISTS `Role`;
DROP TABLE IF EXISTS `User`;
DROP TABLE IF EXISTS `Mascota`;
DROP TABLE IF EXISTS `ControlVacuna`;
DROP TABLE IF EXISTS `imagenes`;

-- -----------------------------------------------------
-- Table `mydb`.`Vacuna`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Vacuna` (
  `id` INT auto_increment NOT NULL,
  `nombre` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`TipoMascota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TipoMascota` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(150) NULL,
  `EdadEquivalenteJoven` INT NULL,
  `EdadEquivalenteAdulto` INT NULL,
  `EdadAdulto` INT NULL
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Raza`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Raza` (
  `id` INT NOT NULL auto_increment,
  `nombre` VARCHAR(150) NULL,
  `TipoMascota_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Raza_TipoMascota_idx` (`TipoMascota_id`),
  CONSTRAINT `fk_Raza_TipoMascota`
    FOREIGN KEY (`TipoMascota_id`)
    REFERENCES `mydb`.`TipoMascota` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Role` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(150) NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) ,
  `username` VARCHAR(45) ,
  `email` VARCHAR(45) ,
  `password` VARCHAR(45) ,
  `Role_id` INT ,
  PRIMARY KEY (`id`),
  INDEX `fk_User_Role1_idx` (`Role_id`),
  UNIQUE INDEX `username_UNIQUE` (`username`),
  UNIQUE INDEX `email_UNIQUE` (`email`),
 CONSTRAINT fk_User_Role1 FOREIGN KEY (Role_id) REFERENCES Role (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Mascota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Mascota` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(150) NULL,
  `FechaNacimiento` DATE NULL,
  `User_id` INT NOT NULL,
  `TipoMascota_id` INT NOT NULL,
  `Raza_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Mascota_User1_idx` (`User_id`),
  INDEX `fk_Mascota_TipoMascota1_idx` (`TipoMascota_id`),
  INDEX `fk_Mascota_Raza1_idx` (`Raza_id`),
  CONSTRAINT `fk_Mascota_User1`
    FOREIGN KEY (`User_id`)
    REFERENCES `mydb`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Mascota_TipoMascota1`
    FOREIGN KEY (`TipoMascota_id`)
    REFERENCES `mydb`.`TipoMascota` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Mascota_Raza1`
    FOREIGN KEY (`Raza_id`)
    REFERENCES `mydb`.`Raza` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`ControlVacuna`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ControlVacuna` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `Mascota_id` INT NOT NULL,
  `Vacuna_id` INT NOT NULL,
  `fecha` DATE NULL,
  UNIQUE KEY `id_UNIQUE` (`id`), -- Se agrega una restricción UNIQUE para la columna id
  INDEX `fk_Mascota_has_Vacuna_Vacuna1_idx` (`Vacuna_id`),
  INDEX `fk_Mascota_has_Vacuna_Mascota1_idx` (`Mascota_id`),
  CONSTRAINT `fk_Mascota_has_Vacuna_Mascota1`
    FOREIGN KEY (`Mascota_id`)
    REFERENCES `mydb`.`Mascota` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Mascota_has_Vacuna_Vacuna1`
    FOREIGN KEY (`Vacuna_id`)
    REFERENCES `mydb`.`Vacuna` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE imagenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_archivo VARCHAR(255) NOT NULL,
    tipo_archivo VARCHAR(100) NOT NULL,
    tamaño_archivo INT NOT NULL,
    fecha_subida TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ALTER TABLE `User`
-- ADD COLUMN `gender_id` INT NULL;

-- ALTER TABLE `User`
-- ADD CONSTRAINT `fk_User_gender`
-- FOREIGN KEY (`gender_id`)
-- REFERENCES `gender` (`id`)
-- ON DELETE NO ACTION
-- ON UPDATE NO ACTION;
-- Agregar columna 'imagen_id' a la tabla 'User'

ALTER TABLE `User`
ADD COLUMN `imagen_id` INT NULL,
ADD CONSTRAINT `fk_User_imagen`
FOREIGN KEY (`imagen_id`)
REFERENCES `imagenes` (`id`)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE `mascota`
ADD COLUMN `imagen_id` INT NULL,
ADD CONSTRAINT `fk_mascota_imagen`
FOREIGN KEY (`imagen_id`)
REFERENCES `imagenes` (`id`)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE imagenes
ADD ruta VARCHAR(255);

-- Insertar registros de ejemplo en la tabla TipoMascota
INSERT INTO TipoMascota (nombre, EdadEquivalenteJoven, EdadEquivalenteAdulto, EdadAdulto) 
VALUES 
('Perro', 1, 2, 5),
('Gato', 1, 2, 4);


SELECT * FROM Raza;

-- Insertar registros en la tabla Vacuna
INSERT INTO Vacuna (id, nombre) VALUES
(1, 'Parvovirus Canino'),
(2, 'Moquillo'),
(3, 'Hepatitis Infecciosa Canina'),
(4, 'Rabia'),
(5, 'Leptospirosis');
INSERT INTO Vacuna (id, nombre) VALUES
(6, 'Panleucopenia Felina'),
(7, 'Rinotraqueitis Felina'),
(8, 'Calicivirus Felino'),
(9, 'Clamidia Felina'),
(10, 'Rabia');


-- Insertar registros en la tabla Raza
INSERT INTO Raza (id, nombre, TipoMascota_id) VALUES (1, 'Pitbull', 1);


-- Insertar registros en la tabla User


-- Insertar registros en la tabla Mascota
INSERT INTO Mascota (id, nombre, FechaNacimiento, User_id, TipoMascota_id, Raza_id) 
VALUES 
(1, 'Mascota1', '2023-11-18', 1, 1, 1);

INSERT INTO mydb.ControlVacuna (Mascota_id, Vacuna_id, fecha) 
VALUES 
(1, 1, '2023-11-25 08:00:00'),
(2, 2, '2023-11-26 09:30:00'),
(3, 3, '2023-11-27 11:45:00');
INSERT INTO Role (id, nombre) VALUES (1, 'Administrador');
INSERT INTO Role (id, nombre) VALUES (2, 'jefe');

