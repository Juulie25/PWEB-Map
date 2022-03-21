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
    $profil = $_SESSION['profil'];
    $sql = "SELECT meilleurScore, nbParties FROM stats , joueur WHERE stats.IdJoueur = joueur.IdJoueur AND joueur.nomJoueur = '". $profil[0]['nomJoueur'] . "';";

    try{
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
        if ($bool) {
            return $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Erreur getMeilleurScore() : " . $e->getMessage() . "\n");
        die(); 
    }
}

function majStats($score){
    require("./model/connectBD.php");
    $profil = $_SESSION['profil'];
    $res = getMeilleurScore();
    $meilleurScore = $res[0]['meilleurScore'];
    $nbParties = $res[0]['nbParties'];

    $nbParties += 1; 

    if($score < $meilleurScore){
        $sql = "UPDATE stats SET nbParties =  " . $nbParties . " WHERE IdJoueur = " . $profil[0]['IdJoueur'] . ";";
    }else{
        $sql = "UPDATE stats SET meilleurScore = " . $meilleurScore . " AND nbParties =  " . $nbParties . " WHERE IdJoueur = " . $profil[0]['IdJoueur'] . ";";
    }

    try{
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
    }
    catch (PDOException $e) {
        echo utf8_encode("Erreur majStats(): " . $e->getMessage() . "\n");
        die(); 
    }
}

