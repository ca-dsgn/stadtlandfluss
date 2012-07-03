<!DOCTYPE html>
<html>
    <head>
        <title>StadtLandFluss-Geschichten</title>
        <meta charset="UTF-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- FIXING PROBLEMS IN IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
        <link rel="stylesheet" href="css/main.css" type="text/css"/>
        <link rel="shortcut icon" href="./favicon.png" type="image/png"/>
        <link rel="icon" href="./favicon.png" type="image/png"/>
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/swfobject.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.js" type="text/javascript"></script>
        <script src="js/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/timer.js"></script>
        <script type="text/javascript" src="js/header.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/footer.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/maps.php"></script>
        
        <!--[if lt IE 9]>
    			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      	<![endif]-->
          
    </head>
    <body onload="initialize();">
    <div class="overlay" style="display: none;"></div>
    <header id="pageHeader">
        <div class="wrapper">
            <a href="./" class="logoBig">StadtLandFluss-Geschichten</a>



        <ul id="pageNav">

						
						
							<?php
								if (!isset($_GET["section"])) {
									$_GET["section"] = "portrait";
								}
							?>
							<li<?php ($_GET["section"] == "portrait" ? print ' class="active"':'')?>><a href="index.php?section=portrait" id="navPortrait">Portrait</a></li>				
							<li<?php ($_GET["section"] == "map" ? print ' class="active"':'')?>><a href="index.php?section=map" id="navMap">Landkarte</a></li>
							<li<?php ($_GET["section"] == "grid" ? print ' class="active"':'')?>><a href="index.php?section=grid" id="navGrid">Raster</a></li>
							
							

				</ul>
				
				
				
				
				
				
				  <!--ul id="pageNav">
					<li id="menue"><a>Men&uuml;</a>
						<ul>
						
						
							<?php
								if (!isset($_GET["section"])) {
									$_GET["section"] = "portrait";
								}
							?>
							<li<?php ($_GET["section"] == "portrait" ? print ' class="active"':'')?>><a href="index.php?section=portrait" id="navPortrait">Portrait</a></li>				
							<li<?php ($_GET["section"] == "map" ? print ' class="active"':'')?>><a href="index.php?section=map" id="navMap">Landkarte</a></li>
							<li<?php ($_GET["section"] == "grid" ? print ' class="active"':'')?>><a href="index.php?section=grid" id="navGrid">Raster</a></li>
							
							
						</ul>
					</li>
				</ul-->

				

        </div>
    </header>