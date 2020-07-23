<?php
// Models
require_once 'models/projects.php';

// Get page data
if (!isset($_GET['id'])) {
    header('location: https://www.nathanfallet.me/');
    exit;
}
foreach ($projects as $dn) {
    if ($dn['id'] == $_GET['id']) {
        $project = $dn;
    }
}
if (!isset($project)) {
	header('location: https://www.nathanfallet.me/');
	exit;
}
$type = $project['type'];
$data = $project['data'];

// Redirect
if ($type == 'link' || $type == 'redirect') {
    header('location: ' . $data);
    exit;
}

// Download
if ($type == 'file') {
    $filename = dirname(__FILE__) . '/../files/' . $data;
    if (!is_file($filename) || !is_readable($filename)) {
        echo 'UNABLE TO FIND THE FILE';
        exit;
    }
    $size = filesize($filename);

    // désactive la mise en cache
    header('Cache-Control: no-cache, must-revalidate');
    header('Cache-Control: post-check=0,pre-check=0');
    header('Cache-Control: max-age=0');
    header('Pragma: no-cache');
    header('Expires: 0');

    // force le téléchargement du fichier avec un beau nom
    header('Content-Type: application/force-download');
    header('Content-Disposition: attachment; filename="' . $data . '"');

    // indique la taille du fichier à télécharger
    header('Content-Length: ' . $size);

    // envoi le contenu du fichier
    readfile($filename);
}
