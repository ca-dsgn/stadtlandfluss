﻿<!DOCTYPE html>
<head>
	<title>Stadt Land Fluss Geschichten</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/main.css" type="text/css"/>
    <script src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script src="http://code.jquery.com/ui/1.8.20/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/header.js"></script>
	<script type="text/javascript" src="js/footer.js"></script>
</head>
<body>
<header id="pageHeader">
	<div class="wrapper">
		<div id="tag">
			<a href="/" id="logoBig">StadtLandFluss-Geschichten</a>
		</div>
		<nav id="pageNav">
			<ul>
				<?php
					if (!isset($_GET["section"])) {
						$_GET["section"] = "portrait";
					}
				?>
				<li<?php ($_GET["section"] == "portrait" ? print ' class="active"':'')?>><a href="index.php?section=portrait" id="navPortrait">Protagonisten</a></li>
				<li<?php ($_GET["section"] == "map" ? print ' class="active"':'')?>><a href="index.php?section=map" id="navMap">Karte</a></li>
				<li<?php ($_GET["section"] == "grid" ? print ' class="active"':'')?>><a href="index.php?section=grid" id="navGrid">Map</a></li>
			</ul>
		</nav>
	</div>
</header>
