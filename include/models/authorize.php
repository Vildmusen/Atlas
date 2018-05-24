<?php
//type can be: password, mail or text. 
function verify($assocArr) {
    foreach($assocArr as $type => $value){
        switch ($type){
            case "pass":
                if (verPass($value) == false){
                    return false;
                }
                break;
            case "mail":
                if (verMail($value) == false){
                    return false;
                }
                break;
            default:
                if (verText($value) == false){
                    return false;
                }
        }
    }
    return true;
}
function verPass($pass){
    $passCheck = true;
    if (strlen($pass) < 8) {
        return false;
    }
    preg_match('/[0-9]+/', $pass, $matches, PREG_UNMATCHED_AS_NULL);
    if ($matches == null) {
        return false;
    }
    preg_match('/[a-zA-Z]+/', $pass, $matches, PREG_UNMATCHED_AS_NULL);
    if ($matches == null) {
        return false;
    }
    return true;
}
function verMail($mail){
    $splitMail = explode("@", $mail);
    if (count($splitMail) == 2){
        if (count(explode(".", $splitMail[1])) == 2){
            return true;
        }
    }
    return false;
}
function verText($text){
    if (trim($text) == ""){
        return false;
    }
    return true;
}
?>
