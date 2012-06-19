<?php
	include_once ("php/VideoController.php");
			
	$vc = new VideoController();
	
	
?>

<div id="gridContent">
	<div class="wrapper">	
		<div class="contentBox">
			<div class="gridContainer">
		    	<div class="slider">
                	<?php
					
						$page = 1;
						
						$max_videos = $vc->getNumOfVideos();
						
						$num_pages = 1;
						
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
								
								print getVideoTemplate($element->Video_ID,$element->title,$element->description,$element->images);
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