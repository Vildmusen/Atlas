<?php
    include 'include/bootstrap.php';
    if(isset($_SESSION['admin'])){
      echo "hello admin";
      if(isset($_GET['p_id'])){
        echo "hello again";
        $post = $_GET['p_id'];
        deleteEntry($post);
        header("Location: main.php?c_id=1");
      }
    }
 ?>
