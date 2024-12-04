-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 04 Décembre 2024 à 08:22
-- Version du serveur :  5.6.20-log
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cyberfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `autres`
--

CREATE TABLE IF NOT EXISTS `autres` (
  `Titre` text NOT NULL,
  `Texte` text NOT NULL,
  `Nom` text NOT NULL,
  `type` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `autres`
--

INSERT INTO `autres` (`Titre`, `Texte`, `Nom`, `type`) VALUES
('presentation', 'Ã‰tant un Ã©tudiant passionnÃ© de cyber et motivÃ© dâ€™apprendre toujours plus, jâ€™ai dÃ©cidÃ© d''intÃ©grer cette annÃ©e une Ã©cole de cybersÃ©curitÃ© (Guardia Cybersecurity School) Ã  Lyon. Cette premiÃ¨re annÃ©e dans le bachelor â€œdÃ©veloppeur informatique option cybersÃ©curitÃ©â€ va me permettre d''acquÃ©rir des bases solides en culture cyber, Dev SecOps, sÃ©curitÃ© ISR (Infrastructure SystÃ¨me & RÃ©seau) et en rÃ©tro-ingÃ©nierie. Pointilleux et coopÃ©ratif, je recherche activement un stage dans le domaine de la cybersÃ©curitÃ© pour une durÃ©e de 2 Ã  4 mois entre MAI et SEPTEMBRE 2025. Test', 'emile', ''),
('Sapeur-Pompier', 'Après 6 années de formation intence en tant que Jeune Sapeur-Pompier, je suis rentrer Sapeur-Pompier Volontaire au centre de secours de Seyssel en septembre 2023.', 'emile', 'activiter'),
('Musique - Accodeon', 'Depuis 10 ans dont 6ans en Ã©cole de musique.', 'emile', 'activiter'),
('Test', '1234', 'emile', 'activiter'),
('presentation', 'texte de presenntation à mettre ici', 'emeric', ''),
('activiter1', 'texte activiter', 'emeric', 'activiter'),
('activiter2', 'texte activiter', 'emeric', 'activiter'),
('activiter3', 'texte activiter', 'emeric', 'activiter'),
('presentation', 'texte à mettre ici', 'ilyass', ''),
('presentation', 'heuilfhbeifsirbvdsivbdrdovirvjoqmrfvrvr', 'dimitri', ''),
('activiter1', 'texte à mettre ici', 'dimitri', 'activiter'),
('activiter2', 'texte à mettre ici', 'dimitri', 'activiter'),
('activiter3', 'texte à mettre ici', 'dimitri', 'activiter'),
('activiter3', 'texte à mettre ici', 'ilyass', 'activiter'),
('activiter2', 'texte à mettre ici', 'ilyass', 'activiter'),
('activiter1', 'texte à mettre ici', 'ilyass', 'activiter');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `Competence2` text NOT NULL,
  `Fichier` text NOT NULL,
  `description` text NOT NULL,
  `nom` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `competence2`
--

CREATE TABLE IF NOT EXISTS `competence2` (
  `Competence` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
`ID` int(11) NOT NULL,
  `Titre` text NOT NULL,
  `Date1` text NOT NULL,
  `Texte` text NOT NULL,
  `Competence1` text NOT NULL,
  `Competence2` int(11) NOT NULL,
  `Competence3` int(11) NOT NULL,
  `Nom` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
`ID` int(11) NOT NULL,
  `Titre` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date1` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Texte` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Competence1` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Competence2` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Competence3` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fichier` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=35 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`ID`, `Titre`, `Date1`, `Texte`, `Competence1`, `Competence2`, `Competence3`, `Fichier`, `Nom`) VALUES
(1, 'Pentest', 'Octobre 2024', 'AZZABI Arij nous a introduit la cybersecurite avec un premier projet de Pentest. <br>                Connaissances :<br>                - Outil de Collaboration (Git)<br>                - Utilisation de Kali Linux a l''aide d''une machine virtuel<br>                - Hebergement un site PHP en localhost (Uwamp, Docker)<br>                - Decouverte d''outil de Pentest (BurpSuit)<br>                - Injection SQL, Modification des requetes http, Broken Access Control, Inclusion de Fichier<br><br>                                Missions :<br>                - S''entrainer sur un site en localhost (Owasp Bricks)<br>                - Produire un rapport de test d''intrusion', 'Injection SQL', 'BURPSuit', 'Owasp', '../folder/emile/pentest.pdf', 'emile');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
