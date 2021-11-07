-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Gegenereerd op: 07 nov 2021 om 21:44
-- Serverversie: 8.0.17
-- PHP-versie: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_onee`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `idGebruiker` int(11) NOT NULL,
  `Naam_Gebruiker` varchar(45) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Stad` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Telefoonnummer` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`idGebruiker`, `Naam_Gebruiker`, `Address`, `Stad`, `Email`, `wachtwoord`, `Telefoonnummer`, `role`) VALUES
(1, 'Dannyyy', 'monarch vlinderlaan 7', 'Culemborg', 'danny@gmail.com', '662c67141c20e7f8730607d8a22aab33088f766c28101b554f1a177e22d45dc7', '613274566', 1),
(5, 'DannyTest', 'Monachvlinderlaan 7', 'Culemborg', 'danny@gmail.com', '662c67141c20e7f8730607d8a22aab33088f766c28101b554f1a177e22d45dc7', '646508497', 1),
(6, 'Danny van Gasterennn', 'Merelweg 14', 'Culemborg', 'dokterdanny@gmail.com', '662c67141c20e7f8730607d8a22aab33088f766c28101b554f1a177e22d45dc7', '06 84412154', 3),
(9, 'Danny Apotheekk', 'apotheeklaan 2', 'Culemborg', 'Dannyapotheek@gmail.com', '662c67141c20e7f8730607d8a22aab33088f766c28101b554f1a177e22d45dc7', '068874841', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijnen`
--

CREATE TABLE `medicijnen` (
  `idMedicijnen` int(11) NOT NULL,
  `Naam_Medicijn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `medicijnen`
--

INSERT INTO `medicijnen` (`idMedicijnen`, `Naam_Medicijn`) VALUES
(4, 'test medicijnn');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patient`
--

CREATE TABLE `patient` (
  `idPatient` int(11) NOT NULL,
  `Zilverenkruisnummer` varchar(11) NOT NULL,
  `Voornaam` varchar(45) NOT NULL,
  `Tussenvoegsel` varchar(45) DEFAULT NULL,
  `Achternaam` varchar(45) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `Email_Patient` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Telefoonnummer` varchar(255) NOT NULL,
  `Bezonderheden` varchar(255) DEFAULT NULL,
  `Arts_idArts` int(11) NOT NULL,
  `Apotheek_idApotheek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `patient`
--

INSERT INTO `patient` (`idPatient`, `Zilverenkruisnummer`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Geboortedatum`, `Email_Patient`, `Telefoonnummer`, `Bezonderheden`, `Arts_idArts`, `Apotheek_idApotheek`) VALUES
(6, '151', 'Dannyy', 'van', 'Gasteren', '2021-09-17', 'dannyvangasteren14@gmail.com', '0646508497', ' testen ', 6, 9),
(7, '351', 'Jay', 'van', 'Schaik', '2021-09-01', 'jay@gmail.com', '06844844', 'niks', 6, 9),
(8, '4545', 'Mayra', 'van', 'Jansen', '2002-10-11', 'mayra@gmail.com', '06784554', NULL, 6, 9);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patient_has_medicijnen`
--

CREATE TABLE `patient_has_medicijnen` (
  `id` int(11) NOT NULL,
  `Patient_idPatient` int(11) NOT NULL,
  `Medicijnen_idMedicijnen` int(11) NOT NULL,
  `Dosis` varchar(45) NOT NULL,
  `Duur` date NOT NULL,
  `Duur_tot` date NOT NULL,
  `afgeleverd` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `patient_has_medicijnen`
--

INSERT INTO `patient_has_medicijnen` (`id`, `Patient_idPatient`, `Medicijnen_idMedicijnen`, `Dosis`, `Duur`, `Duur_tot`, `afgeleverd`) VALUES
(1, 6, 4, '50MG', '2021-11-03', '2021-11-10', 1),
(2, 6, 4, '20mg', '2021-11-05', '2021-11-12', 0),
(5, 6, 4, '20mg', '2021-11-02', '2021-11-04', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`idGebruiker`);

--
-- Indexen voor tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  ADD PRIMARY KEY (`idMedicijnen`);

--
-- Indexen voor tabel `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idPatient`),
  ADD KEY `fk_patient_gebruikers1_idx` (`Arts_idArts`),
  ADD KEY `fk_patient_gebruikers2_idx` (`Apotheek_idApotheek`);

--
-- Indexen voor tabel `patient_has_medicijnen`
--
ALTER TABLE `patient_has_medicijnen`
  ADD PRIMARY KEY (`Patient_idPatient`,`Medicijnen_idMedicijnen`,`id`),
  ADD KEY `fk_Patient_has_Medicijnen_Medicijnen1_idx` (`Medicijnen_idMedicijnen`),
  ADD KEY `fk_Patient_has_Medicijnen_Patient_idx` (`Patient_idPatient`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `idGebruiker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `idMedicijnen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `idPatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `patient_has_medicijnen`
--
ALTER TABLE `patient_has_medicijnen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_patient_gebruikers1` FOREIGN KEY (`Arts_idArts`) REFERENCES `gebruikers` (`idGebruiker`),
  ADD CONSTRAINT `fk_patient_gebruikers2` FOREIGN KEY (`Apotheek_idApotheek`) REFERENCES `gebruikers` (`idGebruiker`);

--
-- Beperkingen voor tabel `patient_has_medicijnen`
--
ALTER TABLE `patient_has_medicijnen`
  ADD CONSTRAINT `fk_Patient_has_Medicijnen_Medicijnen1` FOREIGN KEY (`Medicijnen_idMedicijnen`) REFERENCES `medicijnen` (`idMedicijnen`),
  ADD CONSTRAINT `fk_Patient_has_Medicijnen_Patient` FOREIGN KEY (`Patient_idPatient`) REFERENCES `patient` (`idPatient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
