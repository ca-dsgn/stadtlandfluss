<?php
	include_once ("php/VideoController.php");
			
	$vc = new VideoController();
	
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
?>

<div id="gridContent">
	<div class="wrapper">	
		<div class="contentBox">
			<div class="gridContainer">
		    	<div class="slider">
                	<?php
					
						$page = 1;
						
						$max_videos = $vc->getNumOfVideos();
						
						if ($max_videos-11 > 0) {
							
							//There are still more videos to show on pages
							$num_pages = ceil(($max_videos-11)/10);
							$num_pages++;
						}
						
		            	for($i=1;$i<=$num_pages;$i++) {
							
							if ($i == 1) {
								
								$max_elements = 11;
								$is_shown = " is_shown";
								$style = "";
							}
							else {
								
								$max_elements = 10;
								$is_shown = "";
								$style = ' style="opacity: 0;"';
							}
							print '<ul class="page'.$is_shown.'" id="'.$i.'"'.$style.'>';
						
							$grid_elements = json_decode($vc->getMatrixViewWithImages(0,$max_elements));
							
							foreach($grid_elements as $element) {
								
								print getVideoTemplate($element->Video_ID,$element->title,$element->description,NULL);
							}
		            		print "</ul>";
						}
						?>
		        </div>
		    </div>
		    <div class="playList">
				<?php
                    
                    $playlist = '';
                    
                    if ($_COOKIE["playlist"] != null && $_COOKIE["playlist"] != "") {
                        
                        $ids = explode("-",$_COOKIE["playlist"]);
                        
                        foreach ($ids as $id) {
                        
                            $playlist .= getVideoTemplateById($id);
                        }
                        
                    }
                ?>
		    	<div class="info">
                    <?php
						if ($playlist == '') {
					?>
		        	<h3>PlayList</h3>
		        	<p>Ziehen Sie die Filme in die PlayList</p>
                    <?php
						}
					?>
		        </div>
		    	<ul>
		        	<?php print $playlist ?>
		        </ul>
		        <div class="arrowBottom"></div>
		    	<div class="arrowTop"></div>
		    </div>
		    <div class="clear"></div>
		    <div class="naviPages">
		    	<ul>
                	<?php
					
						global $num_pages;
					
						for($i=1;$i<=$num_pages;$i++) {
							
							print '<li ref="'.$i.'"'.(($i==1) ? ' class="current"':'').'></li>';
						}
					?>
		        </ul>
		    </div>
    
    
        </div>
    </div>
</div>