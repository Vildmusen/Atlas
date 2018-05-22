<?php
function connect(){
    $uname = "root";
    $pass = "root";
    $host = "localhost";
    $dbname = "atlas";

    $connection = new mysqli($host, $uname, $pass, $dbname);

    if ($connection->connect_error) {
        die("connection failed");
    }

    $connection->set_charset("utf8");
    return $connection;
}
function makeUser($salt){
    $connection = connect();
    $hashed_pass = sha1($_POST["pass"].$salt);
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $mail = mysqli_real_escape_string($connection, $_POST["mail"]);
    $city = mysqli_real_escape_string($connection, $_POST["city"]); //behövs detta?
    $status = 0;

    $sql = "INSERT INTO user (name, mail, hash_pass, salt, hometown, status)
    VALUES ('$name', '$mail', '$hashed_pass', '$salt', '$city', '$status') ";
    $stmt = $connection->query($sql);
    return $stmt;
}
function getcomments(){
    $sql = "SELECT * FROM topic";
    $result = connect()->query($sql);
    return $result;
}
function getuser($id=""){
    if ($id == ""){
        $sql = "SELECT * FROM user";
        $result = connect()->query($sql);
        return $result;
    } else {
        $sql = "SELECT name FROM user WHERE u_id='".$id."'";
        $result = connect()->query($sql);
        return $result->fetch_assoc();
    }
}
function gettopics($location){
    $query = "SELECT * FROM topic WHERE location='$location'";
    return connect()->query($query);
}
function getcity($location=""){
    if ($location==""){
        $sql = "SELECT * FROM location";
        $result = connect()->query($sql);
        return $result;
    } else {
        $sql = "SELECT city FROM location WHERE c_id = '".$location."'";
        $result = connect()->query($sql);
        return $result->fetch_assoc();
    }
}
function getallcities(){
    return connect()->query("SELECT * from location");
}
?>
