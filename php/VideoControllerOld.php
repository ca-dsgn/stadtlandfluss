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
		$resultSet = $dbConnection->query("Select MAX(Video_ID) from videos", "stadtlandfluss", "ro");
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
			$resultSet = $dbConnection->query("Select source from videos where Video_ID = ".$p_iCurrentIndex, "stadtlandfluss", "ro");
			return $resultSet[0];
		}
		else
		{
			return $this->defaultVideoSource;
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
				$resultSet = $dbConnection->query("Select source from videos where Video_ID=(Select MAX(Video_ID) from videos)", "stadtlandfluss", "ro");
				return $resultSet[0];
			}
			else
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->query("Select source from videos where Video_ID = ".--$p_iCurrentIndex, "stadtlandfluss", "ro");
				return $resultSet[0];
			}
		}
		else
		{
			return $this->defaultVideoSource;
		}
	}
	
	/**
	* returns the hyperlink of the next video
	*/
	public function getNextVideo($p_iCurrentIndex)
	{
		if($this->idIsValid($p_iCurrentIndex))
		{
			if($p_iCurrentIndex == $this->idMax)
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->query("Select source from videos where Video_ID=(Select MIN(Video_ID) from videos)", "stadtlandfluss", "ro");
				return $resultSet[0]; 
			}
			else
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->query("Select source from videos where Video_ID = ".++$p_iCurrentIndex, "stadtlandfluss", "ro");
				return $resultSet[0];
			}
		}
		else
		{
			return $this->defaultVideoSource;
		}
	}
	
	/**
	* returns a video array with the given number of videos	
	*/
	public function getMatrixView($p_iAnzVideos)
	{
		
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