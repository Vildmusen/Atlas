function show_list() {

    var list = document.getElementById("location_list");

    if(list.style.display == "block"){
        list.style.display = "none";
    }
    else {
        list.style.display = "block";
    }

}