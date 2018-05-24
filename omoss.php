<!DOCTYPE html>
<html>
<?php
include 'include/bootstrap.php';
?>
<body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    
    <a class="navbar-brand" href="index.php">Atlas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

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
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
    
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
    </nav>
</body>
</html>
