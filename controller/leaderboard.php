<?php

function afficherLeaderboard(){
    require("./model/leaderboardBD.php");
    $tableau = getStats();
    require_once "./view/leaderboard.tpl";
}

function getScore(){
    $profil = $_SESSION['profil'];
    $score = $profil[0]['score'];
    require("./model/leaderboardBD.php");
    majStats($score);
    require_once "./view/accueil.tpl";
}