<!DOCTYPE html>

<html>
    <?php
        include 'include/bootstrap.php';
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
                        <a class="nav-link" href="main.php">Utforska<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="omoss.php">Om oss</a>
                    </li>
                </ul>

                <div id="location_wrapper">
                    <div id="location_name">
                    <?php

                        $location = $_GET['c_id'];
                        $stmt = $connection->query("SELECT city from location WHERE c_id = '$location'");
                        $row = $stmt->fetch_assoc();

                        echo "<h2>".$row['city']."</h2>";
                    ?>
                    </div>
                    <div id="location_dropdown">
                        <div id="location_button" onclick="show_list();"></div>
                    </div>  
                </div>  

            </div>
        </nav>

        <div id="location_list">
            <?php
                $stmt = $connection->query("SELECT * from location");
                    while($rows = $stmt->fetch_assoc()){
                        echo "<a href='main.php?c_id=".$rows['c_id']."' class='dropdown-item'>".$rows['city']."</a>";
                    }
            ?>
        </div>

        <div class="container" id="topic_wrapper">
            
        <?php
            $location = $_GET['c_id'];
            $query = "SELECT * FROM topic WHERE location='$location'";
            $results = $connection->query($query);

            if ($results->num_rows > 0) {
                while ($row = $results->fetch_assoc()) {
                    // if($row['t_id'] == $row['parent'])
                    echo
                        '<div class="topic">
                            <a href="topic.php?id='.$row['t_id'].'" id="topic_link">
                                <div class="breadtext">
                                    <h3> '.$row['title'].'</h3>
                                    <p> '.$row['description'].'</p>
                                </div>
                            </a>
                            <div class="vote_wrapper">
                                <div class="arrow_up"></div>
                                <div class="vote_value"><p>'.$row['vote_value'].'</p></div>
                                <div class="arrow_down"></div>
                            </div>

                            <div class="creator"><h4>'.$row['u_id'].'</h4></div>
                            <div class="comment_holder"><div class="comment_icon"></div><h4>4</h4></div>
                            <div class="report_field"><h4>report</h4></div>
                            <div class="timestamp"><h4>'.$row['timestamp'].'</h4></div>
                        </div>';
                }
            }
        ?>

        </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>

    </body>
</html>
