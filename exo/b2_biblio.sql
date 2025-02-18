-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 18 fév. 2025 à 14:14
-- Version du serveur : 11.2.2-MariaDB
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `b2_biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `biblio`
--

DROP TABLE IF EXISTS `biblio`;
CREATE TABLE IF NOT EXISTS `biblio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `biblio`
--

INSERT INTO `biblio` (`id`, `ville`) VALUES
(1, 'Paris'),
(2, 'Garges'),
(3, 'Marseille');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `nbrePages` int(10) NOT NULL,
  `auteur` int(11) NOT NULL,
  `editeur` varchar(35) NOT NULL,
  `biblio` int(11) NOT NULL,
  PRIMARY KEY (`numero`),
  KEY `biblio` (`biblio`),
  KEY `personne` (`auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`numero`, `nbrePages`, `auteur`, `editeur`, `biblio`) VALUES
(1, 21, 4, 'Nesciunt deserunt s', 2),
(2, 67, 1, 'Vero nemo sit maxim', 1);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `ville` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `prenom`, `nom`, `age`, `ville`) VALUES
(1, 'Toto', 'Tata', 65, 'Marseille'),
(2, 'Idris', 'Rafes', 33, 'Marseille'),
(3, 'Wissam', 'Adjassa', 20, 'Paris'),
(4, 'Ami', 'Dao', 23, 'Amiens');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`biblio`) REFERENCES `biblio` (`id`),
  ADD CONSTRAINT `livre_ibfk_2` FOREIGN KEY (`auteur`) REFERENCES `personne` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
