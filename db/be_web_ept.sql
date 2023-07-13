-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 17 juin 2023 à 02:37
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `be_web_ept`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `Code_cl` char(7) NOT NULL,
  `Code_fil` varchar(5) NOT NULL,
  `Libelle` varchar(30) NOT NULL,
  `Effectif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `Code_cours` char(7) NOT NULL,
  `Code_ens` char(7) NOT NULL,
  `Intitule` varchar(40) NOT NULL,
  `Coefficient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `Code_ens` char(7) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `Matricule` char(10) NOT NULL,
  `Code_cl` char(7) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Sexe` char(1) NOT NULL,
  `Date_naiss` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `Code_fil` varchar(5) NOT NULL,
  `Libelle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

CREATE TABLE `suivre` (
  `Matricule` char(10) NOT NULL,
  `Code_cours` char(7) NOT NULL,
  `Notes` float DEFAULT NULL,
  `Date_ob` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`Code_cl`),
  ADD KEY `I_FK_CLASSE_FILIERE` (`Code_fil`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`Code_cours`),
  ADD KEY `FK_cours_enseignant` (`Code_ens`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`Code_ens`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`Matricule`),
  ADD KEY `I_FK_ETUDIANT_CLASSE` (`Code_cl`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`Code_fil`);

--
-- Index pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD PRIMARY KEY (`Matricule`,`Code_cours`),
  ADD KEY `I_FK_suivre_etudiant` (`Matricule`),
  ADD KEY `I_FK_suivre_cours` (`Code_cours`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `FK_classe_filiere` FOREIGN KEY (`Code_fil`) REFERENCES `filiere` (`Code_fil`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `FK_cours_enseignant` FOREIGN KEY (`Code_ens`) REFERENCES `enseignant` (`Code_ens`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_etudiant_classe` FOREIGN KEY (`Code_cl`) REFERENCES `classe` (`Code_cl`);

--
-- Contraintes pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD CONSTRAINT `FK_suivre_cours` FOREIGN KEY (`Code_cours`) REFERENCES `cours` (`Code_cours`),
  ADD CONSTRAINT `FK_suivre_etudiant` FOREIGN KEY (`Matricule`) REFERENCES `etudiant` (`Matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
