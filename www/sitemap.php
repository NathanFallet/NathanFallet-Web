<?php
// Models
require_once 'models/projects.php';

// Début du XML
header('Content-Type: text/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
// Default and home
$urls = array('');

// Projects
foreach ($projects as $dn){
	$urls[] = 'project/'.$dn['id'];
}

// Print all urls
foreach ($urls as $value) {
	echo '	<url>
        <loc>https://www.nathanfallet.me/'.$value.'</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>'."\n";
}
?>
</urlset>
