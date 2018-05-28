<?php
    include 'include/bootstrap.php';
    if(isset($_SESSION['admin'])){
      if(isset($_GET['u_id'])){
        $user = $_GET['u_id'];
        deleteUser($user);
      }
    }

    $city = $_GET['city'];
    $location = $_GET['from'];
    
    if($location == "comment"){
        $parent = $_GET['parent'];
        header("Location: topic.php?id=$parent&c_id=$city");
    }

    if($location == "topic"){
        header("Location: main.php?c_id=$city");
    }

    if($location == "main"){
      header("Location: main.php?c_id=1");
    }

    if($location == "admin"){
        header("Location: admin.php");
    }
 ?>
