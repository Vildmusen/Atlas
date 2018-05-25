function myMap() {
    
    var mapOptions = {
        center: new google.maps.LatLng(59.85856380000001,17.638926699999956),
        zoom:9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.StyledMapType(document.getElementById("googleMap"), mapOptions);
}


