-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 24. Juni 2012 um 15:27
-- Server Version: 5.5.9
-- PHP-Version: 5.3.6

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

INSERT INTO `comments` VALUES(1, 1, 'Keep', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');
INSERT INTO `comments` VALUES(2, 1, 'Gamsbichler', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');
INSERT INTO `comments` VALUES(3, 2, 'Dreckshagel', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');
INSERT INTO `comments` VALUES(4, 2, 'Dieter', 'Genial');
INSERT INTO `comments` VALUES(5, 2, 'Loreny', 'Chips sind nix, Bahlsen 4 the win');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` VALUES(0, 'img/grid/0-1.jpg', 'Test', 0);
INSERT INTO `images` VALUES(1, 'img/grid/0-2.jpg', 'Test', 0);
INSERT INTO `images` VALUES(2, 'img/grid/0-3.jpg', 'Test', 0);
INSERT INTO `images` VALUES(3, 'img/grid/1-1.jpg', 'Test', 1);
INSERT INTO `images` VALUES(4, 'img/grid/1-2.jpg', 'Test', 1);
INSERT INTO `images` VALUES(5, 'img/grid/1-3.jpg', 'Test', 1);
INSERT INTO `images` VALUES(6, 'img/grid/2-1.jpg', 'Test', 2);
INSERT INTO `images` VALUES(7, 'img/grid/2-2.jpg', 'Test', 2);
INSERT INTO `images` VALUES(8, 'img/grid/2-3.jpg', 'Test', 2);
INSERT INTO `images` VALUES(9, 'img/grid/3-1.jpg', 'Test', 3);
INSERT INTO `images` VALUES(10, 'img/grid/3-2.jpg', 'Test', 3);
INSERT INTO `images` VALUES(11, 'img/grid/3-3.jpg', 'Test', 3);
INSERT INTO `images` VALUES(12, 'img/grid/4-1.jpg', 'Test', 4);
INSERT INTO `images` VALUES(13, 'img/grid/4-2.jpg', 'Test', 4);
INSERT INTO `images` VALUES(14, 'img/grid/4-3.jpg', 'Test', 4);
INSERT INTO `images` VALUES(15, 'img/grid/motorcross_main.png', 'Test', 99);
INSERT INTO `images` VALUES(16, 'img/grid/motorcross_main.png', 'Test', 99);
INSERT INTO `images` VALUES(17, 'img/grid/motorcross_main.png', 'Test', 99);
INSERT INTO `images` VALUES(18, 'img/grid/5-1.jpg', 'Tierheim Dallau', 5);
INSERT INTO `images` VALUES(19, 'img/grid/5-2.jpg', 'Tierheim Dallau', 5);
INSERT INTO `images` VALUES(20, 'img/grid/5-3.jpg', 'Tierheim Dallau', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `person2video`
--

CREATE TABLE IF NOT EXISTS `person2video` (
  `p2v_ID` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `Video_ID` int(5) unsigned DEFAULT NULL,
  `Person_ID` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`p2v_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Daten für Tabelle `person2video`
--

INSERT INTO `person2video` VALUES(0, 0, 0);
INSERT INTO `person2video` VALUES(1, 0, 1);
INSERT INTO `person2video` VALUES(2, 0, 2);
INSERT INTO `person2video` VALUES(3, 1, 1);
INSERT INTO `person2video` VALUES(4, 1, 2);
INSERT INTO `person2video` VALUES(5, 2, 0);
INSERT INTO `person2video` VALUES(6, 3, 4);
INSERT INTO `person2video` VALUES(7, 4, 3);
INSERT INTO `person2video` VALUES(8, 0, 10);
INSERT INTO `person2video` VALUES(9, 1, 7);
INSERT INTO `person2video` VALUES(10, 2, 8);
INSERT INTO `person2video` VALUES(11, 3, 9);
INSERT INTO `person2video` VALUES(12, 4, 5);
INSERT INTO `person2video` VALUES(13, 5, 11);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `persons`
--

INSERT INTO `persons` VALUES(0, 'Alex', 'kamera', 'dozent');
INSERT INTO `persons` VALUES(1, 'Daniela', 'Schnitt', 'dozent');
INSERT INTO `persons` VALUES(2, 'Christoph Muhr', '', 'filmcrew');
INSERT INTO `persons` VALUES(3, 'Brigitte Schmitt', 'Tierheim Dallau', 'Protagonist');
INSERT INTO `persons` VALUES(4, 'Werner Simon', 'Polizei Mosbach', 'Protagonist');
INSERT INTO `persons` VALUES(5, 'Serdar Batmaz', '', 'Protagonist');
INSERT INTO `persons` VALUES(7, 'Michaela Pusch', '', 'Protagonist');
INSERT INTO `persons` VALUES(8, 'Uli Körber', '', 'Protagonist');
INSERT INTO `persons` VALUES(9, 'Siegfried Raether', '', 'Protagonist');
INSERT INTO `persons` VALUES(10, 'Baron Dajo von Gemmingen-Hornberg', '', 'Protagonist');
INSERT INTO `persons` VALUES(11, 'Brigitte Schmitt', '', 'Protagonist');

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

INSERT INTO `stories` VALUES(1, 'lorem Ipsumkpdsffsd', 'Der alte Mann am Baum', 0000002);
INSERT INTO `stories` VALUES(2, 'Und er flog in den Neckar....', 'Der verlorene Reifen', 0000000);

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

INSERT INTO `suggestions` VALUES('TestName', '2012-06-19 14:22:26', 'lorem ipsum dolem bla bla', '293049324-93/249324', 'afasdfdsf.de', 0);
INSERT INTO `suggestions` VALUES('Test1Name', '2012-06-19 14:56:40', 'waads wadw  story', '342324324/324324', '234423erre.com', 1);
INSERT INTO `suggestions` VALUES('name', '2012-06-19 17:09:13', 'story', 'phone', 'mail', 3);

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

INSERT INTO `tags` VALUES(0, '10', '20', 'Stadt', '9.12938290', '49.34891530', 1);
INSERT INTO `tags` VALUES(1, '21', '30', 'Land', '9.22938290', '49.45891530', 0);
INSERT INTO `tags` VALUES(2, '31', '40', 'Fluss', '9.33938290', '49.55891530', 2);
INSERT INTO `tags` VALUES(3, '41', '50', 'Hi Jack!', '9.12938280', '49.34891430', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `videos`
--

INSERT INTO `videos` VALUES(0, '2012-06-12 13:05:11', 'Zwischen Tradition und Moderne', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Baron Dajo von Gemmingen-Hornberg erzählt von seinem Leben auf der Burg und seinem Leben zwischen der Arbeit als Winzer und den Pflichten als Gutsverwalter. In vergangenen Zeiten brachte ein Adelstitel viele Vorzüge im Leben mit sich. Doch wie ist es heute? Sind Adelstitel in der modernen Gesellschaft unwichtig geworden? Fabian Stein (Student des Jahrgangs 2010) wohnt auf der Burg Hornberg und ist zudem mit Baron Dajo von Gemmingen-Hornberg befreundet.', 'img/backgrounds/moderne.jpg', 'img/backgrounds/moderne-single.jpg', '9.145575', '49.315947');
INSERT INTO `videos` VALUES(1, '2012-05-22 02:02:44', 'Soweit der Wind sie trägt', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Gleitschirmfliegen ist ein Stück Freiheit. Der Wettkampf mit dem Wind und der Thermik, aber auch das Kribbeln im Bauch, die Ruhe und Schönheit der Natur faszinieren Michaela Pusch schon lange. In ihrer Freizeit spielt sie zudem mit René Preisler (Student des Jahrgangs 2009) im selben Verein Tischtennis.', 'img/backgrounds/wind.jpg', 'img/backgrounds/wind-single.png', '9.104696', '49.362253');
INSERT INTO `videos` VALUES(2, '2012-05-22 01:57:27', 'Benzin im Blut – Zwischen Motocross und Corel Draw', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Uli Körber ist selbstständiger Grafikdesigner in Schefflenz. Doch das ist nicht alles. Uli hat Benzin im Blut! Um einen Ausgleich zu seinem Beruf zu haben, geht er regelmäßig MotoCross fahren. Mit Hilfe dieses außergewöhnlichen Hobbys und dessen Preisgeldern konnte er sein Studium finanzieren. Uli wurde sogar Deutscher- und Europameister! Sabine Bennebach von der Bürgerstiftung für die Region Mosbach gab uns den Tipp zu diesem Portrait.', 'img/backgrounds/motocross.jpg', 'img/backgrounds/motocross-single.png', '9.254093', '49.394022');
INSERT INTO `videos` VALUES(3, '2012-06-15 13:01:05', 'Santa Farina – Das Göttlichste, was man sich erlauben kann', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Sigfried Raether, von allen Siggi genannt, ist leidenschaftlicher Pizzabäcker. Seine Pizzeria „Santa Farina“ befindet sich in der Nähe der S-Bahnhaltstellte Mosbach (Baden). Siggi ist durch seine charmante italienische Art stadtbekannt. Durch seine ganz besonderen Techniken die Zutaten auf die Pizza zu bringen, ist es schon ein Highlight ihm beim Backen zuzuschauen. Mehrere Studierende von ON09 sind regelmäßig in der Mittagspause zu Gast bei Siggi und wollten mehr über diese außergewöhnliche Persönlichkeit, die der Pizzeria einen heimeligen Flair verleiht, erfahren.', 'img/backgrounds/pizza.jpg', 'img/backgrounds/pizza-single.png', '9.144452', '49.351591');
INSERT INTO `videos` VALUES(4, '2012-06-15 13:13:57', 'WingTsun – Kämpfen lernen, um nicht kämpfen zu müssen', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Serdar Batmaz ist professioneller Kampfkünstler, der mit Leib und Seele WingTsun unterrichtet und lebt. Er ist einer der Wenigen, die den 5. Praktikergrad erreicht haben. Seine Philosophie: "Kämpfen lernen, um nicht kämpfen zu müssen." Serdar trainiert im Fitnesscenter Muskelkater in Mosbach, wo Melanie Hiller (Studentin des Jahrgangs 2010) auf ihn aufmerksam wurde.', 'img/backgrounds/wingtsun.jpg', 'img/backgrounds/wingtsun-single.jpg', '9.131995', '49.343943');
INSERT INTO `videos` VALUES(5, '2012-06-24 00:00:00', 'Tierheim Dallau – Jeder Käfig hat seine Geschichte', '', 'http://www.youtube.com/watch?v=p74Ui12Y55c&feature=plcp', 'Mit einem besonders großen Einzugsgebiet im Neckar-Odenwald-Kreis bietet das Tierheim Dallau vielen Tieren ein temporäres Zuhause - manchen länger, anderen nur kurz. Wir haben Brigitte Schmitt, eines der langjährigen Mitglieder des Vereins begleitet, wie sie um das Schicksal des Schäferhundrüden „Sultan" bangt, der fünf Jahre lang nicht vermittelt werden konnte. Florian Eberle, Marc Hitschericht und Matthias Weise (Studierende des Jahrgangs 2009) wollten eine Tierheimgeschichte erzählen und sind so auf das Mosbacher Tierheim in Dallau gestoßen.', '', '', '9.2004', '49.384641');

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

