<?php 

	include "parts/header.php";

	$section = array();
	$section['start'] = 'start.php';
	$section['portrait'] = 'portrait.php';
	$section['map'] = 'maps.php';
	$section['grid'] = 'grid.php';
	$section['detail'] = 'detail.php';
	
	if (isset($_GET['section'], $section[$_GET['section']])) {

	    include $section[$_GET['section']];
	}
	else {
		
    	include 'start.php';
	}
	include "parts/footer.php";
	
?>
