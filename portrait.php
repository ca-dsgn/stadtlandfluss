<?php
	include_once ("php/VideoController.php");
	include_once ("php/helper.php");
			
	$vc = new VideoController();
	$helper = new Helper();
?>
<div id="protagonistContent">
	<div class="backgroundImages">
		<div class="backgroundImage" id="backModerne"></div>
		<div class="backgroundImage" id="backWind"></div>
    <div class="backgroundImage" id="backMotocross"></div>
    <div class="backgroundImage" id="backPizza"></div>
    <div class="backgroundImage" id="backWinsun"></div>
  </div>
	<div class="wrapper">
		<ul>
		<?php
		
			for ($i=0; $i<5; $i++) {
				
				$element = json_decode($vc->getVideoWithImages($i));
				
				$persons = json_decode($vc->getPersons($i));
				
				foreach($persons as $person) {
					
					if ($person->type == "Protagonist") {
						
						$protagonist = $person->name;
					}
				}
				
				$html = '';
				$html.= '<li class="contentBox">';
				$html.= '<img src="'.$element[0]->keyvisual.'" class="portraitIMG" alt="moderne-single"/>';
				$html.= '<div class="playButton"></div>';
				$html.= '<div class="description">';
				$html.= '<hgroup>';
				$html.= '<h2>'.$protagonist.'</h2>';
				$html.= '<h1>'.$element[0]->title.'</h1>';
				$html.= '</hgroup>';
				$html.= '<p>';
				$html.= '<a href="index.php?section=detail&video_id='.$element[0]->Video_ID.'" class="infoLink">weitere Infos</a>';
				$html.= '</p>';
				$html.= '</div>';
				$html.= '</li>';
				
				print $html;
				
				//print_r($element);
			}
		?>
		</ul>
		<div class="arrowLeft"></div>
		<div class="arrowRight"></div>
		<div id="" class="videoLayer">
			<div class="videoPlayer">
				<object>
					<param value="http://www.youtube.com/v/p74Ui12Y55c&showinfo=0" name="movie">
	        <param value="opaque" name="wmode">
	        <param value="true" name="allowFullScreen">
	        <param value="always" name="allowScriptAccess">
	        <embed style="width: 100%; height: 100%" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" src="http://www.youtube.com/v/p74Ui12Y55c&showinfo=0" wmode="opaque">
	      </object>
      </div>
			<a href="" class="closeButton">close</a>
		</div>
		
	</div>
</div>