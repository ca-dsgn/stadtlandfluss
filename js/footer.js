$(document).ready(function() {
	
	showFooter();
	
	footerEventListeners();
});

function showFooter() {

	$("#pageFooterSlider .wrapper").slideDown({
		
		duration: 500,
		easing: 'easeInQuad'
	});
}

function hideFooter() {

	$("#pageFooterSlider .wrapper").slideUp({
		
		duration: 500,
		easing: 'easeOutQuad'
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
}
