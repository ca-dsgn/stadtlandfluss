<?php
include_once ("VideoController.php");
$vc = new VideoController();
echo $vc->getVideo(2);
echo ("<br/>");
echo $vc->getPreviousVideo(2);
echo ("<br/>");
echo $vc->getNextVideo(2);
echo ("<br/>");
echo $vc->getTags(2);
echo ("<br/>");
echo $vc->getImages(2);
echo ("<br/>");
echo $vc->getComments(2);
echo ("<br/>");
echo $vc->getPersons(0);
echo ("<br/>");
echo $vc->getMatrixView(0,5);
echo ("<br/>");
echo $vc->getNumOfVideos();
echo ("<br/>");
echo $vc->getAllLocations();
?>