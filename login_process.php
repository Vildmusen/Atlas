<?php
include 'include/bootstrap.php';
if(isset($_SESSION["u_id"])){
    header("Location: index.php");
}
$assoc['pass'] = $_POST['pass'];
$assoc['mail'] = $_POST['mail'];
if (!verify($assoc)){
    header("Location: login.php");
} else {
    $stmt = getuser();
    $bool = false;
    while ($rows = $stmt->fetch_assoc()){
        if ( $_POST['mail'] == $rows['mail']){
            $login_hash = $rows['hash_pass'];
            $login_salt = $rows['salt'];
            $id = $rows['u_id'];
            $name = $rows['name'];
            $town = $rows['hometown'];
            $bool = true;
        }
    }
    if ($bool == true){
        if (sha1($_POST['pass'].$login_salt) === $login_hash){
            $_SESSION["u_id"] = $id;
            $_SESSION["name"] = $name;
            echo '<h1>Logged in, redirecting...</h1>';
            header("Refresh: 2, URL=main.php?c_id=".$town);
        } else {
            echo '<h1>Wrong password.</h1>';
            header("Refresh: 2, URL=login.php");
        }
    } else {
        echo '<h1>Password or mail didn'."'".'t match.</h1>';
        header("Refresh: 2, URL=login.php");
    }
}
?>
