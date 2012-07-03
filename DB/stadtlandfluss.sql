-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 03. Juli 2012 um 15:41
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

DROP TABLE IF EXISTS `comments`;
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

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `Image_ID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `Video_ID` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`Image_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` VALUES(0, 'img/grid/0-1.jpg', 'Zwischen Tradition und Moderne', 0);
INSERT INTO `images` VALUES(1, 'img/grid/0-2.jpg', 'Zwischen Tradition und Moderne', 0);
INSERT INTO `images` VALUES(2, 'img/grid/0-3.jpg', 'Zwischen Tradition und Moderne', 0);
INSERT INTO `images` VALUES(3, 'img/grid/1-1.jpg', 'Soweit der Wind sie trägt', 1);
INSERT INTO `images` VALUES(4, 'img/grid/1-2.jpg', 'Soweit der Wind sie trägt', 1);
INSERT INTO `images` VALUES(5, 'img/grid/1-3.jpg', 'Soweit der Wind sie trägt', 1);
INSERT INTO `images` VALUES(6, 'img/grid/2-1.jpg', 'Benzin im Blut', 2);
INSERT INTO `images` VALUES(7, 'img/grid/2-2.jpg', 'Benzin im Blut', 2);
INSERT INTO `images` VALUES(8, 'img/grid/2-3.jpg', 'Benzin im Blut', 2);
INSERT INTO `images` VALUES(9, 'img/grid/3-1.jpg', 'Santa Farina', 3);
INSERT INTO `images` VALUES(10, 'img/grid/3-2.jpg', 'Santa Farina', 3);
INSERT INTO `images` VALUES(11, 'img/grid/3-3.jpg', 'Santa Farina', 3);
INSERT INTO `images` VALUES(12, 'img/grid/4-1.jpg', 'WingTsun', 4);
INSERT INTO `images` VALUES(13, 'img/grid/4-2.jpg', 'WingTsun', 4);
INSERT INTO `images` VALUES(14, 'img/grid/4-3.jpg', 'WingTsun', 4);
INSERT INTO `images` VALUES(15, 'img/grid/motorcross_main.png', 'Test', 99);
INSERT INTO `images` VALUES(16, 'img/grid/motorcross_main.png', 'Test', 99);
INSERT INTO `images` VALUES(17, 'img/grid/motorcross_main.png', 'Test', 99);
INSERT INTO `images` VALUES(18, 'img/grid/5-1.jpg', 'Tierheim Dallau', 5);
INSERT INTO `images` VALUES(19, 'img/grid/5-2.jpg', 'Tierheim Dallau', 5);
INSERT INTO `images` VALUES(20, 'img/grid/5-3.jpg', 'Tierheim Dallau', 5);
INSERT INTO `images` VALUES(21, 'img/grid/6-1.jpg', 'Vorsicht, Kontrolle!', 6);
INSERT INTO `images` VALUES(22, 'img/grid/6-2.jpg', 'Vorsicht, Kontrolle!', 6);
INSERT INTO `images` VALUES(23, 'img/grid/6-3.jpg', 'Vorsicht, Kontrolle!', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `person2video`
--

DROP TABLE IF EXISTS `person2video`;
CREATE TABLE IF NOT EXISTS `person2video` (
  `p2v_ID` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `Video_ID` int(5) unsigned DEFAULT NULL,
  `Person_ID` int(5) unsigned DEFAULT NULL,
  `isfilmcrew` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `function` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`p2v_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Daten für Tabelle `person2video`
--

INSERT INTO `person2video` VALUES(18, 0, 31, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(19, 0, 32, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(20, 0, 34, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(21, 0, 35, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(22, 0, 36, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(23, 0, 10, 0, 'Baron');
INSERT INTO `person2video` VALUES(24, 1, 19, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(25, 1, 15, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(26, 1, 16, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(27, 1, 12, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(28, 1, 7, 0, 'Paragliderin');
INSERT INTO `person2video` VALUES(29, 2, 19, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(30, 2, 18, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(31, 2, 13, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(32, 2, 17, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(33, 2, 25, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(34, 2, 8, 0, 'Motocross Fahrer und Grafikdesigner');
INSERT INTO `person2video` VALUES(35, 3, 19, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(36, 3, 18, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(37, 3, 13, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(38, 3, 17, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(39, 3, 25, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(40, 3, 9, 0, 'Pizzabäcker');
INSERT INTO `person2video` VALUES(41, 4, 26, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(42, 4, 27, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(43, 4, 28, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(44, 4, 29, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(45, 4, 30, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(46, 4, 5, 0, 'WingTsun Meister?');
INSERT INTO `person2video` VALUES(47, 5, 22, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(48, 5, 23, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(49, 5, 24, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(50, 5, 3, 0, 'Tierheim Dallau?');
INSERT INTO `person2video` VALUES(51, 6, 18, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(52, 6, 13, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(53, 6, 25, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(54, 6, 37, 1, 'Funktion noch nicht klar (Kamera etc.)');
INSERT INTO `person2video` VALUES(55, 6, 4, 0, 'Polizei Mosbach?');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `Person_ID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Person_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Daten für Tabelle `persons`
--

INSERT INTO `persons` VALUES(0, 'Alexander Kleider', 'Dozent Dokwerk');
INSERT INTO `persons` VALUES(1, 'Daniela Michel', 'Dozent Dokwerk');
INSERT INTO `persons` VALUES(2, 'Christoph Muhr', 'Student ON09');
INSERT INTO `persons` VALUES(3, 'Brigitte Schmitt', 'Protagonist');
INSERT INTO `persons` VALUES(4, 'Werner Simon', 'Protagonist');
INSERT INTO `persons` VALUES(5, 'Serdar Batmaz', 'Protagonist');
INSERT INTO `persons` VALUES(7, 'Michaela Pusch', 'Protagonist');
INSERT INTO `persons` VALUES(8, 'Uli Körber', 'Protagonist');
INSERT INTO `persons` VALUES(9, 'Siegfried Raether', 'Protagonist');
INSERT INTO `persons` VALUES(10, 'Baron Dajo von Gemmingen-Hornberg', 'Protagonist');
INSERT INTO `persons` VALUES(12, 'René Preisler', 'Student ON09');
INSERT INTO `persons` VALUES(13, 'René Preußer', 'Student ON09');
INSERT INTO `persons` VALUES(14, 'Clara Gieß', 'Student ON09');
INSERT INTO `persons` VALUES(15, 'Julia Beck', 'Student ON09');
INSERT INTO `persons` VALUES(16, 'Katharina Franz', 'Student ON09');
INSERT INTO `persons` VALUES(17, 'Elina Wetsch', 'Student ON09');
INSERT INTO `persons` VALUES(18, 'Sebastian Lauer', 'Student ON09');
INSERT INTO `persons` VALUES(19, 'Christian Albert', 'Student ON09');
INSERT INTO `persons` VALUES(22, 'Florian Eberle', 'Student ON09');
INSERT INTO `persons` VALUES(23, 'Marc Hitscherich', 'Student ON09');
INSERT INTO `persons` VALUES(24, 'Matthias Weise', 'Student ON09');
INSERT INTO `persons` VALUES(25, 'Lisa Simon', 'Student ON09');
INSERT INTO `persons` VALUES(26, 'Liesa Burgey', 'Student ON10');
INSERT INTO `persons` VALUES(27, 'Stephan Fischer', 'Student ON10');
INSERT INTO `persons` VALUES(28, 'Melanie Hiller', 'Student ON10');
INSERT INTO `persons` VALUES(29, 'Martin Keil', 'Student ON10');
INSERT INTO `persons` VALUES(30, 'Sebastian Tröster', 'Student ON10');
INSERT INTO `persons` VALUES(31, 'Mona Bien', 'Student ON10');
INSERT INTO `persons` VALUES(32, 'Ines Heberle', 'Student ON10');
INSERT INTO `persons` VALUES(34, 'Nina Rehwald', 'Student ON10');
INSERT INTO `persons` VALUES(35, 'Fabian Stein', 'Student ON10');
INSERT INTO `persons` VALUES(36, 'Theresia Zorn', 'Student ON10');
INSERT INTO `persons` VALUES(37, 'Paul Rohrbeck', 'Student ON09');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stories`
--

DROP TABLE IF EXISTS `stories`;
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

INSERT INTO `stories` VALUES(1, 'lorem Ipsumkpdsffsd', 'Der alte Mann am Baum', 0000005);
INSERT INTO `stories` VALUES(2, 'Und er flog in den Neckar....', 'Der verlorene Reifen', 0000000);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `suggestions`
--

DROP TABLE IF EXISTS `suggestions`;
CREATE TABLE IF NOT EXISTS `suggestions` (
  `name` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `story` varchar(4000) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mail` varchar(80) DEFAULT NULL,
  `Suggestion_ID` bigint(7) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Suggestion_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `suggestions`
--

INSERT INTO `suggestions` VALUES('TestName', '2012-06-19 12:22:02', 'lorem ipsum dolem bla bla', '293049324-93/249324', 'afasdfdsf.de', 0);
INSERT INTO `suggestions` VALUES('Test1Name', '2012-06-19 12:56:16', 'waads wadw  story', '342324324/324324', '234423erre.com', 1);
INSERT INTO `suggestions` VALUES('name', '2012-06-19 15:08:49', 'story', 'phone', 'mail', 3);
INSERT INTO `suggestions` VALUES('name', '2012-06-24 14:22:35', 'story', 'phone', 'mail', 4);
INSERT INTO `suggestions` VALUES('name', '2012-06-24 14:48:55', 'story', 'phone', 'mail', 5);
INSERT INTO `suggestions` VALUES('name', '2012-06-25 16:58:19', 'story', 'phone', 'mail', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tags`
--

DROP TABLE IF EXISTS `tags`;
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

DROP TABLE IF EXISTS `videos`;
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
  `banner` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Video_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Daten für Tabelle `videos`
--

INSERT INTO `videos` VALUES(0, '2012-06-12 13:05:11', 'Zwischen Tradition und Moderne', '', 'http://www.youtube.com/watch?v=jku8r75dHJQ', 'In vergangenen Zeiten brachte ein Adelstitel viele Vorzüge im Leben mit sich. Doch wie ist es heute? Sind Adelstitel in der modernen Gesellschaft unwichtig geworden? Wie lebt es sich zwischen Tradition und Moderne? Baron Dajo von Gemmingen-Hornberg erzählt in diesem Film von seinem Leben auf der Burg, zwischen der Arbeit als Winzer und den Pflichten als Mitglied einer alten Adelsfamilie und Gutsverwalter. Fabian Stein (Onlinemedien-Student des Jahrgangs 2010) wohnt während seines Studium auf der Burg Hornberg und ist mit Baron Dajo von Gemmingen-Hornberg persönlich bekannt. Das Filmteam hatte es deshalb leicht, diesen besonderen Interview-Partner für einen Film zu gewinnen.', 'img/backgrounds/moderne.jpg', 'img/backgrounds/moderne-single.jpg', '9.145575', '49.315947', 'img/banner/0.jpg');
INSERT INTO `videos` VALUES(1, '2012-05-22 02:02:44', 'Soweit der Wind sie trägt', '', 'http://www.youtube.com/watch?v=k_Bm7fLfab8', 'Wer durch das Neckartal flußaufwärts oder flußabwärts an den Hängen des Schreckhof bei Diedesheim entlang fährt, sieht bei geeignetem Wetter gelegentlich Gleitschirmflieger am Hang und über dem Fluss kreisen. Unsere Protagonistin, Michaela Pusch, ist eine von ihnen. Gleitschirmfliegen ist ein Stück Freiheit für sie. Der Wettkampf mit dem Wind und der Thermik, aber auch das Kribbeln im Bauch, die Ruhe und Schönheit der Natur faszinieren sie schon lange. In unserem Film erzählt sie davon.', 'img/backgrounds/wind.jpg', 'img/backgrounds/wind-single.png', '9.104696', '49.362253', 'img/banner/1.jpg');
INSERT INTO `videos` VALUES(2, '2012-05-22 01:57:27', 'Benzin im Blut – Zwischen Motocross und Corel Draw', '', 'http://www.youtube.com/watch?v=EywuGhwjukA', 'Uli Körber ist selbstständiger Grafikdesigner in Schefflenz. Doch das ist nicht alles: Uli hat Benzin im Blut! Um einen Ausgleich zu seinem Beruf zu haben, geht er regelmäßig MotoCross fahren. Mit Hilfe dieses außergewöhnlichen Hobbys und dessen Preisgeldern konnte er sein Studium finanzieren. Uli wurde sogar Deutscher und Europameister! Sabine Bennebach von der Bürgerstiftung für die Region Mosbach gab uns den Tipp zu diesem Portrait.', 'img/backgrounds/motocross.jpg', 'img/backgrounds/motocross-single.png', '9.254093', '49.394022', 'img/banner/2.jpg');
INSERT INTO `videos` VALUES(3, '2012-06-15 13:01:05', 'Santa Farina – Das Göttlichste, was man sich erlauben kann', '', 'http://www.youtube.com/watch?v=qy1ehE1BY34', 'Siegfried Raether, von allen Siggi genannt, ist leidenschaftlicher Pizzabäcker. Seine Pizzeria „Santa Farina" (sinngemäß zu übersetzen mit „Heiliges Mehl") befindet sich in unmittelbarer Nähe des Bahnhofs Mosbach (Baden). Siegfried ist durch seine charmante italienische Art stadtbekannt. Durch seine ganz besonderen Techniken, die Zutaten auf die Pizza zu bringen, ist es ein Highlight, ihm beim Backen zuzuschauen. Mit seiner Kundschaft geht er auf eine unverwechselbare, unkonventionell-lockere Art um. Mehrere Studierende von ON09 sind regelmäßig in der Mittagspause zu Gast bei Siggi und wollten mehr über diese außergewöhnliche Persönlichkeit, die der Pizza so ein besonderes Flair verleiht, erfahren.', 'img/backgrounds/pizza.jpg', 'img/backgrounds/pizza-single.png', '9.144452', '49.351591', 'img/banner/3.jpg');
INSERT INTO `videos` VALUES(4, '2012-06-15 13:13:57', 'WingTsun – Kämpfen lernen, um nicht kämpfen zu müssen', '', 'http://www.youtube.com/watch?v=5W5OYOAalrU', 'Serdar Batmaz ist professioneller Kampfkünstler, der mit Leib und Seele WingTsun unterrichtet und lebt. Er ist einer der Wenigen, die den „5. Praktikergrad" in diesem Kampfsport erreicht haben. In unserem Film spricht er über sein Leben zwischen Familie und Training und seine Philosophie: „Kämpfen lernen, um nicht kämpfen zu müssen". Seine ruhige und besonnene Ausstrahlung in Verbindung mit der virtuosen Beherrschung des Kampfsports machen seinen beeindruckenden und unverwechselbaren Charakter aus. Serdar trainiert im Fitnesscenter „Muskelkater" in Mosbach, wo Melanie Hiller (Onlinemedien-Studentin des Jahrgangs 2010) auf ihn aufmerksam wurde.', 'img/backgrounds/wingtsun.jpg', 'img/backgrounds/wingtsun-single.jpg', '9.131995', '49.343943', 'img/banner/4.jpg');
INSERT INTO `videos` VALUES(5, '2012-06-24 00:00:00', 'Tierheim Dallau – Jeder Käfig hat seine Geschichte', '', 'http://www.youtube.com/watch?v=j3jnztKygSU', 'Mit einem besonders großen Einzugsgebiet im Neckar-Odenwald-Kreis bietet das Tierheim Dallau vielen verschiedenen Tieren ein temporäres Zuhause -- manchen länger, anderen nur kurz. Wir haben Brigitte Schmitt, eines der langjährigen Mitglieder des Vereins, begleitet und ließen sich von ihr das Tierheim und seine Bewohner zeigen. Sie ist leidenschaftliche Tierfreundin und mit dem ganzen Herz bei der Sache, wenn sie um das Schicksal des Schäferhundrüden „Sultan" bangt, der fünf Jahre lang nicht vermittelt werden konnte. Florian Eberle, Marc Hitscherich und Matthias Weise (Studierende des Jahrgangs 2009) wollten eine Tierheimgeschichte erzählen und recherhierten nach einer geeigneten Einrichtung und einem Interviewpartner. So sind sie auf das Mosbacher Tierheim in Dallau gestoßen und fanden in Brigitte Schmitt eine charmante Protagonistin für ihren Film.', '', '', '9.2004', '49.384641', 'img/banner/5.jpg');
INSERT INTO `videos` VALUES(6, '2012-06-25 14:46:37', 'Vorsicht, Kontrolle!', '', 'http://www.youtube.com/watch?v=gAEXJgjzqM0', 'Werner Simon ist stellvertretender Dienstgruppenführer der Verkehrspolizei Mosbach und sorgt mit der Überwachung des Schwerverkehrs für mehr Sicherheit auf den Straßen in und um Mosbach. Der Kontakt kam über seine Tochter Lisa Simon (Onlinemedien-Studentin des Jahrgangs 2009) zustande.', '', '', '9.144452', '49.343943', 'img/banner/6.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `votings`
--

DROP TABLE IF EXISTS `votings`;
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

