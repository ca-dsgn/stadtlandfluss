  <?php include('disqus/disqus.php'); ?>
  <?php include('disqus/disqus.api.keys.php'); ?>
  <?php
  
	  $params = array(
		'forum' => 'stadtlandflussvoting',
		'thread' => '736430416',
	  );
	  
	  $date = new DateTime();
	  $timestamp = $date->getTimestamp();
	  
	  $xml = simplexml_load_file("disqus/response.xml");
	  
	  $old_timestamp = $xml->timestamp;
	  
	  //Every 4 seconds load API so that max API calls wont swap
	  if ($timestamp >= $old_timestamp+4) {
		 
		 $disqus = Disqus::connect(ACCESS_TOKEN, API_KEY, API_SECRET)->getPosts($params);
		 $posts = $disqus->getMostLikes();
		 
		 $xml->timestamp = $timestamp;
		 $xml->response = null;
		 
		 foreach($posts['posts'] as $post) {
			 
			$new_elem = $xml->response->addChild("post"); 
			$new_elem->addChild("message",$post->raw_message);
			$new_elem->addChild("likes",$post->likes);
		 }
		 
		 $dom = new DOMDocument('1.0');
		 $dom->preserveWhiteSpace = false;
		 $dom->formatOutput = true;
		 $dom->loadXML($xml->asXML());
		 $dom->save('disqus/response.xml');
	  }
  ?>
  <!-- VIDEO-LAYER [BEGIN] -->
  <div class="videoLayer">
		<a href="" class="closeButton">close</a>
    <div class="videoPlayer">
        <a href="" class="playListLeft">Left</a>
        <a href="" class="playListRight">Right</a>
        <div id="player_container"></div>
    </div>
  </div>
	<!-- VIDEO-LAYER [END] -->

	<!-- PAGE SLIDER-BOX [BEGIN] -->
	<div id="pageFooterSlider" class="is_down">
		<div id="pageFooterSliderButton"></div>
		<div id="pageFooterSliderContent">
			<div class="wrapper">
				<div id="pageFooterLeft">
					<h2>Kennenlernen</h2>
					<a onclick="javascript:openTrailer();"><img src="img/trailer-thumb.jpg" /></a>
					<p class="floatRight"><a href="./about.php" class="blueButton">Mehr erfahren?</a></p>
				</div>
				<div id="pageFooterMiddle">
					<div id="voteBox">						
						<h2>Was soll verfilmt werden?</h2>
						<ul id="topList">
                        	<?php
								
								$i=1;
								
								foreach($xml->response->children() as $post) {
									
									if ($i<=3) {
										
										print "<li><p>".$post->message."<span>".$post->message."</span></p></li>";
									}
								}
							?>
						</ul>						
						<p class="floatRight"><a href="kontakt.php" class="blueButton">Vorschlag einsenden</a><a href="voting.php" class="blueButton">Jetzt abstimmen</a></p>
					</div>
				</div>
				<div id="pageFooterRight">
					<h2>Empfehlen</h2>
					<!-- GOOGLE +1 BEGIN -->
					<div class="g-plusone" data-size="tall" data-href="http://www.stadtlandfluss-geschichten.de"></div>
					<script type="text/javascript">
					  window.___gcfg = {lang: 'de'};
					
					  (function() {
					    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					    po.src = 'https://apis.google.com/js/plusone.js';
					    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
					<!-- GOOGLE +1 END -->
					
					<!-- FACEBOOK Empfehlen-Button BEGIN -->
					<iframe id="facebook-like" src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.stadtlandfluss-geschichten.de&amp;send=false&amp;layout=box_count&amp;width=150&amp;show_faces=false&amp;action=recommend&amp;colorscheme=light&amp;font&amp;height=63&amp;appId=351388158233394" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:63px;" allowTransparency="true"></iframe>
					<!-- FACEBOOK Empfehlen-Button END -->
					<br style="clear: both; margin-bottom:10px;"/>
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.stadtlandfluss-geschichten.de" data-text="StadtLandFluss-Geschichten sind kurzweilige Filme über Menschen aus der Region Mosbach." data-lang="de">Twittern</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					
					<ul id="socialList">
						<li><img src="img/social-facebook.png" align="absmiddle" style="margin-right:5px;" /> <a href="https://www.facebook.com/pages/StadtLandFluss-Geschichten/297277040355842">Facebook</a></li>
						<li><img src="img/social-youtube.png" align="absmiddle" style="margin-right:5px;" /> <a href="http://www.youtube.com/channel/UCzK5rqDqYDlwcApMEc2r8ag">Youtube</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- PAGE SLIDER-BOX [END] -->





	<!-- PAGE FOOTER [BEGIN] -->
	<footer id="pageFooter">
		<div class="wrapper">
			<ul id="footerNav">
				<li><a href="./kontakt.php">Kontakt</a></li>
				<li><a href="./impressum.php">Impressum</a></li>
			</ul>
			<a href="./about.php" class="logoSmall">Über das Projekt</a>
		</div>
	</footer>
	<!-- PAGE FOOTER [END] -->
	<script type="text/javascript">
	$(document).ready(function() {
		
		slideShowPositioning();
		$(".playButton").live("mouseenter",function() {
			
			blow_play_automat("on");
		});
		$(".playButton").live("mouseleave",function() {
			
			blow_play_automat("off");
		});
		$(".arrowRight").live("click",function() {
			
			slideshow_move("right");
		});
		$(".arrowLeft").live("click",function() {
			
			slideshow_move("left");
		});
		$(window).resize(function() {
			slideShowPositioning();
		});
		slideShowDraggable();
		$(window).keyup(function(event) {
			
			if (event.keyCode == 37) {
				
				//LEFT
				slideshow_move("left");
			}
			if (event.keyCode == 39) {
				
				//RIGHT
				
				slideshow_move("right");
			}
		});
		
		//MAIN
		if (get_cookie("playlist") == null) {
			
			set_cookie("playlist","");
		}
		playlist = get_cookie("playlist");
		
		matrixDraggable();
		
		removeDraggableFromItemsByCookie();
		addDraggableToItems(".page .item");
		matrixArrows();
		playListSortable();
		
		$(".arrow.right").live("click",function() {
			
			matrixMove("right");
		});
		$(".arrow.left").live("click",function() {
			
			matrixMove("left");
		});
		
		resizeGridByWindowWidth();
		positionGrid();
		
		$(window).resize(function() {
			
			resizeGridByWindowWidth();
			positionGrid();
		});
		addItemListeners();
		
		$(".overlay").bind("mouseup", function() {
			
			close_box($(".open"));
		});
		
		$(".playlistDown").live("click",function() {
			
			playListMove("down");
		});
		$(".playlistUp").live("click",function() {
			
			playListMove("up");
		});
		
		$(".playButton").live("click",function(e) {	
		
			e.preventDefault();
			videoLayerOpen(e);
		});
		
		$(".closeButton").live("click",function(e) {
				
			e.preventDefault();
			videoLayerClose(e);
			video_player.stopVideo();
		});
		$("#movieDetailPreview").live("click",function(e) {
			
			videoLayerOpen(e);
		});
		
		$(".playListRight").live("click",function(e) {
			
			e.preventDefault();
			video_src = getNextVideoFromPlaylist();
				
			if (video_src != null) {
				
				new_video_player(video_src);
			}
		});
		
		$(".playListLeft").live("click",function(e) {
			
			e.preventDefault();
			video_src = getPrevVideoFromPlaylist();
				
			if (video_src != null) {
				
				new_video_player(video_src);
			}
		});
		
		pageNavStructure();
		
		$("#pageNav > li").mouseenter(function() {
			
			var li = $(this);
			
			$(this).addClass("has_focus");
			
			setTimeout(function(){
					
			  if ($(li).hasClass("has_focus")) {
				   
				   if (!$(li).find("ul").is(":animated")) {
					   
						$(li).find("ul").slideDown(300);
				   }
			  }
			}, 500);
		}).mouseleave( function() {
			
			$(this).find("ul").stop();
			$(this).find("ul").slideUp();
			$(this).removeClass("has_focus");
		});
		
		$("#pageNav > li > a").click(function(e) {
			
			e.preventDefault();
			
			if ($(this).parent().find("ul").is(":visible") && !$(this).parent().find("ul").is(":animated")) {
				
				$(this).parent().find("ul").slideUp();
			}
			if ($(this).parent().find("ul").is(":hidden") && !$(this).parent().find("ul").is(":animated")) {
					
				$(this).parent().find("ul").slideDown();
			}
		});
		
		
		
		
		
		
		$(".playButtonPlaylist").live("click",function() {
			
			if ($(".playList ul li").length > 0) {
				
				videoLayerPlaylistOpen();
			}
		});	
			
		$(".deleteButtonPlaylist").live("click", function() {
			
			$(".page > li").each(function() {

				if ($(this).css("opacity") == "0.5") {
					
					$(this).animate({
						
						opacity: 1
					}, function() {

						addDraggableToItems($(this));
						$(this).addClass("item");
					});
				}
			});
			$(".playList ul > li").each(function() {
				
				$(this).fadeOut(300, function() {
					
					$(this).remove();
				});
			});
			set_cookie("playlist","");
			
			$(".playList .info").delay(300).fadeIn(300);
		});
		
		/* YOUTUBE IFRAME API */
		var tag = document.createElement('script');
		tag.src = "http://www.youtube.com/player_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		
		//Footer
		
		footerPosition();
		//showFooter();
		addfooterEventListeners();
		footerDraggable();
		
		$(window).resize(function() {
			
			footerPosition();
		});
		footerJumpEveryTime();
		
	});
	</script>
	<div class="overlay" style="display: none;"></div>
</body>
</html>