$(document).ready(function() {
	
	$(".playButton").live("mouseenter",function() {
		
		blow_play_automat("on");
	});
	$(".playButton").live("mouseleave",function() {
		
		blow_play_automat("off");
	});
});

function blow_play_automat(on_or_off) {
	
	switch (on_or_off) {
		
		case "on":
		
			blow_play();
			$("body").everyTime(500, function() {
				blow_play();
			});
			break;
			
		case "off":
		
			$("body").stopTime();
			break;
	}
}

function blow_play() {
	
	ghost_button = '<div class="playButtonEcho"></div>';
	
	$(".playButton").after(ghost_button);
	
	$(".playButtonEcho").animate({
		
		width: "+=50",
		height: "+=50",
		left: "-=25",
		top: "-=25",
		opacity: 0
	}, 1200, function() {
		
		$(this).remove();
	});
}