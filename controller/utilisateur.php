<?php
function affichage(){
    require("./view/connexion.tpl");
}

function affichageIns(){
    require("./view/inscription.tpl");
}

function connexion(){
    require("./model/utilisateursBD.php");
    $pseudo=isset($_POST['pseudo'])?trim($_POST['pseudo']):''; // trim pour enlever les espaces avant et apres
    $mdp=isset($_POST['password'])?trim($_POST['password']):'';
    $_SESSION['messageErr'] = '';
    if(verif_LoginBD($pseudo,$mdp,$profil)){
        $_SESSION['profil'] = $profil;
        $nexturl = "index.php?controle=partie&action=accueil";
        header ("Location:" . $nexturl);
    } else{
        $_SESSION['messageErr'] = "Utilisateur inconnu !";
        $nexturl = "index.php?controle=utilisateur&action=affichage";
        header ("Location:" . $nexturl);
    }
}

function inscriptionJoueur(){
    require("./model/utilisateursBD.php");
    $pseudo=isset($_POST['pseudo'])?trim($_POST['pseudo']):'';
	$mdp=isset($_POST['password'])?trim($_POST['password']):'';
    if(!verif_LoginBD($pseudo,$mdp,$profil)){
        inscription($pseudo, $mdp);
        $nexturl = "index.php?controle=partie&action=accueil";
		header("Location:" . $nexturl);
    } else {
        $_SESSION['messageErr'] = 'Utilisateur déjà existant ! ';
        $nexturl = "index.php?controle=utilisateur&action=affichageIns";
		header("Location:" . $nexturl);
    }
}

function deconnexion(){
    session_unset();
    $url = "index.php?controle=partie&action=accueil";
    header("Location:" . $url);
}