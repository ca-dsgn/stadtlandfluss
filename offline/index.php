<!DOCTYPE html>
<html>
    <head>
        <title>StadtLandFluss-Geschichten</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="offline.css" type="text/css"/>
        <link rel="shortcut icon" href="../favicon.png" type="image/png"/>
        <link rel="icon" href="../favicon.png" type="image/png"/>
    </head>
    <body>
        <div id="wrapper">
            <img id="logo" src="img/logo.png" />
		<?php
		/* Datum bitte anpassen (Stunde, Minute, Sekunde, Monat, Tag, Jahr) */
		$bis = mktime(0, 0, 0, 7, 4, 2012);
		$rest = $bis - time();
		$wochen = 0;
		$tage = 0;
		$stunden = 0;
		$minuten = 0;
		
		if ($rest >= 604800) {
			$wochen = floor($rest/604800);
			$rest -= $wochen*604800;
		}
		if ($rest >= 86400) {
			$tage = floor($rest/86400);
			$rest -= $tage*86400;
		}
		if ($rest >= 3600) {
			$stunden = floor($rest/3600);
			$rest -= $stunden*3600;
		}
		
		echo "<p>Noch ca. " . $wochen . " Woche(n), " . $tage . " Tag(e) und " . $stunden . " Stunde(n).</p>";
		?>            
        </div>
    </body>
</html>