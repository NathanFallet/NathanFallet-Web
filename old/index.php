<?php

$to = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(isset($_SERVER['HTTP_REFERER'])){
  $from = $_SERVER['HTTP_REFERER'];
  error_log("Access to $to from $from\n", 3, "/var/www/nathanfallet.me/old/logs.log");
}

$url = "https://www.nathanfallet.me/";

$params = parse_url($to);
$oks = array('pickfalling', 'brocstock', 'delta', 'replica', 'replicapicturemaker', 'extopy', 'craftsearch', 'zabripermission', 'plugncraft');

foreach ($params as $value) {
  foreach ($oks as $ok) {
    if(strpos($value, $ok) !== false){
      $url = "https://www.nathanfallet.me/project/$ok";
    }
    if(strpos($value, 'checkforupdate') !== false){
      echo '';
      exit;
    }
  }
}

header('location: '.$url);
?>
