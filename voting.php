<?php 
	include "parts/header.php";
	include "parts/backButton.php";
?>

<div id="singlepageContent">
	<div class="wrapper">
		<div id="text">
            <h1>Voting</h1>
			
			<p>Sie haben einen Vorschlag f&uuml;r ein Filmportrait? Das freut uns. Bevor Sie sich die M&uuml;he machen, Ihren Vorschlag hier auszufomulieren und einzureichen, bedenken Sie bitte folgende Punkte:</p>

			<ol>
				<li>Wir drehen <strong>nur im Neckar-Odenwaldkreis</strong> bzw. in einem Radius von 10-15 km um die Stadt Mosbach. Je n&auml;her ein Projekt an der Stadt liegt, desto h&ouml;her ist die Wahrscheinlichkeit, dass wir es realisieren.</li>
				<li>Wir drehen <strong>keine Image- oder Werbefilme</strong>, deshalb nehmen wir keine Vorschl&auml;ge an, in denen sich ein Unternehmen oder Gesch&auml;ft werbend darstellen m&ouml;chte.</li>
				<li>Jeder Film hat einen <strong>Protagonisten</strong>. Auch wenn Sie gerne einen Film &uuml;ber einen bestimmten Ort oder eine Institution sehen w&uuml;rden, wird dies nur m&ouml;glich sein, wenn unser Filmteam einen passenden Erz&auml;hler finden kann.</li>
				<li>Die Vorschl&auml;ge werden hier gelistet und es findet auch eine Abstimmung statt. Trotzdem m&uuml;ssen wir uns vorbehalten, die Themen am Ende in Hinblick auf ihre <strong>Eignung f&uuml;r das Projekt</strong> und ihre Realisierbarkeit im Rahmen unserer Zeit- und Ressourcenplanung auszusuchen.</li>
			</ol>
			
			<br />
			
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
