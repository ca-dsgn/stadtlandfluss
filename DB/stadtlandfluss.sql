-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 12. Jun 2012 um 18:59
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `stadtlandfluss`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `Comment_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Video_ID` int(10) unsigned NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `text` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`Comment_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`Comment_ID`, `Video_ID`, `name`, `text`) VALUES
(1, 1, 'Keep', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'),
(2, 1, 'Gamsbichler', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'),
(3, 2, 'Dreckshagel', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'),
(4, 2, 'Dieter', 'Genial'),
(5, 2, 'Loreny', 'Chips sind nix, Bahlsen 4 the win');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `Image_ID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `Video_ID` int(5) DEFAULT NULL,
  PRIMARY KEY (`Image_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`Image_ID`, `url`, `alt`, `Video_ID`) VALUES
(0, 'http://www.amerika-forum.de/gallery/files/11427-LandscapeArch.jpg', 'Buntsandstein', 0),
(1, 'http://www.kidsgeo.com/images/landscape.jpg', 'See', 1),
(2, 'http://www.kidsgeo.com/images/landscape.jpg', 'See1', 2),
(3, 'http://www.blyphoto.com/images/gallery/landscape/landscape01-010.jpg', 'Gewitter', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `Person_ID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `function` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Person_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `persons`
--

INSERT INTO `persons` (`Person_ID`, `name`, `function`, `type`) VALUES
(0, 'Alex', 'kamera', 'dozent'),
(1, 'Daniela', 'Schnitt', 'dozent'),
(2, 'Christoph', 'Aufnahmeleiter', 'student');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `Tag_ID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `start` varchar(30) DEFAULT NULL,
  `end` varchar(30) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `altitude` varchar(30) DEFAULT NULL,
  `Video_ID` int(5) DEFAULT NULL,
  PRIMARY KEY (`Tag_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `tags`
--

INSERT INTO `tags` (`Tag_ID`, `start`, `end`, `name`, `longitude`, `altitude`, `Video_ID`) VALUES
(0, '10', '20', 'Stadt', '9.12938290', '49.34891530', 1),
(1, '21', '30', 'Land', '9.22938290', '49.45891530', 0),
(2, '31', '40', 'Fluss', '9.33938290', '49.55891530', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `Video_ID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `Person_ID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Video_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `videos`
--

INSERT INTO `videos` (`Video_ID`, `date`, `title`, `subtitle`, `source`, `description`, `Person_ID`) VALUES
(0, '2012-05-22 01:57:27', 'TimeLapse Marktplatz', 'Marktaufbau Untertitel', 'http://www.youtube.com/watch?v=3ZdMAk9aqU0&feature=g-upl', 'lorem ipsum... blaaaaaaaaaaaaa aaa aa aa  aaa', '1,3'),
(1, '2012-05-22 02:02:44', 'TimeLapse Burg Hornberg', 'Blick ins Neckartal Subtitle', 'http://www.youtube.com/watch?v=NSFIv7HgNdk', 'lorem... Du bist der IPSUMINATOR!!! dasddsa adawd dwdwqdw', '2,3'),
(2, '2012-06-12 13:05:11', 'Song', 'Too close', 'http://www.youtube.com/watch?v=zYXjLbMZFmo', 'Best song ever', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
