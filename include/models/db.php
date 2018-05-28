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
    $sql = "SELECT * FROM post
    ORDER BY p_id ASC";
    $result = connect()->query($sql);
    return $result;
}
function getArchivedComments(){
    $sql = "SELECT * FROM archived_post
    ORDER BY p_id ASC";
    $result = connect()->query($sql);
    return $result;
}
function getuser($id=""){
    if ($id == ""){
        $sql = "SELECT * FROM user";
        $result = connect()->query($sql);
        return $result;
    } else {
        $sql = "SELECT * FROM user WHERE u_id='".$id."'";
        $result = connect()->query($sql);
        return $result->fetch_assoc();
    }
}

function getpost($location){
    $query = "SELECT * FROM post WHERE l_id='$location' ORDER BY p_id DESC";
    return connect()->query($query);
}

function getpostvote($location){
    $query = "SELECT * FROM post WHERE l_id='$location' ORDER BY rating DESC";
    return connect()->query($query);
}

function getArchivedPost($location){
    $sql = "SELECT * FROM archived_post WHERE l_id='$location'";
    return connect()->query($sql);
}

function getpostfromid($p_id){
    $query = "SELECT * FROM post WHERE p_id='$p_id'";
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

function getReason(){
    $sql = "SELECT reason FROM reason";
    $result = connect()->query($sql);
    return $result;
}

function getTotalComments($parent_id) {
    $sql = "SELECT COUNT(description) FROM post WHERE parent_id = '$parent_id'";
    $result = connect()->query($sql);
    $totalComments = $result->fetch_assoc();
    return $totalComments['COUNT(description)'] - 1;
}
function getTotalArchivedComments($parent_id) {
    $sql = "SELECT COUNT(description) FROM archived_post WHERE parent_id = '$parent_id'";
    $result = connect()->query($sql);
    $totalComments = $result->fetch_assoc();
    return $totalComments['COUNT(description)'] - 1;
}

function getPostRating($post_id) {
    $sql = "SELECT rating FROM post WHERE p_id = '$post_id'";
    $result = connect()->query($sql);
    $postRating = $result->fetch_assoc();
    return $postRating['rating'];
}

function ratePost($post_id, $val) {
    $newrating = getPostRating($post_id) + $val;
    $sql = "UPDATE post SET rating = '$newrating' WHERE p_id = '$post_id'";
    connect()->query($sql);
}

function getPostUserRating($u_id, $post_id){
    $sql = "SELECT vote_value FROM rating WHERE u_id = '$u_id' and p_id = '$post_id'";
    return connect()->query($sql);
}

function allowedToVote($u_id, $post_id, $val){
    $result = getPostUserRating($u_id, $post_id);
    $vote = $result->fetch_assoc();

    if($vote['vote_value']){
        if($val != $vote['vote_value']){
            $sql = "UPDATE rating SET vote_value = '$val' WHERE u_id = '$u_id' AND p_id = '$post_id'";
            connect()->query($sql);
            return $val['vote_value']+$val; // changed
        }
        return (-2); // false
    } else {
        return 2; // new
    }
}

function saveVote($u_id, $post_id, $post_rating, $val){
    $result = getPostUserRating($u_id, $post_id);
    if($result->fetch_assoc() != null){
        $sql = "UPDATE rating SET vote_value = '$val' WHERE (p_id = '$post_id' AND u_id = '$u_id')";
        connect()->query($sql);
    } else {
        $sql = "INSERT INTO rating (u_id, p_id, post_rating, vote_value)
        VALUES ('$u_id', '$post_id', '$post_rating', '$val')";
        connect()->query($sql);
    }
}
function updateUserStatus($id, $value) {
    $sql = "UPDATE user SET status = '$value' WHERE u_id = '$id'";
    connect()->query($sql);
}
function getUserStatus($id) {
    $sql = "SELECT status FROM user WHERE u_id = '$id'";
    $result = connect()->query($sql);
    $val = $result->fetch_assoc();
    return $val['status'];
}

function reportPost(){
  $connection = connect();
  $reason = mysqli_real_escape_string($connection, $_POST["reason"]);
  $p_id = mysqli_real_escape_string($connection, $_POST["hidden_id"]);
  $u_id = $_SESSION['u_id'];
  $sql = "INSERT INTO flagged_post (p_id, u_id, reason)
  VALUES ('$p_id', '$u_id', '$reason')";
  $stmt = $connection->query($sql);
}

function getReportedPost(){
  $connection = connect();
  $p_id = mysqli_real_escape_string($connection, $_POST["hidden_id"]);
  $u_id = $_SESSION['u_id'];
  $sql = "SELECT p_id, u_id FROM flagged_post WHERE u_id = '$u_id' AND p_id = $p_id";
  $stmt = $connection->query($sql);
  return $stmt;
}

function checkDateOfPosts() {
    $sql = "SELECT * FROM post WHERE `date` < (CURRENT_TIMESTAMP - interval '7' day)";
    $result = connect()->query($sql);
    return $result;
}

function moveEntry($post) {
    $sql = "INSERT INTO archived_post (p_id, u_id, title, description, l_id, rating, parent_id)
    SELECT p_id, u_id, title, description, l_id, rating, parent_id FROM post
    WHERE p_id = '$post'";
    $result = connect()->query($sql);
}
function deleteEntry($post){
    $sql = "DELETE FROM post WHERE p_id = '$post'";
    $result = connect()->query($sql);
}

function deleteUser($user){
    $sql = "DELETE FROM user WHERE u_id = '$user'";
    $result = connect()->query($sql);
}

function showReportedPost(){
  $connection = connect();
  $sql = "SELECT * FROM post p
              JOIN flagged_post fp ON
                  fp.p_id = p.p_id";
  $stmt = $connection->query($sql);
  return $stmt;
}
?>
