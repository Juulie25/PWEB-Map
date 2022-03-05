<?php

session_start();
if (isset($_GET["controle"], $_GET["action"])) {
    $controle = $_GET["controle"];
    $action = $_GET["action"];
} else {
    $controle = "partie";
    $action = "accueil";
}

require_once "./controller/$controle.php";
$action();