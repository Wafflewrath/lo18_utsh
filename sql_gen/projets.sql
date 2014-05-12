-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 12 Mai 2014 à 09:34
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
-- Structure de la table `projets`
--

CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(35) NOT NULL,
  `nomcomplet` varchar(50) DEFAULT NULL,
  `datecreation` datetime NOT NULL,
  `texte` mediumtext NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `etat` int(11) NOT NULL,
  `visibilite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`id`, `nom`, `nomcomplet`, `datecreation`, `texte`, `url`, `etat`, `visibilite`) VALUES
(1, 'HOMTECH', 'Sciences de l’HOMme en univers TECHnologique', '2014-05-12 00:00:00', 'Redaction de la description en cours', 'http://urlvershommetech.com', 1, 1),
(2, 'Projet Séminaire et Colloque', 'La relation technique/vivant en agriculture', '2014-05-12 00:00:00', '', NULL, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
