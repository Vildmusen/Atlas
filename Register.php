<!DOCTYPE html>

<html>
  <head>
      <title>Register</title>
      <link rel="stylesheet" href="assets/css/style.css">
      <meta charset="utf-8">
      <script src="assets/js/script.js"></script>
  </head>
  <body>
    <div id="container">
        <div id="header">
            <h1>Register</h1>
        </div>
        <div id="form">
            <form method="post" action="" name="registerForm">
                <input type="text" placeholder="Användarnamn" class="Register">
                <select name="stad" required class="Register">
                    <option value="">Hemstad...</option>
                    <?php
                    $db = new PDO("mysql:host=localhost;dbname=Atlas", 'root', '');
                    $stmt = $db->query("SELECT * from Cities");
                    $db = NULL;
                        while($rows = $stmt->fetch()){
                            echo "<option value=".$rows['City'].">".$rows['City']."</option>";
                        }
                    ?>
                </select>
                <input type="text" placeholder="Email" class="Register"><br>
                <input type="password" placeholder="Password" class="Register"><br>
                <input type="password" placeholder="Confirm Password" class="Register"><br>
                <input type="button" value="Submit" name="registerBtn">
            </form>
        </div>

    </div>

  </body>
</html>
