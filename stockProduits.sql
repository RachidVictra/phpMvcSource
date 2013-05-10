-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 10 Mai 2013 à 13:15
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `stockProduits`
--

-- --------------------------------------------------------

--
-- Structure de la table `famillesproduit`
--

CREATE TABLE IF NOT EXISTS `famillesproduit` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `famille` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `famillesproduit`
--

INSERT INTO `famillesproduit` (`id`, `famille`) VALUES
(1, 'Shampoing');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `designation` varchar(25) NOT NULL,
  `prixUnitaire` decimal(10,0) DEFAULT '0',
  `tva` decimal(3,2) DEFAULT NULL,
  `quantite` int(6) DEFAULT NULL,
  `idFamille` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `designation`, `prixUnitaire`, `tva`, `quantite`, `idFamille`) VALUES
(1, 'Alert', 10, 5.00, 454, 1);

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateStock` timestamp NULL DEFAULT NULL,
  `quantite` int(6) DEFAULT NULL,
  `idProduit` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `stocks`
--

INSERT INTO `stocks` (`id`, `dateStock`, `quantite`, `idProduit`) VALUES
(1, '0000-00-00 00:00:00', 5555, 1),
(2, '0000-00-00 00:00:00', 555, 1);
