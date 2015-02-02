// map-container
var longitude = '-97.4267578125';
var latitude = '39.436192999314095';
var map = null;

var geocoder = null;
var marker = null;

function initMap() {
    var mapProp = {
        center: new google.maps.LatLng(latitude, longitude),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP

    };
    map = new google.maps.Map(document.getElementById("map-container"), mapProp);
    google.maps.event.addListener(map, 'click', getLocation);
    geocoder = new google.maps.Geocoder();

}


function getLocation(event) {
    // alert("event");
    console.log(event.latLng);
    orig = event.latLng;
    // orig.
    longitude=orig.lng();
    latitude=orig.lat();
    map.setCenter(orig);
    if (marker != null)
        marker.setMap(null);
    marker = new google.maps.Marker({
        map: map,
        position: orig
    });

    codeLatLng(orig);

}

function codeLatLng(latlng) {
    geocoder.geocode({
        'latLng': latlng
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                $("#address").val(results[1].formatted_address);
            } else {
                log('No results found', latlng);
            }
        } else {
            log('Geocoder failed due to: ' + status, geocoder);
        }
    });
}




function showAddressInMap() {
    address = $("#address").val();
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            orig = results[0].geometry.location;
            longitude=orig.lng();
            latitude=orig.lat();
            map.setCenter(orig);
            if (marker != null)
                marker.setMap(null);
            marker = new google.maps.Marker({
                map: map,
                position: orig
            });
        } else {
            alert("Invalid Address:Location Not Found!");
        }
    });
}



function AddNewTask() {
  var sendData=new Object();
  sendData.latitude=latitude;
  sendData.longitude=longitude;
  sendData.task_title=$("#task_title").val();
  sendData.address=$("#address").val();
  sendData.note_text=$("#note_text").val();
  sendData.phone=$("#phone").val();
  sendData.first_name=$("#first_name").val();
  sendData.last_name=$("#last_name").val();

console.log(sendData);
$.ajax({
  url:'task',
  data:sendData,
  type:'GET',
  success:function(data){
    console.log('success',data);
  },
  error:function(data){
    console.log("error",error);
  }

});
}




function log(t, n) {
    num = "";
    var err = new Error();
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    if (msie > 0 || !!window.navigator.userAgent.match(/Trident.*rv\:11\./)) {
        ieIndex = parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));
    } else {
        num = err.stack.split("\n")[2].split(":")[2];
    }
    console.log(num + ":" + t, n);
}