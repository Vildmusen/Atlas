<html>
<body>

    <main role="main" class="container" id="login_wrapper">

        <div class="conatiner" id="login_box">
            <h3>Logga in:</h3>
            <form name="regForm" action="login_process.php" method="post" onsubmit="return validateLogin()">
                <input type="email" class="new-forms" name="mail" placeholder="Email" required pattern=".*[@].*[.].*"><br>
                <input type="password" id="passval" class="new-forms" name="pass" placeholder="Lösenord" required><br>
                <input type="submit" id="login_button" value="Logga in">
            </form>
        </div>
    </main>
</body>
</html>
