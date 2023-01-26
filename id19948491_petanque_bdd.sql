-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 jan. 2023 à 18:40
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
-- Base de données : `bdd_petanque`
--
CREATE DATABASE IF NOT EXISTS `bdd_petanque` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdd_petanque`;

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

DROP TABLE IF EXISTS `joueurs`;
CREATE TABLE IF NOT EXISTS `joueurs` (
  `num_license` char(8) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `d_naissance` date NOT NULL,
  `taille` int(11) NOT NULL,
  `poste_fav` varchar(50) NOT NULL,
  `commentaire` text NOT NULL,
  `statut` varchar(50) NOT NULL,
  PRIMARY KEY (`num_license`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`num_license`, `nom`, `prenom`, `photo`, `d_naissance`, `taille`, `poste_fav`, `commentaire`, `statut`) VALUES
('08009035', 'Bernard ', 'Premi', 'Bernard.jpg', '1970-02-14', 170, 'Pointeur', 'Bernard est un joueur passonié de pétanque depuis sa jeunesse, il est un excellent pointeur et joue a Marseille depuis 2 ans.', 'Actif'),
('07603571', 'Dupont', 'Patrick', 'Patrick.jpg', '1960-09-08', 178, 'Tireur', 'La pétanque n\'a plus de secret pour Patrick, il joue en tant que tireur depuis 20 ans et s\'est spécialisé dans son domaine.', 'Actif'),
('08007301', 'Mona', 'Eugene', 'Eugene.jpg', '1963-11-14', 180, 'Pointeur ou Tireur', 'Eugene Mona, il a la particularité d\'être polivalent, malgré pour le rôle de pointeur.Actuellement suspendu pour raison personelle.', 'Suspendu'),
('08001641', 'Bounoua', 'Gerard', 'Gerard.jpg', '1960-12-18', 173, 'Tireur', 'Gérard Bounoua, joueur compétant qui détruit tout sur son passage, en tournois depuis 2017.', 'Absent'),
('08009371', 'Quintais', 'Philippe', 'Philippe.jpg', '1967-12-30', 184, 'Pointeur', 'Joueur qu\'on ne présente plus, une renommée international, des tirs de qualité, bref un pure monstre.', 'Actif'),
('08003813', 'Rizzi', 'Diego', 'Diego.jpg', '1994-09-20', 180, 'Milieu', 'A commencé sa carrière de bouliste en 2007, ce jeune joueur rivalise contre les vieux de la vielle et nous montre que la nouvelle génération est présente.', 'Actif'),
('08002088', 'Lacroix', 'Henri', 'Henri.jpg', '1963-05-06', 178, 'Milieu', 'Vainqueur aux masters de pétanque, il a été treize fois champion du Monde, quatre fois champion d\'Europe, trois fois champion d\'Europe des clubs, vingt fois champion de France pétanque. ', 'Blessé'),
('08002089', 'Robineau', 'Stephane', 'Stephane.jpg', '1980-06-13', 187, 'Pointeur / Milieu', 'Multiple champion, il est trois fois champion de France et a gagné une fois le master de Pétanque.', 'Absent'),
('07611625', 'Hatchadourian', 'Michel', 'Michel.jpg', '1988-09-28', 185, 'Tireur', '2 fois champions de France, il est champion de France une fois et a gagné un master de pétanque.', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

DROP TABLE IF EXISTS `match`;
CREATE TABLE IF NOT EXISTS `match` (
  `id_match` int(11) NOT NULL AUTO_INCREMENT,
  `d_match` date NOT NULL,
  `h_match` time NOT NULL,
  `nom_equipe_adverse` varchar(50) NOT NULL,
  `lieu_rencontre` varchar(50) NOT NULL,
  `resultat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_match`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `match`
--

INSERT INTO `match` (`id_match`, `d_match`, `h_match`, `nom_equipe_adverse`, `lieu_rencontre`, `resultat`) VALUES
(1, '2022-11-08', '14:00:00', 'Dream Team', 'Marseille', '13 - 10 '),
(2, '2022-11-04', '10:00:00', 'Les Boulistes de Marseille', 'Frejus', '14 - 8'),
(3, '2022-12-26', '16:53:00', 'test equipe', 'test lieu', '12 - 10');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `titulaire` int(1) NOT NULL,
  `performance` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
--
-- Base de données : `formulaire saisie`
--
CREATE DATABASE IF NOT EXISTS `formulaire saisie` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `formulaire saisie`;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `codepostale` char(5) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Telephone` char(10) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `Nom`, `Prenom`, `Adresse`, `codepostale`, `Ville`, `Telephone`) VALUES
(1, 'MAS-BOUVRY', 'Diego', '320', '31100', 'Toulouse', '0695656167'),
(8, 'MAS-BOUVRY', 'Diego', '320', '31100', 'Toulouse', '0695656167'),
(7, 'MAS-BOUVRY', 'Diego', '320', '31100', 'Toulouse', '0695656167');
--
-- Base de données : `id19948491_petanque_bdd`
--
CREATE DATABASE IF NOT EXISTS `id19948491_petanque_bdd` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id19948491_petanque_bdd`;

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

DROP TABLE IF EXISTS `joueurs`;
CREATE TABLE IF NOT EXISTS `joueurs` (
  `num_license` char(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `d_naissance` date NOT NULL,
  `taille` int(11) NOT NULL,
  `poste_fav` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `commentaire` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`num_license`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`num_license`, `nom`, `prenom`, `photo`, `d_naissance`, `taille`, `poste_fav`, `commentaire`, `statut`) VALUES
('08009035', 'Bernard ', 'Premi', 'Bernard.jpg', '1970-02-14', 170, 'Pointeur', 'Bernard est un joueur passionné de pétanque depuis sa jeunesse, il est un excellent pointeur et joue a Marseille depuis 2 ans.', 'Actif'),
('07603571', 'Dupont', 'Patrick', 'Patrick.jpg', '1960-09-08', 178, 'Tireur', 'La p?tanque n\'a plus de secret pour Patrick, il joue en tant que tireur depuis 20 ans et s\'est sp?cialis? dans son domaine.', 'Actif'),
('08007301', 'Mona', 'Eugene', 'Eugene.jpg', '1963-11-14', 180, 'Pointeur ou Tireur', 'Eugene Mona, il a la particularit? d\'?tre polivalent, malgr? pour le r?le de pointeur.Actuellement suspendu pour raison personelle.', 'Suspendu'),
('08001641', 'Bounoua', 'Gerard', 'Gerard.jpg', '1960-12-18', 173, 'Tireur', 'G?rard Bounoua, joueur comp?tant qui d?truit tout sur son passage, en tournois depuis 2017.', 'Absent'),
('08009371', 'Quintais', 'Philippe', 'Philippe.jpg', '1967-12-30', 184, 'Pointeur', 'Joueur qu\'on ne pr?sente plus, une renomm?e international, des tirs de qualit?, bref un pure monstre.', 'Actif'),
('08003813', 'Rizzi', 'Diego', 'Diego.jpg', '1994-09-20', 180, 'Milieu', 'A commenc? sa carri?re de bouliste en 2007, ce jeune joueur rivalise contre les vieux de la vielle et nous montre que la nouvelle g?n?ration est pr?sente.', 'Actif'),
('08002088', 'Lacroix', 'Henri', 'Henri.jpg', '1963-05-06', 178, 'Milieu', 'Vainqueur aux masters de p?tanque, il a ?t? treize fois champion du Monde, quatre fois champion d\'Europe, trois fois champion d\'Europe des clubs, vingt fois champion de France p?tanque. ', 'Bless?'),
('08002089', 'Robineau', 'Stephane', 'Stephane.jpg', '1980-06-13', 187, 'Pointeur / Milieu', 'Multiple champion, il est trois fois champion de France et a gagn? une fois le master de P?tanque.', 'Absent'),
('07611625', 'Hatchadourian', 'Michel', 'Michel.jpg', '1988-09-28', 185, 'Tireur', '2 fois champions de France, il est champion de France une fois et a gagn? un master de p?tanque.', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

DROP TABLE IF EXISTS `match`;
CREATE TABLE IF NOT EXISTS `match` (
  `id_match` int(11) NOT NULL AUTO_INCREMENT,
  `d_match` date NOT NULL,
  `h_match` time NOT NULL,
  `nom_equipe_adverse` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lieu_rencontre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `resultat` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_match`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `match`
--

INSERT INTO `match` (`id_match`, `d_match`, `h_match`, `nom_equipe_adverse`, `lieu_rencontre`, `resultat`) VALUES
(1, '2022-11-08', '14:00:00', 'Dream Team', 'Marseille', '13 - 10 '),
(2, '2022-11-04', '10:00:00', 'Les Boulistes de Marseille', 'Frejus', '14 - 8'),
(3, '2022-12-14', '17:00:00', 'La team apero', 'Rodez', '12-9'),
(4, '2022-12-15', '13:00:00', 'Les Boules Dorees', 'Toulon', '15-9'),
(11, '2023-02-14', '14:00:00', 'Petanque team', 'toulouse', 'En cours'),
(6, '2022-12-26', '19:00:00', 'Les Sudistes', 'Marseille', '14 - 7');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `titulaire` int(1) NOT NULL,
  `performance` int(11) DEFAULT NULL,
  `id_match` int(11) NOT NULL,
  `num_license` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participer`
--

INSERT INTO `participer` (`titulaire`, `performance`, `id_match`, `num_license`) VALUES
(0, NULL, 1, 7603571),
(0, NULL, 1, 8009035),
(1, NULL, 2, 8001641);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`) VALUES
('00001', 'JBessier', 'e060c37cc92927255ff5e06a4051a88b08d27a3c4d1de8192c4c7cf78884ec94'),
('00002', 'professeur', '400d6e01215b325d64a8653eec77cfdea1ba04df91dc79f92a83e9d981759c91');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
