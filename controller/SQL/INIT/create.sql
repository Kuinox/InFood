-- MySQL Script generated by MySQL Workbench
-- Tue Jun  6 16:11:00 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema infood
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `infood` ;

-- -----------------------------------------------------
-- Schema infood
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `infood` DEFAULT CHARACTER SET utf8mb4 ;
USE `infood` ;

-- -----------------------------------------------------
-- Table `infood`.`nutriment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`nutriment` ;

CREATE TABLE IF NOT EXISTS `infood`.`nutriment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`generic_name`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`generic_name` ;

CREATE TABLE IF NOT EXISTS `infood`.`generic_name` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(250) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_generic_name_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`aliment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`aliment` ;

CREATE TABLE IF NOT EXISTS `infood`.`aliment` (
  `id_aliment` VARCHAR(41) NOT NULL,
  `name_aliment` VARCHAR(250) NULL,
  `last_modification_aliment` DATETIME NULL,
  `ingredients_aliment` VARCHAR(5000) NULL,
  `generic_name_id` INT NULL,
  `grade_nutriment` ENUM('A', 'B', 'C', 'D', 'E', 'F') NULL,
  `quantity` VARCHAR(150) NULL,
  `serving_size` VARCHAR(200) NULL,
  PRIMARY KEY (`id_aliment`),
  INDEX `fk_aliment_nom_generique1_idx` (`generic_name_id` ASC),
  UNIQUE INDEX `id_aliment_UNIQUE` (`id_aliment` ASC),
  CONSTRAINT `fk_aliment_nom_generique1`
    FOREIGN KEY (`generic_name_id`)
    REFERENCES `infood`.`generic_name` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`additive`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`additive` ;

CREATE TABLE IF NOT EXISTS `infood`.`additive` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(10) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_additive_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`aliment_has_nutriment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`aliment_has_nutriment` ;

CREATE TABLE IF NOT EXISTS `infood`.`aliment_has_nutriment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `nutriment_id_nutriment` INT NOT NULL,
  `nutriment_quantity` FLOAT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_aliment_has_nutriment_nutriment1_idx` (`nutriment_id_nutriment` ASC),
  INDEX `fk_aliment_has_nutriment_aliment1_idx` (`aliment_id_aliment` ASC),
  CONSTRAINT `fk_aliment_has_nutriment_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aliment_has_nutriment_nutriment1`
    FOREIGN KEY (`nutriment_id_nutriment`)
    REFERENCES `infood`.`nutriment` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`aliment_has_additive`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`aliment_has_additive` ;

CREATE TABLE IF NOT EXISTS `infood`.`aliment_has_additive` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `additive_id_additive` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_aliment_has_additif1_additif1_idx` (`additive_id_additive` ASC),
  INDEX `fk_aliment_has_additif1_aliment1_idx` (`aliment_id_aliment` ASC),
  CONSTRAINT `fk_aliment_has_additif1_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aliment_has_additif1_additif1`
    FOREIGN KEY (`additive_id_additive`)
    REFERENCES `infood`.`additive` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`user` ;

CREATE TABLE IF NOT EXISTS `infood`.`user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(15) NULL,
  `password` VARCHAR(255) NULL,
  `email` VARCHAR(45) NULL,
  `height` SMALLINT NULL,
  `weight` SMALLINT NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`grade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`grade` ;

CREATE TABLE IF NOT EXISTS `infood`.`grade` (
  `id_grade` INT NOT NULL,
  `name_grade` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_grade`),
  UNIQUE INDEX `id_grade_UNIQUE` (`id_grade` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`brand`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`brand` ;

CREATE TABLE IF NOT EXISTS `infood`.`brand` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_brand_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`aliment_has_brand`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`aliment_has_brand` ;

CREATE TABLE IF NOT EXISTS `infood`.`aliment_has_brand` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `brand_id_brand` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_aliment_has_marques_marques1_idx` (`brand_id_brand` ASC),
  INDEX `fk_aliment_has_marques_aliment1_idx` (`aliment_id_aliment` ASC),
  CONSTRAINT `fk_aliment_has_brand`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aliment_has_brand1`
    FOREIGN KEY (`brand_id_brand`)
    REFERENCES `infood`.`brand` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`packaging`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`packaging` ;

CREATE TABLE IF NOT EXISTS `infood`.`packaging` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(250) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_packaging_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`aliment_has_packaging`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`aliment_has_packaging` ;

CREATE TABLE IF NOT EXISTS `infood`.`aliment_has_packaging` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `packaging_id_packaging` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_aliment_has_packaging_packaging1_idx` (`packaging_id_packaging` ASC),
  INDEX `fk_aliment_has_packaging_aliment1_idx` (`aliment_id_aliment` ASC),
  CONSTRAINT `fk_aliment_has_packaging_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aliment_has_packaging_packaging1`
    FOREIGN KEY (`packaging_id_packaging`)
    REFERENCES `infood`.`packaging` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`manufacturing_place`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`manufacturing_place` ;

CREATE TABLE IF NOT EXISTS `infood`.`manufacturing_place` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(500) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_manufacturing_place_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`aliment_has_manufacturing_place`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`aliment_has_manufacturing_place` ;

CREATE TABLE IF NOT EXISTS `infood`.`aliment_has_manufacturing_place` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `manufacturing_place_id_manufacturing_place` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_lieu_fabrications_has_aliment_aliment1_idx` (`aliment_id_aliment` ASC),
  INDEX `fk_lieu_fabrications_has_aliment_lieu_fabrications1_idx` (`manufacturing_place_id_manufacturing_place` ASC),
  CONSTRAINT `fk_lieu_fabrications_has_aliment_lieu_fabrications1`
    FOREIGN KEY (`manufacturing_place_id_manufacturing_place`)
    REFERENCES `infood`.`manufacturing_place` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lieu_fabrications_has_aliment_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`allergen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`allergen` ;

CREATE TABLE IF NOT EXISTS `infood`.`allergen` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(1000) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_allergen_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`aliment_has_allergen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`aliment_has_allergen` ;

CREATE TABLE IF NOT EXISTS `infood`.`aliment_has_allergen` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `allergen_id_allergen` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_allergene_has_aliment_aliment1_idx` (`aliment_id_aliment` ASC),
  INDEX `fk_allergene_has_aliment_allergene1_idx` (`allergen_id_allergen` ASC),
  CONSTRAINT `fk_allergene_has_aliment_allergene1`
    FOREIGN KEY (`allergen_id_allergen`)
    REFERENCES `infood`.`allergen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_allergene_has_aliment_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`comments` ;

CREATE TABLE IF NOT EXISTS `infood`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `text_comment` TEXT NOT NULL,
  `date_comment` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id_user` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Commentaires_aliment1_idx` (`aliment_id_aliment` ASC),
  INDEX `fk_Comments_user1_idx` (`user_id_user` ASC),
  CONSTRAINT `fk_Commentaires_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comments_user1`
    FOREIGN KEY (`user_id_user`)
    REFERENCES `infood`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`Notes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`Notes` ;

CREATE TABLE IF NOT EXISTS `infood`.`Notes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `note` TINYINT NOT NULL,
  `user_id_user` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Notes_aliment1_idx` (`aliment_id_aliment` ASC),
  INDEX `fk_Notes_user1_idx` (`user_id_user` ASC),
  CONSTRAINT `fk_Notes_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notes_user1`
    FOREIGN KEY (`user_id_user`)
    REFERENCES `infood`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`pic_name`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`pic_name` ;

CREATE TABLE IF NOT EXISTS `infood`.`pic_name` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(20) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_pic_name_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`aliment_has_pic_name`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`aliment_has_pic_name` ;

CREATE TABLE IF NOT EXISTS `infood`.`aliment_has_pic_name` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `pic_name_id_pic_name` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_nom_image_has_aliment_aliment1_idx` (`aliment_id_aliment` ASC),
  INDEX `fk_nom_image_has_aliment_nom_image1_idx` (`pic_name_id_pic_name` ASC),
  CONSTRAINT `fk_nom_image_has_aliment_nom_image1`
    FOREIGN KEY (`pic_name_id_pic_name`)
    REFERENCES `infood`.`pic_name` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_nom_image_has_aliment_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`categorie` ;

CREATE TABLE IF NOT EXISTS `infood`.`categorie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(100) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_categorie_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`aliment_has_categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`aliment_has_categorie` ;

CREATE TABLE IF NOT EXISTS `infood`.`aliment_has_categorie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `categorie_id_categorie` INT NOT NULL,
  INDEX `fk_categories_has_aliment1_aliment1_idx` (`aliment_id_aliment` ASC),
  INDEX `fk_categories_has_aliment1_categories1_idx` (`categorie_id_categorie` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_categories_has_aliment1_categories1`
    FOREIGN KEY (`categorie_id_categorie`)
    REFERENCES `infood`.`categorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categories_has_aliment1_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`ingredient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`ingredient` ;

CREATE TABLE IF NOT EXISTS `infood`.`ingredient` (
  `id` INT NOT NULL,
  `label` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idingredient_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`aliment_has_ingredient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`aliment_has_ingredient` ;

CREATE TABLE IF NOT EXISTS `infood`.`aliment_has_ingredient` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `ingredient_id_ingredient` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ingredient_has_aliment_aliment1_idx` (`aliment_id_aliment` ASC),
  INDEX `fk_ingredient_has_aliment_ingredient1_idx` (`ingredient_id_ingredient` ASC),
  CONSTRAINT `fk_ingredient_has_aliment_ingredient1`
    FOREIGN KEY (`ingredient_id_ingredient`)
    REFERENCES `infood`.`ingredient` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ingredient_has_aliment_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`ingredient_has_ingredient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`ingredient_has_ingredient` ;

CREATE TABLE IF NOT EXISTS `infood`.`ingredient_has_ingredient` (
  `ingredient_id_ingredient` INT NOT NULL,
  `ingredient_id_ingredient1` INT NOT NULL,
  PRIMARY KEY (`ingredient_id_ingredient`, `ingredient_id_ingredient1`),
  INDEX `fk_ingredient_has_ingredient_ingredient2_idx` (`ingredient_id_ingredient1` ASC),
  INDEX `fk_ingredient_has_ingredient_ingredient1_idx` (`ingredient_id_ingredient` ASC),
  CONSTRAINT `fk_ingredient_has_ingredient_ingredient1`
    FOREIGN KEY (`ingredient_id_ingredient`)
    REFERENCES `infood`.`ingredient` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ingredient_has_ingredient_ingredient2`
    FOREIGN KEY (`ingredient_id_ingredient1`)
    REFERENCES `infood`.`ingredient` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`unwanted_aliment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`unwanted_aliment` ;

CREATE TABLE IF NOT EXISTS `infood`.`unwanted_aliment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aliment_id_aliment` VARCHAR(41) NOT NULL,
  `user_id_user` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_has_aliment_aliment1_idx` (`aliment_id_aliment` ASC),
  INDEX `fk_user_has_aliment_user1_idx` (`user_id_user` ASC),
  CONSTRAINT `fk_user_has_aliment_user1`
    FOREIGN KEY (`user_id_user`)
    REFERENCES `infood`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_aliment_aliment1`
    FOREIGN KEY (`aliment_id_aliment`)
    REFERENCES `infood`.`aliment` (`id_aliment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`grade_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`grade_user` ;

CREATE TABLE IF NOT EXISTS `infood`.`grade_user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id_user` INT NOT NULL,
  `grade_id_grade` INT NOT NULL,
  INDEX `fk_user_has_grade_grade1_idx` (`grade_id_grade` ASC),
  INDEX `fk_user_has_grade_user1_idx` (`user_id_user` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_has_grade_user1`
    FOREIGN KEY (`user_id_user`)
    REFERENCES `infood`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_grade_grade1`
    FOREIGN KEY (`grade_id_grade`)
    REFERENCES `infood`.`grade` (`id_grade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infood`.`bdd_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infood`.`bdd_status` ;

CREATE TABLE IF NOT EXISTS `infood`.`bdd_status` (
  `updating` TINYINT NULL,
  `progress` FLOAT NULL)
ENGINE = InnoDB
COMMENT = 's';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `infood`.`bdd_status`
-- -----------------------------------------------------
START TRANSACTION;
USE `infood`;
INSERT INTO `infood`.`bdd_status` (`updating`, `progress`) VALUES (true, 0);

COMMIT;

