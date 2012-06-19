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
			$("body").everyTime(750, function() {
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
		
		width: "+=40px",
		height: "+=40px",
		'margin-left': "-=20px",
		'margin-top': "-=20px",
		opacity: 0
	}, 2000, function() {
		
		$(this).remove();
	});
}

function slideShowPositioning() {
	
	current_width = $(".contentBox").width();
	
	i = -2;
	
	$(".contentBox").each(function() {
		
		width = i*current_width;
		
		$(this).css("left", width + "px");
		$(this).css("opacity",0);
		if (width == 0) {
			
			$(this).addClass("current");
			$(this).css("opacity",1);
			$(this).prev().addClass("prev");
			$(this).next().addClass("next");
		}
		i++;
	});
	
	$(".backgroundImage").each(function() {
		
		
	});
}

function slideshow_move(direction) {
	
	contentBoxWidth = $(".contentBox").width();
	
	switch(direction) {
		
		case "right":
		
			$(".contentBox").each(function() {
				
				current_width = parseInt($(this).css("left"));
				
				if ($(this).hasClass("current")) {
					
					current_width = 0;
				}
				
				if ($(this).hasClass("current")) {
				
					$(this).animate({
						left: (current_width-contentBoxWidth),
						opacity: 0
					});
				}
				else if ($(this).hasClass("next")) {
					
					$(this).animate({
						left: (current_width-contentBoxWidth),
						opacity: 1
					}, function() {
						
						$(".contentBox.prev").removeClass("prev");
						$(".contentBox.current").addClass("prev");
						$(".contentBox.current").removeClass("current");
						$(this).addClass("current");
						$(this).removeClass("next");
						$(this).next().addClass("next");
					});
				}
				else if ($(this).is(":last-child")) {
					
					$(this).animate({
						left: (current_width-contentBoxWidth),
						opacity: 0
					}, function() {
						
						$(".contentBox:last-child").after($(".contentBox:first-child").css("left",(contentBoxWidth*2) + "px"));
					});
				}
				else {
					
					$(this).animate({
						left: (current_width-contentBoxWidth),
						opacity: 0
					});
				}
			});
			
			slidehowDraggable();
			
			break;
		case "left":
		
			$(".contentBox").each(function() {
				
				current_width = parseInt($(this).css("left"));
				
				if ($(this).hasClass("current")) {
					
					current_width = 0;
				}
				
				if ($(this).hasClass("current")) {
					
					$(this).animate({
						left: (current_width+contentBoxWidth),
						opacity: 0
					});
				}
				else if ($(this).hasClass("prev")) {
					
					$(this).animate({
						left: (current_width+contentBoxWidth),
						opacity: 1
					}, function() {
						
						$(".contentBox.next").removeClass("next");
						$(".contentBox.current").addClass("next");
						$(".contentBox.current").removeClass("current");
						$(this).addClass("current");
						$(this).removeClass("prev");
						$(this).prev().addClass("prev");
					});
				}
				else if ($(this).is(":last-child")) {
					
					$(this).animate({
						left: (current_width+contentBoxWidth),
						opacity: 0
					}, function() {
						
						$(".contentBox:first-child").before($(".contentBox:last-child").css("left","-" + (contentBoxWidth*2) + "px"));
					});
				}
				else {
					$(this).animate({
						left: (current_width+contentBoxWidth),
						opacity: 0
					});
				}
				
			});
			$(".contentBox:first-child").css("left","-2560px");
			
			slidehowDraggable();
			
			break;
	}
}

function slidehowDraggable() {

	$("#protagonistContent .contentBox").draggable({
		
		axis: "x",
		stop: function(event,ui) {
			
			if (($(window).width()-$(event.target).width())/2 - ui.offset.left > 0) {
				
				if (($(window).width()-$(event.target).width())/2 - ui.offset.left > 100) {
					
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
				
				if (($(window).width()-$(event.target).width())/2 - ui.offset.left < -100) {
					
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