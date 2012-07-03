<?php 
	include "parts/header.php";
	include "parts/backButton.php";
?>

<div id="singlepageContent">
	<div class="wrapper">
		<div id="text">
            <h1>Voting</h1>
			<div id="disqus_thread"></div>
            <script type="text/javascript">
                var disqus_shortname = 'stadtlandflussvoting';
                var disqus_identifier = 'my_identifier';
                var disqus_title = 'SLFG Voting';
                (function() {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          <div>
		</div>
	</div>
</div>


<?php
	include 'parts/footer.php';
	
?>
