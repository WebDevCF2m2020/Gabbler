-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';



-- -----------------------------------------------------
-- Table `room`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `room` (
  `id_room` INT NOT NULL AUTO_INCREMENT,
  `public_room` TINYINT NULL,
  `name_room` VARCHAR(25) NOT NULL,
  `last_activity__room` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_room`),
  UNIQUE INDEX `name_room_UNIQUE` (`name_room` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `nickname_user` VARCHAR(60) NOT NULL,
  `pwd_user` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `mail_user` VARCHAR(120) NOT NULL,
  `signup_date_user` DATETIME NOT NULL,
  `color_user` VARCHAR(45) NOT NULL,
  `confirmation_key_user` VARCHAR(60) NOT NULL,
  `validation_status_user` TINYINT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `nickname_user_UNIQUE` (`nickname_user` ASC) ,
  UNIQUE INDEX `mail_user_UNIQUE` (`mail_user` ASC) ,
  UNIQUE INDEX `confirmation_key_user_UNIQUE` (`confirmation_key_user` ASC) ,
  UNIQUE INDEX `pwd_user_UNIQUE` (`pwd_user` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` INT NOT NULL AUTO_INCREMENT,
  `date_message` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content_message` TINYTEXT NOT NULL,
  `archived_message` TINYINT(1) NULL,
  `fkey_user_id` INT NOT NULL,
  `fkey_room_id` INT NOT NULL,
  PRIMARY KEY (`id_message`),
  INDEX `fk_message_user1_idx` (`fkey_user_id` ASC) ,
  INDEX `fk_message_room1_idx` (`fkey_room_id` ASC) ,
  CONSTRAINT `fk_message_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_room1`
    FOREIGN KEY (`fkey_room_id`)
    REFERENCES `room` (`id_room`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `online`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online` (
  `id_online` INT NOT NULL AUTO_INCREMENT,
  `last_activity_online` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `connected_online` TINYINT(1) NULL,
  `fkey_user` INT NOT NULL,
  PRIMARY KEY (`id_online`),
  INDEX `fk_online_user1_idx` (`fkey_user` ASC) ,
  CONSTRAINT `fk_online_user1`
    FOREIGN KEY (`fkey_user`)
    REFERENCES `user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `user_room`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_room` (
  `id_user_room` INT NOT NULL AUTO_INCREMENT,
  `favorite_user_room` TINYINT NULL,
  `fkey_room_id` INT NOT NULL,
  `fkey_user_id` INT NOT NULL,
  INDEX `fk_favorite_room1_idx` (`fkey_room_id` ASC) ,
  INDEX `fk_favorite_user1_idx` (`fkey_user_id` ASC) ,
  PRIMARY KEY (`id_user_room`),
  CONSTRAINT `fk_favorite_room1`
    FOREIGN KEY (`fkey_room_id`)
    REFERENCES `room` (`id_room`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_favorite_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` INT NOT NULL AUTO_INCREMENT,
  `name_status` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id_status`),
  UNIQUE INDEX `name_status_UNIQUE` (`name_status` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `user_right`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_right` (
  `id_user_right` INT NOT NULL AUTO_INCREMENT,
  `date_authorized_user_right` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fkey_status_id` INT NOT NULL,
  `fkey_user_id` INT NOT NULL,
  INDEX `fk_user_right_status1_idx` (`fkey_status_id` ASC) ,
  PRIMARY KEY (`id_user_right`),
  INDEX `fk_user_right_user1_idx` (`fkey_user_id` ASC) ,
  CONSTRAINT `fk_user_right_status1`
    FOREIGN KEY (`fkey_status_id`)
    REFERENCES `status` (`id_status`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_right_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `help`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `help` (
  `id_help` INT NOT NULL AUTO_INCREMENT,
  `mail_help` VARCHAR(120) NOT NULL,
  `nickname_help` VARCHAR(80) NOT NULL,
  `subject_help` VARCHAR(120) NOT NULL,
  `content_help` TINYTEXT NOT NULL,
  PRIMARY KEY (`id_help`),
  UNIQUE INDEX `mail_UNIQUE` (`mail_help` ASC) ,
  UNIQUE INDEX `nickname_UNIQUE` (`nickname_help` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `img`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `img` (
  `id_img` INT NOT NULL AUTO_INCREMENT,
  `name_img` VARCHAR(40) NOT NULL,
  `active_img` TINYINT NULL,
  `date_img` TIMESTAMP NULL,
  PRIMARY KEY (`id_img`),
  UNIQUE INDEX `name_img_UNIQUE` (`name_img` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` INT NOT NULL AUTO_INCREMENT,
  `name_category` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE INDEX `name_category_UNIQUE` (`name_category` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reported`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reported` (
  `id_reported` INT NOT NULL AUTO_INCREMENT,
  `inquiry_reported` TINYTEXT NULL,
  `fkey_category_id` INT NOT NULL,
  `fkey_message_id` INT NOT NULL,
  PRIMARY KEY (`id_reported`),
  INDEX `fk_reported_category1_idx` (`fkey_category_id` ASC) ,
  INDEX `fk_reported_message1_idx` (`fkey_message_id` ASC) ,
  CONSTRAINT `fk_reported_category1`
    FOREIGN KEY (`fkey_category_id`)
    REFERENCES `category` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reported_message1`
    FOREIGN KEY (`fkey_message_id`)
    REFERENCES `message` (`id_message`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` INT NOT NULL AUTO_INCREMENT,
  `name_role` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE INDEX `name_role_UNIQUE` (`name_role` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `user_has_img`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_has_img` (
  `user_has_img_id_user` INT NOT NULL,
  `user_has_img_id_img` INT NOT NULL,
  PRIMARY KEY (`user_has_img_id_user`, `user_has_img_id_img`),
  INDEX `fk_user_has_img_img1_idx` (`user_has_img_id_img` ASC) ,
  INDEX `fk_user_has_img_user1_idx` (`user_has_img_id_user` ASC) ,
  CONSTRAINT `fk_user_has_img_user1`
    FOREIGN KEY (`user_has_img_id_user`)
    REFERENCES `user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_img_img1`
    FOREIGN KEY (`user_has_img_id_img`)
    REFERENCES `img` (`id_img`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `role_has_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `role_has_user` (
  `role_has_user_id_role` INT NOT NULL,
  `role_has_user_id_user` INT NOT NULL,
  PRIMARY KEY (`role_has_user_id_role`, `role_has_user_id_user`),
  INDEX `fk_role_has_user_user1_idx` (`role_has_user_id_user` ASC) ,
  INDEX `fk_role_has_user_role1_idx` (`role_has_user_id_role` ASC) ,
  CONSTRAINT `fk_role_has_user_role1`
    FOREIGN KEY (`role_has_user_id_role`)
    REFERENCES `role` (`id_role`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_role_has_user_user1`
    FOREIGN KEY (`role_has_user_id_user`)
    REFERENCES `user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
