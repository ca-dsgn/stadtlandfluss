$(document).ready(function() {
	
	matrixDraggable();
	playListSortable();
});

function playListSortable() {
	
	$(".playList ul").sortable({
		revert: true
	});
}

function matrixDraggable() {
	
	$(".slider").draggable({
		
		axis: 'x',
		stop: function(event,ui) {
			
			if (($(window).width()-$(event.target).width())/2 - ui.offset.left > 0) {
				
				if (($(window).width()-$(event.target).width())/2 - ui.offset.left > 50) {
					
					//WANTS TO GO LEFT
					matrixMove("right");
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
					matrixMove("left");
				}
				else {
					
					$(".contentBox.current").animate({
						
						left: "0"
					}, 300);
				}
			}
		}
	});
	$(".page").sortable({
		connectWith: ".playList ul"
	});
}

function matrixMove(direction) {
	
	current_width = $(".slider").width();
	
	switch(direction) {
		
		case "right":
		
			$(".slider").animate({
				left: "0",
				opacity: 1
			});
			break;
			
		case "left":
		
			$(".slider").animate({
				left: "0",
				opacity: 1
			});
			break;
	}
}