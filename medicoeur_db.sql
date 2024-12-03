-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 déc. 2023 à 19:37
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
-- Base de données : `medicoeur_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `announcement_staff`
--

CREATE TABLE `announcement_staff` (
  `id_announcement` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `announcement_content` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `announcement_staff`
--

INSERT INTO `announcement_staff` (`id_announcement`, `id_staff`, `announcement_content`, `timestamp`) VALUES
(1, 1, 'test', '2023-12-09 17:24:58'),
(2, 1, 'C', '2023-12-13 14:55:17');

-- --------------------------------------------------------

--
-- Structure de la table `autho_code`
--

CREATE TABLE `autho_code` (
  `id_code` int(11) NOT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `dateexp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `code_produit` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `gsm` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_commande` date NOT NULL,
  `id_panier` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `code_produit`, `nom`, `prenom`, `adresse`, `gsm`, `email`, `date_commande`, `id_panier`, `quantite`) VALUES
(528, 22, 'achref', 'aaa', 'aaaa', 96703, 'kachaiachref@gmail.com', '2023-12-12', 7, 1),
(529, 20, 'achref', 'aaa', 'aaaa@aa', 96703, 'aa@aa', '2023-12-13', 8, 1),
(530, 22, 'achref', 'aaa', 'aaaa@aa', 96703, 'aa@aa', '2023-12-13', 8, 1),
(531, 20, 'achref', 'aaa', 'aaaa', 96703, 'aa@aa', '2023-12-13', 9, 1),
(533, 20, 'abidi', 'Youssef', 'rue', 24255203, 'youssef.abidi@esprit.tn', '2023-12-13', 10, 1),


-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `commentaire` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`commentaire`, `date`, `id`, `id_admin`, `id_publication`) VALUES
('heey', '2023-11-30 19:04:14', 6, 1, 9),
('aaaaa', '2023-12-07 13:56:01', 26, 1, 48),
('hey', '2023-12-07 14:10:28', 27, 1, 49),
('fh', '2023-12-07 14:10:35', 28, 1, 49),
('oui', '2023-12-11 13:01:13', 30, 1, 52),
('', '2023-12-11 13:10:03', 31, 1, 8),
('bien sur\r\n', '2023-12-11 13:13:03', 32, 1, 36),
('oui\r\n', '2023-12-11 13:13:36', 33, 1, 8),
('hhhh', '2023-12-11 13:22:30', 34, 1, 8),
('hihi', '2023-12-11 13:25:00', 35, 1, 8),
('hihi', '2023-12-11 13:26:05', 36, 1, 8),
('bhbh', '2023-12-11 13:27:38', 37, 1, 53),
('bhbh', '2023-12-11 13:28:49', 38, 1, 53),
('  BC QCB ', '2023-12-11 14:03:32', 39, 1, 54),
('SCC', '2023-12-11 14:06:21', 40, 1, 54),
('SDVV', '2023-12-11 14:09:08', 41, 1, 8),
('WOWOWOWOOW', '2023-12-11 14:09:20', 42, 1, 54),
('cbZDBVZVVVVVVVVVVVVVVVVVVVVVVVVVVV', '2023-12-11 14:17:09', 43, 1, 54),
('iww', '2023-12-11 14:22:16', 44, 1, 54),
('bhhbhh', '2023-12-11 14:24:33', 45, 1, 54);

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `idrendezvous` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `specialite` text NOT NULL,
  `nommedecin` text NOT NULL,
  `daterendezvous` date NOT NULL,
  `heure` time NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`idrendezvous`, `idpatient`, `specialite`, `nommedecin`, `daterendezvous`, `heure`, `email`) VALUES
(11216, 2, 'Neurologie', 'Farida', '2023-12-18', '16:46:00', 'rayen.borgi@esprit.tn'),
(11217, 69, 'Cardiologie', 'Youssef', '2023-12-17', '20:42:00', 'youssef.abidi@esprit.tn'),
(11218, 69, 'Cardiologie', 'Amine', '2023-12-17', '20:42:00', 'youssef.abidi@esprit.tn'),
(11219, 69, 'Cardiologie', 'Amine', '2023-12-21', '14:42:00', 'mohamedachref.kachai@esprit.tn'),
(11220, 69, 'Cardiologie', 'Amine', '2023-12-21', '12:42:00', 'jalel.nasr@esprit.tn');

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

CREATE TABLE `date` (
  `iddate` int(11) NOT NULL,
  `nommedecin` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `idpatient` int(11) NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `date`
--

INSERT INTO `date` (`iddate`, `nommedecin`, `date`, `idpatient`, `heure`) VALUES
(100, 'Jalel', '2023-12-12', 1, '10:00:00'),
(101, 'Youssef', '2023-12-12', 1, '10:00:00'),
(102, 'Farida', '2023-12-21', 1, '10:30:00'),
(103, 'Achref', '2023-12-12', 1, '10:10:00'),
(104, 'Marwa', '2023-12-13', 1, '11:00:00'),
(105, 'Jalel', '2023-12-12', 1, '10:30:00'),
(106, 'Achref', '2023-12-12', 1, '11:11:00'),
(107, 'Najet', '2023-12-12', 1, '10:30:00'),
(108, 'Safe', '2023-12-14', 1, '10:30:00'),
(109, 'Marwa', '2023-12-13', 1, '12:30:00'),
(110, 'Youssef', '2023-12-14', 1, '12:30:00'),
(111, 'Achref', '2023-12-12', 1, '10:00:00'),
(112, 'Safe', '2023-12-14', 1, '09:00:00'),
(113, 'Youssef', '2023-12-14', 1, '12:12:00'),
(114, 'Achref', '2023-12-12', 1, '09:00:00'),
(115, 'Achref', '2023-12-12', 1, '10:30:00'),
(116, 'Achref', '2023-12-12', 1, '11:00:00'),
(117, 'Youssef', '2023-12-14', 1, '14:14:00'),
(118, 'Youssef', '2023-12-17', 1, '12:00:00'),
(119, 'Jalel', '2023-11-11', 1, '14:15:00'),
(120, 'Rim', '0023-02-12', 1, '10:00:00'),
(121, 'Achref', '2023-12-12', 1, '15:00:00'),
(122, 'Achref', '2023-12-12', 1, '14:30:00'),
(123, 'Marwa', '2023-12-13', 1, '10:30:00'),
(124, 'Jalel', '2023-12-17', 1, '12:30:00'),
(125, 'Safe', '2023-11-14', 1, '11:11:00'),
(126, 'Youssef', '2003-01-10', 2, '21:44:00'),
(127, 'Farida', '2023-12-17', 2, '18:46:00'),
(128, 'Youssef', '2023-12-17', 69, '20:42:00'),
(129, 'Amine', '2023-12-17', 69, '20:42:00'),
(130, 'Amine', '2023-12-21', 69, '14:42:00'),
(131, 'Amine', '2023-12-21', 69, '12:42:00');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `id_medicament` int(11) NOT NULL,
  `nom_medicament` varchar(11) NOT NULL,
  `nb_stock` int(11) NOT NULL,
  `prix_unitaire_vente` int(11) NOT NULL,
  `prix_unitaire_achat` int(11) NOT NULL,
  `delai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`id_medicament`, `nom_medicament`, `nb_stock`, `prix_unitaire_vente`, `prix_unitaire_achat`, `delai`) VALUES
(1, 'doliprane', 0, 1000, 1200, '2025-02-25'),
(2, 'fervex', 488, 1500, 1500, '2023-01-10');

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

CREATE TABLE `ordonnance` (
  `id_ordonnance` int(11) NOT NULL,
  `id_medicament` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `nb_packet` int(11) NOT NULL,
  `date_ordonnance` date NOT NULL,
  `frequence` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  `etat` enum('non_commande','commande','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ordonnance`
--

INSERT INTO `ordonnance` (`id_ordonnance`, `id_medicament`, `id_staff`, `id_patient`, `nb_packet`, `date_ordonnance`, `frequence`, `duree`, `etat`) VALUES
(2, 2, 3, 69, 55, '2023-12-23', 5, 1, 'non_commande'),
(3, 2, 3, 69, 1, '2023-12-13', 2, 1, 'non_commande'),
(4, 2, 3, 69, 1, '2023-12-13', 2, 1, 'non_commande'),
(5, 2, 3, 69, 1, '2023-12-13', 2, 1, 'non_commande'),
(6, 2, 3, 69, 12, '2023-12-13', 2, 12, 'non_commande'),
(7, 2, 3, 69, 12, '2023-12-13', 1, 1, 'non_commande'),
(8, 1, 3, 69, 12, '2023-12-13', 1, 1, 'non_commande'),
(8, 2, 3, 69, 12, '2023-12-13', 2, 1, 'non_commande');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `Id_patient` int(11) NOT NULL,
  `cin` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `Date_Birth` date NOT NULL,
  `Genre` enum('Homme','Femme','','') NOT NULL,
  `tel` int(11) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `mail` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`Id_patient`, `cin`, `nom`, `prenom`, `Date_Birth`, `Genre`, `tel`, `Password`, `adresse`, `mail`) VALUES
(69, 15025289, 'Achrf', 'Kachai', '2023-12-16', 'Homme', 24255203, '123', 'rue', 'youssefabidi234@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `code_produit` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`code_produit`, `libelle`, `prix`, `image`, `description`) VALUES
(20, 'ahmed', 222, 'hp.png', 'DBHSVIDBISFIHS'),
(23, 'azzzazazaz', 12, 'svr.png', 'wji3a');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `publication` varchar(2555) NOT NULL,
  `date` datetime NOT NULL,
  `etat` int(11) NOT NULL,
  `nom` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id`, `publication`, `date`, `etat`, `nom`) VALUES
(8, 'zero', '2023-11-30 19:02:34', 0, 'sysy'),
(9, 'dvrb fg bngnyngn', '2023-11-30 19:03:48', 0, 'amira'),
(36, 'salut cv ', '2023-12-07 11:30:15', 0, 'siwarbsd'),
(37, 'coucou', '2023-12-07 11:31:16', 0, 'siwarbsd'),
(38, 'hello', '2023-12-07 11:31:25', 0, 'siwarbsd'),
(39, 'hola', '2023-12-07 11:31:36', 0, 'siwarbsd'),
(40, 'bienvenue', '2023-12-07 11:31:47', 0, 'mayres'),
(41, 'my love', '2023-12-07 11:32:05', 0, 'abirgmd'),
(42, 'cc', '2023-12-07 11:32:16', 0, 'abirgmd'),
(43, 'bonjour', '2023-12-07 11:32:46', 0, 'amira'),
(44, 'projet', '2023-12-07 11:33:03', 0, 'amira'),
(47, 'love', '2023-12-07 11:55:56', 0, 'amira'),
(48, 'yooo', '2023-12-07 11:59:43', 0, 'sysy'),
(49, 'aaaahhzz', '2023-12-07 14:09:47', 0, 'sysy'),
(52, 'bien', '2023-12-11 13:00:52', 0, 'abir gamoudi'),
(53, 'bien wlh', '2023-12-11 13:27:17', 0, 'mohamed fares'),
(54, 'ddbbddhcshvdsjcvbqhdcgbjhwxcvqhcvd', '2023-12-11 14:03:09', 0, 'abir gamoudi');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `email` varchar(64) NOT NULL,
  `reclamation` varchar(2555) NOT NULL,
  `etat` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `tel` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `nom`, `email`, `reclamation`, `etat`, `date`, `tel`) VALUES
(135, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'bbi', 0, '2023-12-05 14:07:27', '54649999'),
(136, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'b', 0, '2023-12-05 14:09:23', '54649999'),
(161, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'BIEN', 0, '2023-12-07 21:36:35', '98253433'),
(162, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'hhh', 0, '2023-12-07 21:42:15', '98253433'),
(163, 'nour', 'abir.gamoudi@esprit.tn', 'bb', 0, '2023-12-11 12:54:07', '98253433'),
(165, 'mohamed fares', 'abir.gamoudi@esprit.tn', 'oui', 0, '2023-12-11 12:58:12', '21325765'),
(166, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'b', 0, '2023-12-11 21:52:11', '99253433'),
(167, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'zayda', 0, '2023-12-11 22:17:33', '21325765'),
(168, 'BBBBB', 'abir.gamoudi@esprit.tn', '*******', 0, '2023-12-11 22:20:07', '21325765'),
(169, 'Youssef abidi', 'youssef.abidi@esprit.tn', 'wdfddqdsgsdfg', 0, '2023-12-13 15:58:01', '20004989');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `reponse` varchar(2555) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_reclamation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id`, `reponse`, `id_admin`, `date`, `id_reclamation`) VALUES
(67, 'OUI', 1, '2023-12-07 21:37:01', 161),
(68, 'hihi', 1, '2023-12-07 21:42:36', 162),
(69, 'oui\r\n', 1, '2023-12-11 12:54:24', 163),
(71, 'fff', 1, '2023-12-11 22:02:13', 166);

-- --------------------------------------------------------

--
-- Structure de la table `reset_tokens`
--

CREATE TABLE `reset_tokens` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expiry_timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE `staff` (
  `Id_staff` int(11) NOT NULL,
  `cin` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Genre` enum('Homme','Femme','','') NOT NULL,
  `Date_Birth` date NOT NULL,
  `E_mail` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `Password_s` varchar(20) NOT NULL,
  `Role` enum('Administrator','Medecin','Infermiére','Assistant','Pharmacien') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `staff`
--

INSERT INTO `staff` (`Id_staff`, `cin`, `Nom`, `Prenom`, `Genre`, `Date_Birth`, `E_mail`, `tel`, `Password_s`, `Role`) VALUES
(1, 15025289, 'Youssef', 'Abidi', 'Homme', '1995-01-10', 'youssef.abidi@esprit.tn', 20007989, '1234', 'Administrator'),
(3, 14025289, 'Achref', 'Kachai', 'Homme', '2003-01-10', 'mohamedachref.kachai@esprit.tn', 24255203, '123', 'Medecin'),
(9, 14096387, 'Borgi', 'Rayen', 'Homme', '2004-01-10', 'rayen.borgi@esprit.tn', 20004989, '123', 'Pharmacien'),
(10, 16098963, 'Nasr', 'Jalel', 'Homme', '2001-06-10', 'jalel.nasr@esprit.tn', 20004989, '123', 'Infermiére');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `announcement_staff`
--
ALTER TABLE `announcement_staff`
  ADD PRIMARY KEY (`id_announcement`),
  ADD KEY `announcement_staff_ibfk_1` (`id_staff`);

--
-- Index pour la table `autho_code`
--
ALTER TABLE `autho_code`
  ADD PRIMARY KEY (`id_code`),
  ADD KEY `autho_code_ibfk_1` (`id_staff`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `jointure` (`code_produit`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`idrendezvous`);

--
-- Index pour la table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`iddate`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`id_medicament`);

--
-- Index pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD PRIMARY KEY (`id_ordonnance`,`id_medicament`),
  ADD KEY `jointure` (`id_medicament`),
  ADD KEY `staff` (`id_staff`),
  ADD KEY `patient` (`id_patient`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Id_patient`,`cin`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`code_produit`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reset_tokens`
--
ALTER TABLE `reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reset_tokens_ibfk_1` (`staff_id`);

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Id_staff`,`cin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `announcement_staff`
--
ALTER TABLE `announcement_staff`
  MODIFY `id_announcement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `autho_code`
--
ALTER TABLE `autho_code`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `idrendezvous` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11221;

--
-- AUTO_INCREMENT pour la table `date`
--
ALTER TABLE `date`
  MODIFY `iddate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  MODIFY `id_ordonnance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `Id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `code_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `reset_tokens`
--
ALTER TABLE `reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `Id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `announcement_staff`
--
ALTER TABLE `announcement_staff`
  ADD CONSTRAINT `announcement_staff_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`Id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `autho_code`
--
ALTER TABLE `autho_code`
  ADD CONSTRAINT `autho_code_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`Id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD CONSTRAINT `jointure` FOREIGN KEY (`id_medicament`) REFERENCES `medicament` (`id_medicament`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`Id_patient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`Id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reset_tokens`
--
ALTER TABLE `reset_tokens`
  ADD CONSTRAINT `reset_tokens_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`Id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
