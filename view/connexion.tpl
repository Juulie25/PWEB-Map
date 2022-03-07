<!DOCTYPE html>
<html>
<head>
    <?php include_once "./view/header.tpl" ?>
    <title>Connexion</title>
    <link rel="stylesheet" href="./view/css/connect.css">
</head>
<body>
    <div id="connect">
        <h1>Connexion</h1>
        <p>Pour accéder au jeu, connectez-vous</p>
        <form action="index.php?controle=utilisateur&action=connexion" method="post">
          <label class="label" for="pseudo">Pseudo</label><br>
          <input class="imput" type="text" id="pseudo" name="pseudo"><br>
          <label class="label" for="password">Mot de passe</label><br>
          <input class="input" type="text" id="password" name="password"><br>
          <input class="input" id="submit" type="submit" value="Valider">
        </form>
    </div>
    <div id="msg"><?php echo $_SESSION['messageErr']; $_SESSION['messageErr'] = '' ?></div>

</body>
</html>