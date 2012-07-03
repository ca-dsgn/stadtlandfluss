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
							<li>asd</li>
							<li>asd</li>
							<li>asd</li>
						</ul>						
						<p class="floatRight"><a href="">alle Vorschläge ansehen</a> und <a href="" class="blueButton">abstimmen</a></p>
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
	});
	</script>
</body>
</html>