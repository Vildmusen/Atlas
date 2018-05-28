<?php
    include 'include/bootstrap.php';
    if(isset($_SESSION['admin'])){
      if(isset($_GET['u_id'])){
        $user = $_GET['u_id'];
        deleteUser($user);
        header("Location: main.php?c_id=1");
      }
    }
 ?>
