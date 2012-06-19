-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 19. Jun 2012 um 15:11
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
  `Video_ID` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`Image_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`Image_ID`, `url`, `alt`, `Video_ID`) VALUES
(0, '/img/grid/motorcross_main.png', 'Test', 0),
(1, '/img/grid/motorcross_main.png', 'Test', 0),
(2, '/img/grid/motorcross_main.png', 'Test', 0),
(3, '/img/grid/motorcross_main.png', 'Test', 5),
(4, '/img/grid/motorcross_main.png', 'Test', 1),
(5, '/img/grid/motorcross_main.png', 'Test', 1),
(6, '/img/grid/motorcross_main.png', 'Test', 4),
(7, '/img/grid/motorcross_main.png', 'Test', 4),
(8, '/img/grid/motorcross_main.png', 'Test', 4),
(9, '/img/grid/motorcross_main.png', 'Test', 3),
(10, '/img/grid/motorcross_main.png', 'Test', 3),
(11, '/img/grid/motorcross_main.png', 'Test', 3),
(12, '/img/grid/motorcross_main.png', 'Test', 2),
(13, '/img/grid/motorcross_main.png', 'Test', 2),
(14, '/img/grid/motorcross_main.png', 'Test', 2),
(15, '/img/grid/motorcross_main.png', 'Test', 1),
(16, '/img/grid/motorcross_main.png', 'Test', 5),
(17, '/img/grid/motorcross_main.png', 'Test', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `person2video`
--

CREATE TABLE IF NOT EXISTS `person2video` (
  `p2v_ID` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `Video_ID` int(5) unsigned DEFAULT NULL,
  `Person_ID` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`p2v_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `person2video`
--

INSERT INTO `person2video` (`p2v_ID`, `Video_ID`, `Person_ID`) VALUES
(0, 0, 0),
(1, 0, 1),
(2, 0, 2),
(3, 1, 1),
(4, 1, 2),
(5, 2, 0),
(6, 3, 4),
(7, 4, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `persons`
--

INSERT INTO `persons` (`Person_ID`, `name`, `function`, `type`) VALUES
(0, 'Alex', 'kamera', 'dozent'),
(1, 'Daniela', 'Schnitt', 'dozent'),
(2, 'Christoph', 'Aufnahmeleiter', 'student'),
(3, 'Brigitte Schmitt', 'Tierheim Dallau', 'Protagonist'),
(4, 'Werner Simon', 'Polizei Mosbach', 'Protagonist');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stories`
--

CREATE TABLE IF NOT EXISTS `stories` (
  `Story_ID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `suggestion` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`Story_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `suggestions`
--

CREATE TABLE IF NOT EXISTS `suggestions` (
  `name` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `story` varchar(4000) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mail` varchar(80) DEFAULT NULL,
  `Suggestion_ID` bigint(7) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Suggestion_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `suggestions`
--

INSERT INTO `suggestions` (`name`, `timestamp`, `story`, `phone`, `mail`, `Suggestion_ID`) VALUES
('TestName', '2012-06-19 12:22:50', 'lorem ipsum dolem bla bla', '293049324-93/249324', 'afasdfdsf.de', 0),
('Test1Name', '2012-06-19 12:57:04', 'waads wadw  story', '342324324/324324', '234423erre.com', 1);

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
(2, '31', '40', 'Fluss', '9.33938290', '49.55891530', 2),
(3, '41', '50', 'Hi Jack!', '9.12938280', '49.34891430', 2);

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
  `backgroundimage` varchar(500) DEFAULT NULL,
  `keyvisual` varchar(500) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `altitude` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Video_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `videos`
--

INSERT INTO `videos` (`Video_ID`, `date`, `title`, `subtitle`, `source`, `description`, `backgroundimage`, `keyvisual`, `longitude`, `altitude`) VALUES
(0, '2012-06-12 13:05:11', 'Trailer StadtLandFluss-Geschichten', 'subtitle aus DB', 'http://www.youtube.com/watch?v=zYXjLbMZFmo', 'Seit Jahren entstehen am Studiengang Onlinemedien an der DHBW Mosbach kurze Portraits von Personen rund um Mosbach. Die Filmemacher Daniela Michel und Alexander Kleider leiten das jährlich stattfindende Dokumentarfilmseminar. Der Trailer zum darauf basierenden Projekt StadtLandFluss-Geschichten (www.stadtlandfluss-geschichten.de), das von Prof. Dr. Thomas Wirth initiiert wurde, schaut den Studenten bei der Filmarbeit über die Schulter und lässt Dozenten und Studenten zu Wort kommen.', 'http://www.backgroundlabs.com/twitter/4.jpg', 'http://www.dorsch.com/_images/_coolhunting_images_puma-Bike-Profile.jpg', '9.148206', '49.3515'),
(1, '2012-05-22 02:02:44', 'Santa Farina – Das Göttlichste, was man sich erlauben kann', 'subtitle aus DB', 'http://www.youtube.com/watch?v=NSFIv7HgNdk', 'Sigfried Raether, von allen Siggi genannt, ist leidenschaftlicher Pizzabäcker. Seine Pizzeria „Santa Farina“ befindet sich in der Nähe der S-Bahnhaltstellte Mosbach (Baden). Siggi ist durch seine charmante italienische Art stadtbekannt. Durch seine ganz besonderen Techniken die Zutaten auf die Pizza zu bringen, ist es schon ein Highlight ihm beim Backen zuzuschauen. Mehrere Studierende von ON09 sind regelmäßig in der Mittagspause zu Gast bei Siggi und wollten mehr über diese außergewöhnliche Persönlichkeit, die der Pizzeria einen heimeligen Flair verleiht, erfahren.', 'http://www.backgroundlabs.com/twitter/4.jpg', 'http://www.dorsch.com/_images/_coolhunting_images_puma-Bike-Profile.jpg', '9.144452', '49.351591'),
(2, '2012-05-22 01:57:27', 'Benzin im Blut - Zwischen Motocross und CorelDraw', 'subtitle aus DB ', 'http://www.youtube.com/watch?v=3ZdMAk9aqU0&feature=g-upl', 'Uli Körber ist selbstständiger Grafikdesigner in Schefflenz. Doch das ist nicht alles. Uli hat Benzin im Blut! Um einen Ausgleich zu seinem Beruf zu haben, geht er regelmäßig MotoCross fahren. Mit Hilfe dieses außergewöhnlichen Hobbys und dessen Preisgeldern konnte er sein Studium finanzieren. Uli wurde sogar Deutscher- und Europameister! Sabine Bennebach von der Bürgerstiftung für die Region Mosbach gab uns den Tipp zu diesem Portrait.', 'http://www.backgroundlabs.com/twitter/4.jpg', 'http://www.dorsch.com/_images/_coolhunting_images_puma-Bike-Profile.jpg', '9.254093', '49.394022'),
(3, '2012-06-15 13:01:05', 'Tierheim Dallau - Jeder Käfig hat seine Geschichte', 'subtitle aus DB', 'http://www.youtube.com/watch?v=NSFIv7HgNdk', 'Mit einem besonders großen Einzugsgebiet im Neckar-Odenwald-Kreis bietet das Tierheim Dallau vielen Tieren ein temporäres Zuhause - manchen länger, anderen nur kurz. Wir haben Brigitte Schmitt, eines der langjährigen Mitglieder des Vereins begleitet, wie sie um das Schicksal des Schäferhundrüden „Sultan" bangt, der fünf Jahre lang nicht vermittelt werden konnte. Florian Eberle und Matthias Weise (Studierende des Jahrgangs 2009) wollten eine Tierheimgeschichte erzählen und sind so auf das Mosbacher Tierheim in Dallau gestoßen.', 'http://www.backgroundlabs.com/twitter/4.jpg', 'http://www.dorsch.com/_images/_coolhunting_images_puma-Bike-Profile.jpg', '9.2004', '49.384641'),
(4, '2012-06-15 13:13:57', 'Vorsicht, Kontrolle!', 'subtitle aus DB', 'http://www.youtube.com/watch?v=NSFIv7HgNdk', 'Werner Simon ist stellvertretender Dienstgruppenführer der Verkehrspolizei Mosbach und sorgt mit der Überwachung des Schwerverkehrs für mehr Sicherheit auf den Straßen in und um Mosbach. Der Kontakt kam über Lisa Simon (ON09) zustande.', 'http://www.backgroundlabs.com/twitter/4.jpg', 'http://www.dorsch.com/_images/_coolhunting_images_puma-Bike-Profile.jpg', '9.146783', '49.355092');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `votings`
--

CREATE TABLE IF NOT EXISTS `votings` (
  `Voting_ID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `headline` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `votes` bigint(8) DEFAULT NULL,
  PRIMARY KEY (`Voting_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
