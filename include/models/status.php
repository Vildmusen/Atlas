<?php
//ha-HA time for cool comments!
function decideTier($rating){
    $tier = round($rating / 50);
    $maxTier = 2; //Ändra på för att hantera antalet tiers
    if ($tier > $maxTier) {
        $tier = $maxTier;
    }
    else if ($tier < 0) {
        $tier = 0;
    }
    return "status".$tier;
}

function showTier($rating){
    $tier = round($rating / 50);
    $maxTier = 2; //Ändra på för att hantera antalet tiers
    if ($tier > $maxTier) {
        $tier = $maxTier;
    }
    else if ($tier < 0) {
        $tier = 0;
    }
    if($tier == -0){
        return "Dansk";
    }

    if ($tier == 0){
        return "Småsvensk";
    }
    if ($tier == 1){
        return "Lagomsvensk";
    } else {
        return "Supersvensk";
    }
}
?>
