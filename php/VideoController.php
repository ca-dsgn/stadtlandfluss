<?php
include_once ("database.php");

/**
 * Class VideoController
 * contains video functions
 * @author ON09 DHBW Mosbach 2012
 */
 
class Helper {

	private $ret;

	public function array_push_associative(&$arr) {
	
	   $args = func_get_args();
	   
	   foreach ($args as $arg) {
		   if (is_array($arg)) {
			   foreach ($arg as $key => $value) {
				   $arr[$key] = $value;
				   $this->ret++;
			   }
		   }else{
			   $arr[$arg] = "";
		   }
	   }
	   return $this->ret;
	}
}
 
class VideoController
{
	private $dbConnection;
	private $idMax; //the maximum ID of the database
	private $defaultVideoSource = "./videos/defaultVideo.mp4";
	
	function __construct()
	{
		$dbConnection = new Database();
		
		$resultSet = $dbConnection->query("Select MAX(Video_ID) from videos", $dbConnection->get_database(), "ro");
		$this->idMax = $resultSet[0];
	}
	
	/**
	* returns the number of available videos
	*/
	public function getNumOfVideos()
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->query("SELECT COUNT(Video_ID) FROM videos", $dbConnection->get_database(), "ro");
		return $resultSet[0];
	}
	
	/**
	* returns the videoData as JSON to a given video index
	*/
	public function getVideo($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID = ".$p_iCurrentIndex, $dbConnection->get_database(), "ro");
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
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID=(Select MAX(Video_ID) from videos)", $dbConnection->get_database(), "ro");
				return json_encode($resultSet);
			}
			else
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID = ".--$p_iCurrentIndex, $dbConnection->get_database(), "ro");
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
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID=(Select MIN(Video_ID) from videos)", $dbConnection->get_database(), "ro");
				return json_encode($resultSet);
			}
			else
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID = ".++$p_iCurrentIndex, $dbConnection->get_database(), "ro");
				return json_encode($resultSet);
			}
	}
	
	/**
	* returns a tag array belonging to the given video ID	
	*/
	public function getTags($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("Select * from tags where Video_ID = ".$p_iCurrentIndex, $dbConnection->get_database(), "ro");
			return json_encode($resultSet);
	}
	
	/**
	* returns an image array belonging to the given video ID	
	*/
	public function getImages($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("Select * from images where Video_ID = ".$p_iCurrentIndex, $dbConnection->get_database(), "ro");
			return json_encode($resultSet);
	}
	
	/**
	* returns a comments array belonging to the given video ID	
	*/
	public function getComments($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("Select * from comments where Video_ID = ".$p_iCurrentIndex, $dbConnection->get_database(), "ro");
			return json_encode($resultSet);
	}
	
	/**
	* returns the persons belonging to the given video ID	
	*/
	public function getPersons($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("SELECT * FROM Persons JOIN person2video ON person2video.Person_ID = Persons.Person_ID WHERE Video_ID = ".$p_iCurrentIndex, $dbConnection->get_database(), "ro");
			return json_encode($resultSet);
	}
	
	/**
	* returns a video array with the given number of videos	beginning with the given startIndex
	*/
	public function getMatrixView($p_iStart, $p_iNum)
	{		
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("SELECT * FROM videos WHERE Video_ID >= ".$p_iStart." and Video_ID <".$p_iNum, "stadtlandfluss", "ro");
			//SELECT * FROM videos LEFT JOIN images ON videos.Video_ID = images.Video_ID WHERE videos.Video_ID >= 0 and videos.Video_ID < 5
			//$resultSet = $dbConnection->queryAssoc("SELECT * FROM videos LEFT JOIN images ON videos.Video_ID = images.Video_ID WHERE videos.Video_ID >= ".$p_iStart." and videos.Video_ID <".$p_iNum, $dbConnection->get_database(), "ro");
			return json_encode($resultSet);
	}
	
	
	public function getMatrixViewWithImages($p_iStart, $p_iNum)
	{		
			$dbConnection = new Database();
			$resultSetVideos = $dbConnection->queryAssoc("SELECT * FROM videos WHERE Video_ID >= ".$p_iStart." and Video_ID <".$p_iNum, "stadtlandfluss", "ro");
			//SELECT * FROM videos LEFT JOIN images ON videos.Video_ID = images.Video_ID WHERE videos.Video_ID >= 0 and videos.Video_ID < 5
			
			$helper = new Helper();
			
			for($i =0; $i <sizeof($resultSetVideos);$i++)
			{
				$tmp = $resultSetVideos[$i];
				$resultSetImages = $dbConnection->queryAssoc("SELECT * FROM images WHERE Video_ID =".$i, $dbConnection->get_database(), "ro");
				$image_array = Array();
				foreach($resultSetImages AS $key => $value) {
					array_push($image_array,array(
						"Image_ID"=>$value["Image_ID"],
						"url"=>$value["url"],
						"alt"=>$value["alt"]
						)
					);
				}
				for ($i=0; $i<5;$i++) 
				{				
					$helper->array_push_associative($resultSetVideos[$i],array("images" => $image_array));
				}				
			}
			return json_encode($resultSetVideos);
	}
	
	
	/**
	* returns the locations of the videos	
	*/
	public function getAllLocations()
	{
	//hier noch name
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("SELECT altitude, longitude, title, Video_ID FROM videos", $dbConnection->get_database(), "ro");
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
	
	public function getSuggestions($p_iStart, $p_iNum)
	{
		
	}
	
	public function incrementVote($p_SuggestionID)
	{
		
	}
	
	public function createSuggestion($p_name, $p_story, $p_phone, $p_mail)
	{
	
	}
	
	public function getSuggestion($p_ID)
	{
		
	}
	
	
}
?>