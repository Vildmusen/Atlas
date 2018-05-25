<?php

include 'include/bootstrap.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

if(!(isset($_SESSION["u_id"]))){
    header("Location: main.php");
} else {
    if(isset($_GET['p_id']) && isset($_GET['val'])){

        $user = $_SESSION["u_id"];
        $post_id = $_GET['p_id'];
        $val = $_GET['val'];
        
        if($val == "true"){
            $val = 1;
        } else {
            $val = -1;
        }
        
        $stmt = allowedToVote($user, $post_id, $val);
        echo $stmt;

        if($stmt != "false"){
            if($stmt == "changed"){
                if($val == 1){
                    $temp = 2;
                } else {
                    $temp = -2;
                }
            } else {
                $temp = $val;
            }

            ratePost($post_id, $temp);
            saveVote($user, $post_id, getPostRating($post_id), $val);
            
        }

    }
}

$city = $_GET['c_id'];

if($_GET['from'] == "main"){
    header("Location: main.php?c_id=$city");
} else {
    $post = $_GET['p_id'];
    header("Location: topic.php?id=$post&c_id=$city");
}
?>