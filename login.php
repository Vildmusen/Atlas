<?php
include 'include/views/login.php';
include 'include/bootstrap.php';
if(isset($_SESSION["u_id"])){
    header("Location: index.php");
}
?>
