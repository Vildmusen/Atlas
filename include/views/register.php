<html>
<body>
    
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
