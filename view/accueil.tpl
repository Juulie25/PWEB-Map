<!doctype html>
<html lang="fr">
    <head>
        <?php include_once "./view/header.tpl" ?>
    </head>
    <body onload="init()">
        <?php include_once "./view/navbar.tpl" ?>

        <div id="choix" style="margin:15, justify-content: center ">
            <div>
                <input type="radio" id="huey" name="drone" value="huey" checked>
                <label for="huey">Huey</label>
            </div>

            <div>
                <input type="radio" id="dewey" name="drone" value="dewey">
                <label for="dewey">Dewey</label>
            </div>

            <div>
                <input type="radio" id="louie" name="drone" value="louie">
                <label for="louie">Louie</label>
            </div>

            <div id="score" style="margin:15">
            
        </div>
        <div id="mapDiv"></div>
        <div id="play">
            <p id="ques"></p>
            <button type="button" class="btn btn-info" id="nvlPartie">Commencer une nouvelle partie</button>
        </div>
    </body>
</html>

<?php echo $_SESSION['messageErr'] = ''; ?>
