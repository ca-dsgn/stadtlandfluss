<?php

	include_once("VideoController.php");
	include_once("helper.php");

/**
 * Class AjaxController
 * contains video functions
 * @author ON09 DHBW Mosbach 2012
 */

if (isset($_POST["action"])) {
	
	$vc = new VideoController();
	$helper = new Helper();
	
	switch ($_POST["action"]) {
		
		case "getVideoById":
		
			$Video_ID = $_POST["id"];
			$result = $helper->getVideoTemplateById($Video_ID,"maps");
			break;
			
		case "getVideoUrlById":
		
			$Video_ID = $_POST["id"];
			$video_object = json_decode($vc->getVideo($Video_ID));
			
			$result = $helper->getYoutubeID($video_object[0]->source);
			break;
		
		default: 
			
			$result = Array(
			
				"status" => "error",
				"message" => "There is no implementation for this action"
			);
			break;
	}
	print $result;
}

?>