<?php
include 'include/bootstrap.php';
if(isset($_SESSION["u_id"])){
  $stmt = getReportedPost();
  if($stmt->fetch_assoc() == NULL){
    reportPost();
    echo '<h1>Tack för ditt bidrag till en trevligare användarupplevelse!</h1>';
    header("Refresh: 2, URL=main.php?c_id=".$_POST['hidden_location']);
  } else echo '<h1>Du har redan anmält detta inlägg.</h1>';
            header ("Refresh: 2, URL=main.php?c_id=".$_POST["hidden_location"]."");
} else echo '<h1>Du måste vara inloggad för att kunna anmäla inlägg.</h1>';
    header("Refresh: 2, URL=login.php");

?>
