function show_hide(id) {

    var list = document.getElementById(id);

    if(list.style.display == "block"){
        list.style.display = "none";
    }
    else {
        list.style.display = "block";
    }

}

function show_hide_drop(id) {

    var list = document.getElementById(id);
    var drop = document.getElementById("location_list");

    if(list.style.display == "block" || list.style.display == "" ){
        list.style.display = "none";
        drop.style.display = "none";
    }
    else {
        list.style.display = "block";
    }

}

function setBackground(c_id) {
    document.body.style.backgroundImage = "url(assets/img/" + c_id + ".jpg)";
}