<?php
    $uname = "root";
    $pass = "";
    $host = "localhost";
    $dbname = "atlas";

    $connection = new mysqli($host, $uname, $pass, $dbname);
        if ($connection->connect_error) {
            die("connection failed");
        }
    mysqli_set_charset($connection, 'utf8');
?>
