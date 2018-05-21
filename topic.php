<?php
include 'include/bootstrap.php';

// if(!isset($_GET["t_id"])){
//     header("Location: index.php");
// }

$stmt = getcomments();
$id = $_GET["t_id"];
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
                        <a class="nav-link" href="main.php">Utforska<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="omoss.php">Om oss</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <a name="topOfPage"></a>
        <?php
        echo '<label>[</label><a href="thread.php?id='.$id.'#bottomOfPage" class="likeabutton">Bottom</a><label>]</label>';
        ?>
        <div id="flow">
            <?php
                while($rows = $stmt->fetch_assoc()){
                    if ($rows["parent"] == $id){
                        if ($rows["parent"] == $rows["t_id"]){
                            echo '<div class="flowparent"><label>'.$rows["title"]."</label> ".$rows["mail"]." (".$rows["date"].") No.";
                            echo '<a href="javascript:addToComment('.$rows["t_id"].');" name="'.$rows["t_id"].'" class="liketext" >'.$rows["t_id"].'</a>';
                        } else {
                            echo '<div class="flowchild"><input type="checkbox" class= "check" name="'.$rows["t_id"].'"/> ';
                            echo $rows["name"]." ".$rows["mail"]." (".$rows["date"].") No.";
                            echo '<a href="javascript:addToComment('.$rows["t_id"].');" name="'.$rows["t_id"].'" class="liketext" >'.$rows["t_id"].'</a>';
                        }
                        echo '<div class="innerchild"><pre>'.$rows["description"].'</pre></div>';
                        echo '</div>';
                        echo '<div class="vote_wrapper"><div class="arrow_up"></div><div class="vote_value"><p>137</p></div><div class="arrow_down"></div></div>';
                        echo '<div class="creator"><h4>'.getuser($rows["poster_id"]).'</h4></div>';
                        echo '<div class="timestamp"><h4>'.$rows["date"].'</h4></div>';
                    }
                }
            ?>
        </div>
        <a name="bottomOfPage"></a>
        <div id="form">
            <label id="reply">Reply to thread</label>
            <?php
            echo $id;
            echo '<form name="commForm" action="process.php?id='.$id.'" method="post" onsubmit="return validateForm()">';
            ?>
                <?php
                if(isset($_SESSION["mail"])){
                    echo 'Mail: <input type="hidden" class="fields" name="mail" value="'.$_SESSION['mail'].'">'.$_SESSION['mail'].'</input><br>';
                } else {
                    echo '<input type="email" class="fields" name="mail" placeholder="Mail..." required pattern=".*[@].*[.].*"><br>';
                }
                ?>
                <input type="text" id="field-name" class="fields" name="name" placeholder="Name..." required><br>
                <textarea rows="10" id="field-text" cols="30" wrap="soft" class="fields" name="text" placeholder="Text..." required></textarea><br>
                <input type="submit" id="send-button" value="Send">
                <label id="err">Fields cannot be empty!</label>
                <input type="hidden" name="type" value="comment"/>
            </form>
        </div>
        <?php
        echo '<label>[</label><a href="thread.php?id='.$id.'#topOfPage" class="likeabutton">Top</a><label>]</label>';
        ?>
    </body>
</html>
