-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 12 Mai 2014 à 09:33
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `calendrier`
--

CREATE TABLE IF NOT EXISTS `calendrier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `nomreunion` varchar(35) NOT NULL,
  `contenu` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `calendrier`
--

INSERT INTO `calendrier` (`id`, `date`, `nomreunion`, `contenu`) VALUES
(1, '2014-05-14 00:00:00', ' Réunion commune de l’atelier de re', 'La réunion aura lieu à l’IMI, 62 Bd de Sébastopol, 75003 Paris, deuxième étage.\r\n\r\nOrdre du jour :\r\n\r\no   Rapport d’activité du GIS UTSH\r\n\r\no   Débat d’orientation\r\n\r\no   Réunion à huis clos du comité directeur et du bureau de direction'),
(2, '2014-07-01 00:00:00', 'Réunion de l’atelier de recherche', 'La réunion aura lieu à l’IMI, 62 Bd de Sébastopol, 75003 Paris, deuxième étage.\r\n\r\nOrdre du jour :\r\n\r\no   Vers un master inter-UT');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
