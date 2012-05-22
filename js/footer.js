$(document).ready(function() {
	
	showFooter();
	
	footerEventListeners();
});

function showFooter() {

	$("#pageFooterSlider .wrapper").slideDown(500);
}

function hideFooter() {

	$("#pageFooterSlider .wrapper").slideUp(500);	
}

function footerEventListeners() {
	
	$("#pageFooterSliderButton").live("click", function() {
		
		if ($("#pageFooterSlider .wrapper").is(":hidden")) {
		
			console.log("hidden");	
		}
		else {
			
			console.log("not hidden");
		}
	});
}
