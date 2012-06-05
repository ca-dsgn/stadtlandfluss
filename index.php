<?php 
	include 'parts/header.php';
?>


<?php

$section = array();
$section['portrait'] = 'portrait.php';
$section['map'] = 'maps.php';
$section['grid'] = 'grid.php';

if (isset($_GET['section'], $section[$_GET['section']])) {

    include $section[$_GET['section']];
} else {
    include 'portrait.php'; // wird keine "section" übergeben, dann lade standardmäßig "portrait"
}
?>


<?php
	include 'parts/footer.php';
	
?>
