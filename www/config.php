<?php
require_once '../../config/config.php';

// URL de la racine du site
$url = 'https://www.nathanfallet.me/';

// Connexion à la base de données
$bdd = new PDO('mysql:host='.getDBHost().';dbname=nathanfallet', getDBUsername(), getDBPassword(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
?>
