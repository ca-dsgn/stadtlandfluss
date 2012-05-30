$(document).ready(function() {
	
	$(".playButton").live("mouseenter",function() {
		
		blow_play($(this));
	});
});

function blow_play(element) {
	
	ghost_button = '<div class="playButtonEcho"></div>';
	
	$(element).after(ghost_button);
	
	$(".playButtonEcho").animate({
		
		width: "+=50",
		height: "+=50",
		left: "-=25",
		top: "-=25",
		opacity: 0
	}, 1000, function() {
		
		$(this).remove();
	});
}