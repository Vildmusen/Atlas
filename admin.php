<?php
    include 'include/bootstrap.php';
    include 'include/views/nav-no-city.php';
?>
<!DOCTYPE html>
<html >
  <body>
    <!-- <main role="main" class="container" id="content"> -->
      <div class="conatiner" id="topic_wrapper">
            <h3> Anmälda inlägg </h3>
            <?php
              $results = showReportedPost();

            while ($row = $results->fetch_assoc()) {
                if($row['p_id'] == $row['parent_id']){
                    echo
                    '<div class="topic">
                        <div class="'.decideTier(getuser($row['u_id'])['status']).'">';
                        if(isset($_SESSION['admin'])){ echo '<a href="delete_post.php?p_id='.$row['p_id'].'&from=admin"><div id="delete_post"></div></a><a href="delete_user.php?u_id='.$row['u_id'].'&from=admin"><div id="delete_user"></div></a>'; }
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
                    echo '<div class="timestamp"><h4>'.$row['date'].'</h4></div>
                        </div>
                    </div>';
                }
            }
            ?>
      </div>
  <!-- </main> -->
  </body>
</html>
