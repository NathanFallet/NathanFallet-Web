<?php
header('Content-Type: text/xml; charset=UTF-8');
require 'config.php';
echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
// Default and home
$urls = array('');

// Projects
$sql = $bdd->query("SELECT id FROM projects");
while($dn = $sql->fetch()){
	$urls[] = 'project/'.$dn['id'];
}

// Print all urls
foreach ($urls as $value) {
	echo '	<url>
        <loc>'.$url.$value.'</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>'."\n";
}
?>
</urlset>
