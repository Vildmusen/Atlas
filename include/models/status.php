<?php
//ha-HA time for cool comments!
function decideTier($rating){
    $tier = round($rating / 50);
    $maxTier = 2; //Ändra på för att hantera antalet tiers
    if ($tier > $maxTier) {
        $tier = $maxTier;
    }
    return "status".$tier;
}

function showTier($rating){
    $tier = round($rating / 50);
    $maxTier = 2; //Ändra på för att hantera antalet tiers
    if ($tier > $maxTier) {
        $tier = $maxTier;
    }
    if ($tier == 0){
        return "pleb";
    } 
    if ($tier == 1){
        return "Lagomsvensk";
    } else {
        return "Supersvensk";
    }
}
?>
