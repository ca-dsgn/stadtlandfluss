<?php
include_once ("database.php");

/**
 * Class VideoController
 * contains video functions
 * @author ON09 DHBW Mosbach 2012
 */
 
class VideoController
{
	private $dbConnection = new Database();
	
	/**
	* returns the hyperlink to a given video index
	*/
	public function getVideo($p_iCurrentIndex)
	{
		$dbConnection->connect("stadtlandfluss");
		$resultSet = $dbConnection->query("Select title from videos");
		$dbConnection->disconnect();
		return $resultSet[0];
	}
	
	/**
	* returns the hyperlink of the previous video
	*/
	public function getPreviousVideo($p_iCurrentIndex)
	{
		//###
	}
	
	/**
	* returns the hyperlink of the next video
	*/
	public function getNextVideo($p_iCurrentIndex)
	{
		//### 
	}
	
	/**
	* returns the date of the current Video
	*/
	public function getVideoDate($p_iCurrentIndex)
	{
		//###
	}
	
	/**
	* returns the tags of the current Video as csv
	*/
	public function getVideoTagsAsCsv($p_iCurrentIndex)
	{
		//###
	}
	
	/**
	* returns the title of the current Video
	*/
	public function getVideoTitle($p_iCurrentIndex)
	{
		//###
	}
	
	/**
	* returns the subtitle of the current Video
	*/
	public function getVideoSubtitle($p_iCurrentIndex)
	{
		//###
	}
	
	/**
	* returns the descrition of the current Video
	*/
	public function getVideoDescription($p_iCurrentIndex)
	{
		//###
	}
	
	/**
	* returns the images of the current Video as csv
	*/
	public function getVideoImagesAsCsv($p_iCurrentIndex)
	{
		//###
	}
	
	
}