<!DOCTYPE html>
<html>
<head>
<?php include_once "./view/header.tpl" ?>
<title>Inscription</title>
<link rel="stylesheet" href="./view/css/connect.css">
</head>
<body>
    <div id="connect">
        <h1>Inscription</h1>
        <p>Inscrivez-vous pour avoir accès à toutes les fonctionnalités du jeu</p>
        <form action="index.php?controle=utilisateur&action=inscriptionJoueur" method="post">
            <label class="label" for="pseudo">Nouveau pseudo</label><br>
            <input class="input" type="text" id="pseudo" name="pseudo"><br>
            <label class="label" for="password">Votre mot de passe</label><br>
            <input class="input" type="text" id="password" name="password"><br>
            <input class="input" id="submit" type="submit" value="Valider">
        </form>
    </div>
  <div class="msg"><?php echo $_SESSION['messageErr']; echo $_SESSION['messageErr'] = ''; ?></div>
</body>
</html>