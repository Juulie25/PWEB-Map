<?php
    $hostname = "localhost";	//ou localhost
	$base= "map";
	$loginBD= "root";	//ou "root"
	$passBD="";
	//$pdo = null;

try {

	$pdo = new PDO ("mysql:server=$hostname; dbname=$base", "$loginBD", "$passBD");
}

catch (PDOException $e) {
	die  ("Echec de connexion : " . $e->getMessage() . "\n");
}