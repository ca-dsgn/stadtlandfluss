$(document).ready(function() {
	
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
	slideShowPositioning();
	$(window).resize(function() {
		slideShowPositioning();
	});
	slidehowDraggable();
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
	
	/* Calculate the width in percent of th eplay button */
	width_play = $(".playButton").width()/$(window).width()*100;
	
	$(".playButtonEcho").animate({
		
		width: "+=4%",
		height: "+=8%",
		left: "-=2%",
		bottom: "-=4%",
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
	
	current_width = $(".contentBox.current").width();
	
	switch(direction) {
		
		case "right":
		
			$(".contentBox.following").animate({
				left: "0",
				opacity: 1
			});
			$(".contentBox.current").animate({
				left: "-" + current_width,
				opacity: 0
			});
			$(".contentBox.previous").remove();
			
			$(".contentBox.current").addClass("previous");
			$(".contentBox.current").removeClass("current");
			
			$(".contentBox.following").addClass("current");
			$(".contentBox.following").removeClass("following");
			
			loadContentBox("previous");
			
			break;
		case "left":
		
			$(".contentBox.previous").animate({
				left: "0",
				opacity: 1
			});
			$(".contentBox.current").animate({
				left: current_width,
				opacity: 0
			});
			$(".contentBox.following").remove();
			
			$(".contentBox.current").addClass("following");
			$(".contentBox.current").removeClass("current");
			
			$(".contentBox.previous").addClass("current");
			$(".contentBox.previous").removeClass("previous");
			
			loadContentBox("following");
			
			break;
	}
}

function slidehowDraggable() {

	$(".contentBox").draggable({
		
		axis: "x",
		stop: function(event,ui) {
			
			if (($(window).width()-$(event.target).width())/2 - ui.offset.left > 0) {
				
				if (($(window).width()-$(event.target).width())/2 - ui.offset.left > 50) {
					
					//WANTS TO GO LEFT
					slideshow_move("right");
				}
				else {
					
					$(".contentBox.current").animate({
						
						left: "0"
					}, 300);
				}
			}
			if (($(window).width()-$(event.target).width())/2 - ui.offset.left < 0) {
				
				if (($(window).width()-$(event.target).width())/2 - ui.offset.left < -50) {
					
					//WANTS TO GO RIGHT
					slideshow_move("left");
				}
				else {
					
					$(".contentBox.current").animate({
						
						left: "0"
					}, 300);
				}
			}
		}
	});	
}

function loadContentBox(type) {
	
	switch (type) {
	
		case "following":
		
			/* AJAX CALL */
			$(".contentBox.current").before('<li class="contentBox previous">' + "<p>This stuff has to be loaded by AJAX</p>" + '</li>');
			break;
			
		case "previous":
		
			/* AJAX CALL */
			$(".contentBox.current").after('<li class="contentBox following">' + "<p>This stuff has to be loaded by AJAX</p>" + '</li>');
			break;
	}
	/* Bring draggable to new staged elements */
	slidehowDraggable();
}