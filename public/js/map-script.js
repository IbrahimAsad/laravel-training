

// map-container


var latitude = '53.34809202306839';
var longitude = '-6.25396728515625';


function initMap(){
	var mapProp = {
		center: new google.maps.LatLng(latitude,longitude),
		zoom: 10,
		mapTypeId: google.maps.MapTypeId.ROADMAP
		 
	};
	map = new google.maps.Map(document.getElementById("map-container"), mapProp);
	google.maps.event.addListener(map, 'click', getLocation);

}


function getLocation(event){ 
	// alert("event");
	console.log(event);
 
}