<?php
	include_once ("../php/VideoController.php");
			
	$vc = new VideoController();
	$locations = json_decode($vc->getAllLocations());
	
?>

var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

var markersArray = [];

function initialize() {
	
	if (document.getElementById("map_canvas") != null) {
		
		directionsDisplay = new google.maps.DirectionsRenderer();
        
        var mosbach = new google.maps.LatLng(49.348691,9.129383);
        <?php
	
        foreach($locations as $location) {
            
            echo 'var location'.$location->Video_ID.' = new google.maps.LatLng('.$location->altitude.','.$location->longitude.');'."\n";
        }
		
		?>
		
		var myOptions = {
			zoom: 12,
			center: mosbach,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		
        <?php
	
        foreach($locations as $location) {
            
            print 'var marker'.$location->Video_ID.' = new google.maps.Marker({
			  position: location'.$location->Video_ID.', 
			  map: map, 
			  title:"Bla"
			});'."\n";
			
			print 'google.maps.event.addListener(marker'.$location->Video_ID.', \'mouseover\', function() {
				
				alert("My id is '.$location->Video_ID.'");
			});';
			
			print 'markersArray.push(marker'.$location->Video_ID.')'."\n";
        }
		
		?>
		
		directionsDisplay.setMap(map);
	}
}

function removeMarkers() {
	
	for (i in markersArray) {
		markersArray[i].setMap(null);
	}
}

function addMarkers() {

	console.log("added markers");

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