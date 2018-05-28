<?php
include 'include/bootstrap.php';
include 'include/views/nav-no-city.php';
include 'include/views/login.php';

if(isset($_SESSION["u_id"])){
    header("Location: index.php");
}
?>
