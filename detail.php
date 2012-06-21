<?php
	
	include_once ("php/VideoController.php");
	include_once ("php/helper.php");
			
	$vc = new VideoController();
	$helper = new Helper();
	
	$Video_ID = $_GET["video_id"];
	
	$element = json_decode($vc->getVideoWithImages($Video_ID));
	
	$video_url = "http://www.youtube.com/v/".substr($element[0]->source,strpos($element[0]->source,"v=")+2,strlen($element[0]->source));
	
	if ($_GET["autoplay"] == "1") {
		
		$video_url.= "&autoplay=1";
	}
	
	print_r($element);
	
?>
<div id="detailContent">
	<div class="wrapper">
		<?php
		
			if ($element[0]->source == "") {
				
				//This ID is not valid
			}
			else {
		?>
		
		<div id="movieDetailDescription">
			<h1>Detailinformationen</h1>
			<h2>Film-info</h2>
			<p>affe</p>		
		</div>

		<div class="borderWhite">
			<h2>Bildauszug</h2>		
		</div>
				
		<div id="movieDetailMeta">
			<div class="left">
				<h2>Meta-Angaben</h2>
				<p>Blablablablab</p>		
			</div>
			<div class="right">
				<h2>Meta-Angaben</h2>
				<p>blablbla</p>		
			</div>
		</div>
				
		<div class="borderWhite">
			<h2>Kommentare</h2>		
		</div>
		
		
		<!--div id="detailVideoPlayer">
			<object>
            	<param value="<?php print $video_url?>" name="movie">
                <param value="opaque" name="wmode">
                <param value="true" name="allowFullScreen">
                <param value="always" name="allowScriptAccess">
                <embed style="width: 100%; height: 100%" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" src="<?php print $video_url?>" wmode="opaque">
            </object>
		</div>
		
		<div id="movieMetaBox">
			<h2>Film-Informationen</h2>
			<h3>Protagonist:</h3>
			<p><span>Uli Körber</span></p>
			<h3>Wo war das?</h3>
			<div id="movieDetailMap"><iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.de/maps?q=Mosbach&amp;ie=UTF8&amp;hq=&amp;hnear=Mosbach,+Karlsruhe,+Baden-W%C3%BCrttemberg&amp;ll=49.348915,9.129383&amp;spn=0.131958,0.363579&amp;t=h&amp;z=12&amp;output=embed"></iframe></div>
			<h3>ein Film von:</h3>
			<p><span>Elina Wetsch, Lisa Simon, Christian Albert, Sebastian Lauer, René Preußer</span></p>
		</div>
		
    <div id="movieInfoBox">
    	<div id="movieDetailBox">
	    	<h2><?php print $element[0]->title?></h2>
	    	<p><span><?php print $element[0]->description?></span></p>
	    	<h3>Lorem ipsum</h3>
	    	<p>asdasd<br/>asdasd</p>
	    	<h3>Lorem ipsum</h3>
	    	<p id="last">asdasd<br/>asdasd</p>
    	</div>
		
		
    	<div id="movieCommentsBox">
    		<h2>Kommentare</h2>
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
    	</div-->
		<?php
			}
		?>
	</div>
</div>