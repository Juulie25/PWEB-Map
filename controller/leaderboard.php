<?php

function afficherLeaderboard(){
    require("./model/leaderboardBD.php");
    $tableau = getStats();
    require_once "./view/leaderboard.tpl";
}

//pendant la partie, le score estincrémenté à chaque coup (à faire)
//lorsque la partie se finie, le score final est stocké dans la variable de session 
//appeler la fonction getScore dans le js
//soit via une redirection (afficher une nouvelle page) soit via une requete ajax 

function getScore(){
    $score = $_SESSION['profil']['score']; 
    require("./model/leaderboardBD.php");
    majStats($score); 
}