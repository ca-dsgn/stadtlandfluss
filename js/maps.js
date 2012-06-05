var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

var markersArray = [];

function initialize() {
	
	directionsDisplay = new google.maps.DirectionsRenderer();
	var allekotte = new google.maps.LatLng(50.542296,7.241529);
	
	var myOptions = {
		zoom: 16,
		center: allekotte,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	
	var marker = new google.maps.Marker({
	  position: allekotte, 
	  map: map, 
	  title:"Thomas Allekotte - Die Goldschmiede"
	});
	
	markersArray.push(marker);
	directionsDisplay.setMap(map);
}

function removeMarkers() {
	
	for (i in markersArray) {
		markersArray[i].setMap(null);
	}
}

function addMarkers() {
	for (i in markersArray) {
		markersArray[i].setMap(map);
	}
}

function calcRoute() {
	
	var start = "50.542296,7.241529";
	var end = document.getElementById("maps_from").value;

	if (end != "") {
		
		var request = {
			origin:end, 
			destination:start,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		
		directionsService.route(request, function(result, status) {
			
			if (status == google.maps.DirectionsStatus.OK) {
				
				directionsDisplay.setMap(map);
				directionsDisplay.setDirections(result);
				removeMarkers();
			}
			else {
				
				directionsDisplay.setMap(null);
				addMarkers();
				alert("Leider wurde kein Ort zu Ihrer Anfrage gefunden - bitte versuchen Sie es erneut");
			}
		});
	}
	else {
		
		alert('Ungültige Adresse');
	}
	
	
}