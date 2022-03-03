<?php

function affichage(){
    require("./view/connexion.tpl");
}

function connexion(){
    require("./model/utilisateursBD.php");
    $pseudo=isset($_POST['pseudo'])?trim($_POST['pseudo']):''; // trim pour enlever les espaces avant et apres
    $mdp=isset($_POST['password'])?trim($_POST['password']):'';
	$msg='';
    if(verif_LoginBD($pseudo,$mdp,$profil)){
        $_SESSION['profil'] = $profil;
        $nexturl = "index.php?controle=partie&action=accueil";
        header ("Location:" . $nexturl);
    } else{
        $msg = "Utilisateur inconnu !";
        $nexturl = "index.php?controle=utilisateur&action=affichage";
        header ("Location:" . $nexturl);
    }
}

function deconnexion(){
    session_unset();
    $url = "index.php?controle=partie&action=accueil";
    header("Location:" . $url);
}