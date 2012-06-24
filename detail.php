<?php
	include "parts/backButton.php";
	include_once ("php/VideoController.php");
	include_once ("php/helper.php");
			
	$vc = new VideoController();
	$helper = new Helper();
	
	$Video_ID = $_GET["video_id"];
	
	$element = json_decode($vc->getVideoWithImages($Video_ID));
	
	$video_url = $helper->makeYoutubeURL($element[0]->source);
	
?>
<div id="detailContent">
	<div class="wrapper">
		<?php
		
			if ($element[0]->source == "") {
				
				//This ID is not valid
			}
			else {
		?>
		
		
			<div class="contentScrollBox">
		
				<h2>Uli Körber</h2>
				<h1><?php print $element[0]->title?></h1>
		
				<div id="movieDetailBanner">Bild</div>
				
				<div id="movieDetailDescription">
					<div id="movieDetailPreview"><a href="" class="playButtonSmall">Play Video</a></div>
					<h3>Film-Informationen</h3>
					<p><?php print $element[0]->description?></p>
				</div>		
	
				<div id="movieDetailMeta">
					<div class="left">
						<p><strong>Ein Film von:</strong> Elina Wetsch, Lisa Simon, Christian Albert, Sebastian Lauer, René Preußer (Jahrgang 2009)</p>		
					</div>
					<div class="right">
						<p><strong>Produktionsjahr:</strong> 2011<br/><strong>Drehort:</strong> Burg Hornberg</p>		
					</div>
				</div>

				<div id="movieDetailComments">
					<h3>Kommentare</h3>
		            <div id="disqus_thread"></div>
		            <script type="text/javascript">
		                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		                var disqus_shortname = 'stadtlandflussgeschichten'; // required: replace example with your forum shortname
		    
		                /* * * DON'T EDIT BELOW THIS LINE * * */
		                (function() {
		                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		                    dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
		                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		                })();
		            </script>
		            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		            <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
				</div>
				
			</div>
			
			
		<?php
			}
		?>
	</div>
</div>