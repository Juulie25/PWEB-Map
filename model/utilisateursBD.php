<?php

function getJoueur($nom, $motdepasse, &$attributs = array())
{
    require_once "./model/connectBD.php";
    $pdo = PDO();

    $sql = "SELECT * FROM joueur WHERE nomJoueur = :nom AND MotDePasse = :motdepasse";

    try {
        $cmd = $pdo->prepare($sql);
        $cmd->bindParam(":nomJoueur", $nom);
        $cmd->bindParam(":MotDePasse", $motdepasse);

        $exec = $cmd->execute();

        if ($exec) {
            $attributs = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return count($attributs) > 0;
        }
        return false;
    } catch (PDOException $e) {
        echo utf8_encode("Erreur lors de la récupération : " . $e->getMessage() . "\n");
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