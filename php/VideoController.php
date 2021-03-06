<?php
include_once ("database.php");
include_once ("helper.php");

/**
 * Class VideoController
 * contains video functions
 * @author ON09 DHBW Mosbach 2012
 */
class VideoController
{
	private $dbConnection;
	private $idMax; //the maximum video ID of the database
	private $defaultVideoSource = "./videos/defaultVideo.mp4";
	private $helper;
	
	function __construct()
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->query("Select MAX(Video_ID) from videos", $dbConnection->get_database(), "ro");
		$this->idMax = $resultSet[0];
		$this->helper = new Helper();
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
	* returns the highest VideoID
	*/
	public function getMaxVideoID()
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->query("SELECT MAX(Video_ID) FROM videos", $dbConnection->get_database(), "ro");
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
	*	returns the Video including the images belonging to it
	*/
	
	public function getVideoWithImages($p_iCurrentIndex)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID = ".$p_iCurrentIndex, $dbConnection->get_database(), "ro"); //fill with videos
			
			$resultSetImages = $dbConnection->queryAssoc("SELECT * FROM images WHERE Video_ID =".$p_iCurrentIndex, $dbConnection->get_database(), "ro"); // fill with images
			
			$image_array = Array();
			foreach($resultSetImages AS $key => $value) { //iterate through images
				
				array_push($image_array,array(
					"Image_ID"=>$value["Image_ID"],
					"url"=>$value["url"],
					"alt"=>$value["alt"]
					)
				);
			}
			$this->helper->array_push_associative($resultSet[0],array("images" => $image_array)); //insert images into json structure
			
			return json_encode($resultSet);
	}
	
	/*
	* returns the given number of latest videos having a background image and a keyvisual
	*/
	
	public function getLatestVideosForPortrait($p_iNum)
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->queryAssoc("Select * from videos WHERE backgroundimage!='' AND keyvisual!='' order by Video_id desc LIMIT ".$p_iNum, $dbConnection->get_database(), "ro");
		return json_encode($resultSet);
	}

	/*
	* returns the given number of latest videos
	*/
	
	public function getLatestVideos($p_iNum)
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->queryAssoc("Select * from videos order by Video_id desc LIMIT ".$p_iNum, $dbConnection->get_database(), "ro");
		return json_encode($resultSet);
	}

	
	/**
	* returns the videoData as JSON of the previous video to the given index
	*/
	public function getPreviousVideo($p_iCurrentIndex)
	{
			if($p_iCurrentIndex == 0) //if is first
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID=(Select MAX(Video_ID) from videos)", $dbConnection->get_database(), "ro");
				return json_encode($resultSet);
			}
			else
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID = (Select MAX(Video_ID) from videos where Video_ID < ".$p_iCurrentIndex.")", $dbConnection->get_database(), "ro");
				return json_encode($resultSet);
			}
	}
	
	/**
	* returns the videoData as JSON of the next video to the given index
	*/
	public function getNextVideo($p_iCurrentIndex)
	{
			if($p_iCurrentIndex == $this->idMax) //if is last video
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID=(Select MIN(Video_ID) from videos)", $dbConnection->get_database(), "ro");
				return json_encode($resultSet);
			}
			else 
			{
				$dbConnection = new Database();
				$resultSet = $dbConnection->queryAssoc("Select * from videos where Video_ID = (Select MIN(Video_ID) from videos where Video_ID > ".$p_iCurrentIndex.")", $dbConnection->get_database(), "ro");
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
			$resultSet = $dbConnection->queryAssoc("SELECT * FROM persons JOIN person2video ON person2video.Person_ID = persons.Person_ID WHERE Video_ID = ".$p_iCurrentIndex, $dbConnection->get_database(), "ro");
			return json_encode($resultSet);
	}
	
	
	/**
	* returns the filmcrew belonging to the given video ID	
	*/
	
	public function getFilmCrew($p_iCurrentIndex)
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->queryAssoc("SELECT * FROM persons JOIN person2video ON person2video.Person_ID = persons.Person_ID WHERE Video_ID = ".$p_iCurrentIndex." AND person2video.isfilmcrew = '1'", $dbConnection->get_database(), "ro");
		return json_encode($resultSet);
	}

	/**
	* returns the actors belonging to the given video ID	
	*/
	
	public function getActors($p_iCurrentIndex)
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->queryAssoc("SELECT * FROM persons JOIN person2video ON person2video.Person_ID = persons.Person_ID WHERE Video_ID = ".$p_iCurrentIndex." AND person2video.isfilmcrew = '0'", $dbConnection->get_database(), "ro");
		return json_encode($resultSet);
	}	
	
	/**
	* returns a video array from index param1 to index param2
	*/
	public function getMatrixView($p_iStart, $p_iEnd)
	{		
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("SELECT * FROM videos WHERE Video_ID >= ".$p_iStart." and Video_ID <".$p_iEnd, $dbConnection->get_database(), "ro");
			//SELECT * FROM videos LEFT JOIN images ON videos.Video_ID = images.Video_ID WHERE videos.Video_ID >= 0 and videos.Video_ID < 5
			//$resultSet = $dbConnection->queryAssoc("SELECT * FROM videos LEFT JOIN images ON videos.Video_ID = images.Video_ID WHERE videos.Video_ID >= ".$p_iStart." and videos.Video_ID <".$p_iNum, $dbConnection->get_database(), "ro");
			return json_encode($resultSet);
	}
	
	
	/**
	*	returns a JSON String with all Videos and their videos for the matrix view
	*/ 
	
	public function getMatrixViewWithImages($p_iStart, $p_iEnd)
	{		
			$dbConnection = new Database();
			$resultSetVideos = $dbConnection->queryAssoc("SELECT * FROM videos WHERE Video_ID >= ".$p_iStart." and Video_ID <".$p_iEnd, $dbConnection->get_database(), "ro");
			//SELECT * FROM videos LEFT JOIN images ON videos.Video_ID = images.Video_ID WHERE videos.Video_ID >= 0 and videos.Video_ID < 5
			$id_array = Array();
			$i=0;
			foreach($resultSetVideos AS $key => $value) //iterate through Videos
			{									
					$this->helper->array_push_associative($resultSetVideos[$i],array("images" => json_decode($this->getImages($value['Video_ID']),true))); //insert images into json structure
					$i++;
			}
			return json_encode($resultSetVideos);
	}
	
	
	/**
	* returns the locations of the videos	
	*/
	public function getAllLocations()
	{
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
	
	/*
	 * returns the suggestions from startID param1 to endID param2
	*/
	
	public function getSuggestions($p_iStart, $p_iEnd)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("SELECT * FROM suggestions WHERE Suggestion_ID >= ".$p_iStart." and Suggestion_ID <".$p_iEnd, $dbConnection->get_database(), "ro");
			return json_encode($resultSet);
	}
	
	/*
	 * increases the number of votes 4 a given story ID
	*/
	
	public function incrementVote($p_storyID)
	{
		$dbConnection = new Database();
		$affectedRows = $dbConnection->queryInsertion("UPDATE stories SET votes = votes+1 WHERE Story_ID = ".$p_storyID, $dbConnection->get_database(), "ro");
		return $affectedRows;
	}
	
	/*
	 * creates a new suggestion
	 *@param name
	 *@param story
	 *@param phone
	 *@param mail
	*/	
	public function createSuggestion($p_name, $p_story, $p_phone, $p_mail)
	{
		$dbConnection = new Database();
		$affectedRows = $dbConnection->queryInsertion("INSERT INTO suggestions (name, timestamp, story, phone, mail) VALUES ('".$p_name."',NOW(),'".$p_story."','".$p_phone."','".$p_mail."')", $dbConnection->get_database(), "ro");
		return $affectedRows;		
	}
	
	/*
	 * creates a new story
	 *@param title
	 *@param description
	 *@param visible binary 0 or 1 -> 1 for visible; 0 for invisible
	*/	
	public function createStory($p_title, $p_description, $p_visible)
	{
		$dbConnection = new Database();
		$affectedRows = $dbConnection->queryInsertion("INSERT INTO stories (title, description, visible) VALUES ('".$p_title."','".$p_description."','".$p_visible."')", $dbConnection->get_database(), "ro");
		return $affectedRows;		
	}
	
	
	
	/*
	 * returns the suggestion to the given ID
	*/
	
	public function getSuggestion($p_ID)
	{
			$dbConnection = new Database();
			$resultSet = $dbConnection->queryAssoc("SELECT * FROM suggestions WHERE Suggestion_ID = ".$p_ID, $dbConnection->get_database(), "ro");
			return json_encode($resultSet);
	}	
	
	
	/**
	* returns the max ID of suggestions
	*/
	public function getMaxNumberOfSuggestions()
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->query("Select MAX(Suggestion_ID) from suggestions", $dbConnection->get_database(), "ro");
		return $resultSet[0];
	}
	
	/**
	* returns the number of available suggestions
	*/
	public function getNumOfSuggestions()
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->query("SELECT COUNT(Suggestion_ID) FROM suggestions", $dbConnection->get_database(), "ro");
		return $resultSet[0];
	}
	
	/**
	* returns the max ID of stories
	*/
	public function getMaxNumberOfStories()
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->query("Select MAX(Story_ID) from stories", $dbConnection->get_database(), "ro");
		return $resultSet[0];
	}
	
	/**
	* returns the number of available stories
	*/
	public function getNumOfStories()
	{
		$dbConnection = new Database();
		$resultSet = $dbConnection->query("SELECT COUNT(Story_ID) FROM stories", $dbConnection->get_database(), "ro");
		return $resultSet[0];
	}
}
?>