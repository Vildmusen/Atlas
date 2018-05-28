<!DOCTYPE html>

<html>
<?php

include 'include/bootstrap.php';
include 'include/views/nav.php';
include 'include/views/weatherandmap.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

?>
<body>
    
    <?php
        if(isset($_SESSION['u_id'])){
            echo '
                <div class="container" id="create_link">
                    <a class="dropdown-item" id="create_button" href="create.php">Skapa fråga</a>
                </div>';
        }
    ?>

    <div class="container" id="topic_wrapper">

        <?php
        $results = getpost($location);
        while ($row = $results->fetch_assoc()) {
            if($row['p_id'] == $row['parent_id']){
                echo
                '<div class="topic">
                    <div class="height_wrapper">
                        <a href="topic.php?id='.$row['parent_id'].'&c_id='.$location.'" id="topic_link">
                            <div class="breadtext">
                                <h3> '.$row['title'].'</h3>
                                <p> '.$row['description'].'</p>
                            </div>
                        </a>
                        <div class="vote_wrapper">
                            <a href="vote.php?p_id='.$row['p_id'].'&val=true&c_id='.$location.'&from=main"><div class="arrow_up"></div></a>
                            <div class="vote_value"><p>'.$row['rating'].'</p></div>
                            <a href="vote.php?p_id='.$row['p_id'].'&val=false&c_id='.$location.'&from=main"><div class="arrow_down"></div></a>
                        </div>

                        <div class="creator"><h4>'.getuser($row['u_id'])['name'].'</h4></div>
                        <a href="topic.php?id='.$row['parent_id'].'&c_id='.$location.'" id="topic_link">
                            <div class="comment_holder"><div class="comment_icon"></div><h4>'.getTotalComments($row['parent_id']).'</h4></div>
                        </a>
                        <a href="report.php?post='.$row['p_id'].'"><div class="report_field"><h4>report</h4></div></a>
                        <div class="timestamp"><h4>'.$row['date'].'</h4></div>
                    </div>
                </div>';
            }
        }
        ?>

    </div>

   
</body>
</html>
