<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

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
            $bool = true;
        }
    }
    if ($bool == true){
        if (sha1($_POST['pass'].$login_salt) === $login_hash){
            $_SESSION["u_id"] = $_POST['u_id'];
            echo '<h1>Logged in, redirecting...</h1>';
            header("Refresh: 2, URL=index.php");
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
