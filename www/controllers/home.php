<?php
// Page information
$title = 'Home';
$description = 'Nathan Fallet - Developer - contact@nathanfallet.me';
$data = array('{
  "@context": "http://schema.org",
  "@type": "Person",
  "name": "Nathan Fallet",
  "description": "Web/Java/Swift developer",
  "url": "https://www.nathanfallet.me/",
  "email": "contact@nathanfallet.me",
  "image": "https://www.nathanfallet.me/img/logo.png",
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
    "item": "https://www.nathanfallet.me/"
  }]
}');

// Page models
require_once 'models/projects.php';

// Page views
require_once 'views/header.php';
require_once 'views/home.php';
require_once 'views/footer.php';
