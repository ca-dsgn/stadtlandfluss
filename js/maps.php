<?php
	include_once ("../php/VideoController.php");
			
	$vc = new VideoController();
	$locations = json_decode($vc->getAllLocations());
	
?>

var directionDisplay;
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
			mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.BOTTOM_CENTER
            },
            panControl: false,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE,
                position: google.maps.ControlPosition.LEFT_CENTER
            }
		};
		var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		
        <?php
	
        foreach($locations as $location) {
            
            print 'var marker'.$location->Video_ID.' = new google.maps.Marker({
			  position: location'.$location->Video_ID.', 
			  map: map, 
			  title:\''.$location->title.'\'
			});'."\n";
			
			print 'google.maps.event.addListener(marker'.$location->Video_ID.', \'click\', function() {
				
					$("body").append(\'<div class="maps_item_loading"><img src="img/ajax-loader.gif" alt="Bitte warten" class="ajax-loader"/></div>\');
					
					$(".maps_item_loading").css("position", "absolute");
					$(".maps_item_loading").css("left",($(window).width()/2) -110 + "px");
					$(".maps_item_loading").css("top",($(window).height()/2) -190 + "px");
					
					$.ajax({
							
						type: "POST",
						
						data: "action=getVideoById&id='.$location->Video_ID.'",
						
						url: "php/AjaxController.php",
						
						success: function(data) {
							
							//data = data.replace(/li/g,"div");
							
							$(".maps_item_loading").after(data);
							$(".maps_item_loading").fadeOut(300, function() {
								$(this).remove();
							});
							
							$(".maps_item").css("position", "absolute");
							$(".maps_item").css("left",($(window).width()/2) -110 + "px");
							$(".maps_item").css("top",($(window).height()/2) -190 + "px");
							
							open_maps_item($(".maps_item"));
						}
					});
					
					map.panTo(location'.$location->Video_ID.');
					
				});';
					
			print 'markersArray.push(marker'.$location->Video_ID.')'."\n";
        }
		
		?>
        
        google.maps.event.addListener(map, 'center_changed', function() {
        	
            close_item_box();
        });
        
        google.maps.event.addListener(map, 'drag', function() {
        
        	close_item_box();
        });
		
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