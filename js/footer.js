var animation_time = 500;

$(document).ready(function() {
	
	
	showFooter();
	footerEventListeners();
});

function showFooter() {

	$("#pageFooterSlider .wrapper").slideDown({
		
		duration: animation_time,
		easing: 'swing'
	});
}

function hideFooter() {

	$("#pageFooterSlider .wrapper").slideUp({
		
		duration: animation_time,
		easing: 'swing'
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
					$("#pageFooterSlider").animate({
						top: ui.originalPosition.top-300,
						easing: 'swing',
						duration: animation_time
					});
				}
				else {
					hideFooter();
					$("#pageFooterSlider").animate({
						top: ui.originalPosition.top+300,
						easing: 'swing',
						duration: animation_time
					});
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
