-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 09 jan. 2022 à 16:12
-- Version du serveur : 10.3.32-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wattecriture`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `imagePrincipale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`, `imagePrincipale`) VALUES
('590cf38f-eac0-4a9f-b933-393fbd3af8a3', 'Policier', 'https://media.discordapp.net/attachments/685246708807893037/928182410405883934/policier.png'),
('6f3ad7dd-9e41-464e-a269-197da05f50e2', 'Action', 'https://media.discordapp.net/attachments/685246708807893037/928182289228251186/gens.png'),
('7c7bfe7e-cf2a-419d-83e8-976572690b86', 'Amour', 'https://media.discordapp.net/attachments/685246708807893037/928181892052815892/romantique.png'),
('7e1860d2-4ada-4e49-836d-19144bae2483', 'Fantaisie', 'https://media.discordapp.net/attachments/685246708807893037/928182576429015060/fantaisie.png'),
('9516fc9f-de3d-4514-94b4-2716c29e137f', 'Aventure', 'https://media.discordapp.net/attachments/685246708807893037/928182194327912458/aventure.png'),
('e85a912e-3af1-45c3-a411-d015d845f0a0', 'Science-Fiction', 'https://media.discordapp.net/attachments/685246708807893037/928182509957685258/science-fiction.png');

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `idChapitre` varchar(255) NOT NULL,
  `histoire_idHistoire` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`idChapitre`, `histoire_idHistoire`, `name`, `text`) VALUES
('17cc36db-5e9f-491f-be51-525147f71129', '828d1bca-6ddf-4d9b-9c12-763dade19575', 'PETIT TEST', 'OUAIS OUAIS'),
('422e9309-0e58-4ec1-b5ff-86b1a4cc19f8', '828d1bca-6ddf-4d9b-9c12-763dade19575', 'iogjfdkgfdhgjgkjkk', 'jsdghisgjkqngjkjlig'),
('97c55b04-7652-42c1-8c5b-8d23433d968a', '07133224-76c4-4dfd-869b-5cac046fbd87', '0 - TEST', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE `histoire` (
  `idHistoire` varchar(255) NOT NULL,
  `user_idUser` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `histoire`
--

INSERT INTO `histoire` (`idHistoire`, `user_idUser`, `name`, `description`) VALUES
('07133224-76c4-4dfd-869b-5cac046fbd87', 'd525303e-4470-4e4d-a3cd-7e317007e92e', 'TEST', '123456'),
('828d1bca-6ddf-4d9b-9c12-763dade19575', 'd525303e-4470-4e4d-a3cd-7e317007e92e', 'FDJIFSDFK', '1234567891011121314151617181920212223242526272829'),
('d17f7c0c-4b92-487b-aeb5-745a7d637891', 'd525303e-4470-4e4d-a3cd-7e317007e92e', 'SoloLeveling', 'Il y a 10 ans, après l\'ouverture de la « Porte » qui reliait le monde réel au monde des monstres, des gens ordinaires de la société ont reçu le pouvoir de chasser les monstres à l\'intérieur des Portes. Ils sont connus sous le nom de « Chasseurs ». Cependant, tous les Chasseurs ne sont pas puissants. Mon nom est Sung Jin-Woo, un Chasseur de rang E. Je suis quelqu\'un qui doit risquer sa vie dans le plus bas des donjons, le « plus faible du monde ». N\'ayant aucune compétence à montrer, je gagnais à peine l\'argent nécessaire en combattant dans des donjons de bas niveau... au moins jusqu\'à ce que je découvre un donjon secret avec la difficulté la plus élevée dans un donjon de rang D ! Finalement, alors que j\'acceptais la mort, j\'ai soudain reçu un étrange pouvoir, un agenda de quête que moi seul pouvais voir, un secret dont moi seul était au courant pour monter mon niveau ! Si je m\'entraînais en accord avec mes quêtes et chassais des monstres, mon niveau montait. Passant du Chasseur le plus faible au Chasseur de rang S le plus fort !');

-- --------------------------------------------------------

--
-- Structure de la table `histoire_has_categorie`
--

CREATE TABLE `histoire_has_categorie` (
  `categorie_idHistoire` varchar(255) NOT NULL,
  `categorie_idCategorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `histoire_has_categorie`
--

INSERT INTO `histoire_has_categorie` (`categorie_idHistoire`, `categorie_idCategorie`) VALUES
('07133224-76c4-4dfd-869b-5cac046fbd87', '6f3ad7dd-9e41-464e-a269-197da05f50e2'),
('07133224-76c4-4dfd-869b-5cac046fbd87', '9516fc9f-de3d-4514-94b4-2716c29e137f'),
('828d1bca-6ddf-4d9b-9c12-763dade19575', '6f3ad7dd-9e41-464e-a269-197da05f50e2'),
('828d1bca-6ddf-4d9b-9c12-763dade19575', '7c7bfe7e-cf2a-419d-83e8-976572690b86'),
('828d1bca-6ddf-4d9b-9c12-763dade19575', '7e1860d2-4ada-4e49-836d-19144bae2483'),
('828d1bca-6ddf-4d9b-9c12-763dade19575', '9516fc9f-de3d-4514-94b4-2716c29e137f'),
('828d1bca-6ddf-4d9b-9c12-763dade19575', 'e85a912e-3af1-45c3-a411-d015d845f0a0'),
('d17f7c0c-4b92-487b-aeb5-745a7d637891', '6f3ad7dd-9e41-464e-a269-197da05f50e2'),
('d17f7c0c-4b92-487b-aeb5-745a7d637891', '7e1860d2-4ada-4e49-836d-19144bae2483'),
('d17f7c0c-4b92-487b-aeb5-745a7d637891', '9516fc9f-de3d-4514-94b4-2716c29e137f'),
('d17f7c0c-4b92-487b-aeb5-745a7d637891', 'e85a912e-3af1-45c3-a411-d015d845f0a0');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `email`, `password`, `pseudo`, `lastName`, `firstName`, `role`, `token`, `created`) VALUES
('20ad50b3-782f-4310-998f-996b6b088985', 'antho@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'antho', 'antho', 'Antho', 'ROLE_USER', '581bb396-53ed-474f-8f7b-195883048825', '2022-01-03 22:21:08'),
('29f4a489-3782-44d9-a4b3-c0698329b4b5', 'jbf@gmail.com', '28bd98e9b7c816e4c1e139135df2be75efec4b811dcedba4e1ccd9fab5afe737', 'Keiich', 'LONGEPE', 'Kenny', 'ROLE_USER', NULL, NULL),
('7bbdc604-176b-4a40-95eb-6a132106b18a', 'test14@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'Byakko', 'PICANT', 'JORDAN', 'ROLE_USER', '4e06e4ac-61e9-4ef2-8aa6-476113718061', '2022-01-06 11:06:13'),
('ce378469-8d52-4f78-965b-ad654723dff6', 'akuma@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'Akuma', 'Akuma', 'Chan', 'ROLE_USER', '7b98f12c-1be0-4cc6-bffe-0a5b893c52d0', '2022-01-03 07:39:40'),
('d525303e-4470-4e4d-a3cd-7e317007e92e', 'compte.admin@admin.jbf', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'ElCabron', 'PICANT', 'Cabron', 'ROLE_ADMIN', 'ddc0679c-4231-4546-8707-5467b34b8996', '2022-01-07 15:53:00'),
('df659c55-7c42-48de-8b82-2d7cb6181e4a', 'theo@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'Theo', 'Theo', 'Theo', NULL, '322d07a2-f4ef-400b-9d58-c33ae7f8cf12', '2022-01-03 22:21:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`idChapitre`),
  ADD KEY `fk_chapitre_histoire1` (`histoire_idHistoire`);

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`idHistoire`),
  ADD KEY `fk_histoire_user` (`user_idUser`);

--
-- Index pour la table `histoire_has_categorie`
--
ALTER TABLE `histoire_has_categorie`
  ADD PRIMARY KEY (`categorie_idHistoire`,`categorie_idCategorie`),
  ADD KEY `fk_histoire_has_role_histoire1` (`categorie_idHistoire`),
  ADD KEY `fk_histoire_has_categorie_categorie1` (`categorie_idCategorie`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `fk_chapitre_histoire1` FOREIGN KEY (`histoire_idHistoire`) REFERENCES `histoire` (`idHistoire`) ON DELETE CASCADE;

--
-- Contraintes pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD CONSTRAINT `fk_histoire_user` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `histoire_has_categorie`
--
ALTER TABLE `histoire_has_categorie`
  ADD CONSTRAINT `fk_histoire_has_categorie_categorie1` FOREIGN KEY (`categorie_idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_histoire_has_categorie_histoire1` FOREIGN KEY (`categorie_idHistoire`) REFERENCES `histoire` (`idHistoire`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
