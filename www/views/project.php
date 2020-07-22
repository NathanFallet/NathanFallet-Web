<div class="container sections-wrapper">
	<div class="row">
		<div class="primary col-lg-9 col-12">
			<section class="section">
				<div class="section-inner">
					<h2 class="heading"><?php echo $project['name']; ?></h2>
					<div class="content">
						<?php echo $project['description']; ?>
					</div>
				</div>
			</section>
		</div>
		<div class="secondary col-lg-3 col-12" align="center">
			<section class="section">
				<div class="section-inner">
					<h2 class="heading">Informations & links</h2>
					<?php
					if (!empty($project['type'])) {
						if ($project['type'] == 'file') {
					?>
							<p><a href="<?php echo '/project/' . $project['id'] . '/download'; ?>" class="btn btn-success">Download</a></p>
						<?php
						} else if ($project['type'] == 'link') {
						?>
							<p><a href="<?php echo $project['data']; ?>" class="btn btn-success" target="_blank">Learn more</a></p>
							<?php
						} else if ($project['type'] == 'app') {
							$links = explode(';', $project['data']);
							if (!empty($links[0])) {
							?>
								<p><a href="<?php echo $links[0]; ?>" target="_blank"><img src="/img/google-play-badge.png" style="max-width: 80%;" /></a></p>
							<?php
							}
							if (!empty($links[1])) {
							?>
								<p><a href="<?php echo $links[1]; ?>" target="_blank"><img src="/img/app-store-badge.png" style="max-width: 80%;" /></a></p>
						<?php
							}
						}
					}
					if (!empty($project['version'])) {
						?>
						<p>Version: <?php echo $project['version']; ?></p>
					<?php
					}
					if (!empty($project['github'])) {
						echo '<p><a href="' . $project['github'] . '" target="_blank">Show on GitHub</a></p>';
					}
					?>
					<p>Share:<br /><a href="https://twitter.com/intent/tweet?text=<?php
																					echo 'Discover ' . $project['name'] . ' by @NathanFallet - https://www.nathanfallet.me/project/' . $project['id'];
																					?>" target="_blank">Twitter</a></p>
				</div>
			</section>
		</div>
	</div>
</div>