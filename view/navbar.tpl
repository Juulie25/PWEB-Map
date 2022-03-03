<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-right" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="index.php?controle=leaderboard&action=afficherPage">Leaderboard</a>
            </div>
        </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <?php
                if (!isset($_SESSION["profil"])) {
                    echo '<a class="nav-link" aria-current="page" href="index.php?controle=utilisateur&action=inscription">Inscription</a>';
                    echo'<a class="nav-link" aria-current="page" href="index.php?controle=utilisateur&action=affichage">Connexion</a>';
                }
                else{
                    echo '<a class="nav-link" aria-current="page" href="index.php?controle=utilisateur&action=deconnexion">Déconnexion</a>';
                }
            ?>
          
        </div>
      </div>
    </div>
</nav>