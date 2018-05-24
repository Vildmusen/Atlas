<?php
include 'include/bootstrap.php';
include 'include/views/nav-no-city.php';
include 'include/views/register.php';

if(isset($_SESSION["u_id"])){
    header("Location: index.php");
}
?>
