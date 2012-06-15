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
	* returns the number of available videos
	*/
	public function getNumOfVideos()
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->query("SELECT COUNT(Video_ID) FROM videos", "stadtlandfluss", "ro");
		return $resultSet[0];
	}
	
	/**
	* returns the videoData as JSON to a given video index
	*/
	public function getVideo($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID = ".$p_iCurrentIndex, "stadtlandfluss", "ro");
			return json_encode($resultSet);
	}
	
	/**
	* returns the videoData as JSON of the previous video to the given index
	*/
	public function getPreviousVideo($p_iCurrentIndex)
	{
			if($p_iCurrentIndex == 0)
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID=(Select MAX(Video_ID) from videos)", "stadtlandfluss", "ro");
				return json_encode($resultSet);
			}
			else
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID = ".--$p_iCurrentIndex, "stadtlandfluss", "ro");
				return json_encode($resultSet);
			}
	}
	
	/**
	* returns the videoData as JSON of the next video to the given index
	*/
	public function getNextVideo($p_iCurrentIndex)
	{
			if($p_iCurrentIndex == $this->idMax)
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID=(Select MIN(Video_ID) from videos)", "stadtlandfluss", "ro");
				return json_encode($resultSet);
			}
			else
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID = ".++$p_iCurrentIndex, "stadtlandfluss", "ro");
				return json_encode($resultSet);
			}
	}
	
	/**
	* returns a tag array belonging to the given video ID	
	*/
	public function getTags($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("Select * from tags where Video_ID = ".$p_iCurrentIndex, "stadtlandfluss", "ro");
			return json_encode($resultSet);
	}
	
	/**
	* returns an image array belonging to the given video ID	
	*/
	public function getImages($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("Select * from images where Video_ID = ".$p_iCurrentIndex, "stadtlandfluss", "ro");
			return json_encode($resultSet);
	}
	
	/**
	* returns a comments array belonging to the given video ID	
	*/
	public function getComments($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("Select * from comments where Video_ID = ".$p_iCurrentIndex, "stadtlandfluss", "ro");
			return json_encode($resultSet);
	}
	
	/**
	* returns the persons belonging to the given video ID	
	*/
	public function getPersons($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("SELECT * FROM Persons JOIN person2video ON person2video.Person_ID = Persons.Person_ID WHERE Video_ID = ".$p_iCurrentIndex, "stadtlandfluss", "ro");
			return json_encode($resultSet);
	}
	
	/**
	* returns a video array with the given number of videos	beginning with the given startIndex
	*/
	public function getMatrixView($p_iStart, $p_iNum)
	{		
			$dbConnection = new Database();
			//$resultSet = $dbConnection->queryAssoc("SELECT * FROM videos WHERE Video_ID >= ".$p_iStart." and Video_ID <".$p_iNum, "stadtlandfluss", "ro");
			//SELECT * FROM videos LEFT JOIN images ON videos.Video_ID = images.Video_ID WHERE videos.Video_ID >= 0 and videos.Video_ID < 5
			$resultSet = $dbConnection->queryAssoc("SELECT * FROM videos LEFT JOIN images ON videos.Video_ID = images.Video_ID WHERE videos.Video_ID >= ".$p_iStart." and videos.Video_ID <".$p_iNum, "stadtlandfluss", "ro");
			return json_encode($resultSet);
	}
	
	/**
	* returns the locations of the videos	
	*/
	public function getAllLocations()
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("SELECT altitude, longitude, Video_ID FROM videos", "stadtlandfluss", "ro");
			return json_encode($resultSet);
	}
	
	
	/**
	*checks if the given video ID exists
	*/
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