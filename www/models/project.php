<?php
if(isset($_GET['id'])){
	$sql = $bdd->prepare("SELECT * FROM projects WHERE id = ?");
	$sql->execute(array($_GET['id']));
	$project = $sql->fetch();
	if(!$project){
		header('location: '.$url);
		exit;
	}
	if($project['type'] == 'redirect'){
		header('location: '.$project['data']);
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
	    "item": "'.$url.'"
	  },{
	    "@type": "ListItem",
	    "position": 2,
	    "name": "'.$project['name'].'",
	    "item": "'.$url.'project/'.$project['id'].'"
	  }]
	}');
	if($project['type'] == 'app') {
		$system = '';
		$values = explode(';', $project['data']);
		if(!empty($values[0])){
			$system = 'Android';
		}
		if(!empty($values[1])){
			$system .= (empty($system) ? '' : ', ').'iOS';
		}
		$data[] = '{
		  "@context": "http://schema.org",
		  "@type": "MobileApplication",
		  "name": "'.$project['name'].'",
		  "operatingSystem": "'.$system.'",
		  "offers": {
		    "@type": "Offer",
		    "price": "0",
		    "priceCurrency": "EUR"
		  }
		}';
	}
}
?>
