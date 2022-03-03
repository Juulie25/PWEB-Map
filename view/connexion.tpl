<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
</head>
<body>
<form action="index.php?controle=utilisateur&action=connexion" method="post">
  <label for="pseudo">Pseudo</label><br>
  <input type="text" id="pseudo" name="pseudo"><br>
  <label for="password">Mot de passe</label><br>
  <input type="text" id="password" name="password">
  <input type="submit" value="Valider">
</form>
<div id="msg"><?php echo $_SESSION['messageErr']; $_SESSION['messageErr'] = '' ?></div>

</body>
</html>