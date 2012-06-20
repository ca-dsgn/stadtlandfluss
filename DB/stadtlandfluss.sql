-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 20. Juni 2012 um 10:17
-- Server Version: 5.1.37
-- PHP-Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `stadtlandfluss`
--
CREATE DATABASE `stadtlandfluss` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `stadtlandfluss`;

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
(0, 'img/grid/motorcross_main.png', 'Test', 0),
(1, 'img/grid/motorcross_main.png', 'Test', 0),
(2, 'img/grid/motorcross_main.png', 'Test', 0),
(3, 'img/grid/motorcross_main.png', 'Test', 5),
(4, 'img/grid/motorcross_main.png', 'Test', 1),
(5, 'img/grid/motorcross_main.png', 'Test', 1),
(6, 'img/grid/motorcross_main.png', 'Test', 4),
(7, 'img/grid/motorcross_main.png', 'Test', 4),
(8, 'img/grid/motorcross_main.png', 'Test', 4),
(9, 'img/grid/motorcross_main.png', 'Test', 3),
(10, 'img/grid/motorcross_main.png', 'Test', 3),
(11, 'img/grid/motorcross_main.png', 'Test', 3),
(12, 'img/grid/motorcross_main.png', 'Test', 2),
(13, 'img/grid/motorcross_main.png', 'Test', 2),
(14, 'img/grid/motorcross_main.png', 'Test', 2),
(15, 'img/grid/motorcross_main.png', 'Test', 1),
(16, 'img/grid/motorcross_main.png', 'Test', 5),
(17, 'img/grid/motorcross_main.png', 'Test', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `person2video`
--

CREATE TABLE IF NOT EXISTS `person2video` (
  `p2v_ID` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `Video_ID` int(5) unsigned DEFAULT NULL,
  `Person_ID` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`p2v_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

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
(7, 4, 3),
(8, 0, 10),
(9, 1, 7),
(10, 2, 8),
(11, 3, 9),
(12, 4, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Daten für Tabelle `persons`
--

INSERT INTO `persons` (`Person_ID`, `name`, `function`, `type`) VALUES
(0, 'Alex', 'kamera', 'dozent'),
(1, 'Daniela', 'Schnitt', 'dozent'),
(2, 'Christoph', 'Aufnahmeleiter', 'student'),
(3, 'Brigitte Schmitt', 'Tierheim Dallau', 'Protagonist'),
(4, 'Werner Simon', 'Polizei Mosbach', 'Protagonist'),
(5, 'Serdar Batmaz', '', 'Protagonist'),
(7, 'Michaela Pusch', '', 'Protagonist'),
(8, 'Uli Körber', '', 'Protagonist'),
(9, 'Sigfried Raether', '', 'Protagonist'),
(10, 'Baron Dajo von Gemmingen-Hornberg', '', 'Protagonist');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stories`
--

CREATE TABLE IF NOT EXISTS `stories` (
  `Story_ID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(2000) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `votes` bigint(7) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`Story_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `stories`
--

INSERT INTO `stories` (`Story_ID`, `description`, `title`, `votes`) VALUES
(1, 'lorem Ipsumkpdsffsd', 'Der alte Mann am Baum', 0000002),
(2, 'Und er flog in den Neckar....', 'Der verlorene Reifen', 0000000);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `suggestions`
--

INSERT INTO `suggestions` (`name`, `timestamp`, `story`, `phone`, `mail`, `Suggestion_ID`) VALUES
('TestName', '2012-06-19 14:22:26', 'lorem ipsum dolem bla bla', '293049324-93/249324', 'afasdfdsf.de', 0),
('Test1Name', '2012-06-19 14:56:40', 'waads wadw  story', '342324324/324324', '234423erre.com', 1),
('name', '2012-06-19 17:09:13', 'story', 'phone', 'mail', 3);

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
(0, '2012-06-12 13:05:11', 'Zwischen Tradition und Moderne', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Baron Dajo von Gemmingen-Hornberg erzählt von seinem Leben auf der Burg und seinem Leben zwischen der Arbeit als Winzer und den Pflichten als Gutsverwalter. In vergangenen Zeiten brachte ein Adelstitel viele Vorzüge im Leben mit sich. Doch wie ist es heute? Sind Adelstitel in der modernen Gesellschaft unwichtig geworden? Fabian Stein (Student des Jahrgangs 2010) wohnt auf der Burg Hornberg und ist zudem mit Baron Dajo von Gemmingen-Hornberg befreundet.', 'img/backgrounds/moderne.jpg', 'img/backgrounds/moderne-single.jpg', '9.145575', '49.315947'),
(1, '2012-05-22 02:02:44', 'Soweit der Wind sie trägt', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Gleitschirmfliegen ist ein Stück Freiheit. Der Wettkampf mit dem Wind und der Thermik, aber auch das Kribbeln im Bauch, die Ruhe und Schönheit der Natur faszinieren Michaela Pusch schon lange. In ihrer Freizeit spielt sie zudem mit René Preisler (Student des Jahrgangs 2009) im selben Verein Tischtennis.', 'img/backgrounds/wind.jpg', 'img/backgrounds/wind-single.png', '9.104696', '49.362253'),
(2, '2012-05-22 01:57:27', 'Benzin im Blut - Zwischen Motocross und CorelDraw', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Uli Körber ist selbstständiger Grafikdesigner in Schefflenz. Doch das ist nicht alles. Uli hat Benzin im Blut! Um einen Ausgleich zu seinem Beruf zu haben, geht er regelmäßig MotoCross fahren. Mit Hilfe dieses außergewöhnlichen Hobbys und dessen Preisgeldern konnte er sein Studium finanzieren. Uli wurde sogar Deutscher- und Europameister! Sabine Bennebach von der Bürgerstiftung für die Region Mosbach gab uns den Tipp zu diesem Portrait.', 'img/backgrounds/motocross.jpg', 'img/backgrounds/motocross-single.png', '9.254093', '49.394022'),
(3, '2012-06-15 13:01:05', 'Santa Farina – Das Göttlichste, was man sich erlauben kann', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Sigfried Raether, von allen Siggi genannt, ist leidenschaftlicher Pizzabäcker. Seine Pizzeria „Santa Farina“ befindet sich in der Nähe der S-Bahnhaltstellte Mosbach (Baden). Siggi ist durch seine charmante italienische Art stadtbekannt. Durch seine ganz besonderen Techniken die Zutaten auf die Pizza zu bringen, ist es schon ein Highlight ihm beim Backen zuzuschauen. Mehrere Studierende von ON09 sind regelmäßig in der Mittagspause zu Gast bei Siggi und wollten mehr über diese außergewöhnliche Persönlichkeit, die der Pizzeria einen heimeligen Flair verleiht, erfahren.', '', '', '9.144452', '49.351591'),
(4, '2012-06-15 13:13:57', 'WingTsun - Kämpfen lernen, um nicht kämpfen zu müssen', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Serdar Batmaz ist professioneller Kampfkünstler, der mit Leib und Seele WingTsun unterrichtet und lebt. Er ist einer der Wenigen, die den 5. Praktikergrad erreicht haben. Seine Philosophie: "Kämpfen lernen, um nicht kämpfen zu müssen." Serdar trainiert im Fitnesscenter Muskelkater in Mosbach, wo Melanie Hiller (Studentin des Jahrgangs 2010) auf ihn aufmerksam wurde.', 'img/backgrounds/winsun.jpg', 'img/backgrounds/winsun-single.jpg', '9.131995', '49.343943');

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

--
-- Daten für Tabelle `votings`
--

