<?php
session_start();

// Définitions des variables nécessaires
require('config.php');
$page = 'home';
if(isset($_GET['page']) && !empty($_GET['page'])){
	$page = $_GET['page'];
}
if(!file_exists('views/'.$page.'.php') || !file_exists('models/'.$page.'.php')){
	$page = '404';
	http_response_code(404);
}

// Traitement de la page
require_once('models/'.$page.'.php');

// Header de la page
?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, viewport-fit=cover">
  <meta name="Revisit-After" content="2 days">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@NathanFallet">
<?php
if(isset($title)){
  echo '<meta property="og:title" content="'.$title.' - Nathan Fallet">
  <meta name="twitter:title" content="'.$title.' - Nathan Fallet">';
}
echo '<title>';
if(isset($title)){
  echo $title.' - Nathan Fallet';
}else{
  echo 'Nathan Fallet';
}
echo '</title>';
if(isset($description)){
  echo '<meta name="description" content="'.$description.'">
  <meta property="og:description" content="'.$description.'">
  <meta name="twitter:description" content="'.$description.'">';
}
?>
  <meta property="og:image" content="<?php echo $url; ?>img/logo.jpg">
  <meta name="twitter:image" content="<?php echo $url; ?>img/logo.jpg">
  <link rel="icon" type="image/png" href="<?php echo $url; ?>img/logo.jpg">
  <link rel="apple-touch-icon" href="<?php echo $url; ?>img/logo.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <!-- Global CSS -->
  <link rel="stylesheet" href="<?php echo $url; ?>plugins/bootstrap/css/bootstrap.min.css">
  <!-- Plugins CSS -->
  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
  <!-- Theme CSS -->
  <link id="theme-style" rel="stylesheet" href="<?php echo $url; ?>css/styles.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<?php
if(isset($data)){
	foreach ($data as $item) {
		echo '<script type="application/ld+json">
		'.$item.'
		</script>';
	}
}
?>
</head>

<body>
    <!-- ******HEADER****** -->
    <header class="header">
        <div class="container clearfix">
            <img class="profile-image img-fluid float-left" src="<?php echo $url; ?>img/logo.jpg" alt="ZabriCraft" width="180px;" />
            <div class="profile-content float-left">
                <h1 class="name">Nathan Fallet</h1>
                <h2 class="desc">Web/Java/Swift developer</h2>
                <ul class="social list-inline">
										<li class="list-inline-item"><a href="https://www.youtube.com/channel/UCHVIGHM-gDwLnzuM1YQrHeA" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    <li class="list-inline-item"><a href="https://twitter.com/NathanFallet" target="_blank"><i class="fab fa-twitter"></i></a></li>
										<li class="list-inline-item"><a href="https://www.instagram.com/nathanfallet/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div><!--//profile-->
						<a class="btn btn-cta-primary float-right" href="mailto:contact@nathanfallet.me"><i class="fas fa-paper-plane"></i> Contact Me</a>
          </div><!--//container-->
    </header><!--//header-->
<?php
require_once('views/'.$page.'.php');
?>
    <!-- ******FOOTER****** -->
    <footer class="footer">
        <div class="container text-center">
                <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div><!--//container-->
    </footer><!--//footer-->

    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo $url; ?>plugins/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>plugins/jquery-rss/dist/jquery.rss.min.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="<?php echo $url; ?>js/main.js"></script>
</body>
</html>
