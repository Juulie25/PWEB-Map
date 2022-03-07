<!doctype html>
<html lang="fr">
    <head>
        <?php include_once "./view/header.tpl" ?>
    </head>
    <body onload="init()">
        <?php include_once "./view/navbar.tpl" ?>
        <div id="mapDiv"></div>
        <div id="play">
            <p id="ques"></p>
            <button type="button" class="btn btn-info" id="nvlPartie">Commencer une nouvelle partie</button>
        </div>
    </body>
</html>

<?php echo $_SESSION['messageErr'] = ''; ?>
