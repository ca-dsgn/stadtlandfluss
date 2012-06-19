<?php

	include_once("VideoController.php");
	include_once("helper.php");

/**
 * Class AjaxController
 * contains video functions
 * @author ON09 DHBW Mosbach 2012
 */

if (isset($_POST["action"])) {
	
	switch ($_POST["action"]) {
		
		case "getVideoById":
		
			$Video_ID = $_POST["id"];
			
			$vc = new VideoController();
			$helper = new Helper();
			print $helper->getVideoTemplateById($Video_ID);
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