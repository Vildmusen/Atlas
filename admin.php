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
                <div class="breadtext">
                <h3> '.$row['title'].'</h3>
                <p> '.$row['description'].'</p>
                </div>
                <div class="creator"><h4>'.getuser((getpostfromid($row['p_id'])->fetch_assoc())['u_id'])['name'].' : '.showTier(getuser((getpostfromid($row['p_id'])->fetch_assoc())['u_id'])['status']).'</h4></div>
                <div class="comment_holder"><div class="comment_icon"></div><h4>'.getTotalComments($row['parent_id']).'</h4></div>
                <div class="timestamp"><h4>'.$row['date'].'</h4></div>
                </div>
                </div>';
            }
            $arr = [
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0
            ];
            $reports = getReports($row['p_id']);
            while ($row2 = $reports->fetch_assoc()) {
                $id = getReportType($row2['reason']);
                $arr[$id] += 1;
            }
            echo 'Anmälningar: ';
            foreach($arr as $type => $value){
                if ($value > 0) {
                    echo getReportTitle($type).", anmält ".$value." gånger.";
                }
            }
        }
        //vad har jag gjort det är för varmt snälla hjälp mig
        ?>
    </div>
    <!-- </main> -->
</body>
</html>
