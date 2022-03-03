<?php

function verif_LoginBD($pseudo,$mdp,&$profil) {
    require('./model/connectBD.php');
    $sql = "SELECT * FROM joueur WHERE nomJoueur = :pseudo AND MotDePasse = :mdp";
    try{
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':pseudo', $pseudo);
		$commande->bindParam(':mdp', $mdp);
        $bool = $commande->execute();
        if ($bool) {
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
            
            /*while ($ligne = $commande->fetch()) { // ligne par ligne
                print_r($ligne);
            }*/
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }

    if (count($resultat) == 0) {
        $profil=array(); // Pour qu'il y ait quand même quelque chose...
        return false; 
    }
    else {
        $profil = $resultat;
        //var_dump($profil); die();
        return true;
    }
}

function inscription($nvSpeudo, $nvMdp){
    require("./model/connectBD.php");
    $sql = "INSERT INTO joueur(nomJoueur, MotDePasse) VALUES(:pseudo, :mdp)";
     try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':pseudo', $nvSpeudo);
        $commande->bindParam(':mdp', $nvMdp);
        $bool = $commande->execute();
    } catch (PDOException $e){
            echo utf8_encode("Echec insert into : " . $e->getMessage() . "\n") ;
            die();
    }
}















































function ajouterJoueur($nomJoueur, $MotDePasse)
{
    require_once "./model/connectBD.php";
    $pdo = PDO();

    $sql = "INSERT INTO joueur VALUES (:nomJoueur, :MotDePasse)";

    try {
        $cmd = $pdo->prepare($sql);
        $cmd->bindParam(":nomJoueur", $nomJoueur);
        $cmd->bindParam(":MotDePasse", $MotDePasse);

        return $cmd->execute();

    } catch (PDOException $e) {
        echo utf8_encode("Erreur lors de l'insertion : " . $e->getMessage() . "\n");
        die();
    }
}


function getJoueursStats(&$joueurs = array()){

    require_once "./model/connectBD.php";
    $pdo = PDO();

    $sql = "SELECT * FROM stats";

    try {
        $cmd = $pdo->prepare($sql);
        $exec = $cmd->execute();

        if ($exec) {
            $joueurs = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $joueurs; 
        }
        return false;

    } catch (PDOException $e) {
        echo utf8_encode("Erreur lors de la récupération : " . $e->getMessage() . "\n");
        die();
    }
}