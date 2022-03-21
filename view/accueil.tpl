<!doctype html>
<html lang="fr">
    <head>
        <?php include_once "./view/header.tpl" ?>
    </head>
    <body onload="init()">
        <?php include_once "./view/navbar.tpl" ?>
        <br/>
        <div id="choix" style="text-align: center;">
            <h2>Choix du mode de jeu</h2> 
            <p>Vous pouvez choisir un mode de jeu : celui-ci définit une zone géographique dans laquelle vous devez trouver les pays.<br/>
            Par défaut, le mode de jeu est le mode Monde. </p>
            <div>
                <input type="radio" id="huey" name="drone" value="huey" checked>
                <label for="huey">Mode Monde</label>
            </div>
            <div>
                <input type="radio" id="dewey" name="drone" value="dewey">
                <label for="dewey">Mode Europe</label>
            </div>
            <div>
                <input type="radio" id="louie" name="drone" value="louie">
                <label for="louie">Louie</label>
            </div>
            <div id="score">
                <p>score</p>
            </div>
        </div>
        <div id="mapDiv"></div>
        <div id="play">
            <p id="ques"></p>
            <button type="button" class="btn btn-info" id="nvlPartie">Commencer une nouvelle partie</button>
        </div>
    </body>
</html>

<?php echo $_SESSION['messageErr'] = ''; ?>
