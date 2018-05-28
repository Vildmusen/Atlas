<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include 'include/bootstrap.php';
if(isset($_SESSION["u_id"])){
    header("Header: index.php");
}
$assoc['pass'] = $_POST['pass'];
$assoc['mail'] = $_POST['mail'];
if (!verify($assoc)){
    $location = "Location: login.php";
} else {
    $location = "Location: login.php";
    $stmt = getuser();
    $bool = false;
    while ($rows = $stmt->fetch_assoc()){
        if ( $_POST['mail'] == $rows['mail']){
            $login_hash = $rows['hash_pass'];
            $login_salt = $rows['salt'];
            $id = $rows['u_id'];
            $name = $rows['name'];
            $town = $rows['hometown'];
            $admin = $rows['admin'];
            $bool = true;
        }
    }
    if ($bool == true){
        if (sha1($_POST['pass'].$login_salt) === $login_hash){
            $_SESSION["u_id"] = $id;
            $_SESSION["name"] = $name;
            if($admin){
              $_SESSION['admin'] = true;
            }
            echo '<h1>Inloggad.</h1>';
            $location = "Location: main.php?c_id=".$town;
        } else {
            echo '<h1>Mail eller lösenord matchade inte.</h1>';
            $location = "Refresh: 2, URL=login.php";
        }
    } else {
        echo '<h1>Mail eller lösenord matchade inte.</h1>';
        $location = "Refresh: 2, URL=login.php";
    }
}
header($location);
?>
