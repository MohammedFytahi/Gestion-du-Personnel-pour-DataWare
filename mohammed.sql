-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 nov. 2023 à 17:26
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mohammed`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `IDEquipe` int(11) NOT NULL,
  `NomEquipe` varchar(255) NOT NULL,
  `DateCreation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`IDEquipe`, `NomEquipe`, `DateCreation`) VALUES
(1, 'Équipe A', '2023-04-02'),
(2, 'Équipe C', '2023-04-03'),
(3, 'Équipe D', '2023-04-04');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `IDPersonnel` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Role` varchar(50) DEFAULT NULL,
  `IDEquipe` int(11) DEFAULT NULL,
  `Statut` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`IDPersonnel`, `Nom`, `Prenom`, `Email`, `Telephone`, `Role`, `IDEquipe`, `Statut`) VALUES
(1, 'Smith', 'John', 'john.smith@email.com', '555-111-2222', 'Développeur', 2, 'Actif'),
(2, 'Johnson', 'Jane', 'jane.johnson@email.com', '555-333-4444', 'Designer', 2, 'Inactif'),
(3, 'Doe', 'Bob', 'bob.doe@email.com', '555-555-6666', 'Analyste', 2, 'Actif'),
(4, 'fytahi', 'Mohammed', 'mohammed.fytahi@email.com', '555-777-8888', 'Développeur', 3, 'Actif'),
(5, 'ahmed', 'rachi', 'chris.brown@email.com', '555-999-0000', 'Designer', 3, 'Inactif'),
(6, 'Taylor', 'Sarah', 'sarah.taylor@email.com', '555-123-4567', 'Analyste', 3, 'Actif'),
(10, 'Johnson', 'Alex', 'alex.johnson@email.com', '555-987-6543', 'Développeur', 1, 'Actif'),
(11, 'Davis', 'Emily', 'emily.davis@email.com', '555-234-5678', 'Designer', 1, 'Inactif'),
(12, 'Clark', 'Michael', 'michael.clark@email.com', '555-876-5432', 'Analyste', 1, 'Actif');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`IDEquipe`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`IDPersonnel`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `IDEquipe` (`IDEquipe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `IDEquipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `IDPersonnel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`IDEquipe`) REFERENCES `equipes` (`IDEquipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
