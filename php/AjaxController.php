<?php

	include_once("VideoController.php");

/**
 * Class AjaxController
 * contains video functions
 * @author ON09 DHBW Mosbach 2012
 */

if (isset($_POST["action"])) {
	
	switch ($_POST["action"]) {
		
		case "getVideoById":
		
			$_POST["id"] = $Video_ID;
			
			
		
			$videoController = new VideoController();
			break;
		
		default: 
			
			$result = Array(
			
				"status" => "error",
				"message" => "There is no implementation for this action"
			);
			break;
	}
	print json_encode($result);
}

?>