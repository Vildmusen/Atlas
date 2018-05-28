<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include 'include/bootstrap.php';
$assoc['text'] = $_POST['title'];
$assoc['text'] = $_POST['description'];
if (!verify($assoc)){
    header("Location: index.php");
} else {
    $city = $_POST['loc'];
    if ($_POST['type'] == "thread"){
        echo "creating thread";
        createPost();
        $stmt = getMaxId();
        $maxId = $stmt->fetch_assoc();
        $tempID = $maxId['id'];
        echo $tempID;
        updatePost($tempID);
        $location = "topic.php?id=$tempID&c_id=$city";
    } else {
        $tempID = $_POST['id'];
        createPost($tempID);
        $location = "topic.php?id=$tempID&c_id=$city#bottomOfPage";
    }
    header("Location: $location");
}
?>
