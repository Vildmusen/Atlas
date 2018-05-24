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
    </nav>
    <main role="main" class="container" id="wrapper">

        <div class="container" id="register_user">
            <h3>Registrera nytt konto</h3>
        </div>

        <div class="conatiner" id="register_box">
            <form name="regForm" action="register_process.php" method="post" onsubmit="return validateRegister()">
                <input type="text" name="name" placeholder="Användarnamn" class="Register">
                <input type="email" id="mailval" class="Register" name="mail" placeholder="Mail" required pattern=".*[@].*[.].*">
                <input type="password" id="passval" name="pass" placeholder="Lösenord" class="Register" required>
                <input type="password" id="passval2" name="pass2" placeholder="Bekräfta lösenord" class="Register" required>
                <!--<div class="select">-->
                    <select id="cityselect" name="city" required class="Register">
                    <option value="" selected disabled hidden>Hemstad</option>
                    <?php
                    $stmt = getcity();
                    while($rows = $stmt->fetch_assoc()){
                        echo "<option value=".$rows['c_id'].">".$rows['city']."</option>";
                    }
                    ?>
                    </select>
                    <label id="err">Fields cannot be empty!</label>
                    <input type="submit" id="button_save" value="Spara">
                <!--</div>-->
            </form>
        </div>
    </main>
</body>
</html>
