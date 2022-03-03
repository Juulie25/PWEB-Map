<?php

function connexion(){

    $nom = isset($_POST["pseudo"]) ? $_POST["pseudo"] : NULL;
    $motdepasse = isset($_POST["password"]) ? $_POST["password"] : NULL;

    if (isset($nom, $motdepasse)) {
        require_once "./model/utilisateursBD.php";
        if(getJoueur($nom, $motdepasse, $attributs)){
            $_SESSION["joueur"] = $attributs[0];
            header("Location: index.php");
        }
        else{
            $erreur = "Identifiants invalides";
            require "./view/connexion.tpl";
        }
    } else {
        $erreur = NULL;
        require "./view/connexion.tpl";
    }
}

function inscription()
{
    $nom = isset($_POST["nom"]) ? $_POST["nom"] : NULL;
    $mail = isset($_POST["mail"]) ? $_POST["mail"] : NULL;
    $motdepasse = isset($_POST["motdepasse"]) ? $_POST["motdepasse"] : NULL;
    $societe = isset($_POST["societe"]) ? $_POST["societe"] : NULL;

    require_once "./model/entreprise_bd.php";
    getEntreprises($entreprises);

    if (isset($nom, $mail, $motdepasse, $societe)) {
        if (champsValides($nom, $mail, $motdepasse, $societe)) {

            // Insérer nouveau client dans BDD
            require_once "./model/utilisateur_bd.php";
            if (ajouterUtilisateur($nom, $mail, $motdepasse, $societe)) {

                // Créer la session PHP
                $_SESSION["utilisateur"] = array();

                // Récupérer l'utilisateur en BDD
                getUtilisateur($mail, $motdepasse, $attributs);
                $_SESSION["utilisateur"] = $attributs[0];

                header("Location: index.php");
            } else {
                $erreur = "Échec de l'inscription, veuillez recommencer";
                require "./view/utilisateur/inscription.tpl";
            }
        } else {
            $erreur = "Saisie invalide, veuillez recommencer";
            require "./view/utilisateur/inscription.tpl";
        }
    } else {
        $erreur = NULL;
        require "./view/utilisateur/inscription.tpl";
    }
}

function deconnexion()
{
    session_unset();
    require_once "./view/utilisateur/deconnexion.tpl";
    header("refresh:3, url=index.php");
}