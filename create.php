<?php
include 'include/bootstrap.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

if(!isset($_SESSION["u_id"])){
    header("Location: index.php");
}
?>

<html>
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
                    <a class="nav-link" href="create.php">Skapa fråga<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        <?php
        echo
            '<div class="navbar-brand">
            Välkommen '.$_SESSION["name"].', <a class="nav-item active" href="logout.php">Logga ut</a>?
            </div>';
        ?>
    </nav>
    <div id="topic_wrapper">
        <div id="form">
            <label id="reply">Skapa fråga:</label>
            <form name="commForm" action="process.php" method="post" onsubmit="return validateForm()">
                <input type="text" id="field-title" class="fields" name="title" placeholder="Titel" required><br>
                <textarea rows="10" id="field-text" cols="30" wrap="soft" class="fields" name="description" placeholder="Text..." required></textarea><br>
                <select id="cityselect" name="loc" required class="Register">
                    <option value="" selected disabled hidden>Plats</option>
                    <?php
                    $stmt = getcity();
                    while($rows = $stmt->fetch_assoc()){
                        echo "<option value=".$rows['c_id'].">".$rows['city']."</option>";
                    }
                    ?>
                </select>
                <input type="submit" id="send-button" value="Send">
                <label id="err">Fields cannot be empty!</label>
                <input type="hidden" name="type" value="thread"/>

            </form>
        </div>
    </div>
</body>
</html>
