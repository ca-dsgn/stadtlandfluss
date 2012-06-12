<?php
include_once ("VideoController.php");
$vc = new VideoController();
echo $vc->getVideo(2);
echo ("<br/>");
echo $vc->getPreviousVideo(2);
echo ("<br/>");
echo $vc->getNextVideo(2);
?>