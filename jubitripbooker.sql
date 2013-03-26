--
-- Database: `jubitripbooker`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `password`) VALUES
(1, 'admin001', '$2a$08$DspaDN60Q8dRMKL/WUNJDekg/36F0JR7OfkZpKtSIKhrIDe7iybXm');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`tid`),
  KEY `tid` (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `uid`, `tid`) VALUES
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
(31, 4, 22);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `day` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `locations`
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
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lid` (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `lid`, `number`, `title`, `cost`) VALUES
(1, 3, 100, 'Brugge on foot and by boat', 59),
(2, 3, 101, 'Brugge with beer tasting', 65),
(3, 4, 102, 'Normandy scenic drive', 49),
(4, 4, 103, 'Transfer to Paris', 69),
(5, 3, 104, 'With canal boat by Gent', 39),
(6, 3, 105, 'A day in the capital: Brussels', 69),
(7, 4, 106, 'Paris Seine River Cruise', 119),
(8, 4, 107, 'An afternoon in Honfleur', 29),
(9, 5, 108, 'Stonehenge and Salisbury ', 55),
(10, 5, 109, 'Windsor Castle', 75),
(11, 5, 110, 'Tower of London, Covent Garden and Harrods  ', 85),
(12, 5, 111, 'Visit to Buckingham Palace', 89),
(13, 6, 112, 'Sightseeing', 49),
(14, 6, 113, 'Santiago de Compostela ', 55),
(15, 6, 114, 'Santiago from the sky', 99),
(16, 6, 115, 'The Road to Santiago', 75),
(17, 7, 116, 'Lisbon highlights and visit the Oceanarium', 49),
(18, 7, 117, 'Panoramic tour by bus and boat', 69),
(19, 7, 118, 'Jeep tour and wine tasting', 79),
(21, 7, 119, 'Traditional Fado evening', 89),
(22, 10, 120, 'Sightseeing of the Reeperbahn', 29),
(23, 10, 121, 'Harbor tour', 39),
(24, 8, 122, 'Panoramic tour of Cadiz', 39),
(25, 8, 123, 'Rapid Quad Tour', 69),
(26, 8, 124, 'The Rock of Gibraltar', 69),
(27, 8, 125, 'Trekking in the Natural Park of La Brena', 55),
(28, 9, 126, 'Beach tour', 29),
(29, 9, 127, 'Sightseeing tour', 49);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `number`) VALUES
(2, 'Taylor', 'Otwell', 100001),
(3, 'Lionel', 'Messi', 100002),
(4, 'Jubi', 'Dition', 100003),
(5, 'Kobe', 'Bryant', 100007),
(8, 'Sebastian', 'Vettel', 100011),
(10, 'Michael', 'Schumacher', 100012);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `trips` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `locations` (`id`) ON UPDATE CASCADE;
