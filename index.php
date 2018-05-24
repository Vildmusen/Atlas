<?php
include 'include/bootstrap.php';
include 'include/views/nav-no-city.php';
include 'include/views/index.php';

if(isset($_SESSION["u_id"])){
    $hometown = getuser($_SESSION["u_id"]);
    header("Location: main.php?c_id=".$hometown['hometown']);
}
?>
