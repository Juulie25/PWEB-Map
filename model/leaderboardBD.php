<?php

function getStats(){
    require("./model/connectBD.php");
    $sql = "SELECT j.nomJoueur, s.meilleurScore, s.nbParties FROM joueur j, stats s WHERE j.IdJoueur = s.IdJoueur;";
    try{
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
        if ($bool) {
            return $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
            
            /*while ($ligne = $commande->fetch()) { // ligne par ligne
                print_r($ligne);
            }*/
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }
}