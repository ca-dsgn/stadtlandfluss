<?php
	include_once ("php/VideoController.php");
	include_once ("php/helper.php");
			
	$vc = new VideoController();
	$helper = new Helper();
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
								
								print $helper->getVideoTemplate($element->Video_ID,$element->title,$element->description,$element->images);
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
						
						$num_playlist = count($ids);
                        
                        foreach ($ids as $id) {
                        
                            $playlist .= $helper->getVideoTemplateById($id);
                        }
                        
                    }
                ?>
		    	<div class="info">
                    <?php
						if ($playlist == '') {
					?>
		        	<p>Um eine Playlist zu erstellen, ziehen Sie bitte die gew&uuml;nschten Filme von der rechten Seite auf die hier markierten Fl&auml;chen.</p>
                    <?php
						}
					?>
		        </div>
		    	<ul>
		        	<?php print $playlist ?>
		        </ul>
                <?php
				
					$not_visible = "";
				
					if ($num_playlist <= 3) {
						
						$not_visible = ' style="display: none;"';
					}
				?>
		        <div class="playlistDown"<?php print $not_visible?>></div>
		    	<div class="playlistUp"<?php print ' style="display: none;"'?>></div>
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