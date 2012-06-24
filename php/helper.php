<?php

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
	public function getVideoTemplateById($id) {
								
		global $vc;
		
		$element = json_decode($vc->getVideoWithImages($id));
		
		return $this->getTemplate($element[0]->Video_ID,$element[0]->title,$element[0]->description,$element[0]->images);
	}
	
	public function getVideoTemplate($id,$title,$description,$images) {
		
		return $this->getTemplate($id,$title,$description,$images);
	}
	
	public function getTemplate($id,$title,$description,$images) {
		
		$html = '<li class="item" ref="'.$id.'">';
		$html.= '<div class="box">';
		$html.= '<img src="'.$images[0]->url.'" alt="'.$images[0]->alt.'"/>';
		$html.= '</div>';
		$html.= '<div class="images">';
		$html.= '<div class="top">';
		$html.= '<img src="'.$images[1]->url.'" alt="'.$images[1]->alt.'"/>';
		$html.= '</div>';
		$html.= '<div class="bottom">';
		$html.= '<img src="'.$images[2]->url.'" alt="'.$images[2]->alt.'"/>';
		$html.= '</div>';
		$html.= '</div>';
		$html.= '<div class="info">';
		$html.= '<div class="info_box">';
		$html.= '<h2>'.$title.'</h2>';
		$html.= '<p>'.substr($description,0,200).'&hellip; <a class="weiterlesenLink" href="index.php?section=detail&video_id='.$id.'">&raquo; weiterlesen</a></p>';
		$html.= '';
		$html.= '</div>';
		$html.= '</div>';
		$html.= '</li>';
		
		return $html;
	}
	
	public function makeYoutubeURL($source,$autoplay=FALSE) {
		
		$source = "http://www.youtube.com/v/".substr($source,strpos($source,"v=")+2,strlen($source));
	
		if ($autoplay) {
			
			$source.= "&autoplay=1";
		}
		return $source;
	}
}

?>