var animation_time = 500;

$(document).ready(function() {
	
	footerPosition();
	//showFooter();
	addfooterEventListeners();
	footerDraggable();
	
	$(window).resize(function() {
		
		footerPosition();
	});
	footerJumpEveryTime();
});

function footerJumpEveryTime() {
	
	footerJump();
	
	$("body").everyTime(5000, function() {
		
		if ($("#pageFooterSlider").attr("class") == "ui-draggable") {
			
			footerJump();
		}
	});
}

function footerJump() {
	
	original_position = $("#pageFooterSlider").offset().top;
	
	$("#pageFooterSlider").animate({
		
		top: '-=20px'
	},200).animate({
		
		top: '+=20px'
	},300);
}

function footerPosition() {
	
	$("#pageFooterSlider").css("top",(parseFloat($(window).height()))-50);
}

function showFooter() {

	$("#pageFooterSlider").animate({
		top: $(window).height()-300,
		easing: 'swing',
		duration: animation_time
	});
	$("#pageFooterSlider").removeClass("is_down");
	$("#pageFooterSlider").addClass("is_up");
}

function hideFooter() {

	$("#pageFooterSlider").animate({
		top: $(window).height()-$("#pageFooter").height()-$("#pageFooterSliderButton").height(),
		easing: 'swing',
		duration: animation_time
	});
	$("#pageFooterSlider").addClass("is_down");
	$("#pageFooterSlider").removeClass("is_up");
}

function addfooterEventListeners() {
	
	$("#pageFooterSliderButton").live("mouseup", function() {
		
		if ($("#pageFooterSlider").hasClass("ui-draggable-dragging")) {
			
		}
		else {
			if ($("#pageFooterSlider").hasClass("is_up")) {
				
				hideFooter();
				
			}
			else {
				
				showFooter();
			}
		}
	});
}

function footerDraggable() {

	$("#pageFooterSlider").draggable({
		
		axis: "y",
		stop: function(event,ui) {
			
			if ($("#pageFooterSlider").hasClass("is_down")) {
				
				if (ui.originalPosition.top - ui.offset.top > 20) {
					
					//Is DOWN wants to go UP
					showFooter();
				}
				else {
					//Is DOWN wants to go down
					$("#pageFooterSlider").animate({
						top: ui.originalPosition.top,
						easing: 'swing'
					});
				}
			}
			else {
				
				if (ui.originalPosition.top - ui.offset.top > 20) {
					
					//Is UP wants to go UP
					$("#pageFooterSlider").animate({
						top: ui.originalPosition.top,
						easing: 'swing'
					});
				}
				else {
					//Is UP wants to go DOWN
					hideFooter();
				}
			}
		}
	});	
}
