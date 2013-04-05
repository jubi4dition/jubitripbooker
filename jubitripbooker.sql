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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `uid`, `tid`) VALUES
(9, 2, 2),
(10, 2, 7),
(32, 2, 10),
(33, 2, 16),
(34, 2, 19),
(8, 2, 23),
(35, 2, 24),
(36, 2, 29),
(14, 3, 4),
(13, 3, 5),
(15, 3, 9),
(16, 3, 16),
(17, 3, 19),
(12, 3, 22),
(18, 3, 25),
(19, 3, 28),
(82, 4, 2),
(29, 4, 8),
(38, 4, 9),
(30, 4, 14),
(39, 4, 19),
(86, 4, 23),
(40, 4, 24),
(83, 4, 28),
(43, 5, 1),
(44, 5, 7),
(45, 5, 11),
(46, 5, 15),
(47, 5, 17),
(42, 5, 22),
(48, 5, 27),
(49, 5, 28),
(61, 8, 4),
(60, 8, 6),
(62, 8, 12),
(63, 8, 16),
(64, 8, 17),
(59, 8, 23),
(65, 8, 25),
(66, 8, 28),
(53, 10, 8),
(54, 10, 11),
(55, 10, 15),
(56, 10, 19),
(57, 10, 25),
(58, 10, 29),
(68, 11, 1),
(69, 11, 7),
(70, 11, 9),
(71, 11, 16),
(67, 11, 23),
(88, 12, 6),
(89, 12, 7),
(90, 12, 11),
(91, 12, 13),
(92, 12, 19),
(87, 12, 23),
(93, 12, 25),
(94, 12, 28),
(120, 13, 6),
(121, 13, 8),
(122, 13, 12),
(123, 13, 15),
(124, 13, 21),
(119, 13, 23),
(125, 13, 24),
(126, 13, 29),
(105, 15, 4),
(104, 15, 6),
(106, 15, 11),
(107, 15, 14),
(108, 15, 21),
(103, 15, 23),
(109, 15, 26),
(110, 15, 28),
(112, 16, 2),
(113, 16, 7),
(114, 16, 10),
(115, 16, 16),
(116, 16, 17),
(111, 16, 23),
(117, 16, 25),
(118, 16, 29),
(96, 17, 2),
(97, 17, 3),
(98, 17, 10),
(99, 17, 14),
(100, 17, 19),
(95, 17, 22),
(101, 17, 25),
(102, 17, 28);

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
  `title` varchar(128) NOT NULL,
  `cost` int(11) NOT NULL,
  `places` int(11) NOT NULL DEFAULT '20',
  PRIMARY KEY (`id`),
  KEY `lid` (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `lid`, `number`, `title`, `cost`, `places`) VALUES
(1, 3, 100, 'Brugge on foot and by boat', 59, 20),
(2, 3, 101, 'Brugge with beer tasting', 65, 20),
(3, 4, 102, 'Normandy scenic drive', 49, 20),
(4, 4, 103, 'Transfer to Paris', 69, 20),
(5, 3, 104, 'With canal boat by Gent', 39, 20),
(6, 3, 105, 'A day in the capital: Brussels', 69, 20),
(7, 4, 106, 'Paris Seine River Cruise', 119, 20),
(8, 4, 107, 'An afternoon in Honfleur', 29, 20),
(9, 5, 108, 'Stonehenge and Salisbury ', 55, 20),
(10, 5, 109, 'Windsor Castle', 75, 20),
(11, 5, 110, 'Tower of London, Covent Garden and Harrods  ', 85, 20),
(12, 5, 111, 'Visit to Buckingham Palace', 89, 20),
(13, 6, 112, 'Sightseeing', 49, 20),
(14, 6, 113, 'Santiago de Compostela ', 55, 20),
(15, 6, 114, 'Santiago from the sky', 99, 20),
(16, 6, 115, 'The Road to Santiago', 75, 20),
(17, 7, 116, 'Lisbon highlights and visit the Oceanarium', 49, 20),
(18, 7, 117, 'Panoramic tour by bus and boat', 69, 20),
(19, 7, 118, 'Jeep tour and wine tasting', 79, 20),
(21, 7, 119, 'Traditional Fado evening', 89, 20),
(22, 10, 120, 'Sightseeing of the Reeperbahn', 29, 20),
(23, 10, 121, 'Harbor tour', 39, 20),
(24, 8, 122, 'Panoramic tour of Cadiz', 39, 20),
(25, 8, 123, 'Rapid Quad Tour', 69, 20),
(26, 8, 124, 'The Rock of Gibraltar', 69, 20),
(27, 8, 125, 'Trekking in the Natural Park of La Brena', 55, 20),
(28, 9, 126, 'Beach tour', 29, 20),
(29, 9, 127, 'Sightseeing tour', 49, 20);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `number`) VALUES
(2, 'Taylor', 'Otwell', 100001),
(3, 'Lionel', 'Messi', 100002),
(4, 'Jubi', 'Dition', 100003),
(5, 'Kobe', 'Bryant', 100007),
(8, 'Sebastian', 'Vettel', 100011),
(10, 'Michael', 'Schumacher', 100012),
(11, 'Sabine', 'Lisicki', 100013),
(12, 'Michael', 'Ballack', 100014),
(13, 'Katy', 'Perry', 100015),
(15, 'Kate', 'Upton', 100017),
(16, 'Felix', 'Baumgartner', 100018),
(17, 'Usain', 'Bolt', 100019);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`tid`) REFERENCES `trips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `locations` (`id`) ON UPDATE CASCADE;
