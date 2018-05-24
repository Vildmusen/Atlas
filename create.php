<?php
include 'include/bootstrap.php';
include 'include/views/nav-no-city.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

if(!isset($_SESSION["u_id"])){
    header("Location: index.php");
}

if (isset($_GET['c_id'])){ //behöver säkrare koll på vad som skickas med.
    $location = $_GET['c_id'];
} else {
    $location = 1;
}
?>

<html>
<body>
    <div id="create_wrapper">
        <div class="topic">
            <form name="commForm" action="process.php" method="post" onsubmit="return validateForm()">
                
                <div id="input_field">
                    <h3>Skapa fråga:</h3>
                    <input type="text" id="field-title" class="fields" name="title" placeholder="Titel" required>
                    <textarea rows="10" id="field-text-create" cols="30" wrap="soft" class="fields" name="description" placeholder="Text..." required></textarea>
                    
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
                </div> 
            </form>
        </div>
    </div>
</body>
</html>
