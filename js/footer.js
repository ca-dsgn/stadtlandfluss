var animation_time = 500;

$(document).ready(function() {
	
	$("#pageFooterSlider").css("top",(parseFloat($(document).height())));
	showFooter();
	footerEventListeners();
});

function showFooter() {

	$("#pageFooterSlider").animate({
		top: $(document).height()-300,
		easing: 'swing',
		duration: animation_time
	});
	$("#pageFooterSlider").removeClass("is_down");
	$("#pageFooterSlider").addClass("is_up");
}

function hideFooter() {

	$("#pageFooterSlider").animate({
		top: $(document).height()-$("#pageFooterContent").height()-$("#pageFooterSliderButton").height(),
		easing: 'swing',
		duration: animation_time
	});
	$("#pageFooterSlider").addClass("is_down");
	$("#pageFooterSlider").removeClass("is_up");
}

function footerEventListeners() {
	
	$("#pageFooterSliderButton").live("click", function() {
		
			if ($("#pageFooterSlider").hasClass("is_up")) {
				
				hideFooter();
				
			}
			else {
				
				showFooter();
			}
	});
	$("#pageFooterSlider").draggable({
		
		axis: "y",
		stop: function(event,ui) {
			
			if (ui.originalPosition.top - ui.offset.top < -20 || ui.originalPosition.top - ui.offset.top > 20) {
				
				if ($("#pageFooterSlider").hasClass("is_down")) {
				
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
