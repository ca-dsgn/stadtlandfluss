<?php
	include_once ("php/VideoController.php");
			
	$vc = new VideoController();
?>

<div id="gridContent">
	<div class="wrapper">	
		<div class="contentBox">
			<div class="gridContainer">
		    	<div class="slider">
		            <ul class="page is_shown" id="1">
		                <?php
						
							function getVideoTemplateById($id) {
								
								global $vc;
								
								$element = json_decode($vc->getVideo($id));
								
								return getTemplate($element[0]->Video_ID,$element[0]->title,$element[0]->description,NULL);
							}
							
							function getVideoTemplate($id,$title,$description,$images) {
								
								return getTemplate($id,$title,$description,$images);
							}
							
							function getTemplate($id,$title,$description,$images) {
								
								$html = '<li class="item" ref="'.$id.'">';
								$html.= '<div class="box">';
								$html.= '<img src="img/grid/motorcross_main.png" alt="'.$title.'"/>';
								$html.= '</div>';
								$html.= '<div class="images">';
								$html.= '<div class="top">';
								$html.= '<img src="img/grid/motorcross_main.png" alt="'.$title.'"/>';
								$html.= '</div>';
								$html.= '<div class="bottom">';
								$html.= '<img src="img/grid/motorcross_main.png" alt="'.$title.'"/>';
								$html.= '</div>';
								$html.= '</div>';
								$html.= '<div class="info">';
								$html.= '<div class="info_box">';
								$html.= '<h2>'.$title.'</h2>';
								$html.= '<p>'.$description.'</p>';
								$html.= '<a>Link</a>';
								$html.= '<a>Link</a>';
								$html.= '</div>';
								$html.= '</div>';
								$html.= '</li>';
								
								return $html;
							}
							
							$max = $vc->getNumOfVideos();
							
							$grid_elements = json_decode($vc->getMatrixView(0,$max));
							
							foreach($grid_elements as $element) {
								
								print getVideoTemplate($element->Video_ID,$element->title,$element->description,NULL);
								
								//for debugging
								//print_r($element);
							}
						?>
		            </ul>
		        </div>
		    </div>
		    <div class="playList">
		    	<div class="info">
		        	<h3>PlayList</h3>
		        	<p>Ziehen Sie die Filme in die PlayList</p>
		        </div>
		    	<ul>
		        	<?php
						
						if ($_COOKIE["playlist"] != null && $_COOKIE["playlist"] != "") {
							
							$ids = explode("-",$_COOKIE["playlist"]);
							
							foreach ($ids as $id) {
							
								print getVideoTemplateById($id);
							}
						}
					?>
		        </ul>
		        <div class="arrowBottom"></div>
		    	<div class="arrowTop"></div>
		    </div>
		    <div class="clear"></div>
		    <div class="naviPages">
		    	<ul>
		        	<li ref="1" class="current"></li>
		            <li ref="2"></li>
		            <li ref="3"></li>
		            <li ref="4"></li>
		        </ul>
		    </div>
    
    
        </div>
    </div>
</div>