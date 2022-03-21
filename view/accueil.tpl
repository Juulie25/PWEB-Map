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
                <input type="radio" id="monde" name="drone" value="monde" checked>
                <label for="monde">Mode Monde</label>
            </div>
            <div>
                <input type="radio" id="europe" name="drone" value="europe">
                <label for="europe">Mode Europe</label>
            </div>
            <div id="score" style="margin:15"></div>
        </div>
        
        

        <div id="mapDiv"></div>
        <div id="play">
            <p id="ques"></p>
            <button type="button" class="btn btn-info" id="nvlPartie" data-popup-ref="fin">Commencer une nouvelle partie</button>
        </div>

        <div class="popup" data-popup-id="fin">
            <div class="popup-content">
                 <h2>Partie finie</h2>
                 <p>Voici votre score final : </p>
                 <!-- score a ajouter-->
                 <button type="button" class="btn cancel" data-dismiss-popup>Fermer</button>
            </div>
        </div>
    </body>
</html>

<?php echo $_SESSION['messageErr'] = ''; ?>
