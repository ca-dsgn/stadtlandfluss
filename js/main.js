$(document).ready(function() {
	
	matrixDraggable();
	matrixArrows();
	playListSortable();
	
	$(".arrow.right").live("click",function() {
		
		matrixMove("right");
	});
	$(".arrow.left").live("click",function() {
		
		matrixMove("left");
	});
	
	$(window).resize(function() {
		
		if ((".gridContainer").length > 0) {
			
			if (parseInt($(".page").width()) < 960) {
				
				changeObjectsInGrid(9);
			}
			else {
				changeObjectsInGrid(12);
			}
		}
		positionGrid();
	});
	$(".item").bind("click", function() {
		
		$(this).find(".images").animate({
			
			height: '450',
			top: '-150px'
		});
		
	});
});

function changeObjectsInGrid(num) {
	
	$(".page").each(function() {
		
		i = 1;
		
		if ($(this).is(":last-child")) {
			
			i=0;
		}
		else {
		}
		
		$(this).find("li").each(function() {
		
			$(this).show();
			
			if (i>=num) {
				
				if ($(this).hasClass("arrow")) {
					
				}
				else {
					$(this).hide();
				}
			}
			i++;
		});
	});
}

function positionGrid() {
	
	current_width = $(".page").width();
	
	if ((".gridContainer").length > 0) {
	
		i=0;
		y=0;
		
		$(".page").each(function() {
			
			if ($(this).hasClass("is_shown")) {
				
				y=i;
			}
			i++;
		});
	}
	
	$(".slider").css("left","-" + y*current_width + "px");
}

function playListSortable() {
	
	$(".playList ul").sortable({
		revert: true,
		start: function(event,ui) {
			
			y_original = event.screenX;
			ready_to_kill = false;
		},
		receive: function() {
			
			if ($(this).find("li").length > 0) {
				
				$(this).parent().find(".info").fadeOut(300);
			}
		},
		remove: function() {
			
			if ($(this).find("li").length == 0) {
				
				$(this).parent().find(".info").fadeIn(300);
			}
		},
		over: function(event, ui) {
			
			ui.item.clone();
			console.log("test");
		},
		out: function(event, ui) {
			
			ready_to_kill = true;
		},
		sort: function(event, ui) {
			
			if (ready_to_kill) {
				
				if (y_original - event.pageX > 250 || y_original - event.pageX < -250) {
					
					ui.item.fadeOut(300, function() {
						
						$(this).remove();
					});
					ui.placeholder.slideUp(300, function() {
							
						$(this).remove();
						$(".playList ul").sortable("cancel");
					});
				}
			}
		}
	});
}

function matrixDraggable() {
	
	current_width = $(".page").width();
			
	$(".slider").draggable({
		
		axis: 'x',
		stop: function(event,ui) {
	
			i=0;
			y=0;
			
			$(".page").each(function() {
				
				if ($(this).hasClass("is_shown")) {
					
					y=i;
				}
				i++;
			});
			
			moving_factor = ($(window).width()-$("#content").width())/2 - ui.offset.left - (y*current_width);
			
			if (moving_factor > 0) {
				
				if (moving_factor > 100) {
					
					//WANTS TO GO LEFT
					matrixMove("right");
				}
				else {
					
					$(".slider").animate({
						
						left: "-" + y*current_width
					}, 100);
				}
			}
			if (moving_factor < 0) {
				
				if (moving_factor < -100) {
					
					//WANTS TO GO RIGHT
					matrixMove("left");
				}
				else {
					
					$(".slider").animate({
						
						left: "-" + y*current_width
					}, 300);
				}
			}
		}
	});
	
	$(".page").sortable({
		connectWith: ".playList ul",
		distance: 5,
		placeholder: "placeholder",
		helper: "clone",
		revert: 300,
		items: 'li.item'
	});
}

function matrixMove(direction) {
	
	i=0;
	y=0;
	
	$(".page").each(function() {
		
		if ($(this).hasClass("is_shown")) {
			
			y=i;
		}
		i++;
	});
	
	current_width = $(".page").width();
	
	if (direction == "left") {
		
		y--;
	}
	if (direction == "right") {
		
		y++;
	}
	
	page = y+1;
	
	$(".naviPages ul li").removeClass("current");
	$(".naviPages ul li:nth-child(" + page + ")").addClass("current");
	
	switch(direction) {
		
		case "right":
		
			if ($(".is_shown").next().length > 0) {
					
				$(".slider").animate({
					left: "-" + current_width*y
				});
				$(".is_shown").next().addClass("next_to_show");
				$(".is_shown").animate({
					
						opacity: 0
					
					},100, function() {
					
					$(this).removeClass("is_shown");
					$(".next_to_show").addClass("is_shown");
					$(".is_shown").removeClass("next_to_show");
					$(".is_shown").animate({
						
						opacity: 1
					});
				});
			}
			else {
				
				$(".slider").animate({
					left: "-" + current_width*(y-1)
				});
			}
			break;
			
		case "left":
		
			if ($(".is_shown").prev().length > 0) {
				
				$(".slider").animate({
					left: "-" + current_width*y,
					opacity: 1
				});
				
				$(".is_shown").prev().addClass("next_to_show");
				$(".is_shown").animate({
					
						opacity: 0
					
					},300, function() {
					
					$(this).removeClass("is_shown");
					$(".next_to_show").addClass("is_shown");
					$(".is_shown").removeClass("next_to_show");
					$(".is_shown").animate({
						
						opacity: 1
					});
				});
			}
			else {
				
				$(".slider").animate({
					left: "-" + current_width*(y+1)
				});
			}
			break;
	}
}

function matrixArrows() {
	
	$(".page").each(function() {
		
		if ($(this).attr("id") != 1) {
			
			$(this).prepend('<li class="arrow left"></li>');
		}
		if ($(this).attr("id") != $(".page").last().attr("id")) {
			
			$(this).append('<li class="arrow right"></li>');
		}
	});
}