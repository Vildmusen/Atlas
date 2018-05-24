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
    $sql = "SELECT * FROM post";
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
function getpost($location){
    $query = "SELECT * FROM post WHERE l_id='$location'";
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
function createPost($tempID = 0){
    $connection = connect();
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $desc = mysqli_real_escape_string($connection, $_POST['description']);
    $name = $_SESSION['name'];
    $u_id = $_SESSION['u_id'];
    $location = $_POST['loc'];
    $parent = $tempID;
    $sql = "INSERT INTO post (u_id, title, description, l_id, rating, parent_id)
    VALUES ('$u_id', '$title', '$desc', '$location', '0', '$parent')";
    $stmt = $connection->query($sql);
    return $stmt;
}
function updatePost($tempID){
    $sql = "UPDATE post SET parent_id= '$tempID' WHERE p_id= '$tempID'";
    return connect()->query($sql);
}
function getMaxId(){
    $sql = "SELECT MAX(p_id) AS id FROM post";
    return connect()->query($sql);
}

function getTotalComments($parent_id) {
    $sql = "SELECT COUNT(description) FROM post WHERE parent_id = '$parent_id'";
    $result = connect()->query($sql);
    $totalComments = $result->fetch_assoc();
    return $totalComments['COUNT(description)'] - 1;
}

function getPostRating($post_id) {
    $sql = "SELECT post_rating FROM rating WHERE p_id = '$post_id'";
    $result = connect()->query($sql);
    $postRating = $result->fetch_assoc();
    return $postRating['post_rating'];
}
?>
