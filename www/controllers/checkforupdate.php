<?php
// Check for params
if (!isset($_GET['id']) || !isset($_GET['version'])) {
	echo '&c[Updater] Error: Malformed request!';
	exit;
}

// Models
require_once 'models/projects.php';

// Get page data
foreach ($projects as $dn) {
	if ($dn['id'] == $_GET['id']) {
		$project = $dn;
	}
}

// Get project
if (!$project) {
	echo '&c[Updater] Unknown project ' . $_GET['id'] . '!';
	exit;
} else {
	if ($_GET['version'] != $project['version']) {
		echo '&6' . $project['name'] . ' v.' . $project['version'] . ' is now available!
&ehttps://www.nathanfallet.me/project/' . $project['id'];
	}
}
