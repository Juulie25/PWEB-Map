<?php

function afficherLeaderboard(){
    require("./model/leaderboardBD.php");
    $tableau = getStats();
    //var_dump($tableau);
    require_once "./view/leaderboard.tpl";
}