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

	console.log("in function");

	$("#pageFooterSlider").animate({
		bottom: "-=300",
		easing: 'swing',
		duration: animation_time
	});
}

function footerEventListeners() {
	
	$("#pageFooterSliderButton").live("mouseup", function() {
		
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
				
				console.log(parseInt($("#pageFooterSlider").css("bottom")));
				
				if (parseInt($("#pageFooterSlider").css("bottom")) == -280) {
				
					console.log("here");
					showFooter();
				}
				else {
					hideFooter();
					console.log("hideit");
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
