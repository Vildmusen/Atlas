<?php
    if (isset($_GET['c_id'])){ //behöver säkrare koll på vad som skickas med.
        $location = $_GET['c_id'];
    } else {
        $location = 1;
}
?>

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

