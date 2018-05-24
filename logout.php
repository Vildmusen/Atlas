<?php
include 'include/bootstrap.php';
if(!isset($_SESSION["u_id"])){
    header("Location: index.php");
}
unset($_SESSION["u_id"]);
unset($_SESSION["name"]);
session_destroy();
header("Location: index.php");
?>
