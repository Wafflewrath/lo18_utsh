-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 25 Juin 2014 à 22:09
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
  `date` date NOT NULL,
  `nomreunion` varchar(35) NOT NULL,
  `contenu` mediumtext NOT NULL,
  `lieu` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `universite` enum('utc','utt','utbm','iplb') COLLATE utf8_bin NOT NULL,
  `mail` varchar(30) COLLATE utf8_bin NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(80) COLLATE utf8_bin NOT NULL,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `contenuresume` text COLLATE utf8_bin NOT NULL,
  `datecreation` date NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE IF NOT EXISTS `presentation` (
  `textPresentation` text COLLATE utf8_bin NOT NULL,
  `TextAccueil` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

CREATE TABLE IF NOT EXISTS `ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(40) NOT NULL,
  `datecreation` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `ressource_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Gère les ressources' AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Structure de la table `siteprivilege`
--

CREATE TABLE IF NOT EXISTS `siteprivilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nompriviliege` varchar(25) NOT NULL,
  `priv_id` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`fk_user`),
  KEY `priv_id` (`priv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_ressources`
--

CREATE TABLE IF NOT EXISTS `type_ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ressource` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `news_ressources`
--
ALTER TABLE `news_ressources`
  ADD CONSTRAINT `news_ressources_ibfk_1` FOREIGN KEY (`news`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `news_ressources_ibfk_2` FOREIGN KEY (`ressource`) REFERENCES `ressources` (`id`);

--
-- Contraintes pour la table `projets_ressources`
--
ALTER TABLE `projets_ressources`
  ADD CONSTRAINT `projets_ressources_ibfk_1` FOREIGN KEY (`projet`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `projets_ressources_ibfk_2` FOREIGN KEY (`ressource`) REFERENCES `ressources` (`id`);

--
-- Contraintes pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD CONSTRAINT `ressources_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type_ressources` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
