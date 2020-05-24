<?php
function cmp($a, $b) {
    if ($a['last_update'] == $b['last_update']) {
        return 0;
    }
    return ($a['last_update'] > $b['last_update']) ? -1 : 1;
}
?>
<div class="container sections-wrapper">
	<div class="row">
		<div class="primary col-lg-8 col-12">
      <section class="about section">
          <div class="section-inner">
              <h2 class="heading">About Me</h2>
              <div class="content">
                  <p>I'm Nathan, and I code since I was 10.</p>
                  <p>I started with some HTML projects (we all have to start with something), and then I worked a lot with PHP until I discovered Java and started making Minecraft Plugins for servers with friends.</p>
                  <p>When I was 14, I joined friends to make projects with them. Now, we are working as <a href="https://www.groupe-minaste.org/">Groupe MINASTE</a> on the web, creating website and apps for Android and iOS.</p>
                  <p>Check my amazing project list below!</p>
              </div>
          </div>
      </section>
			<section class="latest section">
				<div class="section-inner">
          <h2 class="heading">My projects</h2>
          <div class="content">
            <?php
            $sql = $bdd->query("SELECT id, name, description_little, last_update, img FROM projects ORDER BY last_update DESC");
            $first = true;
            while($dn = $sql->fetch()){
              if($first){
                $first = false;
                echo '<div class="item featured text-center">
                    <h3 class="title"><a href="'.$url.'project/'.$dn['id'].'">'.$dn['name'].'</a></h3>
                    <p class="summary">'.$dn['description_little'].'</p>
                    <div class="featured-image has-ribbon">
                        <a href="'.$url.'project/'.$dn['id'].'">
                        <img class="img-fluid project-image" src="'.$dn['img'].'" alt="'.$dn['name'].'" />
                        </a>
                        <div class="ribbon">
                            <div class="text">New</div>
                        </div>
                    </div>
                </div>
                <hr class="divider" />';
              }else{
                echo '<div class="item row">
                    <a class="col-md-4 col-12" href="'.$url.'project/'.$dn['id'].'">
                    <img class="img-fluid project-image" src="'.$dn['img'].'" alt="'.$dn['name'].'" />
                    </a>
                    <div class="desc col-md-8 col-12">
                        <h3 class="title"><a href="'.$url.'project/'.$dn['id'].'">'.$dn['name'].'</a></h3>
                        <p class="mb-2">'.$dn['description_little'].'</p>
                        <p><a class="more-link" href="'.$url.'project/'.$dn['id'].'"><i class="fas fa-external-link-alt"></i>Find out more</a></p>
                    </div><!--//desc-->
                </div>';
              }
            }
            ?>
          </div>
        </div>
      </section>

		</div>
		<div class="secondary col-lg-4 col-12">
      <aside class="info aside section">
         <div class="section-inner">
             <h2 class="heading sr-only">Basic Information</h2>
             <div class="content">
                 <ul class="list-unstyled">
                   <li><i class="fas fa-map-marker-alt"></i><span class="sr-only">Location:</span>France</li>
                   <li><i class="fas fa-envelope"></i><span class="sr-only">Email:</span><a href="mailto:contact@nathanfallet.me">contact@nathanfallet.me</a></li>
                   <li><i class="fas fa-link"></i><span class="sr-only">Website:</span><a href="<?php echo $url; ?>"><?php echo $url; ?></a></li>
                   <li><i class="fas fa-donate"></i><span class="sr-only">Donate:</span><a href="https://paypal.me/NathanFallet">PayPal.Me</a></li>
                 </ul>
             </div><!--//content-->
         </div><!--//section-inner-->
     </aside><!--//aside-->

     <aside class="skills aside section">
         <div class="section-inner">
             <h2 class="heading">Skills</h2>
             <div class="content">
                 <div class="skillset">
                     <div class="item">
                         <h3 class="level-title">HTML &amp; CSS<span class="level-label">Pro</span></h3>
                         <div class="level-bar">
                             <div class="level-bar-inner" data-level="80%">
                             </div>
                         </div>
                     </div>
                     <div class="item">
                         <h3 class="level-title">PHP &amp; MySQL<span class="level-label">Pro</span></h3>
                         <div class="level-bar">
                             <div class="level-bar-inner" data-level="95%">
                             </div>
                         </div>
                     </div>
                     <div class="item">
                         <h3 class="level-title">Java<span class="level-label">Pro</span></h3>
                         <div class="level-bar">
                             <div class="level-bar-inner" data-level="95%">
                             </div>
                         </div>
                     </div>
                     <div class="item">
                         <h3 class="level-title">Swift<span class="level-label">Pro</span></h3>
                         <div class="level-bar">
                             <div class="level-bar-inner" data-level="95%">
                             </div>
                         </div>
                     </div>
                     <div class="item">
                         <h3 class="level-title">Python<span class="level-label">Starter</span></h3>
                         <div class="level-bar">
                             <div class="level-bar-inner" data-level="20%">
                             </div>
                         </div>
                     </div>
                 </div>
             </div><!--//content-->
         </div><!--//section-inner-->
     </aside><!--//section-->

     <aside class="languages aside section">
         <div class="section-inner">
             <h2 class="heading">Languages</h2>
             <div class="content">
                 <ul class="list-unstyled">
                     <li class="item">
                         <span class="title"><strong>French:</strong></span>
                         <span class="level">Native <br/><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> </span>
                     </li><!--//item-->
                     <li class="item">
                         <span class="title"><strong>English:</strong></span>
                         <span class="level">Professional <br/><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star-half"></i></span>
                     </li><!--//item-->
                     <li class="item">
                         <span class="title"><strong>Spanish:</strong></span>
                         <span class="level">Professional <br/><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></span>
                     </li><!--//item-->
                 </ul>
             </div><!--//content-->
         </div><!--//section-inner-->
     </aside><!--//section-->
		</div>
	</div>
</div>
