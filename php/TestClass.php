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
echo $vc->getSuggestions(0,2);
echo "<br/>Erfolgreich hochgezählte Datensätze: ".$vc->incrementVote(1);
?>