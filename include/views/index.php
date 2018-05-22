<html>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

        <a class="navbar-brand" href="#">Atlas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Hem <span class="sr-only">(current)</span></a>
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
            <h2>Välkommen!</h2>
            <p>Välkommen till Atlas, din plattform för att utforska Sverige! Navigera sidan anonymt eller registrera dig och logga in för att ta del av samtliga funktioner.</p>
        </div>

        <div class="conatiner" id="link_box">
            <a href="login.php"><button class="btn btn-block">Logga in</button></a>
            <a href="register.php"><button class="btn btn-block">Registrera</button></a>
            <a href="main.php"><button class="btn btn-block" id="center_button">Utforska</button></a>
        </div>
    </main>
</body>
</html>
