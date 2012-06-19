<?php
	
	include_once ("php/VideoController.php");
	include_once ("php/helper.php");
			
	$vc = new VideoController();
	$helper = new Helper();
	
	$Video_ID = $_GET["video_id"];
	
	$element = json_decode($vc->getVideoWithImages($Video_ID));
	
	print_r($element);
	
?>
<div id="detailContent">
	<div class="wrapper">
		
		<div id="detailVideoPlayer">
			<object>
            	<param value="<?php print $element[0]->source?>" name="movie">
                <param value="opaque" name="wmode">
                <param value="true" name="allowFullScreen">
                <param value="always" name="allowScriptAccess">
                <embed allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" src="<?php print $element[0]->source?>" wmode="opaque">
            </object>
		</div>
		
		<div id="movieMetaBox">
			<h2>Film-Informationen</h2>
			<h3>Protagonist:</h3>
			<p><span>Uli Körber</span></p>
			<h3>Wo war das?:</h3>
			<div id="movieDetailMap"></div>
			<h3>ein Film von:</h3>
			<p><span>Elina Wetsch, Lisa Simon, Christian Albert, Sebastian Lauer, René Preußer</span></p>
		</div>
		
    <div id="movieInfoBox">
    	<div id="movieDetailBox">
	    	<h2>Film-Informationen</h2>
	    	<p><span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</span></p>
	    	<h3>Lorem ipsum</h3>
	    	<p>asdasd<br/>asdasd</p>
	    	<h3>Lorem ipsum</h3>
	    	<p>asdasd<br/>asdasd</p>
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
        
        
        
      
    </div>
		
		
	</div>
</div>