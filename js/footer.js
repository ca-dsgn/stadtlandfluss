$(document).ready(function() {
	
	showFooter();
	footerEventListeners();
});

function showFooter() {

	$("#pageFooterSlider .wrapper").slideDown({
		
		duration: 700,
		easing: 'swing'
	});
}

function hideFooter() {

	$("#pageFooterSlider .wrapper").slideUp({
		
		duration: 700,
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
			
			console.log(ui);
		}
	});
}
