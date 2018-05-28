<?php
//ha-HA time for cool comments!
function decideTier($rating){
    $tier = $rating % 50;
    $maxTier = 4; //Ändra på för att hantera antalet tiers
    if ($tier > $maxTier) {
        $tier = $maxTier;
    }
    return "status".$tier;
}
?>
