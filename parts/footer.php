		<!-- PAGE SLIDER-BOX [BEGIN] -->
		<div id="pageFooterSlider" class="is_down">
			<div id="pageFooterSliderButton"></div>
			<div id="pageFooterSliderContent">
				<div class="wrapper">
					<div id="pageFooterLeft">
						<h2>Kennenlernen</h2>
						<!--p>Wer steckt hinter dem Projekt?</p-->
						<iframe width="224" height="126" src="http://www.youtube.com/embed/qqLaRYxJeno?rel=0" frameborder="0" allowfullscreen></iframe>
						<p class="floatRight">Du möchtest <a href="" class="blueButton">mehr erfahren</a></p>
					</div>
					<div id="pageFooterMiddle">
						<div id="voteBox">						
							<h2>Was soll verfilmt werden?</h2>
						<!--p>Welche Geschichte soll verfilmt werden?</p-->
							<ul id="topList">
								<li>asd</li>
								<li>asd</li>
								<li>asd</li>
							</ul>						
							<p class="floatRight"><a href="">alle Vorschläge ansehen</a> und <a href="" class="blueButton">abstimmen</a></p>
						</div>
						<div id="tellAStory">						
							<h2>Geschichte erzählen</h2>
							<!--p>Erzähle uns deine Geschichte!</p-->
							<form id="tellAStoryForm">
							</form>
							<p class="floatRight"><a href="" class="blueButton">Geschichte erzählen</a></p>
						</div>
					</div>
					<div id="pageFooterRight">
						<h2>Empfehlen</h2>
						<!--p>Lorem Ipsum.</p-->
						<ul id="socialList">
							<li><p>Facebook</p></li>
							<li><p>Twitter</p></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- PAGE SLIDER-BOX [END] -->
	




		<!-- PAGE FOOTER [BEGIN] -->
		<footer id="pageFooter">


			<div class="wrapper">
				<ul id="pageNav">
					<li><a href="">Ansicht wechseln</a>
						<ul>
							<?php
								if (!isset($_GET["section"])) {
									$_GET["section"] = "portrait";
								}
							?>
							<li<?php ($_GET["section"] == "portrait" ? print ' class="active"':'')?>><a href="index.php?section=portrait" id="navPortrait">Portrait</a></li>				
							<li<?php ($_GET["section"] == "map" ? print ' class="active"':'')?>><a href="index.php?section=map" id="navMap">Landkarte</a></li>
							<li<?php ($_GET["section"] == "grid" ? print ' class="active"':'')?>><a href="index.php?section=grid" id="navGrid">Raster</a></li>
						</ul>
					</li>
				</ul>
				<ul id="footerNav">
					<li><a href="">Kontakt</a></li>
					<li><a href="">Impressum</a></li>
				</ul>
				<a href="./about.php" class="logoSmall">Über das Projekt</a>
			</div>
		




		</footer>
		<!-- PAGE FOOTER [END] -->

</body>
</html>