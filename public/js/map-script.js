

// map-container


var latitude = '53.34809202306839';
var longitude = '-6.25396728515625';
var map=null;

var geocoder = null;
var marker=null;

function initMap(){
	var mapProp = {
		center: new google.maps.LatLng(latitude,longitude),
		zoom: 10,
		mapTypeId: google.maps.MapTypeId.ROADMAP
		 
	};
	map = new google.maps.Map(document.getElementById("map-container"), mapProp);
	google.maps.event.addListener(map, 'click', getLocation);
	geocoder = new google.maps.Geocoder();	

}


function getLocation(event){ 
	// alert("event");
	console.log(event.latLng);
	orig=event.latLng;
	map.setCenter(orig); 
	if(marker!=null)
		marker.setMap(null);
	marker=new google.maps.Marker({
		map:map,position:orig
	});

	codeLatLng(orig);	

}

function codeLatLng(latlng) {
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {
      	$("#address").val(results[1].formatted_address);
      } else {
        log('No results found',latlng);
      }
    } else {
      log('Geocoder failed due to: ' + status,geocoder);
    }
  });
}





function showAddressInMap() {
	address=$("#address").val();
    geocoder.geocode({ 'address': address }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
                orig = results[0].geometry.location;
                // map.setCenter(orig); 
                if(marker!=null)
                	marker.setMap(null);
                marker=new google.maps.Marker({
                	map:map,position:orig
                });
            }else {
            alert("Invalid Address:Location Not Found!");
        }
    });
}


function log(t,n){
            num="";
            var err = new Error();
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");
            if(msie>0 || !!window.navigator.userAgent.match(/Trident.*rv\:11\./) ){
                ieIndex=parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));
            }else{
                 num= err.stack.split("\n")[2].split(":")[2];
            }
    console.log(num+":"+t,n);
}