-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : jeu. 25 mars 2021 à 12:15
-- Version du serveur :  10.5.4-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gabbler`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_category` varchar(25) NOT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `name_category_UNIQUE` (`name_category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'insult'),
(3, 'other'),
(2, 'rascism'),
(4, 'sexual harassment');

-- --------------------------------------------------------

--
-- Structure de la table `help`
--

DROP TABLE IF EXISTS `help`;
CREATE TABLE IF NOT EXISTS `help` (
  `id_help` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mail_help` varchar(120) NOT NULL,
  `nickname_help` varchar(80) NOT NULL,
  `subject_help` varchar(120) NOT NULL,
  `content_help` tinytext NOT NULL,
  `processed_help` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1 => not response\n2 => response\n3 => closed',
  `user_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Admin user id',
  PRIMARY KEY (`id_help`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `help`
--

INSERT INTO `help` (`id_help`, `mail_help`, `nickname_help`, `subject_help`, `content_help`, `processed_help`, `user_id`) VALUES
(1, 'test@test.be', 'Gabbler', 'Can you help me ?', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', 1, NULL),
(2, 'help@help.com', 'Gamer3', 'I need help', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\\\'avantage du Lorem Ipsum sur un texte générique comme \\\'Du texte.', 2, NULL),
(3, 'help@help.com', 'Gamer456', 'I need help', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même.', 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

DROP TABLE IF EXISTS `img`;
CREATE TABLE IF NOT EXISTS `img` (
  `id_img` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_img` varchar(40) NOT NULL,
  `active_img` tinyint(3) UNSIGNED DEFAULT 2 COMMENT '1 => archived\n2 => actived\n3 => illegal',
  `date_img` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_img`),
  UNIQUE KEY `name_img_UNIQUE` (`name_img`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `img`
--

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

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_message` timestamp NOT NULL DEFAULT current_timestamp(),
  `content_message` tinytext NOT NULL,
  `archived_message` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => Not archived\n2 => Archived',
  `fkey_user_id` int(10) UNSIGNED NOT NULL,
  `fkey_room_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `fk_message_user1_idx` (`fkey_user_id`),
  KEY `fk_message_room1_idx` (`fkey_room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `date_message`, `content_message`, `archived_message`, `fkey_user_id`, `fkey_room_id`) VALUES
(1, '2021-03-23 14:14:08', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 1, 5, 1),
(2, '2021-03-23 14:14:08', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 6, 4),
(3, '2021-03-23 14:15:12', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born', 2, 5, 2),
(4, '2021-03-23 14:15:12', 'No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know', 2, 6, 3);

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

DROP TABLE IF EXISTS `online`;
CREATE TABLE IF NOT EXISTS `online` (
  `id_online` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `last_activity_online` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `connected_online` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 => not connected\n2 => online',
  `fkey_user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_online`),
  KEY `fk_online_user1_idx` (`fkey_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `online`
--

INSERT INTO `online` (`id_online`, `last_activity_online`, `connected_online`, `fkey_user_id`) VALUES
(1, '2021-03-23 14:15:53', 2, 5),
(2, '2021-03-23 14:15:53', 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `reported`
--

DROP TABLE IF EXISTS `reported`;
CREATE TABLE IF NOT EXISTS `reported` (
  `id_reported` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `inquiry_reported` tinytext DEFAULT NULL,
  `processed_reported` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => not processed\n2 => processed',
  `fkey_category_id` int(10) UNSIGNED NOT NULL,
  `fkey_message_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_reported`),
  KEY `fk_reported_category1_idx` (`fkey_category_id`),
  KEY `fk_reported_message1_idx` (`fkey_message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reported`
--

INSERT INTO `reported` (`id_reported`, `inquiry_reported`, `processed_reported`, `fkey_category_id`, `fkey_message_id`) VALUES
(1, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire', 1, 1, 1),
(2, 'that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will', 1, 2, 2),
(3, 'which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish', 2, 3, 3),
(4, 'In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best', 2, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_role` varchar(25) NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `name_role_UNIQUE` (`name_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Admin'),
(2, 'Moderator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_user`
--

DROP TABLE IF EXISTS `role_has_user`;
CREATE TABLE IF NOT EXISTS `role_has_user` (
  `role_has_user_id_role` int(10) UNSIGNED NOT NULL,
  `role_has_user_id_user` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_has_user_id_role`,`role_has_user_id_user`),
  KEY `fk_role_has_user_user1_idx` (`role_has_user_id_user`),
  KEY `fk_role_has_user_role1_idx` (`role_has_user_id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role_has_user`
--

INSERT INTO `role_has_user` (`role_has_user_id_role`, `role_has_user_id_user`) VALUES
(1, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id_room` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `public_room` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1 => public\n2 => private',
  `archived_room` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => Not archived\n2 => Archived',
  `name_room` varchar(25) NOT NULL,
  `last_activity_room` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_room`),
  UNIQUE KEY `name_room_UNIQUE` (`name_room`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id_room`, `public_room`, `archived_room`, `name_room`, `last_activity_room`) VALUES
(1, 1, 1, 'general', '2021-03-23 09:02:46'),
(2, 1, 1, 'cinema', '2021-03-23 09:02:49'),
(3, 1, 1, 'music', '2021-03-22 09:02:49'),
(4, 1, 1, 'foodlovers', '2021-03-23 15:21:12');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_status` varchar(25) NOT NULL,
  PRIMARY KEY (`id_status`),
  UNIQUE KEY `name_status_UNIQUE` (`name_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id_status`, `name_status`) VALUES
(1, 'active'),
(3, 'banned'),
(2, 'suspended'),
(4, 'waiting for validation');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nickname_user` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pwd_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mail_user` varchar(120) NOT NULL,
  `signup_date_user` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'When confirmation is ok',
  `color_user` varchar(45) NOT NULL,
  `confirmation_key_user` varchar(60) NOT NULL,
  `validation_status_user` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1 => not mail validate\n2 => mail validate',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `nickname_user_UNIQUE` (`nickname_user`),
  UNIQUE KEY `mail_user_UNIQUE` (`mail_user`),
  UNIQUE KEY `confirmation_key_user_UNIQUE` (`confirmation_key_user`),
  UNIQUE KEY `pwd_user_UNIQUE` (`pwd_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nickname_user`, `pwd_user`, `mail_user`, `signup_date_user`, `color_user`, `confirmation_key_user`, `validation_status_user`) VALUES
(5, 'Johnny', '$2y$10$X6Lu7QpJSxki2.wXAaxSteav1fTVWr/uYqnq9cFMbAo1U/vSXGtjm', 'admin@test.com', '2020-09-17 10:17:51', '{\"background\":\"#2ec4b6\",\"color\":\"#fdfffc\"}', 'acd147d11882e3ea05e3229e7935768e', 1),
(6, 'Marylin', '$2y$10$vCj/d6P6EfJxSRzX4iN7y.jprp.6K0M4KSvo75JcLg3OTNuf/gmni', 'user@test.com', '2020-09-17 10:17:51', '{\"background\":\"#f6f6f6\",\"color\":\"#505352\"}', 'b32eda8047fc109444d81adf9a28308d', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_has_img`
--

DROP TABLE IF EXISTS `user_has_img`;
CREATE TABLE IF NOT EXISTS `user_has_img` (
  `user_has_img_id_user` int(10) UNSIGNED NOT NULL,
  `user_has_img_id_img` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_has_img_id_user`,`user_has_img_id_img`),
  KEY `fk_user_has_img_img1_idx` (`user_has_img_id_img`),
  KEY `fk_user_has_img_user1_idx` (`user_has_img_id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_has_img`
--

INSERT INTO `user_has_img` (`user_has_img_id_user`, `user_has_img_id_img`) VALUES
(5, 8),
(6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_right`
--

DROP TABLE IF EXISTS `user_right`;
CREATE TABLE IF NOT EXISTS `user_right` (
  `id_user_right` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_authorized_user_right` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fkey_status_id` int(10) UNSIGNED NOT NULL,
  `fkey_user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_user_right`),
  KEY `fk_user_right_status1_idx` (`fkey_status_id`),
  KEY `fk_user_right_user1_idx` (`fkey_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_right`
--

INSERT INTO `user_right` (`id_user_right`, `date_authorized_user_right`, `fkey_status_id`, `fkey_user_id`) VALUES
(1, '2021-03-23 14:19:39', 1, 5),
(2, '2021-03-23 14:19:39', 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `user_room`
--

DROP TABLE IF EXISTS `user_room`;
CREATE TABLE IF NOT EXISTS `user_room` (
  `id_user_room` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `favorite_user_room` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1 => not favorite\n2 => favorite',
  `fkey_room_id` int(10) UNSIGNED NOT NULL,
  `fkey_user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_user_room`),
  KEY `fk_favorite_room1_idx` (`fkey_room_id`),
  KEY `fk_favorite_user1_idx` (`fkey_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_room`
--

INSERT INTO `user_room` (`id_user_room`, `favorite_user_room`, `fkey_room_id`, `fkey_user_id`) VALUES
(1, 1, 1, 6),
(2, 2, 4, 5);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_room1` FOREIGN KEY (`fkey_room_id`) REFERENCES `room` (`id_room`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_user1` FOREIGN KEY (`fkey_user_id`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `online`
--
ALTER TABLE `online`
  ADD CONSTRAINT `fk_online_user1` FOREIGN KEY (`fkey_user_id`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reported`
--
ALTER TABLE `reported`
  ADD CONSTRAINT `fk_reported_category1` FOREIGN KEY (`fkey_category_id`) REFERENCES `category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reported_message1` FOREIGN KEY (`fkey_message_id`) REFERENCES `message` (`id_message`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `role_has_user`
--
ALTER TABLE `role_has_user`
  ADD CONSTRAINT `fk_role_has_user_role1` FOREIGN KEY (`role_has_user_id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role_has_user_user1` FOREIGN KEY (`role_has_user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_img`
--
ALTER TABLE `user_has_img`
  ADD CONSTRAINT `fk_user_has_img_img1` FOREIGN KEY (`user_has_img_id_img`) REFERENCES `img` (`id_img`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_img_user1` FOREIGN KEY (`user_has_img_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_right`
--
ALTER TABLE `user_right`
  ADD CONSTRAINT `fk_user_right_status1` FOREIGN KEY (`fkey_status_id`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_right_user1` FOREIGN KEY (`fkey_user_id`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_room`
--
ALTER TABLE `user_room`
  ADD CONSTRAINT `fk_favorite_room1` FOREIGN KEY (`fkey_room_id`) REFERENCES `room` (`id_room`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_favorite_user1` FOREIGN KEY (`fkey_user_id`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
