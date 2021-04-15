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
  `public_room` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => public\n2 => private',
  `archived_room` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => Not archived\n2 => Archived',
  `name_room` VARCHAR(25) NOT NULL,
  `last_activity_room` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `validation_status_user` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => not mail validate\n2 => mail validate',
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
  `content_message` TEXT NOT NULL,
  `archived_message` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => Not archived\n2 => Archived',
  `fkey_user_id` INT UNSIGNED NULL,
  `fkey_room_id` INT UNSIGNED NULL,
  PRIMARY KEY (`id_message`),
  CONSTRAINT `fk_message_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_room1`
    FOREIGN KEY (`fkey_room_id`)
    REFERENCES `gabbler`.`room` (`id_room`)
    ON DELETE SET NULL
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
  `connected_online` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '1 => not connected\n2 => online',
  `fkey_user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_online`),
  CONSTRAINT `fk_online_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_online_user1_idx` ON `gabbler`.`online` (`fkey_user_id` ASC);


-- -----------------------------------------------------
-- Table `gabbler`.`user_room`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`user_room` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`user_room` (
  `id_user_room` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `favorite_user_room` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => not favorite\n2 => favorite',
  `fkey_room_id` INT UNSIGNED NOT NULL,
  `fkey_user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_user_room`),
  CONSTRAINT `fk_favorite_room1`
    FOREIGN KEY (`fkey_room_id`)
    REFERENCES `gabbler`.`room` (`id_room`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_favorite_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE CASCADE
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
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_right_user1`
    FOREIGN KEY (`fkey_user_id`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE CASCADE
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
  `processed_help` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => not response\n2 => response\n3 => closed',
  `date_help` TIMESTAMP NULL DEFAULT NOW(),
  `user_id` INT UNSIGNED NULL COMMENT 'Admin user id',
  `helpcol` VARCHAR(45) NULL,
  PRIMARY KEY (`id_help`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gabbler`.`img`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gabbler`.`img` ;

CREATE TABLE IF NOT EXISTS `gabbler`.`img` (
  `id_img` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_img` VARCHAR(40) NOT NULL,
  `active_img` TINYINT UNSIGNED NOT NULL DEFAULT 2 COMMENT '1 => archived\n2 => actived\n3 => illegal',
  `date_img` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `date_reported` TIMESTAMP NULL DEFAULT NOW(),
  `fkey_category_id` INT UNSIGNED NOT NULL,
  `fkey_message_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_reported`),
  CONSTRAINT `fk_reported_category1`
    FOREIGN KEY (`fkey_category_id`)
    REFERENCES `gabbler`.`category` (`id_category`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reported_message1`
    FOREIGN KEY (`fkey_message_id`)
    REFERENCES `gabbler`.`message` (`id_message`)
    ON DELETE CASCADE
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
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_img_img1`
    FOREIGN KEY (`user_has_img_id_img`)
    REFERENCES `gabbler`.`img` (`id_img`)
    ON DELETE CASCADE
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
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_role_has_user_user1`
    FOREIGN KEY (`role_has_user_id_user`)
    REFERENCES `gabbler`.`user` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_role_has_user_user1_idx` ON `gabbler`.`role_has_user` (`role_has_user_id_user` ASC);

CREATE INDEX `fk_role_has_user_role1_idx` ON `gabbler`.`role_has_user` (`role_has_user_id_role` ASC);


--
-- DATAS
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'insult'),
(3, 'other'),
(2, 'rascism'),
(4, 'sexual harassment');



INSERT INTO `help` (`id_help`, `mail_help`, `nickname_help`, `subject_help`, `content_help`, `processed_help`, `user_id`) VALUES
(1, 'test@test.be', 'Gabbler', 'Can you help me ?', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', 1, NULL),
(2, 'help@help.com', 'Gamer3', 'I need help', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\\\'avantage du Lorem Ipsum sur un texte générique comme \\\'Du texte.', 2, NULL),
(3, 'help@help.com', 'Gamer456', 'I need help', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même.', 3, NULL);



INSERT INTO `img` (`id_img`, `name_img`, `active_img`, `date_img`) VALUES
(1, 'https://via.placeholder.com/150/FFFFFF', 2, '2021-03-18 14:29:32'),
(2, 'https://via.placeholder.com/150/bcebcb', 2, '2021-03-23 08:38:51'),
(3, 'https://via.placeholder.com/150/ffae03', 2, '2021-03-23 08:38:51'),
(4, 'https://via.placeholder.com/150/af8d86', 2, '2021-03-23 08:40:59'),
(5, 'https://via.placeholder.com/150/3da35d', 2, '2021-03-23 08:40:59'),
(6, 'https://via.placeholder.com/150/a63a50', 2, '2021-03-23 08:42:19'),
(7, 'https://via.placeholder.com/150/388697', 2, '2021-03-23 08:42:19'),
(8, 'https://via.placeholder.com/150/38040e', 2, '2021-03-23 08:43:15'),
(9, 'https://via.placeholder.com/150/f26419', 2, '2021-03-23 08:43:15'),
(10, 'https://via.placeholder.com/150/ef798a', 2, '2021-03-23 08:44:40'),
(11, 'https://via.placeholder.com/150/613f75', 2, '2021-03-23 08:44:40'),
(12, 'https://via.placeholder.com/150/988b8e', 2, '2021-03-23 08:45:07');



INSERT INTO `message` (`id_message`, `date_message`, `content_message`, `archived_message`, `fkey_user_id`, `fkey_room_id`) VALUES
(1, '2021-03-23 14:14:08', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 1, 5, 1),
(2, '2021-03-23 14:14:08', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 6, 4),
(3, '2021-03-23 14:15:12', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born', 2, 5, 2),
(4, '2021-03-23 14:15:12', 'No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know', 2, 6, 3);



INSERT INTO `online` (`id_online`, `last_activity_online`, `connected_online`, `fkey_user_id`) VALUES
(1, '2021-03-23 14:15:53', 2, 5),
(2, '2021-03-23 14:15:53', 1, 6);




INSERT INTO `reported` (`id_reported`, `inquiry_reported`, `processed_reported`, `fkey_category_id`, `fkey_message_id`) VALUES
(1, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire', 1, 1, 1),
(2, 'that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will', 1, 2, 2),
(3, 'which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish', 2, 3, 3),
(4, 'In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best', 2, 4, 4);

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Admin'),
(2, 'Moderator'),
(3, 'User');

INSERT INTO `role_has_user` (`role_has_user_id_role`, `role_has_user_id_user`) VALUES
(1, 5),
(3, 6);

INSERT INTO `room` (`id_room`, `public_room`, `archived_room`, `name_room`, `last_activity_room`) VALUES
(1, 1, 1, 'general', '2021-03-23 09:02:46'),
(2, 1, 1, 'cinema', '2021-03-23 09:02:49'),
(3, 1, 1, 'music', '2021-03-22 09:02:49'),
(4, 1, 1, 'foodlovers', '2021-03-23 15:21:12');

INSERT INTO `status` (`id_status`, `name_status`) VALUES
(1, 'active'),
(3, 'banned'),
(2, 'suspended'),
(4, 'waiting for validation');

INSERT INTO `user` (`id_user`, `nickname_user`, `pwd_user`, `mail_user`, `signup_date_user`, `color_user`, `confirmation_key_user`, `validation_status_user`) VALUES
(5, 'Johnny', '$2y$10$X6Lu7QpJSxki2.wXAaxSteav1fTVWr/uYqnq9cFMbAo1U/vSXGtjm', 'admin@test.com', '2020-09-17 10:17:51', '{\"background\":\"#2ec4b6\",\"color\":\"#fdfffc\"}', 'acd147d11882e3ea05e3229e7935768e', 1),
(6, 'Marylin', '$2y$10$vCj/d6P6EfJxSRzX4iN7y.jprp.6K0M4KSvo75JcLg3OTNuf/gmni', 'user@test.com', '2020-09-17 10:17:51', '{\"background\":\"#f6f6f6\",\"color\":\"#505352\"}', 'b32eda8047fc109444d81adf9a28308d', 1);

INSERT INTO `user_has_img` (`user_has_img_id_user`, `user_has_img_id_img`) VALUES
(5, 8),
(6, 2);

INSERT INTO `user_right` (`id_user_right`, `date_authorized_user_right`, `fkey_status_id`, `fkey_user_id`) VALUES
(1, '2021-03-23 14:19:39', 1, 5),
(2, '2021-03-23 14:19:39', 4, 6);

INSERT INTO `user_room` (`id_user_room`, `favorite_user_room`, `fkey_room_id`, `fkey_user_id`) VALUES
(1, 1, 1, 6),
(2, 2, 4, 5);



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
