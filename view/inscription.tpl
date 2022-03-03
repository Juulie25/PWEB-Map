<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
</head>
<body>
<form action="index.php?controle=utilisateur&action=inscriptionJoueur" method="post">
  <label for="pseudo">Nouveau pseudo</label><br>
  <input type="text" id="pseudo" name="pseudo"><br>
  <label for="password">Votre mot de passe</label><br>
  <input type="text" id="password" name="password">
  <input type="submit" value="Valider">
  <div class="msg"><?php echo $_SESSION['messageErr']; echo $_SESSION['messageErr'] = ''; ?></div>
</form>



</body>
</html>