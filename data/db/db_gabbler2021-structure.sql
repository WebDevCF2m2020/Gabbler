-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema gabbler
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `gabbler` ;

-- -----------------------------------------------------
-- Schema gabbler
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gabbler` DEFAULT CHARACTER SET utf8 ;
USE `gabbler` ;

-- -----------------------------------------------------
-- Table `gabbler`.`room`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`room` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`room` (
  `id_room` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `public_room` TINYINT UNSIGNED NULL DEFAULT 1 COMMENT '1 => public\n2 => private',
  `name_room` VARCHAR(25) NOT NULL,
  `last_activity__room` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_room`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `name_room_UNIQUE` ON `gabbler`.`room` (`name_room` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`user` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`user` (
  `id_user` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nickname_user` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `pwd_user` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `mail_user` VARCHAR(120) NOT NULL,
  `signup_date_user` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'When confirmation is ok',
  `color_user` VARCHAR(45) NOT NULL,
  `confirmation_key_user` VARCHAR(60) NOT NULL,
  `validation_status_user` TINYINT UNSIGNED NULL DEFAULT 1 COMMENT '1 => not mail validate\n2 => mail validate',
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nickname_user_UNIQUE` ON `gabbler`.`user` (`nickname_user` ASC);

CREATE UNIQUE INDEX `mail_user_UNIQUE` ON `gabbler`.`user` (`mail_user` ASC);

CREATE UNIQUE INDEX `confirmation_key_user_UNIQUE` ON `gabbler`.`user` (`confirmation_key_user` ASC);

CREATE UNIQUE INDEX `pwd_user_UNIQUE` ON `gabbler`.`user` (`pwd_user` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`message` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`message` (
  `id_message` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_message` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content_message` TINYTEXT NOT NULL,
  `archived_message` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => Not archived\n2 => Archived',
  `fkey_user_id` INT UNSIGNED NOT NULL,
  `fkey_room_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_message`),
  CONSTRAINT `fk_message_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_room1`
    FOREIGN KEY (`fkey_room_id`)
    REFERENCES `gabbler`.`room` (`id_room`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_message_user1_idx` ON `gabbler`.`message` (`fkey_user_id` ASC);

CREATE INDEX `fk_message_room1_idx` ON `gabbler`.`message` (`fkey_room_id` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`online`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`online` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`online` (
  `id_online` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `last_activity_online` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `connected_online` TINYINT(1) NULL DEFAULT 2 COMMENT '1 => not connected\n2 => online',
  `fkey_user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_online`),
  CONSTRAINT `fk_online_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_online_user1_idx` ON `gabbler`.`online` (`fkey_user_id` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`user_room`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`user_room` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`user_room` (
  `id_user_room` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `favorite_user_room` TINYINT UNSIGNED NULL DEFAULT 1 COMMENT '1 => not favorite\n2 => favorite',
  `fkey_room_id` INT UNSIGNED NOT NULL,
  `fkey_user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_user_room`),
  CONSTRAINT `fk_favorite_room1`
    FOREIGN KEY (`fkey_room_id`)
    REFERENCES `gabbler`.`room` (`id_room`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_favorite_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_favorite_room1_idx` ON `gabbler`.`user_room` (`fkey_room_id` ASC);

CREATE INDEX `fk_favorite_user1_idx` ON `gabbler`.`user_room` (`fkey_user_id` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`status` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`status` (
  `id_status` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_status` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id_status`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `name_status_UNIQUE` ON `gabbler`.`status` (`name_status` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`user_right`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`user_right` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`user_right` (
  `id_user_right` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_authorized_user_right` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fkey_status_id` INT UNSIGNED NOT NULL,
  `fkey_user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_user_right`),
  CONSTRAINT `fk_user_right_status1`
    FOREIGN KEY (`fkey_status_id`)
    REFERENCES `gabbler`.`status` (`id_status`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_right_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_user_right_status1_idx` ON `gabbler`.`user_right` (`fkey_status_id` ASC);

CREATE INDEX `fk_user_right_user1_idx` ON `gabbler`.`user_right` (`fkey_user_id` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`help`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`help` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`help` (
  `id_help` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mail_help` VARCHAR(120) NOT NULL,
  `nickname_help` VARCHAR(80) NOT NULL,
  `subject_help` VARCHAR(120) NOT NULL,
  `content_help` TINYTEXT NOT NULL,
  `processed_help` TINYINT UNSIGNED NULL DEFAULT 1 COMMENT '1 => not response\n2 => response\n3 => closed',
  `user_id` INT UNSIGNED NULL COMMENT 'Admin user id',
  PRIMARY KEY (`id_help`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gabbler`.`img`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`img` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`img` (
  `id_img` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_img` VARCHAR(40) NOT NULL,
  `active_img` TINYINT UNSIGNED NULL DEFAULT 2 COMMENT '1 => archived\n2 => actived\n3 => illegal',
  `date_img` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_img`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `name_img_UNIQUE` ON `gabbler`.`img` (`name_img` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`category` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`category` (
  `id_category` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_category` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id_category`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `name_category_UNIQUE` ON `gabbler`.`category` (`name_category` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`reported`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`reported` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`reported` (
  `id_reported` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `inquiry_reported` TINYTEXT NULL,
  `processed_reported` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => not processed\n2 => processed',
  `fkey_category_id` INT UNSIGNED NOT NULL,
  `fkey_message_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_reported`),
  CONSTRAINT `fk_reported_category1`
    FOREIGN KEY (`fkey_category_id`)
    REFERENCES `gabbler`.`category` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reported_message1`
    FOREIGN KEY (`fkey_message_id`)
    REFERENCES `gabbler`.`message` (`id_message`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_reported_category1_idx` ON `gabbler`.`reported` (`fkey_category_id` ASC);

CREATE INDEX `fk_reported_message1_idx` ON `gabbler`.`reported` (`fkey_message_id` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`role` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`role` (
  `id_role` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_role` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id_role`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `name_role_UNIQUE` ON `gabbler`.`role` (`name_role` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`user_has_img`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`user_has_img` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`user_has_img` (
  `user_has_img_id_user` INT UNSIGNED NOT NULL,
  `user_has_img_id_img` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`user_has_img_id_user`, `user_has_img_id_img`),
  CONSTRAINT `fk_user_has_img_user1`
    FOREIGN KEY (`user_has_img_id_user`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_img_img1`
    FOREIGN KEY (`user_has_img_id_img`)
    REFERENCES `gabbler`.`img` (`id_img`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_user_has_img_img1_idx` ON `gabbler`.`user_has_img` (`user_has_img_id_img` ASC);

CREATE INDEX `fk_user_has_img_user1_idx` ON `gabbler`.`user_has_img` (`user_has_img_id_user` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`role_has_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`role_has_user` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`role_has_user` (
  `role_has_user_id_role` INT UNSIGNED NOT NULL,
  `role_has_user_id_user` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`role_has_user_id_role`, `role_has_user_id_user`),
  CONSTRAINT `fk_role_has_user_role1`
    FOREIGN KEY (`role_has_user_id_role`)
    REFERENCES `gabbler`.`role` (`id_role`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_role_has_user_user1`
    FOREIGN KEY (`role_has_user_id_user`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_role_has_user_user1_idx` ON `gabbler`.`role_has_user` (`role_has_user_id_user` ASC);

CREATE INDEX `fk_role_has_user_role1_idx` ON `gabbler`.`role_has_user` (`role_has_user_id_role` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
