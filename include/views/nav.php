<?php
    if (isset($_GET['c_id'])){ //behöver säkrare koll på vad som skickas med.
        $location = $_GET['c_id'];
    } else {
        $location = 1;
}
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

    <a class="navbar-brand" href="main.php?c_id=1">Atlas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation" onclick="show_hide_drop('location_dropdown');">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Hem</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?c_id=1">Utforska</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="omoss.php">Om oss</a>
            </li>
            <?php
                if(isset($_SESSION['admin'])){
                    echo '
                            <li class="nav-item">
                                <a class="nav-link" href="admin.php">Admin</a>
                            </li>';
                }
                if (isset($_SESSION["u_id"])){
                    echo '
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logga ut</a>
                        </li>
                    </ul>

                <div class="navbar-brand">
                    Inloggad som: '.$_SESSION["name"].'
                </div>';
            } else {
                echo '
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Logga in</a>
                    </li>
                </ul>';
            }
            ?>

    </div>

    <div id="location_wrapper">
        <div id="location_name">
            <?php

                $city = getcity($location);
                echo "
                    <a href='main.php?c_id=".$location."' id='nostyle_link'>
                        <h2>".$city['city']."</h2>
                    </a>";

            ?>
        </div>
        <div id="location_dropdown">
            <div id="location_button" onclick="show_hide('location_list');"></div>
        </div>
    </div>

    <div id="location_list">
        <?php
        $results = getallcities();
        while($rows = $results->fetch_assoc()){
            echo "<a href='main.php?c_id=".$rows['c_id']."' class='dropdown-item'>".$rows['city']."</a>";
        }
        ?>
    </div>

</nav>

