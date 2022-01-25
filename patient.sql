-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 jan. 2022 à 09:40
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cabient`
--

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `nom_p` varchar(255) COLLATE utf8_bin NOT NULL,
  `prenom_p` varchar(255) COLLATE utf8_bin NOT NULL,
  `dateNaissance_p` date DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email_p` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `maladie` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_p`),
  KEY `id_doctor` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id_p`, `nom_p`, `prenom_p`, `dateNaissance_p`, `tel`, `email_p`, `maladie`, `id`) VALUES
(3, 'ahmed', 'lambaraa', '2000-04-12', '654321276', 'kadi@gmail.com', 'dentiste', 4),
(4, 'taha', 'lambaraa', '2000-04-12', '654321276', 'mohssine@gmail.Com', 'lhla9m', 2),
(5, 'salah', 'lambaraa', '2000-04-12', '654321276', 'salah@gmail.Com', 'lwadnin', 3),
(6, 'ali', 'lambaraa', '2000-04-12', '654321276', 'ali@gmail.Com', 'l9alb', 4),
(7, 'fdfd', 'gdgdgd', NULL, '2343435', 'dfdfd', 'cdcd', 1),
(8, 'fvfvf', 'fdf', '2022-01-30', '5836537', 'ADGHSDSDGS', 'JSHFSUHSYUF', 1),
(9, 'fvfvf', 'fdf', '2022-01-30', '5836537', 'ADGHSDSDGS', 'JSHFSUHSYUF', 1),
(10, 'dddd', 'ddd', '2022-01-11', '655555', 'ssff', 'etetet', 1),
(11, 'aaa', 'aaa', '2022-01-11', '546545', 'aaa', 'aaa', 1),
(12, 'ERER', 'ERER', '2022-01-04', '242424', 'ERERER', 'zezeze', 3),
(13, 'efe', 'eee', '2022-01-20', '6060606', 'DEE', 'aaa', 2),
(14, 'saaaaaaaaaid', 'saiiiid', '2012-01-10', '652086766', 'kadi@gmail.com', 'dentiste', 1),
(15, 'DFD', 'DFDF', '2021-12-31', '07070707', 'FEFEF', 'FEFEFEF', 3),
(16, 'DBFFG', 'DGDG', '2022-01-22', 'GDGDG', 'GDGD', 'GDGD', 2),
(21, 'zdzdzd', 'dzdzd', '2022-01-09', 'dzd', 'dzd', 'zdz', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
