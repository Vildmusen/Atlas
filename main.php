<!DOCTYPE html>

<html>
<?php
include 'include/bootstrap.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

?>
<body>
    <div id="location_list">
        <?php
        $results = getallcities();
        while($rows = $results->fetch_assoc()){
            echo "<a href='main.php?c_id=".$rows['c_id']."' class='dropdown-item'>".$rows['city']."</a>";
        }
        ?>
    </div>

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
                            <div class="arrow_up"></div>
                            <div class="vote_value"><p>'.$row['rating'].'</p></div>
                            <div class="arrow_down"></div>
                        </div>

<<<<<<< HEAD
                <div class="creator"><h4>'.getuser($row['u_id'])['name'].'</h4></div>
                <div class="comment_holder"><div class="comment_icon"></div><h4>4</h4></div>
                <a href="report.php?post='.$row['p_id'].'"><div class="report_field"><h4>report</h4></div></a>
                <div class="timestamp"><h4>'.$row['date'].'</h4></div>
=======
                        <div class="creator"><h4>'.getuser($row['u_id'])['name'].'</h4></div>
                        
                        <a href="topic.php?id='.$row['parent_id'].'&c_id='.$location.'" id="topic_link">
                            <div class="comment_holder"><div class="comment_icon"></div><h4>'.getTotalComments($row['parent_id']).'</h4></div>
                        </a>
                        
                        <div class="report_field"><h4>report</h4></div>
                        <div class="timestamp"><h4>'.$row['date'].'</h4></div>
                    </div>
>>>>>>> 880d648fcd4c820816c4270798dda11d131ab7c3
                </div>';
            }
        }
        ?>

    </div>
</body>
</html>
