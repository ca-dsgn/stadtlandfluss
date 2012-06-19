<?php
include_once ("VideoController.php");
$vc = new VideoController();


echo ("<br/><br/>Rückgabe der MatrixView Videos mit 3 Bildern zu jedem Video:<br/>");

echo $vc->getMatrixViewWithImages(0,5);


echo ("<br/><br/>Anzahl der eingepflegten Videos:<br/>");
echo ("GetVideo:<br/>");
echo $vc->getVideo(2);
echo ("<br/><br/>PreviousVideo:<br/>");
echo $vc->getPreviousVideo(2);
echo ("<br/><br/>NextVideo:<br/>");
echo $vc->getNextVideo(2);
echo ("<br/><br/>Tags:<br/>");
echo $vc->getTags(2);
echo ("<br/><br/>Bilder:<br/>");
echo $vc->getImages(2);
echo ("<br/><br/>Kommentare:<br/>");
echo $vc->getComments(2);
echo ("<br/><br/>Personen:<br/>");
echo $vc->getPersons(0);
echo ("<br/><br/>Rückgabe der MatrixView Videos:<br/>");
echo $vc->getMatrixView(0,5);
echo $vc->getNumOfVideos();
echo ("<br/><br/>All Locations:<br/>");
echo $vc->getAllLocations();
echo ("<br/><br/>Get Suggestions from bis Anz:<br/>");
echo $vc->getSuggestions(0,8);
echo "<br/>Erfolgreich hochgezählte Datensätze: ".$vc->incrementVote(1);
echo "<br/>Erfolgreich erstellte suggestions: ".$vc->createSuggestion('name','story','phone','mail');
echo ("<br/><br/>Show suggestion with ID 7:<br/>");
echo $vc->getSuggestion(7);
echo ("<br/><br/>Show the highest suggestion ID<br/>");
echo $vc->getMaxNumberOfSuggestions();
echo ("<br/><br/>Show the highest story ID<br/>");
echo $vc->getMaxNumberOfStories();
echo ("<br/><br/>Available suggestions:<br/>");
echo $vc->getNumOfSuggestions();
echo ("<br/><br/>Available stories:<br/>");
echo $vc->getNumOfStories();
echo ("<br/><br/>Creating story:<br/>");
echo $vc->createStory('Der, der niemals heimging', 'lorem ipsum...', 1);
?>