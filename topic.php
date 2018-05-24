<?php
include 'include/bootstrap.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$stmt = getcomments();
$id = $_GET["id"];

if (isset($_GET['c_id'])){ //behöver säkrare koll på vad som skickas med.
    $location = $_GET['c_id'];
} else {
    $location = 1;
}
?>

<html>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

        <a class="navbar-brand" href="#">Atlas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Hem</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="main.php">Utforska<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="omoss.php">Om oss</a>
                </li>
            </ul>

            <div id="location_wrapper">

                <div id="location_name">
                    <?php
                        $city = getcity($location);
                        echo "<h2>".$city['city']."</h2>";
                    ?>
                </div>

                <div id="location_dropdown">
                    <div id="location_button" onclick="show_list();"></div>
                </div>
            </div>

        </div>

        <?php
        echo '<div class="navbar-brand">';
        if (isset($_SESSION["u_id"])){
            echo 'Välkommen '.$_SESSION["name"].', <a class="nav-item active" href="logout.php">Logga ut</a>?';
        } else {
            echo '<a class="nav-item active" href="login.php">Logga in?</a>';
        }
        echo '</div>';
        ?>

    </nav>

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
                    '<div class="topic">
                        <div class="height_wrapper">
                            <div class="breadtext">
                                <h3> '.$rows['title'].'</h3>
                                <p> '.$rows['description'].'</p>
                            </div>

                            <div class="vote_wrapper">
                                <div class="arrow_up"></div>
                                <div class="vote_value"><p>'.$rows['rating'].'</p></div>
                                <div class="arrow_down"></div>
                            </div>

                            <div class="creator"><h4>'.getuser($rows['u_id'])['name'].'</h4></div>';
                            if ($rows['u_id'] != $_SESSION['u_id']){
                                echo '<div class="report_field"><h4>report</h4></div>';
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
                                </div>

                                <div class="vote_wrapper">
                                    <div class="arrow_up"></div>
                                    <div class="vote_value"><p>'.$rows['rating'].'</p></div>
                                    <div class="arrow_down"></div>
                                </div>

                                <div class="creator"><h4>'.getuser($rows['u_id'])['name'].'</h4></div>';
                                if ($rows['u_id'] != $_SESSION['u_id']){
                                    echo '<div class="report_field"><h4>report</h4></div>';
                                }
                                echo '<div class="timestamp"><h4>'.$rows['date'].'</h4></div>
                            </div>
                        </div>';

                }

            }
        }

        if (isset($_SESSION["u_id"])){
            echo
            '<div class="comment">
                <form name="commForm" action="process.php" method="post" onsubmit="return validateForm()">

                    <textarea rows="3" id="field-text" wrap="soft" class="fields" name="description" placeholder="Text..." required></textarea>
                    <input type="submit" id="send-button" value="Send">

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
