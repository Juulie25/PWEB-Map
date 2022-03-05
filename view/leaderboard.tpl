<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Leaderboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./view/css/leaderboard.css">
    </head>
    <body>
        <div id="leaderboard">
            <h1>LeaderBoard</h1>
            <table>
                <tr><th>Pseudo</th><th>Meilleur score</th><th>Nombre de parties jouées</th></tr> 
                <?php
                    foreach($tableau as $joueurs){
                        printf('<tr><th> %s </th><th> %d </th><th> %d </th></tr>', $joueurs["nomJoueur"], $joueurs["meilleurScore"], $joueurs["nbParties"]);
                    }
                ?>
            </table>
            <a href="index.php" class="btn btn-info" id="retourAcc">Retour à l'accueil</a>
        </div>
    </body>
</html>