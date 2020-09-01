-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 dec 2019 om 11:23
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportwedstrijd`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `adresgegevens`
--

CREATE TABLE `adresgegevens` (
  `ID` int(11) NOT NULL,
  `adres` varchar(22) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `woonplaats` varchar(22) NOT NULL,
  `gebr_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `adresgegevens`
--

INSERT INTO `adresgegevens` (`ID`, `adres`, `postcode`, `woonplaats`, `gebr_ID`) VALUES
(2, 'Slochterweg 1b', '9635TA', 'AMSTERDAM', 4),
(3, 'slochterweg 1b', '1234QQ', 'AMSTERDAM', 13),
(4, 'Slochterweg 1b', '1234EE', 'GRONINGEN', 5),
(5, 'Slochterweg 1b', '3211QE', 'ROTTERDAM', 6),
(8, 'Hoofdweg', '1231IO', 'HEERENVEEN', 7),
(10, 'Laan 234', '9744AS', 'ASSEN', 8),
(11, 'Beverweg', '1234BB', 'BEVERWIJK', 9),
(16, 'hoofdweg 4', '9621QL', 'HEERENVEEN', 8),
(17, 'meentweg 1', '9624PA', 'SCHILDWOLDE', 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bankgegevens`
--

CREATE TABLE `bankgegevens` (
  `ID` int(11) NOT NULL,
  `gebr_ID` int(11) NOT NULL,
  `IBAN` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bankgegevens`
--

INSERT INTO `bankgegevens` (`ID`, `gebr_ID`, `IBAN`) VALUES
(2, 4, 'NL22RABO0478106636'),
(3, 13, 'NL22RABO0478106636'),
(4, 5, 'NL22RABO0478101234'),
(5, 6, 'NL22RABO0478101234'),
(8, 7, 'NL22RABO0478101234'),
(10, 8, 'NL22RABO0478101234'),
(11, 9, 'NL22RABO0478106636'),
(12, 14, 'NL22RABO0478101234'),
(13, 5, 'NL22RABO0478101234');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chipnummer`
--

CREATE TABLE `chipnummer` (
  `chipnummer` int(11) NOT NULL,
  `pers_id` int(11) NOT NULL,
  `tijd` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `chipnummer`
--

INSERT INTO `chipnummer` (`chipnummer`, `pers_id`, `tijd`) VALUES
(43, 2, '04:32:04'),
(44, 3, '04:09:27'),
(45, 4, '02:25:07'),
(46, 5, '02:04:13'),
(47, 11, '02:36:36'),
(48, 12, '04:33:16'),
(49, 13, '05:40:12'),
(50, 18, '02:06:15'),
(51, 22, '04:38:48');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactgegevens`
--

CREATE TABLE `contactgegevens` (
  `ID` int(11) NOT NULL,
  `gebr_ID` int(11) NOT NULL,
  `telefoonnummer` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contactgegevens`
--

INSERT INTO `contactgegevens` (`ID`, `gebr_ID`, `telefoonnummer`) VALUES
(2, 4, '0612656166'),
(3, 13, '0612656166'),
(4, 5, '0612656167'),
(5, 6, '0612656166'),
(8, 7, '0612757177'),
(10, 8, '0652547878'),
(11, 9, '0612656166'),
(12, 14, '0652547878'),
(13, 5, '0612656166');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `ID` int(11) NOT NULL,
  `gebruikersnaam` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `wachtwoord` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`ID`, `gebruikersnaam`, `email`, `wachtwoord`) VALUES
(1, 'Admin', '0', '$2y$10$1ybGKNY2.3A7bRIYWYmXXeM45S9p4t519/YgllbeSlqZ6rNJHBKRi'),
(5, 'Henk', 'hj@hotmail.com', '$2y$10$9i0mC7LctZhE3cnTAXNkc.HhGuX0TEYRiHstESu2D8cTEiFpqt//q'),
(6, 'peet', 'jow@hotmail.com', '$2y$10$NXYMh2NCulafCo8bMpcAQuJN2XNWusJMI.W/Yo4ZIt3l4p261RJ9O'),
(7, 'Mike', '123123@hotmail.com', '$2y$10$puAbEXzZ226QUEPIL/tdLeAIM7Hz0XU3QTpCzgCz/YTu7NWCmRo3e'),
(8, 'HansV', 'hvenema@reacollege.net', '$2y$10$zzOWwHrb7/ETS9aqsKHLrOtbF13p6FJU8FUX9vAEyWxnWbWzMnxmC'),
(10, 'asd', 'a12345@hotmail.com', '$2y$10$PgB2qXu/SJOdLzBcOUohDeJlMkIzcrzn1WFw.8bo6VvgF.cz/cbg.'),
(12, 'pony', 'pony12435@hotmail.com', '$2y$10$m4s4bEvKr1lPNdy/JexnSO/ca0kcCEFqFa575oePWEBwG.9dPi.G.'),
(13, 'gebruikersnaam', 'g@hotmail.com', '$2y$10$g5bA6kxundwa68dDzV7Zfuev9pM5wz4O0ZzVj/4z8guEx.y1hY4J.'),
(14, 'genghis', 'g.khan@hotmail.com', '$2y$10$WYzkfvVi.2iICf.WA0OEKuwPJHzFBzuVAkAHtASzRmKeCAe0N68l.'),
(15, 'asdasd', 'asd@hotmail.com', '$2y$10$mf/QwL/uj2ANW0SRgeQFmul5AD9wtnjBxh0U3SKPbRg30pmynPKSi');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inschrijving`
--

CREATE TABLE `inschrijving` (
  `ID` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `gebr_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `inschrijving`
--

INSERT INTO `inschrijving` (`ID`, `datum`, `gebr_ID`) VALUES
(2, '2019-05-08 10:09:49', 4),
(3, '2019-05-08 10:29:14', 13),
(4, '2019-05-13 01:14:49', 5),
(5, '2019-05-20 01:29:21', 6),
(8, '2019-05-20 02:21:40', 7),
(10, '2019-05-21 01:29:38', 8),
(11, '2019-05-22 02:57:02', 9),
(12, '2019-05-23 11:13:15', 14),
(13, '2019-06-05 01:47:34', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoonsgegevens`
--

CREATE TABLE `persoonsgegevens` (
  `ID` int(11) NOT NULL,
  `voornaam` varchar(22) NOT NULL,
  `achternaam` varchar(22) NOT NULL,
  `geboortedatum` date NOT NULL,
  `geslacht` varchar(1) NOT NULL,
  `gebr_ID` int(11) NOT NULL,
  `datum_inschrijving` datetime DEFAULT NULL,
  `telefoonnummer` char(10) DEFAULT NULL,
  `IBAN` varchar(18) DEFAULT NULL,
  `adres` varchar(22) DEFAULT NULL,
  `postcode` varchar(6) DEFAULT NULL,
  `woonplaats` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `persoonsgegevens`
--

INSERT INTO `persoonsgegevens` (`ID`, `voornaam`, `achternaam`, `geboortedatum`, `geslacht`, `gebr_ID`, `datum_inschrijving`, `telefoonnummer`, `IBAN`, `adres`, `postcode`, `woonplaats`) VALUES
(2, 'jaap-jan', 'jansen', '1999-08-04', 'M', 13, '2019-05-08 10:29:14', '0612656166', 'NL22RABO0478106636', 'slochterweg 1b', '1234QQ', 'AMSTERDAM'),
(3, 'Peet', 'Bijen', '1990-03-04', 'M', 6, '2019-05-20 01:29:21', '0612656166', 'NL22RABO0478101234', 'Slochterweg 1b', '3211QE', 'ROTTERDAM'),
(4, 'Mike', 'Meijers', '1998-03-04', 'M', 7, '2019-05-20 02:21:40', '0612757177', 'NL22RABO0478101234', 'Hoofdweg', '1231IO', 'HEERENVEEN'),
(5, 'Jan', 'Doedel', '2000-01-10', 'M', 8, '2019-05-21 01:29:38', '0652547878', 'NL22RABO0478101234', 'Laan 234', '9744AS', 'ASSEN'),
(11, 'kees', 'jansen', '1996-03-08', 'M', 0, '2019-06-19 03:07:31', '0612345658', ' NL22RABO047810673', 'hoofdweg 1', '9621AL', 'GRONINGEN'),
(12, 'Hans', 'Klok', '1993-02-06', 'M', 0, '2019-06-26 09:35:11', '0612245658', ' NL22RABO047810675', 'hoofdweg 2', '9623BL', 'UTRECHT'),
(13, 'Genghis', 'Khan', '2002-02-04', 'M', 14, '2019-06-26 12:04:27', '0612656161', 'NL22RABO1123123123', 'BA', '1234PA', 'LEEUWARDEN'),
(18, 'Henk', 'Jansma', '1989-01-01', 'M', 5, '2019-07-02 01:39:14', '0612656166', 'NL22RABO0478106636', 'E', '1234PA', 'AMSTERDAM'),
(22, 'Henk', 'Jansma', '1994-04-04', 'M', 5, '2019-07-03 10:07:05', '0612656166', 'NL22RABO0478104321', 'B', '1234PA', 'AMSTERDAM');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `adresgegevens`
--
ALTER TABLE `adresgegevens`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `bankgegevens`
--
ALTER TABLE `bankgegevens`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `chipnummer`
--
ALTER TABLE `chipnummer`
  ADD PRIMARY KEY (`chipnummer`);

--
-- Indexen voor tabel `contactgegevens`
--
ALTER TABLE `contactgegevens`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `inschrijving`
--
ALTER TABLE `inschrijving`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `persoonsgegevens`
--
ALTER TABLE `persoonsgegevens`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `adresgegevens`
--
ALTER TABLE `adresgegevens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `bankgegevens`
--
ALTER TABLE `bankgegevens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `chipnummer`
--
ALTER TABLE `chipnummer`
  MODIFY `chipnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT voor een tabel `contactgegevens`
--
ALTER TABLE `contactgegevens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `inschrijving`
--
ALTER TABLE `inschrijving`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `persoonsgegevens`
--
ALTER TABLE `persoonsgegevens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
