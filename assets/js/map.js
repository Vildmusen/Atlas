function myMap(city) {
    
    var mapOptions = {
        center: new google.maps.LatLng("uppsala"),
        zoom:9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.StyledMapType(document.getElementById("googleMap"), mapOptions);
}

function show_weather() {
    
    var box = document.getElementById("weather_wrapper");
    var arr = document.getElementById("arrow_left");

    if(box.style.right == "-290px") {
        box.style.right = "0px";
        arr.style.transform = "rotate(270deg)";
    } else {
        box.style.right = "-290px";
        arr.style.transform = "rotate(90deg)";
    }
}

