<?php
session_start();

// Calcul de la page
$page = 'home';
if (isset($_GET['page']) && !empty($_GET['page'])) {
	$page = $_GET['page'];
}
if (!file_exists('controllers/'.$page.'.php')) {
	$page = '404';
	http_response_code(404);
}

// Traitement de la page
require_once('controllers/'.$page.'.php');
