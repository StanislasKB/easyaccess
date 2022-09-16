-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 16 sep. 2022 à 20:59
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
-- Structure de la table `citation`
--

DROP TABLE IF EXISTS `citation`;
CREATE TABLE IF NOT EXISTS `citation` (
  `id_citation` int NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `url_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_citation`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `citation`
--

INSERT INTO `citation` (`id_citation`, `auteur`, `texte`, `url_image`) VALUES
(1, 'Nelson Mandela', 'L\'éducation est l\'arme la plus puissante pour changer le monde', 'mandela.jpg'),
(2, 'Victor Hugo', 'Chaque enfant qu’on enseigne est un homme qu’on gagne', 'hugo.jpeg'),
(4, 'Michael Jordan', 'Si tu abandonnes une fois, cela peut devenir une habitude. N\'abandonne jamais.', 'jordan.jpeg'),
(5, 'Henry Ford', 'Les obstacles sont ces choses effrayantes que vous apercevez lorsque vous détournez les yeux de vos objectifs.', 'henry.jpg'),
(6, 'Henry Ford', 'L\'échec n\'est qu\'une opportunité pour recommencer la même chose plus intelligemment.', 'henry.jpg'),
(7, 'Napoléon Hill', 'Notre esprit n\'a pour limite que celles que nous lui reconnaissons', 'hill.jpg');

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
  `url_corrige` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_corriges`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `corriges`
--

INSERT INTO `corriges` (`id_corriges`, `id_epreuve`, `libelle`, `id_user`, `url_corrige`, `etat`) VALUES
(1, 7, 'CEG Djougou', 1, '1663068341businessCard.pdf', 0),
(2, 9, 'Deuxième devoir du Premier semestre CEG Calavi-2021-2022', 1, '1663071170qt-bases.pdf', 1),
(3, 10, 'Deuxième devoir du Premier semestre CEG Calavi-2010-2011', 1, '16630740051663067996AnglaisQuatrième MC.pdf', 1);

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
  `nbrTelecharger` int NOT NULL DEFAULT '0',
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_epreuve`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `epreuves`
--

INSERT INTO `epreuves` (`id_epreuve`, `id_user`, `id_matiere`, `id_classe`, `libelle`, `url`, `nbrTelecharger`, `etat`, `createdAt`) VALUES
(1, 2, 9, 4, 'Premier devoir du premier semestre', 'jkhjkk', 5, 1, '0000-00-00 00:00:00'),
(11, 1, 4, 5, 'CEG Djougou', '1663072489AnglaisTroisième MC', 0, 0, '2022-09-13 13:34:49'),
(10, 1, 4, 10, 'Deuxième devoir du Premier semestre CEG Calavi-2010-2011', '1663072102AnglaisSeconde C', 16, 1, '2022-09-13 13:28:22');

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
  `id_classe` int NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_forum`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id_forum`, `auteur`, `question`, `description`, `id_classe`, `createdAt`) VALUES
(1, 1, 'Problème maths', 'Bienvenu ne voit pas en maths. Que faire ?', 0, '2022-09-13 14:53:16'),
(2, 1, 'aaa', 'rrrr', 4, '2022-09-16 17:12:29');

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `id_forum`, `id_user`, `contenu_message`, `piece`, `sendAt`) VALUES
(1, 1, 1, 'sxedf', NULL, '2022-09-13 00:00:00'),
(2, 1, 1, 'gege', NULL, '2022-09-13 00:00:00'),
(3, 1, 1, NULL, '1663078572.jpg', '2022-09-13 15:16:12'),
(4, 1, 1, NULL, '1663078615.png', '2022-09-13 15:16:55'),
(5, 1, 1, NULL, '1663078690.png', '2022-09-13 15:18:10'),
(6, 1, 1, NULL, '1663078709.jpg', '2022-09-13 15:18:29'),
(7, 1, 1, NULL, '1663079068.jpg', '2022-09-13 15:24:28'),
(8, 1, 1, NULL, '1663079718.jpg', '2022-09-13 15:35:18'),
(9, 1, 1, NULL, '1663080797.jpg', '2022-09-13 15:53:17'),
(10, 1, 1, NULL, '1663080992.png', '2022-09-13 15:56:32'),
(11, 1, 1, NULL, '1663081048.pdf', '2022-09-13 15:57:28'),
(12, 1, 1, NULL, '1663081074.pdf', '2022-09-13 15:57:54'),
(13, 1, 1, NULL, '1663081096.png', '2022-09-13 15:58:16'),
(14, 1, 1, NULL, '1663081276.jpg', '2022-09-13 16:01:16'),
(15, 1, 1, NULL, '1663081324.png', '2022-09-13 16:02:04'),
(16, 1, 1, NULL, '1663081457.png', '2022-09-13 16:04:17'),
(17, 1, 1, NULL, '1663081465.png', '2022-09-13 16:04:25'),
(18, 2, 1, 'ddeerfg', NULL, '2022-09-16 00:00:00'),
(19, 2, 1, 'dfrgrgfr', NULL, '2022-09-16 00:00:00'),
(20, 2, 1, 'ttbgfbfd', NULL, '2022-09-16 00:00:00'),
(21, 2, 1, 'bref', NULL, '2022-09-16 00:00:00'),
(22, 2, 1, NULL, '1663343191.jpg', '2022-09-16 21:16:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `telechargements`
--

INSERT INTO `telechargements` (`id_telecharge`, `id_user`, `id_epreuve`) VALUES
(1, 1, 10),
(2, 1, 10),
(3, 1, 10),
(4, 1, 10),
(5, 1, 10),
(6, 1, 10),
(7, 1, 10);

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
  `url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT '1.png',
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `mot_pass`, `Roles`, `profession`, `url`, `date_inscription`) VALUES
(1, 'Bayord', 'Stanislas', 'evayanki@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'ecolier', '1.png', '2022-08-13'),
(2, 'Bayord', 'stanislas', 'stanislasbayord@200gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'eleve', '1.png', '2022-08-14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
