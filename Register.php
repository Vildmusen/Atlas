<?php
include 'include/bootstrap.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

if(isset($_SESSION["u_id"])){
    header("Location: index.php");
}
?>
<html>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

        <a class="navbar-brand" href="index.php">Atlas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Hem <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main.php">Utforska</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="omoss.php">Om oss</a>
                </li>
            </ul>
        </div>
        <?php
        if (isset($_SESSION["u_id"])){
            echo '<h2>'.$_SESSION["u_id"].'</h2>';
        }
        ?>
    </nav>
    <main role="main" class="container" id="wrapper">

        <div class="container" id="welcome_box">
            <h1>Registrera nytt konto!</h1>
        </div>

        <div class="conatiner" id="welcome_box">
            <form name="regForm" action="register_process.php" method="post" onsubmit="return validateRegister()">
                <input type="text" placeholder="Användarnamn" class="Register">
                <input type="email" id="mailval" class="new-forms" name="mail" placeholder="Mail" required pattern=".*[@].*[.].*"><br>
                <input type="password" id="passval" placeholder="Password" class="Register" required><br>
                <input type="password" id="passval2" placeholder="Confirm Password" class="Register" required><br>
                <select name="stad" required class="Register">
                    <option value="">Hemstad...</option>
                    <?php
                    $stmt = getcity();
                    while($rows = $stmt->fetch_assoc()){
                        echo "<option value=".$rows['c_id'].">".$rows['city']."</option>";
                    }
                    ?>
                </select>
                <label id="err">Fields cannot be empty!</label>
                <input type="submit" id="new-button" value="Send">
            </form>
        </div>
    </main>
</body>
</html>
