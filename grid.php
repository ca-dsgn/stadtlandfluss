<?php
	include_once ("php/VideoController.php");
			
	$vc = new VideoController();
?>
<div id="content" class="wrapper">
	<h1>Matrix-Ansicht</h1>
	<div class="gridContainer">
    	<div class="slider">
            <ul class="page is_shown" id="1">
                <li class="item" ref="1">
                	<div class="box">
                    	<img src="img/grid/motorcross_main.png" alt="Motorcross"/>
                    </div>
                    <div class="images">
                    	<div class="top">
                        	<img src="img/grid/motorcross_main.png" alt="Motorcross"/>
                        </div>
                        <div class="bottom">
                        	<img src="img/grid/motorcross_main.png" alt="Motorcross"/>
                        </div>
                    </div>
                    <div class="info">
                    	<div class="info_box">
                            <h2>Bla und Bla</h2>
                            <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                            <a>Link</a>
                            <a>Link</a>
                        </div>
                    </div>
                </li>
                <?php
					
					$max = $vc->getNumOfVideos();
					
					$grid_elements = json_decode($vc->getMatrixView(0,$max));
					
					print_r($grid_elements);
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
				
				$ids = explode("-",$_COOKIE["playlist"]);
				
				foreach ($ids as $id) {
				
					print $vc->getVideo($id);
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
