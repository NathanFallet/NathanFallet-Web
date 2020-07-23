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
if ($project['type'] == 'redirect') {
	header('location: ' . $project['data']);
	exit;
}
$title = $project['name'];
$description = $project['description_little'];
$data = array('{
	  "@context": "http://schema.org",
	  "@type": "BreadcrumbList",
	  "itemListElement": [{
	    "@type": "ListItem",
	    "position": 1,
	    "name": "Home",
	    "item": "https://www.nathanfallet.me/"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "' . $project['name'] . '",
    "item": "https://www.nathanfallet.me/project/' . $project['id'] . '"
  }]
}');
if ($project['type'] == 'app') {
	$system = '';
	$values = explode(';', $project['data']);
	if (!empty($values[0])) {
		$system = 'Android';
	}
	if (!empty($values[1])) {
		$system .= (empty($system) ? '' : ', ') . 'iOS';
	}
	$data[] = '{
	  "@context": "http://schema.org",
	  "@type": "MobileApplication",
	  "name": "' . $project['name'] . '",
	  "operatingSystem": "' . $system . '",
	  "offers": {
	    "@type": "Offer",
	    "price": "0",
	    "priceCurrency": "EUR"
	  }
	}';
}

// Views
require_once 'views/header.php';
require_once 'views/project.php';
require_once 'views/footer.php';
