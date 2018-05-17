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
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="container" id="topic_wrapper">
            <div class="topic">
                <div class="breadtext">    
                    <h3>hehej</h3>
                    <p>hallå där!!! qkokokokokok   o1k  o keo1 kok2   qqfk1orohejhej jag gillar katter :D:D:D:D::D:D</p>
                </div>

                <div class="vote_wrapper">
                    <div class="arrow_up"></div>
                    <div class="vote_value"><p>137</p></div>
                    <div class="arrow_down"></div>
                </div> 
                
                <div class="creator"><h4>Owen</h4></div>
                <div class="timestamp"><h4>2018-05-17 15:36</h4></div>
            </div>
            <div class="topic"></div>
            <div class="topic"></div>
            <div class="topic"></div>
            <div class="topic"></div>
            <div class="topic"></div>
            <div class="topic"></div>
            <div class="topic"></div>

        </div>


                
            </div>
       </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        
    </body>
</html>

<!-- <h2 style="color: black;">Uppsala</h2>

<form method="post" action="main.php">
    
    <select name="location_list" required>
    <option value="">BESÖK DIN FAVVOSTAD UUUUU</option>
    /*php
    $stmt = $connection->query("SELECT * from location");
        while($rows = $stmt->fetch_assoc()){
            echo "<option value=".$rows['c_id'].">".$rows['city']."</option>";
        }
    ?>
</select>
    <input type="submit" name="location"></input>
</form>


    /*if(isset($_POST['location_list'])){
        $location = $_POST['location_list'];
        mysqli_set_charset($connection, 'utf8');
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

?> -->
