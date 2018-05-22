<html>
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
                <li class="nav-item">
                    <a class="nav-link" href="omoss.php">Om oss</a>
                </li>
            </ul>
        </div>
    </nav>
    <main role="main" class="container" id="wrapper">

        <div class="container" id="welcome_box">
            <h2>Logga in:</h2>
        </div>

        <div class="conatiner" id="link_box">
            <form name="regForm" action="login_process.php" method="post" onsubmit="return validateLogin()">
                <input type="email" class="new-forms" name="mail" placeholder="Mail..." required pattern=".*[@].*[.].*"><br>
                <input type="password" id="passval" class="new-forms" name="pass" placeholder="Password..." required><br>
                <input type="submit" id="new-button" value="Send">
            </form>
        </div>
    </main>
</body>
</html>
