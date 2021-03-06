<!DOCTYPE html>

<html>
<?php

include 'include/bootstrap.php';
include 'include/views/nav.php';
include 'include/views/weatherandmap.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

if (isset($_SESSION['u_id'])){
    $u_id = $_SESSION['u_id'];
} else {
    $u_id = 0;
}

?>
<body onload="setBackground(<?php echo $_GET['c_id']; ?>)">

    <div class="container" id="topic_wrapper">

        <?php
            echo '
                <div id="mode_selector">
                    <button id="mode_button"><a class="dropdown-item" id="create_button" href="main.php?c_id='.$_GET['c_id'].'&mode=new">Senaste</a></button>
                    <button id="mode_button"><a class="dropdown-item" id="create_button" href="main.php?c_id='.$_GET['c_id'].'&mode=high">Högst rating</a></button>
                ';

                if(isset($_SESSION['u_id'])){
                    echo '
                        <button id="mode_button"><a class="dropdown-item" id="create_button" href="create.php">Skapa fråga</a></button>';
                }
            echo '</div>';
        ?>

        <?php
        $oldPosts = checkDateOfPosts();

        while ($row = $oldPosts->fetch_assoc())
        {
            if ($row['p_id'] == $row['parent_id']){
                $results = getpost($location);
                while ($row2 = $results->fetch_assoc()) {
                    if ($row2['parent_id'] == $row['p_id']){
                        moveEntry($row2['p_id']);
                        deleteEntry($row2['p_id']);
                    }
                }
            } else {
                moveEntry($row['p_id']);
                deleteEntry($row['p_id']);
            }
        }

        if(isset($_GET['mode'])){
            $mode = $_GET['mode'];
        } else {
            $mode = "new";
        }

        if($mode == "new") {
            $results = getpost($location);
        } else if ($mode == "high") {
            $results = getpostvote($location);
        }

        while ($row = $results->fetch_assoc()) {
            if($row['p_id'] == $row['parent_id']){
                echo
                '<div class="topic">
                    <a name="'.$row["p_id"].'"></a>
                    <div class="'.decideTier(getuser($row['u_id'])['status']).'">';
                    if(isset($_SESSION['admin'])){ echo '<a href="delete_post.php?p_id='.$row['p_id'].'&from=main"><div id="delete_post"></div></a><a href="delete_user.php?u_id='.$row['u_id'].'&from=main&city='.$location.'"><div id="delete_user"></div></a>'; }
                echo'
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

                <div class="creator"><h4>'.getuser($row['u_id'])['name'].' : '.showTier(getuser($row['u_id'])['status']).'</h4></div>
                <a href="topic.php?id='.$row['parent_id'].'&c_id='.$location.'" id="topic_link">
                    <div class="comment_holder"><div class="comment_icon"></div><h4>'.getTotalComments($row['parent_id']).'</h4></div>
                </a>';
                if ($row['u_id'] != $u_id) {
                    echo '<a href="report.php?post='.$row['p_id'].'"><div class="report_field"><h4>Anmäl</h4></div></a>';
                }
                echo '<div class="timestamp"><h4>'.$row['date'].'</h4></div>
                    </div>
                </div>';
            }
        }
        $results = getArchivedPost($location);
        while ($row = $results->fetch_assoc()) {
            if($row['p_id'] == $row['parent_id']){
                echo
                '<div class="topic" id="archived">
                    <a name="'.$row["p_id"].'"></a>
                    <div class="'.decideTier(getuser($row['u_id'])['status']).'">
                        <a href="topic.php?id='.$row['parent_id'].'&c_id='.$location.'" id="topic_link">
                            <div class="breadtext">
                                <h3> '.$row['title'].'</h3>
                                <p> '.$row['description'].'</p>
                            </div>
                        </a>
                <div class="creator"><h4>'.getuser($row['u_id'])['name'].' : '.showTier(getuser($row['u_id'])['status']).'</h4></div>
                <a href="topic.php?id='.$row['parent_id'].'&c_id='.$location.'" id="topic_link">
                    <div class="comment_holder"><div class="comment_icon"></div><h4>'.getTotalArchivedComments($row['parent_id']).'</h4></div>
                </a>';
                if ($row['u_id'] != $u_id) {
                echo '<a href="report.php?post='.$row['p_id'].'"><div class="report_field"><h4>Anmäl</h4></div></a>';
                }
                echo '<div class="timestamp"><h4>'.$row['date'].'</h4></div>
                    </div>
                </div>';
            }
        }
        ?>

    </div>

    <div id="googleMap">
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9ufJ7Qk6fZyZkU8SWD1HOd4nCPnwexbI&callback=myMap"></script>
    </div>
</body>
</html>
