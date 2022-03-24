-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 juil. 2021 à 11:03
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tweet_aca`
--

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `id_followed` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  `status_follow` tinyint(4) NOT NULL DEFAULT '1',
  KEY `fk_follow_user2_idx` (`id_follower`),
  KEY `fk_follow_user1_idx` (`id_followed`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hashtags`
--

DROP TABLE IF EXISTS `hashtags`;
CREATE TABLE IF NOT EXISTS `hashtags` (
  `id_hash` int(11) NOT NULL AUTO_INCREMENT,
  `nom_hash` int(11) NOT NULL,
  PRIMARY KEY (`id_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_nom` varchar(50) NOT NULL,
  `img_taille` varchar(25) NOT NULL,
  `img_type` varchar(25) NOT NULL,
  `img_desc` varchar(100) NOT NULL,
  `img_blob` blob NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date_d'envoie` datetime NOT NULL,
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

DROP TABLE IF EXISTS `tweet`;
CREATE TABLE IF NOT EXISTS `tweet` (
  `id_tweet` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `content_tweet` varchar(140) DEFAULT NULL,
  `date_tweet` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_tweet` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tweet`),
  KEY `fk_tweet_user1_idx` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Sexe` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `Sexe`, `nom`, `prenom`, `pseudo`, `date_naissance`, `email`, `password`, `date_inscription`) VALUES
(1, '', 'yousefi', 'karl', 'LeBleu', '2000-10-26', 'karl@gmail.com', '$2y$10$7mzWtIdpuMmVZOnKIBe2zeuaiI3h54LrkoDjgK/jdmTUnYd4.UsNu', '2021-07-27 06:57:08'),
(5, '', 'masson', 'christopher', 'chrissisi', '1998-02-17', 'chris@gmail.com', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '2021-07-29 11:30:04'),
(7, '', 'KASHANI-SAFFAR', 'Nojane', 'Njsr', '1998-08-17', 'njsr@outlook.fr', '2a0bbdfdfd15474471900c1eeeb09c22d762b9f7', '2021-07-30 11:13:00'),
(11, 'Autre', 'Larsanov', 'Daoud', 'Le bg', '2001-09-28', 'Daoud@bg.world', '80f87c8847da6c872ce2fc9fec0a98a73ebc578d', '2021-07-30 12:59:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;