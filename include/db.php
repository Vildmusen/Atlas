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
?>
