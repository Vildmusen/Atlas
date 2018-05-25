<!DOCTYPE html>

<html>
    <?php
        ini_set('display_errors', 'On');
        error_reporting(E_ALL | E_STRICT);
        include 'include/bootstrap.php';
        include 'include/views/nav-no-city.php';

        if (!isset($_GET['post'])){ //behöver säkrare koll på vad som skickas med.
            header('location: main.php');
        }
    ?>
<body>

    <main role="main" class="container" id="wrapper_report">

        <div class="container" id="report_box">
            <h2>Anmälningsformulär</h2>
            <p>Anmäl endast inlägg som bryter mot Atlas användarvillkor!</p>
            <div class="report_form">
                <form name="report_form" action="report_process.php" method="post">
                <select id="reportselect" name="reason" required class="report_form">
                    <option value="" selected disabled hidden>Välj...</option>
                    <?php
                        $stmt = getReason();
                        var_dump($stmt);
                        while($rows = $stmt->fetch_assoc()){
                            echo '<option value="'.$rows["reason"].'">'.$rows["reason"].'</option>';
                        }
                    ?>
                </select>
                <?php
                    $post = getpostfromid($_GET['post'])-> fetch_assoc();
                    echo '
                        <div class="comment_report">
                            <div class="height_wrapper">
                                <div class="breadtext">
                                    <h3> '.$post['title'].'</h3>
                                    <p> '.$post['description'].'</p>
                                </div>

                                <div class="creator"><h4>'.getuser($post['u_id'])['name'].'</h4></div>
                                <div class="timestamp"><h4>'.$post['date'].'</h4></div>
                            </div>
                        </div>
                        <input type="hidden" value="'.$post['p_id'].'" name="hidden_id">
                        <input type="hidden" value="'.$post['l_id'].'" name="hidden_location">';
                ?>
                <input type="submit" value="Skicka anmälan" id="new-button">
                </form>
            </div>
        </div>
    </main>
</body>
</html>
