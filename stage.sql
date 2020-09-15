-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 16 Septembre 2018 à 23:47
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `entite`
--

CREATE TABLE `entite` (
  `id` int(11) NOT NULL,
  `nom_entite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entite`
--

INSERT INTO `entite` (`id`, `nom_entite`) VALUES
(1, 'linux/unix'),
(2, 'storage/backup'),
(3, 'backOffice'),
(4, 'virtualisation');

-- --------------------------------------------------------

--
-- Structure de la table `equip_type`
--

CREATE TABLE `equip_type` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `entite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `equip_type`
--

INSERT INTO `equip_type` (`id`, `type`, `entite`) VALUES
(1, 'Server', ''),
(2, 'Server HMC', ''),
(5, 'Ecran', ''),
(6, 'Ecran HMC', ''),
(7, 'Robot', ''),
(8, 'Baie Stockage', ''),
(9, 'Switsh SAN', ''),
(10, 'Switsh', ''),
(11, 'VTL', ''),
(12, 'Software', ''),
(13, 'Blade', '');

-- --------------------------------------------------------

--
-- Structure de la table `euipments`
--

CREATE TABLE `euipments` (
  `ID_EQUIPMENT` int(11) NOT NULL,
  `SERIAL_NUMBER` varchar(1024) NOT NULL,
  `DESCRIPTION` varchar(1024) NOT NULL,
  `MODEL` varchar(1024) NOT NULL,
  `MARQUE` varchar(1024) NOT NULL,
  `TYPE` varchar(1024) NOT NULL,
  `ENTITE` varchar(1024) NOT NULL,
  `DATE_ACHAT` varchar(1024) NOT NULL,
  `DATE_FIN_GARENTIE` date NOT NULL,
  `VENDEUR` varchar(1024) NOT NULL,
  `RESPO_MAINTENANCE` varchar(1024) NOT NULL,
  `DATE_DEBUT_MAINTENANCE` date NOT NULL,
  `DATE_FIN_MAINTENANCE` date NOT NULL,
  `ASSURANCE` varchar(1024) NOT NULL,
  `ID_LICENCE` varchar(1024) NOT NULL,
  `CPU` varchar(1024) NOT NULL,
  `MEMOIRE` varchar(1024) NOT NULL,
  `NOMBRE_DISKS` varchar(1024) NOT NULL,
  `DATE_D_ASSURANCE` date NOT NULL,
  `DATE_F_ASSURANCE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `euipments`
--

INSERT INTO `euipments` (`ID_EQUIPMENT`, `SERIAL_NUMBER`, `DESCRIPTION`, `MODEL`, `MARQUE`, `TYPE`, `ENTITE`, `DATE_ACHAT`, `DATE_FIN_GARENTIE`, `VENDEUR`, `RESPO_MAINTENANCE`, `DATE_DEBUT_MAINTENANCE`, `DATE_FIN_MAINTENANCE`, `ASSURANCE`, `ID_LICENCE`, `CPU`, `MEMOIRE`, `NOMBRE_DISKS`, `DATE_D_ASSURANCE`, `DATE_F_ASSURANCE`) VALUES
(2, 'tfyvgjnk', 'gbhnjk;l', 'vhnj,k', 'vhnj,k', 'server', 'linux', '2018-06-27', '2018-07-12', 'vhnj,k', 'vhnj,k', '2018-07-11', '2018-07-21', '', 'vhnj,k', 'nqj,klf5', '98z52ef6', '', '0000-00-00', '0000-00-00'),
(5, 'iajenf', 'isdjn', 'idjnc', 'ijnc', 'ecran', 'linux', '2018-06-27', '2018-07-05', 'osvdjn', 'oejne', '2018-07-13', '2018-07-12', '', 'sdnjcsdojn', '', '', '', '0000-00-00', '0000-00-00'),
(7, 'kljlk', 'uh', 'jkn', 'kn', 'server', 'user', '', '0000-00-00', 'k', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00'),
(8, 'kjfkmgKL?lk,nLN', 'nl', 'n', 'ln', 'server', 'user', '2018-07-19', '2018-07-17', 'l', 'lkdjfdl', '2018-07-12', '2018-07-13', '', 'ljhljn', '', '', '', '0000-00-00', '0000-00-00'),
(109, '', '', '', '', 'software', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '26904052_825708430950384_3293230632827424561_n.jpg', '', '', '', '', '0000-00-00', '0000-00-00'),
(110, '', '', '', '', 'server', 'linux/unix', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '26904052_825708430950384_3293230632827424561_n.jpg', '', '', '', '', '0000-00-00', '0000-00-00'),
(112, '9999999', 'kjli', 'jhbkjnb', 'klnjlk', 'server', 'virtualisation', '2018-08-22', '2018-08-22', 'lkjn', '54654564', '0000-00-00', '0000-00-00', '5584d0cc02f8305a8e51050bf05faee9.jpg', '', '', '', '', '2018-08-16', '2018-08-30'),
(113, 'hgh', 'ljh', 'jl', 'njk', 'server', 'linux/unix', '2018-08-25', '2018-08-14', 'bjk', 'hjl', '0000-00-00', '2017-07-12', '_99372497_whatsubject.jpg', '', '', '', '', '2018-08-28', '2018-08-28'),
(114, 'bkhb', 'b', 'kh', 'bk', 'hmc', 'linux/unix', '2018-07-31', '2018-08-15', 'hb', ',nlkj', '2018-07-30', '2018-07-31', '_99372497_whatsubject.jpg', '', '', '', '', '2018-08-21', '2018-08-27'),
(115, 'yuhgiughiuhikuh', 'uhjoihjoij', 'ujhbkjhnkj', 'hnljl', 'server', 'linux/unix', '2016-04-06', '2016-09-05', 'hn', 'hhhhhhhhhhhhhhh hyhhhh', '0000-00-00', '0000-00-00', '120b2ac474907cfac0f1b6bbee82a78b.jpg', '', 'iuhgiu', 'uh', 'u', '2018-07-31', '2018-08-31'),
(116, '6546546546', 'POWER8', 'MA1704', 'IBM', 'Server', 'linux/unix', '2016-08-09', '2020-09-12', 'Forum', 'MicroData', '0000-00-00', '0000-00-00', 'CV 2018 pfe.pdf', '', '', '', '', '2017-07-01', '2021-12-05');

-- --------------------------------------------------------

--
-- Structure de la table `licences`
--

CREATE TABLE `licences` (
  `ID_LICENCE` int(11) NOT NULL,
  `DESCRPTION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `nom_marque` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id`, `nom_marque`) VALUES
(1, 'IBM'),
(2, 'HP'),
(3, 'Vware'),
(4, 'Microsoft'),
(5, 'Dell'),
(6, 'Fujetsu'),
(7, 'EMC'),
(8, 'EMC-Dell');

-- --------------------------------------------------------

--
-- Structure de la table `ste_assurance`
--

CREATE TABLE `ste_assurance` (
  `id` int(11) NOT NULL,
  `nom_ste` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ste_assurance`
--

INSERT INTO `ste_assurance` (`id`, `nom_ste`) VALUES
(1, 'ste 1 '),
(2, 'ste 2');

-- --------------------------------------------------------

--
-- Structure de la table `ste_maintenance`
--

CREATE TABLE `ste_maintenance` (
  `id` int(11) NOT NULL,
  `nom_ste` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ste_maintenance`
--

INSERT INTO `ste_maintenance` (`id`, `nom_ste`) VALUES
(1, 'Forum'),
(2, 'Atos'),
(3, 'IB-Maroc'),
(4, 'MuniSYS'),
(5, 'MicroData');

-- --------------------------------------------------------

--
-- Structure de la table `ste_vendeur`
--

CREATE TABLE `ste_vendeur` (
  `id` int(11) NOT NULL,
  `nom_ste` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ste_vendeur`
--

INSERT INTO `ste_vendeur` (`id`, `nom_ste`) VALUES
(1, 'Forum'),
(2, 'Atos'),
(3, 'IB-Maroc'),
(4, 'MuniSYS'),
(5, 'MicroData'),
(6, 'IBM'),
(7, 'HP'),
(8, 'Vware'),
(9, 'Microsoft'),
(10, 'Dell'),
(11, 'Fujetsu'),
(12, 'EMC'),
(13, 'EMC-Dell'),
(14, 'Bravosolution');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(1024) NOT NULL,
  `LOGIN` varchar(1024) NOT NULL,
  `PASSWORD` varchar(1024) NOT NULL,
  `ENTITE` varchar(1024) NOT NULL,
  `TYPE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `LOGIN`, `PASSWORD`, `ENTITE`, `TYPE`) VALUES
(3, 'hichame', 'hichame', 'de6eb7a868d231772bc52984f7822481', 'linux/unix', 'utilisateur'),
(4, '', 'oussama', '3910dd2d465bc1bc499d47c7ca86d435', 'storage/backup', 'utilisateur'),
(6, '', 'back', '469bba0a564235dfceede42db14f17b0', 'backOffice', 'utilisateur'),
(8, '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
(9, 'sliman', 'slio', 'slio', 'virtualisation', 'utilisateur'),
(10, 'visiteur', 'visit', '9de70f6546b2452f6e7b98b46ac36070', 'linux/unix', 'visiteur');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `entite`
--
ALTER TABLE `entite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equip_type`
--
ALTER TABLE `equip_type`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `euipments`
--
ALTER TABLE `euipments`
  ADD PRIMARY KEY (`ID_EQUIPMENT`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ste_assurance`
--
ALTER TABLE `ste_assurance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ste_maintenance`
--
ALTER TABLE `ste_maintenance`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `ste_vendeur`
--
ALTER TABLE `ste_vendeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `entite`
--
ALTER TABLE `entite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `equip_type`
--
ALTER TABLE `equip_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `euipments`
--
ALTER TABLE `euipments`
  MODIFY `ID_EQUIPMENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `ste_assurance`
--
ALTER TABLE `ste_assurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ste_maintenance`
--
ALTER TABLE `ste_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ste_vendeur`
--
ALTER TABLE `ste_vendeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
