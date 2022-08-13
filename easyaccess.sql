-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 13 août 2022 à 18:33
-- Version du serveur : 8.0.29
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `easyaccess`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id_classe` int NOT NULL AUTO_INCREMENT,
  `libelle_classe` varchar(255) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `libelle_classe`) VALUES
(1, 'Sixième'),
(2, 'Cinquième '),
(3, 'Quatrième MC'),
(4, 'Quatrième ML'),
(5, 'Troisième MC'),
(6, 'Troisième ML'),
(7, 'Seconde A1'),
(8, 'Seconde A2'),
(9, 'Seconde B'),
(10, 'Seconde C'),
(11, 'Seconde D'),
(12, 'Première A1'),
(13, 'Première A2'),
(14, 'Première B'),
(15, 'Première C'),
(16, 'Première D'),
(17, 'Terminale A1'),
(18, 'Terminale A2'),
(19, 'Terminale B'),
(20, 'Terminale C'),
(21, 'Terminale D'),
(22, 'BEPC MC'),
(23, 'BEPC ML'),
(24, 'BAC A1'),
(25, 'BAC A2'),
(26, 'BAC B'),
(27, 'BAC C'),
(28, 'BAC D');

-- --------------------------------------------------------

--
-- Structure de la table `corriges`
--

DROP TABLE IF EXISTS `corriges`;
CREATE TABLE IF NOT EXISTS `corriges` (
  `id_corriges` int NOT NULL AUTO_INCREMENT,
  `id_epreuve` int NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_corriges`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `epreuves`
--

DROP TABLE IF EXISTS `epreuves`;
CREATE TABLE IF NOT EXISTS `epreuves` (
  `id_epreuve` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_matiere` int NOT NULL,
  `id_classe` int NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `nbrTelecharger` int NOT NULL,
  PRIMARY KEY (`id_epreuve`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `epreuves`
--

INSERT INTO `epreuves` (`id_epreuve`, `id_user`, `id_matiere`, `id_classe`, `libelle`, `url`, `nbrTelecharger`) VALUES
(1, 2, 9, 4, 'Premier devoir du premier semestre', 'jkhjkk', 5),
(2, 2, 1, 1, 'Epreuve maths sixième', 'uljd', 2),
(3, 3, 2, 2, 'Epreuve PCT Cinquième', 'dd', 10);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id_forum` int NOT NULL AUTO_INCREMENT,
  `auteur` int NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_forum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `jeton`
--

DROP TABLE IF EXISTS `jeton`;
CREATE TABLE IF NOT EXISTS `jeton` (
  `id_jeton` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `point` int NOT NULL,
  PRIMARY KEY (`id_jeton`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

DROP TABLE IF EXISTS `jeu`;
CREATE TABLE IF NOT EXISTS `jeu` (
  `id_jeu` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `score` int NOT NULL,
  `playDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jeu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `matclasse`
--

DROP TABLE IF EXISTS `matclasse`;
CREATE TABLE IF NOT EXISTS `matclasse` (
  `id_classe` int NOT NULL,
  `id_matiere` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `matclasse`
--

INSERT INTO `matclasse` (`id_classe`, `id_matiere`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 1),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 8),
(4, 9),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(6, 1),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 8),
(6, 9),
(7, 1),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(8, 1),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(8, 7),
(8, 8),
(8, 9),
(9, 1),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(9, 8),
(9, 9),
(9, 10),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(12, 1),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(12, 9),
(13, 1),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(14, 1),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(14, 7),
(14, 8),
(14, 9),
(14, 10),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 6),
(15, 7),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(16, 7),
(17, 1),
(17, 3),
(17, 4),
(17, 5),
(17, 6),
(17, 7),
(17, 8),
(17, 9),
(18, 1),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(18, 8),
(18, 9),
(19, 1),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(19, 10),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(20, 6),
(20, 7),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(21, 6),
(21, 7),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(22, 6),
(23, 1),
(23, 3),
(23, 4),
(23, 5),
(23, 6),
(23, 8),
(23, 9),
(24, 1),
(24, 3),
(24, 4),
(24, 5),
(24, 6),
(24, 7),
(24, 8),
(24, 8),
(25, 1),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(25, 7),
(25, 8),
(25, 9),
(26, 1),
(26, 3),
(26, 4),
(26, 5),
(26, 6),
(26, 7),
(26, 8),
(26, 9),
(26, 10),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(27, 6),
(27, 7),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(28, 6),
(28, 7);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_matiere` int NOT NULL AUTO_INCREMENT,
  `libelle_matiere` varchar(255) NOT NULL,
  PRIMARY KEY (`id_matiere`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `libelle_matiere`) VALUES
(1, 'Mathématiques'),
(2, 'Physique Chimie et Technologie'),
(3, 'Sciences de la Vie et de la Terre'),
(4, 'Anglais'),
(5, 'Histoire et Géographie'),
(6, 'Français'),
(7, 'Philosophie'),
(8, 'Espagnol'),
(9, 'Allemand'),
(10, 'Economie');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `id_forum` int NOT NULL,
  `id_user` int NOT NULL,
  `contenu_message` text,
  `piece` varchar(255) DEFAULT NULL,
  `sendAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `telechargements`
--

DROP TABLE IF EXISTS `telechargements`;
CREATE TABLE IF NOT EXISTS `telechargements` (
  `id_telecharge` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_epreuve` int NOT NULL,
  PRIMARY KEY (`id_telecharge`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_pass` varchar(255) NOT NULL,
  `Roles` tinyint(1) NOT NULL DEFAULT '0',
  `profession` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `mot_pass`, `Roles`, `profession`, `url`, `date_inscription`) VALUES
(1, 'Bayord', 'Stanislas', 'evayanki@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'ecolier', '', '2022-08-13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
