function validateForm() {
    var name = document.getElementById("field-name");
    var comm = document.getElementById("field-text");

    if (name.value.trim() == "" || comm.value.trim() == "") {
        document.getElementById("err").style.display = "inline";
        return false;
    }
}
function validateRegister(){
    var pass = document.getElementById("passval").value;
    var err  = document.getElementById("err");

    if (pass.length < 8) {
        err.innerHTML = "Password too short!";
        err.style.display = "block";
        return false;
    }
    var match = pass.match(/[0-9]+/);
    if (match == null) {
        err.innerHTML = "Password must include at least one number!";
        err.style.display = "block";
        return false;
    }
    match = pass.match(/[a-zA-Z]+/);
    if (match == null) {
        err.innerHTML = "Password must include at least one letter!";
        err.style.display = "block";
        return false;
    }
    return true;
}
function validateLogin(){
    var pass = document.getElementById("passval").value;
    if (pass.trim() == ""){
        //Throw some kind of tantrum
        return false;
    }
}
