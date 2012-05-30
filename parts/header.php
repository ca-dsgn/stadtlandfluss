<!DOCTYPE html>
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
		<a href="/" id="logoBig">StadtLandFluss-Geschichten</a>
		<nav id="pageNav">
			<ul>
				<?php
					if (!isset($_GET["section"])) {
						$_GET["section"] = "protagonisten";
					}
				?>
				<li<?php ($_GET["section"] == "protagonisten" ? print ' class="active"':'')?>><a href="index.php?section=protagonisten" id="navPortrait">Protagonisten</a></li>
				<li<?php ($_GET["section"] == "karte" ? print ' class="active"':'')?>><a href="index.php?section=karte" id="navGrid">Karte</a></li>
				<li<?php ($_GET["section"] == "matrix" ? print ' class="active"':'')?>><a href="index.php?section=matrix" id="navMap">Map</a></li>
			</ul>
		</nav>
	</div>
</header>
