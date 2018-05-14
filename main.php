<!DOCTYPE html>
<?php 
    $uname = "root";
    $pass = "";
    $host = "localhost";
    $dbname = "atlas";

    $connection = new mysqli($host, $uname, $pass, $dbname);
        if ($connection->connect_error) {
            die("connection failed");
        }
?>
<html>
    <head>

        <meta charset="utf-8">
        <title>Projektet my dude</title>

        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
        <script src="assets/js/script.js"></script>
    </head>
    <body>

        <div id="header">
            <div id="logo">
                <h1>ATLAS</h1>
            </div>
            <div id="user_info">
                <div id="user_text"><h3>Välkommen, användare!</h3></div>
                <div id="user_icon"></div></div>
            </div>
        </div>

        <div id="main">
            
        <div id="location">

                <h2 style="color: black;">Uppsala</h2>

                <form method="post" action="main.php">
                    
                    <select name="location_list" required>
                    <option value="">BESÖK DIN FAVVOSTAD UUUUU</option>
                    <?php
                    $stmt = $connection->query("SELECT * from location");
                        while($rows = $stmt->fetch_assoc()){
                            echo "<option value=".$rows['c_id'].">".$rows['city']."</option>";
                        }
                    ?>
                </select>
                    <input type="submit" name="location"></input>
                </form>

                <?php
                    if(isset($_POST['location_list'])){
                        $location = $_POST['location_list'];
                        $query = "SELECT * FROM topic WHERE location='$location'";
                        $results = $connection->query($query);
                        
                        if ($results->num_rows > 0) {
                            while ($row = $results->fetch_assoc()) {
                                echo 
                                    "<div class='comm'>              
                                        <h3>".$row["title"]."</h3>
                                        <p>".$row["description"]."</p>
                                    </div>";
                            }
                        }
                    }

                ?>
            </div>
       </div>
    </body>
</html>
