-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20240509.2a58575683
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Jeu. 20 Juin 2024 à 02:29
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `deming`
--

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(255) NOT NULL,
  `nom_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'administrateur'),
(2, 'auditeur'),
(3, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `CIN` int(255) NOT NULL,
  `DateDenaissance` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `id_role` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `email`, `CIN`, `DateDenaissance`, `password`, `description`, `id_role`) VALUES
(60, 'Bob', 'alex', 'Bob@gmail.com', 0, NULL, 'password4', '', 2),
(61, 'Emily', 'Davis', 'Emily@gmail.com', 0, NULL, 'password6', '', 3),
(62, 'William', 'Harris', 'William@gmail.com', 0, NULL, 'password15', '', 2),
(63, 'Michael', 'Miller', 'Michael@gmail.com', 0, NULL, 'password7', '', 2),
(64, 'Barbara', 'Garcia', 'Barbara@gmail.com', 0, NULL, 'password18', '', 3),
(65, 'Patricia', 'Martin', 'Patricia@gmail.com', 0, NULL, 'password16', '', 3),
(66, 'Richard', 'Thompson', 'Richard@gmail.com', 0, NULL, 'password17', '▶︎ •၊၊||၊|။||||။၊|။|||။|||။၊| 0:54\r\n', 2),
(67, 'Sarah', 'Wilson', 'Sarah@gmail.com', 0, NULL, 'password8', '▶︎ •၊၊||၊|။||||။၊|။|||။|||။၊| 0:54\r\n', 2),
(76, 'salamo3alaykom', 'simehdi', 'salamo3alaykom@gmail.com', 0, NULL, '$2y$10$BiFpSputAoyH4AQzXDiyfeFNx93EVmK8zCssbx9ATeCqBNMTxnKei', 'root', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
