-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 27 sep. 2025 à 23:48
-- Version du serveur : 9.1.0
-- Version de PHP : 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eatsmart_bdd_chaineze`
--
CREATE DATABASE IF NOT EXISTS `eatsmart_bdd_chaineze` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `eatsmart_bdd_chaineze`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `Id_article` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Prix` decimal(19,2) DEFAULT NULL,
  `Description` text,
  `Id_categorie` int NOT NULL,
  PRIMARY KEY (`Id_article`),
  KEY `Id_categorie` (`Id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`Id_article`, `Nom`, `Prix`, `Description`, `Id_categorie`) VALUES
(1, 'Anchois 23cm', 7.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, anchois, olive', 0),
(2, 'Anchois 33cm', 11.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, anchois, olive', 0),
(3, 'Emmental 23cm', 7.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, emmental, basilic, olive', 0),
(4, 'Emmental 33cm', 11.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, emmental, basilic, olive', 0),
(5, 'Margherita 23cm', 7.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella', 0),
(6, 'Margherita 33cm', 11.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella', 0),
(7, '3 fromages 23cm', 8.40, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre', 0),
(8, '3 fromages 33cm', 12.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre', 0),
(9, '4 fromages 23cm', 8.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre, roquefort', 0),
(10, '4 fromages 33cm', 13.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre, roquefort', 0),
(11, 'Royale 23cm', 8.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon label rouge, champignon brun, olive', 0),
(12, 'Royale 33cm', 13.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon label rouge, champignon brun, olive', 0),
(13, 'Vegetarienne 23cm', 8.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, roquette, oignon rouge, poivron, champignon brun, olive', 0),
(14, 'Vegetarienne 33cm', 13.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, roquette, oignon rouge, poivron, champignon brun, olive', 0),
(15, 'Provencale 23cm', 8.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, filets de poulet rôti, oignon rouge, poivron, olive', 0),
(16, 'Provencale 33cm', 13.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, filets de poulet rôti, oignon rouge, poivron, olive', 0),
(17, 'Espagnol 23cm', 8.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, chorizo de León, poivron, olive', 0),
(18, 'Espagnol 33cm', 13.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, chorizo de León, poivron, olive', 0),
(19, 'Italienne 23cm', 10.40, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon cru IGP, roquette, parmigiano reggiano, olive', 0),
(20, 'Italienne 33cm', 16.90, 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon cru IGP, roquette, parmigiano reggiano, olive', 0),
(21, 'Armenienne 23cm', 8.90, 'sauce crème fraîche premium, mozzarella, viande hachée 100% pur bœuf, oignon rouge, olive', 0),
(22, 'Armenienne 33cm', 13.90, 'sauce crème fraîche premium, mozzarella, viande hachée 100% pur bœuf, oignon rouge, olive', 0),
(23, 'White royale 23cm', 8.90, 'sauce crème fraîche premium, mozzarella, jambon label rouge, champignon brun, olive', 0),
(24, 'White royale 33cm', 13.90, 'sauce crème fraîche premium, mozzarella, jambon label rouge, champignon brun, olive', 0),
(25, 'Chevre miel 23cm', 8.90, 'sauce crème fraîche premium, mozzarella, chevre, miel, olive', 0),
(26, 'Chevre miel 33cm', 13.90, 'sauce crème fraîche premium, mozzarella, chevre, miel, olive', 0),
(27, 'Tiramisu', 3.90, 'boudoirs imbibés ou non de café, mascarpone, œufs, sucre, arôme vanille, cacao en poudre', 0),
(28, 'Gourmande', 6.90, 'nutella, avec une glace noix de coco râpé ou chocolat, supplément fruits frais possible', 0),
(29, 'Eaux', 1.90, 'eaux cristalline, san pellegrino, badoit', 0),
(30, 'Soda 33cl', 1.90, 'coca original, zero, cherry', 0),
(31, 'Soda 1L+', 3.00, 'coca, icetea, orangina, sprite, oasis', 0),
(32, 'Biere', 3.50, 'desperados, heineken', 0),
(33, 'Vin AOP 25cl', 4.90, 'rouge, rose', 0),
(34, 'Vin AOP 50cl', 7.50, 'rouge, rose', 0);

-- --------------------------------------------------------

--
-- Structure de la table `assoc_article_commande`
--

DROP TABLE IF EXISTS `assoc_article_commande`;
CREATE TABLE IF NOT EXISTS `assoc_article_commande` (
  `Id_article` int NOT NULL,
  `Id_commande` int NOT NULL,
  `Quantite_article` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`Id_article`,`Id_commande`),
  KEY `Id_commande` (`Id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `assoc_article_commande`
--

INSERT INTO `assoc_article_commande` (`Id_article`, `Id_commande`, `Quantite_article`) VALUES
(1, 1, 1.00),
(1, 2, 1.00),
(3, 2, 1.00),
(5, 2, 1.00),
(1, 3, 3.00),
(1, 4, 2.00),
(3, 4, 1.00),
(5, 4, 2.00),
(7, 5, 1.00),
(33, 5, 1.00),
(27, 5, 1.00);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_categorie` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Id_categorie`, `Nom`) VALUES
(1, 'classic'),
(2, 'Fruits'),
(3, 'Légumes'),
(4, 'Boissons'),
(5, 'Snacks'),
(6, 'Produits laitiers');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Id_commande` int NOT NULL AUTO_INCREMENT,
  `Date_commande` datetime DEFAULT NULL,
  `Prix_total` double DEFAULT NULL,
  `Etat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_commande`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`Id_commande`, `Date_commande`, `Prix_total`, `Etat`) VALUES
(1, '2024-10-25 00:00:00', 7.9, 'en cours'),
(2, '2024-10-25 00:00:00', 7.9, 'en cours'),
(3, '2024-10-25 00:00:00', 23.2, 'en cours'),
(4, '2024-10-25 00:00:00', 23.7, 'en cours'),
(5, '2024-10-25 00:00:00', 34.2, 'en cours'),
(6, '2024-10-25 00:00:00', 17.7, 'en cours');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
