-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : jeu. 17 sep. 2020 à 08:35
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

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

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'insult'),
(3, 'other'),
(2, 'rascism');

--
-- Déchargement des données de la table `help`
--

INSERT INTO `help` (`id_help`, `mail_help`, `nickname_help`, `subject_help`, `content_help`) VALUES
(1, 'hepl@test.com', 'Anonymous', 'Just one message', 'Goodbye !');

--
-- Déchargement des données de la table `img`
--

INSERT INTO `img` (`id_img`, `name_img`, `active_img`, `date_img`) VALUES
(1, 'https://via.placeholder.com/150', 1, '2020-09-17 08:03:51');

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `content_message`, `archived_message`, `fkey_user_id`, `fkey_room_id`) VALUES
(1, 'Hello !', 1, 5, 1),
(2, 'Hi.', 1, 6, 1),
(3, 'how are you ?', 1, 5, 1),
(4, 'fine and you ?', 1, 6, 1),
(5, 'I am a robot', 1, 5, 1),
(6, 'Okay. Bye.', 1, 6, 1);

--
-- Déchargement des données de la table `online`
--

INSERT INTO `online` (`id_online`, `connected_online`, `fkey_user`) VALUES
(1, 1, 6),
(2, 0, 5);

--
-- Déchargement des données de la table `reported`
--

INSERT INTO `reported` (`id_reported`, `inquiry_reported`, `fkey_category_id`, `fkey_message_id`) VALUES
(1, 'inappropriate message', 3, 5);

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Déchargement des données de la table `role_has_user`
--

INSERT INTO `role_has_user` (`role_has_user_id_role`, `role_has_user_id_user`) VALUES
(1, 5),
(2, 6);

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id_room`, `public_room`, `name_room`) VALUES
(1, 0, 'general');

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id_status`, `name_status`) VALUES
(3, 'banned'),
(2, 'not validated'),
(4, 'suspended'),
(1, 'validated');

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nickname_user`, `pwd_user`, `mail_user`, `signup_date_user`, `color_user`, `confirmation_key_user`, `validation_status_user`) VALUES
(5, 'John', '$2y$10$X6Lu7QpJSxki2.wXAaxSteav1fTVWr/uYqnq9cFMbAo1U/vSXGtjm', 'admin@test.com', '2020-09-17 10:17:51', '0, #DF2F5C', 'acd147d11882e3ea05e3229e7935768e', 1),
(6, 'Mary', '$2y$10$vCj/d6P6EfJxSRzX4iN7y.jprp.6K0M4KSvo75JcLg3OTNuf/gmni', 'user@test.com', '2020-09-17 10:17:51', '0, #FED167', 'b32eda8047fc109444d81adf9a28308d', 1);

--
-- Déchargement des données de la table `user_has_img`
--

INSERT INTO `user_has_img` (`user_has_img_id_user`, `user_has_img_id_img`) VALUES
(5, 1),
(6, 1);

--
-- Déchargement des données de la table `user_right`
--

INSERT INTO `user_right` (`id_user_right`, `fkey_status_id`, `fkey_user_id`) VALUES
(1, 2, 5),
(2, 1, 6);

--
-- Déchargement des données de la table `user_room`
--

INSERT INTO `user_room` (`id_user_room`, `favorite_user_room`, `fkey_room_id`, `fkey_user_id`) VALUES
(1, 1, 1, 6),
(2, 0, 1, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
