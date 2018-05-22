<?php
function connect(){
    $uname = "root";
    $pass = "";
    $host = "localhost";
    $dbname = "atlas";

    $connection = new mysqli($host, $uname, $pass, $dbname);

    if ($connection->connect_error) {
        die("connection failed");
    }

    $connection->set_charset("utf8");
    return $connection;
}
function getcomments(){
    $sql = "SELECT * FROM topic";
    $result = connect()->query($sql);
    return $result;
}
function getuser($id){
    $sql = "SELECT name FROM user WHERE u_id='".$id."'";
    $result = connect()->query($sql);
    $user = $result->fetch_assoc();
    return $user["name"];
}
function gettopics($location){
    $query = "SELECT * FROM topic WHERE location='$location'";
    return connect()->query($query);
}
function getcity($location){
    $sql = "SELECT city FROM location WHERE c_id = '".$location."'";
    $result = connect()->query($sql);
    return $result->fetch_assoc();
}
function getallcities(){
    return connect()->query("SELECT * from location");
}
?>
