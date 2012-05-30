$(document).ready(function() {
	
	$(".playButton").live("mouseenter",function() {
		
		blow_play_automat("on");
	});
	$(".playButton").live("mouseleave",function() {
		
		blow_play_automat("off");
	});
	$(".arrowRight").live("click",function() {
		
		
	});
	$(".arrowLeft").live("click",function() {
		
		
	});
	slideShowPositioning();
	$(window).resize(function() {
		slideShowPositioning();
	});
});

function blow_play_automat(on_or_off) {
	
	switch (on_or_off) {
		
		case "on":
		
			blow_play();
			$("body").everyTime(1000, function() {
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
	}, 2000, function() {
		
		$(this).remove();
	});
}

function slideShowPositioning() {
	
	current_width = $(".contentBox.current").width();
	
	$(".contentBox.previous").css("left", "-" + current_width + "px");
	$(".contentBox.following").css("left", current_width + "px");
}

function slideshow_move(direction) {
	
	switch(direction) {
		
		case "left":
		
			break;
		case "right":
		
			break;
	}
}