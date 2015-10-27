<?php get_header(); ?>
			<main id="main">
				<?php

				if(have_posts()){
					while(have_posts()){
						echo the_post();
					}
				} else {
					?>
					<p><?php echo 'Sorry, no posts yet!'; ?></p>
					<?php
				}

				?>
			</main>
<?php get_footer(); ?>