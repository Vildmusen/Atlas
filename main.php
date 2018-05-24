<!DOCTYPE html>

<html>
<?php
include 'include/bootstrap.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

if (isset($_GET['c_id'])){ //behöver säkrare koll på vad som skickas med.
    $location = $_GET['c_id'];
} else {
    $location = 1;
}
?>
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
                    <a class="nav-link" href="main.php">Utforska</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="omoss.php">Om oss</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Skapa fråga</a>
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
            if (isset($_SESSION["u_id"])){
                echo '<div class="navbar-brand">
                        Välkommen '.$_SESSION["name"].'! <a class="nav-item active" href="logout.php">Logga ut</a>
                    </div>';
            }
        ?>

    </nav>

    <div id="location_list">
        <?php
        $results = getallcities();
        while($rows = $results->fetch_assoc()){
            echo "<a href='main.php?c_id=".$rows['c_id']."' class='dropdown-item'>".$rows['city']."</a>";
        }
        ?>
    </div>

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
                    

                        <div class="creator"><h4>'.getuser($row['u_id'])['name'].'</h4></div>
                        <div class="comment_holder"><div class="comment_icon"></div><h4>4</h4></div>
                        <div class="report_field"><h4>report</h4></div>
                        <div class="timestamp"><h4>'.$row['date'].'</h4></div>
                    </div>
                </div>';
            }
        }
        ?>

    </div>
</body>
</html>
