<?php

function getStats(){
    require("./model/connectBD.php");
    $sql = "SELECT j.nomJoueur, s.meilleurScore, s.nbParties FROM joueur j, stats s WHERE j.IdJoueur = s.IdJoueur;";
    try{
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
        if ($bool) {
            return $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die();
    }
}

function getMeilleurScore(){
    require("./model/connectBD.php");
    $sql = "SELECT meilleurScore, nbParties FROM stats , joueur WHERE stats.IdJoueur = joueur.IdJoueur AND joueur.nomJoueur ="+ $_SESSION['profil']['nomJoueur'] +";";

    try{
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
        if ($bool) {
            return $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); 
    }
}

//la fonction est appelée quand le joueur perd/fini sa partie 
function majStats($score){
    require("./model/connectBD.php");

    $res = getMeilleurScore();
    $meilleurScore = $res[0];
    $nbParties = $res[1];

    $nbParties += 1; 

    if($score > $meilleurScore){
        $sql = "INSERT INTO stats(IdJoueur, meilleurScore, nbParties) VALUES ("+$_SESSION['profil']['IdJoueur']+", "+$score+", "+$nbParties+");";
    }else{
        $sql = "INSERT INTO stats(IdJoueur, meilleurScore, nbParties) VALUES ("+$_SESSION['profil']['IdJoueur']+", "+$meilleurScore+", "+$nbParties+");";
    }

    try{
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); 
    }
}

