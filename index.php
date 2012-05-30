<?php 
	include 'parts/header.php';
?>


<?php

$section = array();
$section['protagonisten'] = 'protagonisten.php';
$section['karte'] = 'karte.php';
$section['matrix'] = 'matrix.php';

if (isset($_GET['section'], $section[$_GET['section']])) {

    include $section[$_GET['section']];
} else {
    include 'protagonisten.php'; // wird keine "section" übergeben, dann lade standardmäßig "protagonisten"
}
?>


<?php
	include 'parts/footer.php';
	
?>
