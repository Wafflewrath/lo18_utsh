-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 05 Juin 2014 à 15:32
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Structure de la table `news_ressources`
--

CREATE TABLE IF NOT EXISTS `news_ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news` int(11) NOT NULL,
  `ressource` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news` (`news`,`ressource`),
  KEY `ressource` (`ressource`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `news_ressources`
--
ALTER TABLE `news_ressources`
  ADD CONSTRAINT `news_ressources_ibfk_2` FOREIGN KEY (`ressource`) REFERENCES `ressources` (`id`),
  ADD CONSTRAINT `news_ressources_ibfk_1` FOREIGN KEY (`news`) REFERENCES `news` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
