-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 26 Mars 2018 à 11:00
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `afric906412`
--
CREATE DATABASE IF NOT EXISTS `afric906412` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `afric906412`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`),
  UNIQUE KEY `tag` (`categorie_name`),
  KEY `user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie_name`, `user_id`) VALUES
(1, 'sport', 1),
(5, 'religion', 1),
(6, 'economie', 1),
(10, 'culture', 1),
(11, 'politique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` int(11) NOT NULL,
  `cover_event` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `img_server` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_event` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titre_event` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_post` datetime NOT NULL,
  `compte_a_rebours` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_event`),
  KEY `event_categorie_id_categorie_fk` (`tag_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id_event`, `tag_name`, `cover_event`, `img_server`, `date_event`, `titre_event`, `date_post`, `compte_a_rebours`) VALUES
(7, 1, 'CAKpZIdnwuNF3K1G6SXRp.jpg', 'bulksms.jpg', '2018-03-26 00:27:30', 'La finale de la CAN', '2018-03-12 00:39:26', 'compte_a_r'),
(8, 11, 'vSAru2zxsFO7Sqnnj0yyH.jpg', 'LOGO OMID-01-01.jpg', '2018-03-26 00:27:54', 'okoko oui', '2018-03-19 01:13:05', 'compte_a_r'),
(9, 1, '1M3xpQ1IPHd7t_kLqlgUL.jpg', 'sms-caster-e-marketer.jpg', '2018-03-26 00:28:05', 'Le match de l''année', '2018-03-27 19:55:07', 'compte_a_r');

-- --------------------------------------------------------

--
-- Structure de la table `live`
--

CREATE TABLE IF NOT EXISTS `live` (
  `id_live` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` int(11) NOT NULL,
  `live_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titre_live` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover_live` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_server` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_live`),
  KEY `live_categorie_id_categorie_fk` (`tag_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `live`
--

INSERT INTO `live` (`id_live`, `tag_name`, `live_link`, `titre_live`, `cover_live`, `img_server`) VALUES
(9, 6, 'https://www.youtube.com/embed/hL0sEdVJs3U', 'Débat économique', '80U9VekPsXL6Hs89MNP2C.jpg', 'bulksms.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `replay`
--

CREATE TABLE IF NOT EXISTS `replay` (
  `id_replay` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` int(11) NOT NULL,
  `poster` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `titre_video_replay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_server` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `date_post` datetime NOT NULL,
  PRIMARY KEY (`id_replay`),
  UNIQUE KEY `unique_poster` (`poster`),
  KEY `replay_categorie_id_categorie_fk` (`tag_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `replay`
--

INSERT INTO `replay` (`id_replay`, `tag_name`, `poster`, `titre_video_replay`, `video_link`, `img_server`, `date_post`) VALUES
(1, 11, '5d9ptMk7vsHD09LsTc4HB.png', 'kokokohgfjhv kvkhb', 'https://www.youtube.com/embed/7823x6xVXbE', 'ava.png', '2018-03-08 12:51:27'),
(2, 11, 'Jae0Wk6PKZqVY0V2YXAB_.jpg', 'Voila', 'https://www.youtube.com/embed/w2LUcGfZw64', 'sms-caster-e-marketer.jpg', '2018-03-23 12:51:49'),
(3, 6, '5INfrkr0Nai9FWGYZnNDw.png', 'L''economie', 'https://www.youtube.com/embed/ywlAMKcEUHY', 'send_sms-512.png', '2018-03-23 13:02:25');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `password_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password_user`) VALUES
(1, 'admin', 'ec3e2a9d920abf07f00acd84e6bbb908'),
(4, 'nabola', 'ec3e2a9d920abf07f00acd84e6bbb908'),
(5, 'momo', '*09F5F18AC2962D79470DFE86B6B9B2833C06F6BE'),
(6, 'Admins', '1db4e73019791160c6fa4168723ebb7b');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_t_user_id_user_fk` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id_user`);

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_categorie_id_categorie_fk` FOREIGN KEY (`tag_name`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `live`
--
ALTER TABLE `live`
  ADD CONSTRAINT `live_categorie_id_categorie_fk` FOREIGN KEY (`tag_name`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `replay`
--
ALTER TABLE `replay`
  ADD CONSTRAINT `replay_categorie_id_categorie_fk` FOREIGN KEY (`tag_name`) REFERENCES `categorie` (`id_categorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
