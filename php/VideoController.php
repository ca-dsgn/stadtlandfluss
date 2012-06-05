<?php
include_once ("database.php");

/**
 * Class VideoController
 * contains video functions
 * @author ON09 DHBW Mosbach 2012
 */
 
class VideoController
{
	private $dbConnection;
	private $idMax; //the maximum ID of the database
	private $defaultVideoSource = "./videos/defaultVideo.mp4";
	
	function __construct()
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->query("Select MAX(ID) from videos", "stadtlandfluss", "ro");
		$this->idMax = $resultSet[0];
	}
	
	
	/**
	* returns the hyperlink to a given video index
	*/
	public function getVideo($p_iCurrentIndex)
	{
		if($this->idIsValid($p_iCurrentIndex))
		{
			$dbConnection = new Database();
			$resultSet = $dbConnection->query("Select source from videos where ID = ".$p_iCurrentIndex, "stadtlandfluss", "ro");
			return $resultSet[0];
		}
		else
		{
			return $defaultVideoSource;
		}
	}
	
	/**
	* returns the hyperlink of the previous video
	*/
	public function getPreviousVideo($p_iCurrentIndex)
	{
		if($this->idIsValid($p_iCurrentIndex))
		{
			if($p_iCurrentIndex == 0)
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->query("Select source from videos where ID=(Select MAX(ID) from videos)", "stadtlandfluss", "ro");
				return $resultSet[0];
			}
			else
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->query("Select source from videos where ID = ".$p_iCurrentIndex-1, "stadtlandfluss", "ro");
				return $resultSet[0];
			}
		}
		else
		{
			return $defaultVideoSource;
		}
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
	
	private function idIsValid($p_ID)
	{
		if($p_ID >=0 && $p_ID <= $this->idMax)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
}
?>