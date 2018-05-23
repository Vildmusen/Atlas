<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include 'include/bootstrap.php';
$assoc['text'] = $_POST['title'];
$assoc['text'] = $_POST['description'];
if (!verify($assoc)){
    //header("Location: index.php");
} else {
    if ($_POST['type'] == "thread"){
        createPost();
        $stmt = getMaxId();
        $maxId = $stmt->fetch(PDO::FETCH_ASSOC);
        $tempID = $maxId['p_id'];
        updatePost($tempID);
        $location = "topic.php?id=$tempID";
    } else {
        $tempID = $_GET['id'];
        createPost($tempID);
        $location = "topic.php?id=$tempID#bottomOfPage";
    }
    //header("Location: $location");
}
?>
