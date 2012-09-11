-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 11. Sep 2012 um 19:07
-- Server Version: 5.5.24
-- PHP-Version: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `jubitripbooker`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`tid`),
  KEY `tid` (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Daten für Tabelle `bookings`
--

INSERT INTO `bookings` (`id`, `uid`, `tid`) VALUES
(5, 1, 6),
(6, 1, 7),
(7, 1, 10),
(21, 1, 15),
(22, 1, 21),
(20, 1, 22),
(23, 1, 26),
(24, 1, 28),
(9, 2, 2),
(10, 2, 7),
(8, 2, 23),
(14, 3, 4),
(13, 3, 5),
(15, 3, 9),
(16, 3, 16),
(17, 3, 19),
(12, 3, 22),
(18, 3, 25),
(19, 3, 28),
(29, 4, 8),
(30, 4, 14),
(28, 4, 23);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `day` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Daten für Tabelle `locations`
--

INSERT INTO `locations` (`id`, `name`, `day`) VALUES
(3, 'Zeebrugge', 3),
(4, 'Le-Havre', 4),
(5, 'Southampton', 5),
(6, 'La-Coruna', 7),
(7, 'Lisbon', 9),
(8, 'Cadiz', 10),
(9, 'Mallorca', 12),
(10, 'Hamburg', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lid` (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Daten für Tabelle `trips`
--

INSERT INTO `trips` (`id`, `lid`, `title`, `cost`) VALUES
(1, 3, 'Brugge on foot and by boat', 59),
(2, 3, 'Brugge with beer tasting', 65),
(3, 4, 'Normandy scenic drive', 49),
(4, 4, 'Transfer to Paris', 69),
(5, 3, 'With canal boat by Gent', 39),
(6, 3, 'A day in the capital: Brussels', 69),
(7, 4, 'Paris Seine River Cruise', 119),
(8, 4, 'An afternoon in Honfleur', 29),
(9, 5, 'Stonehenge and Salisbury ', 55),
(10, 5, 'Windsor Castle', 75),
(11, 5, 'Tower of London, Covent Garden and Harrods  ', 85),
(12, 5, 'Visit to Buckingham Palace', 89),
(13, 6, 'Sightseeing', 49),
(14, 6, 'Santiago de Compostela ', 55),
(15, 6, 'Santiago from the sky', 99),
(16, 6, 'The Road to Santiago', 75),
(17, 7, 'Lisbon highlights and visit the Oceanarium', 49),
(18, 7, 'Panoramic tour by bus and boat', 69),
(19, 7, 'Jeep tour and wine tasting', 79),
(21, 7, 'Traditional Fado evening', 89),
(22, 10, 'Sightseeing of the Reeperbahn', 29),
(23, 10, 'Harbor tour', 39),
(24, 8, 'Panoramic tour of Cadiz', 39),
(25, 8, 'Rapid Quad Tour', 69),
(26, 8, 'The Rock of Gibraltar', 69),
(27, 8, 'Trekking in the Natural Park of La Brena', 55),
(28, 9, 'Beach tour', 29),
(29, 9, 'Sightseeing tour', 49);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `number`) VALUES
(1, 'Paris', 'Hilton', 100000),
(2, 'Taylor', 'Otwell', 100001),
(3, 'Lionel', 'Messi', 100002),
(4, 'Jubi', 'Dition', 100003);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `trips` (`id`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `locations` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
