<?php
include 'include/bootstrap.php';
include 'include/views/nav.php';
include 'include/views/weatherandmap.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$id = $_GET["id"];

if (isset($_SESSION['u_id'])){
    $u_id = $_SESSION['u_id'];
} else {
    $u_id = 0;
}

if (isset($_GET['c_id'])){ //behöver säkrare koll på vad som skickas med.
    $location = $_GET['c_id'];
} else {
    $location = 1;
}
$object = getpostfromid($id)->fetch_assoc();
if ($object['p_id']){
    $archived = false;
    $stmt = getcomments();
    $style = '';
} else {
    $archived = true;
    $stmt = getArchivedComments();
    $style = 'id="archived"';
}

?>

<html>
<body>
    <a name="topOfPage"></a>

    <!-- GÖMMA OM MAN ÄR LÄNGST NERE? -->
    <?php
        if(isset($_SESSION['u_id'])){
            echo '
            <div class="link_holder">
                <div class="container" id="link">
                    <a class="dropdown-item" id="answer_button" href="create.php">Skapa ny fråga</a>
                </div>
                <div class="container" id="link">
                    <a class="dropdown-item" id="answer_button" href="topic.php?id='.$id.'#bottomOfPage">Svara på fråga</a>
                </div>
            </div>';
        }
    ?>

    <div class="container" id="topic_wrapper">

        <div id="location_list">
            <?php
            $results = getallcities();
            while($rows = $results->fetch_assoc()){
                echo "<a href='main.php?c_id=".$rows['c_id']."' class='dropdown-item'>".$rows['city']."</a>";
            }
            ?>
        </div>

        <?php
        while($rows = $stmt->fetch_assoc()){
            if ($rows["parent_id"] == $id){
                if ($rows["parent_id"] == $rows["p_id"]){
                    $location = $rows["l_id"];
                    echo
                    '<div class="topic" '.$style.'>
                        <div class="height_wrapper">
                            <div class="breadtext">
                                <h3> '.$rows['title'].'</h3>
                                <p> '.$rows['description'].'</p>
                            </div>';
                            if (!$archived) {
                                echo '<div class="vote_wrapper">
                                    <div class="arrow_up"></div>
                                    <div class="vote_value"><p>'.$rows['rating'].'</p></div>
                                    <div class="arrow_down"></div>
                                </div>';
                            }
                            echo '<div class="creator"><h4>'.getuser($rows['u_id'])['name'].'</h4></div>';

                            if ($rows['u_id'] != $u_id){
                                echo '<a href="report.php?post='.$rows['p_id'].'"><div class="report_field"><h4>report</h4></div></a>';
                            }

                            echo '<div class="timestamp"><h4>'.$rows['date'].'</h4></div>
                        </div>
                    </div>';

                } else {
                    echo
                        '<div class="comment">
                            <div class="height_wrapper">
                                <div class="breadtext_comment">
                                    <p> '.$rows['description'].'</p>
                                </div>';
                                if (!$archived) {
                                    echo '<div class="vote_wrapper">
                                        <div class="arrow_up"></div>
                                        <div class="vote_value"><p>'.$rows['rating'].'</p></div>
                                        <div class="arrow_down"></div>
                                    </div>';
                                }
                                echo '<div class="creator"><h4>'.getuser($rows['u_id'])['name'].'</h4></div>';
                                if ($rows['u_id'] != $u_id){
                                    echo '<a href="report.php?post='.$rows['p_id'].'"><div class="report_field"><h4>report</h4></div></a>';
                                }
                                echo '<div class="timestamp"><h4>'.$rows['date'].'</h4></div>
                            </div>
                        </div>';

                }

            }
        }

        if (isset($_SESSION["u_id"]) && !$archived){
            echo
            '<div class="comment">
                <form name="commForm" action="process.php" method="post" onsubmit="return validateForm()">

                    <textarea rows="3" id="field-text" wrap="soft" class="fields" name="description" placeholder="Text..." required></textarea>
                    <input type="submit" id="sendbutton" value="Send">

                    <label id="err">Fields cannot be empty!</label>
                    <input type="hidden" name="type" value="comment"/>
                    <input type="hidden" name="loc" value="'.$location.'"/>
                    <input type="hidden" name="id" value="'.$id.'"/>
                </form>
            </div>';
        }
        ?>

    </div>

    <a name="bottomOfPage"></a>
</body>
</html>
