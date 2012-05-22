var animation_time = 500;

$(document).ready(function() {
	
	showFooter();
	footerEventListeners();
});

function showFooter() {

	$("#pageFooterSlider").animate({
		bottom: "+=300",
		easing: 'swing',
		duration: animation_time
	});
}

function hideFooter() {

	$("#pageFooterSlider").animate({
		top: $("#pageFooterSlider").offset().top+300,
		easing: 'swing',
		duration: animation_time
	});
}

function footerEventListeners() {
	
	$("#pageFooterSliderButton").live("click", function() {
		
		if ($("#pageFooterSlider .wrapper").is(":hidden")) {
		
			showFooter();
		}
		else {
			
			hideFooter();
		}
	});
	$("#pageFooterSlider").draggable({
		
		axis: "y",
		stop: function(event,ui) {
			
			if (ui.originalPosition.top - ui.offset.top < -20 || ui.originalPosition.top - ui.offset.top > 20) {
				
				if ($("#pageFooterSlider .wrapper").is(":hidden")) {
				
					showFooter();
				}
				else {
					hideFooter();
				}
			}
			else {
				$("#pageFooterSlider").animate({
					top: ui.originalPosition.top,
					easing: 'swing'
				});
			}
		}
	});
}
