-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 04 Mai 2014 à 17:46
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
-- Structure de la table `projets_ressources`
--

CREATE TABLE IF NOT EXISTS `projets_ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projet` int(11) NOT NULL,
  `ressource` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projet` (`projet`),
  KEY `ressource` (`ressource`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `projets_ressources`
--

INSERT INTO `projets_ressources` (`id`, `projet`, `ressource`) VALUES
(1, 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `projets_ressources`
--
ALTER TABLE `projets_ressources`
  ADD CONSTRAINT `projets_ressources_ibfk_2` FOREIGN KEY (`ressource`) REFERENCES `ressources` (`id`),
  ADD CONSTRAINT `projets_ressources_ibfk_1` FOREIGN KEY (`projet`) REFERENCES `projets` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
