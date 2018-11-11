<?php
$title = 'Home';
$description = 'Nathan Fallet - Developer - contact@nathanfallet.me';
$data = array('{
  "@context": "http://schema.org",
  "@type": "Person",
  "name": "Nathan Fallet",
  "description": "Web/Java/Swift developer",
  "url": "'.$url.'",
  "email": "contact@nathanfallet.me",
  "image": "'.$url.'img/logo.png",
  "sameAs": [
    "https://www.youtube.com/channel/UCHVIGHM-gDwLnzuM1YQrHeA",
    "https://twitter.com/NathanFallet",
    "https://www.instagram.com/nathanfallet/"
  ]
}','{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Home",
    "item": "'.$url.'"
  }]
}');
?>
