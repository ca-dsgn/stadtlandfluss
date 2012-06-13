<!DOCTYPE html>
<head>
	<title>StadtLandFluss-Geschichten</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/main.css" type="text/css"/>
	<link rel="shortcut icon" href="./favicon.png" type="image/png">
	<link rel="icon" href="./favicon.png" type="image/png">
    <script src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script src="http://code.jquery.com/ui/1.8.20/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/timer.js"></script>
	<script type="text/javascript" src="js/header.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/footer.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/maps.js"></script>
</head>
<body>
<header id="pageHeader">
	<div class="wrapper">
		<div id="tag">
			<a href="./" id="logoBig">StadtLandFluss-Geschichten</a>
		</div>
		<nav id="pageNav">
			<ul>
				
				<li<?php ($_GET["section"] == "portrait" ? print ' class="active"':'')?>><a href="index.php?section=portrait" id="navPortrait">Portrait</a></li>
				<li<?php ($_GET["section"] == "map" ? print ' class="active"':'')?>><a href="index.php?section=map" id="navMap">Map</a></li>
				<li<?php ($_GET["section"] == "grid" ? print ' class="active"':'')?>><a href="index.php?section=grid" id="navGrid">Grid</a></li>
			</ul>
		</nav>
	</div>
</header>



<!-- END HEAD -->

<div id="content">
	<div class="wrapper">
		<div style="margin: 0 auto; width: 25%; max-width: 960px; min-width: 720px;">
		<h1>Über das Projekt</h1>
		<h2>Wie oft kommt es vor, dass ein Mensch eine interessante Facette hat, die niemand oder nur sehr wenige kennen?</h2>
		<p>Das Projekt <strong>StadtLandFluss-Geschichten</strong> will diese durch kleine Dokumentarfilme, welche seit 2004 vom <a href="http://dhbw-mosbach.de/on" target="_blank">Studiengang Onlinemedien</a> (früher: Digitale Medien) an der <a href="http://www.dhbw-mosbach.de" target="_blank">Dualen Hochschule Mosbach</a> in Kooperation mit der DOKWERK Filmkooperative produziert werden, zum Vorschein bringen und auf einer Projektwebseite zusammentragen. Mit dem Projekt sollen die Voraussetzungen geschaffen werden, die bisher relativ lose nebeneinander stehenden Filmclips zu einer Art „Gesamtkunstwerk“ zusammenzusetzen. In diesem Zusammenhang ist die Zeitperspektive wichtig: Es sollen über Jahre hinweg weitere Erzählungen gesammelt und dem Projekt dann immer weiter hinzugefügt werden.</p>
		</div>
	</div>
</div>


<?php
	include 'parts/footer.php';
	
?>
