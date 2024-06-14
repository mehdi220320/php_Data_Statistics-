-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20240509.2a58575683
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Sam. 15 Juin 2024 à 01:14
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
-- Base de données : `doming`
--

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(30) NOT NULL,
  `nom_role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'Administrateur'),
(2, 'employeur'),
(3, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `id_role` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `email`, `password`, `id_role`) VALUES
(1, 'admin', 'root', 'admin', 'root', 1),
(57, 'Mehdi', 'si mehdi', 'Mehdi@gmail.com', 'zerbiyani', 2),
(58, 'Jane', 'Smith', 'Jane@gmail.com', 'password2', 2),
(59, 'Alice', 'Johnson', 'Alice@gmail.com', 'password3', 3),
(60, 'Bob', 'Williams', 'Bob@gmail.com', 'password4', 2),
(61, 'Emily', 'Davis', 'Emily@gmail.com', 'password6', 3),
(62, 'William', 'Harris', 'William@gmail.com', 'password15', 2),
(63, 'Michael', 'Miller', 'Michael@gmail.com', 'password7', 2),
(64, 'Barbara', 'Garcia', 'Barbara@gmail.com', 'password18', 3),
(65, 'Patricia', 'Martin', 'Patricia@gmail.com', 'password16', 3),
(66, 'Richard', 'Thompson', 'Richard@gmail.com', 'password17', 2),
(67, 'Sarah', 'Wilson', 'Sarah@gmail.com', 'password8', 2),
(68, 'Linda', 'White', 'Linda@gmail.com', 'password14', 2);

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
  MODIFY `id_role` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
