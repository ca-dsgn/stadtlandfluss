<?php
	include_once ("php/VideoController.php");
	include_once ("php/helper.php");
			
	$vc = new VideoController();
	$helper = new Helper();
	
	$portrait_elements = Array();
	
	for ($i=0; $i<5; $i++) {
		
		$element = json_decode($vc->getVideoWithImages($i));
		$persons = json_decode($vc->getPersons($i));
		
		$portrait_element = Array("data" => $element[0],
								  "persons" => $persons
		);
		array_push($portrait_elements,$portrait_element);
	}
	
	
?>
<div id="protagonistContent">
	<div class="backgroundImages">
    	<?php
		
			foreach ($portrait_elements as $element) {
        
				print '<div class="backgroundImage" style="background-image: url('.$element["data"]->backgroundimage.')" /></div>';
			}
		?>
  	</div>
	<div class="wrapper">
		<ul>
		<?php
		
			foreach ($portrait_elements as $element) {
				
				foreach($element["persons"] as $person) {
					
					if ($person->type == "Protagonist") {
						
						$protagonist = $person->name;
					}
				}
				
				$html = '';
				$html.= '<li class="contentBox">';
				$html.= '<img src="'.$element["data"]->keyvisual.'" class="portraitIMG" alt="moderne-single"/>';
				$html.= '<div class="playButton">';
				$html.= '<input type="hidden" class="video_src" value="'.$helper->getYoutubeID($element["data"]->source).'"/>';
				$html.= '</div>';
				$html.= '<div class="description">';
				$html.= '<hgroup>';
				$html.= '<h2>'.$protagonist.'</h2>';
				$html.= '<h1>'.$element["data"]->title.'</h1>';
				$html.= '</hgroup>';
				$html.= '<p>';
				$html.= '<a href="index.php?section=detail&video_id='.$element["data"]->Video_ID.'" class="infoLink">weitere Infos</a>';
				$html.= '</p>';
				$html.= '</div>';
				$html.= '</li>';
				
				print $html;
			}
		?>
		</ul>
		<div class="arrowLeft"></div>
		<div class="arrowRight"></div>
	</div>
</div>