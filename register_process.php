<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include 'include/bootstrap.php';
if(isset($_SESSION["u_id"])){
    header("Location: index.php");
}
$assoc['pass'] = $_POST['pass'];
$assoc['pass'] = $_POST['pass2'];
$assoc['mail'] = $_POST['mail'];
if (!verify($assoc)){
    header("Location: register.php");
} else {
    //borde jämföra med $rows['mail'] OM DEN FINNS istället för att hämta allt.
    $stmt = getuser();
    $bool = false;
    while ($rows = $stmt->fetch_assoc()){
        if ($_POST['mail'] == $rows['mail']){
            $bool = true;
        }
    }
    if ($bool == true){
        echo '<h1>Email already in use.</h1>';
        header("Refresh: 2, URL=register.php");
    } else {
        makeUser(genString(14));
        echo '<h1>Registration complete.</h1>';
        header("Refresh: 2, URL=login.php");
    }
}
?>
