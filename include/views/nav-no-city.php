<?php
    if (isset($_GET['c_id'])){ //behöver säkrare koll på vad som skickas med.
        $location = $_GET['c_id'];
    } else {
        $location = 1;
}
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

    <a class="navbar-brand" href="main.php">Atlas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Hem</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php">Utforska</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="omoss.php">Om oss</a>
            </li>
            <?php
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
</nav>

