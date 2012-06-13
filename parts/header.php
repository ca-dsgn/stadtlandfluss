<!DOCTYPE html>
<head>
	<title>Stadt Land Fluss Geschichten</title>
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
<body onload="initialize();">
<div class="overlay" style="display: none;">
</div>
<header id="pageHeader">
	<div class="wrapper">
		<div id="tag">
			<a href="./" id="logoBig">StadtLandFluss-Geschichten</a>
		</div>
		<nav id="pageNav">
			<ul>
				<?php
					if (!isset($_GET["section"])) {
						$_GET["section"] = "portrait";
					}
				?>
				<li<?php ($_GET["section"] == "portrait" ? print ' class="active"':'')?>><a href="index.php?section=portrait" id="navPortrait">Portrait</a></li>
				<li<?php ($_GET["section"] == "map" ? print ' class="active"':'')?>><a href="index.php?section=map" id="navMap">Map</a></li>
				<li<?php ($_GET["section"] == "grid" ? print ' class="active"':'')?>><a href="index.php?section=grid" id="navGrid">Grid</a></li>
			</ul>
		</nav>
	</div>
</header>
