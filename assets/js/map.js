function myMap(city) {
    
    var map;

    map = new google.maps.Map(document.getElementById('googleMap'), {
        center: {lat: 59.858227, lng: 17.632252},
        zoom: 11
      });

}

function show_weather() {
    
    var box = document.getElementById("weather_wrapper");
    var arr = document.getElementById("arrow_left");

    if(box.style.right == "0px") {
        box.style.right = "-315px";
        arr.style.transform = "rotate(90deg)";
    } else {
        box.style.right = "0px";
        arr.style.transform = "rotate(270deg)";
    }
}

function show_map() {
    
    var box = document.getElementById("google_wrapper");
    var arr = document.getElementById("arrow_right");

    if(box.style.left == "0px") {
        box.style.left = "-300px";
        arr.style.transform = "rotate(270deg)";
    } else {
        box.style.left = "0px";
        arr.style.transform = "rotate(90deg)";
    }
}
