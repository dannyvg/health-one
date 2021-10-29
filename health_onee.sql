-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Gegenereerd op: 29 okt 2021 om 18:56
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
-- Tabelstructuur voor tabel `apotheek`
--

CREATE TABLE `apotheek` (
  `idApotheek` int(11) NOT NULL,
  `Naam_Apotheek` varchar(45) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Stad` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefoonnummer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `apotheek`
--

INSERT INTO `apotheek` (`idApotheek`, `Naam_Apotheek`, `Address`, `Stad`, `Email`, `Telefoonnummer`) VALUES
(1, 'Danny Apotheek', 'Merelweg 14', 'Culemborg', 'dannyApo@gmail.com', '068456451');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `arts`
--

CREATE TABLE `arts` (
  `idArts` int(11) NOT NULL,
  `Naam_Arts` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `Telefoonnummer` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `arts`
--

INSERT INTO `arts` (`idArts`, `Naam_Arts`, `Address`, `Telefoonnummer`, `Email`) VALUES
(1, 'Danny', 'Monachvlinderlaan 7', '0646508497', 'dannyArts@gmail.com'),
(3, 'Dannytest', 'Monachvlinderlaan 7', '0646508497', 'danny@test.nl'),
(4, 'Dannyy', 'Monachvlinderlaan 7', '0646508497', 'dannyy@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `idGebruiker` int(11) NOT NULL,
  `Naam_Gebruiker` varchar(45) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `Telefoonnummer` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`idGebruiker`, `Naam_Gebruiker`, `Address`, `Email`, `wachtwoord`, `Telefoonnummer`, `role`) VALUES
(1, 'Dannyyy', 'monarch vlinderlaan 7', 'danny@gmail.com', '662c67141c20e7f8730607d8a22aab33088f766c28101b554f1a177e22d45dc7', '0613274566', 1),
(5, 'DannyTest', 'Monachvlinderlaan 7', 'danny@gmail.com', '662c67141c20e7f8730607d8a22aab33088f766c28101b554f1a177e22d45dc7', '0646508497', 1),
(6, 'Danny van Gasteren', 'Merelweg 14', 'dokterdanny@gmail.com', '662c67141c20e7f8730607d8a22aab33088f766c28101b554f1a177e22d45dc7', '06 84412154', 3);

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
(1, 'Test Medicijn');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patient`
--

CREATE TABLE `patient` (
  `idPatient` int(11) NOT NULL,
  `Zilverenkruisnummer` int(11) NOT NULL,
  `Voornaam` varchar(45) NOT NULL,
  `Tussenvoegsel` varchar(45) DEFAULT NULL,
  `Achternaam` varchar(45) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefoonnummer` varchar(255) NOT NULL,
  `Bezonderheden` varchar(255) DEFAULT NULL,
  `Arts_idArts` int(11) NOT NULL,
  `Apotheek_idApotheek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `patient`
--

INSERT INTO `patient` (`idPatient`, `Zilverenkruisnummer`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Geboortedatum`, `Email`, `Telefoonnummer`, `Bezonderheden`, `Arts_idArts`, `Apotheek_idApotheek`) VALUES
(1, 151, 'Dannyyyy', 'van', 'Gasteren', '2021-09-17', 'dannyvangasteren14@gmail.com', '0646508497', ' tetsen  ', 3, 1),
(3, 351, 'Jay', 'van', 'Schaik', '2021-09-01', 'jay@gmail.com', '06844844', 'niks', 3, 1),
(4, 4545, 'Mayra', 'van', 'Jansen', '2002-10-11', 'mayra@gmail.com', '06784554', NULL, 1, 1),
(5, 555, 'Da', 'Da', 'Da', '2021-10-13', 'd@fmail.com', '0658445', 'niks', 3, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patient_has_medicijnen`
--

CREATE TABLE `patient_has_medicijnen` (
  `Patient_idPatient` int(11) NOT NULL,
  `Medicijnen_idMedicijnen` int(11) NOT NULL,
  `Dosis` varchar(45) NOT NULL,
  `Duur` date NOT NULL,
  `Duur_tot` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `patient_has_medicijnen`
--

INSERT INTO `patient_has_medicijnen` (`Patient_idPatient`, `Medicijnen_idMedicijnen`, `Dosis`, `Duur`, `Duur_tot`) VALUES
(1, 1, '50MG', '2021-10-27', '2021-10-31');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `apotheek`
--
ALTER TABLE `apotheek`
  ADD PRIMARY KEY (`idApotheek`);

--
-- Indexen voor tabel `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`idArts`);

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
  ADD PRIMARY KEY (`idPatient`,`Apotheek_idApotheek`),
  ADD KEY `fk_Patient_Arts1_idx` (`Arts_idArts`),
  ADD KEY `fk_Patient_Apotheek1_idx` (`Apotheek_idApotheek`);

--
-- Indexen voor tabel `patient_has_medicijnen`
--
ALTER TABLE `patient_has_medicijnen`
  ADD PRIMARY KEY (`Patient_idPatient`,`Medicijnen_idMedicijnen`),
  ADD KEY `fk_Patient_has_Medicijnen_Medicijnen1_idx` (`Medicijnen_idMedicijnen`),
  ADD KEY `fk_Patient_has_Medicijnen_Patient_idx` (`Patient_idPatient`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `apotheek`
--
ALTER TABLE `apotheek`
  MODIFY `idApotheek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `arts`
--
ALTER TABLE `arts`
  MODIFY `idArts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `idGebruiker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `idMedicijnen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `idPatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `FK_patient_apotheek` FOREIGN KEY (`Apotheek_idApotheek`) REFERENCES `apotheek` (`idApotheek`),
  ADD CONSTRAINT `fk_Patient_Arts1` FOREIGN KEY (`Arts_idArts`) REFERENCES `arts` (`idArts`);

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
