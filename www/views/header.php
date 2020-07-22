<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, viewport-fit=cover">
  <meta name="Revisit-After" content="2 days">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@NathanFallet">
  <?php
  if (isset($title)) {
    echo '<meta property="og:title" content="' . $title . ' - Nathan Fallet">
  <meta name="twitter:title" content="' . $title . ' - Nathan Fallet">';
  }
  echo '<title>';
  if (isset($title)) {
    echo $title . ' - Nathan Fallet';
  } else {
    echo 'Nathan Fallet';
  }
  echo '</title>';
  if (isset($description)) {
    echo '<meta name="description" content="' . $description . '">
  <meta property="og:description" content="' . $description . '">
  <meta name="twitter:description" content="' . $description . '">';
  }
  ?>
  <meta property="og:image" content="/img/logo.jpg">
  <meta name="twitter:image" content="/img/logo.jpg">
  <link rel="icon" type="image/png" href="/img/logo.jpg">
  <link rel="apple-touch-icon" href="/img/logo.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <!-- Global CSS -->
  <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Plugins CSS -->
  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
  <!-- Theme CSS -->
  <link id="theme-style" rel="stylesheet" href="/css/styles.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?php
  if (isset($data)) {
    foreach ($data as $item) {
      echo '<script type="application/ld+json">
		' . $item . '
		</script>';
    }
  }
  ?>
</head>

<body>
  <!-- ******HEADER****** -->
  <header class="header">
    <div class="container clearfix">
      <img class="profile-image img-fluid float-left" src="/img/logo.jpg" alt="ZabriCraft" width="180px;" />
      <div class="profile-content float-left">
        <h1 class="name">Nathan Fallet</h1>
        <h2 class="desc">Web/Java/Swift developer</h2>
        <ul class="social list-inline">
          <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCHVIGHM-gDwLnzuM1YQrHeA" target="_blank"><i class="fab fa-youtube"></i></a></li>
          <li class="list-inline-item"><a href="https://twitter.com/NathanFallet" target="_blank"><i class="fab fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="https://www.instagram.com/nathanfallet/" target="_blank"><i class="fab fa-instagram"></i></a></li>
          <li class="list-inline-item"><a href="https://github.com/NathanFallet" target="_blank"><i class="fab fa-github"></i></a></li>
        </ul>
      </div>
      <!--//profile-->
      <a class="btn btn-cta-primary float-right" href="mailto:contact@nathanfallet.me"><i class="fas fa-paper-plane"></i> Contact Me</a>
    </div>
    <!--//container-->
  </header>
  <!--//header-->