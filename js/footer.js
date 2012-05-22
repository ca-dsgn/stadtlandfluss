$(document).ready(function() {
	
	$("#pageFooterSlider .wrapper").hide();
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
}
