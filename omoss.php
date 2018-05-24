<!DOCTYPE html>
<html>
<?php
    include 'include/bootstrap.php';
    include 'include/views/nav-no-city.php';
?>
<body>
    <main role="main" class="container" id="content">
            <div class="container" id="about_box">
                        <h2>Om oss</h2>
                        <p>Här hittar du information om oss.</p>
                    </div>
            <div class="container" id="terms_cons"><a href="termsandcons.php">Terms and conditions</a></div>  
    </main>  

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Hem </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php">Utforska</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="omoss.php">Om oss<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    <?php
    if (isset($_SESSION["u_id"])){
        echo '<div class="navbar-brand">
        Välkommen '.$_SESSION["name"].', <a class="nav-item active" href="logout.php">Logga ut</a>?
        </div>';
    }
    ?>
</body>
</html>
